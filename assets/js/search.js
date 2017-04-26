function createRow(friend) {
	var content = "<div class='col-md-6 col-sm-6'> <div class='friend-card'>";
	content += "<img src='http://placehold.it/1030x360' alt='profile-cover' class='img-responsive cover' />";
        content += "<div class='card-info'>";
        content += "<img src='http://placehold.it/300x300' alt='user' class='profile-photo-lg'/>";
        content += "<div class='friend-info'>";
        content += "<p class='pull-right text-green'>"+ friend.country +"</p>";
        content += "<h5><a href='TimelineController.php?id=" + friend.id + "'class='profile-link'>" + friend.firstName + " " + friend.lastName + "</a></h5>";
	content += "<p>" + friend.email + "</p>";
	content += "</div></div></div></div>";
	
	return content;
}


function reloadSearchedTable() {
	var email = document.getElementById('searchBar').value;
	var xhr = new XMLHttpRequest();
	xhr.open('GET', '../controller/SearchController.php?email=' + email , true);

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


window.onload = function () {
	var email = document.getElementById('searchBar').value;
	if(email.length > 0) {
		reloadSearchedTable();
	
	}
}