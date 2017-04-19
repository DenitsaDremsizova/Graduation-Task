<?php

class TextPost extends Post {
    private $text;
    
        public function __construct($id=null, $authorId = null, $type = null, $timestamp = null, $text = null) {

                $this->id = $id;
                $this->authorId = $authorId;
                $this->type = $type;
                $this->timestamp = $timestamp;
                $this->text = $text;
        }
        
}

?>
