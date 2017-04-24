function logIn() {
	var email = document.getElementById("my-email").value;
	var password = document.getElementById("my-password").value;
	
	var loginUser = {
		email : email,
		password : password,
		submit : 'submit'
	};
	
	var xhr = new XMLHttpRequest();
	xhr.open("POST", "./LoginController.php", true);
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send('user=' + JSON.stringify(loginUser));
	
	xhr.onload = function() {
		if (xhr.status == 200) {
			
			if (this.responseText.length > 2) {
				document.getElementById('loginError').innerHTML = '';
				document.getElementById('loginError').innerHTML = this.responseText;
			}else {
				location.reload();
			}
		}
	}
}

function toggleMenu() {
	  var menuBox = document.getElementById('menu-box');    
	  if(menuBox.style.display == "block") { // if is menuBox displayed, hide it
	    menuBox.style.display = "none";
	  }
	  else { // if is menuBox hidden, display it
	    menuBox.style.display = "block";
	  }
	}


function sendNewPassword() {
	var email = document.getElementById("newPassEmail").value;
	var xhr = new XMLHttpRequest();
	xhr.open("POST", "./NewPasswordController.php", true);
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send(email);
	
	xhr.onload = function() {
		if (xhr.status == 200) {
			console.log(this.responseText);
			document.getElementById('newPasswordError').innerHTML = this.responseText;
			document.getElementById('newPassEmail').style.border = "1px solid red";
		}else {
			document.getElementById('newPasswordError').innerHTML = '';
			document.getElementById('newPassEmail').style.border = "1px solid green";
		}
	}
}
