## Adding new document templates

As introduced in the sections above, to add a new document template, we will need to do the following:
* generate a thumbnail of your 100 x 70
* place all media files in a "certificates/" folder of the CSS we use (if we use a custom CSS)
* create the templates manually through the web interface and replace paths to images with {CSS}your-custom-theme/certificates/[file]

Later on, we might need to go to the database and remove some references manually 
because CKeditor will automatically add a bootstrap tag, for example
