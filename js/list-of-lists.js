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
    new_list_button = document.getElementById("new-list-button-row");
    new_list_input = document.getElementById("new-list-input-row");

    new_list_button.style.display = "none";
    new_list_input.style.display = "flex";
}



function submitNewList(){
    new_list_button = document.getElementById("new-list-button-row");
    new_list_input = document.getElementById("new-list-input-row");
    name = document.getElementById("list-name-input").value;

    parentDiv = document.createElement("div");
    parentDiv.setAttribute("class", "row");

    firstChild = document.createElement("div");
    firstChild.setAttribute("class", "col-0 col-md-2");
    parentDiv.appendChild(firstChild);

    secondChild = document.createElement("div");
    secondChild.setAttribute("class", "col-12 col-md-8");
    secondChild.setAttribute("align", "center");

    grandChild = document.createElement("div");
    grandChild.setAttribute("class", "box");

    greatGrandChild = document.createElement("span");
    greatGrandChild.setAttribute("class", "box-txt");

    theText = document.createTextNode(name);
    greatGrandChild.appendChild(theText);

    grandChild.appendChild(greatGrandChild);

    secondChild.appendChild(grandChild);
    parentDiv.appendChild(secondChild);

    thirdChild = document.createElement("div");
    thirdChild.setAttribute("class", "col-0 col-md-2");
    parentDiv.appendChild(thirdChild);

    containerDiv = (document.getElementsByClassName("container"))[0];
    containerDiv.appendChild(parentDiv);

    new_list_input.style.display = "none";
    new_list_button.style.display = "flex";

    console.log(parentDiv);
}