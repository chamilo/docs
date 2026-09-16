# إعداد البريد الإلكتروني

يدير Chamilo الآن إعداد إرسال الرسائل الإلكترونية من لوحة تحكم الإدارة، قسم إعدادات المنصة (هناك مدخل مخصص للبريد الإلكتروني). تُرسل الرسائل عند إنشاء الحسابات، وإعادة تعيين كلمات المرور، وإشعارات المقررات، وتنبيهات الرسائل، وغيرها من أحداث المنصة. يُضبط تسليم البريد عبر إعداد التكوين `MAILER_DSN`.

## الإعداد

اضبط خيار `Mail DSN` في القسم /admin/settings/mail. يعتمد التنسيق على وسيلة النقل المستخدمة للبريد.

### SMTP

الإعداد الأكثر شيوعًا، مناسب لأي خادم SMTP:

```bash
# Let the system decide
native://default

# Basic SMTP
smtp://username:password@smtp.example.com:587

# SMTP with TLS (most providers)
smtp://username:password@smtp.example.com:587?encryption=tls

# SMTP without authentication (local relay)
smtp://localhost:25
```

استبدل `username` و`password` والمضيف ببيانات اعتماد خادم SMTP الخاص بك.

### Amazon SES

```bash
# Using SMTP interface
ses+smtp://ACCESS_KEY:SECRET_KEY@default?region=us-east-1

# Using API
ses+api://ACCESS_KEY:SECRET_KEY@default?region=us-east-1
```

نقل Symfony Amazon Mailer مضمَّن في Chamilo. لا يلزم تثبيت إضافي.

### Mailjet

```bash
mailjet+api://API_KEY:SECRET_KEY@default
```

نقل Symfony Mailjet مضمَّن في Chamilo. لا يلزم تثبيت إضافي.

### Brevo (formerly Sendinblue)

```bash
brevo+api://API_KEY@default
```

نقل Symfony Brevo مضمَّن في Chamilo. لا يلزم تثبيت إضافي.

### Microsoft 365 / Outlook (Microsoft Graph API)

تتوقف Microsoft عن دعم SMTP بالمصادقة الأساسية في Exchange Online، لذا يعمل DSN من النوع `smtp://user:password@smtp.office365.com:587` فقط طالما أبقى مسؤول المستأجر خيار "Authenticated SMTP" مفعّلًا صراحة على ذلك الصندوق البريدي المحدد. أرسل عبر Microsoft Graph API بدلًا من ذلك — فهو لا يستخدم SMTP على الإطلاق:

```bash
microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@default?tenantId=TENANT_ID
```

نقل Symfony Microsoft Graph مضمَّن في Chamilo. لا يلزم تثبيت إضافي.

