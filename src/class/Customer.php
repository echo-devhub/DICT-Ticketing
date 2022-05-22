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

    public function get_customer_by_ticket($ticket_number)
    {
        $sql = "SELECT c.* FROM customers c INNER JOIN tickets t USING (customer_id) WHERE t.ticket_number = :ticket_number";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':ticket_number' => $ticket_number]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }




    public function total_customers()
    {
        $sql = "SELECT COUNT(DISTINCT(email_address)) AS total FROM customers";
        return  $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    public function all_customers()
    {
    }
}
