
<?php



if (isset($_REQUEST['page']) && isset($_REQUEST['id'])) {

    include __DIR__ . '/../init.php';

    $page = $_REQUEST['page'];
    $id = $_REQUEST['id'];


    if ($page == 'profile') {
        $agent = new Agent();
        $agent->delete_where('agent_id', $id);
    }
}
