function initAjax(url, method)
{
	var xhr = new XMLHttpRequest();
	xhr.open(method, url, true);
	
	return xhr;
}

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

function createRequestRow (friend) {
	var content = "<div class='col-md-6 col-sm-6'> <div class='friend-card'>";
	content += "<img src='http://placehold.it/1030x360' alt='profile-cover' class='img-responsive cover' />";
        content += "<div class='card-info'>";
        content += "<img src='http://placehold.it/300x300' alt='user' class='profile-photo-lg'/>";
        content += "<div class='friend-info'>";
        content += "<p class='pull-right text-green'>"+ friend.country +"</p>";
        content += "<h5><a href='TimelineController.php?id=" + friend.id + "'class='profile-link'>" + friend.firstName + " " + friend.lastName + "</a></h5>";
	content += "<p>" + friend.email + "</p>";
	content += "<span style='color:green' onclick=\"addNewFrined(" + friend.id + ")\" onmouseover=\"this.style.cursor='pointer'\">Confirm </span>" +
			"<br/><span onmouseover=\"this.style.cursor='pointer'\" style='color:red' onclick=\"deleteFriendRequest(" + friend.id + ")\"> Delete Request</span>";
	content += "</div></div></div></div>";
	
	return content;
}

function deleteFriendRequest (id) {
	var xhr = initAjax('../controller/DeleteFriendRequestController.php', 'DELETE');
	xhr.send(id);
	
	xhr.onload =  function() {
		if (xhr.status == 200) {
			location.reload();
		}
	}
}

function deleteFriend (id) {
	var xhr = initAjax('../controller/DeleteFriendController.php', 'DELETE');
	xhr.send(id);
	
	xhr.onload =  function() {
		if (xhr.status == 200) {
			location.reload();
		}
	}
}

function addNewFrined (id) {
	var xhr = initAjax('../controller/AcceptFriendRequestController.php', 'POST');
	xhr.send(id);
	xhr.onload =  function() {
		if (xhr.status == 200) {
			location.reload();
		}
	}
}
function sendFriendRequest (id) {
	var xhr = initAjax('../controller/AddFriendController.php', 'POST');
	xhr.send(id);
	xhr.onload =  function() {
		if (xhr.status == 200) {
			location.reload();
		}
	}
}

function reloadRequestTable() {
	var xhr = new XMLHttpRequest();
	var url = window.location.href;
	var position = url.search("id=");
	
	if(position >= 0) {
		url = url.split("?id=");
		url = url[url.length - 1];
		url = '../controller/FriendsRequestsController.php?id=' + url;
	}else {
	url = '../controller/FriendsRequestsController.php';
	}
	
	xhr.open('GET', url , true);

	xhr.onload = function() {
		if (xhr.status == 200) {
			var data = JSON.parse(xhr.responseText);
			var content = '';
			for (var i = 0; i < data.length; i++) {
				content += createRequestRow(data[i]);
			}
			document.getElementById('friends-table').innerHTML = '';
			document.getElementById('friends-request-table').innerHTML = content;
		}
	}
	xhr.send(null);
}

function reloadTable() {
	var xhr = new XMLHttpRequest();
	var url = window.location.href;
	var position = url.search("id=");
	
	if(position >= 0) {
		url = url.split("?id=");
		url = url[url.length - 1];
		url = '../controller/FriendsController.php?id=' + url;
	}else {
	url = '../controller/FriendsController.php';
	}
	
	xhr.open('GET', url , true);

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
	var email = document.getElementById('searchBar').value;
	if(email.length < 1) {
		reloadTable();
	}
});




