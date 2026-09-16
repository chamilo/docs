# LDAP

يمكن لـ Chamilo مصادقة المستخدمين مقابل خادم LDAP، بما في ذلك Microsoft Active Directory. يُضبط LDAP في `config/authentication.yaml`.

## Configuration

```yaml
authentication:
  1:
    ldap:
      main:
        enabled: true
        title: "Sign in with LDAP"
        connection_string: "ldap://ldap.yourorg.com:389"
        protocol_version: 3
        referrals: false
        force_as_login_method: false
```

### الربط والبحث

نهجان لتحديد موقع المستخدم في الدليل:

**الربط المباشر** — يبني DN مباشرة من اسم المستخدم:

```yaml
        dn_string: "uid=%s,ou=people,dc=yourorg,dc=com"
```

**ربط البحث** — يبحث في الدليل أولاً بحساب خدمة، ثم يربط بصفته المستخدم الذي تم العثور عليه:

```yaml
        base_dn: "dc=yourorg,dc=com"
        search_dn: "cn=readonly,dc=yourorg,dc=com"
        search_password: "service-account-password"
        query_string: "(uid=%s)"
        uid_key: "uid"
```

بالنسبة إلى Active Directory، استخدم `sAMAccountName` كـ `uid_key` وعدّل `query_string` إلى `(sAMAccountName=%s)`.

### تعيين السمات

عيّن سمات LDAP إلى حقول مستخدم Chamilo تحت `data_correspondence`:

```yaml
        data_correspondence:
          firstname: givenName
          lastname: sn
          email: mail
          phone: telephoneNumber   # optional
          locale: preferredLanguage  # optional
```

الحقول `firstname` و`lastname` و`email` مطلوبة. يُطابق المستخدم بحساب Chamilo موجود عبر البريد الإلكتروني أو اسم المستخدم؛ وإذا لم يُعثر على تطابق وكان `allow_create_new_users` بقيمة true، يُنشأ حساب جديد.

## نصائح

* **استخدم LDAPS في الإنتاج** — بدّل `ldap://` إلى `ldaps://` (المنفذ 636) للاتصالات المشفّرة.
* **حساب الخدمة** — يحتاج حساب ربط البحث إلى صلاحية قراءة إدخالات المستخدمين فقط.
* **اختبر أولاً** — تحقق من سلسلة الاتصال والاستعلام باستخدام `ldapsearch` قبل ضبط Chamilo.
* **`force_as_login_method: true`** — يخفي طرق تسجيل الدخول الأخرى ويجبر جميع المستخدمين على المرور عبر LDAP. اتركه `false` أثناء الاختبار حتى تتمكن من تسجيل الدخول كمسؤول عبر النموذج القياسي.

للاطلاع على المرجع الكامل للمعلمات، انظر [الويكي](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).