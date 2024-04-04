function openNav() {
    document.querySelector(".closenavdiv").classList.add("opennav");
    document.querySelector(".closenavdiv").classList.remove("clocsebtn-active");
  }
  
  function closeNav() {
    document.querySelector(".closenavdiv").classList.add("crossbtn-active");
    document.querySelector(".closenavdiv").classList.remove("opennav");
  }
  