# OnlyOffice

تتيح تكامل **OnlyOffice** للمستخدمين تحرير المستندات (Word، Excel، PowerPoint) مباشرة في المتصفح داخل Chamilo، دون الحاجة إلى تنزيلها.

## ما يوفره OnlyOffice

* **تحرير المستندات** — تحرير ملفات .docx، .xlsx، .pptx في المتصفح
* **توافق الصيغ** — توافق كامل مع صيغ Microsoft Office
* **لا حاجة لبرمجيات سطح المكتب** — يعمل كل شيء في المتصفح

> يعتمد تحرير التعاون في الوقت الفعلي على خادم OnlyOffice Document Server نفسه؛ يقوم إضافة Chamilo بفتح المستندات وحفظها عبر الخادم لكنه لا يضيف أو يقيد تلك الإمكانية.

## الإعداد

1. قم بتثبيت **OnlyOffice Document Server** على خادمك (أو استخدم خدمة OnlyOffice السحابية)
2. في إعدادات منصة Chamilo، قم بالتكوين:
   * **OnlyOffice Document Server URL** — عنوان خادم OnlyOffice الخاص بك
   * **Secret key** — للاتصال الآمن بين Chamilo وOnlyOffice
3. فعّل التكامل

## كيفية العمل

بمجرد الإعداد، يرى المستخدمون خيار **Edit with OnlyOffice** عند عرض أنواع المستندات المدعومة في أداة Documents. النقر عليه يفتح المستند في محرر OnlyOffice داخل واجهة Chamilo.

يتم حفظ التغييرات تلقائيًا في تخزين مستندات Chamilo.

## نصائح

* **خادم منفصل موصى به** — مثل BigBlueButton، يجب تشغيل OnlyOffice Document Server على خادم خاص به للحصول على أفضل أداء
* **HTTPS مطلوب** — يجب تقديم كل من Chamilo وOnlyOffice عبر HTTPS ليعمل التكامل
* **تحقق من الصيغ** — يعمل OnlyOffice بشكل أفضل مع صيغ Office (.docx، .xlsx، .pptx). قد تكون الدعم لتحرير الصيغ الأخرى محدودًا.