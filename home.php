<?php
    session_start();
    if(isset($_SESSION['userLoggedIn'])){
        $userLoggedIn = $_SESSION['userLoggedIn'];
    }

    ?>


<!doctype html>
<html lang="en">

    <!-- URL http://nrs-projects.humboldt.edu/~dmb851/bakeithappen/version2/BakeItHappen/home.html -->
  
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css">

    <!-- Custom Css -->
    <link rel="stylesheet" href="../bakeithappen/Css/mystyle.css">

    

    <title >Bake It Happen!</title>
  </head>

  <body>
    <div class=" overlay">
        <header>
            <!--Front page banner image-->
            <img src="Pictures/banner4.png" class="img-long" width="1000" height="" alt="">

            <!--Top navigation bar-->
            <div class="container-fluid ">
                <nav class="navbar navbar-expand  bg-transparent"> 
                    <ul class="navbar-nav ml-auto "> 
                        <!-- <li class="nav-item  "> 
                            <a class="nav-link rounded-left" href="foodmap.html"> 
                            Find Restaurants 
                            </a> 
                        </li>  -->

                        <li class="nav-item" id="submitLink"> 
                            <a class="nav-link  " href="submit.php"> 
                            Submit Recipe 
                            </a> 
                        </li> 
                        <li class="nav-item " id="registerLink"> 
                            <a href="register.php" type="php" class="nav-link rounded-right "> 
                            Login/Signup 
                            </a> 
                        </li> 
                        <li class="nav-item " id="profileLink"> 
                            <a href="profile.php" type="php" class="nav-link rounded-right " href="/profile.php"> 
                            Profile 
                            </a> 
                        </li>
                        <li class="nav-item" id="logoutLink"> 
                            <a class="nav-link  " href="logout.php"> 
                            Logout
                            </a> 
                        </li> 
                       
                    </ul> 
                    
                </nav> 
            </div>  
        </header>

        <section>
            <div class="container">
                <!--Page title, just above search bar-->
                <h1 class="alt-font" id="title">Bake It Happen</h1> 

                <form  action="phpSearch.php" method="post" id="searchForm">
                    <!--Search bar and search buttons group-->
                    <div class="row justify-content-center mt-4 search-group">
                        <div class="col-md-10">
                            <div class="input-group shadow md-form form-sm pl-0"> 
                                
                                <!-- SEARCH BAR -->
                                <input class="form-control my-0 py-4  main-search-form " id="search" name="search" type="text" placeholder="Enter Ingredients, Recipes, Allergens, etc..." aria-label="Search">
                                
                                <!-- SEARCH BUTTONS -->
                                <div class="input-group-append">
                                    <button  class="input-group-text  lighten-2 search-button" id="search-button"><i class="fas fa-search" aria-hidden="true"></i></button>
                                    <button class="input-group-text  lighten-2 search-button" id="random-button"><i class="fas fa-dice"></i></button>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </form>
            

                <!--Bottom section of page, contains silly quote-->
                <div class="row justify-content-center text-center m-5 ">
                    <div class="col-md-8 quote ">
                        <h7>"Ask not what you can do for your country. Ask what's for lunch."
                            - Orson Welles</h7>
                    </div>
                </div>
            </div>
        </section>
    </div>

    



		
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
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
