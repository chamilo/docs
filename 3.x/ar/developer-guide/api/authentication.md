# المصادقة

تستخدم واجهة برمجة تطبيقات Chamilo **JWT (JSON Web Tokens)** للمصادقة، عبر الحزمة `lexik/jwt-authentication-bundle`.

## الحصول على رمز مميز

أرسل طلب POST إلى نقطة نهاية المصادقة:

```
POST /api/authentication_token
Content-Type: application/json

{
  "username": "admin",
  "password": "your-password"
}
```

الاستجابة:

```json
{
  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9..."
}
```

## استخدام الرمز المميز

ضمّن الرمز المميز في ترويسة `Authorization` للطلبات اللاحقة:

```
GET /api/users
Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9...
```

## دورة حياة الرمز المميز

* للرموز المميزة مدة انتهاء صلاحية قابلة للضبط
* عند انتهاء صلاحية الرمز المميز، يجب على العميل طلب رمز جديد
* تُخزَّن مفاتيح JWT في `config/jwt/` (المفتاح الخاص والمفتاح العام)

## توليد مفاتيح JWT

```bash
php bin/console lexik:jwt:generate-keypair
```

ينشئ هذا الأمر:
* `config/jwt/private.pem` — المفتاح الخاص لتوقيع الرموز المميزة
* `config/jwt/public.pem` — المفتاح العام للتحقق من الرموز المميزة

اضبط عبارة المرور في `.env`:

```env
JWT_PASSPHRASE=your-passphrase
```

## توثيق واجهة برمجة التطبيقات

عند تعيين `APP_ENABLE_API_ENTRYPOINT=true` في البيئة، يتوفر توثيق واجهة برمجة التطبيقات على `/api`. يوفّر ذلك واجهة تفاعلية من نوع Swagger/OpenAPI لاستكشاف نقاط النهاية واختبارها.

تعيين المتغير وحده لا يكفي — يجب مسح ذاكرة التخزين المؤقت لـ Symfony حتى يسري التغيير. راجع [متغيرات البيئة (.env)](../../admin-guide/installation/configuration.md#enable-the-api-documentation) في دليل المسؤول.