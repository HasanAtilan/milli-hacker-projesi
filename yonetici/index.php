<!-- 
Coded By HasanAtilan
HasanAtilan.com
-->

	<?php
	
session_start();
ob_start();
require 'baglantilar/database.php';

if( isset($_SESSION['yonetici']) && !empty($_SESSION['yonetici']) ){

	$records = $conn->prepare('SELECT * FROM yoneticiler WHERE id = :id');
	$records->bindParam(':id', $_SESSION['yonetici']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$user = NULL;

	if( count($results) > 0){
		$user = $results;
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

		
		case 'uyeler':

        include('anasayfa/uyeler.php');
		
		break;
		
		case 'uyeduzenle':

        include('anasayfa/uyeduzenle.php');
		
		break;
		
		case 'hacklinkler':

        include('anasayfa/hacklinkler.php');
		
		break;
	
	case 'hacklinkgoruntule':

        include('anasayfa/hacklinkgoruntule.php');
		
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

$sorgu1 = $conn->prepare("SELECT COUNT(*) FROM kullanicilar");
$sorgu1->execute();
$say1 = $sorgu1->fetchColumn();

$sorgu2 = $conn->prepare("SELECT COUNT(*) FROM hacklinkler");
$sorgu2->execute();
$say2 = $sorgu2->fetchColumn();


?>

  
   <!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $say5['siteadi']; ?></title>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="author">

    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    
    <link href="../tasarim/bootstrap-select.css" rel="stylesheet">

    <link rel="stylesheet" href="../tasarim/bootstrap-flat.css" type="text/css">
    <link rel="stylesheet" href="../tasarim/font-awesome-animation.min.css">
    <link rel="stylesheet" href="../tasarim/main.css" type="text/css">

    <link href="../tasarim/style.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,700italic' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Maven+Pro:400,500,600,700" rel="stylesheet" type="text/css">

    <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/favicon.png">
    <meta name="theme-color" content="#ffffff">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
    <link href="../tasarim/blue.css" rel="stylesheet">
    <link href="../tasarim/bluex.css" rel="stylesheet">
    <script src="../tasarim/icheck.js"></script>

    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
    <script src='../tasarim/bootstrap-select.js'></script>
    <script src='../tasarim/Chart.js'></script>
    <script src='../tasarim/bootbox.js'></script>
    <script src="../tasarim/jquery.uploadifive.js"></script>
    <link rel="shortcut icon" href="">


</head>

<body>
<style>

.panelavatar {
       border: 1px solid #3d3d3d;
       border-radius: 2px;
       -moz-border-radius: 2px;
       -webkit-border-radius: 2px;
       margin-right: 5px;
       margin-bottom: 5px;
}
.pavatar {
       border: 5px solid #313131;
       border-radius: 55px;
       -moz-border-radius: 55px;
       -webkit-border-radius: 55px;
       width: 70px;
height: 70px;
}


.pavatar:hover {
       border: 5px solid #3c82a3;
       border-radius: 4px;
       -moz-border-radius: 4px;
       -webkit-border-radius: 4px;
       transition: all 2s ease 0s;
}

</style>
<nav class="navbar navbar-static-top navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
       <a href='/' class="navbar-brand nav-logo"><img src="<?php echo $say5['sitelogo']; ?>"></a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          

        <ul class="nav navbar-nav navbar-right">
              
			  <li><a href="<?php echo $say5['mobiluygulama']; ?>" target="_black">Coding By MR.HASAN <i class="fa fa-code" aria-hidden="true"></i></a></li>
        </ul>
    </div>
  </div>
</nav>
 <div class="container">
  <div class="row">

    <div class="col-md-3">
       <div class="list-group">
    <li class="list-group-item"><strong><?php echo $results["adiniz"]; ?></strong><br><?php echo $results["email"]; ?></li>
	<li class="list-group-item"><strong>Toplam Üyeler</strong><br><?php echo $say1; ?></li>
	<li class="list-group-item"><strong>Toplam Hacklinkler</strong><br><?php echo $say2; ?></li>
	<a href="?sayfa=anasayfa" class="list-group-item "><i class="fa fa-home"></i>&nbsp; Anasayfa</a>
    <a href="?sayfa=uyeler" class="list-group-item "><i class="fa fa-user"></i>&nbsp; Üyeler</a>
    <a href="?sayfa=hacklinkler" class="list-group-item "><i class="fa fa-star"></i>&nbsp; Eklenen Hacklinkler</a>
	<a href="?sayfa=hesabim" class="list-group-item"><i class="fas fa-cog"></i>&nbsp; Hesap Ayarlarim</a>
	<a href="cikis.php" class="list-group-item"><i class="far fa-window-close"></i>&nbsp; Çıkış Yap</a>
</div>    </div>

     <div class="col-md-9">
              <div class="alert alert-dismissible alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Hoşgeldin Yönetici,</strong> Yönetici Görevlerinizi Uygulayın!
                </div>

         <ul class="breadcrumb">
             <li class="active">HackLink</li>
            <li class="active">Anasayfa</li>
        </ul>

       
	   <?php SayfaGetir(); ?>








<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script></body>

<script src="/assets/js/application.js?v=11"></script>


</html>    
