
const btnShowConfirmationBox = document.querySelectorAll('.btn_show_confimation_box');


 let deleteBtn = document.querySelector('.send_delete');

btnShowConfirmationBox.forEach((btn) => {
    btn.addEventListener('click', function (ev) {
        let id = this.dataset.id;
        let page = this.dataset.page;
        

        deleteBtn.dataset.id = id;
        deleteBtn.dataset.page = page;
    });
});


const confirmationResponse = document.querySelector('.confirmation-response');


deleteBtn.addEventListener('click', async function () {

    let res = await fetch(`./controllers/ajax_confirmation_box.php?page=${this.dataset.page}&id=${this.dataset.id}`);


    if (res.status == 200) {
       
        let result = await res.text();

            confirmationResponse.innerHTML = `<div class="alert alert-success">Successfully deleted</div>`;
            setTimeout(() => {
            location.href = './agents.php';
            }, 600);
    }
});