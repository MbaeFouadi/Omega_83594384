<?php 
   session_start();
   if(isset($_SESSION['login']) and ($_SESSION['cat']=="1" or $_SESSION['cat']=="6" or $_SESSION['cat']=="7") or ($_SESSION['cat']=="3")){
    include("connexion.php");
    $date=date('d/m/Y');

    $ras=mysqli_query($link,"SELECT * FROM date_fin WHERE type=2 order by id_date DESC");
    $xD=mysqli_fetch_array($ras); 



  //  if(isset($_SESSION['nin'])){
		//$nin= $_SESSION['nin'];
	 //  }
	//$num_recu= $_SESSION["num_recu"];
	
   //header('location: recu.php');

// echo"l etudiant ".$_SESSION['bachelier']." existe son nin est".$_SESSION['nin'];

/* if(isset($_POST['submit'])){
   
    if(isset($_POST['pers'])){
        $per=$_POST['p'];
        $pers=$_POST['pers'];
        $_SESSION['periode']=$pers;
            $mat=$_POST['mat'];
            $nin=$_POST['nin'];
        }

    if($_SESSION['periode']==2){ 
    $mat=$_POST['mat'];
    $nin=$_POST['nin'];
    $tel=$_POST['tel'];
    $r=mysqli_query($link,"SELECT * FROM etudiant where mat_etud='$mat'");
    $data=mysqli_fetch_array($r);
    
   /*  if(isset($per)){}else{
        
    } */
  /*   if(mysqli_num_rows($r)!=0){
        
        $req=mysqli_query($link,"SELECT * FROM admission where matricule='$mat'");
        if(mysqli_num_rows($req)!=0){
           
            $resultat="Admis";
            $rs=mysqli_query($link,"SELECT * FROM inscription where mat_etud='$mat' order by inscription.annee DESC");
            $datas=mysqli_fetch_array($rs);
            $niveau=$datas['code_niv'];
            $code_dep=$datas['code_depart'];
            switch ($niveau) {
                case 'N1':
                    $code="N2";
                    break;
                case 'N2':
                    $code="N3";
                    break;
                case 'N3':
                    $code="N4";
                    break; 
                case 'N4':
                    $code="N5";
                    break; 
                case 'P1':
                    $code="P2";
                    break;
                case 'P2':
                    $code="P3";
                    break;
                default:
                    $m="le niveau suivant n'est pas disponible";
                    break;
            }
            $rst=mysqli_query($link,"SELECT * FROM niveau where code_niv='$code' ");
            $dataS=mysqli_fetch_array($rst);
            $niv=$dataS['intit_niv'];

            $rsd=mysqli_query($link,"SELECT * FROM departement where code_depart='$code_dep' ");
            $dat=mysqli_fetch_array($rsd);
            $depart=$dat['design_depart'];
            $code_fac=$dat['code_facult'];
            $concours=$dat['concours'];

            $rsf=mysqli_query($link,"SELECT * FROM faculte where code_facult='$code_fac' ");
            $daf=mysqli_fetch_array($rsf);
            $facult=$daf['design_facult'];
        } else{
            $resultat="Ajourné";

            $rs=mysqli_query($link,"SELECT * FROM inscription where mat_etud='$mat' order by inscription.annee DESC");
            $datas=mysqli_fetch_array($rs);
            $niveau=$datas['code_niv'];
            $code_dep=$datas['code_depart'];
          
            $rst=mysqli_query($link,"SELECT * FROM niveau where code_niv='$niveau' ");
            $dataS=mysqli_fetch_array($rst);
            $niv=$dataS['intit_niv'];

            $rsd=mysqli_query($link,"SELECT * FROM departement where code_depart='$code_dep' ");
            $dat=mysqli_fetch_array($rsd);
            $depart=$dat['design_depart'];
            $code_fac=$dat['code_facult'];
            $concours=$dat['concours'];

            $rsf=mysqli_query($link,"SELECT * FROM faculte where code_facult='$code_fac' ");
            $daf=mysqli_fetch_array($rsf);
            $facult=$daf['design_facult'];
        }
        
        
    }else{
        $m='Etudiant non inscrit';
    }

    if($niveau=="N4" || $niveau=="N5"){
        $udc="60.000 FC";
        $lettre="soixante mille francs";
    }
    if( $concours==1){
        if($niveau=="N1" || $niveau=="N2" || $niveau=="P1" || $niveau=="P2"){
            $udc="45.000 FC";
            $lettre="quarante cinq mille francs";
        } elseif($niveau=="N3" || $niveau=="P3" ){
            $udc="55.000 FC";
            $lettre="cinquante cinq mille francs";
        } 
    }else{
        if($niveau=="N1" || $niveau=="N2" || $niveau=="P1" || $niveau=="P2"){
            $udc="40.000 FC";
            $lettre="quarante  mille francs";
        } elseif($niveau=="N3" || $niveau=="P3" ){
            $udc="50.000 FC";
            $lettre="cinquante mille francs";
        }
    
    }
    if($resultat=="Admis"){
        $n=$code;
    } elseif($resultat=="Ajourné"){
        $n=$niveau;
    }
    $rt=mysqli_query($link,"SELECT * FROM post_inscription where nin='$nin'");
    //$tadata=mysqli_fetch_array($r);
    if(mysqli_num_rows($rt)==0){

        mysqli_query($link,"INSERT INTO post_inscription (nin,nom,prenom,date_naiss,lieu_naiss,statut,traitant_autorisation,code_depart,code_niv,date_delivrance_auto,code_facult,tel_mobile,droit,matricule)
        values ('$nin','".$data['nom']."','".$data['prenom']."','".$data['date_naiss']."','".$data['lieu_naiss']."',1,'".$_SESSION['login']."','".$data['code_depart']."','$n','$date','$code_fac','$tel','$udc','$mat')");
    }
    
  $k="ok bar";  
  $p= mysqli_query($link,"SELECT * FROM post_inscription where nin='$nin'");
  $rer=mysqli_fetch_array($p);
}

if($_SESSION['periode']==1){ 
    $k="ok";
    $nin=$_POST['nin'];
    $niveau=$_POST['niveau'];
    if(isset($_POST['pers'])){
       // $per=$_POST['per'];
       // $per=$_POST['per'];
        //$_SESSION['periode']=$per;
            $mat=$_POST['mat'];
            $nin=$_POST['nin'];
        }

    $r=mysqli_query($link,"SELECT * FROM candidats where nin='$nin'");
    $data=mysqli_fetch_array($r);

    $rsd=mysqli_query($link,"SELECT * FROM departement where code_depart='".$data['retenu']."' ");
    $dat=mysqli_fetch_array($rsd);
    $depart=$dat['design_depart'];
    $code_fac=$dat['code_facult'];
    $concours=$dat['concours'];

    $rsf=mysqli_query($link,"SELECT * FROM faculte where code_facult='$code_fac' ");
    $daf=mysqli_fetch_array($rsf);
    $facult=$daf['design_facult'];

    if($niveau=="N4" || $niveau=="N5"){
        $udc="60.000 FC";
        $lettre="soixante mille francs";
    }
    if( $concours==1){
        if($niveau=="l1" || $niveau=="l2"){
            $udc="45.000 FC";
            $lettre="quarante cinq mille francs";
        } elseif($niveau=="l3"  ){
            $udc="55.000 FC";
            $lettre="cinquante cinq mille francs";
        } 
    }else{
        if($niveau=="l1" || $niveau=="l2" ){
            $udc="40.000 FC";
            $lettre="quarante  mille francs";
        } elseif($niveau=="l3" ){
            $udc="50.000 FC";
            $lettre="cinquante mille francs";
        }
    
    }
    if($niveau=="l1"){
        if($concours==1 and $code_facult!="EMSP"){
            $niv="1ère Année" ;  
            $n="P1" ;     
        } 
        if($concours==0 || $code_facult=="EMSP"){
            $niv="Licence1" ; 
            $n="N1" ;        
        } 
    } if($niveau=="l2"){
        if($concours==1 and $code_facult!="EMSP"){
            $niv="2ème Année" ; 
            $n="P2" ;        
        } 
        if($concours==0 || $code_facult=="EMSP"){
            $niv="Licence2" ;  
            $n="N2" ;       
        } 
    }if($niveau=="l3"){
        if($concours==1 and $code_facult!="EMSP"){
            $niv="3ème Année" ;   
            $n="P3" ;      
        } 
        if($concours==0 || $code_facult=="EMSP"){
            $niv="Licence3" ; 
            $n="N3" ;        
        } 
    }
    if($niveau=="N4"){
        
            $niv="Master1" ;        
            $n="N4" ;
    }
    if($niveau=="N5"){
        
            $niv="Master2" ;  
            $n="N5" ;      
        
    }
    $rt=mysqli_query($link,"SELECT * FROM post_inscription where nin='$nin'");
    $tadata=mysqli_fetch_array($r);
    if(mysqli_num_rows($rt)==0){
    mysqli_query($link,"INSERT INTO post_inscription (nin,nom,prenom,date_naiss,lieu_naiss,statut,traitant_autorisation,code_depart,code_niv,date_delivrance_auto,code_facult,tel_mobile,droit,matricule)
    values ('".$data['nin']."','".$data['nom']."','".$data['prenom']."','".$data['date_naiss']."','".$data['lieu_naiss']."',1,'".$_SESSION['login']."','".$data['retenu']."','$n','$date','$code_fac','".$data['tel_mobile']."','$udc','$mat')");
     }
$p= mysqli_query($link,"SELECT * FROM post_inscription where nin='".$data['nin']."'");
    $rer=mysqli_fetch_array($p);
 
}

} */
if(isset($_POST['submit'])){
   
    if(isset($_POST['pers'])){
        $per=$_POST['p'];
        $pers=$_POST['pers'];
        //$_SESSION['periode']=$pers;
           /* $mat=$_POST['mat'];
            $nin=$_POST['nin'];
            $annee=$_POST['annee'];*/
            //$annee=$_POST['annee'];
        /*$query=mysqli_query($link,"SELECT num_auto FROM post_inscription WHERE Annee ='".$_SESSION['annee']."' ORDER BY num_auto DESC ");
        $donnees=mysqli_fetch_array($query);
        $num=$donnees['num_auto']+1;*/
        }
        
        

    if($_SESSION['periode']==2){ 
    //$mat=$_POST['mat'];
    //$nin=$_POST['nin'];
    $tel=$_POST['tel'];
 //$annee=$_POST['annee'];
 $red=mysqli_query($link,"SELECT * FROM candidats where nin='".$_SESSION['nin']."'");
 $blue=mysqli_fetch_array($red);
 if(mysqli_num_rows($red)!=0){

//  if($_SESSION['type']==2 || $_SESSION['type']==3 || $_SESSION['type']==4 || $_SESSION['type']==5){
    $niveau=$_POST['niveau'];
    //$annee=$_POST['annee'];
    //$_SESSION['annee']=$annee;
    //$annee=$_POST['annee'];
    //$annee=$_SESSION['annee'];
    /*if(isset($_POST['pers'])){
       // $per=$_POST['per'];
       // $per=$_POST['per'];
        //$_SESSION['periode']=$per;
            $mat=$_POST['mat'];
            $nin=$_POST['nin'];
    }*/
    //$annee=$_POST['annee'];
        
        
        

    $r=mysqli_query($link,"SELECT * FROM candidats where nin='".$_SESSION['nin']."'");
    $data=mysqli_fetch_array($r);
    

    $rsd=mysqli_query($link,"SELECT * FROM departement where code_depart='".$data['retenu']."' ");
    $dat=mysqli_fetch_array($rsd);
    $depart=$dat['design_depart'];
    $code_facult=$dat['code_facult'];
    $concours=$dat['concours'];

    $rsf=mysqli_query($link,"SELECT * FROM faculte where code_facult='$code_facult' ");
    $daf=mysqli_fetch_array($rsf);
    $facult=$daf['design_facult'];

    if($niveau=="N4" || $niveau=="N5"){
        $udc="60 000 KMF";
        $lettre="Soixante mille Francs Comoriens";
    }
    if( $concours==1){
        if($niveau=="l1" || $niveau=="l2"){
            $udc="45 000 KMF";
            $lettre="Quarante cinq mille Francs Comoriens";
        } elseif($niveau=="l3"){
            $udc="55 000 KMF";
            $lettre="Cinquante cinq mille Francs Comoriens";
        } 
    }else{
        if($niveau=="l1" || $niveau=="l2" ){
            $udc="40 000 KMF";
            $lettre="Quarante mille Francs Comoriens";
        } elseif($niveau=="l3"){
            $udc="50 000 KMF";
            $lettre="Cinquante mille Francs Comoriens";
        }
    
    }
    if($niveau=="l1"){
        if($concours==1 and $code_facult!="EMSP"){
            $niv="1ère Année" ;  
            $n="P1" ;     
        } 
        if($concours==0 || $code_facult=="EMSP"){
            $niv="Licence 1" ; 
            $n="N1" ;        
        } 
    } if($niveau=="l2"){
        if($concours==1 and $code_facult!="EMSP"){
            $niv="2ème Année" ; 
            $n="P2" ;        
        } 
        if($concours==0 || $code_facult=="EMSP"){
            $niv="Licence 2" ;  
            $n="N2" ;       
        } 
    }if($niveau=="l3"){
        if($concours==1 and $code_facult!="EMSP"){
            $niv="3ème Année" ;   
            $n="P3" ;      
        } 
        if($concours==0 || $code_facult=="EMSP"){
            $niv="Licence 3" ; 
            $n="N3" ;        
        } 
    }
    if($niveau=="N4"){
        
            $niv="Master 1" ;        
            $n="N4" ;
    }
    if($niveau=="N5"){
        
            $niv="Master 2" ;  
            $n="N5" ;      
        
    }
    $rt=mysqli_query($link,"SELECT * FROM post_inscription where nin='".$_SESSION['nin']."' && Annee ='".$_SESSION['annee']."' ");
        
    $tadata=mysqli_fetch_array($rt);
    if(mysqli_num_rows($rt)==0){
        $nn = addslashes($data['nom']);
        $p = addslashes($data['prenom']);
        $l = addslashes($data['lieu_naiss']);

        $matr=mysqli_query($link,"SELECT * FROM inscription WHERE NIN='".$_SESSION['nin']."' ");
        $rema=mysqli_fetch_array($matr);
        if(mysqli_num_rows($matr)>0){
           // $matricule=$matr['mat_etud'];

            $requete=mysqli_query($link,"SELECT Annee FROM post_inscription WHERE Annee ='".$_SESSION['annee']."'");
            $re=mysqli_fetch_array($requete);
    
            if(mysqli_num_rows($requete)==0){
                mysqli_query($link,"INSERT INTO post_inscription (num_auto,nin,nom,prenom,date_naiss,lieu_naiss,statut,traitant_fiche,code_depart,code_niv,date_delivrance_fiche,code_facult,tel_mobile,droit,droit_lettre,matricule,Annee)
                values ('1','".$data['nin']."','".$nn."','".$p."','".$data['date_naiss']."','".$l."',2,'".$_SESSION['login']."','".$data['retenu']."','$n','$date','$code_facult','".$data['tel_mobile']."','$udc','$lettre','".$_SESSION['mat']."','".$_SESSION['annee']."')") or die(mysqli_error($link));
            }
            else{
                $query=mysqli_query($link,"SELECT num_auto FROM post_inscription WHERE Annee ='".$_SESSION['annee']."' ORDER BY num_auto DESC") or die(mysqli_query($link));
                    $donnees=mysqli_fetch_array($query);
                    $num=$donnees['num_auto']+1;
                    mysqli_query($link,"INSERT INTO post_inscription (num_auto,nin,nom,prenom,date_naiss,lieu_naiss,statut,traitant_fiche,code_depart,code_niv,date_delivrance_fiche,code_facult,tel_mobile,droit,droit_lettre,matricule,Annee)
                        values ('".$num."','".$data['nin']."','".$nn."','".$p."','".$data['date_naiss']."','".$l."',2,'".$_SESSION['login']."','".$data['retenu']."','$n','$date','$code_facult','".$data['tel_mobile']."','$udc','$lettre','".$_SESSION['mat']."','".$_SESSION['annee']."')") or die(mysqli_error($link));
            }
        }

        else{
            $requete=mysqli_query($link,"SELECT Annee FROM post_inscription WHERE Annee ='".$_SESSION['annee']."'");
            $re=mysqli_fetch_array($requete);
    
            if(mysqli_num_rows($requete)==0){
                mysqli_query($link,"INSERT INTO post_inscription (num_auto,nin,nom,prenom,date_naiss,lieu_naiss,statut,traitant_fiche,code_depart,code_niv,date_delivrance_fiche,code_facult,tel_mobile,droit,droit_lettre,matricule,Annee)
                values ('1','".$data['nin']."','".$nn."','".$p."','".$data['date_naiss']."','".$l."',2,'".$_SESSION['login']."','".$data['retenu']."','$niveau','$date','$code_facult','".$data['tel_mobile']."','$udc','$lettre','".$_SESSION['mat']."',".$_SESSION['annee']."')") or die(mysqli_error($link));
            }
            else{
                $query=mysqli_query($link,"SELECT num_auto FROM post_inscription WHERE Annee ='".$_SESSION['annee']."' ORDER BY num_auto DESC") or die(mysqli_query($link));
                    $donnees=mysqli_fetch_array($query);
                    $num=$donnees['num_auto']+1;
                    mysqli_query($link,"INSERT INTO post_inscription (num_auto,nin,nom,prenom,date_naiss,lieu_naiss,statut,traitant_fiche,code_depart,code_niv,date_delivrance_fiche,code_facult,tel_mobile,droit,droit_lettre,matricule,Annee)
                        values ('".$num."','".$data['nin']."','".$nn."','".$p."','".$data['date_naiss']."','".$l."',2,'".$_SESSION['login']."','".$data['retenu']."','$n','$date','$code_facult','".$data['tel_mobile']."','$udc','$lettre','".$_SESSION['mat']."','".$_SESSION['annee']."')") or die(mysqli_error($link));
            }
        }
        
       
        
        
        
        
        //echo "INSERT INTO post_inscription (nin,nom,prenom,date_naiss,lieu_naiss,statut,traitant_fiche,code_depart,code_niv,date_delivrance_fiche,code_facult,tel_mobile,droit,droit_lettre,matricule)
        //values ('".$data['nin']."','".$nn."','".$p."','".$data['date_naiss']."','".$l."',1,'".$_SESSION['login']."','".$data['retenu']."','$n','$date','$code_fac','".$data['tel_mobile']."','$udc','$lettre','$mat')";
        //die;
    
     }
        $p= mysqli_query($link,"SELECT * FROM post_inscription where nin='".$data['nin']."' AND Annee ='".$_SESSION['annee']."'");
    $rer=mysqli_fetch_array($p);

 

 }
 else
 {

    $r=mysqli_query($link,"SELECT * FROM etudiant where mat_etud='".$_SESSION['mat']."'");
    $data=mysqli_fetch_array($r);
    
   /*  if(isset($per)){}else{
        
    } */
    if(mysqli_num_rows($r)!=0){
        
        $req=mysqli_query($link,"SELECT * FROM admission where matricule='".$_SESSION['mat']."'");
        if(mysqli_num_rows($req)!=0){
           
            $resultat="Admis";
            $rs=mysqli_query($link,"SELECT * FROM inscription where mat_etud='".$_SESSION['mat']."' order by inscription.annee DESC");
            $datas=mysqli_fetch_array($rs);
            $niveau=$datas['code_niv'];
            $code_dep=$datas['code_depart'];
            switch ($niveau) {
                case 'N1':
                    $code="N2";
                    break;
                case 'N2':
                    $code="N3";
                    break;
                case 'N3':
                    $code="N4";
                    break; 
                case 'N4':
                    $code="N5";
                    break; 
                case 'P1':
                    $code="P2";
                    break;
                case 'P2':
                    $code="P3";
                    break;
                default:
                    $m="le niveau suivant n'est pas disponible";
                    break;
            }
            $rst=mysqli_query($link,"SELECT * FROM niveau where code_niv='$code' ");
            $dataS=mysqli_fetch_array($rst);
            $niv=$dataS['intit_niv'];

            $rsd=mysqli_query($link,"SELECT * FROM departement where code_depart='$code_dep' ");
            $dat=mysqli_fetch_array($rsd);
            $depart=$dat['design_depart'];
            $code_fac=$dat['code_facult'];
            $concours=$dat['concours'];

            $rsf=mysqli_query($link,"SELECT * FROM faculte where code_facult='$code_fac' ");
            $daf=mysqli_fetch_array($rsf);
            $facult=$daf['design_facult'];
        } else{
            $resultat="Ajourné";

            $rs=mysqli_query($link,"SELECT * FROM inscription where mat_etud='".$_SESSION['mat']."' order by inscription.annee DESC");
            $datas=mysqli_fetch_array($rs);
            $niveau=$datas['code_niv'];
            $code_dep=$datas['code_depart'];
          
            $rst=mysqli_query($link,"SELECT * FROM niveau where code_niv='$niveau' ");
            $dataS=mysqli_fetch_array($rst);
            $niv=$dataS['intit_niv'];

            $rsd=mysqli_query($link,"SELECT * FROM departement where code_depart='$code_dep' ");
            $dat=mysqli_fetch_array($rsd);
            $depart=$dat['design_depart'];
            $code_fac=$dat['code_facult'];
            $concours=$dat['concours'];

            $rsf=mysqli_query($link,"SELECT * FROM faculte where code_facult='$code_fac' ");
            $daf=mysqli_fetch_array($rsf);
            $facult=$daf['design_facult'];
        }
        
        
    }else{
        $m='Etudiant non inscrit';
    }

    if($resultat=="Admis"){
        $n=$code;
    } elseif($resultat=="Ajourné"){
        $n=$niveau;
    }

    if($n=="N4" || $n=="N5"){
        $udc="60 000 KMF"; 
        $lettre="Soixante mille Francs Comoriens";
    }
    if( $concours==1){
        if($n=="N1" || $n=="N2" || $n=="P1" || $n=="P2"){
            $udc="45 000 KMF";
            $lettre="Quarante cinq mille Francs Comoriens";
        } elseif($n=="N3" || $n=="P3" ){
            $udc="55 000 KMF";
            $lettre="Cinquante cinq mille Francs Comoriens";
        } 
    }else{
        if($n=="N1" || $n=="N2" || $n=="P1" || $n=="P2"){
            $udc="40 000 KMF";
            $lettre="Quarante mille Francs Comoriens";
        } elseif($n=="N3" || $n=="P3" ){
            $udc="50 000 KMF";
            $lettre="Cinquante mille Francs Comoriens";
        }
    
    }
  
    $rt=mysqli_query($link,"SELECT * FROM post_inscription where nin='".$_SESSION['nin']."' and Annee ='".$_SESSION['annee']."'  ");
    //$tadata=mysqli_fetch_array($r);
    if(mysqli_num_rows($rt)==0){
        $nn = addslashes($data['nom']);
        $p = addslashes($data['prenom']);
        $l = addslashes($data['lieu_naiss']);

            $requete=mysqli_query($link,"SELECT Annee FROM post_inscription WHERE Annee ='".$_SESSION['annee']."'");
            $re=mysqli_fetch_array($requete);

        if(mysqli_num_rows($requete)==0){
            $query=mysqli_query($link,"SELECT num_auto FROM post_inscription WHERE Annee= '".$_SESSION['annee']."' ORDER BY num_auto DESC ");
            $donnees=mysqli_fetch_array($query);
            //$num=$donnees['num_auto']+1;
            mysqli_query($link,"INSERT INTO post_inscription (num_auto,nin,nom,prenom,date_naiss,lieu_naiss,statut,traitant_fiche,code_depart,code_niv,date_delivrance_fiche,code_facult,tel_mobile,droit,droit_lettre,matricule,Annee)
            values ('1','".$_SESSION['nin']."','".$nn."','".$p."','".$data['date_naiss']."','".$l."',2,'".$_SESSION['login']."','".$datas['code_depart']."','$n','$date','$code_fac','$tel','$udc','$lettre','".$_SESSION['mat']."','".$_SESSION['annee']."')") or die(mysqli_error($link));

        }
        else{
                $query=mysqli_query($link,"SELECT num_auto FROM post_inscription WHERE Annee= '".$_SESSION['annee']."'ORDER BY num_auto DESC ");
                    $donnees=mysqli_fetch_array($query);
                    $num=$donnees['num_auto']+1;
                mysqli_query($link,"INSERT INTO post_inscription (num_auto,nin,nom,prenom,date_naiss,lieu_naiss,statut,traitant_fiche,code_depart,code_niv,date_delivrance_fiche,code_facult,tel_mobile,droit,droit_lettre,matricule,Annee)
                    values ('$num','".$_SESSION['nin']."','".$nn."','".$p."','".$data['date_naiss']."','".$l."',2,'".$_SESSION['login']."','".$datas['code_depart']."','$n','$date','$code_fac','$tel','$udc','$lettre','".$_SESSION['mat']."','".$_SESSION['annee']."')") or die(mysqli_error($link));

        }
        
    }
    
    
  $k="ok bar";  
  $p= mysqli_query($link,"SELECT * FROM post_inscription where nin='".$_SESSION['nin']."'  AND Annee ='".$_SESSION['annee']."'");
  $rer=mysqli_fetch_array($p);
  
    }
}


if($_SESSION['periode']==1){ 
    $k="ok";
    //$nin=$_POST['nin'];
    $niveau=$_POST['niveau'];
    //$annee=$_POST['annee'];
    //$_SESSION['annee']=$annee;
    //$annee=$_POST['annee'];
    //$annee=$_SESSION['annee'];
    /*if(isset($_POST['pers'])){
       // $per=$_POST['per'];
       // $per=$_POST['per'];
        //$_SESSION['periode']=$per;
            $mat=$_POST['mat'];
            $nin=$_POST['nin'];
    }*/
    //$annee=$_POST['annee'];
        
        
        

    $r=mysqli_query($link,"SELECT * FROM candidats where nin='".$_SESSION['nin']."'");
    $data=mysqli_fetch_array($r);
    

    $rsd=mysqli_query($link,"SELECT * FROM departement where code_depart='".$data['retenu']."' ");
    $dat=mysqli_fetch_array($rsd);
    $depart=$dat['design_depart'];
    $code_fac=$dat['code_facult'];
    $concours=$dat['concours'];

    $rsf=mysqli_query($link,"SELECT * FROM faculte where code_facult='$code_fac' ");
    $daf=mysqli_fetch_array($rsf);
    $facult=$daf['design_facult'];

    if($niveau=="N4" || $niveau=="N5"){
        $udc="60 000 KMF";
        $lettre="Soixante mille Francs Comoriens";
    }
    if( $concours==1){
        if($niveau=="l1" || $niveau=="l2"){
            $udc="45 000 KMF";
            $lettre="Quarante cinq mille Francs Comoriens";
        } elseif($niveau=="l3"){
            $udc="55 000 KMF";
            $lettre="Cinquante cinq mille Francs Comoriens";
        } 
    }else{
        if($niveau=="l1" || $niveau=="l2" ){
            $udc="40 000 KMF";
            $lettre="Quarante mille Francs Comoriens";
        } elseif($niveau=="l3"){
            $udc="50 000 KMF";
            $lettre="Cinquante mille Francs Comoriens";
        }
    
    }
    if($niveau=="l1"){
        if($concours==1 and $code_facult!="EMSP"){
            $niv="1ère Année" ;  
            $n="P1" ;     
        } 
        if($concours==0 || $code_facult=="EMSP"){
            $niv="Licence 1" ; 
            $n="N1" ;        
        } 
    } if($niveau=="l2"){
        if($concours==1 and $code_facult!="EMSP"){
            $niv="2ème Année" ; 
            $n="P2" ;        
        } 
        if($concours==0 || $code_facult=="EMSP"){
            $niv="Licence 2" ;  
            $n="N2" ;       
        } 
    }if($niveau=="l3"){
        if($concours==1 and $code_facult!="EMSP"){
            $niv="3ème Année" ;   
            $n="P3" ;      
        } 
        if($concours==0 || $code_facult=="EMSP"){
            $niv="Licence 3" ; 
            $n="N3" ;        
        } 
    }
    if($niveau=="N4"){
        
            $niv="Master 1" ;        
            $n="N4" ;
    }
    if($niveau=="N5"){
        
            $niv="Master 2" ;  
            $n="N5" ;      
        
    }
    $rt=mysqli_query($link,"SELECT * FROM post_inscription where nin='".$_SESSION['nin']."' && Annee ='".$_SESSION['annee']."' ");
        
    $tadata=mysqli_fetch_array($rt);
    if(mysqli_num_rows($rt)==0){
        $nn = addslashes($data['nom']);
        $p = addslashes($data['prenom']);
        $l = addslashes($data['lieu_naiss']);

        $matr=mysqli_query($link,"SELECT * FROM inscription WHERE NIN='".$_SESSION['nin']."' ");
        $rema=mysqli_fetch_array($matr);
        if(mysqli_num_rows($matr)>0){
           // $matricule=$matr['mat_etud'];

            $requete=mysqli_query($link,"SELECT Annee FROM post_inscription WHERE Annee ='".$_SESSION['annee']."'");
            $re=mysqli_fetch_array($requete);
    
            if(mysqli_num_rows($requete)==0){
                mysqli_query($link,"INSERT INTO post_inscription (num_auto,nin,nom,prenom,date_naiss,lieu_naiss,statut,traitant_fiche,code_depart,code_niv,date_delivrance_fiche,code_facult,tel_mobile,droit,droit_lettre,matricule,Annee)
                values ('1','".$data['nin']."','".$nn."','".$p."','".$data['date_naiss']."','".$l."',2,'".$_SESSION['login']."','".$data['retenu']."','$n','$date','$code_fac','".$data['tel_mobile']."','$udc','$lettre','".$rema['mat_etud']."','".$_SESSION['annee']."')") or die(mysqli_error($link));
            }
            else{
                $query=mysqli_query($link,"SELECT num_auto FROM post_inscription WHERE Annee ='".$_SESSION['annee']."' ORDER BY num_auto DESC") or die(mysqli_query($link));
                    $donnees=mysqli_fetch_array($query);
                    $num=$donnees['num_auto']+1;
                    mysqli_query($link,"INSERT INTO post_inscription (num_auto,nin,nom,prenom,date_naiss,lieu_naiss,statut,traitant_fiche,code_depart,code_niv,date_delivrance_fiche,code_facult,tel_mobile,droit,droit_lettre,matricule,Annee)
                        values ('".$num."','".$data['nin']."','".$nn."','".$p."','".$data['date_naiss']."','".$l."',2,'".$_SESSION['login']."','".$data['retenu']."','$n','$date','$code_fac','".$data['tel_mobile']."','$udc','$lettre','".$rema['mat_etud']."','".$_SESSION['annee']."')") or die(mysqli_error($link));
            }
        }

        else{
            $requete=mysqli_query($link,"SELECT Annee FROM post_inscription WHERE Annee ='".$_SESSION['annee']."'");
            $re=mysqli_fetch_array($requete);
    
            if(mysqli_num_rows($requete)==0){
                mysqli_query($link,"INSERT INTO post_inscription (num_auto,nin,nom,prenom,date_naiss,lieu_naiss,statut,traitant_fiche,code_depart,code_niv,date_delivrance_fiche,code_facult,tel_mobile,droit,droit_lettre,Annee)
                values ('1','".$data['nin']."','".$nn."','".$p."','".$data['date_naiss']."','".$l."',2,'".$_SESSION['login']."','".$data['retenu']."','$n','$date','$code_fac','".$data['tel_mobile']."','$udc','$lettre','".$_SESSION['annee']."')") or die(mysqli_error($link));
            }
            else{
                $query=mysqli_query($link,"SELECT num_auto FROM post_inscription WHERE Annee ='".$_SESSION['annee']."' ORDER BY num_auto DESC") or die(mysqli_query($link));
                    $donnees=mysqli_fetch_array($query);
                    $num=$donnees['num_auto']+1;
                    mysqli_query($link,"INSERT INTO post_inscription (num_auto,nin,nom,prenom,date_naiss,lieu_naiss,statut,traitant_fiche,code_depart,code_niv,date_delivrance_fiche,code_facult,tel_mobile,droit,droit_lettre,Annee)
                        values ('".$num."','".$data['nin']."','".$nn."','".$p."','".$data['date_naiss']."','".$l."',2,'".$_SESSION['login']."','".$data['retenu']."','$n','$date','$code_fac','".$data['tel_mobile']."','$udc','$lettre','".$_SESSION['annee']."')") or die(mysqli_error($link));
            }
        }
        
       
        
        
        
        
        //echo "INSERT INTO post_inscription (nin,nom,prenom,date_naiss,lieu_naiss,statut,traitant_fiche,code_depart,code_niv,date_delivrance_fiche,code_facult,tel_mobile,droit,droit_lettre,matricule)
        //values ('".$data['nin']."','".$nn."','".$p."','".$data['date_naiss']."','".$l."',1,'".$_SESSION['login']."','".$data['retenu']."','$n','$date','$code_fac','".$data['tel_mobile']."','$udc','$lettre','$mat')";
        //die;
    
     }
        $p= mysqli_query($link,"SELECT * FROM post_inscription where nin='".$data['nin']."' AND Annee ='".$_SESSION['annee']."'");
    $rer=mysqli_fetch_array($p);

}

}

    $an=date('Y');
    //$d = date(Y);
    //$dd=$d+1;
    
    //$a = $d."-".$dd; 
    $a = "2019-2020";
    

   /* $an=date('Y');
    $d = date(Y);
    $dd=$d+1;
    
    //$a = $d."-".$dd; 
	$a = "2019-2020";*/
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome - Universit&eacute; des Comores</title>
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
                <h6 class="m-3 text-center"><strong class="titre"> Universit&eacute; des Comores</strong></h6>
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
        <h4 align="right"><strong><?php  echo $_SESSION['prenom']." ".$_SESSION['nom']?> </strong></h4>
        <h5 align="right" style="color:#00b185;"> <strong><?php echo  $_SESSION['libelle']; ?></strong></h5>
       
        <h5 align="left" style="margin-top:-50px;margin-bottom:120px;margin-left:-50px;"> <?php echo (date('d-m-Y'))?></h5>
        <h5 align="left" style="margin-top:-100px;margin-bottom:130px;margin-left:-50px;color:#00b185;"> Fin de préinscription : <?php echo $xD['date_fin'];?></h5>
                </div>
            <div class="text-center mb-5">
				</div>
                        <?php
                           /* $rt=mysqli_query($link,"SELECT * FROM post_inscription where num_auto='".$_SESSION['fiche']."'");
                            $tata=mysqli_fetch_array($rt);
                            $p= mysqli_query($link,"SELECT * FROM candidats where nin='".$tata['nin']."'");
                            $tatata=mysqli_fetch_array($p);
                            
                            $rsd=mysqli_query($link,"SELECT * FROM departement where code_depart='".$tata['code_depart']."' ");
                            $dat=mysqli_fetch_array($rsd);
                            $depart=$dat['design_depart'];
                            $code_fac=$dat['code_facult'];
                            $concours=$dat['concours'];
                            
                            $rsf=mysqli_query($link,"SELECT * FROM faculte where code_facult='$code_fac' ");
                            $daf=mysqli_fetch_array($rsf);
                            $facult=$daf['design_facult'];
                            
                            $rst=mysqli_query($link,"SELECT * FROM niveau where code_niv='".$tata['code_niv']."' ");
                            $dataS=mysqli_fetch_array($rst);
                            $niv=$dataS['intit_niv'];*/
                        ?>
           
       
          
                <!--div class="text-left" style="margin-top:1px">
        <a class="btn btn-primary" href="nouv.php" role=button> Nouveau reçu </a>
        </div-->
       
        <div id='sectionAimprimer' >
        <div id='sectionAimprimer' style="border:1px solid black;height:auto; width:820px; margin:40px;padding:4px; "> 
    
            <div class="row">
                    
                <div class="col-md-3"><img src="assets/img/udc.png" width="50%" height="100"></div>
                <div class="col-md-9">
                    <h3 style="margin-left:20px"><STRONG>UNIVERSITE DES COMORES</STRONG></h1>
                    <h4 style="margin-left:-70px"><strong>DIRECTION DES ETUDES ET DE LA SCOLARITE</h1>
                    <h4 style="margin-left:20px;margin-bottom:20px;margin-top:20px;font-family:Arial Rounde MT Bold"><strong>AUTORISATION DE PAIEMENT</strong></h5> 
                    
                </div>    
            </div>

            <h5 style="margin-left:10px;margin-top:10px">Le Directeur des Etudes et de la Scolarité, soussigné, autorise</h6>

<div class="row" style="margin-top:5px">
    <div class="col-md-4">
            
    </div>
    <div  class="col-md-8" >
		<div class="row">
        <div class="col-12">

        <div class="form-row" style="margin-top:10px">

         <div class="form-group col-md-6" >
         <h6 style="margin-left:-200px;margin-bottom:-15px"> <b> Numéro d'autorisation:&nbsp;<?php echo stripslashes($rer['num_auto']);?></h5></b></h6><br>
         </div>
         </div> 
     <div class="form-row" style="margin-top:-20px">
         <div class="form-group col-md-6">
            <h6 style="margin-left:-200px">Nom:<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo stripslashes(utf8_encode($rer['nom']));?></h5></b></h6>
         </div>
         <div class="form-group col-md-6">
            <h6 style="margin-left:-50px">Pr&eacute;nom:<b>&nbsp;&nbsp;&nbsp;<?php echo stripslashes(utf8_encode($rer['prenom']));?></h5></b></h6>
         </div>
     </div>   
     <div class="form-row" style="margin-top:-20px">
         <div class="form-group col-md-12">
             <h6 style="margin-left:-200px">Né(e) le:<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper($rer['date_naiss']); ?></b>&nbsp;&nbsp;à &nbsp;&nbsp;<b><?php echo stripslashes(utf8_encode($rer['lieu_naiss']));?></b></h5></b></h6>
         </div>
        
     </div>
     <div class="form-row">

<div class="form-group col-md-6" >
<h6 style="margin-left:-200px">NIN:<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo stripslashes($rer['nin']);?></h5></b></h6>
</div>
    <div class="form-group col-md-6">
    <?php 
            if($rer['matricule']==""){?>
                <h6 style="margin-left:-50px">N° de reçu:<b><?php echo $data['num_recu'];?></h5></b></h5>
    <?php }else{ ?>
        
        <h6 style="margin-left:-50px">Matricule:<b>&nbsp;<?php echo $rer['matricule'];?></h5></b></h5>
        <?php }
    ?>    
    </div>
    </div>
     <div class="form-row" style="margin-top:-20px">
         <div class="form-group col-md-12">
         <h6 style="margin-left:-200px">Pr&eacute;inscrit au titre de l'année:<b>&nbsp;&nbsp;<?php echo $_SESSION['annee'] ;?></h5></b></h5>

         </div>
         
     </div>
     <div class="form-row" style="margin-top:-20px">
         <div class="form-group col-md-12">
         <h6 style="margin-left:-200px">Composante:<b>&nbsp;&nbsp;<?php echo utf8_encode($facult) ;?></h5></b></h5>               
    </div>
        
     </div>
     <div class="form-row" style="margin-top:-20px">
         <div class="form-group col-md-12">
         <h6 style="margin-left:-200px">Département:<b>&nbsp;&nbsp;<?php echo utf8_encode($depart) ;?></h5></b></h5>
         </div>
        
     </div>
     <div class="form-row" style="margin-top:-40px">
*         <div class="form-group col-md-12" >
         <h6 style="margin-left:-200px">Niveau:<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo utf8_encode($niv) ;?></b></h6>
         </div>        
        
     </div>
     </div>
</div>

          
                <h5 style="margin-left:-260px;margin-top:-10px">à verser à la SNPSF: </h5><br>
                <h6 style="margin-left:-260px;margin-top:-20px">-<strong><?php echo $rer['droit']." (".$rer['droit_lettre'].")" ;?></strong> de frais d'inscription au compte CPP  368705/02(UDC)</h6><br>
                <h6 style="margin-left:-260px;margin-top:-20px">-<strong>2 500 KMF (Deux mille cinq cent Francs Comoriens)</strong> de frais de mutuelle de santé au compte CPP  501 270/07 - 414 452/16(USECO)</h6>
                
			 </div>
			
		  
                
        <div class="row">
            <div class="col-md-3">
                <h6 style="margin-left:20px;margin-top:20px;"> Signature:</h6> 
            </div>
            <div class="col-md-3">
                <h6 style=" margin-left:-10px;margin-top:110px;" ><b><?=  $_SESSION["nom"]." ". $_SESSION["prenom"] ?></b></h6> 
            </div>
            <div class="col-md-3" >
                <img src="./assets/img/signature.PNG"  alt="profile image" style="margin-left:60px">
            </div>
            <div style="margin-left:0px"  class="col-md-3">
                <h6  style="margin-left:-60px;margin-top:120px;" ><strong>Ben Ousseni MOHAMED</em></h6>
            </div>
     
                </div>
                <div class="row" style="margin-top:-25px;">
                <div class="col-md-12">
                <h6 style="margin-left:15px;margin-top:20px;margin-bottom:0px;"><STRONG>Date d'impression:</STRONG>&nbsp;<?php echo (date('d/m/Y'));?></h6> 

                </div>

            
	</div>
		</div>
        <!-- <h6 style="margin-left:150px;margin-top:60px"><STRONG>MOHAMED Ben Osseini</STRONG></h6> -->
        

        
	</div>
				</div>

              			
                </div> 

<div class="text-right">
            <button onClick="imprimer('sectionAimprimer')" class="btn btn-primary">Imprimer l'autaurisation</button> 
        </div>
        <div class="text-left" style="margin-top:-40px;">
                    <a role="button" class="btn btn-primary" href="periode_preinscri.php">retour </a>
                   </div>   	

                   </main>
    </section>
    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/app.js"></script>
    <script>
        function imprimer(divName){
            var restorepage=document.body.innerHTML;
            var printContent=document.getElementById(divName).innerHTML;
            
            document.body.innerHTML=printContent;
            window.print();
            document.body.innerHTML=restorepage;
        }
    </script>
   
</body>
</html>
<?php }else{ ?>
                <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, vous n'avez pas les privil&eacute;ges d'acc&eacute;der &agrave; cette page! </h3>
    <?php }

?>								
						