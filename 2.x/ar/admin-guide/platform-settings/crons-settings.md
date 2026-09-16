# إعدادات المهام المجدولة (Cron Jobs)

تكوين المهام المجدولة (مهام cron) المضمنة مع Chamilo.

الوصول إلى هذه الإعدادات تحت **إدارة > إعدادات التكوين > المهام المجدولة (Cron Jobs)**. تحتوي هذه الفئة على **3 إعدادات**، مدرجة أدناه مع العنوان والتعليق المضمنين في إعدادات المنصة (`SettingsCurrentFixtures.php`).

> يتم عرض اسم المتغير في الكود بخط monospace. استخدمه عند البرمجة عبر API أو عند الحاجة إلى تغيير هذه الإعدادات على المستوى العام عن طريق تحرير [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## الإعدادات

### `cron_remind_course_expiration_activate`

**مهمة تذكير انتهاء صلاحية الدورة cron**

تمكين مهمة تذكير انتهاء صلاحية الدورة cron

*افتراضي: `false`*

### `cron_remind_course_expiration_frequency`

**التكرار لمهمة تذكير انتهاء صلاحية الدورة cron**

عدد الأيام قبل انتهاء صلاحية الدورة للنظر في إرسال بريد تذكيري

### `cron_remind_course_finished_activate`

**إرسال إشعار انتهاء الدورة**

هل يتم إرسال بريد إلكتروني إلى الطلاب عند انتهاء دورتهم (جلسة). يتطلب ذلك تكوين مهام cron (انظر مجلد main/cron/).

*افتراضي: `false`*