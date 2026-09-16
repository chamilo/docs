# مكونات Vue

يحتوي Chamilo على مجموعة كبيرة من مكونات Vue منظمة حسب منطقة الميزة في `assets/vue/components/`.

## المكونات الأساسية

عائلة `Base*` في `assets/vue/components/basecomponents/` تغلف البدائيات PrimeVue مع الإعدادات الافتراضية الخاصة بـ Chamilo (تخطيط FloatLabel، أيقونات MDI عبر `chamiloIconToClass`، رسائل التحقق المتسقة، تحجيم Tailwind). استخدم دائمًا مكون `Base*` قبل استيراد البدائي PrimeVue الأساسي — هذا هو الطريقة التي يبقى بها الواجهة متسقة عبر SPA وكيف يمكن نشر التغييرات في التصميم من مكان واحد.

المكونات **غير** مسجلة عالميًا (البدائي PrimeVue الوحيد المسجل عالميًا هو `Column`، المستخدم داخل `BaseTable`). قم باستيراد كل واحد صراحةً:

```js
import BaseButton from "@/components/basecomponents/BaseButton.vue"
import BaseDialog from "@/components/basecomponents/BaseDialog.vue"
```

---
### مدخلات النماذج

معظمها يقبل القيمة عبر `v-model`، ويعرض خصائص `id` + `label` للوصولية/ربط التسمية العائمة، ويعرض التحقق من الصحة عبر زوج `isInvalid` / `errorText` (أو `messageText`).

| المكون                           | يغلف                                                 | الغرض                                                                                                                                                                                            |
|----------------------------------|------------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseInputText.vue`              | `InputText` + `FloatLabel`                           | مدخل نص سطر واحد. يتحول إلى تسمية ثابتة لمدخلات `date`/`time`/`datetime-local` (حيث تتداخل التسمية العائمة مع النص التوضيحي الأصلي).                                      |
| `BaseInputTextWithVuelidate.vue` | `BaseInputText`                                      | محول Vuelidate رفيع: ينقل `$error` إلى `isInvalid` ويعرض `$errors[].$message` في فتحة `errors`. اقرنه بكائن حقل Vuelidate.                                             |
| `BaseTextArea.vue`               | `Textarea` + `FloatLabel`                            | مدخل نص متعدد الأسطر.                                                                                                                                                                             |
| `BaseTextAreaWithVuelidate.vue`  | `BaseTextArea`                                       | نفس نمط محول Vuelidate كما في `BaseInputTextWithVuelidate`.                                                                                                                                    |
| `BaseInputNumber.vue`            | `InputNumber`                                        | مدخل رقمي مع `min` / `max` / `step` وأزرار الدوران.                                                                                                                                     |
| `BaseInputTags.vue`              | (مخصص)                                             | رقائق علامات نص حر؛ تُضاف العلامات عند الضغط على إدخال/فاصلة وتُزال عند الضغط على backspace.                                                                                                                       |
| `BaseInputGroup.vue`             | `InputGroup` + `BaseButton`                          | مدخل نص مقترن بزر عمل (نمط البحث).                                                                                                                                            |
| `BaseCheckbox.vue`               | `Checkbox`                                           | مربع اختيار ثنائي أو مقيد بالقيمة مع تسمية.                                                                                                                                                         |
| `BaseRadioButtons.vue`           | `RadioButton`                                        | مجموعة أزرار راديو مدفوعة بمصفوفة `options: [{label, value}]`.                                                                                                                             |
| `BaseToggleButton.vue`           | `BaseButton`                                         | زر بحالتين (تسميات وأيقونات مفتوح/مغلق) مقيد عبر `v-model`.                                                                                                                              |
| `BaseCalendar.vue`               | `DatePicker` + `FloatLabel`                          | منتقي تاريخ / تاريخ-وقت. يحترم `platform.timepicker_increment` وإعدادات المستخدم عبر `calendarLocales`.                                                                                       |
| `BaseColorPicker.vue`            | native `<input type="color">` + `InputText`          | منتقي ألوان مع خيار نص hex احتياطي؛ يستخدم `colorjs.io` للتحقق من إدخال hex يدوي.                                                                                                               |
| `BaseRating.vue`                 | `Rating`                                             | مدخل تقييم بالنجوم.                                                                                                                                                                                 |
| `BaseFileUpload.vue`             | native `<input type="file">` + `BaseButton`          | منتقي ملف واحد يُطلق زر نمط المرفق.                                                                                                                                       |
| `BaseFileUploadMultiple.vue`     | native `<input type="file" multiple>` + `BaseButton` | النسخة المتعددة للملفات من `BaseFileUpload`.                                                                                                                                                            |
| `BaseUploader.vue`               | Uppy `Dashboard`                                     | محمّل Uppy كامل (كاميرا ويب، صوت، محرر صور، رفع XHR) مع اللغات المرتبطة بـ `appLocale` الحالي. استخدم هذا للرفع الغني مع التقدم؛ استخدم `BaseFileUpload*` للمرفقات البسيطة. |

---
### التحديد والإكمال التلقائي

| المكون                  | يغلف                     | الغرض                                                                                                                            |
|-------------------------|--------------------------|---------------------------------------------------------------------------------------------------------------------------------|
| `BaseSelect.vue`       | `Dropdown` + `FloatLabel`    | قائمة منسدلة للاختيار الواحد مع زر مسح اختياري.                                                                                |
| `BaseMultiSelect.vue`  | `MultiSelect` + `FloatLabel` | قائمة منسدلة للاختيار المتعدد تعرض العناصر المحددة كشرائح.                                                                      |
| `BaseSearchSelect.vue` | `Dropdown` with `filter`     | قائمة منسدلة للاختيار الواحد مع مربع بحث مدمج، وتمرير افتراضي اختياري، وقالب خيار من سطرين (`label` + `sublabel`). |
| `BaseAutocomplete.vue` | `AutoComplete`               | إكمال تلقائي غير متزامن (الحد الأدنى 3 أحرف). يدعم الاختيار الواحد أو المتعدد وفتحة `chip` لتخصيص الشرائح.                  |
| `BaseUserFinder.vue`   | `BaseTable` + `userService`  | جدول بحث عن المستخدمين مع ترقيم الصفحات وتحديد الصفوف. استخدمه عندما يحتاج ميزة إلى أداة اختيار مستخدمين على طراز المسؤول.                           |

### الأزرار والإجراءات

| المكون                              | يغلف               | الغرض                                                                                                                                                                                                                                                                                                                                                     |
|-------------------------------------|--------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseButton.vue`                    | `Button` (PrimeVue) | زر Chamilo القياسي. يحل الأيقونات عبر `chamiloIconToClass`، يُطبّع `type` إلى `severity`/`variant` الخاص بـ PrimeVue، يعرض `BaseAppLink` داخليًا عند إعطاء `route` أو `toUrl` (لذا يتعامل نفس المكون مع حالات router-link و anchor والزر العادي). القيم المقبولة لـ `type` مدرجة في `validators.js` → `buttonTypeValidator`. |
| `BaseAdvancedSettingsButton.vue`    | `BaseButton`        | زر كشف يُقلب لوحة "الإعدادات المتقدمة" الموضعية عبر `v-model`.                                                                                                                                                                                                                                                                           |
| `BaseToolbar.vue`                   | `Toolbar`           | شريط أدوات إجراءات مع فتحات `start` / `end` (أو فتحة افتراضية واحدة). `showTopBorder` اختياري لتنسيق فاصل.                                                                                                                                                                                                                                       |

