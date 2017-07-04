# Clear the template cache {#clear-the-template-cache}

### Composer update {#composer-update}

Updating composer is a simple matter of getting to the root of your Chamilo code folder (where composer.json lies) and launching « composer update ». That is, if you have composer.

### Clearing the template cache {#clearing-the-template-cache}

Clearing the template cache should not be necessary if you have set your portal in « testing mode », but if you haven&#039;t, you&#039;ll have to clean the « twig/ » folder. This folder is usually located at archive/twig/, but we might change that for Chamilo 1.10.* to become data/twig/

In any case, data/twig/ will be the definitive location of that folder starting from 2.0.