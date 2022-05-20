<?php

class Signin extends Database
{

    protected $table = 'agents';

    public function is_user_exist($email)
    {
        return $this->is_row_exist('email_address', $email);
    }

    public function is_user($email, $pwd)
    {
        $sql = "SELECT * FROM {$this->table()} WHERE email_address = :email_address AND pwd = :pwd";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':email_address' => $email, ':pwd' => $pwd]);
        return $stmt;
    }
}
