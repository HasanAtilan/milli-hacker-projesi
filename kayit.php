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

if( isset($_SESSION['user_id']) ){
	header("Location: index.php");
}

require 'baglantilar/database.php';
$cfg = include('ayarlar/ayar.php');

$bilgiver = '';

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}



if(!empty(htmlspecialchars($_POST['kullaniciadi'])) && !empty(htmlspecialchars($_POST['sifre'])) && !empty(htmlspecialchars($_POST['tekrar_sifre']))):
	if(htmlspecialchars($_POST['sifre']) != htmlspecialchars($_POST['tekrar_sifre']))
	{
		$bilgiver = "<div class='alert alert-danger'>Yazdığınız Şifreler Eşleşmemektedir.</div>";
	}
	else if(!filter_var(htmlspecialchars($_POST['kullaniciadi'])))
	{
		$bilgiver = "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>×</button><strong>Kullanıcı Adınızı Kontrol Ediniz..</div></strong>";
	}
	else
	{
	
		$veriyolla = $conn->prepare('SELECT id,kullaniciadi,password FROM kullanicilar WHERE kullaniciadi = :kullaniciadi');
		$veriyolla->bindParam(':kullaniciadi', htmlspecialchars($_POST['kullaniciadi']));
		$veriyolla->execute();
		$sonucumuz = $veriyolla->fetch(PDO::FETCH_ASSOC);

		if( count($sonucumuz) > 0 && $sonucumuz){
			$bilgiver = "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>×</button><strong>Yazdığınız Kullanıcı Adı Zaten Sistemde Mevcuttur..</div></strong>";
		}
		else
		{
			
			

		
		
			$pass = password_hash($_POST['sifre'], PASSWORD_BCRYPT);
			$kullanici =  htmlspecialchars($_POST['kullaniciadi']);
			$isim = htmlspecialchars($_POST['isim']);
			$email = htmlspecialchars($_POST['email']);
			$var = $ip;
			$iban = '0';
			$telefon = $_POST['telefon'];
			$raporsayisi = '0';
			$odulsayisi = '0';
			$seviye = '0';
			$toplampuan = '0';
			$genelsiralama = '0';
			$bio = '0';
			$s = $conn->prepare('SELECT * FROM kullanicilar WHERE iplog = :iplog');
		$s->bindParam(':iplog', $var);
		$s->execute();
		$ss = $s->fetch(PDO::FETCH_ASSOC);
			
			if(count($ss) > 0 && $ss){
				$bilgiver = "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>×</button><strong>Hata:</strong> Çoklu Üyelik Kesinlikle Yasaktır!</div>";
			}else{
			
			$sql = "INSERT INTO kullanicilar (kullaniciadi, password, isim, email, iplog, iban, telefon, raporsayisi, odulsayisi, seviye, toplampuan, genelsiralama, bio) VALUES (:kullaniciadi, :password, :isim, :email, :iplog, :iban, :telefon, :raporsayisi, :odulsayisi, :seviye, :toplampuan, :genelsiralama, :bio)";
			$stmt = $conn->prepare($sql);

			$stmt->bindParam(':kullaniciadi', $kullanici);
			$stmt->bindParam(':password', $pass);
			$stmt->bindParam(':isim', $isim);
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':iplog', $var);
			$stmt->bindParam(':iban', $iban);
			$stmt->bindParam(':telefon', $telefon);
			$stmt->bindParam(':raporsayisi', $raporsayisi);
			$stmt->bindParam(':odulsayisi', $odulsayisi);
			$stmt->bindParam(':seviye', $seviye);
			$stmt->bindParam(':toplampuan', $toplampuan);
			$stmt->bindParam(':genelsiralama', $genelsiralama);
			$stmt->bindParam(':bio', $bio);
			if( $stmt->execute() ):
				$bilgiver = '<meta http-equiv="refresh" content="2; URL=giris.php"> <div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>Başarılı:</strong> Hesabınız Başarıyla Oluşturuldu!</div>';
			else:
				$bilgiver = "<div class='alert alert-danger'>Sunucuya Bağlanılamadı Lütfen Daha Sonra Tekrar Deneyiniz..</div>";
			endif;
			}
		}
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
        <i class="fas fa-user-plus"></i>
        Kayıt Ol</h1>

      <form method="post">
  <input type='hidden' name='csrfmiddlewaretoken' value='v4cypTzTpIw8pPnYWOut27M0LmREdzqgx1zmgWxdQPtpcnxEJcTzBbmvBSDHZqOK' />
  <input type='hidden' name='token' value= />

  <div class="form-group">
    <label for="username" style="color:#FFFFFF;font-family:Hack;" >İsim</label>
    <input class="form-control" type="text" name="isim" id="isim" placeholder="İsim" required />
  </div>
  <div class="form-group">
    <label for="username" style="color:#FFFFFF;font-family:Hack;" >Kullanıcı Adı</label>
    <input class="form-control" type="text" name="kullaniciadi" id="kullaniciadi" placeholder="Hacker" required />
  </div>
  <div class="form-group">
    <label for="email" style="color:#FFFFFF;font-family:Hack;" >Email</label>
    <input class="form-control" type="text" name="email" id="id_email" placeholder="ornek@ornek.com" required />
  </div>
  <div class="form-group">
    <label for="password" style="color:#FFFFFF;font-family:Hack;" >Parola</label>
    <input class="form-control" type="password" name="sifre" id="sifre" placeholder="********" required />
  </div>
  <div class="form-group">
    <label for="passwordRepeat" style="color:#FFFFFF;font-family:Hack;" >Parola</label>
    <input class="form-control" type="password" name="tekrar_sifre" id="tekrar_sifre" placeholder="********" required />
  </div>
  <p style="color:red;font-family:Hack;" id="ErrorMessage"></p>
  <p style="color:green;font-family:Hack;" id="ErrorMessage"></p>
<div class="message">		
		  <?php if(!empty($bilgiver)): ?>
		<p><?= $bilgiver ?></p>
	<?php endif; ?>
		  </div>
  <div class="m-t-lg">
    <ul class="list-inline">

      <li>
        <input class="btn btn-shadow btn-outline-success"  style="font-family:Hack;" id="green-button-outline" type="submit" value="Kayıt Ol" />
      </li>
      <li>
        <a class="signup__link" href="giris.php"  style="color:#FFF;font-family:Hack;">Zaten üyeyim</a>
      </li>
    </ul>
  </div>
</form>






    </div>
  </div>





  </head>



<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>


  <script src="tasarim/particles.js"></script>
  <script src="tasarim/app.js"></script>

  <script src="tasarim/stats.js"></script>
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html> 
