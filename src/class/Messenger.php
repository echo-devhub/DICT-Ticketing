<?php

class Messenger extends Database
{

    use Helpers;

    public function insert_chats(array $params)
    {


        $sql = "INSERT INTO chats (ticket_number, sender_id, reciever_id) VALUES (:ticket_number, :sender_id, :reciever_id)";

        if (array_key_exists(':text_chat', $params) && array_key_exists(':image_chat', $params)) {

            $sql = "INSERT INTO chats (ticket_number, sender_id, reciever_id, text_chat, image_chat) VALUES (:ticket_number, :sender_id, :reciever_id, :text_chat, :image_chat)";
        } elseif (array_key_exists(':text_chat', $params) && !array_key_exists(':image_chat', $params)) {
            $sql = "INSERT INTO chats (ticket_number, sender_id, reciever_id, text_chat) VALUES (:ticket_number, :sender_id, :reciever_id, :text_chat)";
        } elseif (array_key_exists(':image_chat', $params) && !array_key_exists(':text_chat', $params)) {
            $sql = "INSERT INTO chats (ticket_number, sender_id, reciever_id, image_chat) VALUES (:ticket_number, :sender_id, :reciever_id, :image_chat)";
        }

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($params);
    }

    public function get_chats($ticket_number, $sender_id, $reciever_id)
    {

        $sql = "SELECT c.* FROM chats c JOIN agents a WHERE c.ticket_number = :ticket_number AND c.sender_id = :sender_id AND c.reciever_id = :reciever_id OR c.reciever_id = :sender_id AND c.sender_id = :reciever_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':ticket_number' => $ticket_number, ':sender_id' => $sender_id, ':reciever_id' => $reciever_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function get_last_chat($ticket_number, $sender_id, $reciever_id)
    {
        $sql = "SELECT * FROM chats WHERE ticket_number = :ticket_number AND sender_id = :sender_id AND reciever_id = :reciever_id OR reciever_id = :sender_id AND sender_id = :reciever_id ORDER by chat_id DESC LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':ticket_number' => $ticket_number, ':sender_id' => $sender_id, ':reciever_id' => $reciever_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
