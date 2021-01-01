<html>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>
<span class="alert">* <?php echo $cnf;?></span>

<input type="submit">
</form>

<?php
// define variables and set to empty values
$name = $email="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
}

if($name==="asd"){
    $cnf="logged in!";
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

</body>
</html>