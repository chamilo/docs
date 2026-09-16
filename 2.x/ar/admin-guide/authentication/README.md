# Autentikasi

Chamilo يدعم مجموعة متنوعة من طرق المصادقة، بدءًا من النظام الداخلي المبني على اسم المستخدم/كلمة المرور وصولاً إلى حلول تسجيل الدخول الموحد للشركات.

## ملفات التكوين

يتم تكوين جميع طرق المصادقة الخارجية في `config/authentication.yaml`. يتم توفير قالب في `config/authentication.dist.yaml`. هيكلها العام هو:

```yaml
parameters:
  authentication:
    <access_url_id>:
      <auth_method>:
        <provider_name>:
          <config_key>: <value>
```

بعد تحرير الملف، قم بمسح الذاكرة المؤقتة وتسخينها:

```bash
php bin/console cache:clear
php bin/console cache:warmup
```

ستظهر أزرار تسجيل الدخول الخارجية في صفحة تسجيل الدخول بعد تحديث الذاكرة المؤقتة.

## الطرق المدعومة

* **[OAuth2](oauth2.md)** — Azure AD، Keycloak، Facebook، ومزودي OAuth2 العامة
* **[LDAP](ldap.md)** — المصادقة ضد خادم LDAP أو Active Directory
* **[CAS](cas.md)** — Central Authentication Service (قديم، غير مدعوم في الإصدار 2.x)
* **[SCIM](scim.md)** — توفير المستخدمين تلقائيًا من مزودي الهوية الخارجيين
* **[تكوين SSO](sso-configuration.md)** — ملاحظات استكشاف الأخطاء وعبر الطرق

## المصادقة الافتراضية

افتراضيًا، يستخدم Chamilo نظامه الداخلي الخاص — يدخل المستخدمون باستخدام اسم المستخدم وكلمة المرور المخزنة في قاعدة بيانات Chamilo. الطرق الخارجية إضافية: يظل نموذج تسجيل الدخول القياسي متاحًا إلى جانب المزودين المُكوَّنين.

## مراجع إضافية

للحصول على مرجع كامل للمعاملات وسيناريوهات متقدمة، انظر [صفحة ويكي تكوين المصادقة الخارجية](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).