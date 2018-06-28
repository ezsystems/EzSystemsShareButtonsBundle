# Share Buttons Bundle

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/8f309360-c70a-486f-9d7f-b50868fce663/big.png)](https://insight.sensiolabs.com/projects/8f309360-c70a-486f-9d7f-b50868fce663)

This bundle adds social share buttons into Symfony applications _(including eZ Publish 5.x & eZ Platform)_.

## Requirements

- Symfony v2.6 or later.

## Installation
This package is available via Composer, so the instructions below are similar to how you install any other open source Symfony Bundle.

Run the following command in a terminal, from your Symfony installation root (pick most recent release):

```bash
php composer.phar require ezsystems/share-buttons-bundle
```

Enable the bundle in `app/AppKernel.php` file (for regular Symfony application) or `ezpublish\EzPublishKernel.php` file (for eZ Publish / eZ Platform):

```php
$bundles = array(
    // existing bundles
    new EzSystems\ShareButtonsBundle\EzSystemsShareButtonsBundle()
);
```

Install additional assets (CSS) for default template (omit this step if you are planning to use custom stylesheets):

```twig
{% stylesheets
    bundles/ezsystemssharebuttonsbundle/css/default.css
%}
    <link rel="stylesheet" type="text/css" href="{{ asset_url }}"/>
{% endstylesheets %}
```

## Configuration

The bundle's configuration depends on siteaccess. This is an example of settings (`config.yml`):

```yaml
ez_share_buttons:
    system:
        default:
            # enable only those providers you are interested
            providers:
                - facebook_like
                - facebook_recommend
                - twitter
                - linkedin
                - google_plus
                - xing
            template: default
            
            facebook_like:
                # available options are: standard, box_count, button_count, button
                layout: button
                width: ~
                show_faces: true
                # displays additional `share` button
                share: false
            
            facebook_recommend:
                # available options are: standard, box_count, button_count, button
                layout: button
                width: ~
                show_faces: true
                # displays additional `share` button
                share: false

            twitter:
                show_username: false
                large_button: false
                language: ~

            linkedin:
                # available options are: top, right, none
                count_mode: none
                language: en_US

            google_plus:
                # available options are: small, medium, standard, tall
                size: medium
                # available options are: inline, bubble, none
                annotation: none
                width: ~
                language: en-GB

            xing:
                # available options are: square, none
                shape: none
                # available options are: right, top, none
                counter: none
                # available options are: de, none
                language: none

```

## Features

### Comments abstraction

`ShareButtonsBundle` is **provider based**. This means that it is open to **any kind of social share services**.

### Single entry point

Render your social share buttons with a single line of code.

## Available integration

Currently, `ShareButtonsBundle` is working with the following social share services:

* Facebook like
* Facebook recommend
* Google Plus
* LinkedIn share
* Twitter
* Xing

## Usage

Insert the following Twig helper in the place where you want to display the share buttons bar:

```twig
{{ show_share_buttons() }}
```

You can override existing siteaccess configuration for `ShareButtonsBundle` by adding additional arguments:
 
 ```twig
 {{ show_share_buttons(
    options = {
        provider_label: {
            key: 'value'
        },
        template: 'default'
    },
    providers = ['provider_label']
 ) }}
 ```
 
 More practical example of the usage:
 
 ```twig
 {{ show_share_buttons(
     options = {
         facebook_like: {
             layout: 'button_count',
             show_faces: true
         },
         google_plus: {
             size: 'small',
             annotation: 'bubble'
         }
         template: 'default'
     },
     providers = ['facebook_like', 'google_plus']
  ) }}  
 ```

## License

This bundle is under **[GPL v2.0 license](http://www.gnu.org/licenses/gpl-2.0.html)**.
