<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
  }
require_once('config/functions.php');
if($_POST){
    if(isset($_POST['content']) && !empty($_POST['content']) && isset($_POST['title']) && !empty($_POST['title'])&& $_POST['synopsis'] && !empty($_POST['synopsis'])){
        require_once('config/connect.php');
        $content = strip_tags($_POST['content']);
        $title = strip_tags($_POST['title']);
        $synopsis = strip_tags($_POST['synopsis']);
        
        addArticle($title, $content, $synopsis);
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Interface Admin</title>
        <link href="style.css" rel="stylesheet">
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
        
    </div>
    <div class="my-2">
<?php
                 if(!empty($_SESSION['message'])){
                    echo '<div class="alert alert-success" role="alert">'. $_SESSION['message'].'</div';
                    $_SESSION['message'] = "";
                }
                ?>
    </div>
    <div class="row">
    <form method="POST" class="col-12">
  
                    <div class="form-group">
                        <input type="text" id="title" name="title" class="form-control text-center mt-4" placeholder="Nom du chapitre" required>   
                      </div>
                  <div class="form-group">
            <textarea id="content" name="content" required>
          </textarea>
          <script>
            tinymce.init({
              selector : "content",
              theme : "advanced",
              plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
              toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
              toolbar_mode: 'floating',
              tinycomments_mode: 'embedded',
              tinycomments_author: 'Author name',
          });
          </script>
          </div>
            <h2>Synopsis</h2>
            <textarea id="synopsis" name="synopsis" required>
            </textarea>
            <button class="btn btn-primary my-4" type="submit">Enregistrer</button>
            <a  class="btn btn-primary my-4 " href="login.php">Chapitres</a>
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
    <script src="https://cdn.tiny.cloud/1/py0pjsyd3dnwtiz4cmlg58l6awx363bocz2lblfyzwcu7kv6/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>tinymce.init({selector:'textarea'});</script>
</html>