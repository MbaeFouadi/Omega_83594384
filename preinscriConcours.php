<?php
session_start();
include('connexion.php');
$nbr=0;
$dateJ=date('Y-m-d');

// pour moheli
    //pour iut
        //Commerce
            //choix1
                $a1m="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='3'  and candidats.choix1='Com'";
                    
                $com1m = mysqli_query($link,$a1m);
                $comores1m = mysqli_num_rows($com1m); 

            //choix2
                $a2m="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='3'  and candidats.choix2='Com'";

                $com2m = mysqli_query($link,$a2m);
                $comores2m = mysqli_num_rows($com2m); 

            //choix3
                $a3m="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='3'  and candidats.choix3='Com'";
                
                $com3m = mysqli_query($link,$a3m);
                $comores3m = mysqli_num_rows($com3m); 

            $comoresM=$comores1m+$comores2m+$comores3m;

        //Tourisme
            //choix1
            $b1m="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='3'  and candidats.choix1='ECT'";
            $ECT1m = mysqli_query($link,$b1m);
            $ethiopie1m = mysqli_num_rows($ECT1m); 

            //choix2
                $b2m="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='3'  and candidats.choix2='ECT'";
                $ECT2m = mysqli_query($link,$b2m);
                $ethiopie2m = mysqli_num_rows($ECT2m); 

            //choix3
                $b3m="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='3'  and candidats.choix3='ECT'";
                $ECT3m = mysqli_query($link,$b3m);
                $ethiopie3m = mysqli_num_rows($ECT3m); 
                
            $ethiopieM=$ethiopie1m+$ethiopie2m+$ethiopie3m;

        //GEA
            //choix1
                $c1m="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='3'  and candidats.choix1='G1m'";
                $G11m = mysqli_query($link,$c1m);
                $gabon1m = mysqli_num_rows($G11m); 

            //choix2
                $c2m="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='3'  and candidats.choix2='G1m'";
                $G12m = mysqli_query($link,$c2m);
                $gabon2m = mysqli_num_rows($G12m); 

            //choix3
                $c3m="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='3'  and candidats.choix3='G1m'";
                $G13m = mysqli_query($link,$c3m);
                $gabon3m = mysqli_num_rows($G13m); 

                 //GEA  Patsy-> Fomboni 

             $nasraa=mysqli_query($link,"SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='2'  and (candidats.choix1= 'G1m' or candidats.choix2= 'G1m' or candidats.choix3= 'G1m') ");
             $nasraA=mysqli_num_rows($nasraa); 
 
              //GEA  MORONI-> Fomboni 
           
 
              $nasran=mysqli_query($link,"SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='1'  and (candidats.choix1= 'G1m' or candidats.choix2= 'G1m' or candidats.choix3= 'G1m') ");
              $nasraN=mysqli_num_rows($nasran); 
            
      


                
            $gabonM=$gabon1m+$gabon2m+$gabon3m+$nasraN+$nasraN;

        
        //Geni info
            //choix1
            $d1m="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='3'  and candidats.choix1= 'GI'";
            $GI1m = mysqli_query($link,$d1m);
            $ghana1m = mysqli_num_rows($GI1m); 

            //choix2
                $d2m="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='3'  and candidats.choix2= 'GI'";
                $GI2m = mysqli_query($link,$d2m);
                $ghana2m = mysqli_num_rows($GI2m); 

            //choix3
                $d3m="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='3'  and candidats.choix3= 'GI'";
                $GI3m = mysqli_query($link,$d3m);
                $ghana3m = mysqli_num_rows($GI3m); 
                
            $ghanaM=$ghana1m+$ghana2m+$ghana3m;


        //Habitat
            //choix1
            $e1m="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='3'  and candidats.choix1= 'HE'";
            $HE1m = mysqli_query($link,$e1m);
            $hongrie1m = mysqli_num_rows($HE1m); 

            //choix2
                $e2m="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='3'  and candidats.choix2= 'HE'";
                $HE2m = mysqli_query($link,$e2m);
                $hongrie2m = mysqli_num_rows($HE2m); 

            //choix3
                $e3m="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='3'  and candidats.choix3= 'HE'";
                $HE3m = mysqli_query($link,$e3m);
                $hongrie3m = mysqli_num_rows($HE3m); 
                
            $hongrieM=$hongrie1m+$hongrie2m+$hongrie3m;


        //statistique
            //choix1
            $f1m="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='3'  and candidats.choix1= 'STQ'";
            $STQ1m = mysqli_query($link,$f1m);
            $syrie1m = mysqli_num_rows($STQ1m); 

            //choix2
                $f2m="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='3'  and candidats.choix2= 'STQ'";
                $STQ2m = mysqli_query($link,$f2m);
                $syrie2m = mysqli_num_rows($STQ2m); 

            //choix3
                $f3m="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='3'  and candidats.choix3= 'STQ'";
                $STQ3m = mysqli_query($link,$f3m);
                $syrie3m = mysqli_num_rows($STQ3m); 
                
            $syrieM=$syrie1m+$syrie2m+$syrie3m;

    //pour EMSP
        //soins infirmiers
            //choix1
            $g1m="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='3'  and candidats.choix1= 'IE'";
            $IE1m = mysqli_query($link,$g1m);
            $italie1m = mysqli_num_rows($IE1m); 

            //choix2
                $g2m="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='3'  and candidats.choix2= 'IE'";
                $IE2m = mysqli_query($link,$g2m);
                $italie2m = mysqli_num_rows($IE2m); 

            //choix3
                $g3m="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='3'  and candidats.choix3= 'IE'";
                $IE3m = mysqli_query($link,$g3m);
                $italie3m = mysqli_num_rows($IE3m); 
                
            $italieM=$italie1m+$italie2m+$italie3m;

        //soins obstetricaux
            //choix1
            $h1m="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='3'  and candidats.choix1= 'SF'";
            $SF1m = mysqli_query($link,$h1m);
            $soudan1m = mysqli_num_rows($SF1m); 

            //choix2
                $h2m="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='3'  and candidats.choix2= 'SF'";
                $SF2m = mysqli_query($link,$h2m);
                $soudan2m = mysqli_num_rows($SF2m); 

            //choix3
                $h3m="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='3'  and candidats.choix3= 'SF'";
                $SF3m = mysqli_query($link,$h3m);
                $soudan3m = mysqli_num_rows($SF3m); 
                
            $soudanM=$soudan1m+$soudan2m+$soudan3m;


    //IFERE
        //formation des profs
            //choix1
            $i1m="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='3'  and candidats.choix1= 'REm'";
            $RE1m = mysqli_query($link,$i1m);
            $roumanie1m = mysqli_num_rows($RE1m); 

            //choix2
                $i2m="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='3'  and candidats.choix2= 'REm'";
                $RE2m = mysqli_query($link,$i2m);
                $roumanie2m = mysqli_num_rows($RE2m); 

            //choix3
                $i3m="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='3'  and candidats.choix3= 'REm'";
                $RE3m = mysqli_query($link,$i3m);
                $roumanie3m = mysqli_num_rows($RE3m); 

            //formation des profs Moroni ->  Fomboni 

            $rahn = mysqli_query($link,"SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='1' and  (candidats.choix1= 'REm' or candidats.choix2='REm' or candidats.choix3='REm')");
            $rahN= mysqli_num_rows($rahn);

            //formation des profs   Patsy -> Fomboni 

            $raha = mysqli_query($link,"SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='2' and (choix1= 'REm' or choix2='REm' or choix3='REm')");
            $rahA= mysqli_num_rows($raha);
                
            $roumanieM=$roumanie1m+$roumanie2m+$roumanie3m+$rahN+$rahA;


