# Get Address IO plugin for Craft CMS 3.x

Integrates Craft CMS with the getaddress IO service for autocompletion of address' in the UK.

![Screenshot](resources/img/plugin-logo.png)

## Requirements

This plugin requires Craft CMS 3.5 or later. This is due to the usage of Crafts Template Roots functionality.

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require creode/get-address-io

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for Get Address IO.

## Get Address IO Overview

This plugin aims to provide a basic input and select box for communicating with the https://getaddress.io API. The goal is to keep this plugin as lightweight as possible and offer the bear miniumum functionality so that it can be adapted and styled easily.

## Configuring Get Address IO

On the Plugins page, click `Settings` for the "Get Address IO" plugin and set your API key. I would suggest this to be set as an environment variable however there is the option to just provide this as standard.

## Using Get Address IO

You have two templates that can be used in your sites `templates` folder:

 - `{% include '_get-address-io/_autocomplete.twig' %}` - Offers address autocompletion for a single field. This by default is tied into the Select2 library.
 - `{% include '_get-address-io/_postcode-lookup.twig' %}` - Offers the ability to lookup a postcode and display a select list of address' matching that postcode.

Each of the templates above can be overwritten by using the same path within your template folder. This gives you fine grain control over how the fields should be structured. When doing so I'd suggest removing the existing asset bundle and going with your own JavaScript to ensure the functionality still works.

### JavaScript Events

In order to keep this plugin as customisable as possible we fire off our own document events within JavaScript so that they can be responsed to within your own code. These are as follows:

 - get-address-io-postcode-lookup: { detail: { selectBox: `<dom element>`, addresses: `<array of addresses>` } }
 - get-address-io-autocomplete: { detail { addresses: `<array of addresses>` } }

See the following example showing how this event can be listened to:

VanillaJS
```
document.addEventListener('get-address-io-postcode-lookup', function(e) {
    var eventData = e.detail;

    // Use eventData.addresses to populate your own fields.
});
```

jQuery
```
jQuery(document).on('get-address-io-postcode-lookup', function(e) {
    var eventData = e.detail;

    // Use eventData.addresses to populate your own fields.
});
```

## Get Address IO Roadmap

Some things to do, and ideas for potential features:

* Release it
* Implement more features from the API

Brought to you by [Creode](https://creode.co.uk)
