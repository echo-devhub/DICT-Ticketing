

const formSignin = document.querySelector('#form_signin');
const responseMessage = document.querySelector('#signin_response_result');


formSignin.addEventListener('submit', async function (ev) {
    ev.preventDefault();


    let res = await fetch('./admin/controllers/ajax_signin.php', {
        method: 'POST',
        body: new FormData(this)
        
    });   
    
    if (res.status == 200) {
       
        let result = await res.text();

        if (result === 'SUCCESS') {
            location.href = './admin/index.php';
        } else {
        displayResponse(result);
        }
    }
        
   

});

function displayResponse(message, indicator = 'warning') {
  responseMessage.innerHTML =  `<div class="alert alert-${indicator} alert-dismissible">
        ${message}
        <button type="button" class="btn btn-close" data-bs-dismiss="alert"></button>
    </div>`
}