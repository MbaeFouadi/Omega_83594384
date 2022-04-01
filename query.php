<?php
include('connexion.php');

echo "Helleo Word";


$req = "SELECT etudiant.NIN AS NIN, etudiant.mat_etud AS mat, etudiant.nom AS nom, etudiant.prenom AS prenom, 
etudiant.date_naiss AS date_nais, etudiant.lieu_naiss AS lieu, etudiant.sexe AS sexe, etudiant.Tel_Etud AS Tel, 
faculte.code_facult AS codeF, inscription.code_depart AS codeD, inscription.code_niv AS codeN 
FROM etudiant, inscription, faculte, departement 
WHERE inscription.Annee = '2019-2020' AND inscription.mat_etud = etudiant.mat_etud AND inscription.code_depart = departement.code_depart AND departement.code_facult = faculte.code_facult 
ORDER BY etudiant.nom, etudiant.prenom ";

echo $req;
$reque = mysqli_query($link,$req);

while ($data = mysqli_fetch_array($reque)){

    $NIN = $data['NIN'];
    $mat_etud = $data['mat'];
    $nom = addslashes($data['nom']);
    $prenom = addslashes($data['prenom']);
    $date_naiss = $data['date_nais'];
    $lieu_naiss = addslashes($data['lieu']);
    $sexe = $data['sexe'];
    $Tel_Etud = $data['Tel'];
    $code_facult = $data['codeF'];
    $code_depart = $data['codeD'];
    $code_niv = $data['codeN'];

    $requete = "INSERT INTO etu (NIN, mat_etud, nom, prenom, date_naiss, lieu_naiss, sexe, Tel_Etud, code_facult, code_depart, code_niv, connexion) 
    value ('$NIN','$mat_etud','$nom','$prenom','$date_naiss','$lieu_naiss','$sexe', '$Tel_Etud', '$code_facult', ' $code_depart', '$code_niv', 0)";
    mysqli_query($link,$requete);
    
}
echo "Bravo";
/*while ($data = mysqli_fetch_object($reque)){
    
        $NIN = $data->NIN;
        $mat_etud = $data->mat;
        $nom = addslashes($data->nom;
        $prenom = addslashes($data->prenom);
        $date_naiss = $data->date_nais;
        $lieu_naiss = addslashes($data->lieu);
        $sexe = $data->sexe;
        $Tel_Etud = $data->Tel;
        $code_facult = $data->codeF;
        $code_depart = $data->codeD;
        $code_niv = $data->codeN;

        echo "Helleo Word";
}  */
       // $requete = "INSERT INTO etu (NIN, mat_etud, nom, prenom, date_naiss, lieu_naiss, sexe, Tel_Etud, code_facult, code_depart, code_niv, connexion) 
       // value ('$NIN','$mat_etud','$nom','$prenom','$date_naiss','$lieu_naiss','$sexe', '$Tel_Etud', '$code_facult', ' $code_depart', '$code_niv', 0)";

//mysqli_query($link,$requete);

/*$req=mysqli_affected_rows($link);
if($req!=0){
    echo "Enregistrement effectué avec Succés!";
    
   // header("Location:attribu_cour.php");
}

mysqli_close($link);*/

?>

				
                              
                            
 