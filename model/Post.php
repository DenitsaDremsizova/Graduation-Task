<?php
	class Post implements JsonSerializable {
		protected $id;
                protected $authorId;
                protected $authorName;
                protected $type;
                protected $timestamp;
                protected $text;
                protected $comments;
                
                public function __construct($authorId = null, $timelineId, $type = null, 
                $text = null, $timestamp = null, $authorName = null, $id=null, $comments = null) {

                $this->authorId = $authorId;
                $this->timelineId = $timelineId;
                $this->type = $type;
                $this->text = $text;
                $this->id = $id;
                $this->timestamp = $timestamp;
                $this->authorName = $authorName;
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