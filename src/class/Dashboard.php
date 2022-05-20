<?php

class Dashboard extends Database
{

    protected $table = 'Tickets';

    public function status_count($column, $value)
    {
        $sql = "SELECT COUNT(status_id) AS status_total FROM WHERE $column = :$column";
        $stmt =  $this->pdo->prepare($sql);
        $stmt->execute([":$column" => $value]);
        $stmt->fetch(PDO::FETCH_ASSOC)['status_total'];
    }

    public function ticket_statuses()
    {
        $this->table = 'ticket_statuses';
        return  $this->get_rows();
    }


    public function ticket_status_counts($status_id)
    {

        // SELECT COUNT(tk.status_id) status_total FROM tickets tk INNER JOIN ticket_statuses USING(status_id) WHERE status_id = :status_id

        $sql = "SELECT COUNT(tk.status_id) status_total FROM tickets tk INNER JOIN ticket_statuses USING(status_id) WHERE status_id = :status_id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(["status_id" => $status_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC)['status_total'];
    }

    public function generate_chart_data()
    {
        $tk_statuses = $this->ticket_statuses();

        return array_map(function ($data) {

            $count = $this->ticket_status_counts($data['status_id']);

            return  [$data['status'], $count];
        }, $tk_statuses);
    }
}
