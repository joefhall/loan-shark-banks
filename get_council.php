<?php

// Finds the council (local authority) from a postcode
// Takes parameter $postcode

// Show errors
// ini_set('error_reporting', E_ALL);
// ini_set('display_errors', 1);

// Get parameters
if (isset($_GET['postcode'])) {
  $postcode = $_GET['postcode'];
  
  $postcode_nospaces = $postcode_nospaces = str_replace(' ', '', $postcode);

  $json_response_postcodesio = file_get_contents('https://api.postcodes.io/postcodes/' . $postcode_nospaces);
  $json_postcodesio = json_decode($json_response_postcodesio, true); // decode the JSON into an associative array
  // echo "<pre>" . print_r($json_postcodesio) . "</pre><p>&nbsp;</p>";

  if (isset($json_postcodesio)) { // If not an error connecting to postcodes.io
    $council = $json_postcodesio['result']['admin_district'];
  } else {
    $council = "Couldn't find your council, sorry - please check your postcode";
  }

} else {
  $council = "Please enter your postcode";
}



// Get interest per year from database

include_once("database_password.php"); // returns $dbpassword
$mysqli = new mysqli("localhost", "root", $dbpassword, "councils");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$query = "SELECT annualinterestmillion FROM councils WHERE name = '$council' LIMIT 1";

if ($result = $mysqli->query($query)) {

    /* fetch object array */
    while ($row = $result->fetch_row()) {
      $interest = round($row[0], 1);
    }

    /* free result set */
    $result->close();
}

/* close connection */
$mysqli->close();

$return = json_encode(array($council, $interest));

echo $return;

?>
