# إعدادات التتبع

الإعدادات الافتراضية المتعلقة بالتتبع — ما يتم تسجيله، ما هي التقارير المعروضة، قواعد حساب الوقت.

يمكن الوصول إلى هذه الإعدادات تحت **إدارة > إعدادات التكوين > التتبع**. تحتوي هذه الفئة على **10 إعدادات**، مدرجة أدناه مع العنوان والتعليق المرسل في إعدادات المنصة (`SettingsCurrentFixtures.php`).

> يتم عرض اسم المتغير في الكود بخط monospace. استخدمه عند البرمجة عبر `API` أو عند الحاجة إلى تغيير هذه الإعدادات على المستوى العام عن طريق تحرير [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## الإعدادات

### `block_my_progress_page`

**منع الوصول إلى 'تقدمي'**

في تنفيذات محددة مثل الامتحانات عبر الإنترنت، قد ترغب في منع وصول المستخدم إلى صفحة 'تقدمي'.

*الافتراضي: `false`*

### `footer_extra_content`

**محتوى إضافي في تذييل الصفحة**

يمكنك إضافة كود HTML مثل علامات meta

### `header_extra_content`

**محتوى إضافي في رأس الصفحة**

يمكنك إضافة كود HTML مثل علامات meta

### `meta_description`

**وصف meta**

سيظهر هذا وصف OpenGraph meta (og:description) في رؤوس موقعك

### `meta_image_path`

**مسار صورة meta**

هذا مسار الصورة meta هو مسار إلى ملف داخل دليل Chamilo الخاص بك (مثل home/image.png) يجب أن يظهر في بطاقة Twitter أو بطاقة OpenGraph عند عرض رابط إلى LMS الخاص بك. يوصي Twitter بصورة بحجم 120 × 120 بكسل، والتي قد تُقصّ أحيانًا إلى 120×90.

### `meta_title`

**عنوان meta OpenGraph**

سيظهر هذا عنوان OpenGraph meta (og:title) في رؤوس موقعك

### `meta_twitter_creator`

**حساب Twitter Creator**

حساب Twitter Creator هو حساب Twitter (مثل @ywarnier) يمثل *الشخص* الذي أنشأ الموقع. هذا الحقل اختياري.

### `meta_twitter_site`

**حساب Twitter Site**

حساب Twitter Site هو حساب Twitter (مثل @chamilo_news) مرتبط بموقعك. عادةً ما يكون حسابًا أكثر مؤقتًا من حساب Twitter Creator، أو يمثل كيانًا (بدلاً من شخص). هذا الحقل مطلوب إذا كنت تريد عرض حقول meta بطاقة Twitter.

### `my_progress_course_tools_order`

**ترتيب الأدوات في صفحة 'تقدمي'**

غيّر ترتيب الأدوات المعروضة في صفحة 'تقدمي' للمتعلمين. تشمل الخيارات 'quizzes'، 'learning_paths' و 'skills'.

### `tracking_skip_generic_data`

**تخطي البيانات العامة في صفحة تتبع المتعلم الذاتي**

إذا كانت صفحة 'تقدمي' تستغرق وقتًا طويلاً في التحميل، قد ترغب في إزالة معالجة الإحصاءات العامة للمستخدم. في هذه الحالة، فعّل هذا الإعداد.

*الافتراضي: `false`*