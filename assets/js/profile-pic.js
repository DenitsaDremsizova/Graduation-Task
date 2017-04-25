//function createProfilePic(photo) {
//
//    var content = "<img src='http://placehold.it/300x300' alt='Profile Picture' class='img-responsive profile-photo'/>";    
//    
//    return content;
//}

var content = "<img src='../uploads/1/photos/19-04-2017-11-55-37.jpg' alt='Profile Picture' class='img-responsive profile-photo'/>";
var cover = "../uploads/1/photos/19-04-2017-11-55-37.jpg";
var coverUrl = "url(" + cover + ")";

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('profile-photo-large-scr').innerHTML = content;
    document.getElementById('timeline-cover').style.backgroundImage=coverUrl;
});

//function reloadTimeline() {
//    var xhr = new XMLHttpRequest();
//    xhr.open('GET', '../controller/ProfilePicController.php', true);
//
//    xhr.onload = function () {
//        if (xhr.status == 200) {
//            var data = JSON.parse(xhr.responseText);
//            var content = '';
//            for (var i = 0; i < data.length; i++) {
//                content += createProfilePic(data[i]);
//            }
//
//            document.getElementById('profile-photo-large-scr').innerHTML = content;
//        }
//    }
//    xhr.send(null);
//}

//document.addEventListener('DOMContentLoaded', function () {
//    reloadTimeline();
//});
//
//function addNewPost() {
//    var text = document.getElementById("exampleTextarea").value;
//    var authorId = document.getElementById("authorId").value;
//    var timelineId = document.getElementById("timelineId").value;
//    document.getElementById("exampleTextarea").value = "";
//
//    if (text.length < 1) {
//        alert("This post appears to be blank.\nPlease write something before you click the Publish button.");
//    } else {
//        var newPost = {
//            text: text,
//            authorId: authorId,
//            timelineId: timelineId,
//            type: "text_posts"
//        };
//
//        var xhr = new XMLHttpRequest();
//        xhr.open('POST', '../controller/PostsController.php', true);
//        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//        xhr.send('data=' + JSON.stringify(newPost));
//
//        xhr.onload = function () {
//            if (xhr.status == 200) {
//                document.getElementById('new-post').innerHTML = xhr.responseText;
//                reloadTimeline();
//            }
//        }
//    }
//}


