<?php
require_once "db.php";


// prepare and bind. A quantia de "S" deve ser a mesma da quantia de colunas/valores
$stmt = $conn->prepare("INSERT INTO Names (firstname, lastname) VALUES (?, ?)");
$stmt->bind_param("ss", $firstname, $lastname);

// set parameters and execute
$firstname = "John";
$lastname = "Doe";

$stmt->execute();

$firstname = "Mary";
$lastname = "Moe";

$stmt->execute();

$firstname = "Julie";
$lastname = "Dooley";

$stmt->execute();

echo "New records created successfully";

//$stmt->close();
//$conn->close();

///////////////////////////////////////

$sql = "SELECT id, firstname, lastname FROM Names";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
  }
} else {
  echo "0 results";
}
//$conn->close();

////////////////////////////

$sql = "SELECT id, firstname, lastname FROM Names WHERE lastname='Doe'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  echo "<br>";
  echo "Selecionando<br>";
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
  }
} else {
  echo "0 results";
}
//$conn->close();

//////////////////////////


$sql = "SELECT id, firstname, lastname FROM Names ORDER BY lastname";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  echo "<br>";
  echo "Ordenando <br>";
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
  }
} else {
  echo "0 results";
}
//$conn->close();

/////////////////////////////

// sql to delete a record
$sql = "DELETE FROM Names WHERE id=3";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

//$conn->close();
////////////////

$sql = "UPDATE Names SET lastname='Doe' WHERE id=2";
echo "<br>";
if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();

?>