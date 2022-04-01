<?php 
session_start();
include('connexion.php');
//$dep = $_POST['id'];

//$c = $_SESSION['serie'];

$mps=mysqli_query($link,"SELECT * FROM departement where code_depart='".$_POST['id']."'");
//$data=mysqli_fetch_array($mps);
while($data=mysqli_fetch_array($mps))
{
  $serie = split(",",$data['serie']);
    //$serie= $data['serie'];    

//$serie= $data['serie']; 
//if(sizeof($serie) ==2){
if($serie==2){
  if($_SESSION['serie']==$serie[0] || $_SESSION['serie']==$serie[1]){
    $scientifique=1;
  }
//}elseif(sizeof($serie)==3){
}elseif($serie==3){
  if($_SESSION['serie']==$serie[0] || $_SESSION['serie']==$serie[1] || $_SESSION['serie']==$serie[2] ){
    $scientifique=2;
  }
}
else {
  
    $scientifique=0;
  
}

}
  switch ($_POST['option']) {
    
    case 'comp1':
    # code...
    ?>
     <label for="inputdep1">Département  </label>
                          <select id="inputdep1" class="form-control inputdep" name="depart">
                          <option value="" selected>---Choisir---</option>
                          <?php 
                                              
      if($scientifique==1)
      {
        if(isset($_POST['id'])){
          $k = $_POST['id'];
          $pic = mysqli_query($link,"SELECT * FROM departement,faculte,disposition  where departement.code_depart=disposition.code_depart and (disposition.code_niv='N1' or disposition.code_niv='P1') and departement.code_facult = faculte.code_facult and faculte.code_facult = '$k' and departement.statut = 1 ");

        } 
      }
      if($scientifique==2)
      {
        if(isset($_POST['id'])){
          $k = $_POST['id'];
        $pic = mysqli_query($link,"SELECT * FROM departement,faculte,disposition  WHERE departement.code_depart = disposition.code_depart
        AND (
        code_niv =  'N1'
        OR code_niv =  'P1'
        )and departement.code_facult = faculte.code_facult and faculte.code_facult = '$k' and (departement.serie LIKE '%$c%'  or departement.serie = 'all' ) and departement.statut = 1");
        } 
      }
      if($scientifique==0)
      {
        if(isset($_POST['id'])){
          $k = $_POST['id'];
          if($_SESSION['type']==1 || $_SESSION['type']==3){

            $pic = mysqli_query($link,"SELECT DISTINCT design_depart,departement.code_depart FROM departement,faculte,disposition  WHERE departement.code_depart = disposition.code_depart
            and (disposition.code_niv='N1' or disposition.code_niv='P1' ) and departement.code_facult = faculte.code_facult and faculte.code_facult = '$k' and departement.statut = 1 and departement.concours = 0");
          }
          if($_SESSION['type']==2){
            
                        $pic = mysqli_query($link,"SELECT DISTINCT design_depart,departement.code_depart FROM departement,faculte,disposition  WHERE departement.code_depart = disposition.code_depart
                        and (disposition.code_niv = 'N2' or disposition.code_niv = 'P2' or disposition.code_niv = 'N3' or disposition.code_niv = 'P3' ) and departement.code_facult = faculte.code_facult and faculte.code_facult = '$k'  and departement.statut = 1");
                      }
                      if($_SESSION['type']==5){
                        
                        $pic = mysqli_query($link,"SELECT DISTINCT design_depart,departement.code_depart FROM departement,faculte,disposition  WHERE departement.code_depart = disposition.code_depart
                        and (disposition.code_niv='N4' or disposition.code_niv='N5' ) and departement.code_facult = faculte.code_facult and faculte.code_facult = '$k' and (departement.serie LIKE '%$c%'  or departement.serie = 'all' ) and departement.statut = 1");
                      }

                      if($_SESSION['type']==6 || $_SESSION['type']==7){
                        
                        $pic = mysqli_query($link,"SELECT DISTINCT design_depart,departement.code_depart FROM departement,faculte,disposition  WHERE departement.code_depart = disposition.code_depart
                        and (disposition.code_niv='N4' or disposition.code_niv='N5' ) and departement.code_facult = faculte.code_facult and faculte.code_facult = '$k' and (departement.serie LIKE '%$c%'  or departement.serie = 'all' ) and departement.statut = 1");
                      }
                      if($_SESSION['type']==4){
                        
                        $pic = mysqli_query($link,"SELECT DISTINCT design_depart,departement.code_depart FROM departement,faculte,disposition  WHERE departement.code_depart = disposition.code_depart
                          and departement.code_facult = faculte.code_facult and faculte.code_facult = '$k'  and departement.statut = 1");
                      }
        }
      }

      
                              while($data=mysqli_fetch_array($pic)){?>
                                <option value="<?php echo $data['code_depart'];?>"><?php echo ($data['design_depart']);?></option>
                                  
                              <?php 
                                                            }
                                                        
                                ?>
                            </select>
    <?php
    break;
  }
                          