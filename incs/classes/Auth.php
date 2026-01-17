<?php

class Auth
{
    private mysqli $connection;

    public function __construct(Database $database)
    {
        $this->connection = $database->connection();
    }

    public function attemptLogin(string $username, string $password): ?array
    {
        $stmt = $this->connection->prepare(
            "SELECT id, username, password FROM users WHERE username = ? LIMIT 1"
        );
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();

        if (!$user) {
            return null;
        }

        if ($user['password'] !== md5($password)) {
            return null;
        }

        return $user;
    }
}
