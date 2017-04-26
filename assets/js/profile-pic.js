function createProfilePic(photo) {

    var profPicHTML = "<img src='" + photo.file + "' alt='Profile Picture' class='img-responsive profile-photo'/>";    
    
    return profPicHTML;
}

function reloadProfPic(getId) {
    var xhr = new XMLHttpRequest();
    var url = '../controller/ProfilePicController.php' + '?id=' + getId;
    xhr.open('GET', url, true);

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

function reloadCovPic(getId) {
    var xhr = new XMLHttpRequest();
    var url = '../controller/CoverPicController.php' + '?id=' + getId;
    xhr.open('GET', url, true);

    xhr.onload = function () {
        if (xhr.status == 200) {
            var covPicData = JSON.parse(xhr.responseText);
            //var profPicHTML = createCoverPic(covPicData);
            var coverUrl = "url(" + covPicData.file + ")";

            document.getElementById('timeline-cover').style.backgroundImage=coverUrl;
        }
    }
    xhr.send(null);
}

document.addEventListener('DOMContentLoaded', function () {
    var getId = document.getElementById('getId').value;
    reloadProfPic(getId);
    reloadCovPic(getId);
});

