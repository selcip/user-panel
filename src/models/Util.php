<?php

class Util{
    function getCharactersInfo(){
        include("conJogo.php");
        $res = $pdo->prepare("SELECT c.name AS nick, c.level AS level, c.meso AS mesos, c.exp AS exp FROM accounts a JOIN characters c ON c.accountid = a.id  WHERE a.id = {$_SESSION['id']}");
        $res->execute();
        if($res->rowCount() == 1){
            $lg = 4;
        }elseif($res->rowCount() == 2){

            $lg = 6;
        }

        while($infos = $res->fetch(PDO::FETCH_ASSOC)){
        $expqfalta = $this->getExpByLevel($infos['level']);

        ?>

    	<div class="panel panel-default">
	    	<div class="panel-heading">
		    	<h3 class="panel-title text-center"><?php echo $infos['nick'] ?></h3>
		    </div>
			<div class="panel-body">
			    <img width="126px" height="126px" src='http://admin-idm-picles.c9users.io/assets/img/GD/create.php?name=<?php echo $infos['nick'] ?>' class="img-responsive center-block">
			    <table class='table table-striped'>
			        <tr>
			            <td class='text-center'>Level:</td>
			        </tr>
			        <tr>
			            <td class='text-center'><?php echo $infos['level'] ?> (EXP: <?php echo  substr(($infos['exp'] * 100) / $expqfalta,0,4) ?>%) </td>
			        </tr>
			        <tr>
			            <td class='text-center'>Mesos:</td>
			        </tr>
			        <tr>
			            <td class='text-center'><?php echo number_format($infos['mesos'], 2, '.', ','); ?></td>
			        </tr>
			    </table>
			</div>
		</div>
        <?php
        $i++;
        }
    }
    function expTable($level){
        $expTable = array(0, 15, 34, 57, 92, 135, 372, 560, 840, 1242, 1716, 2360, 3216, 4200, 5460, 7050, 8840,
        11040, 13716, 16680, 20216, 24402, 28980, 34320, 40512, 47216, 54900, 63666, 73080, 83720, 95700, 108480,
        122760, 138666, 155540, 174216, 194832, 216600, 240500, 266682, 294216, 324240, 356916, 391160, 428280, 468450,
        510420, 555680, 604416, 655200, 709716, 748608, 789631, 832902, 878545, 926689, 977471, 1031036, 1087536,
        1147032, 1209994, 1276301, 1346242, 1420016, 1497832, 1579913, 1666492, 1757815, 1854143, 1955750, 2062925,
        2175973, 2295216, 2420993, 2553663, 2693603, 2841212, 2996910, 3161140, 3334370, 3517093, 3709829, 3913127,
        4127566, 4353756, 4592341, 4844001, 5109452, 5389449, 5684790, 5996316, 6324914, 6671519, 7037118, 7422752,
        7829518, 8258575, 8711144, 9188514, 9692044, 10223168, 10783397, 11374327, 11997640, 12655110, 13348610,
        14080113, 14851703, 15665576, 16524049, 17429566, 18384706, 19392187, 20454878, 21575805, 22758159, 24005306,
        25320796, 26708375, 28171993, 29715818, 31344244, 33061908, 34873700, 36784778, 38800583, 40926854, 43169645,
        45535341, 48030677, 50662758, 53439077, 56367538, 59456479, 62714694, 66151459, 69776558, 73600313, 77633610,
        81887931, 86375389, 91108760, 96101520, 101367883, 106992842, 112782213, 118962678, 125481832, 132358236,
        139611467, 147262175, 155332142, 163844343, 172823012, 182293713, 192283408, 202820538, 213935103, 225658746,
        238024845, 251068606, 264827165, 279339639, 294647508, 310794191, 327825712, 345790561, 364739883, 384727628,
        405810702, 428049128, 451506220, 476248760, 502347192, 529875818, 558913012, 589541445, 621848316, 655925603,
        691870326, 729784819, 769777027, 811960808, 856456260, 903390063, 952895838, 1005114529, 1060194805,
        1118293480, 1179575962, 1244216724, 1312399800, 1384319309, 1460180007, 1540197871, 1624600714, 1713628833,
        1807535693, 1906558648, 2011069705, 2121276324);

        return $expTable[$level];
    }
    function getForumUpdtes(){
        include("conForum.php");
        $pdo->exec("set names utf8");
        $res = $pdo->prepare("SELECT a.tid, p.post, a.views, a.title_seo, a.starter_name, a.title, a.start_date  FROM _ipsforums_topics a JOIN _ipsforums_posts p ON p.topic_id = a.tid WHERE a.forum_id = 5 ORDER BY a.tid DESC LIMIT 4");

        $res->execute();


        while($infos = $res->fetch(PDO::FETCH_ASSOC)){
            $data = date("d",$infos['start_date']) . " de " .  $this->convertMonthLabel(date("m",$infos['start_date'])) . " de " . date("Y",$infos['start_date']) ;
            ?>

            <div class="col-md-6">
                <div class="nk-blog-post">
            		<div class="nk-gap"></div>
            		<h2 class="nk-post-title h4"><a href="blog-article.html"><?php echo $infos['title'] ?></a></h2>
            		<div class="nk-post-by">
            			 por <a href="#"> <?php echo $infos['starter_name'] ?></a> in <?php echo $data; ?>
            		</div>
            		<div class="nk-gap"></div>
            		<div class="nk-post-text">
            			<p><?php echo substr(strip_tags($infos['post']),0,182) ?>...</p>
            		</div>
            		<div class="nk-gap"></div><a class="nk-btn nk-btn-rounded nk-btn-color-dark-3 nk-btn-hover-color-main-1" href="http://forum.idmstory.wtf/index.php?/topic/<?php echo $infos['tid'] .'-' .  $infos['title_seo'] ?>" target="_blank"">Continue Lendo</a>
            	</div>

            </div>
            <?php
        }

    }

