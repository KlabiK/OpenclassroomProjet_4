<?php
require_once('config/functions.php');

$articles = getArticles();
?>

<!DOCTYPE html>
    <html>
        <head>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

            <meta charset="UTF-8">
            <title>Premier blog</title>
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
                          <li class="nav-item active">
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
                <div class=" form-group text-center">
                    <h1 class="my-4">Billet pour l'Alaska</h1>
                    <h2 class="my-4">Chapitres</h2>
                    <hr>
                    <div class="row align-items-center">
                    <?php foreach($articles as $article): ?>
                        <div class="col-4" >
                        <h2><?= $article->title ?></h2>
                        <time><?= $article->date ?></time><br/>
                        <a class="form-control" href="article.php?id=<?= $article->id ?>">Lire le chapitre</a>
                        </div>
                    <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
  
        <div class="jumbotron">
            <div class="container">
       
                <div class="row mt-3">
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