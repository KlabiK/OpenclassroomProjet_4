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

    if(!empty($_POST))
    {
        extract($_POST);
        $errors = array();

        $author = strip_tags($author);
        $comment = strip_tags($comment);

        if(empty($author))
        {
            array_push($errors, 'Entrez un pseudo');
        }
        if(empty($comment))
        {
            array_push($errors, 'Entrez un commentaire');
        }
        if(count($errors) == 0)
        {
            $artName = $_GET['id'];
            $comment = addComment($id, $author, $comment);
            $_SESSION['message'] = 'Votre commentaire à été publié';
            unset($author);
            unset($comment);
            header("Location: article.php?id=<?= $artName ?>");
        }
    }else{

    }
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

            <form class="my-4" action="article.php?id=<?= $article->id ?>" method="POST">
                <div class="form-group">
                    <label for="author">Pseudo :</label><br/>
                    <input type="text" name="author" id="author" value="<?php if(isset($author)) echo $author ?>"/>
                </div>
                <div class="form-group">
                    <label for="comment">Commentaire :</label><br/>
                    <textarea name="comment" id="comment" cols="30" rows="8"></textarea>
                </div>
                <button class="btn btn-primary mb-4" type="submit">Envoyer</button>
            </form>
            <h2>Commentaires :</h2>
            <?php
            foreach($comments as $com): ?>
            <h3><?= $com->author ?></h3>
            <time><?= $com->date ?></time>
            <p><?= $com->comment ?></p>
            <a class="btn btn-danger mb-4" href="signaler.php?id=<?= $com->id ?>">Signaler</a>
            <?php endforeach; ?>
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