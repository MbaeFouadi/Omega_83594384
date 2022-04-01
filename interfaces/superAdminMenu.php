<?php
include('connexion.php');
$a=date('Y');
$aa=$a+1;
//$an_univ=$a."-".$aa;
$xD=mysqli_query($link,'SELECT * FROM annee ORDER BY id_annee DESC');
$f1=mysqli_fetch_array($xD);
$an_univ=$f1['Annee'];
//$an_univ="2019-2020";


                                            //PREINSCRIPTION

//Ngazidja
/*$sqlN=mysqli_query($link,"SELECT * FROM candidats WHERE traitant_recu <> 'anjouan' and traitant_recu <> 'moheli' ");
$preinscriN=mysqli_num_rows($sqlN);

$sqN=mysqli_query($link,"SELECT * FROM candidats WHERE traitant_recu <> 'anjouan' and traitant_recu <> 'moheli' and  statut=2 ");
$retrait_fichN=mysqli_num_rows($sqN);

$sN=mysqli_query($link,"SELECT * FROM candidats WHERE traitant_recu <> 'anjouan' and traitant_recu <> 'moheli' and  statut=3 ");
$depotN=mysqli_num_rows($sN);*/
$sqlN=mysqli_query($link,"SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and users.id_ile= '1' ");
$preinscriN=mysqli_num_rows($sqlN);

$sqN=mysqli_query($link,"SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and users.id_ile='1'  and  candidats.statut=2 ");
$retrait_fichN=mysqli_num_rows($sqN);

$sN=mysqli_query($link,"SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and users.id_ile='1' and  candidats.statut=3 ");
$depotN=mysqli_num_rows($sN);

//Anjouan
/*$sqlA=mysqli_query($link,"SELECT * FROM candidats WHERE traitant_recu ='anjouan' ");
$preinscriA=mysqli_num_rows($sqlA);

$sqA=mysqli_query($link,"SELECT * FROM candidats WHERE traitant_recu ='anjouan' and  statut=2 ");
$retrait_fichA=mysqli_num_rows($sqA);

$sA=mysqli_query($link,"SELECT * FROM candidats WHERE traitant_recu ='anjouan' and  statut=3 ");
$depotA=mysqli_num_rows($sA);*/

$sqlA=mysqli_query($link,"SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and users.id_ile='2' ");
$preinscriA=mysqli_num_rows($sqlA);

$sqA=mysqli_query($link,"SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and users.id_ile='2' and  candidats.statut=2 ");
$retrait_fichA=mysqli_num_rows($sqA);

$sA=mysqli_query($link,"SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and users.id_ile='2' and  candidats.statut=3 ");
$depotA=mysqli_num_rows($sA);


//Moheli
/*$sqlM=mysqli_query($link,"SELECT * FROM candidats WHERE  traitant_recu = 'moheli' ");
$preinscriM=mysqli_num_rows($sqlM);

$sqM=mysqli_query($link,"SELECT * FROM candidats WHERE  traitant_recu = 'moheli' and  statut=2 ");
$retrait_fichM=mysqli_num_rows($sqM);

$sM=mysqli_query($link,"SELECT * FROM candidats WHERE traitant_recu = 'moheli' and  statut=3 ");
$depotM=mysqli_num_rows($sM);*/

$sqlM=mysqli_query($link,"SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and users.id_ile= '3' ");
$preinscriM=mysqli_num_rows($sqlM);

$sqM=mysqli_query($link,"SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and users.id_ile = '3' and  candidats.statut=2 ");
$retrait_fichM=mysqli_num_rows($sqM);

$sM=mysqli_query($link,"SELECT * FROM users,candidats WHERE users.login=candidats.traitant_recu and users.id_ile= '3' and  candidats.statut=3 ");
$depotM=mysqli_num_rows($sM);


                                                    //INSCRIPTION

//Ngazidja
$sqlNi=mysqli_query($link,"SELECT * FROM  inscription,departement WHERE inscription.code_depart=departement.code_depart and departement.code_facult <> 'SP' and departement.code_facult <> 'AUM' and Annee='$an_univ' ");
$inscriN=mysqli_num_rows($sqlNi);

$sqNi=mysqli_query($link,"SELECT * FROM  post_inscription WHERE  Annee='$an_univ' ");
$fichN=mysqli_num_rows($sqNi);

$sNi=mysqli_query($link,"SELECT * FROM  post_inscription,quitus WHERE quitus.num_auto=post_inscription.num_auto and  post_inscription.code_facult <> 'SP' and post_inscription.code_facult <> 'AUM' and quitus.Annee='$an_univ' and post_inscription.Annee='$an_univ'  ");
$quitusN=mysqli_num_rows($sNi);

//Anjouan
$sqlAi=mysqli_query($link,"SELECT * FROM inscription,departement WHERE inscription.code_depart=departement.code_depart and departement.code_facult = 'SP' and Annee='$an_univ' ");
$inscriA=mysqli_num_rows($sqlAi);

$sqAi=mysqli_query($link,"SELECT * FROM  users,post_inscription WHERE users.login=post_inscription.traitant_fiche and users.id_ile='2' and Annee='$an_univ'");
$fichA=mysqli_num_rows($sqAi);

$sAi=mysqli_query($link,"SELECT * FROM  quitus,post_inscription WHERE quitus.num_auto=post_inscription.num_auto and  post_inscription.code_facult='SP' and quitus.Annee='$an_univ' and post_inscription.Annee='$an_univ' ");
$quitusA=mysqli_num_rows($sAi);


