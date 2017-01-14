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
    echo $council;
  } else {
    echo "Couldn't find your council, sorry - please check your postcode";
  }

} else {
  echo "Please enter your postcode";
}

?>