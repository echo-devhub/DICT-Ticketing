<?php

class Database
{

    use Helpers;

    public $pdo;

    protected $table;

    public function table()
    {
        return $this->table;
    }

    public function __construct()
    {
        $host = HOST;
        $user = USER;
        $password = PASSWORD;
        $dbname = DB_NAME;

        $dsn = "mysql:host=$host;dbname=$dbname";

        try {
            $pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]);

            if ($pdo) {
                $this->pdo = $pdo;
            }
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    public function prepare($query, $params)
    {
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute($params);
    }

    #insert record
    public function insert(array $post)
    {
        $columns = $this->generate_columns($post);
        $parameters = $this->generate_name_parameters($post);
        $values = $this->combine_columnvalues($post);

        $stmt =   $this->pdo->prepare("INSERT INTO {$this->table()} ($columns) VALUES ($parameters)");
        return  $stmt->execute($values);
    }

    #insert record
    public function insert_w_img(array $post, $w_img = null, $img_value = null)
    {
        $columns = $this->generate_columns($post, $w_img);
        $parameters = $this->generate_name_parameters($post, $w_img);
        $values = $this->combine_columnvalues($post, $w_img, $img_value);

        $stmt =   $this->pdo->prepare("INSERT INTO {$this->table()} ($columns) VALUES ($parameters)");
        return  $stmt->execute($values);
    }

    #update record
    public function update($post, $column, $value)
    {
        $column_parameters = build_update_parameters($post);

        $sql = "UPDATE {$this->table()} SET $column_parameters WHERE $column = :$column";
        $stmt = $this->pdo->prepare($sql);
        return  $stmt->execute([":$column" => $value]);
    }


    #delete record by column
    public function delete_where(string $column, string $value)
    {
        $sql = "DELETE FROM {$this->table()} WHERE $column = :$column";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([":$column" => $value]);
    }

    #get all records
    public function get_rows()
    {
        return $this->pdo->query("SELECT * FROM {$this->table()}")->fetchAll(PDO::FETCH_ASSOC);
    }

    #get record by column
    public function get_row_where($column, $value)
    {
        $sql = "SELECT * FROM {$this->table()} WHERE $column = :$column";
        $stmt =  $this->pdo->prepare($sql);
        $stmt->execute([":$column" => $value]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function is_row_exist($column, $value)
    {
        $sql = "SELECT $column FROM {$this->table()} WHERE $column = :$column";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([":$column" => $value]);
        return $stmt->fetchColumn();
    }

    public function total_count()
    {
        $sql = "SELECT COUNT(*) as total FROM {$this->table()}";
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC)['total'];
    }


    public function get_col_by_id($columnName, $id, $table)
    {
        $sql = "SELECT * FROM $table WHERE $columnName = :$columnName";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([":$columnName" => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
