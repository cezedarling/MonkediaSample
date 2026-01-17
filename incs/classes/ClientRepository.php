<?php

class ClientRepository
{
    private mysqli $connection;

    public function __construct(Database $database)
    {
        $this->connection = $database->connection();
    }

    public function countAll(): int
    {
        $result = $this->connection->query("SELECT COUNT(*) AS total FROM clients");
        $row = $result->fetch_assoc();

        return (int) $row['total'];
    }

    public function countFiltered(string $search): int
    {
        if ($search === '') {
            return $this->countAll();
        }

        $stmt = $this->connection->prepare(
            "SELECT COUNT(*) AS total FROM clients WHERE id LIKE ? OR name LIKE ?"
        );
        $searchLike = $search . '%';
        $stmt->bind_param('ss', $searchLike, $searchLike);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();

        return (int) $row['total'];
    }

    public function fetchPaginated(
        string $search,
        string $orderColumn,
        string $orderDirection,
        int $start,
        int $length
    ): array {
        $allowedColumns = ['id', 'name'];
        if (!in_array($orderColumn, $allowedColumns, true)) {
            $orderColumn = 'id';
        }

        $orderDirection = strtolower($orderDirection) === 'desc' ? 'DESC' : 'ASC';

        if ($search !== '') {
            $stmt = $this->connection->prepare(
                "SELECT id, name FROM clients WHERE id LIKE ? OR name LIKE ? ORDER BY {$orderColumn} {$orderDirection} LIMIT ?, ?"
            );
            $searchLike = $search . '%';
            $stmt->bind_param('ssii', $searchLike, $searchLike, $start, $length);
        } else {
            $stmt = $this->connection->prepare(
                "SELECT id, name FROM clients ORDER BY {$orderColumn} {$orderDirection} LIMIT ?, ?"
            );
            $stmt->bind_param('ii', $start, $length);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        $clients = [];
        while ($row = $result->fetch_assoc()) {
            $clients[] = $row;
        }
        $stmt->close();

        return $clients;
    }

    public function findById(int $id): ?array
    {
        $stmt = $this->connection->prepare("SELECT * FROM clients WHERE id = ? LIMIT 1");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $client = $result->fetch_assoc();
        $stmt->close();

        return $client ?: null;
    }

    public function fetchAll(): array
    {
        $result = $this->connection->query("SELECT * FROM clients ORDER BY id");
        $clients = [];
        while ($row = $result->fetch_assoc()) {
            $clients[] = $row;
        }

        return $clients;
    }
}
