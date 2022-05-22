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

    // CALCULATE TICKET STATUSES BASE ON AGENT
    public function ticket_status_counts_by_agent($status_id, $agentId)
    {

        // SELECT COUNT(tk.status_id) status_total FROM tickets tk INNER JOIN ticket_statuses USING(status_id) WHERE status_id = :status_id

        $sql = "SELECT COUNT(tk.status_id) status_total FROM tickets tk INNER JOIN ticket_statuses USING(status_id) WHERE status_id = :status_id AND agent_id = :agent_id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(["status_id" => $status_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC)['status_total'];
    }


    // GENERATE CHART BY AGENT 
    public function generate_chart_data_by_agent($agentId)
    {
        $tk_statuses = $this->ticket_statuses();

        return array_map(function ($data) use ($agentId) {

            $count = $this->ticket_status_counts_by_agent($data['status_id'], $agentId);

            return  [$data['status'], $count];
        }, $tk_statuses);
    }


    public function generate_chart_data()
    {
        $tk_statuses = $this->ticket_statuses();

        return array_map(function ($data) {

            $count = $this->ticket_status_counts($data['status_id']);

            return  [$data['status'], $count];
        }, $tk_statuses);
    }


    public function total_customers()
    {
        $sql = "SELECT COUNT(DISTINC(email_address)) AS total FROM customers";
        return  $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC)['total'];
    }
}
