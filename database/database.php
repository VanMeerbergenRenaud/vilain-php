<?php

function getPDO():PDO
{
    define('CONFIG_PATH' , '.env.local.ini');

    if (file_exists(CONFIG_PATH)) {
        $config = parse_ini_file(CONFIG_PATH, true);
    } else {
        die('Error de configuration');
    }

    $dsn = sprintf('%s:host=%s;dbname=%s',
        $config['database']['DB_DRIVER'],
        $config['database']['DB_HOST'],
        $config['database']['DB_NAME']
    );

    $username = $config['database']['DB_USERNAME'];
    $password = $config['database']['DB_PASSWORD'];

    $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ];

    try {
        return new PDO($dsn, $username, $password, $options);
    } catch (PDOException) {
        die('Erreur de connection à la base de donnée');
    }
}