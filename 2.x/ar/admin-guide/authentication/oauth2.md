# OAuth2

يتم تكوين المصادقة OAuth2 في ملف `config/authentication.yaml`. يوفر Chamilo دعماً مدمجاً لـ Azure AD، وKeycloak، وFacebook، ومزودين آخرين يتوافقون مع معيار OAuth2.

## الخطوة 1 — تسجيل Chamilo لدى مزود الهوية الخاص بك

أنشئ تطبيقاً في لوحة تحكم المزود الإدارية الخاصة بك وقم بتعيين **رابط إعادة التوجيه URI** إلى:

```
https://your-chamilo-url/connect/<provider>/check
```

حيث `<provider>` هو `azure`، أو `keycloak`، أو `facebook`، أو الاسم الذي تقدمه للمزود العام. سجّل **معرف العميل Client ID** و**سر العميل Client Secret**.

## الخطوة 2 — تكوين authentication.yaml

فعّل المزود وقدّم بيانات اعتماده. جميع المزودين لديهم المفاتيح العامة التالية:

| المفتاح | الوصف |
|---------|-------|
| `enabled` | `true` للتفعيل |
| `title` | التسمية المعروضة على زر تسجيل الدخول |
| `client_id` | من مزود الهوية الخاص بك |
| `client_secret` | من مزود الهوية الخاص بك |
| `allow_create_new_users` | إنشاء حسابات Chamilo تلقائياً عند تسجيل الدخول الأول |
| `allow_update_user_info` | مزامنة بيانات المستخدم في كل تسجيل دخول |
| `force_as_login_method` | تعطيل الطرق الأخرى وإجبار هذه الطريقة |

### Azure AD (Microsoft Entra ID)

```yaml
authentication:
  1:
    oauth2:
      azure:
        enabled: true
        title: "Masuk dengan Microsoft"
        client_id: "<application-client-id>"
        client_secret: "<client-secret>"
        tenant: "<tenant-id>"
        url_login: "https://login.microsoftonline.com"
        path_authorize: "/<tenant-id>/oauth2/v2.0/authorize"
        path_token: "/<tenant-id>/oauth2/v2.0/token"
        url_api: "https://graph.microsoft.com"
        allow_create_new_users: true
        allow_update_user_info: true
```

يدعم Azure أيضاً تعيين الأدوار بناءً على المجموعات (تعيين معرفات مجموعات Azure إلى أدوار Chamilo مثل المعلم أو المدير)، وأوامر مزامنة دلتا المستخدمين، والمصادقة بشهادة كبديل لسر العميل. انظر [الويكي](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration) لخيارات تلك.

### Keycloak

```yaml
authentication:
  1:
    oauth2:
      keycloak:
        enabled: true
        title: "Masuk dengan Keycloak"
        client_id: "<client-id>"
        client_secret: "<client-secret>"
        auth_server_url: "https://keycloak.yourorg.com"
        realm: "your-realm"
        allow_create_new_users: true
```

### Facebook

```yaml
authentication:
  1:
    oauth2:
      facebook:
        enabled: true
        title: "Masuk dengan Facebook"
        client_id: "<app-id>"
        client_secret: "<app-secret>"
        graph_api_version: "v20.0"
        allow_create_new_users: true
```

### OAuth2 العام

استخدم هذا لـ Google، أو GitLab، أو مزودين آخرين يتوافقون مع OAuth2:

```yaml
authentication:
  1:
    oauth2:
      myprovider:
        enabled: true
        title: "Masuk dengan MyProvider"
        client_id: "<client-id>"
        client_secret: "<client-secret>"
        urlAuthorize: "https://provider.example.com/oauth/authorize"
        urlAccessToken: "https://provider.example.com/oauth/token"
        urlResourceOwnerDetails: "https://provider.example.com/api/user"
        scopes: ["openid", "email", "profile"]
        allow_create_new_users: true
```

يمكن تكوين تعيين الحقول (كيفية تعيين سمات المزود إلى `firstname`، `lastname`، `email`، إلخ في Chamilo) وتعيين الأدوار أيضاً. انظر [الويكي](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration) لقائمة كاملة بمفاتيح التعيين.

## الخطوة 3 — مسح الذاكرة المؤقتة والاختبار

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

اخرج من Chamilo. يجب أن يظهر زر المزود المُكوَّن في صفحة تسجيل الدخول. اختبر بحساب مخصص قبل إطلاقه لجميع المستخدمين.

## نصائح

* احتفظ بنموذج تسجيل الدخول القياسي مفعّلاً حتى يتمكن المسؤول دائماً من الدخول في حال حدوث مشكلة في OAuth2.
* عند استخدام Azure مع مستخدمين موجودين، قم بتكوين `existing_user_verification_order` للتحكم في كيفية تطابق Chamilo للمستخدم الداخل مع الحسابات الموجودة.
* تعيين الدور الافتراضي هو طالب؛ استخدم تعيين المجموعات لترقية المستخدمين إلى دور معلم أو مدير تلقائياً.