## Desarrollo general de plugins

### Hooks

Los complementos pueden usar "ganchos", que son similares a lo que se puede encontrar en el Drupal CMS: lugares en el flujo de trabajo normal de Chamilo donde los complementos pueden intervenir.

Funciona en Chamilo al tener el proceso normal, por ejemplo, para eliminar un usuario, llamando a una función especial que buscará cualquier complemento instalado y que implemente un método específico.

Los ganchos se definen en `main/inc/lib/hook/` y se instancian en el flujo de trabajo normal.
Por ejemplo, en `usermanager.lib.php`, encontramos que el método` UserManager::create_user() `en realidad instancia el objeto HookCreateUser y luego llama a uno de sus métodos:

```
        $hook = HookCreateUser::create();
        if (!empty($hook)) {
            $hook->notifyCreateUser(HOOK_EVENT_TYPE_PRE);
        }
```

Los ganchos también deben definirse en todos los complementos.
Consulte https://github.com/chamilo/chamilo-lms/issues/1767 para obtener una nota muy breve sobre el tema de agregar ganchos a la mitad de una versión menor y sobre la existencia de 3 funciones (`doWhenDeletingCourse`,` doWhenDeletingSession` y `doWhenDeletingUser`) que aún no están implementados como ganchos pero que deberían estar en 2.0.