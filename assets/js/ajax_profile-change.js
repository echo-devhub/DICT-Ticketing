const btnChangeInfo = document.querySelector('#btn_change_info');

// FORM
const formChangeProfile = document.querySelector('#form_change_profile');


btnChangeInfo.addEventListener('click', async function (ev) {
    let id = this.dataset.id;

    let res = await fetch(`./controllers/ajax_retrieve_rows.php?request-profile=${id}`);

    if (res.status == 200 && res.statusText == 'OK') {
        
        let json = await res.json();

// GET FORM INPUT FIELDS AND ASSIGN VALUES 
        let [firstname, lastname] = formChangeProfile.elements;

        firstname.value = json.first_name;
        lastname.value = json.last_name;

        imgPreview.innerHTML = `<img src="../assets/media/photos/uploaded/${json.photo}" alt="">`;
    }

});


const inputFile = document.querySelector('#photo');

// LOAD IMAGE FORM FILE SYSTEM ON INPUT CHANGE EVENT
inputFile.addEventListener('change', function (ev) {
    let file = this.files[0];

    let reader = new FileReader();

    reader.readAsDataURL(file);

    reader.addEventListener('load', function() {
        imgPreview.innerHTML = `<img src="${this.result}" alt="">`;
    });
});


// REQUEST UPDATE

// response
const responseMessage = document.querySelector('#response_message');


formChangeProfile.addEventListener('submit', async function (ev) {
    ev.preventDefault();

    let id = btnChangeInfo.dataset.id;

    let res = await fetch(`./controllers/ajax_profile.php?change_name=${id}`, {
        method: 'POST',
        body: new FormData(this)
    });   

    if (res.status == 200 && res.statusText == 'OK') {
        
        let result = await res.text();

        if (result === 'SUCCESS') {
            showResponse(responseMessage, 'Updated Successfully', 'success');
            setTimeout(() => { 
                location.reload();
            }, 500);
        } else {
            showResponse(responseMessage, result);
            }

      
    }


});


function showResponse(Elem, message, indicator = 'danger') {
  Elem.innerHTML =  `<div class="alert alert-${indicator} alert-dismissible border-0">
        ${message}
        <button type="button" class="btn btn-close" data-bs-dismiss="alert"></button>
    </div>`
}



// CHANGE PHOTO

const btnChangePhoto = document.querySelector('#btn_change_photo');

const imgPreview = document.querySelector('.img_preview');


btnChangePhoto.addEventListener('click', async function (ev) {
    ev.preventDefault();

    let id = this.dataset.id;

   let res = await fetch(`./controllers/ajax_retrieve_rows.php?request-profile=${id}`);

    if (res.status == 200 && res.statusText == 'OK') {
        
        let json = await res.json();

        imgPreview.innerHTML = `<img src="../assets/media/photos/uploaded/${json.photo}" alt="">`;
    }

});



const formChangePhoto = document.querySelector('#form_change_photo');

// response
const uploadResponseMessage = document.querySelector('#upload_response_message');


formChangePhoto.addEventListener('submit', async function (ev) {
    ev.preventDefault();

    let id = btnChangePhoto.dataset.id;

    let res = await fetch(`./controllers/ajax_profile.php?change_photo=${id}`, {
        method: 'POST',
        body: new FormData(this)
    });   

    if (res.status == 200 && res.statusText == 'OK') {
        
        let result = await res.text();

        if (result === 'SUCCESS') {
            showResponse(uploadResponseMessage, 'Successfully change your photo', 'success');
            setTimeout(() => { 
                location.reload();
            }, 500);
        } else {
            showResponse(uploadResponseMessage, result);
            }

      
    }


});
