// Get the modal
var modal = document.getElementById('photo-form');

// Get the button that opens the modal
var btn = document.getElementById("add-photo-btn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close-photo-form")[0];

// When the user clicks the button, open the modal 
btn.onclick = function () {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target === modal) {
        modal.style.display = "none";
    }
}


//hide error message box -> NOT WORKING!
document.addEventListener("DOMContentLoaded", function(){
    if (document.getElementById("tl-error-msg-box").innerHTML == "") {
        document.getElementById("tl-error-msg-box").style.display = "none";
    }
});


// Get the modal
var modalV = document.getElementById('video-form');

// Get the button that opens the modal
var btnV = document.getElementById("add-video-btn");

// Get the <span> element that closes the modal
var spanV = document.getElementsByClassName("close-video-form")[0];

// When the user clicks the button, open the modal 
btnV.onclick = function () {
    modalV.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
spanV.onclick = function () {
    modalV.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target === modalV) {
        modalV.style.display = "none";
    }
}