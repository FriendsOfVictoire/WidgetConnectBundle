## Victoire CMS Connect Bundle

#### GET STARTED

Need to add a login form in a victoire cms website ?

First you need to have a valid Symfony Victoire edition.
Then you just have to run the following composer command :

```
    php composer.phar require friendsofvictoire/connect-widget
```

Declare your widget in your AppKernel:

```php
    new Victoire\Widget\ConnectBundle\VictoireWidgetConnectBundle(),
```

Add routes in `app\config\routing.yml`
```
victoire_widget_connect:
    resource: "@VictoireWidgetConnectBundle/Resources/config/routing.yml"
```

Then you just need to have `ROLE_VICTOIRE_DEVELOPER` and add this widget.

---

#### BASIC OPTIONS

`redirect_url`: string - Redirect to this url after success login.

`form_login`: boolean - Display or Hide the form login.


---

### MENU

- [HWI OAUTH BUNDLE & WIDGET CONNECT OPTIONS][link-menu-hwi-options]
- [OVERRIDE TEMPLATES][link-menu-override-templates]
- [HANDLERS][link-menu-handlers]
- [EVENTS][link-menu-events]

[link-menu-hwi-options]: Resources/doc/hwi_and_widget_connect.md
[link-menu-override-templates]: Resources/doc/override_templates.md
[link-menu-handlers]: Resources/doc/handlers.md
[link-menu-events]: Resources/doc/events.md