---

---
### العرض والتعليمات البرمجية

| Component            | Wraps                       | Purpose                                                                                                                                                                                         |
|----------------------|-----------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTable.vue`      | `DataTable` (PrimeVue)      | جدول بيانات Chamilo القياسي. يدعم وضع الخادم (`lazy`)، وفرز متعدد الأعمدة، ومرشح عام، وتحديد الصفوف، وترقيم الصفحات. مرر الأعمدة كأطفال `<Column>` (مسجلة عالميًا). |
| `BaseCard.vue`       | `Card`                      | غلاف بطاقة يقوم بتوجيه فتحات `header`، `title`، `subtitle`، `footer`، والافتراضية (المحتوى).                                                                                                |
| `BaseChart.vue`      | `Chart`                     | إعداد مسبق لرسم بياني دائري. مرر كائن `data` متوافق مع Chart.js.                                                                                                                                     |
| `BaseChip.vue`       | `Chip`                      | رقاقة مرسومة من كائن `{value, labelField, imageField}`، مع زر إزالة اختياري.                                                                                                     |
| `BaseTag.vue`        | `Tag`                       | وسم تسمية ملون. يعيّن `warning` الخاص بـ Chamilo إلى `warn` الخاص بـ PrimeVue.                                                                                                                               |
| `BaseAvatarList.vue` | `Avatar` + `BaseUserAvatar` | صف صور رمزية مع عداد فائض (مثل "+3")؛ مدفوع بـ `useAvatarList`.                                                                                                                        |
| `BaseUserAvatar.vue` | `Avatar`                    | صورة رمزية للمستخدم مع بديل صورة، وحالات تحميل، وتسمية يمكن الوصول إليها.                                                                                                                           |
| `BaseIcon.vue`       | `<i class="mdi …">`         | مُرَسِّم أيقونات Chamilo. يضيف شارة اختيارية (نص أو أيقونة)، وتلميح أداة، ومعدِّل حجم. مرر دائمًا اسمًا دلاليًا لـ Chamilo (مثل `"edit"`)، وليس فئة MDI خام.                             |
| `BaseIconField.vue`  | `IconField` + `InputText`   | مدخل بحث مع أيقونة مكبر عدسة رئيسية.                                                                                                                                                     |
| `BaseDivider.vue`    | `Divider`                   | فاصل أفقي أو عمودي، مع عنوان اختياري ومحاذاة.                                                                                                                              |

### التنقل والقوائم

| Component                  | Wraps                   | Purpose                                                                                                                                                                                 |
|----------------------------|-------------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseMenu.vue`             | `Menu` (popup)          | قائمة منبثقة تفهم مسارات الراوتر داخل عناصر `model[]`.                                                                                                                       |
| `BaseDropdownMenu.vue`     | (custom)                | مشغِّل قائمة منسدلة خفيف الوزن مع تنسيق فتح واحد (فتح واحد يغلق الآخرين).                                                                                             |
| `BaseContextMenu.vue`      | (custom)                | قائمة سياق نقر يمين / موقعة، يتم التحكم فيها بواسطة `visible` + `position`.                                                                                                            |
| `BaseSidebarPanelMenu.vue` | `PanelMenu`             | قائمة تنقل على شكل أكورديون مستخدمة في الأشرطة الجانبية؛ تتبع تلقائيًا مفاتيح الموسعة من النموذج.                                                                                             |
| `BaseRouteTabs.vue`        | صف `BaseAppLink`       | شريط علامات تبويب حيث تكون كل علامة تبويب رابط راوتر. يتم تمييز العلامة النشطة تلقائيًا بناءً على المسار الحالي.                                                                        |
| `BaseAppLink.vue`          | `RouterLink` *or* `<a>` | رابط ذكي: يرسم `<a>` عند تعيين `url` (خارجي/قديم)، وإلا `<RouterLink>` لـ Vue Router. استخدمه بدلاً من أي بدائي ليبقى الربط الداخلي/الخارجي موحدًا. |

