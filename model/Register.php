<?php
class Register implements JsonSerializable {
	private $id;
	private $firstName;
	private $lastName;
	private $email;
	private $password;
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
	public function setDate($day,$month,$year) {
		$day += 0;
		$month += 0;
		$year += 0;
		
		if (checkdate($month,$day,$year) === false) {
			throw new RegisterException("invalid date of birth");
		}
			$this->day = $day;
			$this->month = $month;
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
		if(!preg_match("/^[a-zA-Z'-]+$/", $country)){
			throw new RegisterException("Country character in city");
		}
		if((strlen($country)) > 30) {
			throw new RegisterException("Country must be under 30 characters long.");
		}
		$this->country=$country;
	}
	
	public function jsonSerialize() {
		return get_object_vars($this);
	}
	
	public function __get($prop) {
		return $this->$prop;
	}
	
	public function __construct($firstName, $lastName, $email,$password,$day,$month,$year,$gender,$bornCity,$country,$id=null) {
		if (empty($firstName) || empty($lastName) || empty($email)
				|| empty($password) || empty($day) || empty($month) || empty($year)
				|| empty($gender) || empty($bornCity) || empty($country)){
			throw new RegisterException("Some fields are empty!");
		}
		$this->id = $id;
		
		$this->setFirstName($firstName);
		$this->setLastName($lastName);
		$this->setEmail($email);
		$this->setPassword($password);
		$this->setDate($day,$month,$year);
		$this->setGender($gender);
		$this->setBornCity($bornCity);
		$this->setCountry($country);
		
	}
}

$delyan = new Register('Delyan','Kolev','delyankolevv@gmail.com','12adsda3123','02','08','1991','M','StaraZagora','Bulgaria',null);
var_dump($delyan); 
?>