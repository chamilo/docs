# Webhooks

دعم Chamilo لـ **الـ Webhooks** حاليًا مقتصر على **إضافة BigBlueButton (BBB)**. بدلاً من إرسال الـ webhooks إلى الأنظمة الخارجية، يعمل Chamilo كـ *مستقبل webhook*: يعرض نقاط نهاية (endpoints) يستدعيها BigBlueButton عند حدوث أحداث الغرفة، ويستخدم تلك الأحداث لبناء مقاييس نشاط لكل مشارك.

## How It Works

عندما يتم عقد اجتماع BBB، يقوم خادم BBB بدفع إشعارات أحداث في الوقت الفعلي إلى عنوان URL للـ callback الموقع في تثبيت Chamilo الخاص بك. يعالج Chamilo كل حدث ويخزن مقاييس مجمعة (وقت الكلام، وقت الكاميرا، الرسائل، الردود، رفع اليد) في جدول قاعدة البيانات `conference_activity`.

```
BigBlueButton server
        │  POST (signed)
        ▼
Chamilo webhook endpoint
        │
        ▼
conference_activity (metrics JSON)
        │
        ▼
Webhook dashboard (/plugin/Bbb/webhook_dashboard.php)
```

## Endpoints

### Legacy PHP endpoint

```
POST /plugin/Bbb/webhook.php?au={accessUrlId}&mid={meetingId}&ts={timestamp}&sig={hmac}
```

يُدير جميع أحداث غرف BBB. يتحقق من توقيع HMAC، ثم يقوم بإدراج أو تحديث صف `ConferenceActivity` وتحديث حقل JSON للمقاييس.

### Modern Symfony endpoint

```
POST /api/videoconference/callback
Headers:
  X-Chamilo-Timestamp: <unix timestamp>
  X-Chamilo-Signature: <hmac-sha256>
```

معرّف عبر API Platform على كيان `ConferenceActivity`. يتطلب رؤوس التوقيع لتسجيل النشاط؛ يتم قبول الطلبات بدون توقيع صالح لكن لا يتم كتابة صف نشاط.

## Configuration (BBB Plugin)

في **Administration → Plugins → BigBlueButton**، تتوفر الإعدادات التالية لـ webhook:

| Setting | Values | Description |
|---|---|---|
| `webhooks_enabled` | `true` / `false` | تمكين أو تعطيل تسجيل webhook |
| `webhooks_scope` | `per_meeting` / `global` | تسجيل hook واحد لكل اجتماع أو hook عام واحد لجميع الاجتماعات |
| `webhooks_hash_algo` | `sha256` / `sha1` | خوارزمية HMAC للتحقق من التوقيع |
| `webhooks_event_filter` | comma-separated string | قائمة اختيارية بأسماء أحداث BBB المراد استقبالها (فارغة = جميع الأحداث) |

عند إنشاء اجتماع وتمكين webhooks، يستدعي Chamilo واجهة BBB `hooks/create` API لتسجيل عنوان URL للـ callback. يتضمن العنوان توقيع HMAC مقيد زمنيًا.

## Signature Validation

نقطة النهاية القديمة تستخدم معلمات سلسلة الاستعلام:

```
sig = HMAC-{algo}("{accessUrlId}|{meetingId}|{timestamp}", salt)
```

- `salt` هي قيمة الملح المُعَدَّة في إضافة BBB.
- يتم رفض الطلبات الأقدم من **15 دقيقة** للحد من هجمات إعادة التشغيل.

نقطة النهاية الحديثة تستخدم الرؤوس:

```
sig = HMAC-SHA256("{timestamp}\n{rawBody}", kernelSecret)
```

- يتم رفض الطلبات الأقدم من **5 دقائق**.

## Example: BigBlueButton Webhook Event

يرسل BBB جسم JSON يحتوي على مصفوفة من الأحداث. كل حدث له `data.id` (اسم الحدث) وكائن `data.attributes`.

**Request from BBB:**

