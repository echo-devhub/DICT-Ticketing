

const formTicket = document.querySelector('#form_create_ticket');

const responseMessage = document.querySelector('#response_message');


// btn send
const btnSendTicket = formTicket.querySelector('button[type=submit]');

formTicket.addEventListener('submit', async function (ev) {
    ev.preventDefault();
    // console.log(this.elements);

    let res = await fetch('./admin/controllers/ajax_create_ticket.php?create_ticket=request', {
        method: 'POST',
        body :new FormData(this)
    });

  
    if (res.status == 200 && res.statusText == 'OK') {
        
        let result = await res.json();


        if (result.valid === true) {
            // btnSendTicket.textContent = 'Please wait...';
            // btnSendTicket.setAttribute('');

            CreateTicketResponse('Ticket succesfully created. The system will send you a code that you can used to open your ticket once its approved.', 'info');

            this.reset();

            imgPreview.innerHTML = '';

            sendEmail(`./admin/controllers/ajax_create_ticket.php?create_ticket=send_email&name=${result.data.name}&email=${result.data.email}&category=${result.data.category}&priority=${result.data.priority}`);
        } else {
             CreateTicketResponse(result.data);
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


        imgPreview.innerHTML = `
        <div class="close-preview position-absolute"><i class="fa-solid fa-xmark icon fa-2x"></i></div>
        <img src="${this.result}" alt="">
        `;

        document.querySelector('.close-preview').addEventListener('click', function () {
            photo.value = null;
            imgPreview.innerHTML = '';
        });

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





async function sendEmail(url) {
    let res = await fetch(url);

    if (res.status == 200) {
        let result = await res.text();
    }
}