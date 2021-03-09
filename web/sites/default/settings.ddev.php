<?php

/**
 * @file
 * DDEV generated file, with customization for config_sync_directory.
 */

$host = "db";
$port = 3306;

// If DDEV_PHP_VERSION is not set but IS_DDEV_PROJECT *is*, it means we're running (drush) on the host,
// so use the host-side bind port on docker IP
if (empty(getenv('DDEV_PHP_VERSION') && getenv('IS_DDEV_PROJECT') == 'true')) {
  $host = "127.0.0.1";
  $port = 32772;
} 

$databases['default']['default'] = array(
  'database' => "db",
  'username' => "db",
  'password' => "db",
  'host' => $host,
  'driver' => "mysql",
  'port' => $port,
  'prefix' => "",
);

$settings['hash_salt'] = 'lrDwrEWJAdmBjNgctNAIluqabDXIEmqlYgAlikodAzEUBoXUZGJSbVCKOyCgRaih';

// This will prevent Drupal from setting read-only permissions on sites/default.
$settings['skip_permissions_hardening'] = TRUE;

// This will ensure the site can only be accessed through the intended host
// names. Additional host patterns can be added for custom configurations.
$settings['trusted_host_patterns'] = ['.*'];

// Don't use Symfony's APCLoader. ddev includes APCu; Composer's APCu loader has
// better performance.
$settings['class_loader_auto_detect'] = FALSE;

// This specifies the default configuration sync directory.
if (defined('CONFIG_SYNC_DIRECTORY') && empty($config_directories[CONFIG_SYNC_DIRECTORY])) {
  $config_directories[CONFIG_SYNC_DIRECTORY] = 'sites/default/files/sync';
}
elseif (empty($settings['config_sync_directory'])) {
  $settings['config_sync_directory'] = '../config/sync';
}
