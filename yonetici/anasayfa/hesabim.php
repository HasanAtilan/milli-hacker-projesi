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

$vericek = $conn -> prepare("SELECT * FROM yoneticiler where id = :id");
$vericek->bindParam(':id', $_SESSION['yonetici']);
$vericek-> execute();
$veriyigoster = $vericek -> fetch(PDO::FETCH_ASSOC);



?>

<?php
if (isset($_POST["Gonder"])) {
	
$ids = $_SESSION['yonetici'];
$adiniz = $_POST['adiniz'];
$email = $_POST['email'];
$kullaniciadi = $_POST['kullaniciadi'];
$guncelle = $conn -> prepare("UPDATE yoneticiler SET adiniz=:adiniz, email=:email, kullaniciadi=:kullaniciadi WHERE id=:id");
$guncelle->bindParam(':id', $ids);
$guncelle->bindParam(':adiniz', $adiniz);
$guncelle->bindParam(':email', $email);
$guncelle->bindParam(':kullaniciadi', $kullaniciadi);
$guncelle-> execute(); 
if($guncelle){
 
$mesaj = '<div class="alert alert-dismissible alert-success">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>HESABİNİZ BAŞARILI BİR ŞEKİLDE GÜNCELLENDİ!</strong>
                </div>';
 
}else{
 
$mesaj = "başarısız";
 
}

}

?>



<div class="col-md-12">

       <div class="panel panel-default" style="margin-bottom:30px;">
         <div class="panel-heading" style="margin-bottom:5px;background:#fff;border-color:#34495e;color:#34495e">Hesap Bilgilerim</div>

          <div class="panel-body" style="padding:15px 15px 15px 15px;">

  

        
     <form action="" method="post">

     <div class="message"></div>

	 <?php if(!empty($mesaj)): ?>
		<p><?= $mesaj ?></p>
	<?php endif; ?>

     <div class="deploy">

<div class="form-group">
                     <label for="inputEmail3" class="">Adıniz</label>
                     <input type="text" name="adiniz" class="form-control" id="adiniz" value="<?php echo $veriyigoster['adiniz']; ?>">
					 <input type="hidden" name="id" class="form-control" id="id" value="<?php echo $_SESSION['yonetici']; ?>">
                  </div>
        
          <div class="form-group">
                     <label for="inputEmail3" class="">Kullanici Adiniz</label>
                     <input type="text" name="kullaniciadi" class="form-control" id="kullaniciadi" value="<?php echo $veriyigoster['kullaniciadi']; ?>">
                  </div>
     

         
          <div class="form-group">
                     <label for="inputEmail3" class="">E-Mailiniz</label>
                     <input type="text" name="email" class="form-control" id="email" value="<?php echo $veriyigoster['email']; ?>">
                  </div>

         
        
         

         
        

         
       


       </div>   




 <hr>
  <a href="?sayfa=anasayfa" class="btn btn-danger pull-left">
         Geri Dön
  </a>
  <button type="submit" name="Gonder" class="btn btn-success pull-right">
         Kaydet
  </button>
</div>


</div>
   
</form>