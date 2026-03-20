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
Add AI-assisted glossary term generation

Teachers can now generate glossary terms using configured AI
providers. Supports configurable prompt and term count.
```

## Code Review

Pull requests are reviewed by the maintainer team. Be prepared to:

* Address feedback and make revisions
* Keep your branch up to date with `master`
* Ensure tests pass

## Reporting Issues

Report bugs and feature requests on the GitHub issue tracker.
