var searchForm = document.getElementById("searchForm");
var searchButton = document.getElementById("search-button");
var randomButton = document.getElementById("random-button");

//setup buttons with functions
searchButton.onclick = startRegularSearch;
randomButton.onclick = startRandomSearch;

//FUNCTION THAT HAPPENS WHEN WE DO A REGULAR SEARCH
function startRegularSearch(event) {
    //prevent the default submit action 
    event.preventDefault();

    //INITIALIZE OFFSET TO ZERO, BECAUSE IT WILL BE FROM LAST USE
    sessionStorage.setItem("randomOffset", 0);

    //GETS SEARCH VALUES FROM PAGE
    var searchValues = document.getElementById("search").value;

    //IF NO SEARCH INPUT IS ENTERED GIVE A RANDOM OFFSET
    if (searchValues == ""){
        randomOffset = getRndInteger(0,1000);
        sessionStorage.setItem("randomOffset", randomOffset);
    }

    //Save search value into a session variable/post
    sessionStorage.setItem("searchValues", searchValues);
    window.location = "resultpage.php?search=" + searchValues;

} 

//FUNCTION THAT HAPPENS WHEN WE DO A RANDOM SEARCH
function startRandomSearch(event) {
    //prevent the default submit action 
    event.preventDefault();


    randomId = getRndInteger(0, 999999) 

    //Take us to a full Recipe page that is random
    sessionStorage.setItem("recipeId", randomId);
    sessionStorage.setItem("api", "yes");
    sessionStorage.setItem("php", "no");
    window.location.href = "fullrecipe.php";

} 

//Random Number Generator 
function getRndInteger(min, max) {
    return Math.floor(Math.random() * (max - min + 1) ) + min;
  }