    function siteNews($index){
        include("conForum.php");
        $pdo->exec("set names utf8");
        $request = $pdo->prepare("SELECT a.tid, p.post, a.views, a.title_seo, a.starter_name, a.title, a.start_date  FROM _ipsforums_topics a JOIN _ipsforums_posts p ON p.topic_id = a.tid WHERE a.forum_id = 5 ORDER BY a.tid DESC LIMIT 4");
        $request->execute();
        $noticias = $request->fetchAll();

        echo "<h3 class='h4'>". $noticias[$index]['title']. "</h3>";
        echo "<p class='text-white'>". substr(strip_tags($noticias[$index]['post']), 0, 177) ."...</p>";
        echo "<a href='http://forum.idmstory.wtf/index.php?/topic/". $noticias[$index]['tid'] . '-' . $noticias[$index]['title_seo']  ."' target='_blank' class='nk-btn nk-btn-rounded nk-btn-color-white nk-btn-hover-color-main-1'>NOTICIA COMPLETA</a>";
    }

    function semanalNews($index){
        include("conForum.php");

        $data = date(strtotime('-7 days'));
        $pdo->exec("set names utf8");
        $request = $pdo->prepare("SELECT DISTINCT a.tid, a.views, a.title_seo, a.starter_name, a.title, a.start_date  FROM _ipsforums_topics a JOIN _ipsforums_posts p ON p.topic_id = a.tid WHERE a.start_date > {$data} ORDER BY a.views DESC LIMIT 3");
        $request->execute();
        $noticias = $request->fetchAll();

        $data = date("d",$noticias[$index]['start_date']) . " de " .  $this->convertMonthLabel(date("m",$noticias[$index]['start_date'])) . " de " . date("Y",$noticias[$index]['start_date']) ;

        echo "<h3 class='nk-post-title'><a href='http://forum.idmstory.wtf/index.php?/topic/". $noticias[$index]['tid'] . '-' . $noticias[$index]['title_seo']  ."'>" . $noticias[$index]['title'] . "</a></h3>";
        echo "<div class='nk-post-date'><span class='fa fa-calendar'></span>{$data}</div>";
    }

