<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title><?php

use App\Covoiturage\Lib\MessageFlash;

 echo $pagetitle; ?></title>
      <link rel="stylesheet" href="../web/assets/css/style.css">
   </head>
   <body>
      <header>
         <nav class="navbar">
            <div class="navbar-container">
               <div class="navbar-logo">Covoiturage</div>
               <ul class="navbar-menu">
                  <li><a href="frontController.php?controller=voiture&action=readAll" class="nav-link">Liste des voitures</a></li>
                  <li><a href="frontController.php?controller=utilisateur&action=readAll" class="nav-link">Liste des utilisateurs</a></li>
                  <li><a href="frontController.php?controller=trajet&action=readAll" class="nav-link">Liste des trajets</a></li>
                  <li><a href="frontController.php?action=formulairePreference" class="nav-link nav-pref">❤</a></li>
               </ul>
            </div>
         </nav>
      </header>

      <main class="container">
         <?php 
        // Affichage des messages flash
        $tousMessages = MessageFlash::lireTousMessages();
        foreach ($tousMessages as $type => $messages) {
            foreach ($messages as $message) {
                  echo '<div class="alert alert-' . htmlspecialchars($type) . '">' . htmlspecialchars($message) . '</div>';
            }
        }
         require __DIR__ . "/{$cheminVueBody}";
         ?>
      </main>

      <footer>
         <p>Site de covoiturage par Ryan BACHATENE, FI2A</p>
      </footer>
   </body>
</html>
