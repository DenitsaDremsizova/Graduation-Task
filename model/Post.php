<?php
	class Post implements JsonSerializable {
		protected $id;
                protected $authorId;
                protected $authorName;
                protected $type;
                protected $timestamp;
                protected $text;
                protected $comments;
                
                public function __construct($id=null, $authorId = null, $authorName = null, $type = null, 
                $timestamp = null, $text = null, $comments = null) {

                $this->id = $id;
                $this->authorId = $authorId;
                $this->authorName = $authorName;
                $this->type = $type;
                $this->timestamp = $timestamp;
                $this->text = $text;
                $this->comments = $comments;
            }
		
		public function jsonSerialize() {
			return get_object_vars($this);
		}
		
		public function __get($prop) {			
			return $this->$prop;
		}
                
	}
?>