    function convertMonthLabel($month){
        $array = array(
            0 => "",
            1 => "Jan",
            2 => "Fev",
            3 => "Mar",
            4 => "Abri",
            5 => "Mai",
            6 => "Jun",
            7 => "Jul",
            8 => "Ago",
            9 => "Set",
            10 => "Out",
            11 => "Nov",
            12 => "Dez"
            );
            return $array[$month];
    }
    function top5(){
        include("conJogo.php");
        $res = $pdo->prepare("SELECT c.name,c.level,c.fame,c.exp,c.job,c.str,c.dex,c.int,c.luk, g.name as guilda FROM characters c JOIN accounts a ON a.id = c.accountid  JOIN guilds g ON c.guildid = g.guildid  WHERE c.gm < 2 AND a.banned = 0 ORDER BY level DESC LIMIT 5");
        $res->execute();
        $i = 1;
        while($infos = $res->fetch(PDO::FETCH_ASSOC)){
        if($i == 1){
                echo '<div class="nk-news-box-item nk-news-box-item-active">';
            }else{
                echo '<div class="nk-news-box-item ">';

            }
            $exp = $this->expTable($infos['level']);
        ?>

                <div class="nk-news-box-item-img">
                    <img width = "100px" src='http://admin-idm-picles.c9users.io/assets/img/GD/create.php?name=<?php echo $infos['name'] ?>'>
                </div>
                <img src='http://admin-idm-picles.c9users.io/assets/img/GD/create.php?name=<?php echo $infos['name'] ?>' alt="Smell magic in the air. Or maybe barbecue" class="nk-news-box-item-full-img">
                <h3 class="nk-news-box-item-title"><?php echo $infos['name'] ?></h3>

                <span class="nk-news-box-item-categories">
                <span class="bg-main-4">Level: <?php echo $infos['level'] ." (". substr(((100 * $infos['exp']) / $exp),0,4). "%)" ?></span>
                </span>

                <div class="nk-news-box-item-text">
                    <p><?php $this->returnRightJob($infos['job']) ?></p>
                </div>
                <a href="blog-article.html" class="nk-news-box-item-url">Ver ranking completo</a>
                <div class="nk-news-box-item-date"><span class="fa fa-trophy"></span> TOP <?php echo $i ?></div>
                <input type="hidden" id="str" value="<?php echo $infos['str'] ?>">
                <input type="hidden" id="dex" value="<?php echo $infos['dex'] ?>">
                <input type="hidden" id="int" value="<?php echo $infos['int'] ?>">
                <input type="hidden" id="luk" value="<?php echo $infos['luk'] ?>">
                <input type="hidden" id="guid" value="<?php echo $infos['guilda'] ?>">


        </div>

        <?php
        $i++;
        }


    }
    function returnRightJob($hue){
        $array = array(
            000 => "Iniciante",
            100 => "Warrior",
            110 => "Fighter",
            120 => "Page",
            130 => "Spearman",
            111 => "Crusader",
            121 => "White Knight",
            131 => "Dragon Knight",
            112 => "Hero",
            122 => "Paladin",
            132 => "Dark Knight",
            200 => "Magician",
            210 => "Wizard F/P",
            220 => "Wizard L/C",
            230 => "Cleric",
            211 => "Mage F/P",
            221 => "Mage L/C",
            231 => "Priest",
            212 => "Arch Mage F/P",
            222 => "Arch Mage L/C",
            232 => "Bishop",
            300 => "Bowman",
            310 => "Hunter",
            320 => "Crossbowman",
            311 => "Ranger",
            321 => "Sniper",
            312 => "Bow Master",
            322 => "Crossbow Master",
            400 => "Thief",
            410 => "Assassin",
            420 => "Bandit",
            411 => "Hermit",
            421 => "Chief Bandit",
            412 => "Night Lord",
            422 => "Shadower",
            500 => "Pirate",
            510 => "Brawler",
            520 => "Gunslinger",
            511 => "Maraudes",
            521 => "Buccaneer",
            512 => "Outlaw",
            522 => "Corsair",
            900 => "GMs",
            910 => "SuperGM"

            );

        echo $array[$hue];
}
}
