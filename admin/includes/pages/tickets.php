 <?php include APP_ADMIN_INCLUDE_COMPONENT . '/-modal-agent-list.php'; ?>

 <section class="ticket tabs h-100">

     <!-- tab title -->
     <h4 class="main_title p-3 fw-bold container text-primary">Tickets</h4>

     <!-- content -->
     <div class="main_content">

         <!-- /header -->
         <div class="search container">
             <!-- search form -->
             <form action="" method="get">
                 <div class="field">
                     <label for="term" class="form-label">Search ticket number</label>
                     <div class="input-group">

                         <?php if (isset($_GET['term'])) : ?>
                             <a href="./tickets.php" class="btn btn-danger">
                                 <i class="fa-regular fa-rectangle-xmark"></i>
                             </a>
                         <?php endif; ?>

                         <input type="text" name="term" id="term" class="form-control form-control-sm" value="<?php echo $term; ?>">
                         <button class="btn btn-secondary btn-sm" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                     </div>
                 </div>
             </form>
         </div>

         <!-- filter tickets -->
         <div class="ticket_status d-flex justify-content-md-end justify-content-center align-items-center alert flex-wrap container">

             <a href="./tickets.php" class="link_status active_link text-decoration-none p-2 px-3 m-1 status-all shadow text-secondary">Tickets</a>

             <?php $tk_statuses = $tickets->get_ticket_statuses(); ?>

             <?php if (count($tk_statuses) > 0) : ?>
                 <?php foreach ($tk_statuses as $status) : ?>
                     <!--  ticket link-->

                     <?php if ($status_id && $status['status_id'] == $status_id) : ?>
                         <a href="?status_id=<?php echo $status['status_id']; ?>" class="link_status text-decoration-none p-2 px-3 m-1 status-<?php echo $status['status']; ?> active_link shadow text-secondary"><?php echo $status['status']; ?></a>
                     <?php else : ?>
                         <a href="?status_id=<?php echo $status['status_id']; ?>" class="link_status text-decoration-none p-2 px-3 m-1 status-<?php echo $status['status']; ?>"><?php echo $status['status']; ?></a>
                     <?php endif; ?>

                 <?php endforeach; ?>
             <?php endif; ?>
         </div>

         <?php if ($status_id) : ?>
             <?php include APP_ADMIN_INCLUDE_PAGE . '/tickets-search-status.php'; ?>
         <?php else : ?>

             <?php if (isset($_GET['term'])) :
                    include APP_ADMIN_INCLUDE_PAGE . '/tickets-search.php';
                ?>

             <?php else : ?>
                 <div class="table-responsive px-2">


                     <?php $allTickets = $logUser->is_admin() ? $tickets->all_tickets() : $tickets->users_assigned_tickets($currentUser['agent_id']); ?>

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
                                                         <i class="fa-solid fa-address-book icon fa-lg text-primary"></i>
                                                     </a>
                                                 <?php endif; ?>
                                             </td>

                                         <?php endif; ?>

                                         <td><?php echo $tickets->col_real_value('status_id', $ticket['status_id'], 'status', 'ticket_statuses'); ?></td>
                                     </tr>
                                 <?php endforeach; ?>
                             </tbody>

                         </table>

                     <?php else : ?>
                         <div class="alert alert-info mx-2">No tickets</div>
                     <?php endif; ?>

                 </div>

             <?php endif; ?>

         <?php endif; ?>

     </div>


 </section>