<?php 
include('connexion.php');
$annee = $_POST["annee"];
$matricule = $_POST["matricule"];
$inscription = $_POST["inscription"];
unset($_SESSION['nin']); 
unset($_SESSION['attestation']); 
unset($_SESSION['num_re']); 
unset($_SESSION['matricule']); 
unset($_SESSION['inscription']); 
if (isset($_POST["bac"])){

	if (($annee !== "") && ($annee !== "autre") && ($annee !=="choisir") &&($annee !=="terminaliste") &&($annee !== "Master")      ){
		$_SESSION["an"] = $annee;
		
		$datelog = date('Y-m-d');
		$log = "INSERT INTO log_compta (login,date_heure,activite) VALUES ('$login','$date_heure','Demande de nouvel etudiant') ";
		mysqli_query($link,$log) or die('Erreur SQL !'.$log.'<br>'.mysqli_error());
		
		echo ("<script language='javascript'>location.href='new_recu.php'</script>");
	}
	if ($annee == "autre"){
	
		$datelog = date('Y-m-d');
		$log = "INSERT INTO log_compta (login,date_heure,activite) VALUES ('$login','$date_heure','Damande ancien bachelier') ";
		mysqli_query($link,$log) or die('Erreur SQL !'.$log.'<br>'.mysqli_error());
		
		echo ("<script language='javascript'>location.href='autre1.php'</script>");
	}
	if ($annee == "terminaliste"){
	
		$datelog = date('Y-m-d');
		$log = "INSERT INTO log_compta (login,date_heure,activite) VALUES ('$login','$date_heure','Damande de future bachelier') ";
		mysqli_query($link,$log) or die('Erreur SQL !'.$log.'<br>'.mysqli_error());
		
		echo ("<script language='javascript'>location.href='nouveaubac.php'</script>");
	}

	if ($annee == "Master"){
	
		$datelog = date('Y-m-d');
		$log = "INSERT INTO log_compta (login,date_heure,activite) VALUES ('$login','$date_heure,'Damande en master') ";
		mysqli_query($log) or die('Erreur SQL !'.$log.'<br>'.mysqli_error());
		
		echo ("<script language='javascript'>location.href='preins_master.php'</script>");
	}
}

?>
								<tr>
									<td valign="top" colspan="2">
									<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table7">
									<tr>
											<td width="18" valign="top">&nbsp;</td>
											<td width="767" valign="top" style="font-size: 8pt; color: #333333; font-family: Verdana,arial,sans-serif" colspan="7">
											
											
											
											<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table47">
												<tr>
													
													<td width="100%" align="center">
													<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
	
													
			<fieldset style="width: 400px">
				<legend><b>Nouvelle pr�inscription</b></legend>
					<form method="POST" action="enregistremcompta.php" name="choix"> 
						<table>
						<!-- Gestion de l'ann�e d'obtention du bac : -->
				<?
					if (($annee == "Choisir") && ($valider <> "")){
				?>
				<tr>
					<td colspan="2">
				<?
						echo "<font color='#FF0000'> Choisir l'ann�e d'obtention du bac:</font><BR>";
				?>
					</td>
				</tr>
				<? }?>
							<tr>
								<td>Ann�e d'Obtention du Bac</td>
								<td><select name="annee">
                                  <option value="choisir">Choisir</option>
								    <option value="2018">2018</option>
								     <option value="2017">2017</option>
				                     <option value="2016">2016</option>
                                     <option value="2015">2015</option>					
									<option value="2014">2014</option>
									<option value="2013">2013</option>
									<option value="2012">2012</option>
									<option value="2011">2011</option>
									<option value="2010">2010</option>
									<option value="autre">Autre ou Master</option>

									<option value="terminaliste">Terminaliste</option>
									
								</td>
							</tr>
							<tr>
							
								<td colspan="2" align="right"><input type="submit" name="bac"></td>
							</tr>
						</table>	
					</form>		
			</fieldset>	
			
</td>
												</tr>
											</table>
											
											
											</td>
											<td width="13">&nbsp;</td>
										</tr>
									</table>
									</td>
								</tr>
								
								
						
								