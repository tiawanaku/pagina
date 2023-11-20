window.onload = function() {
  var preloader = document.getElementById("sc-preloader");
  if (typeof(preloader) != 'undefined' && preloader != null){
    setTimeout(function(){
      preloader.className = "loaded";
    }, 3000);

    setTimeout(function(){
      preloader.className = "hidden";
    }, 8000);
  }
}
