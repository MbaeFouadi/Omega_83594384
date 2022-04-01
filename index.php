<?php
session_start();
include('connexion.php');

$m="";
if(isset($_POST['submit'])){
if($_POST['login'] !==''){ 

if( $_POST['password'] !== '')
{
    
    $username = mysqli_real_escape_string($link,htmlspecialchars($_POST['login'])); 
    $pass = mysqli_real_escape_string($link,htmlspecialchars($_POST['password']));
    if($username !== "" && $password !== "")
    {
        $password = MD5($pass);
        //$password = $pass;
        $requete = "SELECT count(*) FROM users where 
              login= '".$username."' and password = '".$password."'  ";
        $exec_requete = mysqli_query($link,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
       
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
           $_SESSION['login'] = $login;
           $req=mysqli_query($link,"SELECT id_cat,nom,prenom,login,password,statut,id_ile FROM users where  login= '".$username."' and password = '".$password."' ");
          
           while($data=mysqli_fetch_array($req)){

            $_SESSION['cat']=$data['id_cat'];
            $_SESSION['nom']=$data['nom'];
            $_SESSION['prenom']=$data['prenom'];
            $_SESSION['login']=$data['login'];
            $_SESSION['password']=$data['password'];
            $_SESSION['statut']=$data['statut'];
            $_SESSION['id_ile']=$data['id_ile'];
           

            
           }
           if($_SESSION['statut']==1){

           $requ=mysqli_query($link,"SELECT *  FROM categorie where  id_cat= '".$_SESSION['cat']."'  ");
           while($data=mysqli_fetch_array($requ)){
            $_SESSION['libelle']=$data['libelle'];
           }
            

           $date=date("Y-m-d
           H:i:s");
           if($_SESSION['cat']=="1"){
            $log=mysqli_query($link,"INSERT INTO log_super (login,date_heure,activite) VALUES ('".$_SESSION['login']."','$date','Connexion')");
            }if($_SESSION['cat']=="2"){
                $log=mysqli_query($link,"INSERT INTO log_admin_c (login,date_heure,activite) VALUES ('".$_SESSION['login']."','$date','Connexion')");
            }if($_SESSION['cat']=="3"){
                $log=mysqli_query($link,"INSERT INTO log_agentscol (login,date_heure,activite) VALUES ('".$_SESSION['login']."','$date','Connexion')");
            }if($_SESSION['cat']=="4"){
                $log=mysqli_query($link,"INSERT INTO log_scola (login,date_heure,activite) VALUES ('".$_SESSION['login']."','$date','Connexion')");
            }if($_SESSION['cat']=="5"){
                $log=mysqli_query($link,"INSERT INTO log_des (login,date_heure,activite) VALUES ('".$_SESSION['login']."','$date','Connexion')");
            }if($_SESSION['cat']=="6"){
                $log=mysqli_query($link,"INSERT INTO log_gestion (login,date_heure,activite) VALUES ('".$_SESSION['login']."','$date','Connexion')");
            }if($_SESSION['cat']=="7"){
                $log=mysqli_query($link,"INSERT INTO log_agentcompta (login,date_heure,activite) VALUES ('".$_SESSION['login']."','$date','Connexion')");
            }if($_SESSION['cat']=="8"){
                $log=mysqli_query($link,"INSERT INTO log_admin (login,date_heure,activite) VALUES ('".$_SESSION['login']."','$date','Connexion')");
            }

          mysqli_query($link,"UPDATE users SET connecte=1 where login='".$_SESSION['login']."' and password='".$_SESSION['password']."'");
    
            header('Location: userInterface.php');
         
          
        } 
        else{
            unset($_SESSION['cat']);
            unset($_SESSION['nom']);
            unset($_SESSION['prenom']);
            unset($_SESSION['login']);
            unset($_SESSION['password']);
            unset($_SESSION['statut']);
            $m="Désolé, vous n'avez plus les priviléges d'accéder à l'application";
        }
        }
        else{
            $m="les identifiants ne sont pas correctes";
        }

        
    }
}
    
else{
    $m="Votre mot de passe ne peut pas être nul";
}
}
 else{

    $m="Votre login ne peut pas être nul";
    
 }

}
mysqli_close($link); // fermer la connexion


?>





<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Connexion - Université des Comores</title>
<link rel="shortcut icon" href="./assets/img/udc.png">
<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css">
<link rel="stylesheet" href="./node_modules/simple-line-icons/css/simple-line-icons.css">
<link rel="stylesheet" href="./assets/css/main.css">
</head>
<body>
    
    <section class="main-section">
        <div class="front-bg"></div>
            <div class="connect-box">
                
                <h1 class="text-center mt-2 mb-5">OMEGA</h1>
                <div class="img-rd">
                    <img src="./assets/img/udc.png" alt="profile image">
                </div>
                <h5 class="cb-name">Université des Comores</h5>
                <h5 align="center" style="color:red;margin-bottom:10px; "> <?php echo $m ?></h5>
                <form action="index.php" method="POST">
                    

                    <label for="inputUsername" class="sr-only">Login</label>
                    <input  type="text" id="inputUsername" placeholder="Login" name="login" required>
                    
                    <div class="g-input">
                        <label for="inputPass" class="sr-only">Mot de passe</label>
                        <input  type="password" id="inputPass" placeholder="Mot de passe" name="password" required>
                        <button  class="submit-arrow" name="submit" type="submit"><i class="icon-arrow-right-circle"></i></button>
                    </div>
                </form>
            </div>
    </section>

    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/app.js"></script>

   
</body>
</html>
<?php        



?>