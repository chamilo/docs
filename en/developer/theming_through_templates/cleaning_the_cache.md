## Cleaning the cache {#cleaning-the-cache}

If you&#039;re going to change templates, you need to know one thing and remember it : before you test each change, delete the contents of the **_main/archives/twig/_ **directory. Otherwise, the cache will stick around and you won&#039;t see any (or you&#039;ll see only some) of your changes, which could make you believe they didn&#039;t take effect.

This cleanup is also executed when using the « Archive cleanup » option on the main administration screen of your Chamilo portal.

Alternatively, you can use Chash with the command :

chash files:clean_temp_folder

That is, if you have Chash[^6] installed.

[^6]: https://github.com/chamilo/chash