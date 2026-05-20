<?php

namespace Core\Repositories;

use PDO;
use Core\Contracts\ProductRepositoryInterface;
use Core\Database\Connection;

class ProductRepo implements ProductRepositoryInterface
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Connection::connect();
    }

    public function all(): array
    {
        $stmt = $this->db->query(
            "SELECT * FROM products ORDER BY id DESC"
        );

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find(int $id): array|null
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM products WHERE id = ?"
        );

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create(array $data): bool
    {
        $sql = "INSERT INTO products
                (product_name, sku, category, quantity)
                VALUES
                (:product_name, :sku, :category, :quantity)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':product_name' => $data['product_name'],
            ':sku' => $data['sku'],
            ':category' => $data['category'],
            ':quantity' => $data['quantity']
        ]);
    }

    public function update(
        int $id,
        array $data
    ): bool
    {
        $sql = "UPDATE products SET
                product_name = :product_name,
                sku = :sku,
                category = :category,
                quantity = :quantity
                WHERE id = :id";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':product_name' => $data['product_name'],
            ':sku' => $data['sku'],
            ':category' => $data['category'],
            ':quantity' => $data['quantity'],
            ':id' => $id
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare(
            "DELETE FROM products WHERE id = ?"
        );

        return $stmt->execute([$id]);
    }
}