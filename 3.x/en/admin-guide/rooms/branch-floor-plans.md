# Branch Floor Plans and Room Maps

Chamilo 3.1 can associate a floor-plan image with a branch and mark room positions on that image with interactive polygons. The feature helps learners locate assigned rooms; it is **not** a geographic GPS map.

## Attach a branch floor plan

1. Open the administration area for **Branches** and edit the intended branch.
2. Locate the **Floor plan** panel.
3. Choose or upload the image and select **Attach floor plan** (or **Change floor plan** if one exists).
4. Save or confirm the branch changes as required, then verify that the floor-plan image loads.

If a plan is no longer valid, use **Remove floor plan** after checking which rooms refer to it. Only upload trusted content and follow the permissions of the branch administration screen.

## Outline rooms

1. Edit a room assigned to that branch.
2. Find **Room on floor plan** in the room form.
3. Use the polygon tool to trace the room boundary. Use **Edit** to adjust vertices; all points must remain within the image.
4. Select **Save room area**, then save the room form to persist the changes.
5. Open a room viewer to confirm the correct position. Use **Clear room area** if the mapping should be removed.

A room has one editable polygon at a time. Room mapping is separate from the branch-level image, so updating the image may require checking existing room boundaries.

## Where maps appear

Authorized users can view room floor plans when rooms are selected or displayed in course information, calendar events and attendance-related flows. Verify visibility using the roles that will actually view the information, especially students and session participants.

Branch and room access permissions also apply to floor-plan resources. In multi-URL installations, verify the correct portal/branch isolation before publishing maps.

See [Managing Rooms](managing-rooms.md) and [Room Availability Finder](room-availability-finder.md). Implementations: [PR #9321](https://github.com/chamilo/chamilo-lms/pull/9321), [PR #9451](https://github.com/chamilo/chamilo-lms/pull/9451).
