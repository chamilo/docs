# Hot Potatoes Activities

Chamilo 3.1 supports importing Hot Potatoes HTML activities into the modern Exercises tool and using individual activities inside Learning Paths.

## Import an activity

1. Open the course's **Exercises** tool and go to **Hot Potatoes**.
2. In **Import Hot Potatoes**, select a Hot Potatoes **ZIP** package or a standalone **HTML** export.
3. When an activity depends on linked images, media or other files, include those assets in the ZIP.
4. Select **Import** and verify the imported activity opens and renders correctly.

## Manage and reuse activities

From the Hot Potatoes list, use **Open** to preview the activity, **Edit** to change its title, **Publish** or **Hide** to control visibility, and **Delete** to remove it when permitted. The Learning Path builder can include individual Hot Potatoes activities among its resources.

## Review learner attempts

The **Attempts** action displays tracked attempts for teacher review. Teachers can assign a reviewed percentage score from 0 to 100. The screen currently shows up to the latest 100 attempts. Use the activity's actual rendered result as supporting evidence when assessing a learner.

**Automatic scoring and Gradebook synchronization are not implemented.** Scores shown by a Hot Potatoes package itself must not be treated as verified server-side grades. Teacher-reviewed results are stored separately.

## Troubleshooting

If media is missing, re-export the activity with all linked assets in its ZIP. If an HTML export works on a local computer but not in Chamilo, check for external file references or incompatible embedded content. Test activity visibility with a student account as well as with a teacher account.

See [Exercises](exercises.md) and [Learning Paths](../adding-content/learning-paths.md). Implementation: [PR #9380](https://github.com/chamilo/chamilo-lms/pull/9380).
