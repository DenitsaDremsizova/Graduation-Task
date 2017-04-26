<?php

class MediaPost extends Post {
    protected $source;
    
        public function __construct($authorId = null, $timelineId=null, $type = null, 
                $text = null, $timestamp = null, $authorName = null, $id=null, $comments = null, $profilePicture=null, $source = null) {

            parent::__construct($authorId, $timelineId, $type, $text, $timestamp, $authorName, $id, $comments, $profilePicture);
            $this->source = $source;                
        }       
}

?>
