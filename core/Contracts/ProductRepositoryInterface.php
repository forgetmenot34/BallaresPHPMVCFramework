<?php

namespace Core\Contracts;

interface ProductRepositoryInterface
{
    public function all(): array;

    public function find(int $id): array|null;

    public function create(array $data): bool;

    public function update(
        int $id,
        array $data
    ): bool;

    public function delete(int $id): bool;
}