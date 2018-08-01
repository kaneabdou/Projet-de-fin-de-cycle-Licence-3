<?php	
<select name="maCombo1" id ="maCombo1" onChange="actualiserCombo()">
    <option value="1">Valeur 1</option>
    <option value="2">Valeur 2</option>
  </select>
<select name="maCombo2" id="maCombo2">
</select>
function actualiserCombo(valueID)
{
   // On vide la combo 2
   document.getElementById('maCombo2').innerHTML=null;
   // On lance la requete ajax
   var xhr = getXhr();
   xhr.onreadystatechange = function(){
      if(xhr.readyState 4 && xhr.status 200){
         optionsselect = xhr.responseText;
         // On se sert de innerHTML pour rajouter les options a la liste
         document.getElementById('maCombo2').innerHTML = optionsselect;
      }
    }
    // Ici on va voir comment faire du post
    xhr.open("POST","tapage.php?vue=ajax",true);
    // ne pas oublier ça pour le post
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    // ne pas oublier de poster les arguments
    // ici, on regarde ce qui est séléctionné dans la combo1
    maCombo = document.getElementById('maCombo2');
    idvalue = maCombo.options[maCombo.selectedIndex].value;
    // On envois la requete
    xhr.send("idvalue="+idvalue);
}
// Ici cf doc AJAX
function getXhr(){
    var xhr = null; 
    if(window.XMLHttpRequest) 
        xhr = new XMLHttpRequest(); 
    else if(window.ActiveXObject){ 
        try {
            xhr = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            xhr = new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    else { 
        alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest..."); 
        xhr = false; 
    } 
    return xhr;
}

?>