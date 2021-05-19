<?php
session_start();


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
    <link rel="stylesheet" href="Css/mystyle-submit.css">

    <title >Bake It Happen!</title>
  </head>

  <body>
    <div class="">
        <header>
            <!--Front page banner image-->
            <img src="Pictures/banner2.png" class="img-long" width="1000" height="" alt="">

            <!--Top navigation bar-->
            <div class="container-fluid ">
                <nav class="navbar navbar-expand  bg-transparent"> 
                    <ul class="navbar-nav ml-auto "> 
                        <!-- <li class="nav-item  "> 
                            <a class="nav-link rounded-left" href="foodmap.html"> 
                            Find Restaurants 
                            </a> 
                        </li>  -->

                        <li class="nav-item"> 
                            <a class="nav-link  " href="home.php"> 
                            Home 
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
				
				<!--Page title, just above search bar-->
				<h2 class="alt-font" id="subtitle">Submit Recipe</h2>

                <!--Search bar and search buttons group-->
                <div class="row justify-content-center mt-4 search-group">
                    <div class="col-md-10">
                        <div class="input-group pl-0"> 
							<div class="form">
								<div class="float-right ml-5 mt-4 shadow p-3 mb-5 rounded">
									<img src="Pictures/submit_img.png">
								</div>
								<!-- RECIPE FORM -->
								<form action="RecInsert.php" method="post" class="mr-5">
								  <div class="form-group row pl-4 pt-4">
									<label for="recipeTitle">Recipe Title</label>
									<input type="form-control" class="form-control" id="recipeTitle" name="recipeTitle" placeholder="Example: Divine Peanutbutter Cookies">

								  </div>
								  <div class="form-group row pl-4 ">
									<label for="servingSize">Serving Size</label>
									<input type="form-control" class="form-control" id="servingSize" name="servingSize" placeholder="Ex: Serves 12">
								  </div>
								  
								  <div class="form-group row pl-4 ">
									<label for="recipeDesc">Recipe Description</label>
									<textarea class="form-control" id="recipeDesc" name="recipeDesc" rows="3" placeholder="Ex: Soft peanut butter cookies with a chocolatey center"></textarea>
								  </div>

								  <div class="form-group row pl-4 ">
									<label for="recipeIngr">Ingredients</label>
									<textarea class="form-control" id="recipeIngr" name="recipeIngr" rows="3" placeholder="Ex: 1 cup sugar, 1/2 cup butter"></textarea>
								  </div>

								  <div class="form-group row pl-4 ">
									<label for="recipeDir">Directions</label>
									<textarea class="form-control" id="recipeDir" name="recipeDir" rows="3" placeholder="Ex: 1) Mix dry ingredients together in a bowl. 2) When that's done..."></textarea>
								  </div>								  
								  <div class="col text-center">
									<button type="submit" class="btn btn-primary ml-4 mb-3">Submit</button>
								  </div>
								</form>
							</div>
                        </div>
                    </div>
                </div>
            </div>

                <!--Bottom section of page, contains silly quote-->
                <div class="row justify-content-center text-center m-5 ">
                    <div class="col-md-8 quote ">
                        <h7>"I hate when I go to the kitchen for food and all I find are ingredients."
                            - Anonymous</h7>
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
  </body>
</html>
