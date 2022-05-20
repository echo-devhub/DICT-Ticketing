
const category = document.querySelector('#category_edit');

// HIDDEN FIELD
const categoryPostId = document.querySelector('#category_post_id');

// EDIRT BTN

document.querySelectorAll('.category_edit_btn').forEach((btn) => {
    btn.addEventListener('click', async function (ev) {
        let uid = this.dataset.uid;

        let res = await getUsers(`./controllers/ajax_retrieve_rows.php?category_id=${uid}`);

        categoryPostId.value = res.category_id;
        category.value = res.category;
        
    });
}
);

async function getUsers(url) {
    
    let res = await fetch(url); 
    return await res.json();
}