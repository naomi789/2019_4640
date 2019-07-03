function greetUser(email){

    if(window.XMLHttpRequest){
        var xhr = new XMLHttpRequest();
    }
    else{
        var xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xhr.onreadystatechange = function(){
        if(xhr.readyState==4 && xhr.status==200){
            var result = xhr.responseText;
            let greetingDiv = document.getElementById("greeting");
            let greetingText = document.createTextNode(result);
            // let greetingText = document.createTextNode("test");
            let greeting = document.createElement("p");
            greeting.appendChild(greetingText);

            greetingDiv.replaceChild(greeting, greetingDiv.childNodes[1]);
        }
    }

    xhr.open("GET", "get-name.php?email=" + email);
    xhr.send();




}