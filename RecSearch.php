<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1); 
$ingredients = $_GET["search"];
$ingredients_arr = explode(" ", $ingredients);
$servername = "localhost";
$username = "root";
$dbname = "bakeithappen";
$password = "";

$output = array();


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}

// SEARCHES DATABASE FOR EVERY SEARCH TERM/ INGREDIENT
if (sizeof($ingredients_arr) > 0) {
    
    //Create SQL SELECT Query to be run. 
    // selects all recipes and instructions from the recipe table 

    $query = "SELECT r.recID, r.recName, r.recInstruct
    FROM recipe AS r 
    INNER JOIN recipe_ingredient i ON i.recId = r.recId 
    INNER JOIN ingredient x ON x.inId = i.inId
    WHERE x.inName IN (?)";

    //Prepare the SELECT statement using mysqli
    $statement = $conn->prepare($query);
    echo $conn->error;

    for ($x = 0; $x < sizeof($ingredients_arr); $x++) {
      //Bind inputs from user for mysqli to use 
      $ingredient = $ingredients_arr[$x];
    
      $statement->bind_param("s", $ingredient);

      //Execute the SELECT Query
      $statement->execute();
      //Get the result and format it
      $result = $statement->get_result();
      while ($row = $result->fetch_assoc()) {
        // printf ("%s - %s\n", $row["recID"], $row["recName"]);
        array_push($output, $row);
      }
             
    }
    $output_json =  json_encode($output);
    $output_length = count($output);
    mysqli_close($conn);
}
else {
  echo ('Incorrect Number of Ingredients Entered');
}

?>
