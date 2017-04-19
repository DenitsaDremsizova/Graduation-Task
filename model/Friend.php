<?php
	class Friend implements JsonSerializable {
		private $id;
		private $firstName;
                private $lastName;
		private $email;
		private $gender;
		private $dateOfBirth;
                private $personalInfo;
//                private $address; // @var Address
//                private $workExperience; // @var workExperience[]
//                private $interests;

		public function __construct($firstName, $lastName, $email, $id=null, $gender=null, $dateOfBirth=null, $personalInfo=null) {
			
			if (empty($firstName) || empty($lastName) || empty($email))
				throw new FriendException("Invalid data"); //to review
			
			$this->firstName = $firstName;
			$this->lastName = $lastName;
			$this->email = $email;
                        $this->id = $id;
			$this->gender = $gender;
                        $this->dateOfBirth = $dateOfBirth;
                        $this->personalInfo = $personalInfo;
		}
		
		public function jsonSerialize() {
			return get_object_vars($this);
		}
		
		public function __get($prop) {			
			return $this->$prop;
		}
                
                public function __set($prop, $value) {
			if (empty($value)) {
				throw new FriendException('Invalid value for contact');
			}
			
			$this->$prop = $value;
		}
	}
?>