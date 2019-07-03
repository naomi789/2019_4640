const hide = element => {element.style.display = "none";}

function editLists(){
    edit_button = document.getElementById("edit-button");
    // new_list_button = document.getElementById("new-list-button-row");
    // new_list_input = document.getElementById("new-list-input-row");
    if(edit_button.innerHTML == "EDIT"){
        edit_button.innerHTML = "DONE";
        all_delete_buttons = document.getElementsByClassName("delete-button");
        for(i=0; i < all_delete_buttons.length; i++)
        {
          all_delete_buttons[i].style.visibility = "visible";
        }
        document.getElementById("new-list-button-row").style.visibility = "visible";
    }
    else{
        // hide(new_list_button);
        // hide(new_list_input);
        edit_button.innerHTML = "EDIT";
        all_delete_buttons = document.getElementsByClassName("delete-button");
        for(i=0; i < all_delete_buttons.length; i++)
        {
          all_delete_buttons[i].style.visibility = "hidden";
        }
        document.getElementById("new-list-button-row").style.visibility = "hidden";
    }
}


// function newList(){
//     new_list_button = document.getElementById("new-list-button-row");
//     new_list_input = document.getElementById("new-list-input-row");
//
//     hide(new_list_button);
//     new_list_input.style.display = "flex";
//     inputField = document.getElementById("list-name-input");
//     inputField.focus();
// }
//
//
//
// function submitNewList(){
//     new_list_button = document.getElementById("new-list-button-row");
//     new_list_input = document.getElementById("new-list-input-row");
//     name = document.getElementById("list-name-input").value;
//
//     parentDiv = document.createElement("div");
//     parentDiv.setAttribute("class", "row list-row");
//
//     firstChild = document.createElement("div");
//     firstChild.setAttribute("class", "col-0 col-md-2");
//     parentDiv.appendChild(firstChild);
//
//     secondChild = document.createElement("div");
//     secondChild.setAttribute("class", "second-child col-10 col-md-7");
//     secondChild.setAttribute("align", "center");
//
//     grandChild = document.createElement("div");
//     grandChild.setAttribute("class", "box");
//
//     greatGrandChild = document.createElement("span");
//     greatGrandChild.setAttribute("class", "box-txt");
//
//     theText = document.createTextNode(name);
//     greatGrandChild.appendChild(theText);
//
//     grandChild.appendChild(greatGrandChild);
//
//     secondChild.appendChild(grandChild);
//     parentDiv.appendChild(secondChild);
//
//     thirdChild = document.createElement("div");
//     thirdChild.setAttribute("class", "third-child col-1 col-md-2");
//
//     let button = document.createElement("button");
//     button.setAttribute("class", "delete-button");
//     button.setAttribute("onclick", "deleteList(this)");
//     let icon = document.createElement("i");
//     icon.style.cssText = "vertical-align: middle;"
//     icon.setAttribute("class", "fa fa-minus-circle");
//     button.appendChild(icon);
//     thirdChild.appendChild(button);
//     thirdChild.style.display = "flex";
//     parentDiv.appendChild(thirdChild);
//
//     fourthChild = document.createElement("div");
//     fourthChild.setAttribute("class", "fourth-child col-1 col-md-1");
//     parentDiv.appendChild(fourthChild);
//
//     containerDiv = (document.getElementsByClassName("container"))[0];
//     containerDiv.appendChild(parentDiv);
//
//     hide(new_list_input);
//     new_list_button.style.display = "flex";
//
// }

// function deleteList(element){
//     let parent = element.parentElement;
//     let grandparent = parent.parentElement;
//     grandparent.remove();
// }
