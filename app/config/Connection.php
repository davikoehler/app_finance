<?php

namespace App\Config;

use PDO;
use PDOException;

abstract class Connection
{
    private ?PDO $pdo = null;

    private function connection(): void
    {
        try {
            $this->pdo = new PDO("mysql:host{$_ENV['APP_DBHOST']};port={$_ENV['APP_DBPORT']};dbname={$_ENV['APP_DBNAME']}", $_ENV['APP_USERNAME'], $_ENV['APP_PASSWORD']);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch (PDOException $exception) {
            throw new \Exception($exception->getCode());
        }
    }

    protected function getConnection(): PDO
    {
        if(is_null($this->pdo)) {
            try {
                $this->connection();
            } catch (PDOException $exception) {
                throw new \Exception($exception->getCode());
            }
        }
        return $this->pdo;
    }
}