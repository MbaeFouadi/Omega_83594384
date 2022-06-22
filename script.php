<?php 
session_start();
include('connexion.php');

$dep = $_POST['id'];

$c = $_SESSION['serie'];

$mps=mysqli_query($link,"SELECT * FROM departement where code_facult = '$dep'");
while($data=mysqli_fetch_array($mps))
{
  //$serie = split(",",$data['serie']);
  $serie = $data['serie'];
          
}
//if(sizeof($serie) ==2){
if($serie==2){
  if($_SESSION['serie']==$serie[0] || $_SESSION['serie']==$serie[1]){
    $scientifique=1;
  }
}
//if(sizeof($serie)==3){
if($serie==3){
  if($_SESSION['serie']==$serie[0] || $_SESSION['serie']==$serie[1] || $_SESSION['serie']==$serie[2] ){
    $scientifique=2;
  }
//}elseif(sizeof($serie)==4){
}elseif($serie==4){
  if($_SESSION['serie']==$serie[0] || $_SESSION['serie']==$serie[1] || $_SESSION['serie']==$serie[2] || $_SESSION['serie']==$serie[3] ){
    $scientifique=3;
  }
}
else {
  
    $scientifique=0;
  
}

if($_SESSION['tipe']==1){


  switch ($_POST['option']) {
    case 'comp':
      # code...
      ?>
        <label for="inputdep">Département</label>
        <select id="inputdep" class="form-control inputdep" name="departement" required>
        <option value="" selected>---Choisir---</option>
      <?php 
        if($scientifique==1)
        {
          if(isset($_POST['id'])){
            $k = $_POST['id'];
          $pic = mysqli_query($link,"SELECT DISTINCT design_depart, departement.code_depart FROM faculte, departement, disposition
          WHERE departement.code_depart = disposition.code_depart
          AND (
          code_niv =  'N1'
          OR code_niv =  'P1'
          )and departement.code_facult = faculte.code_facult and faculte.code_facult = '$k' and departement.statut = 1 and departement.concours = 0");
          } 
        }
        if($scientifique==2)
        {
          if(isset($_POST['id'])){
            $k = $_POST['id'];
          $pic = mysqli_query($link,"SELECT DISTINCT design_depart, departement.code_depart FROM departement,faculte  WHERE departement.code_depart = disposition.code_depart
          AND (
          code_niv =  'N1'
          OR code_niv =  'P1'
          )and departement.code_facult = faculte.code_facult and faculte.code_facult = '$k' and departement.concours = 0 and (departement.serie LIKE '%$c%' or departement.serie = 'all' ) and departement.statut = 1 ");
          } 
        }
        if($scientifique==0 || $scientifique==3)
        {
          if(isset($_POST['id'])){
            $k = $_POST['id'];
          $pic = mysqli_query($link,"SELECT DISTINCT design_depart, departement.code_depart FROM departement,faculte , disposition WHERE departement.code_depart = disposition.code_depart
          AND (
          code_niv =  'N1'
          OR code_niv =  'P1'
          )and  departement.code_facult = faculte.code_facult and faculte.code_facult = '$k' and departement.concours = 0 and (departement.serie LIKE '%$c%' or departement.serie = 'all' ) and departement.statut = 1");
          }
        }
          while($data=mysqli_fetch_array($pic)){
           
            ?>
          
            <option value="<?php echo $data['code_depart'];?>"><?php echo utf8_encode($data['design_depart']);?></option>
              
          <?php 
            }
            ?>
        </select>
      <?php
      break;
    case 'comp1':
      # code...
      ?>
        <label for="inputdep">Département</label>
        <select id="inputdep" class="form-control inputdep" name="departement1" required>
        <option value="" selected>---Choisir---</option>
      <?php 
        if($scientifique==1)
        {
          if(isset($_POST['id'])){
            $k = $_POST['id'];
          $pic = mysqli_query($link,"SELECT DISTINCT design_depart, departement.code_depart FROM faculte, departement, disposition
          WHERE departement.code_depart = disposition.code_depart
          AND (
          code_niv =  'N1'
          OR code_niv =  'P1'
          )and departement.code_facult = faculte.code_facult and faculte.code_facult = '$k' and departement.statut = 1 and departement.concours = 0");
          } 
        }
        if($scientifique==2)
        {
          if(isset($_POST['id'])){
            $k = $_POST['id'];
          $pic = mysqli_query($link,"SELECT DISTINCT design_depart, departement.code_depart FROM departement,faculte  WHERE departement.code_depart = disposition.code_depart
          AND (
          code_niv =  'N1'
          OR code_niv =  'P1'
          )and departement.code_facult = faculte.code_facult and faculte.code_facult = '$k' and departement.concours = 0 and (departement.serie LIKE '%$c%' or departement.serie = 'all' ) and departement.statut = 1 ");
          } 
        }
        if($scientifique==0 || $scientifique==3)
        {
          if(isset($_POST['id'])){
            $k = $_POST['id'];
          $pic = mysqli_query($link,"SELECT DISTINCT design_depart, departement.code_depart FROM departement,faculte , disposition WHERE departement.code_depart = disposition.code_depart
          AND (
          code_niv =  'N1'
          OR code_niv =  'P1'
          )and  departement.code_facult = faculte.code_facult and faculte.code_facult = '$k' and departement.concours = 0 and (departement.serie LIKE '%$c%' or departement.serie = 'all' ) and departement.statut = 1");
          }
        }
          while($data=mysqli_fetch_array($pic)){
           
            ?>
          
            <option value="<?php echo $data['code_depart'];?>"><?php echo utf8_encode($data['design_depart']);?></option>
              
          <?php 
            }
            ?>
        </select>
      <?php
      break;
    case 'comp2':
      # code...
      ?>
      <label for="inputdep2">Département</label>
      <select id="inputdep2" class="form-control inputdep" name="departement2" required>
      <option value="" selected>---Choisir---</option>
      <?php 
         if($scientifique==1)
         {
           if(isset($_POST['id'])){
             $k = $_POST['id'];
             $pic = mysqli_query($link,"SELECT DISTINCT design_depart, departement.code_depart FROM departement,faculte ,disposition  WHERE departement.code_depart = disposition.code_depart
             AND (
             code_niv =  'N1'
             OR code_niv =  'P1'
             )and departement.code_facult = faculte.code_facult and faculte.code_facult = '$k' and departement.statut = 1 ");
 
           } 
         }
         if($scientifique==2)
         {
           if(isset($_POST['id'])){
             $k = $_POST['id'];
           $pic = mysqli_query($link,"SELECT DISTINCT design_depart, departement.code_depart FROM departement,faculte , disposition  WHERE departement.code_depart = disposition.code_depart
           AND (
           code_niv =  'N1'
           OR code_niv =  'P1'
           )and departement.code_facult = faculte.code_facult and faculte.code_facult = '$k' and (departement.serie LIKE '%$c%' or departement.serie = 'all' ) and departement.statut = 1");
           } 
         }
         if($scientifique==0 || $scientifique==3)
         {
           if(isset($_POST['id'])){
             $k = $_POST['id'];
           $pic = mysqli_query($link,"SELECT DISTINCT design_depart, departement.code_depart FROM departement,faculte ,disposition  WHERE departement.code_depart = disposition.code_depart
           AND (
           code_niv =  'N1'
           OR code_niv =  'P1'
           )and departement.code_facult = faculte.code_facult and faculte.code_facult = '$k' and (departement.serie LIKE '%$c%' or departement.serie = 'all' ) and departement.statut = 1");
           }
         }
 
          while($data=mysqli_fetch_array($pic)){?>
            <option value="<?php echo $data['code_depart'];?>"><?php echo utf8_encode($data['design_depart']);?></option>
              
          <?php 
                                        }
                                    
            ?>
        </select>
        <?php
      break;
  }
}


if($_SESSION['tipe']==2 || $_SESSION['tipe']==51 || $_SESSION['tipe']==52 || $_SESSION['tipe']==53 || $_SESSION['tipe']==56 || $_SESSION['tipe']==57){
  
    
    switch ($_POST['option']) {
      case 'comp1':
        # code...
        ?>
          <label for="inputdep">Département</label>
          <select id="inputdep" class="form-control inputdep" name="departement" required>
          <option value="" selected>---Choisir---</option>
        <?php 
          if($scientifique==1)
           {
            if(isset($_POST['id'])){
              $k = $_POST['id'];
            $pic = mysqli_query($link,"SELECT DISTINCT design_depart, departement.code_depart FROM departement,faculte , disposition WHERE departement.code_depart = disposition.code_depart
            AND (
            code_niv =  'N2'
            OR code_niv =  'P2'
            OR code_niv =  'N3'
            OR code_niv =  'P3'
            )and  departement.code_facult = faculte.code_facult and faculte.code_facult = '$k' and departement.statut = 1");
            } 
           }
           if($scientifique==2)
           {
            if(isset($_POST['id'])){
              $k = $_POST['id'];
            $pic = mysqli_query($link,"SELECT DISTINCT design_depart, departement.code_depart FROM departement,faculte , disposition WHERE departement.code_depart = disposition.code_depart
            AND (
            code_niv =  'N2'
            OR code_niv =  'P2'
            OR code_niv =  'N3'
            OR code_niv =  'P3'
            )and  departement.code_facult = faculte.code_facult and faculte.code_facult = '$k'  and (departement.serie LIKE '%$c%' or departement.serie = 'all' ) and departement.statut = 1");
            }
           }
           if($scientifique==0 || $scientifique==3)
          {
            if(isset($_POST['id'])){
              $k = $_POST['id'];
            $pic = mysqli_query($link,"SELECT DISTINCT design_depart, departement.code_depart FROM departement,faculte , disposition WHERE departement.code_depart = disposition.code_depart
            AND (
            code_niv =  'N2'
            OR code_niv =  'P2'
            OR code_niv =  'N3'
            OR code_niv =  'P3'
            )and  departement.code_facult = faculte.code_facult and faculte.code_facult = '$k'  and (departement.serie LIKE '%$c%' or departement.serie = 'all' ) and departement.statut = 1");
            }
          }
            while($data=mysqli_fetch_array($pic)){
             
              ?>
            
              <option value="<?php echo $data['code_depart'];?>"><?php echo utf8_encode($data['design_depart']);?></option>
                
            <?php 
              }
              ?>
          </select>
        <?php
        break;
     
    }
  }


  if($_SESSION['tipe']==3){
      switch ($_POST['option']) {
        case 'comp1':
          # code...
          ?>
            <label for="inputdep1">Département</label>
            <select id="inputdep1" class="form-control inputdep" name="departement" required>
            <option value="" selected>---Choisir---</option>
          <?php 
            if($scientifique==1)
             {
              if(isset($_POST['id'])){
                $k = $_POST['id'];
              $pic = mysqli_query($link,"SELECT DISTINCT design_depart, departement.code_depart FROM departement,faculte , disposition WHERE departement.code_depart = disposition.code_depart
              AND (
              code_niv =  'N2'
              OR code_niv =  'P2'
              OR code_niv =  'N3'
              OR code_niv =  'P3'
              )and  departement.code_facult = faculte.code_facult and faculte.code_facult = '$k' and departement.statut = 1");
              } 
             }
             if($scientifique==2)
             {
              if(isset($_POST['id'])){
                $k = $_POST['id'];
              $pic = mysqli_query($link,"SELECT DISTINCT design_depart, departement.code_depart FROM departement,faculte , disposition WHERE departement.code_depart = disposition.code_depart
              AND (
              code_niv =  'N2'
              OR code_niv =  'P2'
              OR code_niv =  'N3'
              OR code_niv =  'P3'
              )and  departement.code_facult = faculte.code_facult and faculte.code_facult = '$k'  and (departement.serie LIKE '%$c%' or departement.serie = 'all' ) and departement.statut = 1");
              }
             }
             if($scientifique==0 || $scientifique==3)
            {
              if(isset($_POST['id'])){
                $k = $_POST['id'];
              $pic = mysqli_query($link,"SELECT DISTINCT design_depart, departement.code_depart FROM departement,faculte , disposition WHERE departement.code_depart = disposition.code_depart
              AND (
              code_niv =  'N2'
              OR code_niv =  'P2'
              OR code_niv =  'N3'
              OR code_niv =  'P3'
              )and  departement.code_facult = faculte.code_facult and faculte.code_facult = '$k'  and (departement.serie LIKE '%$c%' or departement.serie = 'all' ) and departement.statut = 1");
              }
            }
              while($data=mysqli_fetch_array($pic)){
               
                ?>
              
                <option value="<?php echo $data['code_depart'];?>"><?php echo utf8_encode($data['design_depart']);?></option>
                  
              <?php 
                }
                ?>
            </select>
          <?php
          break;
       
      }
    }

    if($_SESSION['tipe']==41 || $_SESSION['tipe']==42 || $_SESSION['tipe']==43  ){
      
        
        switch ($_POST['option']) {
         
          case 'comp1':
            # code...
            ?>
             <label for="inputdep1">Département </label>
                                  <select id="inputdep1" class="form-control inputdep" name="departement" required>
                                  <option value="" selected>---Choisir---</option>
                                  <?php 
                                                      
              
                if(isset($_POST['id'])){
                  $k = $_POST['id'];
                $pic = mysqli_query($link,"SELECT DISTINCT design_depart, departement.code_depart FROM departement,faculte,disposition  WHERE departement.code_depart = disposition.code_depart
                
                and  departement.code_facult = faculte.code_facult and faculte.code_facult = '$k'  and departement.statut = 1");
                }
             
      
              
                                      while($data=mysqli_fetch_array($pic)){?>
                                        <option value="<?php echo $data['code_depart'];?>"><?php echo utf8_encode($data['design_depart']);?></option>
                                          
                                      <?php 
                                                                    }
                                                                
                                        ?>
                                    </select>
            <?php
            break;
         
        }
      }

     
  
                          