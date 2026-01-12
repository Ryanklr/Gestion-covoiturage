<div>
   <h2>Paramètres de Préférence</h2>
   <p class="form-description">Sélectionnez votre contrôleur par défaut</p>
   
   <form method="get" action="frontController.php" class="preference-form">
       <input type="hidden" name="action" value="enregistrerPreference">

       <?php $defaut = $controleur_defaut; ?>

       <fieldset>
           <legend>Contrôleur par défaut</legend>
           
           <label class="radio-label">
               <input type="radio" name="controleur_defaut" value="voiture"
                   <?= $defaut === "voiture" ? "checked" : "" ?>>
               <span class="radio-text">Voitures</span>
           </label>

           <label class="radio-label">
               <input type="radio" name="controleur_defaut" value="utilisateur"
                   <?= $defaut === "utilisateur" ? "checked" : "" ?>>
               <span class="radio-text">Utilisateurs</span>
           </label>

           <label class="radio-label">
               <input type="radio" name="controleur_defaut" value="trajet"
                   <?= $defaut === "trajet" ? "checked" : "" ?>>
               <span class="radio-text">Trajets</span>
           </label>
       </fieldset>

       <button type="submit" class="btn-submit">Enregistrer la préférence</button>
   </form>
</div>

