<?php

class Database
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = $this->getPDO();
    }

    public function dropTables()
    {
        $query = 'SHOW TABLES';
        $tables = $this->pdo->query($query)->fetchAll();

        foreach ($tables as $table) {
            $this->pdo->exec('DROP TABLE ' . $table->Tables_in_vilain_php);
        }
    }

    public function createTables()
    {

    }

    public function seedTables()
    {

    }

    public function databaseExist(string $name)
    {

    }

    public function exec(string $statement):false|int
    {
        return $this->pdo->exec($statement);
    }

    public function prepare(string $sql_statement): false|PDOStatement
    {
        return $this->pdo->prepare($sql_statement);
    }

    private function getPDO(): PDO
    {
        define('CONFIG_PATH', '.env.local.ini');

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
}