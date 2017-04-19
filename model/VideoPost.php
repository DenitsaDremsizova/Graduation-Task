<?php

class VideoPost extends Post {
    private $text;
    private $link;
    
        public function __construct($id=null, $authorId = null, $type = null, $timestamp = null, $text = null, $link = null) {

                $this->id = $id;
                $this->authorId = $authorId;
                $this->type = $type;
                $this->timestamp = $timestamp;
                $this->text = $text;
                $this->link = $link;
        }
        
}

?>
