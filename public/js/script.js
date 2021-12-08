let btn = document.getElementById("btnadd");
let close = document.querySelector(".close");
let card = document.querySelectorAll('.todo-card');
let modal = document.querySelector(".my-modal");
let trash = document.querySelectorAll('.fa-trash-o');
let username = document.getElementById("dashboard-username");

let modal_header_text = document.getElementById('my-modal-header-text');

let txtname = document.querySelector('.my-modal-body-form #name');
let txttitle = document.querySelector('.my-modal-body-form #title');
let txtdesc = document.querySelector('.my-modal-body-form #description');
let txtdate = document.querySelector('.my-modal-body-form #duedate');
let txtidhidden = document.querySelector('#todo-id-hidden');

let form = document.querySelector(".my-modal-body-form form");

btn.addEventListener("click", btnclick);
close.addEventListener("click", btnclose);

/*swal({
    title: "Good job!",
    text: "You clicked the button!",
    icon: "success",
  });*/

function cardclick(e){
    form.setAttribute("action", "http://localhost/todolist/public/dashboard/update");
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            let response = JSON.parse(xhr.responseText);
            txtidhidden.value = response['id'];
            //txtname.value = response['user_id'];
            txttitle.value = response['title'];
            txtdesc.value = response['description'];
            txtdate.value = response['due_date'];
        }
    
    }
    xhr.open('GET', 'http://localhost/todolist/public/dashboard/CardSelection/' + e.target.children[1].innerHTML, true);
    xhr.send();
    modal.style.display = "block";
    modal_header_text.innerHTML = 'Change to do list data';
    btn.style.opacity = "0.5";
    btn.style.cursor = "default";
    
    card.forEach(function(item){
        item.style.cursor = "default";
        item.removeEventListener("click", cardclick);
    })

    btn.removeEventListener('click',btnclick);
    
    document.body.style.backgroundColor = "rgba(0,0,0,0.5)";
}

card.forEach(function(item){
    item.addEventListener("click", cardclick);
})


trash.forEach(function(item){
    item.addEventListener('click',function(event){
        if(confirm('Are you sure to delete this data ? ')){
            let id = item.id.substring(6);
            document.location.href = "http://localhost/todolist/public/dashboard/delete/" + id;
        }
        event.stopPropagation();
        })
    }
)


function btnclick(){
    txtidhidden.value = '';
    txttitle.value = '';
    txtdesc.value = '';
    txtdate.value = '';
    form.setAttribute("action", "http://localhost/todolist/public/dashboard/add");
    modal.style.display = "block";
    modal_header_text.innerHTML = 'Add your to do list';
    btn.style.opacity = "0.5";
    btn.style.cursor = "default";
    card.forEach(function(item){
        item.style.cursor = "default";
        item.removeEventListener("click", cardclick);
    })
    btn.removeEventListener('click',btnclick);
    document.body.style.backgroundColor = "rgba(0,0,0,0.5)";
}



function btnclose(){
    modal.style.display = "none";
    
    btn.style.opacity = "1";
    btn.style.cursor = "pointer";

    card.forEach(function(item){
        item.style.cursor = "pointer";
        item.addEventListener("click", cardclick);
    })
    btn.addEventListener('click',btnclick);
    document.body.style.backgroundColor = "white";
}

