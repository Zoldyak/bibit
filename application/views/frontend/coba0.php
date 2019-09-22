<link href="<?php echo $this->config->item('frontend') ?>/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo $this->config->item('frontend') ?>/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->

<link href="<?php echo $this->config->item('frontend') ?>/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo $this->config->item('frontend') ?>/css/style.css" rel="stylesheet" type="text/css" media="all" />


<script src="<?php echo $this->config->item('frontend') ?>/js/jquery.min.js"></script>
<script src="<?php echo $this->config->item('frontend') ?>/js/bootstrap.min.js"></script>
<script src="<?php echo $this->config->item('frontend') ?>/js/simpleCart.min.js"></script>
<script src="<?php echo $this->config->item('frontend') ?>/js/jquery.plugin.min.js"></script>
<script src="<?php echo $this->config->item('frontend') ?>/js/jquery.countdown.js"></script>
<?php
if(isset($_SESSION["waktu_start"])){
	$lewat = time() - $_SESSION["waktu_start"];
	}else{
		$_SESSION["waktu_start"] = time();
		$lewat = 0;
	}
?>
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="<?php echo $this->config->item('frontend') ?>/js/jquery.plugin.min.js"></script>
<script src="<?php echo $this->config->item('frontend') ?>/js/jquery.countdown.js"></script> -->
<div id="timer_place">
	<span id="timer">00 : 00 : 00</span>
</div>
<script type="text/javascript">
	function waktuHabis(){
		alert('Waktu Anda telah habis, Terima kasih sudah berkunjung.');
		var frmSoal = document.getElementById("frmSoal");
		frmSoal.submit();
	}
	function hampirHabis(periods){
		if($.countdown.periodsToSeconds(periods) == 60){
			$(this).css({color:"red"});
		}
	}
	$(function(){
		var waktu = 7200;
		var sisa_waktu = waktu - <?php echo $lewat ?>;
		var longWayOff = sisa_waktu;
		$("#timer").countdown({
			until: longWayOff,
			compact:true,
			onExpiry:waktuHabis,
			onTick: hampirHabis
		});
	})
</script>
<style>
	#timer_place{
		margin:0 auto;
		text-align:center;
	}
	#timer{
		border-radius:7px;
		border:2px solid gray;
		padding:7px;
		font-size:2em;
		font-weight:bolder;
	}
</style>
