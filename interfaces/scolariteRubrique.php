<?php
//session_start();
    if(isset($_SESSION['login']) and $_SESSION['cat']=="4"){?>
    
<ul class="nav-items">
            <li><a href="userInterface.php"><i class="icon-grid"></i> &nbsp; <span class="nav-item-text">Tableau de bord</span></a></li>
             <li class="bord"><a href="choix.php"><i class="icon-check"></i> &nbsp; <span class="nav-item-text">Valider une candidature</span></a></li>
            <!-- <li>
                <a data-toggle="collapse" href="#collapseMenu4" role="button" aria-expanded="false" aria-controls="collapseMenu4"><i class="icon-menu"></i> &nbsp; <span class="nav-item-text">Afficher les listes </span></a>
                 <ul class="menu-dd collapse" id="collapseMenu4">
                     <li><a href="departement_liste.php?id_type=1"><i class="icon-list"></i> &nbsp; 1<sup>er</sup> année</a></li>
                     <li><a href="departement_liste.php?id_type=2"><i class="icon-list"></i> &nbsp; 2<sup>ème</sup> ou 3<sup>ème</sup> année</a></li>
                     <li><a href="departement_liste.php?id_type=5"><i class="icon-list"></i> &nbsp; Master</a></li>
                     <li><a href="departement_liste.php?id_type=3"><i class="icon-list"></i> &nbsp; Transfert</a></li> 
                     <li><a href="departement_liste.php?id_type=4"><i class="icon-list"></i> &nbsp; Reprise</a></li>
                </ul>
                 <li>
                    <a data-toggle="collapse" href="#collapseMenu14" role="button" aria-expanded="false" aria-controls="collapseMenu14"><i class=""></i> &nbsp; <span class="nav-item-text">Préinscriptions</span></a>
                    <ul class="menu-dd collapse" id="collapseMenu14">
                    <li><a href="concoursOuNon.php?id_type=1"><i class="icon-doc"></i>  &nbsp; 1<sup>er</sup> année</a></li>
                        <li><a href="concoursOuNon.php?id_type=2"><i class="icon-doc"></i> &nbsp; 2<sup>ème</sup> et 3<sup>ème</sup> année </a></a></li>
                        <li><a href="concoursOuNon.php?id_type=3"><i class="icon-doc"></i> &nbsp; Transfert</a></li>
                        <li><a href="concoursOuNon.php?id_type=4"><i class="icon-doc"></i> &nbsp; Reprise</a></li>
                        <li><a href="concoursOuNon.php?id_type=5"><i class="icon-doc"></i> &nbsp; Master</a></li>
                    </ul>
                 </li>
                 <li>
                 liste d'inscription
                 <a data-toggle="collapse" href="#collapseMenu13" role="button" aria-expanded="false" aria-controls="collapseMenu13"><i class=""></i> &nbsp; <span class="nav-item-text">Inscriptions</span></a>
                    <ul class="menu-dd collapse" id="collapseMenu13">
                            <li><a href="choix_dep_ins.php?type=1"><i class="icon-list"></i> &nbsp; 1<sup>er</sup> année</a></li>
                            <li><a href="choix_dep_ins.php?type=2"><i class="icon-list"></i> &nbsp; 2<sup>ème</sup> </a></li>
                            <li><a href="choix_dep_ins.php?type=3"><i class="icon-list"></i> &nbsp; 3<sup>ème</sup> année</a></li>
                            <li><a href="choix_dep_ins.php?type=4"><i class="icon-list"></i> &nbsp; Master 1</a></li>
                            <li><a href="choix_dep_ins.php?type=5"><i class="icon-list"></i> &nbsp; Master 2</a></li>
                        </ul>
                 </li>
                
                
            </li>   -->

            <li>
                    <a data-toggle="collapse" href="#collapseMenu16" role="button" aria-expanded="false" aria-controls="collapseMenu16"><i class="icon-menu"></i> &nbsp; <span class="nav-item-text">Afficher les listes</span></a>
                    <ul class="menu-dd collapse" id="collapseMenu16">
    
                    
                   <li>
                    <a data-toggle="collapse" href="#collapseMenu14" role="button" aria-expanded="false" aria-controls="collapseMenu14"><i class=""></i> &nbsp; <span class="nav-item-text">Préinscrits</span></a>
                    <ul class="menu-dd collapse" id="collapseMenu14">
                    <li><a href="concoursOuNon.php?id_type=1"><i class="icon-doc"></i>  &nbsp; 1<sup>er</sup> année</a></li>
                        <li><a href="concoursOuNon.php?id_type=2"><i class="icon-doc"></i> &nbsp; 2<sup>ème</sup> année</a></li>
                        <li><a href="concoursOuNon.php?id_type=3"><i class="icon-doc"></i> &nbsp; 3<sup>ème</sup> année </a></a></a></li>
                        <li><a href="concoursOuNon.php?id_type=4"><i class="icon-doc"></i> &nbsp; Transfert</a></li>
                        <li><a href="concoursOuNon.php?id_type=5"><i class="icon-doc"></i> &nbsp; Reprise</a></li>
                          <li><a href="concoursOuNon.php?id_type=6"><i class="icon-doc"></i> &nbsp; Master1</a></li>
                        <li><a href="concoursOuNon.php?id_type=7"><i class="icon-doc"></i> &nbsp; Master2</a></li>
                    </ul>
                 </li>
                 <li>
           
                 <a data-toggle="collapse" href="#collapseMenu13" role="button" aria-expanded="false" aria-controls="collapseMenu13"><i class=""></i> &nbsp; <span class="nav-item-text">Inscrits</span></a>
                    <ul class="menu-dd collapse" id="collapseMenu13">
                            <li><a href="dep.php?type=1"><i class="icon-list"></i> &nbsp; 1<sup>er</sup> année</a></li>
                            <li><a href="dep.php?type=2"><i class="icon-list"></i> &nbsp; 2<sup>ème</sup> année</a></li>
                            <li><a href="dep.php?type=3"><i class="icon-list"></i> &nbsp; 3<sup>ème</sup> année</a></li>
                            <li><a href="dep.php?type=4"><i class="icon-list"></i> &nbsp; Master 1</a></li>
                            <li><a href="dep.php?type=5"><i class="icon-list"></i> &nbsp; Master 2</a></li>
                        </ul>
                 </li>
                 </ul>
                </li>
                

<?php }
?>

