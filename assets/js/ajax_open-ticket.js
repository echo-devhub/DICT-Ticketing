
const formOpenTicket = document.querySelector('#open_ticket');
const openTIcketResponseMessage = document.querySelector('#openticket_response_result');

formOpenTicket.addEventListener('submit', async function (ev) {
    ev.preventDefault();


     let res = await fetch('./admin/controllers/ajax_open_ticket.php', {
        method: 'POST',
        body: new FormData(this)
        
    });   
    
    if (res.status == 200) {
       
        let result = await res.text();

        if (result === 'SUCCESS') {
            location.href = './admin/customer/messenger.php';
        } else {
        OpenTicketResponse(result);
        }
    }
        
});


function OpenTicketResponse(message, indicator = 'warning') {
  openTIcketResponseMessage.innerHTML =  `<div class="alert alert-${indicator} alert-dismissible">
        ${message}
        <button type="button" class="btn btn-close" data-bs-dismiss="alert"></button>
    </div>`
}