<!DOCTYPE HTML>
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

<html>
  <head>   
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

   <!-- Font Awesome CSS-->
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css">

   <!-- Custom Css -->
   <link rel="stylesheet" href="Css/resultstyle.css">

    <title>Results Page</title>
  </head>
  <body>

    
    <div class="">
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

                    <li class="nav-item"> 
                        <a href="submit.php"  class="nav-link mt-1" id="submitLink" href="/submit.php"> 
                        Submit Recipe 
                        </a> 
                    </li>
                     
                    <li class="nav-item "> 
                        <a href="register.php"  class="nav-link rounded-right mt-1" id="registerLink" > 
                        Login/Signup 
                        </a> 
                    </li> 
                    <li class="nav-item " id="profileLink"> 
                            <a href="profile.php" type="php" class="nav-link rounded-right mt-1" > 
                            Profile 
                            </a> 
                        </li>
                        <li class="nav-item" id="logoutLink"> 
                            <a class="nav-link rounded-right mt-1 " href="logout.php"> 
                            Logout
                            </a> 
                        </li> 
                    
                  </ul> 
                </div>
              </nav> 
          </div>          

      </header>


      <section>
        <div class="container text-center">
          <h1 class="search-result-title mt-3" id="searchResultTitle">Results</h1>
          <!-- RESULTS -->
          <div class="col-md-12 recipe-results my-5" id="recipe-results">

          <!-- get results from php -->
          <?php include 'RecSearch.php'; ?>
          <script type="text/javascript">
             var php_results = <?php if (isset($output)) {
                 echo json_encode($output);
             } ?>;
             var outputLength = <?php if (isset($output_length)) {
                 echo $output_length;
             } ?>;
             var description = "";
             var name ="";
             var id = "";
             var hello = "hellooooo";
             for(var x = 0; x < outputLength; x++){

                  id = String(php_results[x]["recID"]);
                  name = String(php_results[x]["recName"]);
                  description = String(php_results[x]["recInstruct"]);
                  var titlecaseName = titleCase(name);
                  function titleCase(str) {
                      var splitStr = str.toLowerCase().split(' ');
                      for (var i = 0; i < splitStr.length; i++) {
                          splitStr[i] = splitStr[i].charAt(0).toUpperCase() + splitStr[i].substring(1);     
                      }
                      return splitStr.join(' '); 
                  }          
              
                  recipeResults = document.getElementById("recipe-results");   
                  
                  recipeResults.innerHTML += `<a href='fullrecipe.php?phpid=`+id+`' onclick='setSession()' class='orange-border rounded mt-1 row p-3 recipe-item' >
                                              <div class='col-md-4'>
                                                    <div class='image'> 
                                                            <img src='../BakeItHappen/Pictures/bakeithappentextlogo.png' alt='../BakeItHappen/Pictures/bakeithappentextlogo.png' class='rounded' width='200px' height='200px'>
                                                      </div>
                                                </div>
                      
                                                <div class='col-md-8'>
                                                    <div class='description'> 
                                                              <div class='recipe-name m-1 mt-md-5'> `+ titlecaseName +` </div>
                                                    </div> 
                                                </div> 
                                          </a>`;

               

                 function setSession(){
                    // sessionStorage.setItem("phpId", id);
                    // sessionStorage.setItem("phpName", name);
                    // sessionStorage.setItem("phpDescription", description);
                    sessionStorage.setItem("api", "no");
                    sessionStorage.setItem("php", "yes");
                 }
                
              

                          
           }         
             
          </script>

            <!-- RECIPE ITEM -->
            <!-- <a href='fullrecipe.html' class="orange-border rounded mt-1 row p-3 recipe-item" >

              <div class="col-md-4">
                <div class="image">
                  <img src="Pictures/default-image.jpeg" class="rounded" width="200px" height="200px">
                </div>
              </div>

              <div class="col-md-8">
                <div class="description">
                  <div class="recipe-name m-1">
                    Chicken Soup
                  </div>

                </div>
              </div>                                          
            </a> -->
           
           
          </div>           
        </div>
      </section>

    </div>
   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- CUSTOM JS -->
    <script type="text/javascript" src="../BakeItHappen/JavaScript/results.js"></script>
    <script type="text/javascript" src="../BakeItHappen/JavaScript/search.js" ></script>
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