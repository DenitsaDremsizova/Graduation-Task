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
		console.log(this.responseText);
		if (xhr.status == 200) {
			
			if (this.responseText.length > 2) {
				document.getElementById('loginError').innerHTML = '';
				document.getElementById('loginError').innerHTML = this.responseText;
			}else {
				
			}
		}
	}
}
