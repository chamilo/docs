# أوامر الإصلاح والتحويل

> **تغيير جذري.** كانت أوامر الصيانة أدناه تكتب في قاعدة البيانات فور تشغيلها. أصبحت الآن **للقراءة فقط (تشغيل تجريبي) افتراضيًا** ولا تكتب إلا عند تمرير `--apply`، وفق نموذج `chamilo:migration:repair-quiz-relations-from-legacy`.

| الأمر | ملاحظات |
|---------|-------|
| `chamilo:migration:repair-group-forums-without-item-property` | |
| `chamilo:migration:repair-forum-posts-without-item-property` | |
| `chamilo:migration:repair-quiz-questions-without-resource-node` | |
| `chamilo:migration:repair-gradebook-structure` | |
| `chamilo:migration:repair-translatehtml-language-blocks` | |
| `chamilo:migration:repair-legacy-certificate-history` | |
| `app:multi-url:convert` | بلا `--expected-count` (عملية واحدة شاملة أو لا شيء) |

## ما الذي تغيّر للمسؤولين

1. شغّل الأمر دون خيارات: يُبلّغ عما كان سيفعله، ولا يكتب شيئًا، ويطبع سطر
   `--apply --expected-count=N` الدقيق المطلوب استخدامه.
2. للكتابة، أعد تشغيله مع `--apply --expected-count=N`، حيث N هو العدد الذي أبلغ عنه التشغيل للقراءة فقط.
   إذا اختلف عدد الصفوف التي ستتغيّر عن N (لأن البيانات تغيّرت في الأثناء)، يرفض الأمر
   ولا يكتب شيئًا.
3. ما زال `--dry-run` مقبولًا (وهو الآن الافتراضي ولا يفعل شيئًا)؛ ودمجه مع `--apply` يُعد خطأ.
4. يجب على البرامج النصية ومهام cron التي كانت تشغّل هذه الأوامر دون وسائط وتعتمد على كتابتها أن تمرّر الآن
   `--apply --expected-count=N`. رموز الخروج لم تتغيّر (0 نجاح، 1 فشل، 2 استخدام غير صالح).

مثال:

```bash
php bin/console chamilo:migration:repair-translatehtml-language-blocks
# ... "To write, re-run with --apply --expected-count=12"
php bin/console chamilo:migration:repair-translatehtml-language-blocks --apply --expected-count=12
```

```bash
php bin/console app:multi-url:convert "https://admin.example.com/"          # plan only
php bin/console app:multi-url:convert "https://admin.example.com/" --apply  # convert
```

## أمر جديد: `app:repair-user-tag-counters`

يعيد حساب عدّاد الاستخدام (`tag.count`) للوسوم انطلاقًا من صفوف العلاقات التي تستخدمها (وسوم المستخدمين، ووسوم الحقول الإضافية،
ووسوم المحفظة). كانت الإصدارات الأقدم تسمح بانحراف العدّادات. النموذج نفسه: شغّله دون خيارات لسرد الوسوم المنحرفة
والحصول على سطر `--apply --expected-count=N`، ثم شغّل ذلك السطر للكتابة. لا تتدخل أي ترحيل: شغّله
عندما تريد إعادة مزامنة العدّادات.