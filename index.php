<html>
<head>
  <title>House API Project</title>
  <link rel="shortcut icon" href="./favicon.ico" type="favicon.ico">
  <link href='http://fonts.googleapis.com/css?family=Share+Tech' rel='stylesheet' type='text/css'>
  <link href='./css/global.css' rel='stylesheet' type='text/css'>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="Content-Language" content="ja" />
  <meta http-equiv="Content-Style-Type" content="text/css" />
  <meta http-equiv="Content-Script-Type" content="text/javascript" />
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <!--[if IE]><script type="text/javascript" src="excanvas.js"></script><![endif]-->
</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

  <div id="wrap">
    <?php include './api_get.php'; ?>
    <div id="header">
      <div id="logo">
        <img alt="" src="./img/logo.gif">
      </div><!-- #logo -->
      <table id="global_nav_table" class="nav_table_inline">
        <tr>
	  <!-- <td class="nav_table_inline">House API Project</td>
	  <td class="nav_table_inline"></td> -->
	  <td  class="nav_table_inline">Social Networks</td>
	  <td  class="nav_table_inline">
<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://house-api-project.org/" data-via="House_API">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<div class="fb-like" data-href="http://house-api-project.org/" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div></td>
	  <td class="nav_table_inline"><p><a target="_blank" href="https://www.facebook.com/groups/houseapiproject">FB Group</a></p></td>
        </tr>
        <tr class="nav_table_inline">
          <td class="nav_table_inline"><a target="_blank" href="http://atnd.org/users/161063">Hackthon</a></td>
          <td class="nav_table_inline"><p class="nav_ex">Meeting and Developing</p></td>
	  <td class="nav_table_inline"></td>
        </tr>
        <tr class="nav_table_inline">
          <td class="nav_table_inline"><a target="_blank" href="https://github.com/HOUSE-API-Project">github</a></td>
          <td class="nav_table_inline"><p class="nav_ex">The House api codes and the blueprint</p></td>
	  <td class="nav_table_inline"></td>
        </tr>
        <tr class="nav_table_inline">
          <td class="nav_table_inline"><a target="_blank" href="https://github.com/HOUSE-API-Project/sinatra-api-provider/blob/master/doc/README.md">API document</a></td>
          <td class="nav_table_inline"><p class="nav_ex">Document</p></td>
	  <td class="nav_table_inline"></td>
        </tr>
      </table>
    </div><!-- #header -->

    <img id="top_image" src="./img/top_image.gif"/>
    <!-- canvasのjavascriptコード -->

    <script type="text/javascript" src="./js/canvas.js"></script>
    <h1 style="margin:20px 20px 5px 20px; width: 100%;">API Realtime Graph</h1>
    <canvas id="canvas" width="1000px" height="400px;" style=""></canvas>
<!--    <div style="text-align: center; background-color: #6DA786; font-size: 20px;border-radius: 5px; cursor: pointer;" id="img_export" onclick="graph_to_img()"> Export to Image </div>-->

    <h1 style="margin:20px 20px 5px 20px">Part of the API</h1>

    <!-- APIのテーブル -->
