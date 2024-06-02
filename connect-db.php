<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// Check if the form fields are set
		if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
			// Retrieve form data
			$name = $_POST['name'];
			$email = $_POST['email'];
			$password = $_POST['password'];
	// $Name = $_POST['name'];
	//  $email = $_POST['email'];
	//  $password = $_POST['password'];
	
    // $emerserveri='localhost';
    // $emeruser='root';
    // $pass='';
    // $emerdb="skillfusion";
    // $conn=mysqli_connect($emerserveri, $emeruser, $pass, $emerdb) or die("Gabim ne lidhje");
    

	// // Database connection
	 $conn = new mysqli('localhost','root','','skillfusion');
	 if($conn->connect_error){
	 	echo "$conn->connect_error";
	 	die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into login(name, email, password) values(?, ?, ?)");
		$stmt->bind_param("sss", $Name, $email, $password);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}

    // if (isset($_POST["signup"])) {
	// }
	// if (!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
	// $Name=$_POST["name"];
    // $email=$_POST["email"];
	// $pasword=$_POST["password"];

	// $query="INSERT INTO login (name,email,password) VALUES ('$Name','$email','$password')";
	// $run=mysqli_query($conn,$query) or die("error");
	// if ($run) {
	// 	echo "forma u plotesua";
	// }
	// else
	// 	echo "forma nuk u plotesua";
	// }

	// else
	// echo "plotesoni fushat";
} else {
	echo "All form fields are required.";
}
} else {
echo "Invalid request method.";
}