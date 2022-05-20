<?php

class Agent extends Database
{

    #helper methods
    use Helpers;

    protected $table = 'agents';

    public function add_new_agent($params)
    {
        $sql = "INSERT INTO {$this->table()} (first_name, last_name, email_address, user_role, photo, pwd) VALUES (:first_name, :last_name, :email_address, :user_role, :photo, :pwd)";
        return  $this->prepare($sql, $params);
    }



    public function is_agent_exist($email)
    {
        return $this->is_row_exist('email_address', $email);
    }



    public function agents($email)
    {
        $sql = "SELECT * FROM agents WHERE email_address != :email_address";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':email_address' => $email]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function all_agents()
    {
        $sql = "SELECT * FROM agents";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }




    public function update_name($id, $first_name, $last_name)
    {
        $sql = "UPDATE agents SET first_name = :first_name, last_name = :last_name WHERE agent_id = :agent_id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([':agent_id' => $id, ':first_name' => $first_name, ':last_name' => $last_name]);
    }


    public function update_photo($id, $photo)
    {
        $sql = "UPDATE agents SET photo = :photo WHERE agent_id = :agent_id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([':agent_id' => $id, ':photo' => $photo]);
    }

    public function change_system_role($id, $role)
    {
        $user = new User();

        $sql = "UPDATE agents SET user_role = :user_role WHERE agent_id = :agent_id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([':agent_id' => $id, ':user_role' => $role]);
    }

    public function get_agent_by_id($id)
    {
        return $this->get_col_by_id('agent_id', $id, 'agents');
    }
}
