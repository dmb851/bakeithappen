<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if(isset($_SESSION['userLoggedIn'])){
    $userLoggedIn = $_SESSION['userLoggedIn'];
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css">

    <!-- Custom Css -->
    <link rel="stylesheet" href="../BakeItHappen/Css/fullrecipestyle.css">

    <title>Full Recipe</title>
  </head>

  <header>
    <!--Front page banner image-->
    <img src="Pictures/banner4.png" class="img-long img-fluid top-banner" width="" height="" alt="">

    <!--Top navigation bar-->
    <div class="container-fluid ">
        <nav class="navbar navbar-expand-md navbar-dark bg-transparent "> 

          <a class="navbar-brand " href="../BakeItHappen/home.php">Bake It Happen</a>
          <button class="navbar-toggler orange-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon orange-color"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto p-3 text-center ">
              
              <li class="nav-item search-item">
                <!-- Search form -->
                    <form class="form-inline  mt-2">
                      <div class="input-group  pl-0 " >
                        <input class=" form-control shadow small-search-form form-control-sm  " type="text" id="search" placeholder="Search For Recipes"
                        aria-label="Search">
                       <!-- SEARCH BUTTONS -->
                       <div class="input-group-append">
                      <button  class="input-group-text  lighten-2 search-button-small  " id="search-button"><i class="fas fa-search" aria-hidden="true"></i></button>
                        </div>
                      </div>
                      
                    </form>
              </li>

              <li class="nav-item" id="submitLink"> 
                  <a href="submit.php" type="php"  class="nav-link mt-1" > 
                  Submit Recipe 
                  </a> 
              </li>
               
              <li class="nav-item " id="registerLink"> 
                  <a href="register.php" type="php"  class="nav-link rounded-right mt-1" > 
                  Login/Signup 
                  </a> 
              </li> 
              <li class="nav-item " id="profileLink"> 
                            <a href="profile.php" type="php"   class="nav-link rounded-right mt-1 " > 
                            Profile 
                            </a> 
              </li>
              <li class="nav-item" id="logoutLink"> 
                            <a class="nav-link rounded-right mt-1  " href="logout.php"> 
                            Logout
                            </a> 
                        </li> 
              
            </ul> 
          </div>
        </nav> 
    </div>          

</header>
  <body>



    <div class="container orange-border-static p-5 mb-5">
      <!-- Save Recipe Button -->
      <!-- <button type="button" class="btn btn-success btn-circle btn-lg"><i class="fas fa-plus"></i> </button> -->

      <!-- TITLE -->
        <div class="container text-center mb-3">
          <h1 id="recipeTitle">Recipe title</h1>
        </div>
        <!-- Servings / Time -->
        <div class="container text-center mb-4">
          <h3 id="recipeServings" id="servings">Servings: </h3>
          <h3 id="recipeTime" id="time">Ready In: </h3>
        </div>

        <!-- INGREDIENTS -->
        <div class="container text-center">
            <h1>Ingredients</h1>
            <div class="col-md-12 my-4" id="ingredients">
                
            </div>
        </div>

        <!-- INSTRUCTIONS -->
        <div class="container my-4 text-center">
            <h1>Instructions</h1>
            <div class="col-md-12" id="instructions">
                
            </div>
        </div>

        <!-- PHP THAT CONNECTS TO OUR DATABASE TO GET FULL RECIPE -->
<?php include 'phpfullrecipe.php' ?>
<script type="text/javascript">
    var phpName = "<?php if (isset($recipeName)) {echo $recipeName;} ?>";
    var phpDescription = "<?php echo $recipeInstructions; ?>"; 
    var recipeTitle = document.getElementById("recipeTitle");
    var recipeInstructions = document.getElementById("instructions");
    var recipeIngredients = document.getElementById("ingredients");
    var php_ingredients = <?php if (isset($ingredientsOutput)) {
                 echo json_encode($ingredientsOutput);
             } ?>;    
    console.log(php_ingredients);

    recipeTitle.innerHTML = String(phpName);
    recipeInstructions.innerHTML = String(phpDescription);
    for(i = 0; i < php_ingredients.length; i++){
      recipeIngredients.innerHTML += String(php_ingredients[i]["inName"]);
      recipeIngredients.innerHTML += "<br>";
    }

</script>
    </div>
    
        

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <!-- CUSTOM JS -->
    <script type="text/javascript" src="../BakeItHappen/JavaScript/fullRecipe.js"></script>
    <script type="text/javascript" src="../BakeItHappen/JavaScript/search.js"></script>
    <script type="text/javascript">
      
      $(document).ready(function(){  
      
      var loggedIn = "<?php echo isset($userLoggedIn) ?>";
      if(loggedIn){
          //show submit recipe and profile link
          document.getElementById("submitLink").style.display = "block";
          document.getElementById("profileLink").style.display = "block";
          document.getElementById("registerLink").style.display = "none";
          document.getElementById("logoutLink").style.display = "block";
      }
      else{
          // hide submit recipe and profile link and show login link
          document.getElementById("submitLink").style.display = "none";
          document.getElementById("profileLink").style.display = "none";
          document.getElementById("registerLink").style.display = "block";
          document.getElementById("logoutLink").style.display = "none";

      }
            });
    </script>
  
  </body>
</html>