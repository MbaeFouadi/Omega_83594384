<?php
//session_start();
    if(isset($_SESSION['login']) and $_SESSION['cat']=="2"){?>
        <ul class="nav-items">
                     <li><a href="userInterface.php"><i class="icon-grid"></i> &nbsp; <span class="nav-item-text">Tableau de bord</span></a></li>
                        <li>
                            <a data-toggle="collapse" href="#collapseMenu1" role="button" aria-expanded="false" aria-controls="collapseMenu1"><i class="icon-calculator"></i> &nbsp; <span class="nav-item-text">Situation comptable</span></a>
                            <ul class="menu-dd collapse" id="collapseMenu1">
                                <li><a href="situationJparA.php"><i class="icon-user"></i> &nbsp; Journalière par agent</a></li>
                                <li><a href="situationPparA.php"><i class="icon-clock"></i> &nbsp; Durant une periode</a></li>

                            </ul>
                        </li>
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

