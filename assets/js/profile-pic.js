function createProfilePic(photo) {

    var profPicHTML = "<img src='" + photo.file + "' alt='Profile Picture' class='img-responsive profile-photo'/>";    
    
    return profPicHTML;
}


//var cover = "../uploads/1/photos/19-04-2017-11-55-37.jpg";
//var coverUrl = "url(" + cover + ")";
//
//document.addEventListener('DOMContentLoaded', function () {
//    document.getElementById('timeline-cover').style.backgroundImage=coverUrl;
//});

function reloadProfPic() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '../controller/ProfilePicController.php', true);

    xhr.onload = function () {
        if (xhr.status == 200) {
            var profPicData = JSON.parse(xhr.responseText);
            var profPicHTML = createProfilePic(profPicData);

            document.getElementById('profile-photo-large-scr').innerHTML = profPicHTML;
            document.getElementById('profile-photo-small-scr').innerHTML = profPicHTML;
        }
    }
    xhr.send(null);
}

document.addEventListener('DOMContentLoaded', function () {
    reloadProfPic();
});

