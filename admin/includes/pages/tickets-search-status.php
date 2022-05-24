<?php if (!is_null($status_id)) : ?>

    <div class="table-responsive px-2">
        <?php $allTickets = $logUser->is_admin() ? $tickets->search_tickets_by_status($status_id) : $tickets->agent_search_tickets_by_status($status_id); ?>

        <?php if (count($allTickets) > 0) : ?>


            <table class="table align-middle table-borderless table-hover table-striped">
                <thead>
                    <tr>
                        <th>#Ticket Number</th>
                        <th>Customer Name</th>
                        <th>Category</th>
                        <th>Created At</th>
                        <th>Updated On</th>
                        <?php if ($logUser->is_admin()) : ?>
                            <th>Assign To</th>
                        <?php endif; ?>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($allTickets as $ticket) : ?>
                        <tr>
                            <td>
                                <a href="./messenger.php?tknumber=<?php echo $ticket['ticket_number']; ?>" class="text-decoration-none">
                                    <code class="fs-4"><?php echo $ticket['ticket_number']; ?></code>
                                </a>
                            </td>
                            <td><?php echo $tickets->col_real_value('customer_id', $ticket['customer_id'], 'full_name', 'customers'); ?></td>

                            <td><?php echo $tickets->col_real_value('category_id', $ticket['category_id'], 'category', 'ticket_categories'); ?></td>


                            <td><?php echo $ticket['create_at']; ?></td>
                            <td><?php echo $ticket['updated_at']; ?></td>



                            <?php if ($logUser->is_admin()) : ?>
                                <td>

                                    <?php if (!is_null($tickets->col_real_value('agent_id', $ticket['agent_id'], 'last_name', 'agents'))) : ?>

                                        <a href="./profile.php?user_id=<?php echo $ticket['agent_id']; ?>" class="text-decoration-none">
                                            <?php echo $tickets->col_real_value('agent_id', $ticket['agent_id'], 'first_name', 'agents') . ' ' . $tickets->col_real_value('agent_id', $ticket['agent_id'], 'last_name', 'agents'); ?>
                                        </a>

                                    <?php else : ?>
                                        <a href="#modal_agent_list" data-bs-toggle="modal" class="text-decoration-none btn_show_agent_list" data-ticketnumber="<?php echo $ticket['ticket_number']; ?>">
                                            <i class="fa-solid fa-users icon sm-icon text-dark bg-warning"></i>
                                        </a>
                                    <?php endif; ?>
                                </td>

                            <?php endif; ?>

                            <td>
                                <small class="statusText-<?php echo $tickets->col_real_value('status_id', $ticket['status_id'], 'status', 'ticket_statuses'); ?>"><?php echo $tickets->col_real_value('status_id', $ticket['status_id'], 'status', 'ticket_statuses'); ?></small>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>

        <?php else : ?>
            <div class="alert alert-info d-flex align-items-center mx-2">No tickets found</div>
        <?php endif; ?>
    </div>


<?php else : ?>
    <div class="alert alert-info mx-2">No tickets found</div>
<?php endif; ?>