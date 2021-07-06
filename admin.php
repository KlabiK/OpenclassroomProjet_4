
<?php
 if(session_status() == PHP_SESSION_NONE){
    session_start();
  }
  require_once'config/connect.php';
  $req = $bdd->prepare('SELECT password FROM admin');
  $req->execute();
  $pass = $req->fetch();
if($_POST['login'] == "admin" AND $_POST['mdp'] == $pass['password'])
{
    require_once'config/connect.php';
    
    $req = $bdd->prepare('SELECT id, title, synopsis FROM articles');
    $req->execute();
    $result = $req->fetchAll();
  
    ?>
<!doctype html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="<idth=device-width, initial-scale=1.0">
            <title>Liste des articles</title>
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
                          <li class="nav-item active">
                             <a class="nav-link" href="index.php">Accueil</a>
                          </li>
                          <li class="nav-item">
                             <a class="nav-link" href="articlesList.php">Chapitres</a>
                          </li>
                          <li class="nav-item">
                             <a class="nav-link" href="account.php">Mon compte</a>
                          </li>
                       </ul>
                   </div>
                </nav>
            </div>
        </div>
      </div>
         <main class="container">
            <div class="row">
                <div class="col-10">
                <?php
                 if(!empty($_SESSION['message'])){
                    echo '<div class="alert alert-success" role="alert">'. $_SESSION['message'].'</div';
                    $_SESSION['message'] = "";
                }
                ?>
                <h1 class="text-center my-4">Billet simple pour l'Alaska</h1>
                <table class="table">
                    <thead>
                        <th rows="6">Chapitre</th>
                        <th>Synopsis</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach($result as $chapitre){
                        ?>
                            <tr>
                                <td><?= $chapitre['title'] ?> </td>
                                <td><?= $chapitre['synopsis'] ?> </td>                                
                                <td><a href="edit.php?id=<?= $chapitre['id'] ?>">Modifier /</a>
                                <a href="delete.php?id=<?= $chapitre['id'] ?>">Supprimer</a>
                                <a href="commentaires.php?id=<?= $chapitre['id'] ?>">Commentaires</a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <a href="add.php" class="btn btn-primary my-4">Ajouter un article</a>
                </div>

            </div>
         </main>
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
   
  
<?php 
    }else{
    $_SESSION['erreur'] = ' Acces refusé. ';
    ?> <a href="index.php">Retour à l'ecran d'accueil</a>
    <?php
}
?>