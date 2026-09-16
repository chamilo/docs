# Git Workflow

## Repository

The Chamilo source code is hosted on GitHub: [github.com/chamilo/chamilo-lms](https://github.com/chamilo/chamilo-lms)

## Branching

* **`master`** — Main development branch
* Feature branches are created from `master` for new development
* Release branches are created for stable releases

## Contributing a Change

1. **Fork** the repository on GitHub
2. **Clone** your fork locally
3. **Create a branch** for your change: `git checkout -b feature/my-feature`
4. **Make your changes** following the coding conventions
5. **Commit** with clear, descriptive commit messages
6. **Push** to your fork: `git push origin feature/my-feature`
7. **Create a pull request** against the `master` branch

## Commit Messages

Write clear commit messages that explain **what** and **why**:

```
Glossary: Add AI-assisted term generation

Teachers can now generate glossary terms using configured AI
providers. Supports configurable prompt and term count.
```

### Tool prefix convention

The subject line is prefixed with the **tool or area** that the change touches, followed by a colon. We use a short shared terminology so that the changelog and `git log --oneline` can be skimmed by tool. The prefix is always the **singular** form of the tool's canonical name.

Format: `<Prefix>: <Imperative summary in the present tense>`

Examples:

```
Document: Fix list for student view
Exercise: Prevent duplicate question titles within a quiz
Learnpath: Allow reordering chapters via drag and drop
Internal: Refactor ResourceNode hydration in the API normalizer
CI: Cache Composer downloads in the GitHub Actions workflow
```

If a change spans several tools, pick the one most affected; truly cross-cutting changes that only touch code structure (no end-user tool) go under `Internal`. Documentation-only changes (this site, the changelog, inline docblocks meant purely as reference) go under `Documentation`.

#### Allowed prefixes

| Prefix               | Scope / notes                                                                        |
|----------------------|--------------------------------------------------------------------------------------|
| `Admin`              |                                                                                      |
| `Announcement`       |                                                                                      |
| `Attendance`         |                                                                                      |
| `Authentication`     |                                                                                      |
| `Blog`               |                                                                                      |
| `Calendar`           | Not "Agenda"                                                                         |
| `Career`             |                                                                                      |
| `Catalogue`          | Courses and sessions catalogue, including "hot courses" on the homepage              |
| `Chat`               |                                                                                      |
| `CI`                 | Continuous Integration, automated tests, etc.                                        |
| `Course description` |                                                                                      |
| `Course Progress`    | Not "Thematic advance"                                                               |
| `Course settings`    |                                                                                      |
| `Cron`               |                                                                                      |
| `Dashboard`          |                                                                                      |
| `Display`            |                                                                                      |
| `Document`           |                                                                                      |
| `Documentation`      | Anything related exclusively to documenting Chamilo or the code, the changelog, etc. |
| `Dropbox`            |                                                                                      |
| `Exercise`           | Not "Quiz"                                                                           |
| `Extra Fields`       |                                                                                      |
| `Forum`              |                                                                                      |
| `Glossary`           |                                                                                      |
| `Gradebook`          | Includes Certificates                                                                |
| `Group`              | Includes course groups, global groups, and classes                                   |
| `Help`               |                                                                                      |
| `Hook`               | For the internal hook mechanism                                                      |
| `Install`            | Includes upgrade stuff                                                               |
| `Internal`           | For changes and fixes that mostly affect code itself or are very global by nature    |
| `Language`           |                                                                                      |
| `Link`               |                                                                                      |
| `Learnpath`          | For LP / Learning Paths                                                              |
| `Maintenance`        | The course maintenance tool: course copies, backup, restore, etc.                    |
| `Message`            |                                                                                      |
| `Notebook`           |                                                                                      |
| `Optimization`       |                                                                                      |
| `Portfolio`          |                                                                                      |
| `Privacy`            |                                                                                      |
| `Script`             | For what lives in `tests/scripts/`                                                   |
| `Search`             | Full-text search                                                                     |
| `Security`           |                                                                                      |
| `Session`            |                                                                                      |
| `Skill`              |                                                                                      |
| `Social`             | Social network                                                                       |
| `SSO`                | Single Sign-On methods                                                               |
| `Survey`             |                                                                                      |
| `System`             | Things that have mostly to do with hosting and fine-tuning at server level           |
| `Template`           |                                                                                      |
| `Ticket`             |                                                                                      |
| `Tracking`           |                                                                                      |
| `User`               |                                                                                      |
| `Webservice`         |                                                                                      |
| `Wiki`               |                                                                                      |
| `Work`               |                                                                                      |
| `WYSIWYG`            |                                                                                      |
| `XAPI`               |                                                                                      |

## Code Review

Pull requests are reviewed by the maintainer team. Be prepared to:

* Address feedback and make revisions
* Keep your branch up to date with `master`
* Ensure tests pass

## Reporting Issues

Report bugs and feature requests on the GitHub issue tracker.
