<?php

/**
 * Define a apache web document root located.
 * e.g /var/www
 *
 * Required to set!
 */
define('SERVER_WEB_ROOT', '/media/sf_projects');

/**
 * Path to server virtual host conf files,
 * for Debian based system /etc/apache2/sites-available.
 *
 * Required to set!
 */
define('CONFIG_PATH', '/etc/apache2/sites-available');

/**
 * Define site public directory if needed
 * e.g domain/public_html.
 * 
 * By default document root is domain name.
 */
define('PUBLIC_DIR', null);

/**
 * Prompt string.
 */
define('PROMPT', 'Please enter domain name: ');