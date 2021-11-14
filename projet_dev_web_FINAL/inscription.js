function autreInstrument(){
  var selectElmt = document.getElementById("selectInstr");
  if(selectElmt.options[selectElmt.selectedIndex].value == "Autre")
      document.getElementById("d2").style.display = "block";
  else 
      document.getElementById("d2").style.display = "none"; 
 }