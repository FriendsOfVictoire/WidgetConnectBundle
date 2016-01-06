## HWI OAUTH BUNDLE & WIDGET CONNECT OPTIONS

If [HWIOauthBundle][link-github-hwi] is enable on your project and you define resource owners, then you will have
more options.

Here an example of hwi resource owners configuration.
```yaml
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

---

#### OPTIONS

When you edit this widget, you will see more options:

`label_facebook`: string - The label of the link generate for the facebook button.

`enable_facebook`: boolean - Display or Hide the facebook button.

`label_twitter`: string - The label of the link generate for the facebook button.

`enable_twitter`: boolean - Display or Hide the twitter button.

Automatically, a link appears for each resource owner enabled.

---

#### TRANSLATIONS

You should add some translations in `pp\Resources\Translations\victoire.{{ language }}.xlf` for each resource owner
defines in your hwi configuration.

`widget_connect.form.resource_owners.{{ resouce_owner}}`: Label for checkbox

`widget_connect.form.resource_owner.{{ resouce_owner}}`: Label for input


[link-github-hwi]: https://github.com/hwi/HWIOAuthBundle "HWIOauthBundle"


---

### MENU

- [INDEX][link-menu-readme]
- [OVERRIDE TEMPLATES][link-menu-override-templates]
- [HANDLERS][link-menu-handlers]

[link-menu-readme]: ../../../../
[link-menu-override-templates]: override_templates.md
[link-menu-handlers]: handlers.md
