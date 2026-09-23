# Foruminställningar

Beteende för kursverktyget **Forum**.

Åtkomst till dessa inställningar sker under **Administration > Konfigurationsinställningar > Forum**. Denna kategori innehåller **9 inställningar**, listade nedan med titel och kommentar som levereras i plattformens inställningsfixtures (`SettingsCurrentFixtures.php`).

> Variabelnamnet i koden visas i monospace. Använd det vid skriptning via API:et eller när du behöver ändra dessa inställningar på global nivå genom att redigera [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Inställningar

### `allow_forum_category_language_filter`

**Språkfilter för forumkategorier**

Lägg till ett språkfilter i forumvyn för att endast se kategorier konfigurerade på ett visst språk. Kräver användning av extrafältet 'language' på entiteten 'forum_category'.

*Standard: `false`*

### `allow_forum_post_revisions`

**Granskning av foruminlägg**

Aktivera det här alternativet för att tillåta att man begär granskning eller översättning av sitt inlägg i ett forum. När det konfigureras utförligt kan det användas för samarbete med andra användare i ett språkinlärningsforum.

*Standard: `false`*

### `community_managers_user_list`

**Lista över community managers**

Ange en array med användar-ID:n som ska betraktas som community managers i den specialkurs som utsetts till globalt forum. Community managers har ytterligare behörigheter i det globala forumet.

### `default_forum_view`

**Standardvy för forum**

Vilket ska vara standardalternativet när ett nytt forum skapas. Varje utbildare kan dock välja en annan vy för varje enskilt forum

*Standard: `flat`*

### `display_groups_forum_in_general_tool`

**Visa gruppers forum i det allmänna forumet**

Visa gruppers forum i forumverktyget på kursnivå. Det här alternativet är aktiverat som standard (i det fallet fungerar gruppens individuella synlighet för forum fortfarande som ett ytterligare kriterium). Om det inaktiveras syns gruppers forum endast via gruppverktyget, oavsett om de är publika eller inte.

*Standard: `true`*

### `forum_fold_categories`

**Fäll ihop forumkategorier**

Visuell effekt för att aktivera ihopfällning/utfällning av forumkategorier.

*Standard: `false`*

### `global_forums_course_id`

**Använd kurs som globalt forum**

Ange kurs-ID (numeriskt) för en kurs som reserverats för att användas som globalt forum. Detta ersätter länken "Sociala grupper" i det sociala nätverket med en länk till den kursens forum.

*Standard: `0`*

### `hide_forum_post_revision_language`

**Dölj språk för granskning av foruminlägg**

Dölj möjligheten att tilldela ett språk till en granskning av ett foruminlägg.

*Standard: `false`*

### `subscribe_users_to_forum_notifications_also_in_base_course`

**Forumaviseringar även från baskursen**

Aktivera det här alternativet för att aktivera aviseringar från baskursens forum, även om kursen följs via en session.

*Standard: `false`*