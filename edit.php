<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
  }
if($_POST){//verification des données à envoyer
    if(isset($_POST['id']) && !empty($_POST['id'])
    && isset($_POST['title']) && !empty($_POST['title'])
    && isset($_POST['content']) && !empty($_POST['content'])
    && isset($_POST['synopsis']) && !empty($_POST['synopsis'])){
        require_once ('config/connect.php');

        //nettoyage des données à envoyer
        $id = strip_tags($_POST['id']);
        $title = strip_tags($_POST['title']);
        $content = strip_tags($_POST['content']);
        $synopsis = strip_tags($_POST['synopsis']);

        $req = $bdd->prepare('UPDATE articles SET title=:title ,content=:content, synopsis=:synopsis WHERE id=:id');
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->bindValue(':title', $title, PDO::PARAM_STR);
        $req->bindValue(':content', $content, PDO::PARAM_STR);
        $req->bindValue(':synopsis', $synopsis, PDO::PARAM_STR);
        $req->execute();
        $_SESSION['message'] = "chapitre modifié avec succés";
        $req->closeCursor();
    }else{
        $_SESSION['erreur'] = "Veuillez remplir tous les champs";
    }
}//verifications et chargement des données
if(isset($_GET['id']) && !empty($_GET['id'])){
    require_once('config/connect.php');
    $id = strip_tags($_GET['id']);
    $req = $bdd->prepare('SELECT id, title, content,synopsis FROM articles WHERE id=?');
    $req->execute(array($id));
    $chapitre = $req->fetch();
    if(!$chapitre){
        $_SESSION['erreur'] == "ID invalide";
    
    } 
} else{
    $_SESSION['erreur'] = "URL invalide";
 
}


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
    <div class="container mt-2">
        <div class="row">
            <div class="col-12">
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
                <h1 class="my-4 text-center">Modifications du Chapitre</h1>
                <form method="POST">
                    <div class="form-group my-4 text-center">
                        <label for="title" >Titre</label>
                        <input type="text" id="title" name="title" class="form-control" value="<?= $chapitre['title']?>">
                        
                    </div>
                    <div class="form-group my-4 text-center">
                        <textarea type="text" id="content" name="content" class="form-control"  >
                        <?= $chapitre['content']?>
                        </textarea>
                    </div>
                    <div class="form-group my-4 text-center">
                    <label for="title">Synopsis (255 caractères max)</label>
                        <input type="text" id="synopsis" name="synopsis" class="form-control" value=" <?= $chapitre['synopsis']?>" >
                       
                     
                    </div>
                    <input type="hidden" name="id" value="<?= $chapitre['id']?>">
                     <button class="btn btn-primary mb-4">Enregistrer</button>
                </form>
                <a  class="btn btn-primary mb-4" href="login.php">Chapitres</a>
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
<script src="https://cdn.tiny.cloud/1/py0pjsyd3dnwtiz4cmlg58l6awx363bocz2lblfyzwcu7kv6/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>tinymce.init({selector:'textarea', height: 400});</script>

        </body>
    </html>