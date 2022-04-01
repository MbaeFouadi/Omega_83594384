<?php
//session_start();
    if(isset($_SESSION['login']) and $_SESSION['cat']=="8"){?>

                <ul class="nav-items">
                    <li><a href="userInterface.php"><i class="icon-grid"></i> &nbsp; <span class="nav-item-text">Tableau de bord</span></a></li>

                    <!--
                        <li>
                        <a data-toggle="collapse" href="#collapseMenu1" role="button" aria-expanded="false" aria-controls="collapseMenu1"><i class="icon-pencil"></i> &nbsp; <span class="nav-item-text">Préinscription </span></a>
                        <ul class="menu-dd collapse" id="collapseMenu1">
                        <li><a href="preInsCompta.php?id_type=1"><i class="icon-note"></i> &nbsp; 1<sup>er</sup> année</a></li>
                        <li><a href="preInsCompta.php?id_type=2"><i class="icon-note"></i> &nbsp; 2<sup>ème</sup> ou 3<sup>ème</sup> année</a></li>
                        <li><a href="preInsCompta.php?id_type=5"><i class="icon-note"></i> &nbsp; Master</a></li>
                        <li><a href="enregistFiche.php?id_type=3"><i class="icon-note"></i> &nbsp;Transfert</a></li>
                        <li><a href="enregistReprise.php?id_type=4"><i class="icon-note"></i> &nbsp; Reprise</a></li>
                        </ul>

                    </li>

                    <li><a href="verif_recu.php"><i class="icon-printer"></i> &nbsp; <span class="nav-item-text">Imprimer une fiche</a></li> -->
                    <!--<li>
                    <a data-toggle="collapse" href="#collapseMenu1" role="button" aria-expanded="false" aria-controls="collapseMenu1"><i class="icon-clock"></i> &nbsp; <span class="nav-item-text">Fixer une date de fin</span></a></a>
                        <ul class="menu-dd collapse" id="collapseMenu1">
                        <li><a href="fixation_fin.php"><i class="icon-clock"></i> &nbsp;Fin Preinsription</a></li>-->
                        <!--?id_type=1 ne sais pas ce que c'est -->
                        <!--<li><a href="fixation_fin_ins.php"><i class="icon-clock"></i> &nbsp;Fin Inscription</a></li>
                        </ul>
                    </li>-->
                    <!-- <li><a href="#"><i class="icon-note"></i> &nbsp; <span class="nav-item-text">Inscription</span></a></li> -->


                    <!--<li><a href="creationCompte.php"><i class="icon-people"></i> &nbsp; <span class="nav-item-text">Ajout des Utilisateurs</span></a></li>
                    <li><a href="listeUtilisa.php"><i class="icon-people"></i> &nbsp; <span class="nav-item-text">Liste des Utilisateurs</span></a></li>-->
                    <li>
                        <a data-toggle="collapse" href="#collapseMenu10" role="button" aria-expanded="false" aria-controls="collapseMenu5"><i class="icon-pencil"></i> &nbsp; <span class="nav-item-text">Modification...</span></a>
                        <ul class="menu-dd collapse" id="collapseMenu10">
                            <li><a href="recherche_etud.php"><i class=""></i> &nbsp;un étudiant</a></li>
                            <li><a href="retenu.php"><i class=""></i> &nbsp;Choix retenu</a></li>
                            <li><a href="modi_sexe.php"><i class=""></i> &nbsp;Sexe</a></li>

                            <!--<li><a href="rech_fiche_renseign.php"><i class=""></i> Un candidat</a></li>-->
                        </ul>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#collapseMenu11" role="button" aria-expanded="false" aria-controls="collapseMenu6"><i class="icon-pencil"></i> &nbsp; <span class="nav-item-text">Supprimer...</span></a>
                        <ul class="menu-dd collapse" id="collapseMenu11">
                            <li><a href="suppression.php"><i class=""></i> &nbsp;Autorisation de paie</a></li>
                            
                            <!--<li><a href="rech_fiche_renseign.php"><i class=""></i> Un candidat</a></li>-->
                        </ul>
                    </li>
                    <!-- <li><a href="#"><i class="icon-settings"></i> &nbsp; <span class="nav-item-text">Gestion Admin</span></a></li> -->
                    <!-- <li><a href="#"><i class="icon-folder-alt"></i> &nbsp; <span class="nav-item-text">Resultats</span></a></li>
                    <li><a href="dep_op_cl.php"><i class="icon-options"></i> &nbsp; <span class="nav-item-text">Ouvrir/fermer un departement</span></a></li>
                    <li> -->
                        <!-- <a data-toggle="collapse" href="#collapseMenu2" role="button" aria-expanded="false" aria-controls="collapseMenu1"><i class="icon-direction"></i> &nbsp; <span class="nav-item-text">Admission</span></a>
                        <ul class="menu-dd collapse" id="collapseMenu2">
                            <li><a href=""><i class="icon-doc"></i> &nbsp; Ecole / Institut</a></li>
                            <li><a href=""><i class="icon-doc"></i> &nbsp; Faculté</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="icon-notebook"></i> &nbsp; <span class="nav-item-text">Scolarité</span></a></li>
                    <li><a href="#"><i class="icon-info"></i> &nbsp; <span class="nav-item-text">Renseignements</span></a></li>
                    <li> -->

                <!--     <li>
                            <a data-toggle="collapse" href="#collapseMenu4" role="button" aria-expanded="false" aria-controls="collapseMenu4"><i class="icon-menu"></i> &nbsp; <span class="nav-item-text">Afficher les listes </span></a>
                            <ul class="menu-dd collapse" id="collapseMenu4">
                            <li><a href="concoursOuNon.php?id_type=1"><i class="icon-list"></i> &nbsp; 1<sup>er</sup> année</a></li>
                            <li><a href="choix_dep_trans.php?id_type=2"><i class="icon-list"></i> &nbsp; 2<sup>ème</sup> ou 3<sup>ème</sup> année</a></li>
                            <li><a href="choix_dep_trans.php?id_type=5"><i class="icon-list"></i> &nbsp; Master</a></li>
                            <li><a href="concoursOuNon.php?id_type=3"><i class="icon-list"></i> &nbsp; Transfert</a></li>
                            <li><a href="choix_dep_trans.php?id_type=4"><i class="icon-list"></i> &nbsp; Reprise</a></li>
                        </ul>

                    </li>
                     -->

                    <li>
                            <a data-toggle="collapse" href="#collapseMenu4" role="button" aria-expanded="false" aria-controls="collapseMenu4"><i class="icon-menu"></i> &nbsp; <span class="nav-item-text">Afficher les listes </span></a>
                            <ul class="menu-dd collapse" id="collapseMenu4">
                            <li><a href="choix_dep_ins.php?type=1"><i class="icon-list"></i> &nbsp; 1<sup>er</sup> année</a></li>
                            <li><a href="choix_dep_ins.php?type=2"><i class="icon-list"></i> &nbsp; 2<sup>ème</sup> </a></li>
                            <li><a href="choix_dep_ins.php?type=3"><i class="icon-list"></i> &nbsp; 3<sup>ème</sup> année</a></li>
                            <li><a href="choix_dep_ins.php?type=4"><i class="icon-list"></i> &nbsp; Master 1</a></li>
                            <li><a href="choix_dep_ins.php?type=5"><i class="icon-list"></i> &nbsp; Master 2</a></li>
                        </ul>

                    </li>
                    <!--<li>
                    <a data-toggle="collapse" href="#collapseMenu2" role="button" aria-expanded="false" aria-controls="collapseMenu2"><i class="icon-calculator"></i> &nbsp; <span class="nav-item-text">Situation comptable</span></a>
                    <ul class="menu-dd collapse" id="collapseMenu2">
                        <li><a href="situationJparA.php"><i class="icon-user"></i> &nbsp; Journalière par agent</a></li>
                        <li><a href="situationP.php"><i class="icon-clock"></i> &nbsp; Durant une periode</a></li>

                    </ul>-->
  <!--Menu statistique -->
  <li>
                    <a data-toggle="collapse" href="#collapseMenu3" role="button" aria-expanded="false" aria-controls="collapseMenu3"><i class="icon-graph"></i> &nbsp; <span class="nav-item-text">Statistiques</span></a>
                    <ul class="menu-dd collapse" id="collapseMenu3">
    
                    <!--Statistique de préincription -->
                  <li>
                    <a data-toggle="collapse" href="#collapseMenu5" role="button" aria-expanded="false" aria-controls="collapseMenu3"><i class="icon-graph"></i> &nbsp; <span class="nav-item-text">Préinscriptions</span></a>
                    <ul class="menu-dd collapse" id="collapseMenu5">
                    <li><a href="nbropargenre.php"><i class="icon-doc"></i> &nbsp; Nombre de préinscrits par genre</a></li>
                        <li><a href="preins_par_type.php"><i class="icon-doc"></i> &nbsp;Nombre des préinscrits par type de préinscription</a></li>
                        <li><a href="preins_ile_genre.php"><i class="icon-doc"></i> &nbsp; Nombre de préinscription par Ile et par genre</a></li>
                        <li><a href="preinscriConcours.php"><i class="icon-doc"></i> &nbsp; Nombre de préinscrits dans les concours</a></li>
                        <li><a href="nbrparchoix.php"><i class="icon-doc"></i> &nbsp; Nombre de préinscrits dans les autres départements par choix</a></li>
                    </ul>
                 </li>
                 <li>
                 <!--Statistique d'inscription-->
                 <a data-toggle="collapse" href="#collapseMenu6" role="button" aria-expanded="false" aria-controls="collapseMenu3"><i class="icon-graph"></i> &nbsp; <span class="nav-item-text">Inscriptions</span></a>
                    <ul class="menu-dd collapse" id="collapseMenu6">
                    <li><a href="nbr_ins_genre.php"><i class="icon-doc"></i> &nbsp; Nombre d'inscrits par genre</a></li>
                        <li><a href="ins_par_type.php"><i class="icon-doc"></i> &nbsp;Nombre d'inscrits par type d'inscription</a></li>
                        <li><a href="inscri_ile_genre.php"><i class="icon-doc"></i> &nbsp; Nombre d'inscription par Ile et par genre</a></li>
                        <!--<li><a href="inscriConcours.php"><i class="icon-doc"></i> &nbsp; Nombre d'inscrits dans les concours</a></li>
                        <li><a href="nbre_inscri_depart.php"><i class="icon-doc"></i> &nbsp; Nombre d'inscrits dans les autres départements par choix</a></li>-->
                    </ul>
                 </li>
                 </ul>
                </li>
<?php }
?>
