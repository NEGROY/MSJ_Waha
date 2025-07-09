<?php
require_once '../includes/BD_con/db_con.php'; // conexión PDO

class Model {
    protected $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }
}
