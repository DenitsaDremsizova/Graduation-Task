
function checkCharacters (characters,id,minLength=null,maxLength=null) {
	if((characters.length < 1) || (characters.length > 30)) {
		document.getElementById('submit').disabled = true;
		document.getElementById('error').innerHTML = 'Some fields are empty!';
		document.getElementById(id).style.border = "1px solid red";
	}else {
		document.getElementById('submit').disabled = false;
		document.getElementById('error').innerHTML = '';
		document.getElementById(id).style.border = "1px solid green";
	} 
}
function checkCityCharacters (characters,id) {
	checkCharacters(characters,id,0,30);
}
function checkNameCharacters (characters,id) {
	checkCharacters(characters,id,0,30);
}

function checkPasswordCharacters (characters,id) {
	if((characters.length < 9) || (characters.length > 30)) {
		document.getElementById('submit').disabled = true;
		document.getElementById('error').innerHTML = 'Please use between 8 and 30 characters.';
		document.getElementById(id).style.border = "1px solid red";
	}else {
		document.getElementById('submit').disabled = false;
		document.getElementById('error').innerHTML = '';
		document.getElementById(id).style.border = "1px solid green";
	} 
}

function checkEmail(email) {
	  var xhttp = new XMLHttpRequest();
	  xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
			if(this.responseText.length > 2) {
			  document.getElementById("error").innerHTML = this.responseText;
			  document.getElementById("email").style.border = "1px solid red";
			  document.getElementById('submit').disabled = true;
			} else {
			  document.getElementById("email").style.border = "1px solid green";
			  document.getElementById('submit').disabled = false;
			  document.getElementById("error").innerHTML = '';
			}
	    }
	  };
	  xhttp.open("GET", "./RegisterController.php?email=" + email, true);
	  xhttp.send();
}
