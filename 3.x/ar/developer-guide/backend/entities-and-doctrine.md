# الكيانات وDoctrine

يحتوي Chamilo 3.0 على 314 كيان Doctrine موزّعة على حزمتين. فيما يلي ذكر للكيانات الرئيسية فقط.

## تنظيم الكيانات

### كيانات CoreBundle (213)

كيانات على مستوى المنصة:

| الفئة | أمثلة |
|----------|---------|
| **المستخدمون** | `User`, `UserRelUser`, `AccessUrl`, `AccessUrlRelUser` |
| **المقررات** | `Course`, `CourseCategory`, `CourseRelUser` |
| **الجلسات** | `Session`, `SessionRelUser`, `SessionRelCourse`, `SessionRelCourseRelUser` |
| **الموارد** | `ResourceNode`, `ResourceFile`, `ResourceLink`, `ResourceType` |
| **الإعدادات** | `SettingsCurrent`, `SettingsOptions` |
| **الرسائل** | `Message`, `MessageRelUser`, `MessageAttachment` |
| **التتبع** | `TrackELogin`, `TrackEOnline`, `TrackEDefault` |
| **المهارات** | `Skill`, `SkillRelUser`, `SkillRelProfile` |
| **الذكاء الاصطناعي** | `AiRequests` |
| **الإضافات** | `Plugin`, `AccessUrlRelPlugin` |
| **اجتماعي** | `Usergroup`, `UsergroupRelUser` |
| **xAPI** | `XApiObject`, `XApiResult`, `XApiActivityState` |

### كيانات CourseBundle (101)

كيانات محتوى المقرر — جميعها مسبوقة بـ `C`:

| الفئة | أمثلة |
|----------|---------|
| **المستندات** | `CDocument` |
| **التمارين** | `CQuiz`, `CQuizQuestion`, `CQuizAnswer`, `CQuizQuestionCategory` |
| **مسارات التعلم** | `CLp`, `CLpItem`, `CLpView`, `CLpItemView`, `CLpCategory` |
| **المنتديات** | `CForum`, `CForumCategory`, `CForumThread`, `CForumPost` |
| **الواجبات** | `CStudentPublication`, `CStudentPublicationAssignment`, `CStudentPublicationComment` |
| **الاستبيانات** | `CSurvey`, `CSurveyQuestion`, `CSurveyAnswer`, `CSurveyInvitation` |
| **الحضور** | `CAttendance`, `CAttendanceCalendar`, `CAttendanceResult` |
| **المدونات** | `CBlog`, `CBlogPost`, `CBlogComment`, `CBlogTask` |
| **أخرى** | `CCalendarEvent`, `CGlossary`, `CLink`, `CLinkCategory`, `CNotebook`, `CWiki` |

## اصطلاح التسمية

* كيانات CoreBundle: PascalCase قياسي (مثل `User`، `Course`، `Session`)
* كيانات CourseBundle: مسبوقة بـ `C` (مثل `CDocument`، `CQuiz`، `CLp`)

يميّز هذا البادئة كيانات المحتوى المرتبطة بالمقرر عن كيانات مستوى المنصة (بما يتوافق مع تسمية جداول قاعدة البيانات القديمة). قد تختفي هذه التفرقة على المدى الطويل مع تحويل المزيد من الأدوات إلى أدوات عامة دون ارتباط قوي بمقرر محدد.

## العلاقات الرئيسية

تظهر العلاقات عادةً عبر الفاصل `Rel`.

### المستخدم ↔ المقرر

```
User --[CourseRelUser]--> Course
```

يخزّن `CourseRelUser` حالة التسجيل (TEACHER = 1، STUDENT = 5).

### المستخدم ↔ الجلسة ↔ المقرر

```
User --[SessionRelUser]--> Session --[SessionRelCourse]--> Course
User --[SessionRelCourseRelUser]--> (Session + Course)
```

### ResourceNode (تجريد المحتوى)

ترتبط جميع كيانات محتوى المقرر بنظام الموارد عبر `ResourceNode`:

```
CDocument --> ResourceNode --> ResourceFile
CQuiz ------> ResourceNode
CLp --------> ResourceNode
```

انظر [نظام الموارد](resource-system.md) للتفاصيل.

## امتدادات Doctrine

يستخدم Chamilo امتدادات Gedmo Doctrine (عبر `stof/doctrine-extensions-bundle`):

* **Tree** — بيانات هرمية (يستخدم ResourceNode مسارًا ماديًا)
* **Timestampable** — حقول `createdAt`/`updatedAt` تلقائية
* **Sluggable** — شرائح صديقة لعناوين URL
* **Sortable** — مجموعات قابلة للترتيب