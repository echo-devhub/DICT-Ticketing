<?php

class Tickets extends Database
{

    protected $table = 'tickets';


    public function get_ticket_by_number($number)
    {
        return  $this->get_col_by_id('ticket_number', $number, $this->table);
    }

    #ticket categories
    public function add_new_ticket_category($category)
    {
        $this->table = 'ticket_categories';

        $sql = "INSERT INTO {$this->table()} (category) VALUES (:category)";
        return  $this->prepare($sql, [":category" => $category]);
    }

    public function get_ticket_statuses()
    {
        $this->table = 'ticket_statuses';
        return  $this->get_rows();
    }

    public function get_ticket_categories()
    {
        $this->table = 'ticket_categories';
        return  $this->get_rows();
    }


    public function get_ticket_priorities()
    {
        $this->table = 'ticket_priorities';
        return  $this->get_rows();
    }

    public function get_category_by_id($categoryId)
    {
        $this->table = 'ticket_categories';
        return $this->get_row_where('category_id', $categoryId);
    }

    public function update_ticket_category($params)
    {
        $this->table = 'ticket_categories';
        $sql = "UPDATE {$this->table()} SET category = :category WHERE category_id = :category_id";
        return $this->prepare($sql, $params);
    }

    public function remove_category($categoryId)
    {
        $this->table = 'ticket_categories';
        return $this->delete_where('category_id', $categoryId);
    }

    #tickets

    public function col_real_value($col, $id, $colName, $table)
    {
        $customer = $this->get_col_by_id($col, $id, $table);
        return $customer[$colName] ?? null;
    }

    public function all_tickets()
    {
        $this->table = 'tickets';
        return $this->get_rows();
    }

    public function agent_search_ticket($term)
    {
        $this->table = 'tickets';
        $sql = "SELECT * FROM {$this->table()} WHERE ticket_number LIKE :term AND agent_id = :agent_id";
        $stmt = $this->pdo->prepare($sql);

        $search_term = $term . '%';
        global $currentUser;
        $stmt->execute([':term' => $search_term, ':agent_id' => $currentUser['agent_id']]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function search_tickets($term)
    {
        $this->table = 'tickets';
        $sql = "SELECT * FROM {$this->table()} WHERE ticket_number LIKE :term";
        $stmt = $this->pdo->prepare($sql);

        $search_term = $term . '%';
        $stmt->execute([':term' => $search_term]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function search_tickets_by_status($status_id)
    {
        $this->table = 'tickets';
        $sql = "SELECT * FROM {$this->table()} WHERE status_id = :status_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':status_id' => $status_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function agent_search_tickets_by_status($status_id)
    {
        $this->table = 'tickets';
        $sql = "SELECT * FROM {$this->table()} WHERE status_id = :status_id AND agent_id = :agent_id";
        $stmt = $this->pdo->prepare($sql);

        global $currentUser;

        $stmt->execute([':status_id' => $status_id, ':agent_id' => $currentUser['agent_id']]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // public function is_ticket($email, $number)
    // {
    //     $this->table = 'tickets';
    //     $ticketNumbers = array_column($this->get_rows(), 'ticket_number');

    //     $sql = "SELECT * FROM customers";
    //     $stmt = $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

    //     $emails = array_column($stmt, 'email_address');

    //     if (in_array($email, $emails) && in_array($number, $ticketNumbers)) {
    //         return true;
    //     }
    //     return false;
    // }

    public function customer_ticket_information($email, $number)
    {

        $sql = "SELECT tk.ticket_number, tk.create_at, tk.updated_at, tk.agent_id, tk.description, tk.photo, tc.category, c.*, ts.status, tp.priority FROM tickets tk
JOIN customers c  USING(customer_id)
JOIN ticket_categories tc USING (category_id)
JOIN ticket_statuses ts USING (status_id)
JOIN ticket_priorities tp USING (priority_id)
WHERE tk.ticket_number = :ticket_number AND c.email_address = :email_address";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':ticket_number' => $number, ':email_address' => $email]);
        return $stmt;

        // SELECT tk.*, c.* FROM tickets tk INNER JOIN customers c  USING(customer_id) WHERE tk.ticket_number = :ticket_number AND c.email_address = :email_address
    }

    public function ticket_information($number)
    {

        $sql = "SELECT tk.ticket_number, tk.create_at, tk.updated_at, tk.agent_id, tk.description, tk.photo, c.*, tc.category, ts.status, tp.priority FROM tickets tk
JOIN customers c  USING(customer_id)
JOIN ticket_categories tc USING (category_id)
JOIN ticket_statuses ts USING (status_id)
JOIN ticket_priorities tp USING (priority_id)
WHERE tk.ticket_number = :ticket_number";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':ticket_number' => $number]);
        return  $stmt->fetch(PDO::FETCH_ASSOC);

        // SELECT tk.*, c.* FROM tickets tk INNER JOIN customers c  USING(customer_id) WHERE tk.ticket_number = :ticket_number AND c.email_address = :email_address
    }



    public function new_ticket($params)
    {

        $sql = "INSERT INTO tickets (ticket_number, category_id, description, status_id, priority_id, customer_id) VALUES (:ticket_number, :category_id, :description, :status_id, :priority_id, :customer_id)";

        if (array_key_exists(':photo', $params)) {
            $sql = "INSERT INTO tickets (ticket_number, category_id, description, photo, status_id, priority_id, customer_id) VALUES (:ticket_number, :category_id, :description, :photo, :status_id, :priority_id, :customer_id)";
        }


        return $this->prepare($sql, $params);
    }


    public function users_assigned_tickets($id)
    {
        $sql = "SELECT * FROM tickets WHERE agent_id = :agent_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':agent_id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // ASSIGN TICKET TO AGENT
    public function assign_ticket_to_agent($ticketNumber,  $agentId)
    {
        $sql = "UPDATE tickets SET agent_id = :agent_id WHERE ticket_number = :ticket_number";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([':ticket_number' => $ticketNumber, ':agent_id' => $agentId]);
    }

    public function update_ticket_status($ticketNumber, $statusId)
    {
        $sql = "UPDATE tickets SET status_id = :status_id WHERE ticket_number = :ticket_number";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([':ticket_number' => $ticketNumber, ':status_id' => $statusId]);
    }
}
