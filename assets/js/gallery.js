function createPhoto(photo) {

    var photoHTML = "<li>";
    photoHTML += "<div class='img-wrapper' data-toggle='modal' data-target='.photo-" + photo.numberInGallery + "'>";
    photoHTML += "<img src='" + photo.file  + "' alt='photo' /></div>";
    photoHTML += "<div class='modal fade photo-" + photo.numberInGallery + "' tabindex='-1' role='dialog' aria-hidden='true'>";
    photoHTML += "<div class='modal-dialog modal-lg'>";
    photoHTML += "<div class='modal-content'>";
    photoHTML += "<img src='" + photo.file + "' alt='photo' />";
    photoHTML += "<a class='gallery-icon prof-pic' href='#' id='prof-pic-" + photo.id + "' onclick='setProfilePic(" + photo.id + ")'><i class='ion-ios-person' id='photo-id-" + photo.id + "' title='Set as profile pic'></i></a>";
    photoHTML += "<a class='gallery-icon cov-pic' href='#' id='prof-pic-" + photo.id + "' onclick='setCoverPic(" + photo.id + ")'><i class='ion-image' id='cov-pic-" + photo.id + "' title='Set as cover pic'></i></a>";    
    photoHTML += "</div></div></div>";
    
    return photoHTML;
}


function reloadGallery(getId) {
    var xhr = new XMLHttpRequest();
    var url = '../controller/PhotoListController.php' + '?id=' + getId;
    xhr.open('GET', url, true);

    xhr.onload = function () {
        if (xhr.status == 200) {
            var data = JSON.parse(xhr.responseText);
            var photoHTML = '';
            for (var i = 0; i < data.length; i++) {
                photoHTML += createPhoto(data[i]);
            }

            document.getElementById('album-photos').innerHTML = photoHTML;
        }
    }
    xhr.send(null);
}

document.addEventListener('DOMContentLoaded', function () {
    var getId = document.getElementById('getId').value;
    reloadGallery(getId);
});

function setProfilePic(picId) { 

    var newProfPic = {
            id: picId,
            type: "profilePic"
        };

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../controller/PhotoListController.php', true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send('data=' + JSON.stringify(newProfPic));

        xhr.onload = function () {
            if (xhr.status == 200) {
                location.reload();
            }
        }    
}

function setCoverPic(picId) { 

    var newCovPic = {
            id: picId,
            type: "coverPic"
        };

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../controller/PhotoListController.php', true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send('data=' + JSON.stringify(newCovPic));

        xhr.onload = function () {
            if (xhr.status == 200) {
                location.reload();
            }
        }    
}


