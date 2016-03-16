# Installing Smarty

This is to be done only once.

  1. Download the latest Smarty release [currently v3.1.28](https://github.com/smarty-php/smarty/archive/v3.1.28.zip)
  2. Unzip it under your www-root, for example `F:\wamp\www\Smarty-3.1.28`


## Setting up the Smarty example

These steps are to be done for each project that uses Smarty.

  1. We assume Smarty is installed in your www-root
  2. Make sure your project has a `smarty` directory with the following sub-directories
     - `cache`
     - `config`
     - `templates`
     - `templates_c`
  3. `smarty/cache` and `smarty/templates_c` need to be writeable by Apache (`chmod 777`)
  4. Set `SMARTY_DIR` and `PROJECT_DIR` paths in the php file (`smarty.php`)
    - Make sure you have a trailing slash after `libs/`!
    - On windows, use forward slashes instead of backslashes, e.g., `define("SMARTY_DIR", "F:/wamp/www/Smarty-3.1.28/libs/")`
