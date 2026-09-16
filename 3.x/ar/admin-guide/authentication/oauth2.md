# OAuth2

يُضبط مصادقة OAuth2 في `config/authentication.yaml`. يتضمن Chamilo دعمًا مدمجًا لـ Azure AD وKeycloak وFacebook وأي مزوّد عام متوافق مع OAuth2.

## الخطوة 1 — تسجيل Chamilo لدى مزوّد الهوية

أنشئ تطبيقًا في لوحة إدارة المزوّد وعيّن **عنوان إعادة التوجيه (redirect URI)** إلى:

```
https://your-chamilo-url/connect/<provider>/check
```

حيث يكون `<provider>` هو `azure` أو `keycloak` أو `facebook` أو الاسم الذي تعطيه لمزوّد عام. سجّل **معرّف العميل (Client ID)** و**سر العميل (Client Secret)**.

## الخطوة 2 — ضبط authentication.yaml

فعّل المزوّد وقدّم بيانات اعتماده. تشترك جميع المزوّدات في هذه المفاتيح المشتركة:

| المفتاح | الوصف |
|-----|-------------|
| `enabled` | `true` للتفعيل |
| `title` | التسمية المعروضة على زر تسجيل الدخول |
| `client_id` | من مزوّد الهوية |
| `client_secret` | من مزوّد الهوية |
| `allow_create_new_users` | إنشاء حساب Chamilo تلقائيًا عند أول تسجيل دخول |
| `allow_update_user_info` | مزامنة بيانات المستخدم عند كل تسجيل دخول |
| `force_as_login_method` | إخفاء الطرق الأخرى وعرض زر هذا المزوّد وحده |
| `force_redirect` | إرسال الزائر المجهول إلى هذا المزوّد تلقائيًا دون زر للنقر |
| `skip_force_redirect_in` | قائمة بأجزاء عناوين URL التي يتركها `force_redirect` دون تغيير |

### Azure AD (Microsoft Entra ID)

لدى Azure صفحة مخصصة تغطي تسجيل التطبيق، وربط الأدوار حسب المجموعات، ومصادقة الشهادات، وأوامر مزامنة توفير الحسابات — انظر [Azure Entra ID](azure-entra-id.md).

### Keycloak

```yaml
authentication:
  1:
    oauth2:
      keycloak:
        enabled: true
        title: "Sign in with Keycloak"
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
        title: "Sign in with Facebook"
        client_id: "<app-id>"
        client_secret: "<app-secret>"
        graph_api_version: "v20.0"
        allow_create_new_users: true
```

### OAuth2 عام

استخدم هذا لـ Google أو GitLab أو أي مزوّد متوافق مع OAuth2:

```yaml
authentication:
  1:
    oauth2:
      myprovider:
        enabled: true
        title: "Sign in with MyProvider"
        client_id: "<client-id>"
        client_secret: "<client-secret>"
        urlAuthorize: "https://provider.example.com/oauth/authorize"
        urlAccessToken: "https://provider.example.com/oauth/token"
        urlResourceOwnerDetails: "https://provider.example.com/api/user"
        scopes: ["openid", "email", "profile"]
        allow_create_new_users: true
```

يمكن أيضًا ضبط ربط الحقول (كيفية ربط سمات المزوّد بحقول Chamilo مثل `firstname` و`lastname` و`email` وغيرها) وربط الأدوار. راجع [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration) للاطلاع على القائمة الكاملة لمفاتيح الربط.

## اختياري — إرسال كل زائر إلى المزوّد تلقائيًا

يتحكم مفتاحان في مقدار ما يراه الزائر من صفحة تسجيل الدخول. وهما مستقلان ويجيبان عن حاجتين مختلفتين:

| المفتاح | ما يراه الزائر |
|-----|-----------------------|
| `force_as_login_method: true` | صفحة تسجيل الدخول مختصرة إلى زر هذا المزوّد. ينقر الزائر عليه. |
| `force_redirect: true` | لا صفحة تسجيل دخول على الإطلاق. ينتقل المتصفح إلى المزوّد من تلقاء نفسه. |

