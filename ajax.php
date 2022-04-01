<?php
session_start();
include('connexion.php');

if(isset($_POST['code_facult']) && !empty($_POST['code_facult']))
{
	// $query=mysqli_query($link,"SELECT * FROM departement,disposition WHERE departement.code_depart=disposition.code_depart and code_facult='".$_POST['code_facult']."' and disposition.statut=1 and (code_niv='N1'or code_niv='P1') ") or die(mysqli_error($link));
	if($_SESSION['type']==1){
    $query=mysqli_query($link,"SELECT * FROM departement,disposition WHERE departement.code_depart=disposition.code_depart and code_facult='".$_POST['code_facult']."' and disposition.statut=1 and (code_niv='N1'or code_niv='P1') ") or die(mysqli_error($link));
	}
	elseif($_SESSION['type']==2) {
		$query=mysqli_query($link,"SELECT * FROM departement,disposition WHERE departement.code_depart=disposition.code_depart and code_facult='".$_POST['code_facult']."' and disposition.statut=1 and (code_niv='N2'or code_niv='P2') ") or die(mysqli_error($link));
	
	}
	elseif($_SESSION['type']==3) {
		$query=mysqli_query($link,"SELECT * FROM departement,disposition WHERE departement.code_depart=disposition.code_depart and code_facult='".$_POST['code_facult']."' and disposition.statut=1 and (code_niv='N3'or code_niv='P3') ") or die(mysqli_error($link));

	
	}
	elseif($_SESSION['type']==4){
		$query=mysqli_query($link,"SELECT * FROM departement,disposition WHERE departement.code_depart=disposition.code_depart and code_facult='".$_POST['code_facult']."' and disposition.statut=1 and (code_niv='N4'or code_niv='P4') ") or die(mysqli_error($link));

	
	}
	elseif($_SESSION['type']==5){
		$query=mysqli_query($link,"SELECT * FROM departement,disposition WHERE departement.code_depart=disposition.code_depart and code_facult='".$_POST['code_facult']."' and disposition.statut=1 and (code_niv='N5'or code_niv='P5') ") or die(mysqli_error($link));

	}
   
    if(mysqli_num_rows($query)>0)


    {?>
        
        <?php while($data=mysqli_fetch_array($query)){?>
            <option disabled selected hidden>selectionner le departement</option>    
        <option value="<?=utf8_encode($data['code_depart'])?>"><?=utf8_encode($data['design_depart'])?></option>
        <?php
        }
    }
    
}