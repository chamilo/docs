# General plugins development

## Hooks

Plugins can use "hooks", which are similar to what can be found in the Drupal CMS: places in the normal workflow of Chamilo where plugins can intervene.

It works in Chamilo by having the normal process, for example to delete a user, calling a special function that will look for any plugin installed and that implement a specific method.

The hooks are defined in `main/inc/lib/hook/` and are instanciated in the normal workflow. For example, in `usermanager.lib.php`, we find that the `UserManager::create_user()` method actually instanciates the HookCreateUser object and then calls one of its method:

```text
        $hook = HookCreateUser::create();
        if (!empty($hook)) {
            $hook->notifyCreateUser(HOOK_EVENT_TYPE_PRE);
        }
```

Hooks also have to be defined in all plugins. See [https://github.com/chamilo/chamilo-lms/issues/1767](https://github.com/chamilo/chamilo-lms/issues/1767) for a very short note on the issue of adding hooks halfway through a minor version, and on the existence of 3 functions \(`doWhenDeletingCourse`, `doWhenDeletingSession` and `doWhenDeletingUser`\) that are not implemented as hooks yet but that should be in 2.0.

