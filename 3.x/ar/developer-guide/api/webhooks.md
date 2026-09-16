# خطافات الويب

دعم خطافات الويب في Chamilo مقتصر حالياً على **إضافة BigBlueButton (BBB)**. وبدلاً من إرسال خطافات الويب إلى أنظمة خارجية، يعمل Chamilo كـ *مستقبِل* لخطافات الويب: فهو يعرّض نقاط نهاية يستدعيها BigBlueButton عند وقوع أحداث الغرفة، ويستخدم تلك الأحداث لبناء مقاييس نشاط لكل مشارك.

## كيف يعمل

عندما تُعقد اجتماع BBB، يدفع خادم BBB إشعارات الأحداث في الوقت الفعلي إلى عنوان URL للاستدعاء المرتد موقَّع على تثبيت Chamilo الخاص بك. يعالج Chamilo كل حدث ويخزّن المقاييس المجمّعة (وقت الحديث، وقت الكاميرا، الرسائل، التفاعلات، رفع اليد) في جدول قاعدة البيانات `conference_activity`.

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

## نقاط النهاية

### نقطة نهاية PHP القديمة

```
POST /plugin/Bbb/webhook.php?au={accessUrlId}&mid={meetingId}&ts={timestamp}&sig={hmac}
```

تتعامل مع جميع أحداث غرفة BBB. تتحقق من توقيع HMAC، ثم تُدرج أو تحدّث صفاً من `ConferenceActivity` وتحدّث حقل المقاييس JSON.

### نقطة نهاية Symfony الحديثة

```
POST /api/videoconference/callback
Headers:
  X-Chamilo-Timestamp: <unix timestamp>
  X-Chamilo-Signature: <hmac-sha256>
```

معرَّفة عبر API Platform على كيان `ConferenceActivity`. تتطلب ترويسات التوقيع لتسجيل النشاط؛ تُقبل الطلبات دون توقيع صالح لكن لا يُكتب صف نشاط.

## الإعداد (إضافة BBB)

في **الإدارة ← الإضافات ← BigBlueButton**، تتوفر إعدادات خطافات الويب التالية:

| الإعداد | القيم | الوصف |
|---|---|---|
| `webhooks_enabled` | `true` / `false` | تفعيل أو تعطيل تسجيل خطاف الويب |
| `webhooks_scope` | `per_meeting` / `global` | تسجيل خطاف واحد لكل اجتماع أو خطاف عام واحد لجميع الاجتماعات |
| `webhooks_hash_algo` | `sha256` / `sha1` | خوارزمية HMAC للتحقق من التوقيع |
| `webhooks_event_filter` | سلسلة مفصولة بفواصل | قائمة اختيارية بأسماء أحداث BBB المراد استقبالها (فارغة = جميع الأحداث) |

عند إنشاء اجتماع وتفعيل خطافات الويب، يستدعي Chamilo واجهة برمجة BBB `hooks/create` لتسجيل عنوان URL للاستدعاء المرتد. يتضمن العنوان توقيع HMAC محدوداً زمنياً.

## التحقق من التوقيع

تستخدم نقطة النهاية القديمة معاملات سلسلة الاستعلام:

```
sig = HMAC-{algo}("{accessUrlId}|{meetingId}|{timestamp}", salt)
```

- قيمة `salt` هي قيمة الملح المُعدَّة في إضافة BBB.
- تُرفض الطلبات الأقدم من **15 دقيقة** للحد من هجمات إعادة التشغيل.

تستخدم نقطة النهاية الحديثة الترويسات:

```
sig = HMAC-SHA256("{timestamp}\n{rawBody}", kernelSecret)
```

- تُرفض الطلبات الأقدم من **5 دقائق**.

## مثال: حدث خطاف ويب لـ BigBlueButton

يرسل BBB جسماً JSON يحتوي على مصفوفة أحداث. لكل حدث `data.id` (اسم الحدث) وكائن `data.attributes`.

**الطلب من BBB:**

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

**ما يفعله Chamilo:**

1. يتحقق من توقيع HMAC والطابع الزمني.
2. يبحث عن `ConferenceMeeting` حسب `remote_id`.
3. يبحث عن (أو ينشئ) صف `ConferenceActivity` مفتوحاً لذلك الاجتماع + المستخدم.
4. يسجّل `temp.talk_started_at = 1715520123` في JSON المقاييس.

عندما يصل الحدث المطابق `user-talking-stopped`، يحسب Chamilo الثواني المنقضية ويضيفها إلى `totals.talk_seconds`.

## الأحداث والمقاييس المتتبَّعة

| حدث (أحداث) BBB | المقياس المحدَّث |
|---|---|
| `user-joined` / `participantjoined` | إنشاء صف النشاط |
| `user-talking-started` / `uservoiceactivated` | بدء المؤقت لـ `totals.talk_seconds` |
| `user-talking-stopped` / `uservoicedeactivated` | زيادة `totals.talk_seconds` |
| `camera-share-started` / `webcamsharestarted` | بدء المؤقت لـ `totals.camera_seconds` |
| `camera-share-stopped` / `webcamsharestopped` | زيادة `totals.camera_seconds` |
| `chat-message-posted` / `publicchatmessageposted` | زيادة `counts.messages` |
| `user-reaction-changed` / `useremojichanged` | `counts.reactions` + تفصيل لكل رمز تعبيري |
| `user-hand-raised` / `userraisedhand` | زيادة `counts.hands` |
| `user-left` / `participantleft` | تفريغ المؤقتات المفتوحة وإغلاق صف النشاط |

## بنية بيانات المقاييس

تُخزَّن المقاييس كعمود JSON في `ConferenceActivity`:

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

تحفظ حقول `temp` طوابع بدء المؤقتات قيد التقدم؛ وتُمسح عند وصول حدث الإيقاف المقابل أو عند مغادرة المشارك.

## لوحة تحكم Webhook

تتوفر لوحة تحكم للمسؤول على `/plugin/Bbb/webhook_dashboard.php`. تعرض مقاييس آنية وتاريخية لكل مشارك في اجتماع معيّن: وقت الاتصال، ووقت الحديث، ووقت الكاميرا، وعدد الرسائل، وعدد التفاعلات، ورفع الأيدي. يمكن تصدير البيانات بصيغة CSV.

## تسجيل الخطافات وتنظيفها

توفر الصنف `BbbLib` طرائق لإدارة تسجيل الخطافات على خادم BBB:

| Method | Description |
|---|---|
| `ensureHookForMeeting($remoteId)` | Register (or confirm) a per-meeting hook after a user joins |
| `ensureGlobalWebhook()` | Register a single global hook covering all meetings |
| `cleanupWebhooks($meetingId)` | Delete Chamilo-registered hooks from the BBB server |
| `BbbPlugin::checkWebhooksHealth()` | Validate that the BBB `hooks/list` endpoint is reachable |

## التوسيع إلى مصادر أحداث أخرى

لا يوجد حالياً نظام عام للويب هوك الصادر في Chamilo (أي لا توجد طريقة مدمجة لإرسال POST إلى عنوان URL خارجي عند تسجيل مستخدم أو إكماله مقرراً). إذا احتجت إلى هذا السلوك، تشمل الخيارات:

- كتابة إضافة تستمع إلى أحداث Symfony وترسل استدعاءات HTTP (انظر [الإضافات](../plugins/README.md) و[نظام الأحداث](../events.md)).
- استخدام REST API للاستعلام عن تغيّرات الحالة من نظام خارجي.