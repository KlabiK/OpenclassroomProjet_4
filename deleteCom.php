<?php

session_start();
require('config/connect.php');
if(isset($_GET['idCom']) AND !empty($_GET['idCom'])){
    $getId = $_GET['idCom'];
    $articleId = $_GET['id'];

    $req = $bdd->prepare("SELECT * FROM comments WHERE id=?");
    $req->execute(array($getId)); 
   
        $req = $bdd->prepare('DELETE FROM comments WHERE id = ?');
        $req->execute(array($getId));
        header("Location :article.php?id=<?= $id ?>");
        echo " Le commentaire à bien été supprimé";


}else{
echo "L'indentifiant n'a pas été récupéré";
}


?>