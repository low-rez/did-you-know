# Did you know... (a WordPress challenge)

The `Did you know...` plugin is a WordPress programming challenge published by WP Results.

This plugin is designed to test your knowledge of a broad spectrum of modern technologies used in WordPress design.

* WordPress widget for front-end display
* Admin for controlling the widget instances and dictionary

## Deliverables

* A github pull request of your completed work (see below)
* A demo URL running a copy of your work   

## Resources

You will need knowledge of the following technologies to complete this project:

* WordPress
    * Custom Post Types
        * http://codex.wordpress.org/Post_Types
        * PODS plugin
            * http://wordpress.org/plugins/pods/

    * Filters and Actions

		* http://codex.wordpress.org/Plugin_API/Filter_Reference
		* http://codex.wordpress.org/Plugin_API/Action_Reference

    * Plugins
    	* http://codex.wordpress.org/Plugin_API

    * Widgets
    	* http://codex.wordpress.org/WordPress_Widgets
    	* http://codex.wordpress.org/Widgets_API

    * Admin panels and menus
        * http://codex.wordpress.org/Administration_Menus

    * Ajax
        * http://codex.wordpress.org/AJAX

    * Mail API
        * http://codex.wordpress.org/Function_Reference/wp_mail

* jQuery
    * GET
        * http://api.jquery.com/jQuery.get/
        * http://matthewruddy.com/using-jquery-with-wordpress/
* PHP
    * JSON
        * http://php.net/manual/en/book.json.php

## Creating the `Word` Custom Post Type

You will use teh `PODS` plugin to create a Custom Post Type named `Word`. A `Word` post type uses the `post_title` field for the word
and the `post_body` field for the definition.

Using `PODS`, you should be able to do the following with no programming:

* Add words
* Remove words
* Search for words

## Dictionary Import Tool

This import tool accepts a JSON upload and can be run repeatedly. It works as follows:

* Create an `Admin > Did You Know > Import` menu item
* Present a file upload field with submit button
* If valid JSON is uplaoded, iterate through the JSON and insert or update `Word` posts as appropriate
* Display how many words were added and updated

## Widget (front-end)

Please refer to the PDF mockup. The widget should be a fully-functional WordPress widget with the following features:

* After page loads, the initial word should be loaded via Ajax according to the widget instance settings (see below).
* When the user presses `enter` in the search box, the widget should look up and load the requested word via Ajax, or display that the word was not found.

Impelementation notes:

* The widget should load the words via a `Word` post type search using a WordPress ajax hook.

## Admin

### Widget Instance Admin

Each widget can be individually configured with a default word. When a default is set, this word will always be displayed first.

### About Page

Create a static About Us page with some custom content. This page shoudl be accessible from `Admin > Did you Know > About`.

At the end of the page, there should be a support form with an Email, Subject, and Body. Pressing submit should email a hard-coded email link using WordPress's built-in email features.

## Additional Requirements

* Make 3 separate commits: the widget, the dicionary admin, and the widget instance admin
* Fill out the resources section above with at least 3 more reference links that you found relevant while implementing this project
