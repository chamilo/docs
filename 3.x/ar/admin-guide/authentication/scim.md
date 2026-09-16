# SCIM

**SCIM** (System for Cross-domain Identity Management) يُؤتمت تزويد المستخدمين — إنشاء حسابات Chamilo وتحديثها وإلغاء تفعيلها استنادًا إلى التغييرات في مُزوّد الهوية لديك. بخلاف OAuth2 أو LDAP، يتولى SCIM التزويد وليس تسجيل الدخول.

| السيناريو | إجراء SCIM |
|----------|-------------|
| انضمام موظف جديد | ينشئ حساب Chamilo |
| تغيّر اسم الموظف أو دوره | يحدّث حساب Chamilo |
| مغادرة موظف | يلغي تفعيل حساب Chamilo أو يحذفه |

## الإعداد

### 1. تعيين رمز SCIM

في ملف `.env` (أو `.env.local`)، عرّف رمزًا عشوائيًا آمنًا:

```
SCIM_TOKEN=your-secure-random-token
```

يستخدم مُزوّد الهوية هذا الرمز للمصادقة على طلباته إلى نقاط نهاية SCIM في Chamilo.

### 2. تفعيل SCIM في authentication.yaml

```yaml
authentication:
  1:
    scim:
      main:
        enabled: true
        auth_source: platform
```

امسح ذاكرة التخزين المؤقت وقم بتسخينها بعد التعديل:

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### 3. إعداد مُزوّد الهوية

في مُزوّد الهوية لديك (Azure AD، Okta، وغيرها):

1. أضف Chamilo كتطبيق SCIM
2. عيّن عنوان URL الأساسي لـ SCIM إلى `https://your-chamilo-url/scim/v2/`
3. أدخل الرمز من الخطوة 1 كرمز bearer
4. اربط سمات المُزوّد بحقول SCIM القياسية (userName، name.givenName، name.familyName، emails)
5. فعّل التزويد التلقائي

## نقاط نهاية SCIM

ينفّذ Chamilo SCIM 2.0:

| نقطة النهاية | الطريقة | الإجراء |
|----------|--------|--------|
| `/scim/v2/Users` | GET | سرد المستخدمين |
| `/scim/v2/Users` | POST | إنشاء مستخدم |
| `/scim/v2/Users/{id}` | GET | جلب مستخدم |
| `/scim/v2/Users/{id}` | PUT | استبدال مستخدم |
| `/scim/v2/Users/{id}` | PATCH | تحديث مستخدم |
| `/scim/v2/Users/{id}` | DELETE | إزالة مستخدم |

## نصائح

* **ابدأ بمجموعة اختبار** — زوّد مجموعة صغيرة من المستخدمين قبل تفعيل SCIM للمؤسسة بأكملها.
* **اجمع مع OAuth2** — إعداد شائع يستخدم Azure AD OAuth2 لتسجيل الدخول وAzure AD SCIM للتزويد.
* **راقب السجلات** — راجع سجلات Chamilo (`var/log/`) وسجلات التزويد لدى مُزوّد الهوية بحثًا عن الأخطاء.