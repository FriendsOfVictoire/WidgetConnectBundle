Victoire CMS Connect Bundle
============

### GET STARTED

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


### BASIC OPTIONS

`redirect_url`: string - Redirect to this url after success login.

`form_login`: boolean - Display or Hide the form login.


### HWI OAUTH BUNDLE & CONNECT WIDGET

If [HWIOauthBundle][link-github-hwi] is enable on your project and you define the resource owners, then you will have
more options.

Here an example of hwi resource owners configuration.
```
hwi_oauth:
    #[...]
    resource_owners:
        facebook:
            type:                facebook
            client_id:           %facebook_client_id%
            client_secret:       %facebook_client_secret%
            #[...]
        twitter:
            type:                twitter
            client_id:           %twitter_client_id%
            client_secret:       %twitter_client_secret%
            #[...]
        #[...]
```

`label_facebook`: string - The label of the link generate for the facebook button.

`enable_facebook`: boolean - Display or Hide the facebook button.

`label_twitter`: string - The label of the link generate for the facebook button.

`enable_twitter`: boolean - Display or Hide the twitter button.


### OVERRIDE TEMPLATES

create the directory `app\Resources\VictoireWidgetConnectBundle\views`

##### OVERRIDE LOGIN FORM

create the file `app\Resources\VictoireWidgetConnectBundle\views\part\login_form.html.twig`

##### OVERRIDE DEFAULT BUTTON TEMPLATE

create the file `app\Resources\VictoireWidgetConnectBundle\views\buttons\default.html.twig`

##### OVERRIDE SPECIFIC BUTTON TEMPLATE

create the file `app\Resources\VictoireWidgetConnectBundle\views\buttons\{{ resource_owner }}.html.twig`

with `resource_owner` the name to a resource owner define in the hwi configuration.

### TRANSLATIONS

You should add some translations in `pp\Resources\Translations\victoire.{{ language }}.xlf` for each resource owner
defines in your hwi configuration.

`widget_connect.form.resource_owners.{{ resouce_owner}}`: Label for checkbox

`widget_connect.form.resource_owner.{{ resouce_owner}}`: Label for input



[link-github-hwi]: https://github.com/hwi/HWIOAuthBundle "HWIOauthBundle"
