<?php
if(session_status() == PHP_SESSION_NONE){
   session_start();
 }
 var_dump($_GET);
 //die();
   //extract($_GET);
   $id = strip_tags($_GET['id']);
   require_once('config/functions.php');
   $article = getArticle($id);

//verification article existe
if(isset($_POST['suppr'])){
    // var_dump($_POST);
    // die();
    if(isset($_GET['id']) && !empty($_GET['id'])){
        require('config/connect.php');

          $req = $bdd->prepare('SELECT * FROM articles WHERE id=:id');
          $req->execute([
              "id"=>$id
          ]);
          $articleToSuppr = $req->fetch();
          if(!$articleToSuppr){
              $_SESSION['erreur'] = "ID invalide";
              header('Location : index.php');
              die();
              
          }
          $req = $bdd->prepare('DELETE FROM articles WHERE id = :id');

          $req->execute([
              "id"=>$id
          ]);
          $_SESSION['message'] = "Chapitre supprimé avec succès";
          header('Location: index.php');
          die();
  
        }
}else{
    $_SESSION['erreur'] = "Veuillez cocher la case pour valider la suppression";
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
   <div class="row">
       <div class="col text-center">
           <form method="POST">
           <h1><?= $article->title ?></h1>
           <time><?= $article->date ?></time> 
           <p><?= $article->content ?></p>
           <hr>
           <label><input type="checkbox" class="suppr" name="suppr" required>  Êtes vous sur de vouloir supprimer le chapitre </label><br>
           <button class="btn btn-primary my-4" >Supprimer le Chapitre</button>  
           </form>  
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
                       <li class="list-inline-item font-weight-bold"><a href="login.php">Admin</a></li>
                       </ul>
                   </div>     
               </div>
           </div>
           </div>
       </body>
   </html>