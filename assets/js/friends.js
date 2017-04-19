function createRow(friend) {
	var content = "<div class='col-md-6 col-sm-6'> <div class='friend-card'>";
	content += "<img src='http://placehold.it/1030x360' alt='profile-cover' class='img-responsive cover' />";
        content += "<div class='card-info'>";
        content += "<img src='http://placehold.it/300x300' alt='user' class='profile-photo-lg'/>";
        content += "<div class='friend-info'>";
        content += "<a href='#' class='pull-right text-green'>My Friend</a>";
        content += "<h5><a href='timeline.html' class='profile-link'>" + friend.firstName + " " + friend.lastName + "</a></h5>";
	content += "<p>" + friend.email + "</p>";
	content += "</div></div></div></div>";
	
	return content;
}

//var editMode = false;
//var editcontactId;
//
//function editContact(id, name, phone, email) {
//	document.getElementById('name').value = name;
//	document.getElementById('phone').value  = phone;
//	document.getElementById('mail').value  = email;
//	
//	document.getElementById('editOrSave').value = 'Update Contact';
//	editMode = true;
//	editcontactId = id;
//}

//function deleteContact(id) {
//	var xhr = new XMLHttpRequest();
//	xhr.open('DELETE', '../controller/ContactsController.php', true);
//	xhr.send('id='+id);
//	
//	xhr.onload =  function() {
//		if (xhr.status == 200) {
//			reloadTable();
//		}
//	}
//}

//function addNewContact() {
//	var name = document.getElementById('name').value;
//	var phone = document.getElementById('phone').value;
//	var email = document.getElementById('mail').value;
//
//	// .... validation ...
//
//	var newContact = {
//		name: name,
//		phone: phone,
//		email: email
//	};
//	
//	if (editMode) {
//		newContact.id = editcontactId;
//	}
//	
//	var xhr = new XMLHttpRequest();
//	xhr.open('POST', '../controller/ContactsController.php', true);
//	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//	xhr.send('data='+JSON.stringify(newContact));
//	
//	xhr.onload =  function() {
//		if (xhr.status == 200) {
//			if (!editMode)
//				document.getElementById('table').innerHTML += createRow(newContact);
//			
//			document.getElementById('result').innerHTML = xhr.responseText;
//			reloadTable();
//		}
//	}
//}

function reloadTable() {
	var xhr = new XMLHttpRequest();
	xhr.open('GET', '../controller/FriendsController.php', true);

	xhr.onload = function() {
		if (xhr.status == 200) {
			var data = JSON.parse(xhr.responseText);
			var content = '';
			for (var i = 0; i < data.length; i++) {
				content += createRow(data[i]);
			}

			document.getElementById('friends-table').innerHTML = content;
		}
	}
	xhr.send(null);
}

document.addEventListener('DOMContentLoaded', function() {
	reloadTable();
});
