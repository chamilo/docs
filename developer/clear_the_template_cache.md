# Clear the template cache

### Composer install

Using composer to process the new stylesheets and templates is a simple matter of getting to the 
root of your Chamilo code folder (where composer.json lies) and launching `composer install`. 
That is, if you have composer. If you don't, then you can also use the "Clean cache" option from the
administration page's "System" block.

### Clearing the template cache

Clearing the template cache should not be necessary if you have set your portal in « testing mode »,
but if you haven't, you'll have to clean the « app/cache/twig/ » folder.