    <!-- modal for adding new ticket subject -->
    <div class="modal fade" id="add_modal_ticket_subject">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">New Ticket Category</h6>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                        <div class="field mb-3">
                            <input type="text" name="category" id="category" class="form-control" placeholder="Category">
                            <small class="text-info"><?php echo $ticket_category->get_error('category'); ?></small>
                        </div>

                        <div class="field d-grid">
                            <button type="submit" class="btn btn-primary d-block" name="btn_category_add">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- modal for updating new ticket subject -->
    <div class="modal fade" id="modify_modal_ticket_category">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Update Ticket Subject</h6>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" id="form-ticket-category-modify">

                        <input type="hidden" name="category_post_id" id="category_post_id" value="">

                        <div class="field mb-3">
                            <input type="text" name="category_edit" id="category_edit" class="form-control">
                        </div>
                        <small class="text-info"><?php echo $ticket_category->get_error('category_edit'); ?></small>
                        <div class="field d-grid">
                            <button type="submit" class="btn btn-success d-block" name="btn_category_edit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>