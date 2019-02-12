<?php
// Dump contents of table.
// Usage: <URL>?table=nameOfTable

require_once "dbconn.php"; // Open database, create $conn connection object;

if (empty($table = $_GET["table"])) {
    die("Table is required: <URL>?table=nameOfTable");
}
echo "Table: " . $table . "<br />";

$sql = "SHOW COLUMNS FROM " . $table;
if (!$result = mysqli_query($conn, $sql)) {
    die('There was an error running query[' . $conn->error . ']');
}
echo "Fields: | ";
while ($row = mysqli_fetch_array($result)) {
    echo $row['Field'] . " | ";
}
echo "<br /><br />";

$sql = "SELECT * FROM " . $table;

require "dbconn.php"; // Connect to database;
if (!$result = mysqli_query($conn, $sql)) {
    die('There was an error running query[' . $conn->error . ']');
}
while ($row = mysqli_fetch_row($result)) {
    foreach ($row as  $item) {
        echo $item . " ";
    }
    echo "<br />";
} // End while
$conn->close();
?>
