<?php
/*if(isset($_POST['comment'])){
    $entete  = 'MIME-Version: 1.0' . "\r\n";
    $entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $entete .= 'From: ' . $_POST['email'] . "\r\n";

    $message = '<h1>Message envoyé depuis la page Signaler de jeanForteroche.fr</h1>
    <p><b>Motif : </b>' . $_POST['motif'] . '<br>
    <b>Email : </b>' . $_POST['email'] . '<br>
    <b>Message : </b>' . $_POST['comment'] . '</p>';

    $retour = mail('destinataire@free.fr', 'Envoi depuis page Contact', $message, $entete);
    if($retour) {
        echo '<p>Votre message a bien été envoyé.</p>';
    }
}*/

?>

<!DOCTYPE html>
    <html>
        <head>
        <meta charset="UTF-8">
        <title>Contact</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        </head>
        <body>
          <div class="bg-dark">
            <div class ="container">
              <div class="row">      
                <nav class="col navbar navbar-expand-lg navbar-dark">
                   <a class="navbar-brand" href="index.php">Jean Forteroche</a>
                    <div id="navbarContent" class="collapse navbar-collapse">
                       <ul class="navbar-nav">
                          <li class="nav-item ">
                             <a class="nav-link" href="index.php">Accueil</a>
                          </li>
                          <li class="nav-item">
                             <a class="nav-link" href="articlesList.php">Chapitres</a>
                          </li>
                          <li class="nav-item active">
                             <a class="nav-link" href="contact.php">Contact</a>
                          </li>
                       </ul>
                   </div>
                </nav>
            </div>
        </div>
      </div>
        <div class="container">
        <h1 class="text-center my-4">Page de Contact</h1>
            <div class="row">
                <div class="col">
                    <form method="POST">
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input name="nom" class="form-control" required>
                            </div>
                        <div class="form-group">
                            <label for="prenom">Prénom</label>
                            <input name="prenom" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Adresse mail</label>
                            <input type="mail" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="objet">Objet</label>
                            <input name="objet" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="comment">Message</label>
                            <textarea name="comment" class="form-control" required></textarea>
                        </div>
                        <button class="btn btn-primary" type="submit">Envoyer</button>
                    </form>
                </div>
            </div>
        
        </div>

        </body>
    
    </html>