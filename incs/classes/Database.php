<?php

class Database
{
    private mysqli $connection;

    public function __construct(array $config)
    {
        $this->connection = mysqli_connect(
            $config['host'],
            $config['user'],
            $config['password'],
            $config['database']
        );

        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
    }

    public function connection(): mysqli
    {
        return $this->connection;
    }
}
