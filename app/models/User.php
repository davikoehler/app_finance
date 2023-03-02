<?php
declare(strict_types=1);

namespace App\Models;

class User extends Model
{
    protected string $table = 'users';

    public function all(array $fields = ["*"], ?int $limit = null, ?int $offset = null)
    {
        $fields = count($fields) === 1 ? $fields[0] : implode(',', $fields);
        $limit = is_null($limit) ? '' : $limit;
        $offset = is_null($offset) ? '' : $offset;
        $select = trim("SELECT {$fields} FROM {$this->table} {$limit} {$offset}");
        return $this->read($select);
    }

    public function findById(int $id, array $fields = ["*"], ?int $limit = null, ?int $offset = null)
    {
        $id = filter_var($id, FILTER_VALIDATE_INT);
        $fields = count($fields) === 1 ? $fields[0] : implode(',', $fields);
        $limit = is_null($limit) ? '' : "LIMIT {$limit}";
        $offset = is_null($offset) ? '' : "OFFSET {$offset}";
        $select = trim("SELECT {$fields} FROM {$this->table} WHERE id = :id {$limit} {$offset}");
        return $this->read($select, [':id' => $id]);
    }

    public function save() {}
}