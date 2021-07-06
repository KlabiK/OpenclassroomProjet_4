<?php
 if(session_status() == PHP_SESSION_NONE){
    session_start();
  }
if(!isset($_GET['id']) OR !is_numeric($_GET['id']) ){
header('Location : index.php');
}else{
    extract($_GET);
    $id = strip_tags($id);
    require_once('config/functions.php');      
    require_once('config/connect.php');
    $getId = $_GET['id'];
    $articleId = $bdd->prepare('SELECT articleID FROM comments WHERE id = ?');
    $articleId->execute(array($id)); 
    $article = getArticle($id);
    $comments = getComment($id);
}

?>

<!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8"/>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <title><?= $article->title ?></title>
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
    <div class="row">
        <div class="col text-center ">
            <h1 class="my-4"><?= $article->title ?></h1>
            <time class="my-2"><?= $article->date ?></time> 
            <p><?= $article->content ?></p>
            <hr/>
        </div>
    </div>
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
                <div class="container">
                <h2>Commentaires :</h2>
                    <div>
                        <?php
                        foreach($comments as $com): ?>
                        <div>
                            <form method="POST">
                            <h3><?= $com->author ?></h3>
                            <time><?= $com->date ?></time>
                            <p><?= $com->comment ?></p>
                            <input type="hidden" name="idCom" class="idCom"<?= $com->id ?>>
                            <a class="btn btn-danger mb-4 " class="supprComment" name="supprComment" href="deleteCom.php?idCom=<?= $com->id ?>&id=<?=$getId?>">Supprimer</a>
                            </form>
                        </div>
                        <?php endforeach; ?>
                    </div>
                   
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
                        </ul>
                    </div>     
                </div>
            </div>
            </div>
        </body>
    </html>