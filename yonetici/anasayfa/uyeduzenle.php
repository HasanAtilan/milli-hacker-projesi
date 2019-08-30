	<?php
	
session_start();
ob_start();
require '../baglantilar/database.php';

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

$vericek = $conn -> prepare("SELECT * FROM kullanicilar where id = :id");
$vericek->bindParam(':id', $_GET['id']);
$vericek-> execute();
$veriyigoster = $vericek -> fetch(PDO::FETCH_ASSOC);



?>

<?php
if (isset($_POST["Gonder"])) {
	
$ids = $_GET['id'];
$isim = $_POST['isim'];
$email = $_POST['email'];
$kullaniciadi = $_POST['kullaniciadi'];
$guncelle = $conn -> prepare("UPDATE kullanicilar SET isim=:isim, email=:email, kullaniciadi=:kullaniciadi WHERE id=:id");
$guncelle->bindParam(':id', $ids);
$guncelle->bindParam(':isim', $isim);
$guncelle->bindParam(':email', $email);
$guncelle->bindParam(':kullaniciadi', $kullaniciadi);
$guncelle-> execute(); 
if($guncelle){
 
echo "başarılı";
 
}else{
 
echo "başarısız";
 
}

}

?>



<div class="col-md-12">

       <div class="panel panel-default" style="margin-bottom:30px;">
         <div class="panel-heading" style="margin-bottom:5px;background:#fff;border-color:#34495e;color:#34495e">Kullanici Duzenle</div>

          <div class="panel-body" style="padding:15px 15px 15px 15px;">

  

        
     <form action="" method="post">

     <div class="message"></div>


     <div class="deploy">

<div class="form-group">
                     <label for="inputEmail3" class="">Adı</label>
                     <input type="text" name="isim" class="form-control" id="isim" value="<?php echo $veriyigoster['isim']; ?>">
					 <input type="hidden" name="id" class="form-control" id="id" value="<?php echo $_GET['id']; ?>">
                  </div>
        
          <div class="form-group">
                     <label for="inputEmail3" class="">Email</label>
                     <input type="text" name="meslek" class="form-control" id="meslek" value="<?php echo $veriyigoster['email']; ?>">
                  </div>
     

         
          <div class="form-group">
                     <label for="inputEmail3" class="">Kullanici Adi</label>
                     <input type="text" name="sehir" class="form-control" id="sehir" value="<?php echo $veriyigoster['kullaniciadi']; ?>">
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


					
