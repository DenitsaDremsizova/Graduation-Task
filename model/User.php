<?php
class User {
	private $id;
	private $email;
	private $password;
	private $firstName;
	private $lastName;
	private $day;
	private $month;
	private $year;
	private $gender;
	private $bornCity;
	private $country;
	const MAX_NAME_LENGTH = 20;
	const MIN_NAME_LENGTH = 1;
	const MIN_COUNTRY_NUMBER = 1;
	const MAX_COUNTRY_NUMBER = 249;
	const MIN_PASSWORD_CHARACTERS = 8;
	const MAX_CITY_LENGTH = 20;
	
	public function setName ($name) {
		if(empty($name)) {
			throw new RegisterException("Some fields are empty!");
		}
		$name= htmlentities(trim($name));
		
		if(!preg_match("/^[a-zA-Z'-]+$/", $name)){
			throw new RegisterException("Name is not valid! It must not contain numbers or special characters.");
		}
		if((strlen($name) < 1) || (strlen($name) > 20)) {
			throw new RegisterException("Please use between 1 and 20 characters.");
		}
		return($name);
	}
	
	public function setFirstName ($name) {
		$name = $this->setName($name);
		$this->firstName = $name;
	}
	
	public function setLastName ($name) {
		$name = $this->setName($name);
		$this->lastName = $name;
	}
	
	public function setDay($day) {
		if(empty($day)){
			throw new RegisterException("Some fields are empty!");
		}
		$day+= 0;
		if((!is_int($day)) && ($day<1) && ($day>31)) {
			throw new RegisterException("Invalid data");
		}
		$this->day= $day;
	}
	
	public function setMonth($month) {
		if(empty($month)){
			throw new RegisterException("Some fields are empty!");
		}
		$month+= 0;
		if((!is_int($month)) && ($month<1) && ($month>12)) {
			throw new RegisterException("Invalid data");
		}
		$this->month = $month;
	}
	public function setYear($year) {
		if(empty($year)) {
			throw new RegisterException("Some fields are empty!");
		}
		$year+= 0;
		if((!is_int($year)) && ($year < date("Y") - 100) && ($year>date("Y"))) {
			throw new RegisterException("Invalid data!");
		}
		$this->year= $year;
	}
	
	public function setGender($gender) {
		
		$gender = htmlentities(trim($gender));
		if(($gender === "M") || ($gender === "F")) {
			$this->gender= $gender;
		}else {
			throw new RegisterException("Invalid or empty gender");
		}
		$this->gender=$gender;
	}
	
	public function setBornCity($city) {
		if(empty($city)) {
			throw new RegisterException("Some fields are empty!");
		}
		$city= htmlentities(trim($city));
	
		if((strlen($city)) > 20) {
			throw new RegisterException("City must be under 20 characters long.");
		}
		$this->bornCity = $city;
	}
	public function setCountry($country) {
		$country += 0;
		$country= htmlentities(trim($country));
		if(empty($country)) {
			throw new RegisterException("Some fields are empty!");
		}

		if((is_int($country) && ($countr >= 1) && ($country <= 249))) {
			throw new RegisterException("Invalid country.");
		}
		$this->country=$country;
	}
	public function setEmail($email) {
		$email = strtolower($email);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			throw new RegisterException("Invalid email format.");
		}
		$this->email = $email;
	}
	
	public function setPassword($password) {
		if((strlen($password)) <= 8) {
			throw new RegisterException("Your Password Must Contain At Least 8 Characters!");
		}
		elseif(!preg_match("#[0-9]+#",$password)) {
			throw new RegisterException("Your Password Must Contain At Least 1 Number!");
		}
		
		// password hashing
		$this->password = hash('sha256',$password);
	}
	public function setId ($id) {
		$this->id = $id;
	}
	
	public function jsonSerialize() {
		$result = get_object_vars($this);
		unset($result['password']);
		return $result;
	}
	
	public function __get($prop) {
		return $this->$prop;
	}
	
	public function __construct($email,$password='TestPassword123',array $params=array()) {

		$this->setEmail($email);
		$this->setPassword($password);
		
		foreach ($params as $name => $value) {
			$methodName = 'set' . ucfirst($name);
			$this->$methodName($value);
			
		}
		
		
	}
}