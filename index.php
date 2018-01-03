<?php

// Configuration
require_once 'settings.php';

/**
 * Read virtual host name.
 * e.g mysite.local
 */
$host = readline(PROMPT);

try {

    if (!SERVER_WEB_ROOT) {
        throw new Exception("Not set server document root path!\n");
    }
    if (!CONFIG_PATH) {
        throw new Exception("Not set host config path!\n");
    }

    /**
     * Create path to host document root.
     */
    $document_root = SERVER_WEB_ROOT . '/' . $host;

    /**
     * Check or document root path should be expanded.
     */
    if (PUBLIC_DIR !== null) {
        $document_root .= '/' . PUBLIC_DIR;
    }

    /**
     * Create path to host conf file.
     */
    $file = CONFIG_PATH . '/' . $host . '.conf';

    /**
     * Prevent an existing site from being overwritten.
     */
    if (is_file($file)) {
        throw new Exception(" Site already exists!\n");
    }

    /**
     * Write the site settings to a conf file.
     */
    file_put_contents($file, require_once 'host_config.php');

    /**
     * Creating the site directory if not exists.
     * This will be right only you use virtualbox guest system.
     * If you use native linux machine you need to change files permissions.
     */
    if (!is_dir($document_root)) {
        mkdir($document_root, 0755, true);
        exec('chown -R kenkoo:kenkoo ' . SERVER_WEB_ROOT . '/' . $host);
    }

    /**
     * Enable the new virtual host.
     */
    exec('a2ensite ' . $host . '.conf > /dev/null');

    /**
     * Write the site to a hosts file.
     */
    file_put_contents("\n" . '/etc/hosts', '127.0.0.1' . "\t" . $host, FILE_APPEND);

    /**
     * Reload apache to make these changes take effect.
     */
    exec('systemctl reload apache2.service');

} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}