# إعدادات CAS

تهيئة CAS (خدمة المصادقة المركزية) الموروثة المنقولة من Chamilo 1.x. راجع [CAS](../authentication/cas.md) للاطلاع على الحالة الحالية لمصادق CAS في Chamilo 3.x.

يمكنك الوصول إلى هذه الإعدادات ضمن **الإدارة > إعدادات التهيئة > CAS**. تحتوي هذه الفئة على **7 إعدادات**، مدرجة أدناه مع العنوان والتعليق المُدرَجين في تجهيزات إعدادات المنصة (`SettingsCurrentFixtures.php`).

> يُعرض اسم المتغير في الشيفرة بخط أحادي المسافة. استخدمه عند البرمجة النصية عبر واجهة API أو عندما تحتاج إلى تغيير تلك الإعدادات على المستوى العام بتحرير [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## الإعدادات

### `cas_activate`

**تفعيل مصادقة CAS**

سيتيح تفعيل مصادقة CAS للمستخدمين المصادقة ببيانات اعتماد CAS الخاصة بهم.<br/>انتقل إلى <a href='settings.php?category=CAS'>الإضافة</a> لإضافة زر «تسجيل دخول CAS» قابل للتهيئة لحرم Chamilo الخاص بك. أو يمكنك فرض مصادقة CAS بتعيين cas[force_redirect] في app/config/auth.conf.php.

### `cas_add_user_activate`

**تفعيل إضافة مستخدم CAS**

تفعيل إضافة مستخدم CAS. لإنشاء حساب المستخدم من دليل LDAP، يجب ملء جدولي extldap_config وextldap_user_correspondance في app/config/auth.conf.php

### `cas_port`

**منفذ خادم CAS الرئيسي**

المنفذ الذي يتم الاتصال عبره بخادم CAS الرئيسي

### `cas_protocol`

**بروتوكول خادم CAS الرئيسي**

البروتوكول الذي نتصل به بخادم CAS

### `cas_server`

**خادم CAS الرئيسي**

هذا هو خادم CAS الرئيسي الذي سيُستخدم للمصادقة (عنوان IP أو اسم المضيف)

### `cas_server_uri`

**مسار URI لخادم CAS الرئيسي**

المسار إلى خدمة CAS

### `update_user_info_cas_with_ldap`

**تحديث معلومات حساب المستخدم المصادق عبر CAS من LDAP**

يضمن أن يكون الاسم الأول واسم العائلة وعنوان البريد الإلكتروني للمستخدم مطابقة للقيم الحالية في دليل LDAP