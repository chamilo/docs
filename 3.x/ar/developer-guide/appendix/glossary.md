# المسرد

مصطلحات موجّهة للمطوّرين مستخدمة في هذا الدليل.

| المصطلح | التعريف |
|------|-----------|
| **API Platform** | إطار عمل PHP لبناء واجهات REST وGraphQL، مدمج مع Symfony. يستخدمه Chamilo لتوليد نقاط نهاية واجهة البرمجة تلقائيًا من كيانات Doctrine. |
| **Bundle** | وحدة تنظيمية في Symfony شبيهة بالإضافة أو الوحدة. لدى Chamilo ثلاث وحدات: CoreBundle، وCourseBundle، وLtiBundle. |
| **Composable** | نمط في Vue 3 لاستخراج المنطق التفاعلي وإعادة استخدامه. يُخزَّن في `assets/vue/composables/`. |
| **Doctrine ORM** | رابط الكائنات بالعلاقات في PHP الذي يستخدمه Chamilo. يربط أصناف كيانات PHP بجداول قاعدة البيانات. |
| **Entity** | صنف PHP مُعلَّم بسمات Doctrine ويرتبط بجدول في قاعدة البيانات. |
| **Encore** | Symfony Webpack Encore — غلاف حول Webpack يبسّط إعداد بناء الواجهة الأمامية. |
| **Flysystem** | مكتبة تجريد لنظام الملفات في PHP. يستخدمها Chamilo لدعم التخزين المحلي وS3 وAzure وGCS. |
| **JWT** | JSON Web Token — آلية المصادقة لواجهة REST. |
| **Pinia** | مكتبة إدارة الحالة الموصى بها لـ Vue 3. تُستخدم للمتاجر الجديدة في Chamilo؛ وتبقى متاجر Vuex القديمة إلى جانبها. |
| **PrimeVue** | مكتبة مكوّنات واجهة المستخدم لـ Vue 3 التي يستخدمها Chamilo. توفّر أزرارًا وجداول ونوافذ حوار وغيرها. |
| **ResourceNode** | الكيان المركزي في نظام الموارد لدى Chamilo. لكل عنصر من محتوى المقرر ResourceNode. |
| **ResourceFile** | كيان يمثّل ملفًا مرفقًا بـ ResourceNode. يُخزَّن عبر Flysystem. |
| **ResourceLink** | كيان يتحكم في الرؤية والوصول حسب سياق المقرر/الجلسة/المجموعة. |
| **SCORM** | Sharable Content Object Reference Model. معيار للتعلّم الإلكتروني لتعبئة المحتوى. |
| **Settings Schema** | صنف PHP يعرّف فئة من إعدادات المنصة (مثل SecuritySettingsSchema). |
| **Voter** | مكوّن أمان في Symfony يقرر ما إذا كان المستخدم يستطيع تنفيذ إجراء على مورد. |
| **Webpack** | مجمّع وحدات JavaScript الذي يترجم مكوّنات Vue وSCSS وTypeScript إلى حزم جاهزة للمتصفح. |