# Default course image

Similarly to the default icons replacement described in the previous section, the default image for the course, which appears in the catalogue or in the courses grid view, can be replaced.

To do this, you will have to take the main/img/session\_default.png \(400x224 in v1.11.10\) and main/img/session\_default\_small.png \(85x48 in v1.11.10\) images dimensions as a starting point, and develop a new image that fits in these.

Then, instead of replacing the images directly in main/img/ \(which would remove the customization during each posterior Chamilo upgrade\), you can simply place those 2 new images in the root folder of your custom CSS.

For example, if you have placed \(as suggested in previous sections\) your CSS in a folder called "myCustomCSS/", the two images would respectively be placed in "myCustomCSS/session\_default.png" and "myCustomCSS/session\_default\_small.png".

