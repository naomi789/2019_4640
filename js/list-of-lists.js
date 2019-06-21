function editLists(){
    edit_button = document.getElementById("edit-button");
    new_list_button = document.getElementById("new-list-button-row");
    new_list_input = document.getElementById("new-list-input-row");
    if(edit_button.innerHTML == "EDIT"){
        edit_button.innerHTML = "DONE";        
        new_list_button.style.display = "flex";

    }
    else{
        new_list_button.style.display = "none";
        new_list_input.style.display = "none";
        edit_button.innerHTML = "EDIT";
    }
}


function newList(){





    focus();
}



function submitNewList(){
    
}