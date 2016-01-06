## EVENTS

Many events are dispatch.

`WidgetConnect::EVENT_BEFORE_LOGIN` and `WidgetConnect::EVENT_BEFORE_HWI_LOGIN` are dispatch in the `LoginController`
with `AuthenticationEvent` which contains the widget and extend `Symfony\Component\EventDispatcher\Event` and
the `service` (resource_owner) for HWI event.


`WidgetConnect::EVENT_AFTER_LOGIN_FAILURE` is dispatch in the `AuthenticationFailureHandler`, contains the
`RedirectResponse` and extends `Symfony\Component\EventDispatcher\Event`.

`WidgetConnect::EVENT_AFTER_LOGIN_SUCCESS` is dispatch in the `AuthenticationSuccessHandler`, contains the
`RedirectResponse` and extends `Symfony\Component\EventDispatcher\Event`.

`WidgetConnect::EVENT_AFTER_LOGOUT` is dispatch in the `LogoutSuccessHandler`, contains the `RedirectResponse` and
extends `Symfony\Component\EventDispatcher\Event`.


---

### MENU

- [INDEX][link-menu-readme]
- [HWI OAUTH BUNDLE & WIDGET CONNECT OPTIONS][link-menu-hwi-options]
- [OVERRIDE TEMPLATES][link-menu-override-templates]
- [HANDLERS][link-menu-handlers]

[link-menu-readme]: ../../../../
[link-menu-hwi-options]: hwi_and_widget_connect.md
[link-menu-override-templates]: override_templates.md
[link-menu-handlers]: handlers.md
