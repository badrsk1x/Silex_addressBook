<?php
$app['api.version'] = "v1";
$app['api.endpoint'] = "/api";

/**
 * SQLite database file
 */
$app['db.options'] = array(
    'driver' => 'pdo_sqlite',
    'path' => realpath(ROOT_PATH . '/app.db'),
);
