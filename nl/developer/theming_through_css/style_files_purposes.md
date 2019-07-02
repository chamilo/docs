## Style files purposes

### The bootstrap.min.css file

Bootstrap is the infamous open CSS stylesheet from Twitter. It is a container for styling best practices and helps give your website a nice appearance with only including it.

The bootstrap.min.css file is a minified (compressed) version of the library.

You MUST NOT change the bootstrap.css file, as this is the original, as provided by Twitter, and as we might update it in the future with newer versions from Twitter.

### The base.css file

The base.css file defines a series of CSS elements that are the very basis for the rest (although it is based itself on Bootstrap 3). Everything that gives a portal that « Chamilo touch » is concentrated here, so it's a good idea to incluse (import) this file from a more specific CSS.

You shouldn't change this file, as doing so might alter the appearance of other styles used in Chamilo.

### The [theme]/default.css file

This file is specific to your CSS theme, and defines elements very specific to the general appearance that you want for your portal.

This is the file you will have to update to change the style of your Chamilo installation.

It contains the styles for the header logos, the navigation bar, the footer, etc, on top of what has been defined in base.css.

### The print.css file

The print.css style is rarely used in Chamilo. It **should** be used a lot more, but we have some other things to catch-up on first.

Normally, the print.css file contains all the specifics to make a web page printable (like... on a printer or inside a PDF). We'd love to get contributions on that side.

### Other stylesheets in your style folder

Some other files can be found in the app/Resources/public/css/themes/[your-style]/ folder, such as scorm.css, frames.css, dataTable.css and stuff like that. These are used only for specific parts of the application, and bear a name that is relatively representative of the feature they cover.

### Feature-specific stylesheets

Finally, there are a series of other files available outside of the app/Resources/public/css/ folder. These are feature-specific and generally come together with a new free software library or feature that we included inside Chamilo.

This is the case, for example, with markdown.css.

These files **shouldn't** be updated, as we are likely to overwrite them with newer versions in future versions of Chamilo. However, there is still something to be done at the system level to allow for a custom style to be loaded after these.