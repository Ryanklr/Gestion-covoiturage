<form method="get" action="../web/frontController.php"> 
  <fieldset> 
    <legend>Mon formulaire :</legend> 
    <p> 
      <label for="login_id">Login:</label> 
      <input type="number" value="<?php echo htmlspecialchars($utilisateur->getLogin()); ?>" name="login" id="login_id" readonly/>
      <br> <br>
      <label for="nom_id">Nom:</label>  
      <input type="text" value="<?php echo htmlspecialchars($utilisateur->getNom()); ?>" name="nom" id="nom_id" required/>
      <br> <br>
      <label for="prenom_id">Prenom:</label>  
      <input type="text" value="<?php echo htmlspecialchars($utilisateur->getPrenom()); ?>" name="prenom" id="prenom_id" required/>
    </p> 

    <input type="hidden" name="action" value="updated">
    <input type="hidden" name="controller" value="utilisateur">

    <p> 
      <input type="submit" value="Mettre à jour" /> 
    </p> 
            <p><a href="../web/frontController.php?controller=utilisateur&action=readAll">Retour à la liste</a></p>
  </fieldset>  
</form>
