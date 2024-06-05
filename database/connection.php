<?php
class Connection
{
    private string $driver;
    private string $host;
    private string $db;
    private string $user;
    private string $password;
    private string $charset;

    public function __construct()
    {
        $this->driver = 'mysql';

        // this host case is for docker
        $this->host = '';
        $this->db = '';
        $this->user = '';
        $this->password = '';
        $this->charset = 'utf8mb4';
    }

    public function connect(): PDO
    {
        try {
            $dsn = "$this->driver:host=$this->host;dbname=$this->db;charset=$this->charset";

            return new PDO($dsn, $this->user, $this->password);
        } catch (PDOException $exception) {
            throw new PDOException($exception->getMessage(), (int)$exception->getCode());
        }
    }
}