---
### الحوارات

`BaseDialog` هي الأساس؛ تتكون المكونات الأخرى فوقها لتدفقات التأكيد/الإلغاء والحذف الشائعة.

| المكون                        | يغلف                     | الغرض                                                                                                                             |
|-------------------------------|---------------------------|-------------------------------------------------------------------------------------------------------------------------------------|
| `BaseDialog.vue`              | `Dialog`                  | حوار modal مع رأس بعنوان (أيقونة `headerIcon` اختيارية) وجسم/تذييل مفصول. حالة الفتح هي `defineModel("isVisible")`.      |
| `BaseDialogConfirmCancel.vue` | `BaseDialog`              | حوار تأكيد/إلغاء مع زرين. نوع التأكيد `type` (شدة) وقابل للتكوين والأيقونة؛ يصدر `confirmClicked` / `cancelClicked`. |
| `BaseDialogDelete.vue`        | `BaseDialogConfirmCancel` | حوار جاهز "هل أنت متأكد من رغبتك في حذف هذا العنصر؟" مع زر تأكيد بأسلوب خطر.                                   |

### المحرر والمحتوى الغني

| المكون               | يغلف                                           | الغرض                                                                                                                                                              |
|----------------------|-------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTinyEditor.vue` | TinyMCE (عبر `components/Editor` في المشروع) | محرر نص غني مع `FloatLabel`، تتبع حالة التركيز/الفراغ، وتكامل مع سياق المقرر الحالي (`cidReq`). استخدمه لأي حقل HTML يُنشئه المستخدم. |

### المساعدات

| الملف              | الغرض                                                                                                                                                                                                                                                          |
|-------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `ChamiloIcons.js` | يربط أسماء الأيقونات الدلالية (`edit`، `delete`، `eye-on`، `courses`، …) بفئات CSS MDI. ~127 مدخل. تصفحها في `/admin/list-icons` على نسخة تعمل.                                                                                                  |
| `validators.js`   | مصادقي خصائص مشتركة: `iconValidator` (يجب أن يكون اسم أيقونة Chamilo معروف)، `sizeValidator` (`normal` / `small` / `large`)، `buttonTypeValidator` (أنواع `BaseButton` المسموحة). استوردها عند تعريف مكونات `Base*` جديدة تُعكس هذه الاتفاقيات. |

### الاتفاقيات عبر مكونات Base

* **v-model عبر `defineModel()`** — القيمة (وغالبًا `isVisible`، `filters`، `selectedItems`) مُعروضة كنماذج؛ مررها بـ `v-model[:name]` بدلاً من `:prop` + `@update:prop`.
* **تسميات عائمة** — معظم حقول النموذج تغلف الإدخال في PrimeVue `FloatLabel variant="on"`. قدم `label` (النص المعروض) و `id` (يُستخدم لربط `<label for>`).
* **رسائل التحقق** — الحقول تُعرض `isInvalid` ورسالة صغيرة أسفل الإدخال (`errorText`، `messageText`، أو `smallText` حسب المكون). توجد متغيرات مدركة لـ Vuelidate للأكثر شيوعًا.
* **الأيقونات** — مرر أسماء Chamilo الدلالية، لا فئات MDI الخام. تقوم المكونات بتحليلها عبر `chamiloIconToClass`.
* **الأحجام** — `size="normal" | "small" | "large"` هي خاصية التحجيم التقليدية (انظر `sizeValidator`).
* **التكوين بدلاً من التكرار** — `BaseDialogDelete` يغلف `BaseDialogConfirmCancel`، الذي يغلف `BaseDialog`؛ `BaseToggleButton` و `BaseAdvancedSettingsButton` يغلفان `BaseButton`. عند الحاجة إلى متغير متكرر لمكون موجود، فضّل تكوين `Base*` جديد فوقه بدلاً من إعادة تنفيذه في مجلد ميزة.

## مكونات التخطيط

موجودة في `components/layout/`:

| المكون                | الغرض |
|-----------|---------|
| `DashboardLayout.vue` | التخطيط الرئيسي: شريط علوي + شريط جانبي + منطقة المحتوى |
| `Sidebar.vue` | لوحة التنقل اليسرى (قابلة للطي) |
| `TopbarLoggedIn.vue` | شريط علوي مع الشعار، صندوق الوارد، الصورة الشخصية |

---
## مكونات مناطق الميزات

| المجلد | المكونات | الغرض |
|--------|----------|-------|
| `course/` | بطاقات الدورات، فلاتر الكتالوج، نماذج الدورات | قائمة الدورات وإدارتها |
| `session/` | بطاقات الجلسات، كتالوج | قائمة الجلسات |
| `assignments/` | قوائم التقديمات، نماذج التقييم، النماذج | سير عمل المهام |
| `chat/` | DockedChat، رسائل الدردشة | الدردشة في الوقت الفعلي والمدرس الذكي الاصطناعي |
| `filemanager/` | CourseDocuments، PersonalFiles | متصفح الملفات وإدارتها |
| `installer/` | Step1-Step7، EmailSettings | معالج التثبيت |
| `social/` | GroupInfoCard، منشورات الشبكة الاجتماعية | ميزات الشبكة الاجتماعية |
| `attendance/` | AttendanceTable | تتبع الحضور |
| `usergroup/` | GroupMembers | إدارة مجموعات المستخدمين |

## نظام الأيقونات

تستخدم الأيقونات **Material Design Icons (MDI)** كمكتبة الأيقونات الوحيدة: `<i class="mdi mdi-pencil"></i>`

يوفر ملف `ChamiloIcons.js` تعيينًا دلاليًا:

```javascript
export const chamiloIconToClass = {
  "edit": "mdi mdi-pencil",
  "delete": "mdi mdi-delete",
  "eye-on": "mdi mdi-eye",
  "courses": "mdi mdi-book-open-page-variant",
  // ... 127 mappings
}
```

يستخدم المكونات `BaseIcon` أو يشير إلى `chamiloIconToClass` لعرض الأيقونات بشكل متسق.

يمكن العثور على مرجع قابل للتصفح لجميع الأيقونات المتاحة في المنصة عند `/admin/list-icons` في أي نسخة Chamilo تعمل.

## أنماط المكونات

* **Composition API** — يستخدم المكونات بنية `<script setup>` في Vue 3
* **PrimeVue integration** — استخدام مكثف لمكونات PrimeVue (Button، DataTable، Dialog، Menu، إلخ)
* **Axios for API calls** — طلبات HTTP إلى واجهة برمجة التطبيقات الخلفية
* **Vue I18n** — جميع النصوص المواجهة للمستخدم تستخدم مفاتيح الترجمة