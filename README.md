# Chamilo Documentation - `all` branch

This branch holds every version and language of the Chamilo documentation as a
single GitBook Site, synced through one `gitbook-docs.yaml` at the repository
root. It replaces the old one-branch-per-version-per-language model (`2.x`,
`2.x-fr`, `3.x`, `3.x-fr`, ...), which GitBook's new Git Sync no longer
supports the way this project used it.

## Layout

```
<version>/<language>/
```

For example `2.x/fr/` or `3.x/en/`. Each such directory is one GitBook space:
a self-contained book with its own `.gitbook.yaml`, `README.md` and
`SUMMARY.md`, plus its own `.gitbook/assets/` folder for images. GitBook does
not support sharing one central assets folder across spaces, so the same
screenshot is duplicated once per language directory that uses it.

Versions currently included: `1.11.x`, `2.x`, `3.x`. Older versions (`1.9.x`,
`1.10.x`) predate the GitBook Markdown format (they're `.odt` files and an
HTML export) and are not part of this structure; they remain on their own
branches as an archive.

## Editing

Edit pages directly inside the relevant `<version>/<language>/` directory.
`SUMMARY.md` in that directory defines that space's navigation. The root
`gitbook-docs.yaml` defines the site structure (which spaces exist, and under
which version section) - only touch it when adding or removing a whole space,
not for day-to-day content edits.

## Tooling

`scripts/` (release tagging + AI translation) lives once at the repository
root; it is tooling, not per-space content, so it is not duplicated into each
version/language directory.
