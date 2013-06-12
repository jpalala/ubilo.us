<?php
/*
	these two classes are intertwined
*/
require_once('bcrypt.class.php');
class LoginClass extends Bcrypt{
	
	public $accountId;
	public $username;

	public $mysqliObj;
	/**
	@method construct constructor
	@params a valid MySQLi Object to be used for querying
        */


	public function __construct($mySQLi) {
		parent::__construct();
		$this->mysqliObj = $mySQLi;
	}
	function authenticateAdmin() {

	}

	function authenticateMember($username, $pwd) {
	  
		
 	 $sql_query='SELECT id,password FROM users WHERE username = ? ';		
	
	 $stmt = $this->mysqliObj->prepare($sql_query);

        $stmt->bind_param('s', $username);

        $stmt->execute();
	
        $stmt->bind_result($id,$existingHash);
		
        while($stmt->fetch()) {

             $this->accountId = $id;
	    
	     $hash = $existingHash;
	}

	if(!$accountId) {
		throw new Eden_Error('Username is not found!');
	} else {
		$this->username = $username;
	}
	//verify
	 if($this->verify($pwd,$hash) {
		//start sessions and return true
		$this->_startSession($this->accountId,this->username,'member');
		return true;
	 } else {
		throw new Eden_Error('Password is incorrect!');
	 } 
	}

	private function _startSession($accountId, $username, $level)
	{
		$_SESSION['_username'] = $username;
		$_SESSION['_userlevel'] = $level;
		$_SESSION['_accountid'] = $accountID;
	}			
}

class registrationClass extends Bcrypt{
	/*
		TODO generate a password
	*/
	
	public $mysqliObj;
	/**
	@method construct constructor
	@params a valid MySQLi Object to be used for querying
        */


	public function __construct($mySQLi) {
		parent::__construct();
		$this->mysqliObj = $mySQLi;
	}
	
	public function register($firstname,$lastname,$email,$username) {
		$generatedPassword = $this->_generatePassword();
		
		return 	$this->mysqliObj->query("INSERT INTO users VALUES (NULL,'{$firstname}','{$lastname}','{$email}','{$password}','".date('Y-m-d H:i:s')."'");
	}
	
	private function _generatePassword(){

	}

}
