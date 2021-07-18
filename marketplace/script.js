// create function to toggle collapse class
function toggleCollapse() {
  $(".navbar-collapse").toggleClass("collapse");
}

// this function hides the icons
function hideIcon() {
  $(".icon").hide();
}

// new list items are added using this function
function addToList() {
  $(".navbar-nav").append('<li class ="nav-item"><a href="#">Sign In</a></li>');
  $(".navbar-nav").append(
    '<li class = "nav-item"><a href="#">Contact</a></li>'
  );
}

// create a click event
function returnToDefault() {
  $(".toggle-collapse").click(function () {
    toggleCollapse();
    hideIcon();
  });
}

// create a function that triggers the click events and its subordinate functions
function clickNav() {
  toggleCollapse();
  hideIcon();
  addToList();
  returnToDefault();
}

// Toggle collapse function, referencing the clickNav
$(document).ready(function () {
  $(".toggle-collapse").one("click", clickNav);
});
