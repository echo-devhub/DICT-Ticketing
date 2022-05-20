<?php

class Customer extends Database
{

    protected $table = 'customers';

    public function new_customer($params)
    {
        $sql = "INSERT INTO {$this->table} (full_name, email_address) VALUES (:full_name, :email_address)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $this->pdo->lastInsertId();
    }
}
