# OnlyOffice

تتيح تكامل **OnlyOffice** للمستخدمين تحرير المستندات (Word وExcel وPowerPoint) مباشرة في المتصفح داخل Chamilo، دون تنزيلها.

## ما يوفّره OnlyOffice

* **تحرير المستندات** — تحرير ملفات .docx و.xlsx و.pptx في المتصفح
* **توافق الصيغ** — توافق كامل مع صيغ Microsoft Office
* **لا حاجة لبرامج سطح المكتب** — كل شيء يعمل في المتصفح

> يعتمد التحرير التعاوني في الوقت الفعلي على OnlyOffice Document Server نفسه؛ يفتح مكوّن Chamilo الإضافي المستندات ويحفظها عبر الخادم لكنه لا يضيف هذه القدرة ولا يقيّدها.

## الإعداد

1. ثبّت **OnlyOffice Document Server** على خادمك (أو استخدم خدمة OnlyOffice السحابية)
2. في إعدادات منصة Chamilo، اضبط:
   * **OnlyOffice Document Server URL** — عنوان خادم OnlyOffice الخاص بك
   * **Secret key** — للتواصل الآمن بين Chamilo وOnlyOffice
3. فعّل التكامل

## كيف يعمل

بعد الإعداد، يرى المستخدمون خيار **Edit with OnlyOffice** عند عرض أنواع المستندات المدعومة في أداة Documents. يؤدي النقر عليه إلى فتح المستند في محرر OnlyOffice داخل واجهة Chamilo.

تُحفظ التغييرات تلقائيًا في مخزن مستندات Chamilo.

## نصائح

* **يُوصى بخادم منفصل** — مثل BigBlueButton، ينبغي تشغيل OnlyOffice Document Server على خادم خاص به للحصول على أفضل أداء
* **HTTPS مطلوب** — ينبغي تقديم كل من Chamilo وOnlyOffice عبر HTTPS حتى يعمل التكامل
* **تحقق من الصيغ** — يعمل OnlyOffice بأفضل شكل مع صيغ Office ‏(.docx و.xlsx و.pptx). قد تكون صيغ أخرى ذات دعم تحرير محدود.