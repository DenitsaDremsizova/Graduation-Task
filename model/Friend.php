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

		public function __construct($id, $firstName=null, $lastName=null, $country = null, $city = null, 
                        $email=null, $gender=null, $dateOfBirth=null, $personalInfo=null) {
			
                        $this->id = $id;
			$this->firstName = $firstName;
			$this->lastName = $lastName;
                        $this->country = $country;
			$this->city = $city;
			$this->email = $email;                      
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
                
//                public function __set($prop, $value) {
//			if (empty($value)) {
//				throw new Exception('Invalid value for contact');
//			}
//			
//			$this->$prop = $value;
//		}
	}
?>