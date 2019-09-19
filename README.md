# WC Sevilla WordPress Theme

This is an AMP compatible WordPress theme built on top of [WP Rig](https://github.com/wprig/wprig), more specifically a [custom fork of WP Rig](https://github.com/felixarntz/wprig-custom).

The design of the theme was generally taken from the ["Beck & Galo" demo template on the amp.dev website](https://amp.dev/documentation/templates/).

## Usage

### Development Version

1. `git clone git@github.com:felixarntz/wc-sevilla.git wp-content/themes/wc-sevilla-dev`
2. `cd wp-content/themes/wc-sevilla-dev`
3. `composer install && npm install && npm run build`

You can actually run this version and you should run it for development, but this version shouldn't be deployed on a production site.

### Production Version

4. `npm run bundle`

The production theme will be located in a new `wp-content/themes/wc-sevilla` directory, alongside a ZIP file of it.
