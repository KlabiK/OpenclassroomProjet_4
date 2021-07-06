<?php
 if(session_status() == PHP_SESSION_NONE){
    session_start();
  }
  if(!isset($_GET['id']) OR !is_numeric($_GET['id']) ){
    header('Location: index.php');
}else{
    extract($_GET);
    $id = strip_tags($id);

    require_once('config/functions.php');

   /* if(!empty($_POST)){

    extract($_POST);
    }*/
$commentSignal = getSignalComment($id);

}
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
            <meta charset="UTF-8"/>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <title>Signaler</title>
        </head>
        <body>
        <div class="bg-dark">
          <div class ="container">
              <div class="row">      
                <nav class="col navbar navbar-expand-lg navbar-dark">
                   <a class="navbar-brand" href="index.php">Jean Forteroche</a>
                    <div id="navbarContent" class="collapse navbar-collapse">
                       <ul class="navbar-nav">
                          <li class="nav-item active">
                             <a class="nav-link" href="index.php">Accueil</a>
                          </li>
                          <li class="nav-item">
                             <a class="nav-link" href="articlesList.php">Chapitres</a>
                          </li>
                          <li class="nav-item">
                             <a class="nav-link" href="contact.php">Contact</a>
                          </li>
                       </ul>
                   </div>
                </nav>
            </div>
        </div>
      </div>
<div class="container">
    <?php
    
    if(!empty($_SESSION['message'])){
        echo '<div class="alert alert-success" role="alert">'. $_SESSION['message'].'</div';
        $_SESSION['message'] = "";
    }
    if(!empty($_SESSION['erreur'])){
            echo '<div class="alert alert-danger" role="alert">'. $_SESSION['erreur'].'</div';
            $_SESSION['erreur'] = "";
    }
    
    ?>
            <h1 class="text-center my-4">Fiche de signalement</h1>
            <hr>
    <div class="row">
        
            <div >
                <h3>Auteur :</h3>  <label> <?= $commentSignal->author ?></label>
         
                <h3> Date et heure :</h3>
                <time> <?= $commentSignal->date ?></time>
           
                <h3> Message :</h3> 
                <p><?= $commentSignal->comment ?></p>
            </div>
        
    </div>
    <hr>
    <div class="row">            
                <form class="my-4 col-8" action="signaler.php?id=<?= $commentSignal->id ?>" method="POST" >
                    <div class="form-group">
                        <label for="motif">Motif :</label><br/>
                        <select class="form-control " name="motif">
                                <option value="motifVide"></option>
                                <option value="motifUn">Contenu indésirable</option>
                                <option value="motifDeux">Discours haineux</option>
                                <option value="motifTrois">Harcèlement</option>
                                <option value="motifQuatre">Autres</option>
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="mail" name="email" required>
                    </div>
                      <div class="form-group">
                        <label for="comment">Commentaire :</label>
                        </label><br>
                        <textarea name="comment" id="comment" cols="30" rows="8" required></textarea>
                    </div>  
                    <button class="btn btn-primary mb-4" type="submit">Envoyer</button>             
                </form>
    </div>
</div>
            <div class="jumbotron">
            <div class="container">
                <div class="row">
                    <div class="col text-center ">
                        <ul class="list-inline ">
                        <li class="list-inline-item font-weight-bold">À propos</li>
                        <li class="list-inline-item font-weight-bold"> Vie privée</li>
                        <li class="list-inline-item font-weight-bold">Conditions d'utilisations</li>
                        <li class="list-inline-item font-weight-bold"><a href="login.php">Admin</a></li>
                        </ul>
                    </div>     
                </div>
            </div>
            </div>
        </body>
    </html>