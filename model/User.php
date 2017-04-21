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
	
	
	public function setName ($name) {
		$name= htmlentities(trim($name));
		if(!preg_match("/^[a-zA-Z'-]+$/", $name)){
			throw new RegisterException("Name is not valid! It must not contain numbers or special characters.");
		}
		if((strlen($name)) < 1 || (strlen($name)) > 30) {
			throw new RegisterException("Please use between 1 and 30 characters.");
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
		$day += 0;
		$this->day = $day;
	}
	public function setMonth($month) {
		$month+= 0;
		$this->month = $month;
	}
	public function setYear($year) {
		$year+= 0;
		$this->year = $year;
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
		$city= htmlentities(trim($city));
		if(!preg_match("/^[a-zA-Z ]*$/", $city)){
			throw new RegisterException("Invalid character in city");
		}
		if((strlen($city)) > 30) {
			throw new RegisterException("City must be under 30 characters long.");
		}
		$this->bornCity = $city;
	}
	public function setCountry($country) {
		$country= htmlentities(trim($country));
// 		if(!preg_match("/^[a-zA-Z'-]+$/", $country)){
// 			throw new RegisterException("Invalid characters in country");
// 		}
		if((strlen($country)) > 30) {
			throw new RegisterException("Country must be under 30 characters long.");
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