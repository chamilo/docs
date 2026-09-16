# Updating you code

Because we use autoloading mechanisms, and because we use templates, there is one little step you will have to take **every single time** right after you pull the last changes from our repository:

```text
composer update
```

This will ensure that all dependencies are up to date and that the autoloading mechanism is updated to find all its classes in the right places.

Sadly, composer is a very slow and memory-hungry process with Chamilo, so make sure you have at least 2GB of RAM available just for that process, and that you work on something else in the meantime...

