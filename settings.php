<?php

/**
 * Define a apache web document root located.
 * e.g /var/www
 *
 * Required to set!
 */
define('SERVER_WEB_ROOT', '/home/mike/WebProjects');

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
 * Default document root is domain name.
 */
define('PUBLIC_DIR', null);

/**
 * Define site owner user
 */
define('OWNER', 'mike');

/**
 * Prompt string.
 */
define('PROMPT', 'Please enter domain name: ');