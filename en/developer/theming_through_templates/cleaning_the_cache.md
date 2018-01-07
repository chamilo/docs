## Cleaning the cache

If you're going to change templates, you need to know one thing and remember it: after writing your changes and before you test them, you will need to delete the contents of the `app/cache/twig/` directory.

Otherwise, the cache will stick around and you won't see any (or you'll see only some) of your changes, which could make you believe they didn't take effect.

This cleanup is also executed when using the "Archive/Cache cleanup" option on the main administration screen of your Chamilo portal ("System" block).

Alternatively, you can use Chash (a command line tool for Chamilo) with the command:

```
chash files:clean_temp_folder
```

That is, if you have Chash[6] installed.

[6]: https://github.com/chamilo/chash
