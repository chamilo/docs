# SCIM

**SCIM** (System for Cross-domain Identity Management) يقوم بأتمتة توفير المستخدمين — إنشاء، تحديث، وإلغاء تفعيل حسابات Chamilo بناءً على التغييرات في مزود الهوية الخاص بك. بخلاف OAuth2 أو LDAP، يتعامل SCIM مع التوفير، وليس تسجيل الدخول.

| السيناريو | إجراء SCIM |
|------------|-------------|
| ينضم موظف جديد | ينشئ حساب Chamilo |
| يتغير اسم أو دور موظف | يحدث حساب Chamilo |
| يغادر موظف | يلغي تفعيل أو يحذف حساب Chamilo |

## الإعداد

### 1. تعيين رمز SCIM

في ملف `.env` (أو `.env.local`) الخاص بك، حدد رمزًا عشوائيًا آمنًا:

```
SCIM_TOKEN=your-secure-random-token
```

يُستخدم هذا الرمز من قبل مزود الهوية الخاص بك للمصادقة على طلباته إلى نقاط نهاية SCIM الخاصة بـ Chamilo.

### 2. تمكين SCIM في authentication.yaml

```yaml
authentication:
  1:
    scim:
      main:
        enabled: true
        auth_source: platform
```

قم بمسح وتسخين الذاكرة المؤقتة بعد التحرير:

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### 3. إعداد مزود الهوية الخاص بك

في مزود الهوية الخاص بك (Azure AD، Okta، إلخ):

1. أضف Chamilo كتطبيق SCIM
2. عيّن عنوان URL الأساسي لـ SCIM إلى `https://your-chamilo-url/scim/v2/`
3. أدخل الرمز من الخطوة 1 كرمز حامل
4. قم بتعيين سمات المزود إلى حقول SCIM القياسية (userName، name.givenName، name.familyName، emails)
5. قم بتمكين التوفير التلقائي

## نقاط نهاية SCIM

يطبق Chamilo معيار SCIM 2.0:

| نقطة النهاية | الطريقة | الإجراء |
|---------------|---------|---------|
| `/scim/v2/Users` | GET | قائمة المستخدمين |
| `/scim/v2/Users` | POST | إنشاء مستخدم |
| `/scim/v2/Users/{id}` | GET | الحصول على مستخدم |
| `/scim/v2/Users/{id}` | PUT | استبدال مستخدم |
| `/scim/v2/Users/{id}` | PATCH | تحديث مستخدم |
| `/scim/v2/Users/{id}` | DELETE | إزالة مستخدم |

## نصائح

* **ابدأ بمجموعة اختبار** — وفّر مجموعة صغيرة من المستخدمين قبل تمكين SCIM للمنظمة بأكملها.
* **ادمج مع OAuth2** — إعداد شائع يستخدم Azure AD OAuth2 لتسجيل الدخول و Azure AD SCIM للتوفير.
* **راقب السجلات** — تحقق من سجلات Chamilo (`var/log/`) وسجلات توفير مزود الهوية الخاص بك للأخطاء.