// pour anjouan
    //pour iut
            //Commerce
                //choix1
                $a1a="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='2'  and candidats.choix1= 'Com'";
                
            $com1a = mysqli_query($link,$a1a);
            $comores1a = mysqli_num_rows($com1a); 

        //choix2
            $a2a="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='2'  and candidats.choix2= 'Com'";

            $com2a = mysqli_query($link,$a2a);
            $comores2a = mysqli_num_rows($com2a); 

        //choix3
            $a3a="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='2'  and candidats.choix3= 'Com'";
            
            $com3a = mysqli_query($link,$a3a);
            $comores3a = mysqli_num_rows($com3a); 

        $comoresA=$comores1a+$comores2a+$comores3a;

    //Tourisme
        //choix1
        $b1a="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='2'  and candidats.choix1= 'ECT'";
        $ECT1a = mysqli_query($link,$b1a);
        $ethiopie1a = mysqli_num_rows($ECT1a); 

        //choix2
            $b2a="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='2'  and candidats.choix2= 'ECT'";
            $ECT2a = mysqli_query($link,$b2a);
            $ethiopie2a = mysqli_num_rows($ECT2a); 

        //choix3
            $b3a="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='2'  and candidats.choix3= 'ECT'";
            $ECT3a = mysqli_query($link,$b3a);
            $ethiopie3a = mysqli_num_rows($ECT3a); 
            
        $ethiopieA=$ethiopie1a+$ethiopie2a+$ethiopie3a;

    //GEA
        //choix1
            $c1a="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='2'  and candidats.choix1= 'G2p'";
            $G11a= mysqli_query($link,$c1a);
            $gabon1a = mysqli_num_rows($G11a); 

        //choix2
            $c2a="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='2'  and candidats.choix2= 'G2p'";
            $G12a = mysqli_query($link,$c2a);
            $gabon2a = mysqli_num_rows($G12a); 

        //choix3
            $c3a="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='2'  and candidats.choix3= 'G2p'";
            $G13a = mysqli_query($link,$c3a);
            $gabon3a = mysqli_num_rows($G13a); 

             //GEA Fomboni -> Patsy

             $thouram=mysqli_query($link,"SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='3' and (candidats.choix1= 'G2p' or candidats.choix2= 'G2p' or candidats.choix3= 'G2p') ");
             $thouraM=mysqli_num_rows($thouram); 
 
              //GEA  MORONI-> Patsy
           
 
              $thouran=mysqli_query($link,"SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='1' and (candidats.choix1= 'G2p' or candidats.choix2= 'G2p' or candidats.choix3= 'G2p') ");
              $thouraN=mysqli_num_rows($thouran); 
            
        $gabonA=$gabon1a+$gabon2a+$gabon3a+$thouraN+$thouraM;


    //Geni info
        //choix1
        $d1a="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='2'  and candidats.choix1= 'GI'";
        $GI1a = mysqli_query($link,$d1a);
        $ghana1a = mysqli_num_rows($GI1a); 

        //choix2
            $d2a="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='2'  and candidats.choix2= 'GI'";
            $GI2a = mysqli_query($link,$d2a);
            $ghana2a = mysqli_num_rows($GI2a); 

        //choix3
            $d3a="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='2'  and candidats.choix3= 'GI'";
            $GI3a = mysqli_query($link,$d3a);
            $ghana3a = mysqli_num_rows($GI3a); 
            
        $ghanaA=$ghana1a+$ghana2a+$ghana3a;


    //Habitat
        //choix1
        $e1a="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='2'  and candidats.choix1= 'HE'";
        $HE1a = mysqli_query($link,$e1a);
        $hongrie1a = mysqli_num_rows($HE1a); 

        //choix2
            $e2a="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='2'  and candidats.choix2= 'HE'";
            $HE2a = mysqli_query($link,$e2a);
            $hongrie2a = mysqli_num_rows($HE2a); 

        //choix3
            $e3a="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='2'  and candidats.choix3= 'HE'";
            $HE3a = mysqli_query($link,$e3a);
            $hongrie3a = mysqli_num_rows($HE3a); 
            
        $hongrieA=$hongrie1a+$hongrie2a+$hongrie3a;


    //statistique
        //choix1
        $f1a="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='2'  and candidats.choix1= 'STQ'";
        $STQ1a = mysqli_query($link,$f1a);
        $syrie1a = mysqli_num_rows($STQ1a); 

        //choix2
            $f2a="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='2'  and candidats.choix2= 'STQ'";
            $STQ2a = mysqli_query($link,$f2a);
            $syrie2a = mysqli_num_rows($STQ2a); 

        //choix3
            $f3a="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='2'  and candidats.choix3= 'STQ'";
            $STQ3a = mysqli_query($link,$f3a);
            $syrie3a = mysqli_num_rows($STQ3a); 
            
        $syrieA=$syrie1a+$syrie2a+$syrie3a;

    //pour EMSP
    //soins infirmiers
        //choix1
        $g1a="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='2'  and candidats.choix1= 'IE'";
        $IE1a = mysqli_query($link,$g1a);
        $italie1a = mysqli_num_rows($IE1a); 

        //choix2
            $g2a="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='2'  and candidats.choix2= 'IE'";
            $IE2a = mysqli_query($link,$g2a);
            $italie2a = mysqli_num_rows($IE2a); 

        //choix3
            $g3a="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='2'  and candidats.choix3= 'IE'";
            $IE3a = mysqli_query($link,$g3a);
            $italie3a = mysqli_num_rows($IE3a); 
            
        $italieA=$italie1a+$italie2a+$italie3a;

    //soins obstetricaux
        //choix1
        $h1a="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='2'  and candidats.choix1= 'SF'";
        $SF1a = mysqli_query($link,$h1a);
        $soudan1a = mysqli_num_rows($SF1a); 

        //choix2
            $h2a="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='2'  and candidats.choix2= 'SF'";
            $SF2a = mysqli_query($link,$h2a);
            $soudan2a = mysqli_num_rows($SF2a); 

        //choix3
            $h3a="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='2'  and candidats.choix3= 'SF'";
            $SF3a = mysqli_query($link,$h3a);
            $soudan3a = mysqli_num_rows($SF3a); 
            
        $soudanA=$soudan1a+$soudan2a+$soudan3a;


    //IFERE
    //formation des profs
        //choix1
        $i1a="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='2'  and candidats.choix1= 'REp'";
        $RE1a = mysqli_query($link,$i1a);
        $roumanie1a = mysqli_num_rows($RE1a); 

        //choix2
            $i2a="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='2'  and candidats.choix2= 'REp'";
            $RE2a = mysqli_query($link,$i2a);
            $roumanie2a = mysqli_num_rows($RE2a); 

        //choix3
            $i3a="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='2'  and candidats.choix3= 'REp'";
            $RE3a = mysqli_query($link,$i3a);
            $roumanie3a = mysqli_num_rows($RE3a); 


             //formation des profs Moroni ->  Patsy

            $nourn = mysqli_query($link,"SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='1'  and  (candidats.choix1= 'REp' or candidats.choix2='REp' or candidats.choix3='REp')");
            $nourN= mysqli_num_rows($nourn);

            //formation des profs  Fomboni  -> Patsy

            $nourm = mysqli_query($link,"SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='3'  and (candidats.choix1= 'REp' or candidats.choix2='REp' or candidats.choix3='REp')");
            $nourM= mysqli_num_rows($nourm);

            
        $roumanieA=$roumanie1a+$roumanie2a+$roumanie3a+$nourN+$nourM; 




