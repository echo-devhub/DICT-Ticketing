<form method="post" class="form_ticket" id="form_create_ticket">
    <!-- input name -->
    <div class="field mb-3">
        <label for="name" class="form-label">Your Name</label>
        <input type="text" name="name" id="name" class="form-control form-control-sm">
    </div>

    <!-- input email -->
    <div class="field mb-3">
        <label for="email" class="form-label d-flex align-items-center"><i class="fa-solid fa-inbox icon me-1"></i> Email</label>
        <input type="text" name="email" id="email" class="form-control form-control-sm" value="">
    </div>

    <!-- input subject -->
    <div class="field mb-3">
        <label for="category" class="form-label">Type of Issue</label>
        <?php $ticket_categories = $ticket->get_ticket_categories(); ?>
        <select name="category" id="category" class="form-select">
            <?php foreach ($ticket_categories as $category) : ?>
                <option value="<?php echo $category['category_id'] ?>"><?php echo $category['category'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <!-- input Priority -->
    <div class="field mb-3">

        <label for="priority" class="form-label d-flex align-items-center">Priority <i class="fa-solid fa-arrow-trend-up ms-1"></i></label>
        <?php $ticket_priorities = $ticket->get_ticket_priorities(); ?>

        <select name="priority" id="priority" class="form-select">
            <?php foreach ($ticket_priorities as $priority) : ?>
                <option value="<?php echo $priority['priority_id'] ?>"><?php echo $priority['priority']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <!-- text area | description -->
    <div class="field mb-3 textarea position-relative">
        <label for="description" class="form-label">Describe your issue</label>
        <textarea name="description" id="description" cols="30" rows="8" class="form-control"><?php echo $ticket->get_input('name'); ?></textarea>

        <label for="photo" class="img-select icon position-absolute">
            <input type="file" name="photo" id="photo">
            <i class="fa-solid fa-image position-absolute fa-lg"></i>
        </label>

    </div>

    <h6 class="order-1 text-end">Photo/Screenshot</h6>
    <!-- image preview -->
    <div id="img_preview" class="m-3 ms-auto position-relative d-flex flex-column"></div>

    <div id="response_message"></div>


    <div class="field text-end">
        <button type="submit" class="btn btn-success ">Send Now</button>
    </div>
</form>