//Moheli
$sqlMi=mysqli_query($link,"SELECT * FROM inscription,departement WHERE  inscription.code_depart=departement.code_depart  and departement.code_facult = 'AUM' and Annee='$an_univ' and Annee='$an_univ' ");
$inscriM=mysqli_num_rows($sqlMi);

$sqMi=mysqli_query($link,"SELECT * FROM  users,post_inscription WHERE users.login=post_inscription.traitant_fiche and users.id_ile='3' and Annee='$an_univ'");
$fichM=mysqli_num_rows($sqMi);

$sMi=mysqli_query($link,"SELECT * FROM  post_inscription,quitus WHERE quitus.num_auto=post_inscription.num_auto and  post_inscription.code_facult='AUM' and quitus.Annee='$an_univ' and post_inscription.Annee='$an_univ' ");
$quitusM=mysqli_num_rows($sMi);



?>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="mini-card linear-card">
                        <div class="icon-card">
                            <i class="icon-people"></i>
                        </div>
                        <div class="caption-card">
                            <h5 class="card-title">Utilisateurs Actifs</h5>
                            <?php 
                            $req=mysqli_query($link,"SELECT count(*) as nbr FROM users WHERE statut='1'"); 
                           $data= mysqli_fetch_array($req)?>
                            <span class="card-val-text"><?php echo $data['nbr'] ?></span>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                <div class="mini-card linear-card">
                    <div class="icon-card">
                        <i class="icon-people"></i>
                    </div>
                    <?php 
                            $requ=mysqli_query($link,"SELECT count(*) as nbre FROM users WHERE connecte='1'"); 
                           $datas= mysqli_fetch_array($requ)?>
                    <div class="caption-card">
                        <h5 class="card-title">Utilisateurs Connéctés</h5>
                        <span class="card-val-text"><?php echo $datas['nbre'] ?></span>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="mini-card linear-card">
                    <div class="icon-card">
                        <i class="icon-pencil"></i>
                    </div>
                    <?php 
                    $reque=mysqli_query($link,"SELECT count(*) as nbree FROM candidats"); 
                   $da= mysqli_fetch_array($reque)?>
                    <div class="caption-card">
                        <h5 class="card-title">Candidats Preinscrits</h5>
                        <span class="card-val-text"><?php echo $preinscriA+$preinscriN+$preinscriM /*$da['nbree']*/ ?></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="mini-card linear-card">
                    <div class="icon-card">
                        <i class="icon-pencil"></i>
                    </div>
                    <?php 
                    $reque=mysqli_query($link,"SELECT count(*) as nbree FROM etudiant"); 
                   $dat= mysqli_fetch_array($reque)?>
                    <div class="caption-card">
                        <h5 class="card-title">Etudiants Inscrits</h5>
                        <span class="card-val-text"><?php echo $inscriN+$inscriA+$inscriM /*$dat['nbree']*/?></span>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <h2 style="margin-bottom:40px">Ngazidja</h2>
                    <h5>Préinscrits:<?php echo $preinscriN ?></h5>
                    <h5>Retraits fiche:<?php echo $retrait_fichN?></h5>
                    <h5>Dépot dossier:<?php echo $depotN ?></h5>
                    <h5>Retrait autorisation de paiement : <?php echo $fichN?></h5>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <h2 style="margin-bottom:40px">Anjouan</h2>
                    <h5>Préinscrits:<?php echo $preinscriA ?></h5>
                    <h5>Retraits fiche:<?php echo $retrait_fichA?></h5>
                    <h5>Dépot dossier:<?php echo $depotA ?></h5>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" >
                    <h2 style="margin-bottom:40px">Mohéli</h2>
                    <h5>Préinscrits:<?php echo $preinscriM ?></h5>
                    <h5>Retraits fiche:<?php echo $retrait_fichM ?></h5>
                    <h5>Dépot dossier:<?php echo $depotM ?></h5>
                </div>
            </div>
        </div>  

                       


        <!-- <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <h2 style="margin-bottom:40px">Ngazidja</h2>
                    <h5>Preinscrits : <?php echo $preinscriN?></h5>
                    <h5>Inscrits : <?php echo $inscriN ?></h5>
                    <h5>Retrait autorisation de paiement : <?php echo $fichN?></h5>
                    <h5>Retrait quitus : <?php echo $quitusN ?></h5>
                    <h5>Retrait fiche renseignement :<?php echo $inscriN ?> </h5>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <h2 style="margin-bottom:40px">Anjouan</h2>
                    <h5>Preinscrits : <?php echo $preinscriA?></h5>
                    <h5>Inscrits : <?php echo $inscriA ?></h5>
                    <h5>Retrait autorisation de paiement : <?php echo $fichA?></h5>
                    <h5>Retrait quitus : <?php echo $quitusA ?></h5>
                    <h5>Retrait fiche renseignement :<?php echo $inscriA ?> </h5>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" >
                    <h2 style="margin-bottom:40px">Mohéli</h2>
                    <h5>Preinscrits : <?php echo $preinscriM?></h5>
                    <h5>Inscrits : <?php echo $inscriM ?></h5>
                    <h5>Retrait autorisation de paiement : <?php echo $fichM ?></h5>
                    <h5>Retrait quitus : <?php echo $quitusM ?></h5>
                   <h5>Retrait fiche renseignement :<?php echo $inscriM ?> </h5>
                </div>
            </div>
        </div>     -->
    </main>
</section>

