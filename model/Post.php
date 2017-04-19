<?php
	abstract class Post implements JsonSerializable {
		private $id;
                private $authorId;
		private $type;
                private $timestamp;
		
		public function jsonSerialize() {
			return get_object_vars($this);
		}
		
		public function __get($prop) {			
			return $this->$prop;
		}
                
                public function __set($prop, $value) {
			if (empty($value)) {
				throw new Exception('Something went wrong');
			}
			
			$this->$prop = $value;
		}
	}
?>