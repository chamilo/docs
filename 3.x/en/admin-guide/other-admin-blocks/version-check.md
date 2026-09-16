# Version Check

Version Check tells you whether your Chamilo installation is up to date, and — if you opt in — registers your platform with the Chamilo project so it can be counted in aggregate usage statistics.

## Two Levels of Checking

**Unregistered (default state):** Chamilo still tries to contact `version.chamilo.org` to compare your installed version against the latest release, using nothing more than the request itself — no platform details are sent. The block shows a registration form explaining what registering adds, plus an **"Enable version check"** button and a **"Hide campus from public platforms list"** checkbox.

**Registered:** Clicking "Enable version check" only flips two local settings — it does not, by itself, send anything. From then on, every time this dashboard block loads, your platform sends a request to `version.chamilo.org` that includes:

| Data sent | Stated purpose |
|-----------|-----------------|
| Your platform's URL and site name | Identifies which portal is checking in |
| Admin contact e-mail | Explicitly so the Chamilo team can reach admins about critical security issues |
| Installed version | To determine if you're up to date |
| Course, user, active-user, and session counts | Rolled up into non-personal aggregate statistics at `stats.chamilo.org` |
| Organization name and interface language | Demographic aggregation only |
| Admin name | Sent, though its purpose is not clearly documented in the code itself |
| Your server's IP address | Used to approximate your platform's location for a global map of installations |
| "Do not list campus" flag, packager, and a unique instance ID | Controls whether you appear in the public directory, and identifies repeat check-ins from the same install |

If you leave **"Hide campus from public platforms list"** unchecked, your platform also appears in the public community list at `version.chamilo.org/community.php`.

## Accessing Version Check

This block appears directly on the administration dashboard — no separate page to visit.

## Should You Enable It?

This is an explicit opt-in, and the trade-off is straightforward: in exchange for sharing the details above, you get an automatic notice when a new version (including security patches) is available, and you contribute to Chamilo's public adoption statistics. If you'd rather not share any platform details, simply don't click "Enable version check" — the basic up-to-date check still runs without registering. If you want the update notice but not the public listing, register and check "Hide campus from public platforms list."
