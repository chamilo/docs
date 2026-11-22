# Public XML Sitemaps

Chamilo 3.1 provides XML sitemaps to help search engines discover public portal pages and eligible public courses. They are generated per Access URL and require no new database table or separate sitemap plugin.

## Available URLs

On your portal (replace `https://chamilo.example.org` with its canonical URL):

| URL | Purpose |
| --- | --- |
| `/sitemap.xml` | Index of available sitemaps |
| `/sitemap-pages.xml` | Homepage and enabled public catalogue pages |
| `/sitemap-courses-1.xml`, `/sitemap-courses-2.xml`, … | Eligible course description pages, up to 5,000 entries per page |

Course entries link to `/course/{id}/about`. The sitemap does not expose private course content, course tool URLs or individual session details. Nonexistent course sitemap pages return HTTP 404.

## Publish the course catalogue

Open [Course Catalog Settings](../platform-settings/catalog-settings.md).

* Enable `catalog.course_catalog_published` (**Publish course catalogue**) to make the catalogue available to anonymous visitors.
* Configure `catalog.show_courses_sessions`: `0` for courses, `1` for sessions, or `2` for both.
* Only catalogued courses with public-world visibility, available to anonymous guests on the current portal, qualify for the course sitemap. Sticky courses, hidden-from-catalogue courses, user-specific restrictions and courses outside the applicable category/catalogue rules are excluded.
* If explicit catalogue access-URL/user-group rules exist, only courses visible to everyone on that Access URL are eligible.

If the catalogue is not public, the index contains only the pages sitemap and the pages sitemap contains the homepage. A portal with no eligible courses does not list a course sitemap even when the public course catalogue is enabled.

If the `NoSearchIndex` plugin is enabled, sitemap endpoints return HTTP 404. For multi-URL installations, requests must match the configured portal origin; sitemap URLs use the canonical portal URL rather than publishing another portal's course list.

## Verify the sitemap

From a logged-out browser, open `/sitemap.xml`, follow the listed links and verify the URLs. Test with a public course and a private or hidden course; only the eligible public course should appear. Turn off catalogue publication and check that the course sitemap is no longer listed. If you want search engines to index the portal, submit its canonical sitemap index to the relevant search engine webmaster tool.

Sitemaps assist discovery; they do not grant access, replace course permissions, or guarantee search engine indexing.

Implementation: [PR #9512](https://github.com/chamilo/chamilo-lms/pull/9512), issue [#3081](https://github.com/chamilo/chamilo-lms/issues/3081).
