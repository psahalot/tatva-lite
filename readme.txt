=== Tatva ===
Contributors: Puneet Sahalot
Author URI: http://ideaboxthemes.com
Tags: black, gray, dark, light, one-column, two-columns, right-sidebar, fluid-layout, responsive-layout, custom-background, custom-header, custom-menu, editor-style, featured-image-header, featured-images, full-width-template, microformats, post-formats, sticky-post, theme-options, threaded-comments, translation-ready
Requires at least: 3.6
Tested up to: 3.9
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Tatva is a mobile responsive WordPress theme with support for Easy Digital Downloads plugin. So you can setup a simple business webiste or even integrate an online store for selling digital products. It incorporates multiple color schemes and layouts via Theme Customizer that are easy to modify, a set of common templates, support for WordPress Post Formats and the gorgeous, retina friendly Font Awesome icon font.


== Description ==

Tatva is a mobile responsive WordPress theme creating beautiful, responsive websites. It has been built only with
required features and options. There are no confusing theme options and settings. Simply install and activate the theme.
Front page is completely widgetized so it gives the users complete control over the content. 
There's built in support for Easy Digital Downloads plugin which allows users to setup their online store and
start selling digital products easily. 

It uses Theme customizer to implement all theme customization features. 
as well as the gorgeous [Font Awesome](http://fortawesome.github.io/Font-Awesome/) icon font by Dave Gandy.

The main navigation uses the standard WordPress menu. Support for dropdown menus is inluded by default. If you'd like to envoke a button toggle for the main navigation menu on small screens, simply uncomment the two lines from the tatva_scripts_styles() function within functions.php to register and enqueue the necessary javascript file, and BAM! You're done!

Templates

Tatva includes a set of your most common theme templates, including templates for Full-Width pages, Front-page, EDD Store, Right Sidebar (default), Front-Page, Tag,
Categories, Authors, Search, Posts Archive and 404.

Post Formats

All the standard WordPress Post Formats are supported. These include; Aside, Gallery, Link, Image, Quote, Status, Video, Audio, Chat and of course, 
your standard post.

Widgets

Widgets are a great way of adding extra content to your site and Tatva has a whole assortment of them.

Main Sidebar: Appears on all the pages, posts, archives
Header Widget: Appears in the header right section
Shop Sidebar: Appears on single product pages

The Home Featured Left & Right Widget areas are dynamic! You can use up to two of these and they'll magically space themselves out evenly. For example, if you 
only add widgets into the Home Featured Left Widget Area, then it will expand the full width of the page. However, if you add widgets to both  
Featured Left & Right Widget areas, they'll magically space themselves out over two equal columns.
Home Featured Left Widget: Appears in the left featured area on the Front Page
Home Featured Right Widget: Appears in the right featured area on the Front Page

The Front Page Widget areas are dynamic! You can use up to four of these and they'll magically space themselves out evenly. For example, if you only add 
widgets into the Home #1  Widget Area, then it will expand the full width of the page. However, if you add widgets to all four Front Page Widget 
Areas, they'll magically space themselves out over four equal columns.
Home #1 Widget Area: Appears when using the optional frontpage template with a page set as Static Front Page
Home #2 Widget Area: Appears when using the optional frontpage template with a page set as Static Front Page
Home #3 Widget Area: Appears when using the optional frontpage template with a page set as Static Front Page
Home #4 Widget Area: Appears when using the optional frontpage template with a page set as Static Front Page

The Home Testimonial widet area appears below Home #1-#4 widget areas and can be used for displaying 
client testimonials or any other kind of content.

The Footer Widget areas are dynamic! You can use up to four of these and they'll magically space themselves out evenly. For example, if you only add 
widgets into the Footer #1 Widget Area, then it will expand the full width of the page. However, if you add widgets to all four Footer Widget Areas, 
they'll magically space themselves out over four equal columns.
Footer #1 Widget Area: Appears in the footer sidebar
Footer #2 Widget Area: Appears in the footer sidebar
Footer #3 Widget Area: Appears in the footer sidebar
Footer #4 Widget Area: Appears in the footer sidebar

Custom Header

The Default logo can be easily changed using the Custom Header feature. You change this in the Appearance > Header menu option

Custom Background

The background pattern can be changed using the Custom Background feature. You change this in the Appearance > Background menu option

Theme Customizer

Additional Theme Customization Options can be found in the Appearance > Customize menu option. These include options for:
Specifying site layout and color scheme
Enabling featured posts on front page
Enabling featured products on front page
Specifying EDD store page and archive settings
Changing the footer credit text
Adding custom CSS


== Installation ==

There are three ways to install your theme. It can be installed by manually uploading the files to the themes folder using an FTP application,
it can be installed by downloading from the WordPress Theme Directory within the Dashboard or it can be installed by uploading the theme zip
file that you downloaded.

Use the following instructions to install & activate Tatva using your preferred method.

Manual installation:

1. Unzip the files from the Tatva zip file that you downloaded
2. Upload the Tatva folder to your /wp-content/themes/ directory
3. Click on the Appearance > Themes menu option in the WordPress Dashboard
4. Click the Activate link below the Tatva preview thumbnail

Install from the WordPress Theme Directory:

1. Click on the Appearance > Themes menu option in the WordPress Dashboard
2. Click the Install Themes tab at the top of the page
3. Type 'Tatva' in the search field, without the quotes, and then click the Search button
4. Click the Install Now link below the Tatva preview thumbnail
5. Once the theme has been installed, click the Activate link

Install by uploading the theme zip file:

1. Click on the Appearance > Themes menu option in the WordPress Dashboard
2. Click the Install Themes tab at the top of the page
3. Click on the Upload link just below the two tabs at the top of the page
4. Click the Browse button, browse to the folder that contains the theme zip file, select it and then click the Open button
5. Click the Install Now button
6. Once the theme has been installed, click the Activate link


== Getting Started ==

Since Tatva is a starter theme to kick off your own awesome theme, the first thing you want to do is copy the tatva theme folder 
and change the name to something else. You'll then need to do a three-step find and replace on the name in all the templates.

1. Search for tatva inside single quotations to capture the text domain.
2. Search for tatva_ to capture all the function names.
3. Search for tatva with a space before it to replace all the occurrences of it in comments.
   (You'd replace this with the capitalized version of your theme name.)

or, to put it another way...

Search for:'tatva'
 Replace with:'yourawesomethemename'
Search for:tatva_
 Replace with:yourawesomethemename_
Search for: tatva
 Replace with: YourAwesomeThemeName

Lastly, update the stylesheet header in style.css and either update or delete this readme.txt file.


== License ==

Tatva is licensed under the [GNU General Public License version 2](http://www.gnu.org/licenses/old-licenses/gpl-2.0.html).

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the
Free Software Foundation; either version 2 of the License, or (at your option) any later version.


== Credits ==

Tatva utilises the following awesomeness:

[Quark theme] is the base for Tatva Lite and Tatva Pro. Quark is developed by Anthony Hortin @maddisondesigns
[Modernizr](http://modernizr.com), which is licensed under the MIT license
[Normalize.css](https://github.com/necolas/normalize.css), which is licensed under the MIT license
[jQuery Validation](http://bassistance.de/jquery-plugins/jquery-plugin-validation) which is dual licensed under the MIT license and GPL licenses
[Font Awesome](http://fortawesome.github.io/Font-Awesome) icon font, which is licensed under SIL Open Font License and MIT License
[Open Sans font](http://www.google.com/fonts/specimen/Open+Sans), which is licensed under SIL Open Font License 1.1
[Montserrat font](http://www.google.com/fonts/specimen/Montserrat), which is licensed under SIL Open Font License 1.1

= 1.0 =
- Initial version
