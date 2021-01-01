<?php 
							
							$username=$_POST['username'];
							$password=$_POST['password'];

							// Create connection
							$conn = new mysqli("localhost", "root", "", "test");

							// Check connection
							if ($conn->connect_error) {
							    die("Connection failed: " . $conn->connect_error);
							} 
							//echo "Connected successfully";
							
							$sql="select password from Login_credential where user_name='$username'";
							echo $sql;
							$result=$conn->query($sql);
							while($row = $result->fetch_assoc()) {
								//echo $row['password'];
								if($row["password"]===$password){
									//echo "logged in successfully";
									$sql1="insert into curusr (usr) values('" . $username. "')";
									
									if ($conn->query($sql1) === TRUE) {
									    //echo "added!";
									}
									$conn->close();
									header("Location: dash.php", true, 301);
									exit();
								}
								else{
									echo "invalid username or password";
								}
							}
							/*
								echo $err; */

	
?>