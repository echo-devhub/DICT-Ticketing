<form id="form_send_message" method="POST">

    <input type="hidden" id="sender_id" name="sender_id" value="<?php echo $currentUser['agent_id']; ?>">
    <input type="hidden" id="reciever_id" name="reciever_id" value="<?php echo $ticket_information['customer_id']; ?>">
    <input type="hidden" id="ticket_number" name="ticket_number" value="<?php echo $tknumber; ?>">

    <div class="d-flex align-items-center">
        <div class="field flex-grow-1 position-relative message-area">

            <textarea name="msg_text" id="msg_text" cols="30" rows="2" class="form-control form-select-sm" placeholder="Send a message..." <?php echo !$ticket_information['agent_id'] || $currentUser['agent_id'] != $ticket_information['agent_id'] ? 'disabled' : ''; ?>></textarea>


            <!-- photo icon -->
            <div class="upload-file position-absolute d-flex justify-content-center align-items-center">
                <input type="file" name="msg_img" id="msg_img" <?php echo !$ticket_information['agent_id'] || $currentUser['agent_id'] != $ticket_information['agent_id'] ? 'disabled' : ''; ?>> <i class="fa-solid fa-image fa-lg text-secondary"></i>
            </div>

        </div>

        <div class="p-2">
            <button type="submit" class="send_btn bg-primary text-white" <?php echo !$ticket_information['agent_id'] || $currentUser['agent_id'] != $ticket_information['agent_id'] ? 'disabled' : ''; ?>>Send</button>
        </div>
    </div>

</form>