<!DOCTYPE html> 
<html> 
    <head> 
        <meta charset="utf-8" /> 
        <title> Formulaire Voiture </title> 
    </head> 
    <body> 
        <form method="get" action="../web/frontController.php"> 
  <fieldset> 
    <legend>Mon formulaire :</legend> 
    <p> 
      <label for="immat_id">Immatriculation</label> : 
      <input type="text" placeholder="256AB34" name="immatriculation" id="immat_id" required/>
      <br> <br>
      <label for="marque_id">Marque</label> : 
      <input type="text" placeholder="Renault" name="marque" id="marque_id" required/>
      <br> <br>
      <label for="couleur_id">Couleur</label> : 
      <input type="text" placeholder="Jaune" name="couleur" id="couleur_id" required/>
      <br> <br>
      <label for="nbSiege_id">Nombre de sièges</label> : 
      <input type="number" placeholder="5" name="nbSieges" id="nbSiege_id" required/>  
    </p> 

    <input type="hidden" name="action" value="created">
    <input type="hidden" name="controller" value="voiture">
 
    <p> 
      <input type="submit" value="Envoyer" /> 
    </p> 
    
  </fieldset>  
</form> 
 <!--   </body> -->
