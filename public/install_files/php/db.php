<?php

defined('LARAVEL_START') or die();
// use PDO;
// use PDOException;
// use PDOStatement;
// use InvalidArgumentException;

class DB{

    /**
     * The underlying PDO connection.
     *
     * @var \PDO|null
     */
    protected $connection = null;

    /**
     * Get configaration
     * 
     * @param array $config
     * 
     * @return array
     */
    public function config(array $config = []): array {

        if(!array_key_exists('driver', $config)){
            $config['driver'] = _env('DB_CONNECTION');
        }

        if(!array_key_exists('host', $config)){
            $config['host'] = _env('DB_HOST');
        }

        if(!array_key_exists('port', $config)){
            $config['port'] = _env('DB_PORT');
        }

        if(!array_key_exists('dbname', $config)){
            $config['dbname'] = _env('DB_DATABASE');
        }

        if(!array_key_exists('username', $config)){
            $config['username'] = _env('DB_USERNAME', null);
        }

        if(!array_key_exists('password', $config)){
            $config['password'] = _env('DB_PASSWORD', null);
        }

        $dsn = "{$config['driver']}:host={$config['host']};dbname={$config['dbname']}";
        if ($config['port']) $dsn .= ";port=" . $config['port'];

        return [ 
            $dsn,  $config['username'],  $config['password'] 
        ];
    }

    /**
     * Check a new PDO connection.
     *
     * @return boolean
     */
    public function hasDBconnection($config = []) {

        [$dns, $username, $password] = $this->config($config);

        try {
            $connection = new PDO( $dns, $username, $password );
            // set the PDO error mode to exception
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return true;
        } catch (PDOException $e) { }

        return false;
    }

    /**
     * Create a new PDO connection instance.
     *
     * @return void
     */
    private function connection(): void {

        if(is_null($this->connection)){

            [$dns, $username, $password] = $this->config();

            try {
                $connection = new PDO( $dns, $username, $password );
                // set the PDO error mode to exception
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->connection = $connection;
            } catch (PDOException $e) {
                throw new Exception("Database connection Error: ". $e->getMessage(), 1);
            }
        }
    }

    /**
     * Execute an SQL exec and return the boolean result.
     *
     * @param  string  $sql
     * @return bool
     */
    private function exec(string $sql): bool
    {
        $this->connection();
        return $this->connection->exec($sql) === TRUE;
    }

    /**
     * Run a select statement against the database.
     *
     * @param  string  $sql
     * @param  array  $bindings
     * @param  bool  $useReadPdo
     * @return array
     */
    private function select($sql)
    {
        $this->connection();

        $statement = $this->connection->prepare($sql); 
        $statement->execute();

        try {
            // set the resulting array to associative
            $result = $statement->setFetchMode(PDO::FETCH_ASSOC); 

           return $statement->fetchAll();
        } catch (PDOException $e) {
            throw new Exception("DB Get ". $e->getMessage(), 1);
        }

        return [];
    }

    /**
     * Disable foreign key constraints.
     *
     * @return bool
     */
    public function disableForeignKeyConstraints() {
        return $this->exec( 'SET FOREIGN_KEY_CHECKS=0;' );
    }

    /**
     * Enable foreign key constraints.
     *
     * @return bool
     */
    public function enableForeignKeyConstraints() {
        return $this->exec( 'SET FOREIGN_KEY_CHECKS=1;' );
    }

    /**
     * Get all of the table names for the database.
     *
     * @return array
     */
    public function getAllTables()
    {
        $tables = [];

        foreach ($this->select("SHOW TABLES;") as $row) {
            $row = (array) $row;
            $tables[] = reset($row);
        }

        return $tables;
    }

    /**
     * Drop all tables from the database.
     *
     * @return void
     */
    public function dropAllTables() {
        $tables = [];

        foreach ($this->getAllTables() as $table) {
            $tables[] = "`{$table}`";
        }

        if (empty($tables)) {
            return;
        }

        $this->disableForeignKeyConstraints();

        $this->exec(
            'drop table '.implode(',', $tables)
        );

        $this->enableForeignKeyConstraints();
    }

}
