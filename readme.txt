=== AGP Font Awesome Collection ===
Contributors: agolubnichenko
Tags: agp, font-awesome, font awesome, Font Awesome, fa, fa-icon, fa icons, icon font, icons, font, button, buttons, developer, developer tools, tools, shortcode, social icons, social share, social buttons
Requires at least: 3.5.0
Tested up to: 4.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Stable tag: trunk

Full set of Font Awesome Icons with Extra Tools in one plugin for Your website

== Description ==

The plugin allows simply integration and usage of the Font Awesome Icons inside your WordPress theme. 
With this plugin you can easy add various types of the Font Awesome based icons, buttons etc. and customize it for your needs with flexible parameters of shortcodes. 
WordPress Developers also can find with this plugin some useful features for usage within the code.

= Features =

* No need to have specific skills to add beautiful icon or button on a page or a post. Just follow shortcode attributes references for easy customization.
* You can add any of the Font Awesome icons and use it as simple icon, icon with text, icon button, icon button with text and easy customize it for your needs.
* For buttons can be added URL attribute that can lead to a page, an external site or a social networks profile. You can use this feature for a personal promotion, downloads link, donation etc.
* Specific Font Awesome Version shortcode allows to show current Font Awesome version, e.g. for your own plugin.
* As developer, you can add dropdown with the Font Awesome icons list and use it for your purpose.
* For developers are available some object and classes that implement convenient and flexible methods for access to Font Awesome Icons properties.
* All shortcodes can be used via Administrator Panel in WISIWING areas and directly in code.

= Simpe Icon =

Following shortcode can be used for adding of a simple icon:

`[fac_icon icon="camera"]`

* **icon** – Font Awesome  icon name without "fa-" prefix

Shortcode with additional attributes:

`[fac_icon icon="camera" font_size="20px" color="#ff0000"]`

* **font_size** – allow to set icon size, positive digital value with "px"
* **color** – allow to set icon color with HEX color value

Also you are able to add simple icon right from the TinyMCE WISIWING editor via "FA" button at the action bar.

