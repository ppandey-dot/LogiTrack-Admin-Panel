<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="db_transport";
$con=mysqli_connect('localhost','root','','db_transport');
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo ""; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
    
    
    
    Class dbObj{
	/* Database connection start */
	var $dbhost = "localhost";
	var $username = "root";
	var $password = "";
	var $dbname = "db_transport";
	var $conn;
	function getConnstring() {
		$con = mysqli_connect($this->dbhost, $this->username, $this->password, $this->dbname) or die("Connection failed: " . mysqli_connect_error());

		/* check connection */
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		} else {
			$this->conn = $con;
		}
		return $this->conn;
	}
}
?>
