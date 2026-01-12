<form method="get" action="../web/frontController.php"> 
  <fieldset> 
    <legend>Mon formulaire :</legend> 
    <p> 
      <label for="immat_id">Immatriculation:</label> 
      <input type="text" value="<?php echo htmlspecialchars($voiture->getImmatriculation()); ?>" name="immatriculation" id="immat_id" readonly/>
      <br> <br>
      <label for="marque_id">Marque:</label> 
      <input type="text" value="<?php echo htmlspecialchars($voiture->getMarque()); ?>" name="marque" id="marque_id" required/>
      <br> <br>
      <label for="couleur_id">Couleur:</label> 
      <input type="text" value="<?php echo htmlspecialchars($voiture->getCouleur()); ?>" name="couleur" id="couleur_id" required/>
      <br> <br>
      <label for="nbSiege_id">Nombre de sièges:</label> 
      <input type="number" value="<?php echo htmlspecialchars($voiture->getNbSieges()); ?>" name="nbSieges" id="nbSiege_id" required/>  
    </p> 

    <input type="hidden" name="action" value="updated">
    <input type="hidden" name="controller" value="voiture">

    <p> 
      <input type="submit" value="Mettre à jour" /> 
    </p> 
            <p><a href="../web/frontController.php?controller=voiture&action=readAll">Retour à la liste</a></p>
  </fieldset>  
</form>
