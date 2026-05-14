# LDAP

يُمكن لـ Chamilo التحقق من هوية المستخدمين عبر خادم LDAP، بما في ذلك Microsoft Active Directory. يتم تكوين LDAP في `config/authentication.yaml`.

## Konfigurasi

```yaml
authentication:
  1:
    ldap:
      main:
        enabled: true
        title: "Masuk dengan LDAP"
        connection_string: "ldap://ldap.yourorg.com:389"
        protocol_version: 3
        referrals: false
        force_as_login_method: false
```

### Bind dan Pencarian

هناك نهاران للعثور على المستخدمين في الدليل:

**Direct bind** — بناء DN من اسم المستخدم مباشرة:

```yaml
        dn_string: "uid=%s,ou=people,dc=yourorg,dc=com"
```

**Search bind** — البحث في الدليل باستخدام حساب الخدمة أولاً، ثم الربط كمستخدم تم العثور عليه:

```yaml
        base_dn: "dc=yourorg,dc=com"
        search_dn: "cn=readonly,dc=yourorg,dc=com"
        search_password: "service-account-password"
        query_string: "(uid=%s)"
        uid_key: "uid"
```

بالنسبة لـ Active Directory، استخدم `sAMAccountName` كـ `uid_key` واضبط `query_string` إلى `(sAMAccountName=%s)`.

### Pemetaan Atribut

قم بتعيين سمات LDAP إلى حقول مستخدمي Chamilo تحت `data_correspondence`:

```yaml
        data_correspondence:
          firstname: givenName
          lastname: sn
          email: mail
          phone: telephoneNumber   # opsional
          locale: preferredLanguage  # opsional
```

`firstname`، `lastname`، و `email` إلزامية. يتم مطابقة المستخدمين مع حسابات Chamilo الموجودة بناءً على البريد الإلكتروني أو اسم المستخدم؛ إذا لم يتم العثور على تطابق وكان `allow_create_new_users` يساوي true، سيتم إنشاء حساب جديد.

## Tips

* **استخدم LDAPS في بيئة الإنتاج** — غيّر `ldap://` إلى `ldaps://` (المنفذ 636) للاتصال المشفر.
* **حساب الخدمة** — حساب search bind يحتاج فقط إلى وصول للقراءة إلى إدخالات المستخدمين.
* **اختبر أولاً** — تحقق من سلسلة الاتصال والاستعلام الخاص بك باستخدام `ldapsearch` قبل تكوين Chamilo.
* **`force_as_login_method: true`** — يخفي طرق تسجيل الدخول الأخرى ويجبر جميع المستخدمين على المرور عبر LDAP. اتركه `false` أثناء الاختبار حتى تتمكن من تسجيل الدخول كمسؤول عبر النموذج القياسي.

للرجوع إلى معلمات كاملة، انظر [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).