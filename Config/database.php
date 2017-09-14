<?php
// Config datatbase
class db {
    public $connection;
    private $database = array(
        'host' => 'localhost',
        'user' => 'root',
        'password' => '',
        'database' => 'dn_streetfoody'
    );

    public function connectDatabase() {
        $this->connection = new mysqli($this->database['host'],$this->database['user'],$this->database['password'],
            $this->database['database']);
        if (!($this->connection)) {
            throw new exception('Cannot connect to database');
        }
        return $this->connection;
    }
}
?>