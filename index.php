<!DOCTYPE html>
<!-- Thanks to dries007 for a large amount of this code! To get the base code see: https://github.com/dries007/Dries007.net -->
<?php
	$start = microtime(true);
	Error_Reporting( E_ALL | E_STRICT );
	Ini_Set( 'display_errors', true );

	include("assets/php/service.class.php");
	include("assets/php/serverstats.php");
	$services = array(
		new service("OwnCloud", '<a href="/owncloud/"><img alt="OwnCloud" src="assets/img/owncloud.png" /></a> ', '<img alt="OwnCloud" src="assets/img/owncloud_offline.png" /> ', 80),
		new service("Jenkins", '<a href="/ci/"><img alt="jenkins" src="assets/img/jenkins.png" /></a> ', '<img alt="Jenkins" src="assets/img/jenkins_offline.png" /> ', 8080),
    new service("Munin", '<a href="/munin/"><img alt="Munin" src="assets/img/munin.png" /></a> <br />', '<img alt="Munin" src="assets/img/munin_offline.png" /> <br />', 80),
		new service("WX", '<a href="/wx/"><img alt="Weather" src="assets/img/wx.png" /></a> ', '<img alt="Weather" src="assets/img/wx_offline.png" /> ', 80, "192.168.0.210"),
    new service("Domoticz", '<a href="http://192.168.0.210:8080/"><img alt="Domoticz" src="assets/img/domoticz.png" /></a> ', '<img alt="Domoticz" src="assets/img/domoticz_offline.png" /> ', 8080, '192.168.0.210', "84.92.120.199", '<img alt="" src="assets/img/domoticz_offline.png" style="visibility: hidden;"/> '),
    new service("Monit", '<a href="/monit/"><img alt="Monit" src="assets/img/monit.png" /></a> ', '<img alt="Monit" src="assets/img/monit_offline.png" /> '),
	);
  
//  $browser = get_browser(null, true);
  
?>
<html lang="en">
	<head>

  <link href="/assets/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
  <link href="/assets/css/font-awesome.css" rel="stylesheet">
  <link href="/assets/css/ocn-font.css" rel="stylesheet">   
	<link href="/assets/css/index.css" rel="stylesheet">

	<meta name="google-site-verification" content="Pjl1F5w1C2fxgk1wUXyRdvASocoWKGQkmvLuxBg21lo" />

	<link rel="shortcut icon" type="image/png" href="assets/img/favicon.png" />
	<title>RX14's Dashboard</title>

	</head>
	<body>
  <?php include_once("assets/php/analyticstracking.php") ?>
		<div id="topBar" class="well">
			<span id="centerText">
			<a class="btn btn-mini btn-success" href="https://github.com/RX14/">
				<i class="icon-github"></i> Github
			</a>
			<a class="btn btn-mini btn-success" href="mailto:chris@rx14.co.uk">
				<i class="icon-envelope"></i> Email
			</a>
<!--			<a class="btn btn-mini btn-success" href="https://youtube.com/BeyondTheScreens">
				<i class="icon-youtube"></i> Youtube
			</a> -->
			<a class="btn btn-mini btn-success" href="https://twitter.com/ShurtugaI">
				<i class="icon-twitter"></i> Twitter
			</a>
			<a class="btn btn-mini btn-success" href="http://overclock.net/u/307728/">
				<i class="custom-icon-ocn"></i> Overclock.net
			</a>
			<a class="btn btn-mini btn-success" href="http://boincstats.com/en/stats/-1/user/detail/2585850">
				<i class="icon-globe"></i> Boincstats
			</a>
      <div class="text-right">
      IP: <?php echo $_SERVER['REMOTE_ADDR']; ?>
      </div>
			</span>
      
		</div>

		<div class="span3 well">
			<!-- System Load -->
			<p><b>System load</b></p>
			<?php makeLoadBars(); ?>
			<hr>
			<!-- RAM Usage -->
			<p><b>RAM Usage</b></p>
			<?php makeRAMBars(); ?>
			<hr>
			<!-- Disk Space -->
			<p><b>Disk space</b></p>
			<?php makeDiskBars(); ?>
			<hr>
	    Built with <a href="https://twitter.github.io/bootstrap/"><i class="icon-github"></i> Bootstrap</a> & <a href="https://fortawesome.github.io/Font-Awesome/"><i class="icon-flag"></i> Font Awesome</a> in <?php $end = microtime(true); echo round(($end - $start), 4);?> sec.<br>
      Thanks to the AWESOME <a href="https://dries007.net/">Dries007</a> for most of the hard work.<br>
      His code is available <a href="https://github.com/dries007/Dries007.net">here</a>. Spoilers! I copied most of it!<br>
		</div>

		<div id='Main'>
    <!-- TACTICAL SPACES! #bodgejob -->
      <?php
      /*
			echo '<a href="/OwnCloud/" target="_self"><assets/img alt="OwnCloud" src="assets/img/owncloud.png" /></a> ';
			echo '<a href="http://rx14.co.uk/ci/"><assets/img alt="" src="assets/img/jenkins.png" /></a> ';
			echo '<a href="/solder/"><assets/img alt="Solder" src="assets/img/solder.png" /></a><br /> ';
			echo '<a href="/wx/"><assets/img alt="" src="assets/img/wx.png" /></a> ';
			echo '<a href="/munin/"><assets/img alt="" src="assets/img/munin.png" /></a> ';
			echo '<a href="/munin-live/"><assets/img alt="" src="assets/img/munin_live.png" /></a><br /> ';
			echo '<a href="http://rx14.co.uk/domoticz/"><assets/img alt="" src="assets/img/domoticz.png" /> </a> '; */
      ?>
      <?php
      foreach($services as $service){
      echo $service->makeCode();
      }
      ?>
		</div>
    
    <!-- Contact modal
    <div id="contactModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Contact info</h3>
      </div>
      <div class="modal-body">
        <img src="/assets/img/contact.png" style="width: 150px;"/>
      </div>
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
      </div>
    </div> -->
                
	</body>
</html>