More info you can find on the [screenshots](https://wordpress.org/plugins/agp-font-awesome-collection/screenshots/) and [FAQ](https://wordpress.org/plugins/agp-font-awesome-collection/faq/) tabs.

= Simpe Icon with text and shape =

Following shortcode can be used for adding of a simple icon with additional text and shape:

`[fac_icontext icon="heart" text="Default"]`

* **icon** – Font Awesome  icon name without "fa-" prefix
* **text** – allows to set text value that displays at the right side of the icon

Shortcode with additional attributes:

`[fac_icontext icon="heart" text="Default" shape_type="round" shape_bg="#000000" icon_color="ffffff" text_color="000000"]`

* **shape_type** – preset shape type ( square / rounded / round )
* **shape_bg** – allows to set shape background color with HEX color value
* **icon_color** – allows to set icon color with HEX color value
* **text_color** – allows to set text color with HEX color value

As general references you can use Font Awesome official examples:  http://fortawesome.github.io/Font-Awesome/examples/ .

As for Font Awesome icon names references you can check following link: http://fortawesome.github.io/Font-Awesome/cheatsheet/ .

More info you can find on the [screenshots](https://wordpress.org/plugins/agp-font-awesome-collection/screenshots/) and [FAQ](https://wordpress.org/plugins/agp-font-awesome-collection/faq/) tabs.


= Buttons =

Following shortcode can be used for adding of a simple icon button:

`[fac_button icon="facebook" name="button_1" title="Find Us on Facebook" link="www.facebook.com"]`

* **icon** – Font Awesome  icon name without "fa-" prefix
* **title** – allows to set text for button hover (link "title" attribute)
* **link** – allows to set link URL
* **name** – allows to set unique button name (link ID attribute); this parameter can be used for development purpose (e.g. JavaScript).

Shortcode with additional attributes for icon button with text:

`[fac_button icon="facebook" name="button_1" title="Find Us on Facebook" link=www.facebook.com text=" Find Us on Facebook "]`

* **text** – allows to set text value that displays at the right side of the icon

Shortcode with additional attributes for icon button with text customization:

`[fac_button icon="facebook" name="button_1" title="Find Us on Facebook" link=www.facebook.com text=" Find Us on Facebook " background="#0d47a1" color="#ffffff" border_radius="4px" border_width="4px" border_color="#0d47a1"]`

* **color** – allows to set text and icon color with HEX color value
* **background** – allows to set button background color with HEX color value
* **border_width** – allows to set button border width, positive digital value with "px"
* **border_color** – allows to set button border color with HEX color value
* **border_radius** – allows to set button corner rounding; one positive digital value with "px"  allows to set equal corner rounding for all corners. Also can be used following values (for example): border_radius="10px 0" – corner rounding for left-top and right-bottom corners and vice versa border_radius="0 10px" - corner rounding for right-top and left-bottom corners; border_radius=" 10px 0 0" – corner rounding for left-top corner etc.  For more references check "border-radius" CSS property.

More info you can find on the [screenshots](https://wordpress.org/plugins/agp-font-awesome-collection/screenshots/) and [FAQ](https://wordpress.org/plugins/agp-font-awesome-collection/faq/) tabs.

= Dropdown list =

Following shortcode can be used for adding of dropdown with Font Awesome icons list:

`[fac_dropdown icon="cc-visa" name="myselectid_1"]`

* **icon** – allows to set Font Awesome icon that shows by default ; use Font Awesome  icon name without "fa-" prefix
* **name** – allows to set unique dropdown name (select ID attribute); this parameter can be used for development purpose (e.g. JavaScript)

Also this shortcode can be used directly in code.
More info you can find on the [screenshots](https://wordpress.org/plugins/agp-font-awesome-collection/screenshots/) and [FAQ](https://wordpress.org/plugins/agp-font-awesome-collection/faq/) tabs.

= Current Version =

Following shortcode can be used for adding of info box with current Font Awesome version:

`[fac_version]`

More info you can find on the [screenshots](https://wordpress.org/plugins/agp-font-awesome-collection/screenshots/) and [FAQ](https://wordpress.org/plugins/agp-font-awesome-collection/faq/) tabs.


= For Developers =

If you need to have access to object of collection you can use following code:

`<?php  $iconRepository = Fac()->getIconRepository(); ?>`

This object contains list of the entity of Font Awesome Icons collection and access methods for these objects.

You can find general objects access methods below:

* **getAll()** – allow to get full list of the entity of Font Awesome Icons
* **findById($id)** – allow to get icon entity ($id – icon name)
* **getCount()** – allows to get total count of icons
* **getAllCategories()** – allows to get list of icons categories
* **getAllByCategory($category)** – allows to get list of icons for specified category
* **getVersion()** – allows to get current Font Awesome version
* etc.

Each icon is an Object and also has properties and methods.
For example, if you need to get and show icon display name (e.g. "adn"), you need to use following code:

`<?php echo Fac()->getIconRepository()->findById('adn')->getName(); ?>`

As result, will be displayed: "App.net"
For more references you can check realization for "Fac_IconRepository" and  "Fac_IconEntity" classes in plugin code.
Also you can send any questions in plugin [support](https://wordpress.org/support/plugin/agp-font-awesome-collection) tab.

== Installation ==

1. Download a copy of the plugin
2. Unzip and Upload 'AGP Font Awesome Collection' to a sub directory in '/wp-content/plugins/'.
3. Activate the plugins through the 'Plugins' menu in WordPress.

== Frequently Asked Questions ==

= How can I change the Shortcode content? =

The plugin includes some templates for each shortcode in "templates/" folder. 
You can copy any template in your active theme and customize it for your needs. 
Path to the templates folder inside the active theme:

[ActiveTheme]/templates/agp-font-awesome-collection/


= How can I style the Shortcode content? =

The plugin includes CSS file "assets/css/style.css". 
You can copy this file in your active theme and customize it for your needs. 
Path to the styles inside the active theme:

[ActiveTheme]/templates/agp-font-awesome-collection/assets/css/style.css

= How to use visual constructor? (coming soon...) =

[youtube http://www.youtube.com/watch?v=TJ3QqH4BsYY]

= How to create own shortcode?  (coming soon...)  =

[youtube http://www.youtube.com/watch?v=BT02i79Vmts]

== Screenshots ==

1. Icons and Buttons
2. Dropdown List of Icons
3. Current Version
4. Font Awesome Icons in TinyMCE editor

== Changelog ==

= 1.1.2 =
* Minor changes of the plugin core

= 1.1.1 =
* Minor bugfixing.

= 1.1.0 =
* Changes and cleanup of default elements styling
* Changes and cleanup of default elements templates
* Were added extended parameters for existing shortcodes
* Was added new shortcode "fac_icontext" for simple icon with text
* Added extended plugin user guide
* Minor changes

= 1.0.1 =
* Button for adding Font Awesome Icons in TinyMCE editor
* Minor changes

= 1.0.0 =
* Initial release.
