<?php

namespace App\Models;

use App\Config\Connection;

class Model extends Connection
{
    protected function create() {}

    protected function read(string $select, array $params = [])
    {
        $stmt = $this->getConnection()->prepare($select);
        if (count($params) > 0) {
            foreach ($params as $paramKey => $paramValue) {
                $stmt->bindValue("{$paramKey}", $paramValue);
            }
        }
        $stmt->execute();

        return match (true) {
            $stmt->rowCount() > 0 && count($params) > 0   => $stmt->fetch(\PDO::FETCH_OBJ),
            $stmt->rowCount() > 0 && count($params) === 0 => $stmt->fetchAll(\PDO::FETCH_OBJ),
            default                                       => null
        };
    }

    protected function update() {}

    protected function delete() {}
}