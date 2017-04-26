<?php
	class Post implements JsonSerializable {
		protected $id;
                protected $authorId;
                protected $authorName;
                protected $type;
                protected $timestamp;
                protected $text;
                protected $comments;
                protected $profilePicture;


                public function __construct($authorId, $timelineId, $type, 
                $text=null, $timestamp = null, $authorName = null, $id=null, $comments = null, $profilePicture=null) {

                $this->authorId = $authorId;
                $this->timelineId = $timelineId;
                $this->type = $type;
                $this->text = $text;
                $this->id = $id;
                $this->timestamp = $timestamp;
                $this->authorName = $authorName;
                $this->comments = $comments;
                $this->profilePicture = $profilePicture;
            }
		
		public function jsonSerialize() {
			return get_object_vars($this);
		}
		
		public function __get($prop) {			
			return $this->$prop;
		}
                
	}
?>