# The stylesheets inclusion mechanism

If you ever want to include more stylesheets to the list, this is the complete flow :

* a script starts \(e.g. /user\_portal.php\)
* it includes global.inc.php
* global.inc.php calls the method Display::display\_header\(\) \(in main/inc/lib/display.lib.php\)
* display\_header calls the Template ::set\_css\_files\(\) methos
* set_css\_files\(\) prepares an array with the CSS to load and prepares it as \_css\_file\_to\_string_
* the initial script loads a template \(.tpl\) from main/template/default/
* the template includes the main/template/default/layout/main\_header.tpl template
* the main\_header.tpl load head.tpl \(in the same folder\)
* head.tpl loads the _css\_file\_to\_string_ array to show the CSS in the

If you want to configure a new stylesheet globally, or change the order in which they are loaded, and if you followed the previous flow, you'll now know that the best place to do so is int the Template::setCssFiles\(\) method.

This is the best method so far in Chamilo 1.10, but in 2.0 with the full capability of templates unleashed, you should be able to add directly the new CSS to your template.

