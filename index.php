

<?php
	
session_start();
ob_start();
require 'baglantilar/database.php';

if( isset($_SESSION['user_id']) && !empty($_SESSION['user_id']) ){

	$bilgiler = $conn->prepare('SELECT * FROM kullanicilar WHERE id = :id');
	$bilgiler->bindParam(':id', $_SESSION['user_id']);
	$bilgiler->execute();
	$sonucbilgi = $bilgiler->fetch(PDO::FETCH_ASSOC);

	$kullanicii = NULL;

	if( count($sonucbilgi) > 0){
		$kullanicii = $sonucbilgi;
	}

}
else
{
	header("Location: giris.php");
	die();
}





?>


<?php



define('6755682621', TRUE);



function SayfaGetir(){

  if(isset($_GET['sayfa'])){

    switch ($_GET['sayfa']) {

      case 'anasayfa':

        include('anasayfa/anasayfa.php');

        break;

		case 'programgoruntule':

        include('anasayfa/programgoruntule.php');

        break;
		
		case 'raporlar':

        include('anasayfa/raporlar.php');

        break;
		
		case 'raporgonder':

        include('anasayfa/raporgonder.php');

        break;
		
		case 'liderler':

        include('anasayfa/liderler.php');

        break;
		
		case 'davetiyeler':

        include('anasayfa/davetiyeler.php');

        break;
		
		case 'hacktivity':

        include('anasayfa/hacktivity.php');

        break;
		
		case 'kullanicilar':

        include('anasayfa/kullanicilar.php');

        break;
		
		case 'profil':

        include('anasayfa/profil.php');

        break;
		
		
		case 'hesabim':

        include('anasayfa/hesabim.php');

        break;
			
      default:

        include('anasayfa/404.php');

        break;

    }

  }else{

    include('anasayfa/anasayfa.php');

  }

}

?>
  
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Milli Hacker</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png" href="/static/anasayfa/0.png" />

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

		<link rel='stylesheet' href='//cdn.jsdelivr.net/font-hack/2.020/css/hack.min.css'>
		<link rel='stylesheet' href='//cdn.jsdelivr.net/npm/hack-font@3.3.0/build/web/hack.css'>
		<link rel="stylesheet" href="tasarim/tasarim1.min.css" >

		<div id="particles-js">



	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>

  <link rel="stylesheet" type="text/css" href="tasarim/fa-svg-with-js.css">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" />
	<style>
	body {font-family: "Lato", sans-serif}
	.mySlides {display: none}
	</style>
	<body>

	<!-- Navbar -->
	<div class="w3-top" id="w3">
	  <div class="w3-bar w3-black w3-card">

      <div class="w3-dropdown-hover w3-hide-medium w3-hide-large w3-left">
        <button class="w3-padding-large w3-button" title="Secenekler" style="color:#000"><i class="fa fa-caret-down"></i></button>

        <div class="w3-dropdown-content w3-bar-block w3-card-4">
          <a href="?sayfa=profil" class="w3-bar-item w3-button">Profil</a>
          <a href="?sayfa=raportlar" class="w3-bar-item w3-button">Raporlar</a>
          <a href="?sayfa=ayarlar" class="w3-bar-item w3-button">Ayarlar</a>
          <a href="?sayfa=odemeler" class="w3-bar-item w3-button">Ödemeler</a>
          <a href="?sayfa=hacktivity" class="w3-bar-item w3-button">Hacktivity</a>
            <a href="?sayfa=davetiyeler" class="w3-bar-item w3-button">Davetiyeler</a>

          <a href="cikis.php" class="w3-bar-item w3-button">Çıkış Yap</a>
        </div>
      </div>

	    <a href="?sayfa=anasayfa"><button class="w3-bar-item w3-button w3-padding-large" style="color:#3bb12e" id="programs-button-id"><i class="fas fa-clipboard-list"></i> Programlar</button></a>
	    <a href="?sayfa=hacktivity" ><button class="w3-bar-item w3-button w3-padding-large w3-hide-small" style="color:#3bb12e" id="hacktivity-button-id"><i class="fas fa-code-branch "></i> Hacktivity</button></a>
	    <a href="?sayfa=liderler"><button class="w3-bar-item w3-button w3-padding-large" style="color:#3bb12e" id="leaders-button-id"><i class="fas fa-list-ol"></i> Liderler</button></a>
	    <a href="?sayfa=profil" ><button class="w3-bar-item w3-button w3-padding-large w3-hide-small" style="color:#3bb12e" id="profile-button-id"><i class="fas fa-user"></i> Profil</button></a>
	    <a href="?sayfa=raporlar"><button class="w3-bar-item w3-button w3-padding-large w3-hide-small" style="color:#3bb12e" id="reports-button-id"><i class="fas fa-bug"></i> Raporlar</button></a>
	    <a href="?sayfa=davetiyeler"><button class="w3-bar-item w3-button w3-padding-large w3-hide-small" style="color:#3bb12e" id="reports-button-id"><i class="fas fa-envelope-square"></i> Davetiyeler</button></a>

      <div class="w3-dropdown-hover w3-hide-small  w3-right">
	      <button class="w3-padding-large w3-button" title="Secenekler" style="color:#3bb12e"  id="options-button-id"> Seçenekler <i class="fas fa-cogs"></i> <i class="fa fa-caret-down"></i></button>
	      <div class="w3-dropdown-content w3-bar-block w3-card-4">
	        <a href="?sayfa=hesabim" class="w3-bar-item w3-button">Ayarlar</a>
	        <a href="?sayfa=odemeler" class="w3-bar-item w3-button">Ödemeler</a>
	        <a href="cikis.php" class="w3-bar-item w3-button">Çıkış Yap</a>
	      </div>

	    </div>


      <a href="https://t.me/joinchat/IB54dU8UlqxYq4P3UBA5bg"><button title="Telegram kanalımıza dahil ol!" class="w3-bar-item w3-button w3-padding-large w3-right"><img src="tasarim/telegram_icon.png"   style="width:22px;"></img></button></a>


	  </div>
	</div>






  </head>





<!--
-->


<link rel="stylesheet" type="text/css" href="tasarim/tasarim2.css">
<link rel="stylesheet" media="screen" href="tasarim/font-awesome.min.css" />
<link rel="stylesheet" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" />



       
	   <?php SayfaGetir(); ?>

	   
	   <div class="col-lg-2 col-md-2 col-sm-2"></div>

</div>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>


<script src="tasarim/particles.js"></script>
<script src="tasarim/app.js"></script>

<script src="tasarim/stats.js"></script>
<script>

  document.getElementById("programs-button-id").style.color="#f0c526";

</script>



<script src="tasarim/fontawesome-all.min.js" ></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>








<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script></body>

<script src="/assets/js/application.js?v=11"></script>


</html>    
