

const formTicket = document.querySelector('#form_create_ticket');

const responseMessage = document.querySelector('#response_message');


formTicket.addEventListener('submit', async function (ev) {
    ev.preventDefault();

    // console.log(this.elements);

    let res = await fetch('./admin/controllers/ajax_create_ticket.php?create_ticket', {
        method: 'POST',
        body :new FormData(this)
    });

  

    if (res.status == 200 && res.statusText == 'OK') {
        

        let result = await res.text();


        if (result == 'SUCCESS') {
            CreateTicketResponse('Ticket succesfully created', 'info');
            this.reset();
            imgPreview.innerHTML = '';
        } else {
             CreateTicketResponse(result);

        }

      
    }


});



function CreateTicketResponse(message, indicator = 'danger') {
  responseMessage.innerHTML =  `<div class="alert alert-${indicator} alert-dismissible border-0">
        ${message}
        <button type="button" class="btn btn-close" data-bs-dismiss="alert"></button>
    </div>`
}


const photo = document.querySelector('#photo');

        const imgPreview = document.querySelector('#img_preview');
photo.addEventListener('change', function(){
    let file = this.files[0];


    let reader = new FileReader();

    reader.readAsDataURL(file);

    reader.addEventListener('load', function () {


        imgPreview.innerHTML = `<img src="${this.result}" alt="">`;

        // <div class="position-relative">
        // <span class="img-close position-absolute"><i class="fa-solid fa-xmark"></i></span>
// </div>
        // const imgClose = document.querySelector('.img-close') ?? document.querySelector('.img-close');


        // imgClose.addEventListener('click', () => {
            // REMOVE IMG PREVIEW
            // imgPreview.innerHTML = '';

            
        //     formdata.delete('photo');
        // });

    });

    reader.addEventListener('error', function () {});
   
});



