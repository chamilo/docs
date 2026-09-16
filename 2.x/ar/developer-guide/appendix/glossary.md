# المصطلحات

مصطلحات تركز على المطورين والتي تُستخدم طوال هذا الدليل.

| المصطلح | التعريف |
|---------|---------|
| **API Platform** | إطار عمل PHP لبناء واجهات برمجة التطبيقات REST وGraphQL، مدمج مع Symfony. يستخدمه Chamilo لتوليد نقاط نهاية API تلقائيًا من كيانات Doctrine. |
| **Bundle** | وحدة تنظيمية في Symfony تشبه الإضافة أو الوحدة. يحتوي Chamilo على ثلاثة: CoreBundle، CourseBundle، LtiBundle. |
| **Composable** | نمط Vue 3 لاستخراج المنطق التفاعلي وإعادة استخدامه. مخزن في `assets/vue/composables/`. |
| **Doctrine ORM** | أداة ربط الكائنات بالعلاقات في PHP التي يستخدمها Chamilo. تربط فئات الكيانات PHP بجداول قاعدة البيانات. |
| **Entity** | فئة PHP مشروحة بخصائص Doctrine ترتبط بجدول قاعدة بيانات. |
| **Encore** | Symfony Webpack Encore — غلاف حول Webpack يبسّط تكوين بناء الواجهة الأمامية. |
| **Flysystem** | مكتبة تجريد نظام الملفات في PHP. يستخدمه Chamilo لدعم التخزين المحلي، S3، Azure، وGCS. |
| **JWT** | JSON Web Token — آلية المصادقة لواجهة برمجة التطبيقات REST. |
| **Pinia** | مكتبة إدارة الحالة الموصى بها لـ Vue 3. تُستخدم للمتاجر الجديدة في Chamilo؛ تظل متاجر Vuex القديمة إلى جانبها. |
| **PrimeVue** | مكتبة مكونات واجهة المستخدم Vue 3 التي يستخدمها Chamilo. توفر أزرارًا، جداول، حوارات، إلخ. |
| **ResourceNode** | الكيان المركزي في نظام الموارد في Chamilo. كل قطعة محتوى في الدورة لها ResourceNode. |
| **ResourceFile** | كيان يمثل ملفًا مرفقًا بـ ResourceNode. مخزن عبر Flysystem. |
| **ResourceLink** | كيان يتحكم في الرؤية والوصول حسب سياق الدورة/الجلسة/المجموعة. |
| **SCORM** | Sharable Content Object Reference Model. معيار تعليم إلكتروني لحزمة المحتوى. |
| **Settings Schema** | فئة PHP تحدد فئة من إعدادات المنصة (مثل SecuritySettingsSchema). |
| **Voter** | مكون أمان Symfony يقرر ما إذا كان المستخدم قادرًا على تنفيذ إجراء على مورد. |
| **Webpack** | أداة تجميع وحدات JavaScript التي تُجمّع مكونات Vue، SCSS، وTypeScript إلى حزم جاهزة للمتصفح. |
|