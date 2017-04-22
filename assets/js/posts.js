function createPost(post) {
	
        var content = "<div class='post-content'>";
        content += "<i class='ion-compose edit-post'></i>";
        content += "<div class='post-date hidden-xs hidden-sm'>";
        content += "<h5> </h5><p class='text-grey'></p> </div>";   
        content += "<div class='post-container'>";
        content += "<img src='http://placehold.it/300x300' alt='user' class='profile-photo-md pull-left' />";
        content += "<div class='post-detail'>";
        content += "<div class='user-info'>";
        content += "<h5><a href='timeline.php' class='profile-link'>" + post.authorName + "</a> <span class='following'></span></h5>";
        content += "<p class='text-muted'>" + post.timestamp + "</p></div></div></div>";
        
        //add photo post:
        if (post.type == 'photos') {
            content += "<img src='" + post.source + "' alt='post-image' class='img-responsive post-image' />"
        }
        
        //add video link::
        if (post.type == 'video_posts') {
            content += "<iframe width='100%' height='340' src='" + post.source + "' frameborder='0' allowfullscreen></iframe>";            
        }
        
        //add uploaded video post:
        if (post.type == 'uploaded_videos') {
            content += "<video width='100%' height='340' controls>";
            content += "<source src='" + post.source + "' type='video/mp4'>";
            content += "<source src='" + post.source + "' type='video/ogg'>";
            content += "Your browser does not support the video tag.";
            content += "</video>";
        }
        
        content += "<div class='reaction'>";
        content += "<a class='btn text-green'><i class='icon ion-thumbsup'></i> 49</a>";
        content += "<a class='btn text-red'><i class='fa fa-thumbs-down'></i> 0</a></div>";
        content += "<div class='line-divider'></div>";
        content += "<div class='post-text'>";
        content += "<p>" + post.text + "</p></div>";
        content += "<div class='line-divider'></div>";
        
        //add comments:
        for (var i = 0; i < post.comments.length; i++) {
            content += "<div class='post-comment'>";
            content += "<img src='http://placehold.it/300x300' alt='' class='profile-photo-sm' />";
            content += "<p><a href='timeline.php' class='profile-link'>" + post.comments[i].commentor_name + "</a><br/>" + post.comments[i].text + "</p></div>";
            content += "<a class='btn text-green'><i class='icon ion-thumbsup'></i> 49</a>";
            content += "<a class='btn text-red'><i class='fa fa-thumbs-down'></i> 0</a></div>";
        }
        
        content += "</div></div></div>";
	
	return content;
}


function reloadTimeline() {
	var xhr = new XMLHttpRequest();
	xhr.open('GET', '../controller/PostsController.php', true);

	xhr.onload = function() {
		if (xhr.status == 200) {
			var data = JSON.parse(xhr.responseText);
			var content = '';
			for (var i = 0; i < data.length; i++) {
				content += createPost(data[i]);
			}

			document.getElementById('timeline-content').innerHTML = content;
		}
	}
	xhr.send(null);
}

document.addEventListener('DOMContentLoaded', function() {
	reloadTimeline();
});
