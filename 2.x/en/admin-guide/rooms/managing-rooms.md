# Managing Rooms

Rooms in Chamilo are organized under branches: a branch is a physical site, and each room belongs to exactly one branch.

## Branches

**Rooms > Branches** manages your organization's physical sites — a building, campus, or office. Branches can be nested (a branch can have child branches), so you can model something like "Main Campus > Building A."

Fields you can set for a branch:

* **Title** and **Description**
* **Parent branch** — For organizing branches hierarchically
* **IP address** — Optional, for network-based identification
* **Latitude / Longitude** — For mapping
* **Download / Upload speed** and **Delay** — Optional network-quality metadata
* **Administrator e-mail, name, and phone** — Contact details for whoever manages that site

## Rooms

**Rooms > Rooms** manages the actual bookable spaces within a branch — typically a classroom or training room. Every room must belong to a branch.

Fields you can set for a room:

* **Title** and **Description**
* **Branch** — Which branch this room belongs to (required)
* **Floor number**
* **Capacity** — Must be a positive number
* **Geolocation**, **IP address**, and **IP mask** — Optional advanced fields

Each room also has an "Occupation" calendar view showing its bookings, and a count of the courses using it.

## Related

To find a free room for a specific time slot rather than browsing the list, see [Room Availability Finder](room-availability-finder.md).
