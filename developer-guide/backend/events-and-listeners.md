# Events and Listeners

Chamilo uses Symfony's event system for decoupled communication between components.

## Event Listeners

Located in `src/CoreBundle/EventListener/`:

Event listeners respond to specific Symfony events:

* **ResourceNodeListener** — Triggers on ResourceNode lifecycle events (persist, update, remove). Handles file storage operations and tree updates.
* **CourseListener** — Handles course context setup when a course page is accessed
* **SessionListener** — Sets up session context
* **LocaleListener** — Manages user language preferences

## Event Subscribers

Located in `src/CoreBundle/EventSubscriber/`:

Event subscribers can listen to multiple events:

* **Security subscribers** — Handle login/logout events, track login attempts
* **API subscribers** — Pre/post processing for API requests
* **Doctrine subscribers** — React to entity lifecycle events

## Doctrine Lifecycle Events

Entities use `#[ORM\HasLifecycleCallbacks]` for database-level events:

```php
#[ORM\PrePersist]
public function prePersist(): void
{
    $this->createdAt = new DateTime();
}
```

## Creating Custom Listeners

To add custom behavior:

1. Create a listener/subscriber class in the appropriate bundle
2. Tag it as an event listener or subscriber in the service configuration
3. Implement the handler method

```php
class MyListener
{
    public function onKernelRequest(RequestEvent $event): void
    {
        // Your logic here
    }
}
```

## Key Events

| Event | When it fires |
|-------|--------------|
| `kernel.request` | Every HTTP request |
| `kernel.response` | Before sending the HTTP response |
| `security.interactive_login` | User logs in |
| `doctrine.prePersist` | Before an entity is first saved |
| `doctrine.postUpdate` | After an entity is updated |
