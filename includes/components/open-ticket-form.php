<form method="post" class="form-ticket" id="open_ticket">
    <div id="openticket_response_result"></div>
    <!-- input name -->
    <div class="field mb-3">
        <label for="open_ticket_email" class="form-label d-flex align-items-center"><i class="fa-solid fa-at icon sm-icon me-1 fa-lg text-secondarys"></i> Email Address</label>
        <input type="text" name="open_ticket_email" id="open_ticket_email" class="form-control form-control-sm">
    </div>

    <!-- input email -->
    <div class="field mb-3">
        <label for="open_ticket_number" class="form-label"><code class="fs-5">Ticket Number</code></label>
        <input type="text" name="open_ticket_number" id="open_ticket_number" class="form-control form-control-sm" placeholder="Ex: 07****">
    </div>

    <div class="field text-end">
        <button type="submit" class="btn btn-primary">View Ticket</button>
    </div>
</form>