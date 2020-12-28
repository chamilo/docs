# Example procedure for new design

With all the information you've gone through, how would you go ahead now and create a new design (based on an existing one) with new colors, including new course tool icons, a new logo and a default image for courses?

This is a checklist of what you will need to do, step by step:

 1. Connect to Chamilo
 2. Go to Administration -> Platform -> Configuration settings -> Stylesheets
 3. Select the name of the style you want to use as a base (this is *much* easier than starting a new one from scratch)
 4. Click `Download`
 5. On your computer, unzip the file
 6. Rename the folder because you will not be able to upload it again under the same name
 7. Enter the folder and edit default.css
 8. With your browser (Firefox or Chrome), use the developer toolbar and the "Inspect" feature to locate elements you want to change the colors of
 9. Write down the current color code and the color you want to change it to (a good idea might be to create a table with the match between the old and the new color)
 10. Back to default.css, look for the color codes (search for lowercase and uppercase variants) and replace them everywhere with the new colors, respectively
 11. Save default.css
 12. In the `images/`, add your logo as header-logo.png. This image can be transparent and *has to* have a maximum height of 70px. In more recent versions, you can also use an SVG logo, but this is not covered here
 13. In the `icons/` folder, create a file called `session_default.png` of exactly 400x224 pixels to replace the default image of the courses
 14. Still in the `icons/` folder, create directories `22` and `64` to prepare for custom course tool icons
 15. You will need the following icons in *exactly* 64x64 pixels to replace the default tools of Chamilo: `agenda.png`, `attendance.png`, `chat.png`, `course_progress.png`, `dropbox.png`, `folder_documents.png`, `forum.png`, `glossary.png`, `gradebook.png`, `group.png`, `info.png`, `links.png`, `members.png`, `notebook.png`, `quiz.png`, `scorms.png`, `survey.png`, `valves.png`, `wiki.png`, `works.png`
 16. Because each tool can be disabled and a greyed-out version of the tool icon is shown, you will also need to add, for each of the previous icons, a greyed-out version with the same name appended by "_na" (for "not available"): e.g. `agenda_na.png`. You can do that in a software like Gimp by using the `Image`->`Mode`->`Greyscale` option then exporting it with the _na name. If your original icon uses very dark colors, you might need to increase the brightness of the greyscale version (`Colors`->'Brightness & Contrast`->Set brightness to +50%)
 17. Finally, because those icons (only in the active color version) will be used one the `My Courses` page to notify the user if anything has changed, you also need them in a 22x22 pixels version. To do that, copy all the images (except the _na.png versions) from 64/ to 22/, then edit each and resize it to 22x22
 18. Exit the stylesheet folder (which you had renamed in step 6)
 19. Generate a zip file
 20. Go to your Chamilo and upload the new zip file in the `New stylesheet file` tab
 21. Move back to the `Update` tab and select the new stylesheet (you can use the `Preview` button so that it doesn't affect all your users immediately)
 21. You might need to use CTRL+F5 to refresh some cache memory in your browser, but that shouldn't be the case
 
That's it!
 
## Forbidden file extensions
 
For security reasons, we only allow a number of file extensions to be uploaded:

  - css
  - zip
  - jpeg
  - jpg
  - png
  - gif
  - ico
  - psd
  - xcf
  - svg
  - webp
  - woff
  - woff2
  - md
  
This list can change. You can find it in the getAllowedFileTypes() function around https://github.com/chamilo/chamilo-lms/blob/1.11.x/main/admin/settings.lib.php#L2072
  
If you want to avoid those restrictions, you can also upload the new style through SFTP directly in `app/Resources/public/css/themes/`, but you will *need* to use the `Cache clean-up` option in the administration page (block `System`), otherwise the stylesheet will not be spread to the final public folder `web/css/themes/`.
  
