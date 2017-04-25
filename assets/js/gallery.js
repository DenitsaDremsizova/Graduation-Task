function createPhoto(photo) {

    var photoHTML = "<li>";
    photoHTML += "<div class='img-wrapper' data-toggle='modal' data-target='.photo-" + photo.numberInGallery + "'>";
    photoHTML += "<img src='" + photo.file  + "' alt='photo' /></div>";
    photoHTML += "<div class='modal fade photo-" + photo.numberInGallery + "' tabindex='-1' role='dialog' aria-hidden='true'>";
    photoHTML += "<div class='modal-dialog modal-lg'>";
    photoHTML += "<div class='modal-content'>";
    photoHTML += "<img src='" + photo.file + "' alt='photo' /></div>";
    photoHTML += "<a class='gallery-icon prof-pic' href='#' id='prof-pic-9'><i class='ion-ios-person' id='photo-id-" + photo.id + "' title='Set as profile pic'></i></a>";
    photoHTML += "<form id='form-prof-pic-" + photo.id + "' method='post' action='../controller/GalleryController.php'>";
    photoHTML += "<input type='hidden' name='new-prof-pic' id='new-prof-pic-" + photo.id + "' value='" + photo.id + "'></form>";
    photoHTML += "<a class='gallery-icon cov-pic' href='#' id='prof-pic-'" + photo.id + "><i class='ion-image' id='cov-pic-" + photo.id + "' title='Set as cover pic'></i></a>";
    photoHTML += "<form id='form-prof-pic-" + photo.id + "' method='post' action='../controller/GalleryController.php'>";
    photoHTML += "<input type='hidden' name='new-prof-pic' id='new-prof-pic-" + photo.id + "' value='" + photo.id + "'></form>";     
    photoHTML += "</div></div>";
    return photoHTML;
}


function reloadGallery() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '../controller/PhotoListController.php', true);

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
    reloadGallery();
});