<?php
function convertTime($time) {
  $t = new DateTime($time);
  $t->setTimeZone(new DateTimeZone('Asia/Tokyo'));
  return $t->format('Y-m-d H:i:s') . PHP_EOL;
}
?>
    <table id="api_table">
      <tr>
        <th>API Name</th>
        <th>Current Value</th>
        <th>Time</th>
	<th>location</th>
        <th>API Path(http://house-api-project.org/api)</th>
      </tr>
<!--      <tr>
        <td><?php print("3f Wifi Temperature"); ?>　　　　　</td>
        <td><?php print($obj_wifi->{'temperature'}); ?>
	<td><?php print convertTime($obj_wifi->{'time'}); ?></td>	
	<td>shibuhouse</td>
        <td><?php print("/shibuhouse/wifi/temperature"); ?></td>
      </tr>
-->
      <tr style="color:RGB(153,0,102)">
        <td><?php print("All Wifi Clients"); ?></td>
        <td><?php print($obj_wifi->{'clients'}); ?></td>
	<td><?php print convertTime($obj_wifi->{'time'}); ?></td>
	<td>shibuhouse</td>
        <td><?php print("/shibuhouse/wifi/clients"); ?></td>
      </tr>
      <tr style="color:RGB(102,102,255)">
        <td><?php print("2f All Wifi Clients"); ?>　　　　　</td>
        <td><?php print($obj_wifi_2f->{'all_clients'}); ?></td>
	<td><?php print convertTime($obj_wifi_2f->{'time'}); ?></td>
	<td>shibuhouse</td>
        <td><?php print("/shibuhouse/wifi/2f/clients"); ?></td>
      </tr>
<!--      <tr style="">
        <td><?php print("2f Wifi Clients (connected highspeed)"); ?>　　　　　</td>
        <td><?php print($obj_wifi_2f->{'clients_high_speed'}); ?>　　　</td>
        <td><?php print($obj_wifi_2f->{'time'}); ?></td>
        <td><?php print("/shibuhouse/wifi/2f/clients"); ?></td>
      </tr>
      <tr style="">
        <td><?php print("2f Wifi Clients (connected lowspeed)"); ?>　　　　　</td>
        <td><?php print($obj_wifi_2f->{'clients_low_speed'}); ?>　　　</td>
        <td><?php print($obj_wifi_2f->{'time'}); ?></td>
        <td><?php print("/shibuhouse/wifi/2f/clients"); ?></td>
      </tr>
-->
      <tr style="color:RGB(204,102,51)">
        <td><?php print("1f All Wifi Clients"); ?>　　　　　</td>
        <td><?php print($obj_wifi_digi->{'all_clients'}); ?>　　　</td>
	<td><?php print convertTime($obj_wifi_digi->{'time'}); ?></td>
	<td>shibuhouse</td>
        <td><?php print("/shibuhouse/wifi/1f/clients"); ?></td>
      </tr>
      <tr style="color:RGB(51,153,51)">
        <td><?php print("bf All Wifi Clients"); ?>　　　　　</td>
        <td><?php print($obj_wifi_bf->{'all_clients'}); ?>　　　</td>
	<td><?php print convertTime($obj_wifi_bf->{'time'}); ?></td>
	<td>shibuhouse</td>
        <td><?php print("/shibuhouse/wifi/bf/clients"); ?></td>
      </tr>
      <tr style="">
        <td><?php print("Digital Room Humidity"); ?>　　　　　</td>
        <td><?php print($obj_digi_hum->{'humidity'}); ?>　　　</td>
	<td><?php print convertTime($obj_digi_hum->{'time'}); ?></td>
	<td>shibuhouse</td>
        <td><?php print("/shibuhouse/1f/humidity"); ?></td>
      </tr>
      <tr style="color:RGB(204,51,51)">
        <td><?php print("Digital Room PIR"); ?>　　　　　</td>
        <td><?php print($obj_digi_pir->count[0]->count); ?></td>
	<td><?php print convertTime($obj_digi_pir->{'time'}); ?></td>
	<td>shibuhouse</td>
        <td><?php print("/shibuhouse/1f/pir"); ?></td>
      </tr>
<!--
      <tr style="">
        <td><?php print("Digital Room Wifi Clients (connected highspeed)"); ?>　　　　　</td>
p        <td><?php print($obj_wifi_digi->{'clients_high_speed'}); ?>　　　</td>
        <td><?php print($obj_wifi_digi->{'time'}); ?></td>
        <td><?php print("/shibuhouse/wifi/1f/clients_high_speed"); ?></td>
      </tr>
      <tr style="">
        <td><?php print("Digital Room Wifi Clients (connected lowspeed)"); ?>　　　　　</td>
        <td><?php print($obj_wifi_digi->{'clients_low_speed'}); ?>　　　</td>
        <td><?php print($obj_wifi_digi->{'time'}); ?></td>
        <td><?php print("/shibuhouse/wifi/1f/clients_low_speed"); ?></td>
      </tr>
-->

      <tr style="color:RGB(51,51,102)">
        <td><?php print("Digital Room Temperature"); ?>　　　　　</td>
        <td><?php print($obj_one->{'temperature'}); ?>　　　</td>
	<td><?php print convertTime($obj_one->{'time'}); ?></td>
	<td>shibuhouse</td>
        <td><?php print("/shibuhouse/1f/temperature"); ?></td>
      </tr>

      <tr style="">
        <td><?php print("ayafuji house temperature"); ?>　　　　　</td>
        <td><?php print($obj_ayafuji->{'temperature'}); ?>　　　</td>
	<td><?php print convertTime($obj_ayafuji->{'time'}); ?></td>
	<td>ayafuji House</td>
        <td><?php print("/ayafuji/temperature"); ?></td>
      </tr>
    </table>

    <h1 style="margin:20px 20px 0px 20px; width: 100%;">House API Project 概要 | House API Project Concept</h1>
    <div id="concept">
      <div id="jp_concept">
　HOUSE API Project は「人」と「建築」との間の新しいインターフェースを提案するオープンソース / オープンデータ - プロジェクトです。<br>
<br>　私達は、人の活動に対してダイナミックな建築が欲しいと考えました。しかし、そのためには建築そのものが人の活動を把握している必要があります。言い換えるなら、人が建築のことを知っているように、建築が人のこと知っている必要がある、ということです。House API Project では、「人の活動に対してダイナミックな建築」の前段階である、「人と建築の相互理解」を目指します。具体的には、建築物内部に様々な人の活動を取得できるセンサー、それによって得られたデータをAPI(アプリケーションプログラミングインタフェース )として、外部に公開する過程を開かれた開発手法であるオープンソース方式で開発します。そして、開発成果は、開発手法も含めてオープンで、その利用に際して知識以外の障壁を設けません。<br>
<br>　House API Project は、「オープンデータ」、「オープンソース」等、様々な相互作用性 / インタラクティビティによって、成り立っているプロジェクトです。<br>
<br>
───House API Project Team<br>
      </div><!-- #jp_concept -->

      <div id="en_concept">
 House API project is a concept which creates a new interface between the human and the build enviroment, using open data/open source.<br>
<br>
 At first we believed that the built enviroment was designed for human activity. In otherwords that the relationship between humans and the built eviroment was like, the relationship between humans. At House API Project, we aim for mutual understanding between the human and the built enviroment, by creating dynamic buildings based around human lifestyle.<br>  
<br>
To be concrete, we installed the many kinds sensor in the built enviroment and publish the data  which is from sensor, using the API(Apilication Programming Interface) system. then development method and development results is opensource which can use by everyone. In use of the data, we  provide except for a barrier of knowledge.<br>
<br>
House API Project am been making by many interaction design, using open data and open source, API.<br>
<br>
---House API Project Team<br>
      </div><!-- #en_concept -->
      <div class="crearfix">
      </div><!-- .clearfix -->
    </div><!-- #concept -->


    <!--<h1 style="margin:20px 20px 20px 20px; width: 100%; float:left;">Social Media</h1>-->
    <div id="social_media" style="width: 94%; clear: both; margin: 0 auto;">
      <div id="social_media_etc" style="margin:0% 3% 2% 2%; min-height:400px; float:left;"/>
      <h1 style="color:#FFFFFF;">Supeerted by</h1>
      <hr>
      <p><a target="_blank" href="http://shibuhouse.com/"><img src="./img/support/shibuhouse.png"></a></p>
      <p><a target="_blank" href="http://www.conoha.jp/"><img src="./img/support/conoha.png"></a></p>
      </div>
      <div id="twitter_widget" style="width:45%; margin:0% 2% 2% 3%; float:left; height:300px;">
        <a class="twitter-timeline" height="400" style="float:left;" href="https://twitter.com/House_API" data-widget-id="396735627036590080"></a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    </div>
      <div class="crearfix">
      </div><!-- .clearfix -->
      </div><!-- #social_media -->
    <div id="footer">
<hr>
      House API Project was initiated by ayafuji. It is developed by House API Project Team and you.
    </div><!-- #footer -->
  </div><!-- #wrap -->

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-45341809-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</body>
</html>
