<?php
class Conexion extends PDO
{
    public $hostdb = 'blfehyjcvzesccvhxz4b-mysql.services.clever-cloud.com';
    public $bdname = 'blfehyjcvzesccvhxz4b';
    private $usuario = 'uugmi7pifzgx27sn';
    private $password = '2vT8nVIQLp0LM2pjmN0M';

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
