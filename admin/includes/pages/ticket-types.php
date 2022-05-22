 <!-- modal -->
 <?php include APP_ADMIN_INCLUDE_COMPONENT . '/-modal-ticket-types.php'; ?>

 <section class="settings tabs ticket-types container h-100">

     <!-- tab title -->
     <div class="main_title p-3 fw-bold d-flex justify-content-between align-items-center">
         <span class="text-primary">Settings | Ticket subject</span>
         <i class="fa-solid fa-circle-plus fs-3 icon text-primary" data-bs-toggle="modal" data-bs-target="#add_modal_ticket_subject"></i>
     </div>

     <?php if (isset($_GET['status']) && !empty($_GET['status'])) echo show_status($_GET['status'], 'Ticket category'); ?>

     <!-- content -->
     <div class="main_content">
         <?php $categories = $ticket_category->get_ticket_categories(); ?>
         <?php if (count($categories)) : ?>
             <!-- table record -->
             <div class="table-responsive">
                 <table class="table align-middle table-borderless table-hover">
                     <thead>
                         <tr>
                             <th>#ID</th>
                             <th>Ticket Subject</th>
                             <th>Action</th>
                         </tr>
                     </thead>


                     <tbody>
                         <?php foreach ($categories as $category) : ?>
                             <tr>
                                 <td><?php echo $category['category_id']; ?></td>
                                 <td><?php echo $category['category']; ?></td>
                                 <td>
                                     <div class="d-flex justify-content-center align-items-center table_controls">
                                         <a href="?category_id=<?php echo $category['category_id']; ?>" class="table_action_link text-decoration-none d-flex justify-content-center align-items-center me-1">
                                             <i class="fa-regular fa-trash-can text-danger"></i>
                                         </a>
                                         <a href="#modify_modal_ticket_subject" class="category_edit_btn text-decoration-none table_action_link d-flex justify-content-center align-items-center ms-1" data-bs-toggle="modal" data-bs-target="#modify_modal_ticket_category" data-uid="<?php echo $category['category_id']; ?>">
                                             <i class="fa-solid fa-pencil text-secondary"></i>
                                         </a>
                                     </div>
                                 </td>
                             </tr>
                         <?php endforeach; ?>
                     <?php else : ?>
                         <div class="alert alert-info">No ticket categories</div>
                     <?php endif; ?>
                     </tbody>
                 </table>
             </div>

     </div>


 </section>