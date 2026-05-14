# إعدادات CAS

إعدادات CAS (Central Authentication Service) القديمة المحمولة من Chamilo 1.x. انظر [CAS](../authentication/cas.md) للحالة الحالية لمصادق CAS في Chamilo 2.x.

الوصول إلى هذه الإعدادات تحت **إدارة > إعدادات التكوين > CAS**. تحتوي هذه الفئة على **7 إعدادات**، مدرجة أدناه مع العنوان والتعليق المرسل في إعدادات المنصة (`SettingsCurrentFixtures.php`).

> اسم المتغير في الكود موضح بحرف monospace. استخدمه عند البرمجة عبر API أو عند الحاجة إلى تغيير هذه الإعدادات على المستوى العام بتحرير [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## الإعدادات

### `cas_activate`

**تفعيل مصادقة CAS**

تفعيل مصادقة CAS سيسمح للمستخدمين بالمصادقة باستخدام بيانات اعتمادهم CAS.<br/>اذهب إلى <a href='settings.php?category=CAS'>Plugin</a> لإضافة زر "CAS Login" قابل للتكوين للحرم الجامعي Chamilo الخاص بك. أو يمكنك فرض مصادقة CAS بتعيين cas[force_redirect] في app/config/auth.conf.php.

### `cas_add_user_activate`

**تفعيل إضافة مستخدم CAS**

تفعيل إضافة مستخدم CAS. لإنشاء حساب المستخدم من دليل LDAP، يجب ملء جداول extldap_config و extldap_user_correspondance في app/config/auth.conf.php

### `cas_port`

**منفذ خادم CAS الرئيسي**

المنفذ الذي يتم الاتصال به لخادم CAS الرئيسي

### `cas_protocol`

**بروتوكول خادم CAS الرئيسي**

البروتوكول الذي نتصل به إلى خادم CAS

### `cas_server`

**خادم CAS الرئيسي**

هذا هو خادم CAS الرئيسي الذي سيتم استخدامه للمصادقة (عنوان IP أو اسم المضيف)

### `cas_server_uri`

**URI خادم CAS الرئيسي**

المسار إلى خدمة CAS

### `update_user_info_cas_with_ldap`

**تحديث معلومات حساب المستخدم المصادق عليه بـ CAS من LDAP**

يضمن أن اسم المستخدم الأول، الاسم الأخير وعنوان البريد الإلكتروني هم نفس القيم الحالية في دليل LDAP