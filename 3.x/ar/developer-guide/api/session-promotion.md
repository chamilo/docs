# دفعة الجلسة

يمكن أن تنتمي الجلسة إلى **دفعة** (فوج ضمن مسار مهني، تُدار من **الإدارة > المسارات المهنية والدفعات**). تضبطها عمليات التكامل عبر العملية القياسية `PATCH /api/sessions/{id}`، التي تحل محل المعامل `promotion_id` في خدمة الويب `update_session` الخاصة بالإصدار 1.11.x.

لا تخلط بين الدفعة وفئة الجلسة (`/api/session_categories`)، فهي تجميع مختلف.

## الوصول

يمكن لمسؤولي المنصة فقط (`ROLE_ADMIN`) قراءة الدفعات وتغيير دفعة الجلسة. يتلقى المستخدمون الآخرون `403 Forbidden`.

## العثور على دفعة

تُعرض الدفعات للقراءة فقط. ولا يزال إنشاؤها وتحريرها يتمان من الإدارة.

```http
GET /api/promotions
GET /api/promotions/{id}
```

```json
{
  "@id": "/api/promotions/3",
  "id": 3,
  "title": "Accounting 2026",
  "status": 1
}
```

تكون `status` بقيمة `1` للدفعة النشطة و`0` للدفعة غير النشطة.

## تعيين دفعة الجلسة

```http
PATCH /api/sessions/42
Authorization: Bearer <token>
Content-Type: application/merge-patch+json
```

```json
{ "promotion": "/api/promotions/3" }
```

أرسل `{ "promotion": null }` لفصل الجلسة عن دفعتها.

يجب تقديم الدفعة بصيغة IRI. يُرفض المعرّف الرقمي، أو IRI الذي لا يطابق أي دفعة، مع `400 Bad Request`.

## قراءة دفعة الجلسة

يعيد `GET /api/sessions/{id}` قيمة IRI الخاصة بالدفعة، أو يحذف الحقل عندما لا تكون للجلسة دفعة:

```json
{
  "@id": "/api/sessions/42",
  "title": "Accounting basics - October 2026",
  "promotion": "/api/promotions/3"
}
```

تحتفظ الجلسة المُنشأة عبر [تكرار الجلسة](session-duplication.md) بدفعة جلسة النموذج الخاصة بها.