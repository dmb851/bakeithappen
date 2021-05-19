<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
  error_reporting(E_ALL);
  ini_set('display_errors', 1); 

  $servername = "localhost";
  $username = "root";
  $dbname = "bakeithappen";
  $password = "";

  $output = array();
  $ingredientsOutput = array();

  if(isset($_GET["phpid"])){
    $phpID = $_GET["phpid"];
  }


  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
  }

  // SEARCHES DATABASE FOR EVERY SEARCH TERM/ INGREDIENT
  if (isset($_GET["phpid"])){
      
      //Create SQL SELECT Query to be run. 
      //SELECTS RECIPE THAT MATCHES RECIPE ID SENT FROM PHP
      $query = "SELECT recID, recName, recInstruct
      FROM recipe
      WHERE recID IN (?)";

      $ingredientsQuery = " SELECT i.inID, i.inName
                            FROM ingredient i
                            INNER JOIN recipe_ingredient ri ON ri.inID = i.inID
                            WHERE ri.recID IN (?)";

      //Prepare the SELECT statement using mysqli
      $statement = $conn->prepare($query);
      echo $conn->error;

      //Bind inputs from user for mysqli to use 
      $statement->bind_param("s", $phpID);

      //Execute the SELECT Query
      $statement->execute();

      //Get the result and format it
      $result = $statement->get_result();
      $row = $result->fetch_assoc();
      $recipeName = $row["recName"];
      $recipeInstructions = $row["recInstruct"];
      
      //GET INGREDIENTS
      //Prepare the SELECT statement FOR INGREDIENTS
      $ingredientStatement = $conn->prepare($ingredientsQuery);
      echo $conn->error;

      //Bind inputs from user for mysqli to use 
      $ingredientStatement->bind_param("s", $phpID);

      //Execute the SELECT Query
      $ingredientStatement->execute();

      //Get the result and format it
      $result = $ingredientStatement->get_result();
      while ($row = $result->fetch_assoc()) {
        // echo strval($row);
        // echo strval($row["inID"]);
        // echo strval($row["inName"]);
        // printf ("%s - %s\n", $row["inID"], $row["inName"]);
        array_push($ingredientsOutput, $row);
      }
      $ingredients_json =  json_encode($ingredientsOutput);


    //   printf ("%s - %s - %s\n", $row["recID"], $recipeName, $recipeInstructions);
      mysqli_close($conn);
  }
  else {
    echo ('');
  }
?>