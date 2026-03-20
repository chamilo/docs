# Endpoints Reference

API Platform automatically generates REST endpoints for entities annotated with `#[ApiResource]`. Chamilo exposes 100+ resources.

## Standard Operations

For each API resource, the following operations are typically available:

| Method | Path | Description |
|--------|------|-------------|
| `GET` | `/api/{resources}` | List (collection) |
| `POST` | `/api/{resources}` | Create |
| `GET` | `/api/{resources}/{id}` | Read (single item) |
| `PUT` | `/api/{resources}/{id}` | Full update |
| `PATCH` | `/api/{resources}/{id}` | Partial update |
| `DELETE` | `/api/{resources}/{id}` | Delete |

Not all operations are enabled for every resource — security constraints apply.

## Key API Resources

### Platform Resources

| Resource | Path | Description |
|----------|------|-------------|
| Users | `/api/users` | User accounts |
| Courses | `/api/courses` | Courses |
| Sessions | `/api/sessions` | Training sessions |
| Resource Nodes | `/api/resource_nodes` | Unified content nodes |
| Access URLs | `/api/access_urls` | Multi-URL portals |
| Messages | `/api/messages` | Platform messages |

### Course Content Resources

| Resource | Path | Description |
|----------|------|-------------|
| Documents | `/api/documents` | Course documents |
| Quizzes | `/api/c_quizzes` | Exercises/tests |
| Learning Paths | `/api/c_lps` | Learning paths |
| Forums | `/api/c_forums` | Discussion forums |
| Glossaries | `/api/c_glossaries` | Glossary terms |
| Links | `/api/c_links` | External links |
| Announcements | `/api/c_announcements` | Course announcements |
| Calendar Events | `/api/c_calendar_events` | Agenda events |
| Student Publications | `/api/c_student_publications` | Assignments |

### Tracking Resources

| Resource | Path | Description |
|----------|------|-------------|
| Gradebook Categories | `/api/gradebook_categories` | Gradebook setup |
| Gradebook Results | `/api/gradebook_results` | Grades |

## Filtering and Pagination

API Platform supports:

* **Pagination**: `?page=2&itemsPerPage=30`
* **Filtering**: `?title=Introduction` (depends on configured filters)
* **Ordering**: `?order[title]=asc`
* **Search**: Full-text search on configured fields

## Content Negotiation

The API supports multiple formats:

* `application/ld+json` (default — JSON-LD)
* `application/json`
* `text/html` (API documentation)

Set the `Accept` header to choose the response format.

## Security

Each endpoint enforces security through:

* JWT authentication (required for most endpoints)
* Symfony security voters (resource-level permissions)
* Role-based access control (e.g., admin-only endpoints)
