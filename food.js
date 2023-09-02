function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }
  
  
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }
  function Function1() {
    alert("Dinocart is a web project that seeks to allow small and independent businesses to sell their products ");
  }
  
  function Function2() {
    alert("Create a new account and select the Admin option ");
  }
  
  function Function3() {
    alert("A+  =D");
  }
  function copy() {
    navigator.clipboard.writeText("number");
    
  }