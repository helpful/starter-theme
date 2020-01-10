
# Helpful fork of the Timber Starter Theme

Based on the [official Timber starter theme](https://github.com/laras126/timber-starter-theme), and using [John Billion's Extended CPTS library](https://github.com/johnbillion/extended-cpts) for registering post types and taxonomies, [Stout Logic's ACF Builder](https://github.com/StoutLogic/acf-builder) for managing custom fields (requires ACF Pro plugin to be installed - managed through wp-admin due to frewuent updates) and [Gravity forms](https://www.gravityforms.com/)

## Setup / Install

If you are manually deploying this theme for the first time, you will need to run `composer install` to include Timber, Extended CPTs and ACF Builder. In the WordPress install you will need to ensure ACF Pro and Breadcrumb NavXT are installed, as well as Gravity Forms if desired.

## What's here?

### Structure

`.githooks/` Example (currently) scripts to be triggered pre/post git actions.

`acf-json/` JSON field cache for ACF - improves performance.

`assets/` CSS, JS, SASS, images etc for the theme.

`inc/` key functionality - registering post types, custom fields, template functions etc.

`static/` is where you can keep your static front-end scripts, styles, or images. In other words, your Sass files, JS files, fonts, and SVGs would live here.

`templates/` contains all of your Twig templates. These pretty much correspond 1 to 1 with the PHP files that respond to the WordPress template hierarchy. At the end of each PHP template, you'll notice a `Timber::render()` function whose first parameter is the Twig file where that data (or `$context`) will be used. Just an FYI.

### Included example code

#### Custom templates
* `template-flexible.php` / `template-flexible.twig` (work in progress, content not implimented yet)
* `template-events.php` / `template-events.twig` (work in progress, content not implimented yet)

#### `inc/post-types-taxonomies.php`
* Event CPT and Location taxonomy registered with various args and examples in `inc/post-types-taxonomies.php`
* Re-label Posts as News in wp-admin - function `starter_theme_change_post_labels()`
* Re-label Tags to Themes in wp-admin (e.g. to match front-end) - function `starter_theme_label_tags_themes()`
* Enable filters on native archive pages (post and meta args) - function `starter_theme_taxonomy_archive_basic_filters()`
* Enable taxonomy filters on native archive pages - function `starter_theme_taxonomy_archive_taxonomy_filters()`

#### `inc/custom-fields.php`
* Prevent WP loading default list of custom fields in wp-admin to improve performance in `inc/custom-fields.php`
* Register theme options page in `inc/custom-fields.php`
* Modify TinyMCE editor to remove H1 and H2 - function `starter_theme_tinymce_remove_h1_h2()`
* Define and register ACF fields and groups in `inc/custom-fields.php`

#### `inc/forms.php`
* Remove tabindex from GRavity Forms in `inc/forms.php`

#### `inc/user-roles.php`
* Register custom Member user role as front end only user type - function `starter_theme_register_front_end_user()`
* Hide the admin bar for front end only user roles - function `starter_theme_hide_admin_bar()`
* Don't let front end users into wp-admin - function `starter_theme_protect_wpadmin()`
* Get taxonomy term IDs that exist against given post type(s) - `starter_theme_terms_used_by_post_type()`

#### `inc/template-functions.php`
* Get list of years that items published against given post type(s) - `starter_theme_years_post_type_published()`
* Global context includes `logged_in` (bool), `current_user` (WP User), `site.login_url` (stirng), `site.logout_url` (string)


## Other Timber Resources

The [main Timber Wiki](https://github.com/jarednova/timber/wiki) is super great, so reference those often. Also, check out these articles and projects for more info:

* [This branch](https://github.com/laras126/timber-starter-theme/tree/tackle-box) of the starter theme has some more example code with ACF and a slightly different set up.
* [Twig for Timber Cheatsheet](http://notlaura.com/the-twig-for-timber-cheatsheet/)
* [Timber and Twig Reignited My Love for WordPress](https://css-tricks.com/timber-and-twig-reignited-my-love-for-wordpress/) on CSS-Tricks
* [A real live Timber theme](https://github.com/laras126/yuling-theme).
* [Timber Video Tutorials](http://timber.github.io/timber/#video-tutorials) and [an incomplete set of screencasts](https://www.youtube.com/playlist?list=PLuIlodXmVQ6pkqWyR6mtQ5gQZ6BrnuFx-) for building a Timber theme from scratch.

