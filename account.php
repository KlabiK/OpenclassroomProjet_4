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
    <div class="container">
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
            </div>
        </div>
    </div>
    <div class="container">
    <h1 class="my-4 text-center">Modification du mot de passe</h1>
        <div class="row">
               
                <div class="col my-4 text-center">
                    <form method="POST">
                        <div class="form-group">
                            <label for="password">Nouveau mot de passe</label><br/>
                            <input name="password" class="form-control">
                            </div>
                        <div class="form-group">
                            <label for="passwordConfirm" >Confirmez votre mot de passe</label><br/>
                            <input name="passwordConfirm" class="form-control">
                        </div>
                        <button class="btn btn-primary" type="submit">Envoyer</button>
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
            </ul>
         </div>     
      </div>
   </div>
</div>
        </body>
    </html>