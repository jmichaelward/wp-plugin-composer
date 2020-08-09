# WP Plugin Composer
This package aims to help WordPress developers build new plugins using [Composer](https://getcomposer.org) for 
managing their third-party dependencies.

## Installation
To create a new starter plugin, simply use the command line to navigate to the `plugins` directory of your WordPress
install, then run `composer create-project jmichaelward/wp-plugin-composer [your-plugin-name]`, replacing
`your-plugin-name` with the desired name of your plugin.

Once installed, you'll want to make a few additional updates:
- Perform a search-replace of `JMichaelWard\WPPluginComposer` on the plugin with your own `<vendor>\<plugin>` namespace.
- Update the details of the main `plugin.php` file with your own plugin's information.
- Update the details in the composer.json file with your own plugins' information.
- Replace this README with your own.

## Background
Composer provides loads of benefits for PHP developers, but lots of questions/challenges arise when trying to integrate
it within WordPress. One major benefit is that it provides its own class autoloader, making it easy to locate your own
class files and the class files or third-party dependencies. One major challenge is that distribution of your plugin
has requirements depending on whether it will be installed manually or as part of an automated process. This can 
complicate the version control process, which sometimes leads to developers including third-party packages as part of
their source code, somewhat negating the benefits and responsibilities of Composer itself.

This starter plugin aims to leverage the benefits while mitigating the challenges by providing a `composer.phar` file
as part of its distribution. It registers an activation hook that checks for the presence of your main class files and
of a localized `vendor` directory. If one isn't found, the plugin will make use of its pre-packaged `composer.phar` to
install Composer itself to `vendor`, as well as each of the dependencies defined in the `composer.json` file in the
plugin root. Thus, if you'd like to make your plugin installable using Composer, you can do so without needing to
package all of your dependencies with it.

## Feedback/Support
This starter plugin is very much in beta. As such, I encourage you to use it at your own risk, though I would absolutely
love any feedback you might have. Please feel free to open an issue in the repository with notes about any difficulties 
you encounter.
