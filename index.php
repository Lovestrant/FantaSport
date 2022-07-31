<?php
session_start();

$phonenumber =$password = '';
$errors = array("phonenumberErr" => "", "success" => "");

include_once('db.php');


$result = "SELECT * FROM wpv7_fanta90_sports_quote";

$details= mysqli_query($con,$result);
$QueryResult= mysqli_num_rows($details);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports</title>

    <!--Css link-->
    <link rel="stylesheet" type="text/css" href="css/fanta90-sports-style.css">
    <link rel="stylesheet" type="text/css" href="css/fanta90-sports-admin-style.css">
    <!--Bootstrap css Links -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!--Bootstrap JS Links -->
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

    <!--JS Links -->
    <script type="text/javascript" src="js/fanta90-sports-admin-script.js"></script>

    <!--JS Links -->
    <script type="text/javascript" src="js/fanta90-sports-admin-style.js"></script>


</head>




<body>

<a id="reset" href="login.php"> Login.</a>
<a href="register.php" id="register">Signup</a><br><br>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
<div class="fs-container">
    <div class="team-module">
        <div class="tm-module-sec">
            <h2 class="tm-module-head">TEAM MODULE</h2>
            <div class="tm-module-opt">
                <div class="tm-module-box">
                    <input type="radio" id="3-5-2" name="tm-module" class="tm-module" checked>
                    <label for="3-5-2" class="tm-module-lbl">3-5-2</label>
                </div>
                <div class="tm-module-box">
                    <input type="radio" id="3-4-3" name="tm-module" class="tm-module">
                    <label for="3-4-3" class="tm-module-lbl">3-4-3</label>
                </div>
                <div class="tm-module-box">
                    <input type="radio" id="4-5-1" name="tm-module" class="tm-module">
                    <label for="4-5-1" class="tm-module-lbl">4-5-1 </label>
                </div>
                <div class="tm-module-box">
                    <input type="radio" id="4-4-2" name="tm-module" class="tm-module">
                    <label for="4-4-2" class="tm-module-lbl">4-4-2</label>
                </div>
                <div class="tm-module-box">
                    <input type="radio" id="4-3-3" name="tm-module" class="tm-module">
                    <label for="4-3-3" class="tm-module-lbl">4-3-3</label>
                </div>
                <div class="tm-module-box">
                    <input type="radio" id="5-3-2" name="tm-module" class="tm-module">
                    <label for="5-3-2" class="tm-module-lbl">5-3-2</label>

                </div>
                <div class="tm-module-box">
                    <input type="radio" id="5-4-1" name="tm-module" class="tm-module">
                    <label for="5-4-1" class="tm-module-lbl">5-4-1</label>
                </div>
            </div>
        </div>
    </div>
    <div class="mob-credit-sec">
        <!-- <div class="fs-credit-box"> -->
            <span class="credit-lbl">Total Credit</span>
            <div id="m_credit" class="credit_id">150</div>
        <!-- </div> -->
    </div>
    <div class="fs-wrapper">
        <div class="fs-player-field">
            <div class="fs-fps fs-mf-A fs-mf-A2">
                <div class="fsf-mp-c add_forward mpf-1" id="mpf-1" data-table="add_forward" data-form="add_forward">
                    <div class="fsf-m-player fsf-plyr-a">+</div>
                    <div class="fsf-mp-de"></div>
                </div>
                <div class="fsf-mp-c add_forward mpf-2" id="mpf-2" data-table="add_forward" data-form="add_forward">
                    <div class="fsf-m-player fsf-plyr-a">+</div>
                    <div class="fsf-mp-de"></div>
                </div>
            </div>
            <div class="fs-fps fs-mf-A fs-mf-A3">
                <div class="fsf-mp-c add_forward mpf-1" id="mpf-1" data-table="add_forward" data-form="add_forward">
                    <div class="fsf-m-player fsf-plyr-a">+</div>
                    <div class="fsf-mp-de"></div>
                </div>
                <div class="fsf-mp-c add_forward mpf-2" id="mpf-2" data-table="add_forward" data-form="add_forward">
                    <div class="fsf-m-player fsf-plyr-a">+</div>
                    <div class="fsf-mp-de"></div>
                </div>
                <div class="fsf-mp-c add_forward mpf-3" id="mpf-3" data-table="add_forward" data-form="add_forward">
                    <div class="fsf-m-player fsf-plyr-a">+</div>
                    <div class="fsf-mp-de"></div>
                </div>
            </div>
            <div class="fs-fps fs-mf-A fs-mf-A1">
                <div class="fsf-mp-c add_forward mpf-1" id="mpf-1" data-table="add_forward" data-form="add_forward">
                    <div class="fsf-m-player fsf-plyr-a">+</div>
                    <div class="fsf-mp-de"></div>
                </div>
            </div>

            <div class="fs-fps fs-mf-C fs-mf-C5">
                <div class="fsf-mp-c add_forward mpm-1" id="mpm-1" data-table="add_midfiel" data-form="add_forward">
                    <div class="fsf-m-player fsf-plyr-c">+</div>
                    <div class="fsf-mp-de"></div>
                </div>
                <div class="fsf-mp-c add_forward mpm-2" id="mpm-2" data-table="add_midfiel" data-form="add_forward">
                    <div class="fsf-m-player fsf-plyr-c">+</div>
                    <div class="fsf-mp-de"></div>
                </div>
                <div class="fsf-mp-c add_forward mpm-3" id="mpm-3" data-table="add_midfiel" data-form="add_forward">
                    <div class="fsf-m-player fsf-plyr-c">+</div>
                    <div class="fsf-mp-de"></div>
                </div>
                <div class="fsf-mp-c add_forward mpm-4" id="mpm-4" data-table="add_midfiel" data-form="add_forward">
                    <div class="fsf-m-player fsf-plyr-c">+</div>
                    <div class="fsf-mp-de"></div>
                </div>
                <div class="fsf-mp-c add_forward mpm-5" id="mpm-5" data-table="add_midfiel" data-form="add_forward">
                    <div class="fsf-m-player fsf-plyr-c">+</div>
                    <div class="fsf-mp-de"></div>
                </div>
            </div>
            <div class="fs-fps fs-mf-C fs-mf-C4">
                <div class="fsf-mp-c add_forward mpm-1" id="mpm-1" data-table="add_midfiel" data-form="add_forward">
                    <div class="fsf-m-player fsf-plyr-c">+</div>
                    <div class="fsf-mp-de"></div>
                </div>
                <div class="fsf-mp-c add_forward mpm-2" id="mpm-2" data-table="add_midfiel" data-form="add_forward">
                    <div class="fsf-m-player fsf-plyr-c">+</div>
                    <div class="fsf-mp-de"></div>
                </div>
                <div class="fsf-mp-c add_forward mpm-3" id="mpm-3" data-table="add_midfiel" data-form="add_forward">
                    <div class="fsf-m-player fsf-plyr-c">+</div>
                    <div class="fsf-mp-de"></div>
                </div>
                <div class="fsf-mp-c add_forward mpm-4" id="mpm-4" data-table="add_midfiel" data-form="add_forward">
                    <div class="fsf-m-player fsf-plyr-c">+</div>
                    <div class="fsf-mp-de"></div>
                </div>
            </div>
            <div class="fs-fps fs-mf-C fs-mf-C3">
                <div class="fsf-mp-c add_forward mpm-1" id="mpm-1" data-table="add_midfiel" data-form="add_forward">
                    <div class="fsf-m-player fsf-plyr-c">+</div>
                    <div class="fsf-mp-de"></div>
                </div>
                <div class="fsf-mp-c add_forward mpm-2" id="mpm-2" data-table="add_midfiel" data-form="add_forward">
                    <div class="fsf-m-player fsf-plyr-c">+</div>
                    <div class="fsf-mp-de"></div>
                </div>
                <div class="fsf-mp-c add_forward mpm-3" id="mpm-3" data-table="add_midfiel" data-form="add_forward">
                    <div class="fsf-m-player fsf-plyr-c">+</div>
                    <div class="fsf-mp-de"></div>
                </div>
            </div>

            <div class="fs-fps fs-mf-D fs-mf-D5">
                <div class="fsf-mp-c add_forward mpd-1" id="mpd-1" data-table="add_defend" data-form="add_forward">
                    <div class="fsf-m-player fsf-plyr-d">+</div>
                    <div class="fsf-mp-de"></div>
                </div>
                <div class="fsf-mp-c add_forward mpd-2" id="mpd-2" data-table="add_defend" data-form="add_forward">
                    <div class="fsf-m-player fsf-plyr-d">+</div>
                    <div class="fsf-mp-de"></div>
                </div>
                <div class="fsf-mp-c add_forward mpd-3" id="mpd-3" data-table="add_defend" data-form="add_forward">
                    <div class="fsf-m-player fsf-plyr-d">+</div>
                    <div class="fsf-mp-de"></div>
                </div>
                <div class="fsf-mp-c add_forward mpd-4" id="mpd-4" data-table="add_defend" data-form="add_forward">
                    <div class="fsf-m-player fsf-plyr-d">+</div>
                    <div class="fsf-mp-de"></div>
                </div>
                <div class="fsf-mp-c add_forward mpd-5" id="mpd-5" data-table="add_defend" data-form="add_forward">
                    <div class="fsf-m-player fsf-plyr-d">+</div>
                    <div class="fsf-mp-de"></div>
                </div>
            </div>
            <div class="fs-fps fs-mf-D fs-mf-D4">
                <div class="fsf-mp-c add_forward mpd-1" id="mpd-1" data-table="add_defend" data-form="add_forward">
                    <div class="fsf-m-player fsf-plyr-d">+</div>
                    <div class="fsf-mp-de"></div>
                </div>
                <div class="fsf-mp-c add_forward mpd-2" id="mpd-2" data-table="add_defend" data-form="add_forward">
                    <div class="fsf-m-player fsf-plyr-d">+</div>
                    <div class="fsf-mp-de"></div>
                </div>
                <div class="fsf-mp-c add_forward mpd-3" id="mpd-3" data-table="add_defend" data-form="add_forward">
                    <div class="fsf-m-player fsf-plyr-d">+</div>
                    <div class="fsf-mp-de"></div>
                </div>
                <div class="fsf-mp-c add_forward mpd-4" id="mpd-4" data-table="add_defend" data-form="add_forward">
                    <div class="fsf-m-player fsf-plyr-d">+</div>
                    <div class="fsf-mp-de"></div>
                </div>
            </div>
            <div class="fs-fps fs-mf-D fs-mf-D3">
                <div class="fsf-mp-c add_forward mpd-1" id="mpd-1" data-table="add_defend" data-form="add_forward">
                    <div class="fsf-m-player fsf-plyr-d">+</div>
                    <div class="fsf-mp-de"></div>
                </div>
                <div class="fsf-mp-c add_forward mpd-2" id="mpd-2" data-table="add_defend" data-form="add_forward">
                    <div class="fsf-m-player fsf-plyr-d">+</div>
                    <div class="fsf-mp-de"></div>
                </div>
                <div class="fsf-mp-c add_forward mpd-3" id="mpd-3" data-table="add_defend" data-form="add_forward">
                    <div class="fsf-m-player fsf-plyr-d">+</div>
                    <div class="fsf-mp-de"></div>
                </div>
            </div>

            <div class="fs-fps fs-mf-P">
                <div class="fsf-mp-c add_forward mpg-1" id="mpg-1" data-table="add_gkeeper" data-form="add_forward">
                    <div class="fsf-m-player fsf-plyr-p">+</div>
                    <div class="fsf-mp-de"></div>
                </div>
            </div>
            
            <div class="fs-fps fs-f-A">
                <!-- get field players for desktop screens -->
            </div>
            <div class="fs-fps fs-f-C">
                <!-- get field players for desktop screens -->
            </div>
            <div class="fs-fps fs-f-D">
                <!-- get field players for desktop screens -->
            </div>
            <div class="fs-fps fs-f-P">
                <!-- <div class="fsf-player fp-1">1</div> -->
            </div>
            <img src="<?=$pluginPath?>images/soccer-match-field.jpg" alt="soccer field">
        </div>
        <div class="fs-data-table">
        
            <div class="fs-tabs">
                <ul class="fs-tabs-list-bar">
                    <h2 class="fs-table-heading">PLAYER LIST</h2>
                    <div class="fs-tabs-list">
                        <li class="active"><a href="#tab1">All</a></li>
                        <li ><a class="fs-tab-link" href="#tab2">Goalkeepers</a></li>
                        <li ><a class="fs-tab-link" href="#tab3">Defenders</a></li>
                        <li ><a class="fs-tab-link" href="#tab4">Midfielders</a></li>
                        <li ><a class="fs-tab-link" href="#tab5">Forwards</a></li>
                    </div>
                </ul>
        
                <div class="snf-sec fs-hidden">
                    <h2 class="snf-sec-heading">SEARCH BY</h2>
                    <div class="snf-field-sec">
                        <select class="snf-inp" name="" id="srch_by">
                            <option value="">Select</option>
                            <option value="1">NAME</option>
                            <option value="2">ROLE</option>
                            <option value="3">CLUB</option>
                            <option value="4">QUOTE</option>
                        </select>
                        <input class="snf-inp" id="search_inp" type="text">
                        <input type="number" class="snf-inp quote-search fs-hidden" min="0" name="" id="max" placeholder="max">
                        <input type="number" class="snf-inp quote-search fs-hidden" min="0" name="" id="min" placeholder="min">
                        <button class="snf-btn" id="snf_search">SEARCH</button>
                        <button class="snf-btn" id="snf_clear">CLEAR</button>
                    </div>
                </div>
        
                <div id="tab1" class="fs-tab active">
                    <div class="tab-sec-header">
                        <div class="tab-sec-head">
                            <h2 class="tab-sec-heading">All</h2>
                            <span class="srch-btn" data-table-id="all_table">Search</span>
                        </div>
                        <div class="fs-credit-box">
                            <span class="credit-lbl">Total Credit</span>
                            <div class="credit_id">150</div>
                        </div>
                    </div>
                    <table class="fs-table" id="all_table">
                        <thead class="fs-table-head">
                            <tr>
                                <th class="header__item_a id_sh_a">
                                    <a id="id_h_a" class="th_a filter__link_a filter__link--number_a filter__link--active_a" href="#"> #<i class="fs-ico fas fa-sort"></i> </a>
                                </th>
                                <th class="header__item_a name_sh_a">
                                    <a id="name_h_a" class="th_a filter__link_a" href="#">NAME<i class="fs-ico fas fa-sort"></i></a>
                                </th>
                                <th class="header__item_a role_sh_a">
                                    <a id="role_h_a" class="th_a filter__link_a" href="#">ROLE<i class="fs-ico fas fa-sort"></i></a>
                                </th>
                                <th class="tx-c header__item_a club_sh_a">
                                    <a id="club_h_a" class="th_a filter__link_a" href="#">CLUB<i class="fs-ico fas fa-sort"></i></a>
                                </th>
                                <th class="tx-c header__item_a quote_sh_a">
                                    <a id="quote_h_a" class="th_a filter__link_a filter__link--number_a" href="#">QUOTE<i class="fs-ico fas fa-sort"></i></a>
                                </th>
                                
                                <th class="tx-c">ACTION</th>
                            </tr>
                        </thead>
                        <tbody class="tbody_a">
                            <?php
                            if($QueryResult) {
                                while($row = mysqli_fetch_assoc($details)) {

                                    $role = strtolower($row['fsq_r']);
                                    $role_p = $role =='p'? 'Goalkeeper': '';
                                    $role_d = $role =='d'? 'Defender': '';
                                    $role_c =  $role =='c'? 'Midfielder': '';
                                    $role_a =  $role =='a'? 'Forward': '';
                            

                            ?>
                            <tr class="table-row">
                                <td class="table-data id_sh_a fst-col"><?=$row['fsq_id']?></td>
                                <td class="table-data name_sh_a"><?=$row['fsq_n']?></td>
                                <td class="table-data role_sh_a"><?= $role_p . $role_d . $role_c . $role_a?></td>
                                <td class="table-data club_sh_a tx-c"><?=$row['fsq_s']?></td>
                                <td class="table-data quote_sh_a tx-c"><?=$row['fsq_q']?></td>
                                <td class="tx-c">
                                    <button href="#" data-quote="<?=$row['fsq_q']?>" data-id="<?=$row['fsq_id']?>" data-role="<?=$row['fsq_r']?>" data-name="<?=$row['fsq_n']?>" class="add-btn"></button>
                                </td>
                            </tr>
                            <?php }}?>
                        </tbody>
                    </table>
                </div>
                <div id="tab2" class="fs-tab">
                    <div class="tab-sec-header">
                        <div class="tab-sec-head">
                            <h2 class="tab-sec-heading">Goalkeepers</h2>
                            <span class="srch-btn" data-table-id="gkeeper_table">Search</span>
                        </div>
                        <div class="fs-credit-box">
                            <span class="credit-lbl">Total Credit</span>
                            <div class="credit_id">150</div>
                        </div>
                    </div>
                    <table class="fs-table" id="gkeeper_table">
                        <thead class="fs-table-head">
                            <tr>
                                <th class="header__item_g id_sh_g">
                                    <a id="id_h_g" class="th_a filter__link_g filter__link--number_g filter__link--active_g" href="#"> #<i class="fs-ico fas fa-sort"></i> </a>
                                </th>
                                <th class="header__item_g name_sh_g">
                                    <a id="name_h_g" class="th_a filter__link_g" href="#">NAME<i class="fs-ico fas fa-sort"></i></a>
                                </th>
                                <th class="header__item_g role_sh_g">
                                    <a id="role_h_g" class="th_a filter__link_g" href="#">ROLE<i class="fs-ico fas fa-sort"></i></a>
                                </th>
                                <th class="tx-c header__item_g club_sh_g">
                                    <a id="club_h_g" class="th_a filter__link_g" href="#">CLUB<i class="fs-ico fas fa-sort"></i></a>
                                </th>
                                <th class="tx-c header__item_g quote_sh_g">
                                    <a id="quote_h_g" class="th_a filter__link_g filter__link--number_g" href="#">QUOTE<i class="fs-ico fas fa-sort"></i></a>
                                </th>
                                
                                <th class="tx-c">ACTION</th>
                            </tr>
                        </thead>
                        <tbody class="tbody_g">
                            <?php
                                $count = 0;
                                foreach($data as $d){
                                    $role = strtolower($d->fsq_r);
                                    $role_p = $role =='p'? 'Goalkeeper': '';
                                    if($role =='p'){
                                        $count += 1;
                            ?>
                            <tr class="table-row">
                                <td class="table-data id_sh_g fst-col"><?=$count?></td>
                                <td class="table-data name_sh_g"><?=$d->fsq_n?></td>
                                <td class="table-data role_sh_g"><?= $role_p?></td>
                                <td class="table-data club_sh_g tx-c"><?=$d->fsq_s?></td>
                                <td class="table-data quote_sh_g tx-c"><?=$d->fsq_q?></td>
                                <td class="tx-c">
                                    <button href="#" data-quote="<?=$d->fsq_q?>" data-id="<?=$d->fsq_id?>" data-role="<?=$d->fsq_r?>" data-name="<?=$d->fsq_n?>" class="add-btn"></button>
                                </td>
                            </tr>
                            <?php
                                    } 
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div id="tab3" class="fs-tab">
                    <div class="tab-sec-header">
                        <div class="tab-sec-head">
                            <h2 class="tab-sec-heading">Defenders</h2>
                            <span class="srch-btn" data-table-id="defend_table">Search</span>
                        </div>
                        <div class="fs-credit-box">
                            <span class="credit-lbl">Total Credit</span>
                            <div class="credit_id">150</div>
                        </div>
                    </div>
                    <table class="fs-table" id="defend_table">
                        <thead class="fs-table-head">
                            <tr>
                            <th class="header__item_d id_sh_d">
                                    <a id="id_h_d" class="th_a filter__link_d filter__link--number_d filter__link--active_d" href="#"> #<i class="fs-ico fas fa-sort"></i> </a>
                                </th>
                                <th class="header__item_d name_sh_d">
                                    <a id="name_h_d" class="th_a filter__link_d" href="#">NAME<i class="fs-ico fas fa-sort"></i></a>
                                </th>
                                <th class="header__item_d role_sh_d">
                                    <a id="role_h_d" class="th_a filter__link_d" href="#">ROLE<i class="fs-ico fas fa-sort"></i></a>
                                </th>
                                <th class="tx-c header__item_d club_sh_d">
                                    <a id="club_h_d" class="th_a filter__link_d" href="#">CLUB<i class="fs-ico fas fa-sort"></i></a>
                                </th>
                                <th class="tx-c header__item_d quote_sh_d">
                                    <a id="quote_h_d" class="th_a filter__link_d filter__link--number_d" href="#">QUOTE<i class="fs-ico fas fa-sort"></i></a>
                                </th>
                                
                                <th class="tx-c">ACTION</th>
                            </tr>
                        </thead>
                        <tbody class="tbody_d">
                            <?php
                                $count = 0;
                                foreach($data as $d){
                                    $role = strtolower($d->fsq_r);
                                    $role_d = $role =='d'? 'Defender': '';
                                    if($role =='d'){
                                        $count += 1;
                            ?>
                            <tr class="table-row">
                                <td class="table-data id_sh_d fst-col"><?=$count?></td>
                                <td class="table-data name_sh_d"><?=$d->fsq_n?></td>
                                <td class="table-data role_sh_d"><?= $role_d?></td>
                                <td class="table-data club_sh_d tx-c"><?=$d->fsq_s?></td>
                                <td class="table-data quote_sh_d tx-c"><?=$d->fsq_q?></td>
                                <td class="tx-c">
                                    <button href="#" data-quote="<?=$d->fsq_q?>" data-id="<?=$d->fsq_id?>" data-role="<?=$d->fsq_r?>" data-name="<?=$d->fsq_n?>" class="add-btn"></button>
                                </td>
                            </tr>
                            <?php
                                    } 
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div id="tab4" class="fs-tab">
                    <div class="tab-sec-header">
                        <div class="tab-sec-head">
                            <h2 class="tab-sec-heading">Midfielders</h2>
                            <span class="srch-btn" data-table-id="midfield_table">Search</span>
                        </div>
                        <div class="fs-credit-box">
                            <span class="credit-lbl">Total Credit</span>
                            <div class="credit_id">150</div>
                        </div>
                    </div>
                    <table class="fs-table" id="midfield_table">
                        <thead class="fs-table-head">
                            <tr>
                                <th class="header__item_m id_sh_m">
                                    <a id="id_h_m" class="th_a filter__link_m filter__link--number_m filter__link--active_m" href="#"> #<i class="fs-ico fas fa-sort"></i> </a>
                                </th>
                                <th class="header__item_m name_sh_m">
                                    <a id="name_h_m" class="th_a filter__link_m" href="#">NAME<i class="fs-ico fas fa-sort"></i></a>
                                </th>
                                <th class="header__item_m role_sh_m">
                                    <a id="role_h_m" class="th_a filter__link_m" href="#">ROLE<i class="fs-ico fas fa-sort"></i></a>
                                </th>
                                <th class="tx-c header__item_m club_sh_m">
                                    <a id="club_h_m" class="th_a filter__link_m" href="#">CLUB<i class="fs-ico fas fa-sort"></i></a>
                                </th>
                                <th class="tx-c header__item_m quote_sh_m">
                                    <a id="quote_h_m" class="th_a filter__link_m filter__link--number_m" href="#">QUOTE<i class="fs-ico fas fa-sort"></i></a>
                                </th>
                                
                                <th class="tx-c">ACTION</th>
                            </tr>
                        </thead>
                        <tbody class="tbody_m">
                            <?php
                                $count = 0;
                                foreach($data as $d){
                                    $role = strtolower($d->fsq_r);
                                    $role_c =  $role =='c'? 'Midfielder': '';
                                    if($role =='c'){
                                        $count += 1;
                            ?>
                            <tr class="table-row">
                                <td class="table-data id_sh_m fst-col"><?=$count?></td>
                                <td class="table-data name_sh_m"><?=$d->fsq_n?></td>
                                <td class="table-data role_sh_m"><?= $role_c?></td>
                                <td class="table-data club_sh_m tx-c"><?=$d->fsq_s?></td>
                                <td class="table-data quote_sh_m tx-c"><?=$d->fsq_q?></td>
                                <td class="tx-c">
                                    <button href="#" data-quote="<?=$d->fsq_q?>" data-id="<?=$d->fsq_id?>" data-role="<?=$d->fsq_r?>" data-name="<?=$d->fsq_n?>" class="add-btn"></button>
                                </td>
                            </tr>
                            <?php
                                    } 
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div id="tab5" class="fs-tab">
                    <div class="tab-sec-header">
                        <div class="tab-sec-head">
                            <h2 class="tab-sec-heading">Forwards</h2>
                            <span class="srch-btn" data-table-id="forwards_table">Search</span>
                        </div>
                        <div class="fs-credit-box">
                            <span class="credit-lbl">Total Credit</span>
                            <div class="credit_id">150</div>
                        </div>
                    </div>
                    <table class="fs-table" id="forwards_table">
                        <thead class="fs-table-head">
                            <tr>
                                <th class="header__item_f id_sh_f">
                                    <a id="id_h_f" class="th_a filter__link_f filter__link--number_f filter__link--active_f" href="#"> #<i class="fs-ico fas fa-sort"></i> </a>
                                </th>
                                <th class="header__item_f name_sh_f">
                                    <a id="name_h_f" class="th_a filter__link_f" href="#">NAME<i class="fs-ico fas fa-sort"></i></a>
                                </th>
                                <th class="header__item_f role_sh_f">
                                    <a id="role_h_f" class="th_a filter__link_f" href="#">ROLE<i class="fs-ico fas fa-sort"></i></a>
                                </th>
                                <th class="tx-c header__item_f club_sh_f">
                                    <a id="club_h_f" class="th_a filter__link_f" href="#">CLUB<i class="fs-ico fas fa-sort"></i></a>
                                </th>
                                <th class="tx-c header__item_f quote_sh_f">
                                    <a id="quote_h_f" class="th_a filter__link_f filter__link--number_f" href="#">QUOTE<i class="fs-ico fas fa-sort"></i></a>
                                </th>
                                
                                <th class="tx-c">ACTION</th>
                            </tr>
                        </thead>
                        <tbody class="m-tbody tbody_f">
                            <?php
                                $count = 0;
                                foreach($data as $d){
                                    $role = strtolower($d->fsq_r);
                                    $role_a =  $role =='a'? 'Forward': '';
                                    if($role =='a'){
                                        $count += 1;
                            ?>
                            <tr class="table-row">
                                <td class="table-data id_sh_f fst-col"><?=$count?></td>
                                <td class="table-data name_sh_f"><?=$d->fsq_n?></td>
                                <td class="table-data role_sh_f"><?= $role_a?></td>
                                <td class="table-data club_sh_f tx-c"><?=$d->fsq_s?></td>
                                <td class="table-data quote_sh_f tx-c"><?=$d->fsq_q?></td>
                                <td class="tx-c">
                                    <button href="#" data-quote="<?=$d->fsq_q?>" data-id="<?=$d->fsq_id?>" data-role="<?=$d->fsq_r?>" data-name="<?=$d->fsq_n?>" class="add-btn"></button>
                                </td>
                            </tr>
                            <?php
                                    } 
                                }
                            ?>
                        </tbody>
                    </table>
                </div>        
            </div>
        </div>
    </div>
    
    <div class="crm-form-reveal-overlay">
        <div class="crm-form-reveal" id="add_forward">
            <div class="crm-form-title-sec">
                <div class="crm-form-title">
                    <div class="crm-title-sec">
                        <div class="add-lend-panel-head">Player list</div>
                        <span class="srch-btn ms-add_forward" data-table-id="ms_for">Search</span>
                        <span class="srch-btn ms-add_midfiel" data-table-id="ms_mid">Search</span>
                        <span class="srch-btn ms-add_defend" data-table-id="ms_def">Search</span>
                        <span class="srch-btn ms-add_gkeeper" data-table-id="ms_gke">Search</span>
                    </div>
                    <button class="close-button" data-close="" aria-label="Close modal" type="button" data-form="add_forward">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            </div>

            <div class="snfm-sec fs-hidden">
                <h2 class="snf-sec-heading">SEARCH BY</h2>
                <div class="snf-field-sec">
                    <select class="snf-inp" name="" id="m_srch_by">
                        <option value="">Select</option>
                        <option value="0">NAME</option>
                        <!-- <option value="2">ROLE</option> -->
                        <option value="2">CLUB</option>
                        <option value="3">QUOTE</option>
                    </select>
                    <input class="snf-inp" id="m_search_inp" type="text">
                    <input type="number" class="snf-inp quote-search fs-hidden" min="0" name="" id="m_max" placeholder="max">
                    <input type="number" class="snf-inp quote-search fs-hidden" min="0" name="" id="m_min" placeholder="min">
                    <button class="snf-btn" id="snfm_search">SEARCH</button>
                    <button class="snf-btn" id="snfm_clear">CLEAR</button>
                </div>
            </div>
                
            <table class="fs-table" id="all_table">
                <!-- <thead class="fs-m-table-head"> -->
                    <!-- </thead> -->
                    <tbody id="ms_for" class="m-tbody tbody_mf m-add_forward">
                        <tr class="fs-m-table-head">
                            <!-- <th class="header__item_a id_sh_a">
                                <a id="id_h_a" class="th_a filter__link_a filter__link--number_a filter__link--active_a" href="#"> #<i class="fs-ico fas fa-sort"></i> </a>
                            </th> -->
                            <th class="tx-c header__item_mf name_sh_mf">
                                <a id="name_h_mf" class="th_f filter__link_mf" href="#">NAME<i class="fs-ico fas fa-sort"></i></a>
                            </th>
                            <th class="tx-c header__item_mf role_sh_mf">
                                <a id="role_h_mf" class="th_f filter__link_mf" href="#">ROLE<i class="fs-ico fas fa-sort"></i></a>
                            </th>
                            <th class="tx-c header__item_mf club_sh_mf">
                                <a id="club_h_mf" class="th_f filter__link_mf" href="#">CLUB<i class="fs-ico fas fa-sort"></i></a>
                            </th>
                            <th class="tx-c header__item_mf quote_sh_mf">
                                <a id="quote_h_mf" class="th_f filter__link_mf filter__link--number_mf" href="#">QUOTE<i class="fs-ico fas fa-sort"></i></a>
                            </th>
                            
                            <th class="tx-c">ACTION</th>
                        </tr>
                    <?php
                        $count = 0;
                        foreach($data as $d){
                            $role = strtolower($d->fsq_r);
                            $role_a =  $role =='a'? 'Forward': '';
                            if($role =='a'){
                                $count += 1; 
                    ?>
                    <tr class="table-row">
                        <td class="tx-c table-data name_sh_mf"><?=$d->fsq_n?></td>
                        <td class="tx-c table-data role_sh_mf"><?= $role_a?></td>
                        <td class="table-data club_sh_mf tx-c"><?=$d->fsq_s?></td>
                        <td class="table-data quote_sh_mf tx-c"><?=$d->fsq_q?></td>
                        <td class="tx-c mf-ad-btn" data-fpid="mpf-1">
                            <!-- <button href="#" data-quote="<?=$d->fsq_q?>" data-id="<?=$d->fsq_id?>" data-role="<?=$d->fsq_r?>" data-name="<?=$d->fsq_n?>" class="add-btn"></button> -->
                            <input class="m-list-radio" data-form="add_forward" type="radio" value="on" name="fo1" id="fo1-<?=$d->fsq_id?>" data-quote="<?=$d->fsq_q?>" data-id="<?=$d->fsq_id?>" data-role="<?=$d->fsq_r?>" data-name="<?=$d->fsq_n?>">
                            <label data-id="<?=$d->fsq_id?>" data-quote="<?=$d->fsq_q?>" class="m-add-btn" data-name="fo1" data-for="fo1-<?=$d->fsq_id?>" for="fo1-<?=$d->fsq_id?>">+</label>
                        </td>
                        <td class="tx-c mf-ad-btn" data-fpid="mpf-2">
                            <!-- <button href="#" data-quote="<?=$d->fsq_q?>" data-id="<?=$d->fsq_id?>" data-role="<?=$d->fsq_r?>" data-name="<?=$d->fsq_n?>" class="add-btn"></button> -->
                            <input class="m-list-radio" data-form="add_forward" type="radio" value="on" name="fo2" id="fo2-<?=$d->fsq_id?>" data-quote="<?=$d->fsq_q?>" data-id="<?=$d->fsq_id?>" data-role="<?=$d->fsq_r?>" data-name="<?=$d->fsq_n?>">
                            <label data-id="<?=$d->fsq_id?>" data-quote="<?=$d->fsq_q?>" class="m-add-btn" data-name="fo2" data-for="fo2-<?=$d->fsq_id?>" for="fo2-<?=$d->fsq_id?>">+</label>
                        </td>
                        <td class="tx-c mf-ad-btn" data-fpid="mpf-3">
                            <!-- <button href="#" data-quote="<?=$d->fsq_q?>" data-id="<?=$d->fsq_id?>" data-role="<?=$d->fsq_r?>" data-name="<?=$d->fsq_n?>" class="add-btn"></button> -->
                            <input class="m-list-radio" data-form="add_forward" type="radio" value="on" name="fo3" id="fo3-<?=$d->fsq_id?>" data-quote="<?=$d->fsq_q?>" data-id="<?=$d->fsq_id?>" data-role="<?=$d->fsq_r?>" data-name="<?=$d->fsq_n?>">
                            <label data-id="<?=$d->fsq_id?>" data-quote="<?=$d->fsq_q?>" class="m-add-btn" data-name="fo3" data-for="fo3-<?=$d->fsq_id?>" for="fo3-<?=$d->fsq_id?>">+</label>
                        </td>
                    </tr>
                    <?php
                            } 
                        }
                    ?>
                </tbody>
                <tbody id="ms_mid" class="m-tbody tbody_mm m-add_midfiel">
                        <tr class="fs-m-table-head">
                            <!-- <th class="header__item_a id_sh_a">
                                <a id="id_h_a" class="th_a filter__link_a filter__link--number_a filter__link--active_a" href="#"> #<i class="fs-ico fas fa-sort"></i> </a>
                            </th> -->
                            <th class="tx-c header__item_mm name_sh_mm">
                                <a id="name_h_mm" class="th_f filter__link_mm" href="#">NAME<i class="fs-ico fas fa-sort"></i></a>
                            </th>
                            <th class="tx-c header__item_mm role_sh_mm">
                                <a id="role_h_mm" class="th_f filter__link_mm" href="#">ROLE<i class="fs-ico fas fa-sort"></i></a>
                            </th>
                            <th class="tx-c header__item_mm club_sh_mm">
                                <a id="club_h_mm" class="th_f filter__link_mm" href="#">CLUB<i class="fs-ico fas fa-sort"></i></a>
                            </th>
                            <th class="tx-c header__item_mm quote_sh_mm">
                                <a id="quote_h_mm" class="th_f filter__link_mm filter__link--number_mm" href="#">QUOTE<i class="fs-ico fas fa-sort"></i></a>
                            </th>
                            
                            <th class="tx-c">ACTION</th>
                        </tr>
                    <?php
                        $count = 0;
                        foreach($data as $d){
                            $role = strtolower($d->fsq_r);
                            $role_a =  $role =='c'? 'Midfielder': '';
                            if($role =='c'){
                                $count += 1;
                    ?>
                    <tr class="table-row">
                        <td class="tx-c table-data name_sh_mm"><?=$d->fsq_n?></td>
                        <td class="tx-c table-data role_sh_mm"><?= $role_a?></td>
                        <td class="table-data club_sh_mm tx-c"><?=$d->fsq_s?></td>
                        <td class="table-data quote_sh_mm tx-c"><?=$d->fsq_q?></td>
                        <td class="tx-c mf-ad-btn" data-fpid="mpm-1">
                            <!-- <button href="#" data-quote="<?=$d->fsq_q?>" data-id="<?=$d->fsq_id?>" data-role="<?=$d->fsq_r?>" data-name="<?=$d->fsq_n?>" class="add-btn"></button> -->
                            <input class="m-list-radio" data-form="add_forward" type="radio" value="on" name="mid1" id="mid1-<?=$d->fsq_id?>" data-quote="<?=$d->fsq_q?>" data-id="<?=$d->fsq_id?>" data-role="<?=$d->fsq_r?>" data-name="<?=$d->fsq_n?>">
                            <label data-id="<?=$d->fsq_id?>" data-quote="<?=$d->fsq_q?>" class="m-add-btn" data-name="mid1" data-for="mid1-<?=$d->fsq_id?>" for="mid1-<?=$d->fsq_id?>">+</label>
                        </td>
                        <td class="tx-c mf-ad-btn" data-fpid="mpm-2">
                            <!-- <button href="#" data-quote="<?=$d->fsq_q?>" data-id="<?=$d->fsq_id?>" data-role="<?=$d->fsq_r?>" data-name="<?=$d->fsq_n?>" class="add-btn"></button> -->
                            <input class="m-list-radio" data-form="add_forward" type="radio" value="on" name="mid2" id="mid2-<?=$d->fsq_id?>" data-quote="<?=$d->fsq_q?>" data-id="<?=$d->fsq_id?>" data-role="<?=$d->fsq_r?>" data-name="<?=$d->fsq_n?>">
                            <label data-id="<?=$d->fsq_id?>" data-quote="<?=$d->fsq_q?>" class="m-add-btn" data-name="mid2" data-for="mid2-<?=$d->fsq_id?>" for="mid2-<?=$d->fsq_id?>">+</label>
                        </td>
                        <td class="tx-c mf-ad-btn" data-fpid="mpm-3">
                            <!-- <button href="#" data-quote="<?=$d->fsq_q?>" data-id="<?=$d->fsq_id?>" data-role="<?=$d->fsq_r?>" data-name="<?=$d->fsq_n?>" class="add-btn"></button> -->
                            <input class="m-list-radio" data-form="add_forward" type="radio" value="on" name="mid3" id="mid3-<?=$d->fsq_id?>" data-quote="<?=$d->fsq_q?>" data-id="<?=$d->fsq_id?>" data-role="<?=$d->fsq_r?>" data-name="<?=$d->fsq_n?>">
                            <label data-id="<?=$d->fsq_id?>" data-quote="<?=$d->fsq_q?>" class="m-add-btn" data-name="mid3" data-for="mid3-<?=$d->fsq_id?>" for="mid3-<?=$d->fsq_id?>">+</label>
                        </td>
                        <td class="tx-c mf-ad-btn" data-fpid="mpm-4">
                            <!-- <button href="#" data-quote="<?=$d->fsq_q?>" data-id="<?=$d->fsq_id?>" data-role="<?=$d->fsq_r?>" data-name="<?=$d->fsq_n?>" class="add-btn"></button> -->
                            <input class="m-list-radio" data-form="add_forward" type="radio" value="on" name="mid4" id="mid4-<?=$d->fsq_id?>" data-quote="<?=$d->fsq_q?>" data-id="<?=$d->fsq_id?>" data-role="<?=$d->fsq_r?>" data-name="<?=$d->fsq_n?>">
                            <label data-id="<?=$d->fsq_id?>" data-quote="<?=$d->fsq_q?>" class="m-add-btn" data-name="mid4" data-for="mid4-<?=$d->fsq_id?>" for="mid4-<?=$d->fsq_id?>">+</label>
                        </td>
                        <td class="tx-c mf-ad-btn" data-fpid="mpm-5">
                            <!-- <button href="#" data-quote="<?=$d->fsq_q?>" data-id="<?=$d->fsq_id?>" data-role="<?=$d->fsq_r?>" data-name="<?=$d->fsq_n?>" class="add-btn"></button> -->
                            <input class="m-list-radio" data-form="add_forward" type="radio" value="on" name="mid5" id="mid5-<?=$d->fsq_id?>" data-quote="<?=$d->fsq_q?>" data-id="<?=$d->fsq_id?>" data-role="<?=$d->fsq_r?>" data-name="<?=$d->fsq_n?>">
                            <label data-id="<?=$d->fsq_id?>" data-quote="<?=$d->fsq_q?>" class="m-add-btn" data-name="mid5" data-for="mid5-<?=$d->fsq_id?>" for="mid5-<?=$d->fsq_id?>">+</label>
                        </td>
                    </tr>
                    <?php
                            } 
                        }
                    ?>
                </tbody>
                <tbody id="ms_def" class="m-tbody tbody_md m-add_defend">
                        <tr class="fs-m-table-head">
                            <!-- <th class="header__item_a id_sh_a">
                                <a id="id_h_a" class="th_a filter__link_a filter__link--number_a filter__link--active_a" href="#"> #<i class="fs-ico fas fa-sort"></i> </a>
                            </th> -->
                            <th class="tx-c header__item_md name_sh_md">
                                <a id="name_h_md" class="th_md filter__link_md" href="#">NAME<i class="fs-ico fas fa-sort"></i></a>
                            </th>
                            <th class="tx-c header__item_md role_sh_md">
                                <a id="role_h_md" class="th_md filter__link_md" href="#">ROLE<i class="fs-ico fas fa-sort"></i></a>
                            </th>
                            <th class="tx-c header__item_md club_sh_md">
                                <a id="club_h_md" class="th_md filter__link_md" href="#">CLUB<i class="fs-ico fas fa-sort"></i></a>
                            </th>
                            <th class="tx-c header__item_md quote_sh_md">
                                <a id="quote_h_md" class="th_md filter__link_md filter__link--number_md" href="#">QUOTE<i class="fs-ico fas fa-sort"></i></a>
                            </th>
                            
                            <th class="tx-c">ACTION</th>
                        </tr>
                    <?php
                        $count = 0;
                        foreach($data as $d){
                            $role = strtolower($d->fsq_r);
                            $role_a =  $role =='d'? 'Defender': '';
                            if($role =='d'){
                                $count += 1;
                    ?>
                    <tr class="table-row">
                        <td class="tx-c table-data name_sh_md"><?=$d->fsq_n?></td>
                        <td class="tx-c table-data role_sh_md"><?= $role_a?></td>
                        <td class="table-data club_sh_md tx-c"><?=$d->fsq_s?></td>
                        <td class="table-data quote_sh_md tx-c"><?=$d->fsq_q?></td>
                        <td class="tx-c mf-ad-btn" data-dpid="mpd-1">
                            <!-- <button href="#" data-quote="<?=$d->fsq_q?>" data-id="<?=$d->fsq_id?>" data-role="<?=$d->fsq_r?>" data-name="<?=$d->fsq_n?>" class="add-btn"></button> -->
                            <input class="m-list-radio" data-form="add_forward" type="radio" value="on" name="mpd1" id="mpd1-<?=$d->fsq_id?>" data-quote="<?=$d->fsq_q?>" data-id="<?=$d->fsq_id?>" data-role="<?=$d->fsq_r?>" data-name="<?=$d->fsq_n?>">
                            <label data-id="<?=$d->fsq_id?>" data-quote="<?=$d->fsq_q?>" class="m-add-btn" data-name="mpd1" data-for="mpd1-<?=$d->fsq_id?>" for="mpd1-<?=$d->fsq_id?>">+</label>
                        </td>
                        <td class="tx-c mf-ad-btn" data-dpid="mpd-2">
                            <!-- <button href="#" data-quote="<?=$d->fsq_q?>" data-id="<?=$d->fsq_id?>" data-role="<?=$d->fsq_r?>" data-name="<?=$d->fsq_n?>" class="add-btn"></button> -->
                            <input class="m-list-radio" data-form="add_forward" type="radio" value="on" name="mpd2" id="mpd2-<?=$d->fsq_id?>" data-quote="<?=$d->fsq_q?>" data-id="<?=$d->fsq_id?>" data-role="<?=$d->fsq_r?>" data-name="<?=$d->fsq_n?>">
                            <label data-id="<?=$d->fsq_id?>" data-quote="<?=$d->fsq_q?>" class="m-add-btn" data-name="mpd2" data-for="mpd2-<?=$d->fsq_id?>" for="mpd2-<?=$d->fsq_id?>">+</label>
                        </td>
                        <td class="tx-c mf-ad-btn" data-dpid="mpd-3">
                            <!-- <button href="#" data-quote="<?=$d->fsq_q?>" data-id="<?=$d->fsq_id?>" data-role="<?=$d->fsq_r?>" data-name="<?=$d->fsq_n?>" class="add-btn"></button> -->
                            <input class="m-list-radio" data-form="add_forward" type="radio" value="on" name="mpd3" id="mpd3-<?=$d->fsq_id?>" data-quote="<?=$d->fsq_q?>" data-id="<?=$d->fsq_id?>" data-role="<?=$d->fsq_r?>" data-name="<?=$d->fsq_n?>">
                            <label data-id="<?=$d->fsq_id?>" data-quote="<?=$d->fsq_q?>" class="m-add-btn" data-name="mpd3" data-for="mpd3-<?=$d->fsq_id?>" for="mpd3-<?=$d->fsq_id?>">+</label>
                        </td>
                        <td class="tx-c mf-ad-btn" data-dpid="mpd-4">
                            <!-- <button href="#" data-quote="<?=$d->fsq_q?>" data-id="<?=$d->fsq_id?>" data-role="<?=$d->fsq_r?>" data-name="<?=$d->fsq_n?>" class="add-btn"></button> -->
                            <input class="m-list-radio" data-form="add_forward" type="radio" value="on" name="mpd4" id="mpd4-<?=$d->fsq_id?>" data-quote="<?=$d->fsq_q?>" data-id="<?=$d->fsq_id?>" data-role="<?=$d->fsq_r?>" data-name="<?=$d->fsq_n?>">
                            <label data-id="<?=$d->fsq_id?>" data-quote="<?=$d->fsq_q?>" class="m-add-btn" data-name="mpd4" data-for="mpd4-<?=$d->fsq_id?>" for="mpd4-<?=$d->fsq_id?>">+</label>
                        </td>
                        <td class="tx-c mf-ad-btn" data-dpid="mpd-5">
                            <!-- <button href="#" data-quote="<?=$d->fsq_q?>" data-id="<?=$d->fsq_id?>" data-role="<?=$d->fsq_r?>" data-name="<?=$d->fsq_n?>" class="add-btn"></button> -->
                            <input class="m-list-radio" data-form="add_forward" type="radio" value="on" name="mpd5" id="mpd5-<?=$d->fsq_id?>" data-quote="<?=$d->fsq_q?>" data-id="<?=$d->fsq_id?>" data-role="<?=$d->fsq_r?>" data-name="<?=$d->fsq_n?>">
                            <label data-id="<?=$d->fsq_id?>" data-quote="<?=$d->fsq_q?>" class="m-add-btn" data-name="mpd5" data-for="mpd5-<?=$d->fsq_id?>" for="mpd5-<?=$d->fsq_id?>">+</label>
                        </td>
                    </tr>
                    <?php
                            } 
                        }
                    ?>
                </tbody>
                <tbody id="ms_gke" class="m-tbody tbody_mg m-add_gkeeper">
                        <tr class="fs-m-table-head">
                            <!-- <th class="header__item_a id_sh_a">
                                <a id="id_h_a" class="th_a filter__link_a filter__link--number_a filter__link--active_a" href="#"> #<i class="fs-ico fas fa-sort"></i> </a>
                            </th> -->
                            <th class="tx-c header__item_mg name_sh_mg">
                                <a id="name_h_mg" class="th_mg filter__link_mg" href="#">NAME<i class="fs-ico fas fa-sort"></i></a>
                            </th>
                            <th class="tx-c header__item_mg role_sh_mg">
                                <a id="role_h_mg" class="th_mg filter__link_mg" href="#">ROLE<i class="fs-ico fas fa-sort"></i></a>
                            </th>
                            <th class="tx-c header__item_mg club_sh_mg">
                                <a id="club_h_mg" class="th_mg filter__link_mg" href="#">CLUB<i class="fs-ico fas fa-sort"></i></a>
                            </th>
                            <th class="tx-c header__item_mg quote_sh_mg">
                                <a id="quote_h_mg" class="th_mg filter__link_mg filter__link--number_mg" href="#">QUOTE<i class="fs-ico fas fa-sort"></i></a>
                            </th>
                            
                            <th class="tx-c">ACTION</th>
                        </tr>
                    <?php
                        $count = 0;
                        foreach($data as $d){
                            $role = strtolower($d->fsq_r);
                            $role_a =  $role =='p'? 'Goalkeeper': '';
                            if($role =='p'){
                                $count += 1;
                    ?>
                    <tr class="table-row">
                        <td class="tx-c table-data name_sh_mg"><?=$d->fsq_n?></td>
                        <td class="tx-c table-data role_sh_mg"><?= $role_a?></td>
                        <td class="table-data club_sh_mg tx-c"><?=$d->fsq_s?></td>
                        <td class="table-data quote_sh_mg tx-c"><?=$d->fsq_q?></td>
                        <td class="tx-c mf-ad-btn" data-fpid="mpg-1">
                            <!-- <button href="#" data-quote="<?=$d->fsq_q?>" data-id="<?=$d->fsq_id?>" data-role="<?=$d->fsq_r?>" data-name="<?=$d->fsq_n?>" class="add-btn"></button> -->
                            <input class="m-list-radio" data-form="add_forward" type="radio" value="on" name="goal1" id="goal1-<?=$d->fsq_id?>" data-quote="<?=$d->fsq_q?>" data-id="<?=$d->fsq_id?>" data-role="<?=$d->fsq_r?>" data-name="<?=$d->fsq_n?>">
                            <label data-id="<?=$d->fsq_id?>" data-quote="<?=$d->fsq_q?>" class="m-add-btn" data-name="goal1" data-for="goal1-<?=$d->fsq_id?>" for="goal1-<?=$d->fsq_id?>">+</label>
                        </td>
                    </tr>
                    <?php
                            } 
                        }
                    ?>
                </tbody>
            </table>
            
            <!-- <br> -->
            
        </div>
    </div>
</div>



      
</body>
</html>