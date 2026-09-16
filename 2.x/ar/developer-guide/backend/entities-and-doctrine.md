# الكيانات وـ Doctrine

يحتوي Chamilo 2.0 على 314 كيان Doctrine عبر حزمتين. يذكر الآتي فقط الأساسيات منها.

## تنظيم الكيانات

### كيانات CoreBundle (213)

كيانات على مستوى المنصة:

| الفئة | أمثلة |
|-------|-------|
| **المستخدمون** | `User`, `UserRelUser`, `AccessUrl`, `AccessUrlRelUser` |
| **الدورات** | `Course`, `CourseCategory`, `CourseRelUser` |
| **الجلسات** | `Session`, `SessionRelUser`, `SessionRelCourse`, `SessionRelCourseRelUser` |
| **الموارد** | `ResourceNode`, `ResourceFile`, `ResourceLink`, `ResourceType` |
| **الإعدادات** | `SettingsCurrent`, `SettingsOptions` |
| **الرسائل** | `Message`, `MessageRelUser`, `MessageAttachment` |
| **التتبع** | `TrackELogin`, `TrackEOnline`, `TrackEDefault` |
| **المهارات** | `Skill`, `SkillRelUser`, `SkillRelProfile` |
| **الذكاء الاصطناعي** | `AiRequests` |
| **الإضافات** | `Plugin`, `AccessUrlRelPlugin` |
| **الاجتماعي** | `Usergroup`, `UsergroupRelUser` |
| **xAPI** | `XApiObject`, `XApiResult`, `XApiActivityState` |

### كيانات CourseBundle (101)

كيانات محتوى الدورة — جميعها مسبوقة بـ `C`:

| الفئة | أمثلة |
|-------|-------|
| **المستندات** | `CDocument` |
| **التمارين** | `CQuiz`, `CQuizQuestion`, `CQuizAnswer`, `CQuizQuestionCategory` |
| **مسارات التعلم** | `CLp`, `CLpItem`, `CLpView`, `CLpItemView`, `CLpCategory` |
| **المنتديات** | `CForum`, `CForumCategory`, `CForumThread`, `CForumPost` |
| **المهام** | `CStudentPublication`, `CStudentPublicationAssignment`, `CStudentPublicationComment` |
| **الاستطلاعات** | `CSurvey`, `CSurveyQuestion`, `CSurveyAnswer`, `CSurveyInvitation` |
| **الحضور** | `CAttendance`, `CAttendanceCalendar`, `CAttendanceResult` |
| **المدونات** | `CBlog`, `CBlogPost`, `CBlogComment`, `CBlogTask` |
| **أخرى** | `CCalendarEvent`, `CGlossary`, `CLink`, `CLinkCategory`, `CNotebook`, `CWiki` |

## اتفاقية التسمية

* كيانات CoreBundle: PascalCase القياسي (مثل `User`، `Course`، `Session`)
* كيانات CourseBundle: مسبوقة بـ `C` (مثل `CDocument`، `CQuiz`، `CLp`)

يُميز هذا البادئة كيانات محتوى الدورة من كيانات مستوى المنصة (متوافقًا مع تسمية جداول قاعدة البيانات السابقة). قد يختفي هذا التمييز على المدى الطويل مع تحويل المزيد من الأدوات إلى أدوات عامة بدون رابط قوي بدورة معينة.

## العلاقات الرئيسية

تُظهر العلاقات عادةً بواسطة فاصل `Rel`.

### User ↔ Course

```
User --[CourseRelUser]--> Course
```

يخزن `CourseRelUser` حالة التسجيل (TEACHER = 1، STUDENT = 5).

### User ↔ Session ↔ Course

```
User --[SessionRelUser]--> Session --[SessionRelCourse]--> Course
User --[SessionRelCourseRelUser]--> (Session + Course)
```

### ResourceNode (تجريد المحتوى)

تتصل جميع كيانات محتوى الدورة بنظام الموارد عبر `ResourceNode`:

```
CDocument --> ResourceNode --> ResourceFile
CQuiz ------> ResourceNode
CLp --------> ResourceNode
```

انظر [نظام الموارد](resource-system.md) للتفاصيل.

## امتدادات Doctrine

يستخدم Chamilo امتدادات Gedmo Doctrine (عبر `stof/doctrine-extensions-bundle`):

* **Tree** — بيانات هرمية (يستخدم ResourceNode مسارًا ماديًا)
* **Timestampable** — حقول `createdAt`/`updatedAt` التلقائية
* **Sluggable** — اختصارات صديقة للـ URL
* **Sortable** — مجموعات قابلة للترتيب