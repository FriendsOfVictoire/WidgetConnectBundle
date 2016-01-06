## OVERRIDE TEMPLATES

create the directory `app\Resources\VictoireWidgetConnectBundle\views`

#### OVERRIDE LOGIN FORM

create the file `app\Resources\VictoireWidgetConnectBundle\views\part\login_form.html.twig`

[Default login_form.html.twig][link-login_form.html.twig]

---

#### OVERRIDE DEFAULT BUTTON TEMPLATE

create the file `app\Resources\VictoireWidgetConnectBundle\views\buttons\default.html.twig`

[Default login_form.html.twig][link-default.html.twig]

---

#### OVERRIDE SPECIFIC BUTTON TEMPLATE

create the file `app\Resources\VictoireWidgetConnectBundle\views\buttons\{{ resource_owner }}.html.twig`

with `resource_owner` the name to a resource owner define in the hwi configuration.


[link-login_form.html.twig]: ../views/part/login_form.html.twig
[link-default.html.twig]: ../views/buttons/default.html.twig


---

### MENU

- [INDEX][link-menu-readme]
- [HWI OAUTH BUNDLE & WIDGET CONNECT OPTIONS][link-menu-hwi-options]
- [HANDLERS][link-menu-handlers]

[link-menu-readme]: ../../../../
[link-menu-hwi-options]: hwi_and_widget_connect.md
[link-menu-handlers]: handlers.md