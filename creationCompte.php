<?php 
session_start();
if(!isset($_SESSION['login'])){
    header('Location: index.php');
    exit();
}
elseif(isset($_SESSION['login']) and $_SESSION['cat']=="1"){


include('connexion.php');

$r="SELECT  date_fin FROM date_fin order by id_date DESC";
$req = mysqli_query($link,$r);
$dat=mysqli_fetch_array($req);

$s=1;
$message = "";
$query= mysqli_query($link,"SELECT * FROM ile");
$req=mysqli_query($link,"SELECT * from categorie");
if(isset($_POST['valider'])){ 
		$valider =  $_POST['valider']; 
		} 
		else { 
		$valider = null; 
	}
	if(isset($_POST['nom'])){ 
		$nom=  $_POST['nom']; 
		} 
		else { 
		$nom = null; 
	}
	if(isset($_POST['prenom'])){ 
		$prenom=  $_POST['prenom']; 
		} 
		else { 
		$prenom = null; 
	}
if(isset($_POST['login'])){ 
		$login =  $_POST['login']; 
		} 
		else { 
		$login = null; 
	}	
if(isset($_POST['password'])){ 
		$password =  $_POST['password']; 
		} 
		else { 
		$password = null; 
	}
if(isset($_POST['password2'])){ 
		$password2 =  $_POST['password2']; 
		} 
		else { 
		$password2 = null; 
	}
if(isset($_POST['libelle'])){ 
		$libelle =  $_POST['libelle']; 
		} 
		else { 
		$libelle = null; 
	}
	if(isset($_POST['ile'])){ 
		$ile =  $_POST['ile']; 
		} 
		else { 
		$ile = null; 
	}	
if(isset($valider)){
		if (($login <> "") && ($password <> "") && ($libelle <> "") && ($password2 <> "") )
		{

		$sqll=mysqli_query($link,"SELECT login from users where login='".$login."'");
		if(mysqli_num_rows($sqll)==0){
			if($password == $password2){
				$pass = MD5($password);
				$sql = "INSERT  INTO users(nom, prenom, login, password, id_cat,statut,id_ile) VALUES('$nom','$prenom','$login','$pass',$libelle,'1','$ile')";
				mysqli_query($link,$sql);
				$message ="L'enregistrement a été effectué avec succés";
				header('location:listeUtilisa.php'); 
	}else{ $s=0;
						$message ="Mauvaise confirmation! ";		
				}
				
		}else{
			$s=0;
			$message="Ce login existe déjà! ";

		}
		
		}
			
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome - Université des Comores</title>
    <link rel="shortcut icon" href="./assets/img/udc.png">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="./node_modules/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/css.css">
</head>
<body>   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome - Université des Comores</title>
    <link rel="shortcut icon" href="./assets/img/udc.png">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="./node_modules/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/css.css">
</head>
<body>   
    <section class="main-wrapper">
        <aside class="left-aside">
            <div class="fontLogo"> 
                <div class="img-rd">
                    <img src="./assets/img/udc.png" alt="profile image">
                </div>
                <h6 class="m-3 text-center"><strong class="titre"> Université des Comores</strong></h6>
                <hr>
            </div>
            <nav class="nav-aside">
            
                <?php
                    switch($_SESSION['cat']){
                    case 1 :include('interfaces/superAdminRubrique.php'); break;
                    case 2 : include('interfaces/administrationRubrique.php');break;
                    case 3:include('interfaces/agtScolariteRubrique.php'); break;
                    case 4: include('interfaces/scolariteRubrique.php'); break;
                    case 5:include('interfaces/desRubrique.php'); break;
                    case 6: include('interfaces/gestionnaireRubrique.php'); break;
                    case 7:include('interfaces/agentComptaRubrique.php'); break;
                    
                    }
                ?>
                 <li class="bord"><a href="profil.php"><i class="icon-user"></i> &nbsp; <span class="nav-item-text">Changer mon mot de passe</span></a></li>
                        
                        <li><a href="deconnexion.php"><i class="icon-logout"></i> &nbsp; <span class="nav-item-text">Déconnexion</span></a></li>
                     
                 </ul>       
            </nav>
        </aside>
        <main class="main-content">
		<h4 align="right"><strong><?php  echo ucwords($_SESSION['prenom']." ".$_SESSION['nom'])?> </strong></h4>
		<h5 align="right" style="color:#00b185;"> <strong><?php echo  $_SESSION['libelle']; ?></strong></h5>
		
		<h5 align="left" style="margin-top:-70px;margin-bottom:120px;margin-left:-50px;"> <?php echo (date('d-m-Y'));?></h5>
		<h5 align="left" style="margin-top:-100px;margin-bottom:130px;margin-left:-50px;color:#00b185;"> Fin de préinscription : <?php echo $dat['date_fin'];?></h5>
				</div>
			<div class="text-center mb-5">
				</div>
							<h1 align="center" style="margin-bottom:20px"> Ajouter un utilisateur </h1>
							<?php 
							if($s==1){?>
								<h5 align="center" style="color:green"><?php echo $message;?></h5>
							<?php }else{?>
								<h5 align="center" style="color:red"><?php echo $message;?></h5>
							<?php }
							?>
						
							<form action="creationCompte.php" method="POST">
									
										<div class="form-group">
													
											<select type="text" class="form-control" name="libelle" id="inputlib" placeholder="Categorie">
											        <?php 
                              while($data=mysqli_fetch_array($req)){?>
																<option value="<?php echo $data['id_cat'];?>"><?php echo utf8_encode($data['libelle']);?></option>
																 
															<?php 
															}
															 ?>
										
											
										
										  </select>
										
										
									
									  </div>
									  <div class="form-group">
													
													<select type="text" class="form-control" name="ile" id="inputlib" placeholder="ile">
															<?php 
									  while($data=mysqli_fetch_array($query)){?>
																		<option value="<?php echo $data['id_ile'];?>"><?php echo $data['nom_ile'];?></option>
																		 
																	<?php 
																	}
																	 ?>
												
													
												
												  </select>
												
												
											
											  </div>
									<div class="form-group">
											
											<input type="text" class="form-control" name="nom" id="inputnom" placeholder="Nom" required>
										</div> 
									<div class="form-group">
										
										<input type="text" class="form-control" name="prenom" id="inputprenom" placeholder="Prenom" required>
									</div>
									<div class="form-group ">
									
										<input type="text" class="form-control" name="login" id="inputusern" placeholder="Login" required>
									</div>
									<div class="form-group">
										
										<input type="password" class="form-control" name="password" id="inputpassword" placeholder=" Mot de passe" required>
									</div>
									
										<div class="form-group">
										
											<input type="password" class="form-control"  name="password2"  id="inputpassword2" placeholder="Ressaisir le mot de passe" required>
										</div>
										
									<div class="text-center">
									<button type="submit" name="valider" class="btn btn-primary">Enregistrer</button>
									</div>
								</form>
		<script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/app.js"></script>
   
</body>
</html>
<?php
}else{ ?>
    <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, vous n'avez pas les privil&eacute;ges d'acc&eacute;der &agrave; cette page!<br> Cliquez<a href="userInterface.php">  ici  </a> pour retourner &agrave; la page d accueil ! </h3>
<?php }
?>

