<?php
  $servername = "localhost";
  $username = "temp";
  $password = "temp";
  $db="test";
  $name=$_POST["Box"];
  $selectOption = $_POST['DropDown'];
  // Create connection
  $conn = new mysqli($servername, $username, $password, $db);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  //echo "Connected successfully";
  $sql="";
  switch ($selectOption) {
    case "Genre":
    $sql="call genrewise($name)";
    break;
    case "Language":
    $sql="call languagewise($name)";
    break;
    case "Country":
    $sql="call countrywise($name)";
    break;
    case "Year":
    $sql="call year($name)";
    break;
    case "Director Name":
    $sql="dirname($name)";
    break;
    case "Actor Name":
    $sql="namewise($name)";
    break;
    case "Title":
    $sql="titlewise($name)";
    break;
    case "Rating":
    $sql="ratingwise($name)";
    break;


    default:
      // code...
      break;
  }
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      echo "film_id: " . $row["film_id"]. " - Name: " . $row["title"]."<br> Year: " . $row["prodyear"]. " <br> Genre: " . $row["genreval"]. " <br> Language: " . $row["languageval"]. " <br> Director: " . $row["dir_name"].
      "<br> Rating: " .$row["rating"]. "<br> Country: " . $row["country_name"] ."<br>";
  }
  } else {
  echo "0 results";
}

  $conn->close();
?>
