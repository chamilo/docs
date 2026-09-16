# المصادقة

يستخدم **Chamilo API** خيار **JWT (JSON Web Tokens)** للمصادقة، والذي يتم تنفيذه عبر `lexik/jwt-authentication-bundle`.

## الحصول على الرمز

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

## استخدام الرمز

قم بتضمين الرمز في رأس `Authorization` لطلبات لاحقة:

```
GET /api/users
Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9...
```

## دورة حياة الرمز

* تمتلك الرموز وقت انتهاء صلاحية قابل للتكوين
* عند انتهاء صلاحية الرمز، يجب على العميل طلب رمز جديد
* تُخزن مفاتيح JWT في `config/jwt/` (المفاتيح الخاصة والعامة)

## إنشاء مفاتيح JWT

```bash
php bin/console lexik:jwt:generate-keypair
```

هذا ينشئ:
* `config/jwt/private.pem` — المفتاح الخاص لتوقيع الرموز
* `config/jwt/public.pem` — المفتاح العام للتحقق من الرموز

قم بتكوين كلمة المرور في `.env`:

```env
JWT_PASSPHRASE=your-passphrase
```

## وثائق API

عند تعيين `APP_ENABLE_API_ENTRYPOINT=1` في البيئة، تكون وثائق API متاحة على `/api`. هذا يوفر واجهة Swagger/OpenAPI تفاعلية لاستكشاف واختبار نقاط النهاية.