<?php
class Conexion extends PDO
{
    public $hostdb = 'bzsorvjldrhf56of09ug-mysql.services.clever-cloud.com';
    public $bdname = 'bzsorvjldrhf56of09ug';
    private $usuario = 'uga9hvk48tl5saqf';
    private $password = 'uga9hvk48tl5saqf';

    public function __construct()
    {
        try {
            parent::__construct( 'mysql:host=' . $this->hostdb .
                ';dbname=' . $this->bdname . ';charset=utf8',
                $this->usuario,
                $this->password, array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ) );

        } catch ( PDOException $status ) {
            echo 'Error: ' . $status->getMessage();
            exit();
        }

    }

}