للحصول على هذه القيم الثلاث، في [مركز إدارة Microsoft Entra](https://entra.microsoft.com):

1. سجّل تطبيقًا. **معرّف التطبيق (العميل)** و**معرّف الدليل (المستأجر)** هما `CLIENT_ID` و`TENANT_ID`.
2. ضمن *أذونات API*، أضف إذن Microsoft Graph من نوع **تطبيق** `Mail.Send` (وليس الإذن المفوَّض)، ثم امنح موافقة المسؤول.
3. ضمن *الشهادات والأسرار*، أنشئ سر عميل. **قيمته** (وليس معرّفه) هي `CLIENT_SECRET`.

ملاحظات:

* رمّز بأي ترميز URL أي حرف له معنى خاص في عنوان URL يظهر في سر العميل (`@` كـ `%40`، و`+` كـ `%2B`، و`/` كـ `%2F`، وهكذا).
* يجب أن يكون العنوان المضبوط في **إرسال جميع الرسائل الإلكترونية من عنوان البريد الإلكتروني هذا** صندوق بريد حقيقي داخل مستأجرك، وإلا ترفض Microsoft الرسالة.
* أضف `&noSave=true` إلى DSN إذا كنت لا تريد حفظ نسخة من كل رسالة منصة في مجلد *العناصر المرسلة* للمرسل.
* للسحابات الوطنية، وجّه DSN إلى النقاط الطرفية الصحيحة، دون البادئة `https://`: `microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@microsoftgraph.chinacloudapi.cn?tenantId=TENANT_ID&authEndpoint=login.partner.microsoftonline.cn`.

**تحذير أمني:** إذن `Mail.Send` من نوع *تطبيق* يتيح للتطبيق المسجَّل إرسال البريد باسم **أي** صندوق بريد في المستأجر، وليس فقط الصندوق الذي يستخدمه Chamilo. قيّده بصندوق المرسل عبر سياسة وصول تطبيق في Exchange Online:

```powershell
New-ApplicationAccessPolicy -AppId CLIENT_ID -PolicyScopeGroupId no-reply@yourdomain.com -AccessRight RestrictAccess -Description "Restrict Chamilo to its sender mailbox"
```

### Gmail (Development/Small Platforms)

```bash
gmail+smtp://your-email@gmail.com:app-password@default
```

استخدم كلمة مرور تطبيق، وليس كلمة مرور Gmail العادية. هذا مناسب للمنصات الصغيرة أو التطوير فقط، لأن Gmail يفرض حدودًا على الإرسال.

## إعدادات بريد المنصة

بالإضافة إلى وسيلة النقل، اضبط هوية المرسل في الصفحة نفسها:

| الإعداد | الوصف |
|---------|-------------|
| **إرسال جميع الرسائل الإلكترونية باعتبارها صادرة عن هذا الاسم (التنظيمي)** | الاسم المعروض المرتبط برسائل النظام. |
| **إرسال جميع الرسائل الإلكترونية من عنوان البريد الإلكتروني هذا** | عنوان "من" لجميع رسائل النظام. يجب أن يكون عنوانًا صالحًا يقبله نقل البريد لديك. نوصي باستخدام عنوان "لا ترد" مثل `no-reply@yourdomain.com` لتجنب تلقي ردود عديمة الجدوى على الرسائل الآلية. |

## اختبار تسليم البريد الإلكتروني

بعد ضبط `MAILER_DSN`، اختبر تسليم الرسائل: انتقل إلى *الإدارة* > *النظام* > *مختبر البريد الإلكتروني*، حدّد مستلمًا وموضوعًا ونص الرسالة ثم انقر **إرسال بريد تجريبي**.

إذا اكتمل الأمر دون أخطاء ولم تُستلم الرسالة:

1. تحقق من مجلد الرسائل غير المرغوب فيها/البريد العشوائي لدى المستلم.
2. تأكد من أن نطاق الإرسال يملك سجلات DNS صحيحة (SPF وDKIM وDMARC).
3. راجع سجلات الإرسال لدى مزوّد البريد بحثًا عن الارتدادات أو الرفض.
4. راجع سجل Chamilo في `var/log/prod.log` بحثًا عن أخطاء المُرسِل.
5. في إعدادات تكوين البريد الإلكتروني، فعّل *Mail: Debug* (غير متوفر في 3.0، وسيتاح قريبًا).

## تجريبي: قائمة انتظار البريد الإلكتروني (التسليم غير المتزامن)

افتراضيًا، تُرسل الرسائل بشكل متزامن أثناء طلب الويب. لتحسين الأداء، اضبط التسليم غير المتزامن باستخدام Symfony Messenger:

```yaml
# config/packages/messenger.yaml
framework:
    messenger:
        transports:
            async: '%env(MESSENGER_TRANSPORT_DSN)%'
        routing:
            'Symfony\Component\Mailer\Messenger\SendEmailMessage': async
```

مع التسليم غير المتزامن، تُوضع الرسائل في قائمة انتظار ويُرسلها عامل في الخلفية:

```bash
php bin/console messenger:consume async
```

شغّل هذا كخدمة نظام (مثلًا عبر systemd أو supervisord) ليبقى قيد التشغيل.

## نصائح

* **استخدم خدمة بريد مخصصة** (SES أو Mailjet أو Brevo) لمنصات الإنتاج. يتطلب SMTP المباشر إلى خادم بريدك ضبطًا دقيقًا لتجنب مشكلات قابلية التسليم.
* **اضبط سجلات DNS لـ SPF وDKIM وDMARC** لنطاق الإرسال لتعظيم معدلات التسليم ومنع تصنيف الرسائل كبريد عشوائي. يمكنك أيضًا ضبط ترويسات DKIM من صفحة إعدادات البريد الإلكتروني.
* **استخدم التسليم غير المتزامن** على المنصات التي تضم أكثر من بضع عشرات من المستخدمين النشطين — إذ يمكن أن يبطئ إرسال البريد المتزامن طلبات الويب بشكل ملحوظ.