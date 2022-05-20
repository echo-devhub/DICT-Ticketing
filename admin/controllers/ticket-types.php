<?php


$ticket_category = new Tickets();

// $all_tickets = $ticket->get_rows('');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    if (isset($_POST['btn_category_add'])) {
        $category = $ticket_category->post('category');

        if ($ticket_category->no_errors()) {
            $ticket_category->add_new_ticket_category($ticket_category->get_input('category'));
            redirect_page('?status=added');
        }
    }




    if (isset($_POST['btn_category_edit'])) {

        $cat_post_id = $ticket_category->post('category_post_id');
        $cat_edit = $ticket_category->post('category_edit');


        if ($ticket_category->no_errors()) {
            $ticket_category->update_ticket_category([':category_id' =>  $cat_post_id, ':category' => $cat_edit]);
            redirect_page('?status=updated');
        }
    }
}


// delete

$categoryId = $ticket_category->get('category_id');

if ($categoryId) {
    $ticket_category->remove_category($categoryId);
    redirect_page('?status=deleted');
}
