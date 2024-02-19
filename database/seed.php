<?php
const BASE_PATH = __DIR__ . '/..';
require BASE_PATH . '/vendor/autoload.php';

use Core\Database;

function dd($value): void {
    echo '<pre class="p-8">';
    var_dump($value);
    echo '</pre>';
}

$db = new Database(BASE_PATH . '/.env.local.ini');

$statement = $db->query('SELECT * FROM jiris WHERE starting_at > current_timestamp');
$upcoming_jiris = $statement->fetchAll();

$statement = $db->query('SELECT * FROM jiris WHERE starting_at < current_timestamp');
$passed_jiris = $statement->fetchAll();

$current_jiris = [];