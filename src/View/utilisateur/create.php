<form method="get" action="../web/frontController.php"> 
  <fieldset> 
    <legend>Mon formulaire :</legend> 
    <p> 
      <label for="login_id">Login:</label> 
      <input type="number" placeholder="0" name="login" id="login_id" required/>
      <br> <br>
      <label for="nom_id">Nom:</label> 
      <input type="text" placeholder="Nom de famille" name="nom" id="nom_id" required/>
      <br> <br>
      <label for="prenom_id">Prenom:</label> 
      <input type="text" placeholder="Prenom" name="prenom" id="prenom_id" required/>
    </p> 

    <input type="hidden" name="controller" value="utilisateur">
    <input type="hidden" name="action" value="created">
 
    <p> 
      <input type="submit" value="Envoyer" /> 
    </p> 
  </fieldset>  
</form>
