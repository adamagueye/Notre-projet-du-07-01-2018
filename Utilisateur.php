<?php

namespace location\dao;
use \PDO;

class Utilisateur
{
    var $idutil;
    var $nomComplet;
    var $login;
    var $password;
    var $profil;
    var $etat;
    private $bdd;

    private function getConnexion(){
        try{
            $this->bdd = new PDO('mysql:host=;dbname=bdlocation;charset=utf8', 'root');
            $this->bdd ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        }
        catch(Exception $e){
            die('Erreur : ' . $e->getMessage());
        }
    }

    function addUtilisateur()
    {
        $this->getConnexion();
        // requete a executer
        $sql = "insert into Utilisateur
                        values(null, :nomComplet, :login, :etat, :password, :profil )";
        // preparation de la requete
        $req = $this->bdd->prepare($sql);
        //execution de la requete
        $data = $req->execute(
            array('nomComplet'=>$this->nomComplet,
                'login'=>$this->login,
                'etat'=>$this->etat,
                'password'=>$this->password,
                'profil'=>$this->profil
            ));
        return $data;
    }

    function getAllUtilisateur()
    {
        $this->getConnexion();
        // requete a executer
        $sql = "select * from Utilisateur";
        // preparation de la requete
        $donnees = $this->bdd->query($sql);
        return $donnees;
    }

    function login($login, $password)
    {
        $this->getConnexion();
        // requete a executer
        $sql = "select * from Utilisateur where login = :login and password = :password";
        // preparation de la requete
        $req = $this->bdd->prepare($sql);
        //execution de la requete
        $data = $req->execute(
            array(
                'login'=>$login,
                'password'=>$password
            ));
        return $data;
    }

    function changepassword($password)
    {
        $this->getConnexion();
        // requete a executer
        $sql = "UPDATE Utilisateur
        SET password = :password
        WHERE login = :login;";
        // preparation de la requete
        $req = $this->bdd->prepare($sql);
        //execution de la requete
        $data = $req->execute(
            array(
                'login'=>$this->login,
                'password'=>$password
            ));
        return $data;
    }

}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body>
      <div class="container">
           <h3>Enregistrer les Biens</h3>
    <div class="form-group">
  <label for="usr">NomComplet :   </label>
  <input type="text" class="form-control" id="usr">
</div>
<br>
<div class="form-group">
  <label for="usr">Login : </label>
  <input type="text" class="form-control" id="usr">
</div>
<br>
<div class="form-group">
  <label for="pwd">password : </label>
  <input type="password" class="form-control" id="usr">
</div>
<br>

</div>
<button type="button" class="btn btn-danger">Se Connecter</button>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>