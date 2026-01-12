<form method="get" action="../web/frontController.php"> 
  <fieldset> 
    <legend>Mettre à jour un trajet :</legend> 
    <p> 
      <label for="id_id">ID:</label> 
      <input type="number" value="<?php echo htmlspecialchars($trajet->getId()); ?>" name="id" id="id_id" readonly/>
      <br><br>

      <label for="depart_id">Départ:</label> 
      <input type="text" value="<?php echo htmlspecialchars($trajet->getDepart()); ?>" name="depart" id="depart_id" required/>
      <br><br>

      <label for="arrivee_id">Arrivée:</label> 
      <input type="text" value="<?php echo htmlspecialchars($trajet->getArrivee()); ?>" name="arrivee" id="arrivee_id" required/>
      <br><br>

      <label for="date_id">Date:</label> 
      <input type="date" value="<?php echo htmlspecialchars($trajet->getDate()); ?>" name="date" id="date_id" required/>
      <br><br>

      <label for="nbPlaces_id">Nombre de places:</label> 
      <input type="number" value="<?php echo htmlspecialchars($trajet->getNbPlaces()); ?>" name="nbPlaces" id="nbPlaces_id" required/>
      <br><br>

      <label for="prix_id">Prix:</label> 
      <input type="number" step="0.01" value="<?php echo htmlspecialchars($trajet->getPrix()); ?>" name="prix" id="prix_id" required/>
      <br><br>

      <label for="conducteurLogin_id">Login du conducteur:</label> 
      <input type="text" value="<?php echo htmlspecialchars($trajet->getConducteurLogin()); ?>" name="conducteurLogin" id="conducteurLogin_id" required/>
    </p> 

    <input type="hidden" name="action" value="updated">
    <input type="hidden" name="controller" value="trajet">

    <p> 
      <input type="submit" value="Mettre à jour" /> 
    </p> 
            <p><a href="../web/frontController.php?controller=trajet&action=readAll">Retour à la liste</a></p>
  </fieldset>  
</form>