استخدم `force_redirect` عندما يملك مزوّد الهوية كل الحسابات، ولا يكون لنموذج تسجيل الدخول المحلي أي غرض:

```yaml
authentication:
  1:
    oauth2:
      keycloak:
        enabled: true
        title: "Sign in with Keycloak"
        force_redirect: true
        skip_force_redirect_in: ['/catalogue']
```

يمكن لمزوّد واحد فقط فرض إعادة التوجيه. إذا أعلنه عدة مزوّدين، يفوز أول مزوّد مفعّل. لا يمكن لـ LDAP إعلانه لأنه يصادق عبر النموذج المحلي.

تنطبق إعادة التوجيه على صفحة يعرضها المتصفح، ولا شيء سواها. تبقى هذه الطلبات دائمًا حيث هي:

* استدعاء API أو SCIM أو MCP أو XHR، إذ لا يمكنه اتباع مصافحة مخصصة للمتصفح.
* صورة أو ورقة أنماط أو تنزيل ملف.
* أي عملية كتابة (POST أو PUT أو DELETE)، لأن المتصفح يعيد تشغيل الكتابة المعاد توجيهها كـ GET ويسقط الجسم.
* مصافحة المزوّد نفسها (`/connect/...`) و`/logout`، وإلا لنشأ حلقة لا نهائية.
* زائر لديه جلسة بالفعل، بما في ذلك الحساب المجهول لمساق عام.

أضف جزء عنوان URL إلى `skip_force_redirect_in` لكل منطقة عامة يجب أن تبقى مفتوحة، مثل كتالوج المساقات.

### مخرج الطوارئ

سيؤدي مزوّد غير قابل للوصول إلى قفل كل الحسابات، بما في ذلك حساب المسؤول المحلي. أضف `skipForcedRedirect=1` إلى أي عنوان URL للوصول إلى نموذج تسجيل الدخول المحلي رغم ذلك:

```
https://your-chamilo-url/login?skipForcedRedirect=1
```

يبقى الاختيار في الجلسة، لذا تستمر الصفحات التالية في عرض النموذج. كما يُلغي `force_as_login_method` لتلك الجلسة، مما يعيد كل طرق تسجيل الدخول إلى الصفحة. لإعادة المنصة إلى المزوّد، استخدم `?skipForcedRedirect=0`، أو أغلق جلسة المتصفح.

ينتمي المعامل إلى `force_redirect` وحده. ما دام لا يعلن أي مزوّد ذلك المفتاح، لا يفعل المعامل شيئًا على الإطلاق، ويحتفظ `force_as_login_method` بزرّه الوحيد.

احتفظ بهذا العنوان مع ملاحظات الاسترداد الخاصة بك. اختبره قبل تفعيل `force_redirect` في بيئة الإنتاج.

## الخطوة 3 — مسح الذاكرة المؤقتة والاختبار

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

سجّل الخروج من Chamilo. ينبغي أن يظهر زر المزوّد المُعدّ على صفحة تسجيل الدخول. اختبر بحساب مخصص قبل التعميم على جميع المستخدمين.

## نصائح

* أبقِ نموذج تسجيل الدخول القياسي مفعّلًا حتى يتمكن المسؤولون دائمًا من تسجيل الدخول إذا واجه OAuth2 مشكلات. إذا ضبطت `force_redirect`، تعلّم عنوان `?skipForcedRedirect=1` بدلًا من ذلك: فهو السبيل الوحيد للعودة إلى ذلك النموذج.
* التعيين الافتراضي للأدوار هو طالب؛ استخدم تعيين المجموعات (Azure) لترقية المستخدمين تلقائيًا إلى أدوار معلم أو مسؤول — انظر [Azure Entra ID](azure-entra-id.md) للتفاصيل حول ذلك وحول مطابقة المستخدمين الواردين مع الحسابات الموجودة.