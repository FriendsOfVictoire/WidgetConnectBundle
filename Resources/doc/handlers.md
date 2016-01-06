## HANDLERS

Widget Connect Handlers are services who redirect to the redirect_url after login.

The Widget Connect defines handlers in [Dependency Injection][link-VictoireWidgetConnectExtension.php].

It prepends security firewall options:

```yaml
security:
    firewalls:
        main:
            form_login:
                success_handler: victoire.widget.connect.handler.success.authentication
                failure_handler: victoire.widget.connect.handler.failure.authentication
            logout:
                success_handler: victoire.widget.connect.handler.success.logout
            oauth:
                success_handler: victoire.widget.connect.handler.success.authentication
                failure_handler: victoire.widget.connect.handler.failure.authentication
```

You can then override the configuration:

```yaml
security:
    firewalls:
        main:
            #[...]
            form_login:
                #[...]
                success_handler: your.own.service.success.handler
                failure_handler: your.own.service.failure.handler
```

[link-VictoireWidgetConnectExtension.php]: ../../DependencyInjection/VictoireWidgetConnectExtension.php


---

### MENU

- [INDEX][link-menu-readme]
- [HWI OAUTH BUNDLE & WIDGET CONNECT OPTIONS][link-menu-hwi-options]
- [OVERRIDE TEMPLATES][link-menu-override-templates]
- [EVENTS][link-menu-events]

[link-menu-readme]: ../../../../
[link-menu-hwi-options]: hwi_and_widget_connect.md
[link-menu-override-templates]: override_templates.md
[link-menu-events]: events.md