// pour ngazidja
    //pour iut
            //Commerce
                //choix1
                $a1n="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='1'  and candidats.choix1= 'Com'";
                
            $com1n = mysqli_query($link,$a1n);
            $comores1n = mysqli_num_rows($com1n); 

        //choix2
            $a2n="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='1'  and candidats.choix2= 'Com'";

            $com2n = mysqli_query($link,$a2n);
            $comores2n = mysqli_num_rows($com2n); 

        //choix3
            $a3n="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='1'  and candidats.choix3= 'Com'";
            
            $com3n = mysqli_query($link,$a3n);
            $comores3n = mysqli_num_rows($com3n); 

        $comoresN=$comores1n+$comores2n+$comores3n;

    //Tourisme
        //choix1
        $b1n="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='1'  and candidats.choix1= 'ECT'";
        $ECT1n = mysqli_query($link,$b1n);
        $ethiopie1n = mysqli_num_rows($ECT1n); 

        //choix2
            $b2n="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='1'  and candidats.choix2= 'ECT'";
            $ECT2n = mysqli_query($link,$b2n);
            $ethiopie2n = mysqli_num_rows($ECT2n); 

        //choix3
            $b3n="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='1'  and candidats.choix3= 'ECT'";
            $ECT3n = mysqli_query($link,$b3n);
            $ethiopie3n = mysqli_num_rows($ECT3n); 
            
        $ethiopieN=$ethiopie1n+$ethiopie2n+$ethiopie3n;

    //GEA
        //choix1
            $c1n="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='1'  and candidats.choix1= 'G1'";
            $G11n= mysqli_query($link,$c1n);
            $gabon1n = mysqli_num_rows($G11n); 

        //choix2
            $c2n="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='1'  and candidats.choix2= 'G1'";
            $G12n = mysqli_query($link,$c2n);
            $gabon2n = mysqli_num_rows($G12n); 

        //choix3
            $c3n="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='1'  and candidats.choix3= 'G1'";
            $G13n = mysqli_query($link,$c3n);
            $gabon3n = mysqli_num_rows($G13n); 
            
        
     //GEA Fomboni -> MORONI
          

            $mouznam=mysqli_query($link,"SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='3' and (candidats.choix1= 'G1' or candidats.choix2= 'G1' or candidats.choix3= 'G1') ");
            $mouznaM=mysqli_num_rows($mouznam); 

             //GEA Patsy -> MORONI
          

             $mouznaa=mysqli_query($link,"SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='2' and (candidats.choix1= 'G1' or candidats.choix2= 'G1' or candidats.choix3= 'G1') ");
             $mouznaA=mysqli_num_rows($mouznaa); 

            $gabonN=$gabon1n+$gabon2n+$gabon3n+$mouznaA+$mouznaM;
    //Geni info
        //choix1
        $d1n="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='1'  and candidats.choix1= 'GI' AND (id_type='1' OR id_type='4' OR id_type='5')";
        $GI1n = mysqli_query($link,$d1n);
        $ghana1n = mysqli_num_rows($GI1n); 

        //choix2
            $d2n="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='1'  and candidats.choix2= 'GI' AND (id_type='1' OR id_type='4' OR id_type='5')";
            $GI2n = mysqli_query($link,$d2n);
            $ghana2n = mysqli_num_rows($GI2n); 

        //choix3
            $d3n="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='1'  and candidats.choix3= 'GI' AND (id_type='1' OR id_type='4' OR id_type='5')";
            $GI3n = mysqli_query($link,$d3n);
            $ghana3n = mysqli_num_rows($GI3n); 
            
        $ghanaN=$ghana1n+$ghana2n+$ghana3n;


    //Habitat
        //choix1
        $e1n="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='1'  and candidats.choix1= 'HE'";
        $HE1n = mysqli_query($link,$e1n);
        $hongrie1n = mysqli_num_rows($HE1n); 

        //choix2
            $e2n="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='1'  and candidats.choix2= 'HE'";
            $HE2n = mysqli_query($link,$e2n);
            $hongrie2n = mysqli_num_rows($HE2n); 

        //choix3
            $e3n="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='1'  and candidats.choix3= 'HE'";
            $HE3n = mysqli_query($link,$e3n);
            $hongrie3n = mysqli_num_rows($HE3n); 
            
        $hongrieN=$hongrie1n+$hongrie2n+$hongrie3n;


    //statistique
        //choix1
        $f1n="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='1'  and candidats.choix1= 'STQ' AND (id_type='1' OR id_type='4' OR id_type='5')";
        $STQ1n = mysqli_query($link,$f1n);
        $syrie1n = mysqli_num_rows($STQ1n); 

        //choix2
            $f2n="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='1'  and candidats.choix2= 'STQ' AND (id_type='1' OR id_type='4' OR id_type='5')";
            $STQ2n = mysqli_query($link,$f2n);
            $syrie2n = mysqli_num_rows($STQ2n); 

        //choix3
            $f3n="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='1'  and candidats.choix3= 'STQ' AND (id_type='1' OR id_type='4' OR id_type='5')";
            $STQ3n = mysqli_query($link,$f3n);
            $syrie3n = mysqli_num_rows($STQ3n); 
            
        $syrieN=$syrie1n+$syrie2n+$syrie3n;

    //pour EMSP
    //soins infirmiers
        //choix1
        $g1n="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='1'  and candidats.choix1= 'IE'";
        $IE1n = mysqli_query($link,$g1n);
        $italie1n = mysqli_num_rows($IE1n); 

        //choix2
            $g2n="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='1'  and candidats.choix2= 'IE'";
            $IE2n = mysqli_query($link,$g2n);
            $italie2n = mysqli_num_rows($IE2n); 

        //choix3
            $g3n="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='1'  and candidats.choix3= 'IE'";
            $IE3n = mysqli_query($link,$g3n);
            $italie3n = mysqli_num_rows($IE3n); 
            
        $italieN=$italie1n+$italie2n+$italie3n;

    //soins obstetricaux
        //choix1
        $h1n="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='1'  and candidats.choix1= 'SF'";
        $SF1n = mysqli_query($link,$h1n);
        $soudan1n = mysqli_num_rows($SF1n); 

        //choix2
            $h2n="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='1'  and candidats.choix2= 'SF'";
            $SF2n = mysqli_query($link,$h2n);
            $soudan2n = mysqli_num_rows($SF2n); 

        //choix3
            $h3n="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='1'  and candidats.choix3= 'SF'";
            $SF3n = mysqli_query($link,$h3n);
            $soudan3n = mysqli_num_rows($SF3n); 
            
        $soudanN=$soudan1n+$soudan2n+$soudan3n;


    //IFERE
    //formation des profs
        //choix1
        $i1n="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='1'  and candidats.choix1= 'RE' AND (id_type='1' OR id_type='4' OR id_type='5')";
        $RE1n = mysqli_query($link,$i1n);
        $roumanie1n = mysqli_num_rows($RE1n); 

        //choix2
            $i2n="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='1'  and candidats.choix2= 'RE' AND (id_type='1' OR id_type='4' OR id_type='5')";
            $RE2n = mysqli_query($link,$i2n);
            $roumanie2n = mysqli_num_rows($RE2n); 

        //choix3
            $i3n="SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='1'  and candidats.choix3= 'RE' AND (id_type='1' OR id_type='4' OR id_type='5')";
            $RE3n = mysqli_query($link,$i3n);
            $roumanie3n = mysqli_num_rows($RE3n); 
            
      

        //formation des profs Fomboni -> Moroni

        $amnim = mysqli_query($link,"SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='3' and (candidats.choix1= 'RE' or candidats.choix2='RE' or candidats.choix3='RE') AND (id_type='1' OR id_type='4' OR id_type='5')");
        $amniM = mysqli_num_rows($amnim);

        //formation des profs Patsy -> Moroni

        $amnia = mysqli_query($link,"SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='2' and (candidats.choix1= 'RE' or candidats.choix2='RE' or candidats.choix3='RE') AND (id_type='1' OR id_type='4' OR id_type='5')");
        $amniA = mysqli_num_rows($amnia);

        //Lettre angalaise 
        //Ngazidja

        $anga1=mysqli_query($link,"SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='1'  and candidats.choix1='LLA'");
        $angA1=mysqli_num_rows($anga1);
        $anga2=mysqli_query($link,"SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='1'  and candidats.choix2='LLA'");
        $angA2=mysqli_num_rows($anga2);
        $anga3=mysqli_query($link,"SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='1'  and candidats.choix3='LLA'  ");
        $angA3=mysqli_num_rows($anga3);
        $totalNg= $angA1 + $angA2 + $angA3;

        //Anjouan

        //$angan1=mysqli_query($link,"SELECT * FROM candidats WHERE traitant_recu='anjouan' AND traitant_recu='nouria'  and choix1= 'LAM'");
        $angan1=mysqli_query($link,"SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='2'  and candidats.choix1='LLA'  ");
        //$reA=mysqli_num_rows($sqA);
        $angAn1=mysqli_num_rows($angan1);
        //$angan2=mysqli_query($link,"SELECT * FROM candidats WHERE traitant_recu='anjouan' and traitant_recu='nouria'  and choix2= 'LAM'");
        $angan2=mysqli_query($link,"SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='2'  and candidats.choix2='LLA'  ");
        $angAn2=mysqli_num_rows($angan2);
        //$angan3=mysqli_query($link,"SELECT * FROM candidats WHERE traitant_recu='anjouan' and traitant_recu='nouria'  and choix3= 'LAM'");
        $angan3=mysqli_query($link,"SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='2'  and candidats.choix3= 'LLA'  ");
        $angAn3=mysqli_num_rows($angan3);
        $totalAn= $angAn1+$angAn2+$angAn3;

        //Moheli

        $angn1=mysqli_query($link,"SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='3'  and candidats.choix1='LLA' ");
        $angN1=mysqli_num_rows($angn1);
        $angn2=mysqli_query($link,"SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='3'  and candidats.choix2='LLA'  ");
        $angN2=mysqli_num_rows($angn2);
        $angn3=mysqli_query($link,"SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and  users.id_ile='3'  and candidats.choix3='LLA'  ");
        $angN3=mysqli_num_rows($angn3);
        $totalN= $angN1+$angN2+$angN3;


        $roumanieN=$roumanie1n+$roumanie2n+$roumanie3n+$amniM+$amniA;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaires - Université des Comores</title>
    <link rel="shortcut icon" href="./assets/img/udc.png">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="./node_modules/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="./assets/css/main.css">
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
                    case 8:include('interfaces/adminRubrique.php'); break;
                    
                    }
                ?>
                                <li class="bord"><a href="#"><i class="icon-user"></i> &nbsp; <span class="nav-item-text">Changer mon mot de passe</span></a></li>
                                <li>
                                <li><a href="deconnexion.php"><i class="icon-logout"></i> &nbsp; <span class="nav-item-text">Déconnexion</span></a></li>
                                
                         </ul>       
                    </nav>
                </aside>
                <main class="main-content">
                <h5 align="right" style="color:black"> <strong><?php echo  $_SESSION['prenom']." ".$_SESSION['nom'] ?></strong></h5>

        <h5 align="right" style="color:#00b185;"> <strong><?php echo  $_SESSION['libelle']; ?></strong></h5>
                <p align="center"> <?php echo (date('d-m-Y'));?></p>
            <div class="text-center mb-5">


                <hr />
              
            </div>
            
        <div class="text-right">
            <button onClick="imprimer('sectionAimprimer')" class="btn btn-primary">Imprimer </button> 
        </div>
        <div id='sectionAimprimer'>

        <h2 class="soft-title-2" align="center" style="color:black;">Nombre de pr&eacute;inscrits dans les concours</h2>
 
        <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Composante</th>
                                    <th >D&eacute;partement</th>
                                    <th scope="col">Ngazidja</th>
                                    <th scope="col">Anjouan</th>
                                    <th scope="col">Moh&eacute;li</th>
                                    <th scope="col">Total</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                <TR>
                                    <TH ROWSPAN=7>IUT</TH>
                                <TR>
                                    <TD>GEA</TD>
                                    <TD><?php echo $gabonN." (".$mouznaA." A)"." (".$mouznaM." M)" ?></TD> 
                                    <TD><?php echo $gabonA." (".$thouraN." N)"." (".$thouraM." M)" ?></TD> 
                                    <TD><?php echo $gabonM ." (".$nasraN." N)"." (".$nasraA." A)" ?></TD>
                                    <TD><?php echo $gabonN+$gabonA+$gabonM ?></TD>
                                </TR>
                                
                                    <TD>Commerce</TD> 
                                    <TD><?php echo $comoresN ?></TD> 
                                    <TD><?php echo $comoresA ?></TD> 
                                    <TD><?php echo $comoresM ?></TD>
                                    <TD><?php echo $comoresN+$comoresA+$comoresM ?></TD>
                                </TR>
                                <TR><TD>Tourisme</TD> 
                                    <TD><?php echo $ethiopieN ?></TD>
                                    <TD><?php echo $ethiopieA ?></TD>
                                    <TD><?php echo $ethiopieM ?></TD>
                                    <TD><?php echo $ethiopieN+$ethiopieA+$ethiopieM ?></TD>
                                <TR>
                                    <TD>G&eacute;nie Informatique</TD>
                                    <TD><?php echo $ghanaN ?></TD> 
                                    <TD><?php echo $ghanaA ?></TD>
                                    <TD><?php echo $ghanaM ?></TD>
                                    <TD><?php echo $ghanaN+$ghanaA+$ghanaM ?></TD>
                                </TR>

                                <TR>
                                    <TD>G&eacute;nie Civil</TD> 
                                    <TD><?php echo $hongrieN ?></TD> 
                                    <TD><?php echo $hongrieA ?></TD> 
                                    <TD><?php echo $hongrieM ?></TD>
                                    <TD><?php echo $hongrieN+$hongrieA+$hongrieM ?></TD>
                                </TR>
                                <TR>
                                    <TD>Statistique</TD> 
                                    <TD><?php echo $syrieN ?></TD> 
                                    <TD><?php echo $syrieA ?></TD> 
                                    <TD><?php echo $syrieM ?></TD>
                                    <TD><?php echo $syrieN+$syrieA+$syrieM ?></TD>
                                </TR>


                                
                                <TR><TH colspan=2>Total IUT</TH>
                                     
                                    <TD><?php echo $gabonN+$comoresN+$ethiopieN+$ghanaN+$hongrieN+$syrieN  ?></TD> 
                                    <TD><?php echo $gabonA+$comoresA+$ethiopieA+$ghanaA+$hongrieA+$syrieA  ?></TD> 
                                    <TD><?php echo $gabonM+$comoresM+$ethiopieM+$ghanaM+$hongrieM+$syrieM  ?></TD>
                                    <?php echo 
                                        $IutN=$gabonN+$comoresN+$ethiopieN+$ghanaN+$hongrieN+$syrieN ;
                                        $IutA=$gabonA+$comoresA+$ethiopieA+$ghanaA+$hongrieA+$syrieA ;
                                        $IutM=$gabonM+$comoresM+$ethiopieM+$ghanaM+$hongrieM+$syrieM ;
                                    ?>
                                    <TD><?php echo $IutN+$IutA+$IutM ?></TD>
                                <TR>
                                    

                                </TR>
                                <TR>
                                    <TH ROWSPAN=2>EMSP</TH>
                                    <TD>Soins Infirmiers</TD> 
                                    <TD><?php echo $italieN ?></TD> 
                                    <TD><?php echo $italieA ?></TD> 
                                    <TD><?php echo $italieM ?></TD>
                                    <TD><?php echo $italieN+$italieA+$italieM ?></TD>

                                <TR>
                                    <TD>Soins Obst&eacute;tricaux</TD> 
                                    <TD><?php echo $soudanN ?></TD> 
                                    <TD><?php echo $soudanA ?></TD> 
                                    <TD><?php echo $soudanM ?></TD>
                                    <TD><?php echo $soudanN+$soudanA+$soudanM ?></TD>
                                </TR>
                                <TR><TH colspan=2>Total EMSP</TH>
                                     
                                    <TD><?php echo $italieN+$soudanN ?></TD> 
                                    <TD><?php echo $italieA+$soudanA ?></TD> 
                                    <TD><?php echo $italieM+$soudanM ?></TD>
                                    <?php echo 
                                        $EmspN=$italieN+$soudanN ;
                                        $EmspA=$italieA+$soudanA;
                                        $EmspM=$italieM+$soudanM ;
                                    ?>
                                    <TD><?php echo  $EmspN+ $EmspA+ $EmspM ?></TD>
                                <TR>
                              
                                <TR><TH>IFERE</TH>
                                    <TD>Formation des profs d&#146;&eacute;cole</TD> 
                                    <TD><?php echo $roumanieN ."  (".$amniA." A)"."  (".$amniM." M)"?></TD> 
                                    <TD><?php echo $roumanieA ."  (".$nourN." N)"."  (".$nourM." M)"?></TD> 
                                    <TD><?php echo $roumanieM ."  (".$rahN." N)"."  (".$rahA." A)"?></TD>
                                    <TD><?php echo $roumanieN+$roumanieA+$roumanieM ?></TD>
                                </TR>
                                <TR><TH colspan=2>TOTAL IFERE</TH>
                                      
                                     <TD><?php echo $roumanieN ?></TD> 
                                     <TD><?php echo $roumanieA ?></TD>
                                     <TD><?php echo $roumanieM ?></TD>
                                     <TD><?php echo $roumanieN+$roumanieA+$roumanieM?></TD>
                                <TR>
                                <TR><TH>FLSH</TH>
                                    <TD>Langue et littérature anglaises</TD> 
                                    <TD><?php echo $totalNg ?></TD> 
                                    <TD><?php echo $totalAn ?></TD> 
                                    <TD><?php echo $totalN ?></TD>
                                    <TD><?php echo $totalNg+$totalAn+$totalN?></TD>
                                </TR>
                                <TR><TH colspan=2>TOTAL FLSH</TH>
                                      
                                     <TD><?php echo $totalNg ?></TD> 
                                     <TD><?php echo $totalAn ?></TD>
                                     <TD><?php echo $totalN ?></TD>
                                     <TD><?php echo $totalNg+$totalAn+$totalN?></TD>
                                <TR>
                                <TR><TH colspan=2>TOTAL UDC</TH>
                                      
                                     <TD><?php echo $totalNg+$IutN+$EmspN+$roumanieN ?></TD> 
                                     <TD><?php echo $totalAn+$IutA+$EmspA+$roumanieA ?></TD>
                                     <TD><?php echo $totalN+$IutM+$EmspM+$roumanieM ?></TD>
                                     <!--<TD><?php /*echo $IutN+$IutA+$IutM+$EmspN+ $EmspA+ $EmspM+$IutN+$EmspN+$roumanieN+$IutA+$EmspA+$roumanieA+$IutM+$EmspM+$roumanieM+$totalNg+$totalAn+$totalN*/?></TD>-->
                                     <TD><?php echo $totalNg+$IutN+$EmspN+$roumanieN+$totalAn+$IutA+$EmspA+$roumanieA+$totalN+$IutM+$EmspM+$roumanieM?></TD>
                                <TR>
                                                        
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                    
             

                                
                               
            <div class="row">
                <div class="col-md-6">
                    <h6 style="margin-left:60px;margin-top:20px;">Le <STRONG>&nbsp;<?php echo (date('d/m/Y'));?></STRONG></h6></b></h5> 
                </div>
                <div class="col-md-6">
                    <h6 style="margin-right:0px;margin-top:20px;"><STRONG>Signature: </h6> 
                </div>
		    </div>
        
        </div>
    
            
        </main>

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