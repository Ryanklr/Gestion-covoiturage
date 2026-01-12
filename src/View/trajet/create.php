<form method="get" action="../web/frontController.php"> 
  <fieldset> 
    <legend>Mon formulaire :</legend> 
    <p> 
      <label for="id_id">ID:</label>  
      <input type="number" placeholder="0" name="id" id="id_id" required/>
      <br><br>
      
      <label for="depart_id">Départ:</label>  
      <input type="text" placeholder="Ville de départ" name="depart" id="depart_id" required/>
      <br><br>

      <label for="arrivee_id">Arrivée:</label>  
      <input type="text" placeholder="Ville d'arrivée" name="arrivee" id="arrivee_id" required/>
      <br><br>

      <label for="date_id">Date:</label> 
      <input type="date" name="date" id="date_id" required/>
      <br><br>

      <label for="nbPlaces_id">Nombre de places:</label> 
      <input type="number" placeholder="1" name="nbPlaces" id="nbPlaces_id" required/>
      <br><br>

      <label for="prix_id">Prix:</label> 
      <input type="number" step="0.01" placeholder="0.00" name="prix" id="prix_id" required/>
      <br><br>

      <label for="conducteurLogin_id">Login conducteur:</label> 
      <input type="text" placeholder="Login du conducteur" name="conducteurLogin" id="conducteurLogin_id" required/>
    </p> 

    <input type="hidden" name="controller" value="trajet">
    <input type="hidden" name="action" value="created">
 
    <p> 
      <input type="submit" value="Envoyer" /> 
    </p> 
  </fieldset>  
</form>
