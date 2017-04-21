<?php

class MediaPost extends Post {
    protected $source;
    
        public function __construct($id=null, $authorId = null, $authorName = null, $type = null, 
                $timestamp = null, $text = null, $source = null, $comments = null) {

            parent::__construct($id, $authorId, $authorName, $type, $timestamp, $text, $comments);
            $this->source = $source;                
        }       
}

?>
