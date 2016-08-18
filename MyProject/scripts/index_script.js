function checkbox() {
    if(document.getElementById("cb").checked==true){
        document.getElementById("remember_me").innerHTML = "Be sure this is a personal computer";
        return;
    }
    if(document.getElementById("cb").checked==false) {
        document.getElementById("remember_me").innerHTML = "Keep me logged in";
        return;
    }
}
function password_match() {
    if(document.getElementById("p").value.length != 0 && document.getElementById("c_p").value.length != 0){
        if(document.getElementById("p").value == document.getElementById("c_p").value){
            document.getElementById("p_match").innerHTML = "Passwords match!";
            document.getElementById("p_match").style.color = "Green";
        } else {
            document.getElementById("p_match").innerHTML = "Passwords do not match!";
            document.getElementById("p_match").style.color = "Red";
        }
    } else {
        document.getElementById("p_match").innerHTML = "";
    }
}

// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

//Get the contents of the body
var body = document.getElementById("main");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal and hides the body
btn.onclick = function() {
    modal.style.display = "block";
    body.style.display = "none";
}

// When the user clicks on <span> (x), close the modal and brings back the body
span.onclick = function() {
    modal.style.display = "none";
    body.style.display = "block";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}