```http
POST /plugin/Bbb/webhook.php?au=1&mid=chamilo-meeting-abc123&ts=1715520000&sig=e3b0c44298fc
Content-Type: application/json

{
  "events": [
    {
      "data": {
        "id": "user-talking-started",
        "attributes": {
          "meeting":  { "external-meeting-id": "chamilo-meeting-abc123",
                        "internal-meeting-id": "bbb-internal-xyz" },
          "user":     { "internal-user-id": "w_abc123",
                        "external-user-id": "42",
                        "name": "Jane Smith" }
        },
        "event": { "ts": 1715520123 }
      }
    }
  ]
}
```

**What Chamilo does:**

1. يتحقق من توقيع HMAC والطابع الزمني.
2. يبحث عن `ConferenceMeeting` حسب `remote_id`.
3. يبحث عن (أو ينشئ) صف `ConferenceActivity` مفتوح للاجتماع + المستخدم.
4. يسجل `temp.talk_started_at = 1715520123` في JSON المقاييس.

عند وصول حدث `user-talking-stopped` المطابق، يحسب Chamilo الثواني المنقضية ويضيفها إلى `totals.talk_seconds`.

## Tracked Events and Metrics

| BBB event(s) | Metric updated |
|---|---|
| `user-joined` / `participantjoined` | Activity row created |
| `user-talking-started` / `uservoiceactivated` | Timer started for `totals.talk_seconds` |
| `user-talking-stopped` / `uservoicedeactivated` | `totals.talk_seconds` incremented |
| `camera-share-started` / `webcamsharestarted` | Timer started for `totals.camera_seconds` |
| `camera-share-stopped` / `webcamsharestopped` | `totals.camera_seconds` incremented |
| `chat-message-posted` / `publicchatmessageposted` | `counts.messages` incremented |
| `user-reaction-changed` / `useremojichanged` | `counts.reactions` + per-emoji breakdown |
| `user-hand-raised` / `userraisedhand` | `counts.hands` incremented |
| `user-left` / `participantleft` | Open timers flushed, activity row closed |

---

---
## هيكل بيانات المقاييس

يتم تخزين المقاييس كعمود JSON في `ConferenceActivity`:

```json
{
  "totals": {
    "talk_seconds":   142,
    "camera_seconds": 95
  },
  "counts": {
    "messages":  7,
    "reactions": 3,
    "hands":     1,
    "reactions_breakdown": {
      "👍": 2,
      "❤️": 1
    }
  },
  "temp": {
    "talk_started_at":   0,
    "camera_started_at": 0
  }
}
```

تحتوي حقول `temp` على طوابع زمنية لبدء المؤقتات قيد التقدم؛ يتم مسحها عند وصول الحدث المتوقف المقابل أو عند مغادرة المشارك.

## لوحة تحكم Webhook

توجد لوحة تحكم إدارية متاحة في `/plugin/Bbb/webhook_dashboard.php`. تعرض مقاييس فورية وتاريخية لكل مشارك في اجتماع معين: وقت الاتصال، وقت الكلام، وقت الكاميرا، عدد الرسائل، عدد الردود الفعل، ورفع اليد. يمكن تصدير البيانات كـ CSV.

## تسجيل وتنظيف الـ Hooks

توفر فئة `BbbLib` طرقًا لإدارة تسجيل الـ hooks على خادم BBB:

| Method | Description |
|---|---|
| `ensureHookForMeeting($remoteId)` | Register (or confirm) a per-meeting hook after a user joins |
| `ensureGlobalWebhook()` | Register a single global hook covering all meetings |
| `cleanupWebhooks($meetingId)` | Delete Chamilo-registered hooks from the BBB server |
| `BbbPlugin::checkWebhooksHealth()` | Validate that the BBB `hooks/list` endpoint is reachable |

## توسيع لمصادر أحداث أخرى

لا يوجد حاليًا نظام webhook خارجي عام في Chamilo (أي لا توجد طريقة مدمجة لإرسال POST إلى عنوان URL خارجي عند تسجيل مستخدم أو إكماله لدورة). إذا كنت بحاجة إلى هذا السلوك، تشمل الخيارات:

- كتابة plugin يستمع إلى أحداث Symfony ويرسل استدعاءات HTTP (انظر [Plugins](../plugins/README.md) و[Event System](../events.md)).
- استخدام REST API لاستطلاع التغييرات في الحالة من نظام خارجي.