<?php








?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Se Connecter</title>
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
        <h1 class="text-center my-4">Admin</h1>
         <form action="admin.php" method="POST" class=" my-3">
            <div class="form-group row-4">
                <label>Veuillez saisir vos identifiants :</label>
                 <input class="form-control" type="text" name="login">
             </div>
            <div class="form-group row-4">
                <label>Veuillez saisir votre mot de passe :</label>
                 <input class="form-control" type="password" name="mdp">
            </div>
            <input class="btn btn-primary" type="submit" >
         </form>
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