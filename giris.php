<!-- 
Kodlama: HasanAtilan
Full Stack Developer - MR.HasanAtilan
Skype: SkyTime1234
Twitter: netmrhasan
İnstagram: netmrhasan
facebook: netmrhasan
telegram: netmrhasan
www.hasanatilan.com
-->

<?php


session_start();
ob_start();
if(isset($_SESSION['user_id']) ){
	header("Location: index.php");
	exit();
}

require 'baglantilar/database.php';
$cfg = include('baglantilar/ayar.php');

if(!empty(htmlspecialchars($_POST['kullaniciadi'])) && !empty(htmlspecialchars($_POST['sifre']))):
	
	$bilgiler = $conn->prepare('SELECT id,kullaniciadi,password,email FROM kullanicilar WHERE email = :email');
	$bilgiler->bindParam(':email', htmlspecialchars($_POST['kullaniciadi']));
	$bilgiler->execute();
	$sonucbilgi = $bilgiler->fetch(PDO::FETCH_ASSOC);

	$mesajimiz = '';

	if(count($sonucbilgi) > 0 && password_verify(htmlspecialchars($_POST['sifre']), $sonucbilgi['password']) ){

		$_SESSION['user_id'] = $sonucbilgi['id'];
		header("Location: index.php?sayfa=anasayfa");

	} else {
		$mesajimiz = '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>Hata:</strong> Kullanıcı adı veya şifre geçersiz.</div>';
	}

endif;

?>

  
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Milli Hacker</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="tasarim/0.png" />

		<link rel='stylesheet' href='//cdn.jsdelivr.net/font-hack/2.020/css/hack.min.css'>
		<link rel="stylesheet" href="tasarim/tasarim1.min.css" >

		<div id="particles-js">



	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300'>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,700,300'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
<link rel="stylesheet" type="text/css" href="tasarim/tasarim2.css">

      <link rel="stylesheet" href="tasarim/kayit.css">
      

        
		  
		  <style>
	body {font-family: "Lato", sans-serif}
	.mySlides {display: none}
	</style>
	<body>


    <div class="signup__container" >

    <div class="container__child signup__form" >



      <h1 class="display-3" style="margin-bottom:20px;">
        <i class="fas fa-sign-in-alt"></i>
        Giris Yap</h1>

      <form method="post">
        <input type='hidden' name='csrfmiddlewaretoken' value='t5CVdzAPn9ka38g6AgMkPhmJV6LPyWEJv2ZJ4Cy9OghrQGqMnEbqolWeLCxSkN2d' />
        <div class="form-group">
          <h6>
            <label for="password" style="color:#FFFFFF;font-family:Hack;">Eposta</label>
          <input class="form-control" type="text" name="kullaniciadi" id="kullaniciadi" required />
        </div>

        <div class="form-group">
          <label for="password" style="color:#FFFFFF;font-family:Hack;">Parola</label>
          <input class="form-control" type="password" name="sifre" id="sifre" placeholder="********" required />
        </div>

        <p style="color:green;font-family:Hack;" id="Success"></p>
          <div class="message">		
		  <?php if(!empty($mesajimiz)): ?>
		<p><?= $mesajimiz ?></p>
	<?php endif; ?>
		  </div>

        <div class="m-t-lg" style="height:30px;">
          <ul class="list-inline" style="float:right;margin-right:20px;">
            <li>
              <input class="btn btn-shadow btn-outline-success"  style="font-family:Hack;float:right;" id="green-button-outline" type="submit" value="Giriş" />
            </li>

          </ul>
            </div>

        <div class="m-t-lg" style="position:absolute; bottom:0;">
          <ul class="list-inline" >
            <li>
              <a class="signup__link" href="kayit.php"  style="color:#FFF;font-family:Hack;">Kayıt Ol</a>
            </li>
            
          </ul>
        </div>
      </form>
    </div>
  </div>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>


  <script src="tasarim/particles.js"></script>
  <script src="tasarim/app.js"></script>

  <script src="tasarim/stats.js"></script>
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>