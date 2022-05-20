<?php

class User extends Database
{

    use Helpers;

    private $id;

    protected $table = 'agents';



    public function set_id($id)
    {
        $this->id = $id;
    }


    public function get_id()
    {
        return $this->id;
    }



    public function informaton($id)
    {
        $sql = "SELECT * FROM {$this->table()} WHERE agent_id = :agent_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':agent_id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

  
    public function current_password()
    {
        global $currentUser;

        return  $this->informaton($currentUser['agent_id'])['pwd'];
    }

    public function password_match($new)
    {
        return  $this->current_password() == $new;
    }

    public function update_password($newPassword)
    {
        global $currentUser;

        $sql = "UPDATE agents SET pwd = :pwd WHERE agent_id = :agent_id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([':agent_id' => $currentUser['agent_id'], ':pwd' => $newPassword]);
    }


    public function set_active()
    {
        global $currentUser;

        $sql = "UPDATE agents SET is_active = 1 WHERE agent_id = :agent_id";
        return $this->pdo->prepare($sql)->execute([':agent_id' => $currentUser['agent_id']]);
    }

    public function remove_active()
    {
        global $currentUser;

        $sql = "UPDATE agents SET is_active = 0 WHERE agent_id = :agent_id";
        return $this->pdo->prepare($sql)->execute([':agent_id' => $currentUser['agent_id']]);
    }


    public function get_status($id)
    {
        return $this->informaton($id)['is_active'];
    }

    public function is_admin()
    {
        global $currentUser;
        return $currentUser['user_role'] === 'Administrator';
    }
}
