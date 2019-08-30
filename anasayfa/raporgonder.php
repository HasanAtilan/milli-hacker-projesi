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
if (isset($_POST["Gonder"])) {	
$gonderenid = $_SESSION['user_id'];
$raporid = $_GET['raporid'];
$raporisim = $sonucbilgi['kullaniciadi'];
$raporadi = $_GET['raporadi'];
$raporbasligi = $_POST['raporbasligi'];
$zafiyettipi = $_POST['zafiyettipi'];
$zafiyeturl = $_POST['zafiyeturl'];
$httpistek = $_POST['httpistek'];
$detaylar = $_POST['detaylar'];
$sonuc = $_POST['sonuc'];
$zafiyetderecesi = $_POST['zafiyetderecesi'];
$sql = "INSERT INTO raporlar (alanid, raporid, raporisim, raporadi, raporbasligi, zafiyettipi, zafiyeturl, httpistek, detaylar, sonuc, zafiyetderecesi) VALUES (:alanid, :raporid, :raporisim, :raporadi, :raporbasligi, :zafiyettipi, :zafiyeturl, :httpistek, :detaylar, :sonuc, :zafiyetderecesi)";
$gonder = $conn->prepare($sql);
$gonder->bindParam(':alanid', $gonderenid);
$gonder->bindParam(':raporid', $raporid);
$gonder->bindParam(':raporisim', $raporisim);
$gonder->bindParam(':raporadi', $raporadi);
$gonder->bindParam(':raporbasligi', $raporbasligi);
$gonder->bindParam(':zafiyettipi', $zafiyettipi);
$gonder->bindParam(':zafiyeturl', $zafiyeturl);
$gonder->bindParam(':httpistek', $httpistek);
$gonder->bindParam(':detaylar', $detaylar);
$gonder->bindParam(':sonuc', $sonuc);
$gonder->bindParam(':zafiyetderecesi', $zafiyetderecesi);
$gonder->execute();
if($gonder){
 
echo '<meta http-equiv="refresh" content="2;URL=?sayfa=raporlar"><div class="alert alert-dismissible alert-success"><div class="alert alert-dismissible alert-success">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Rapor Başari İle Eklendi!</strong>
                </div>';
 
}else{
 
echo "başarısız";
 
}

}

?>

<?php
    $firmaiid = $_GET['raporid'];
    $kayit = $conn->prepare('SELECT * FROM firmalar WHERE id = :id');
	$kayit->bindParam(':id', $firmaiid);
	$kayit->execute();
	$goster = $kayit->fetch(PDO::FETCH_ASSOC);
	
if (isset($_POST["Gonder"])) {

$sayi1  = '1';
$sayi2  = $goster["toplamraporsayisi"];
$kalan  = $sayi1 + $sayi2;
$guncelle = $conn->prepare("UPDATE firmalar SET toplamraporsayisi=:toplamraporsayisi WHERE id=:id ");
 
$guncelle->execute(array(':toplamraporsayisi'=>$kalan , ':id'=>$firmaiid));
 
if($guncelle){
 
echo "";
 
}else{
 
echo "";
 
}

}

?>

<?php	
if (isset($_POST["Gonder"])) {
$firmaiid2 = $gonderenid;
$sayi11  = '1';
$sayi22  = $sonucbilgi["raporsayisi"];
$kalan2  = $sayi11 + $sayi22;
$guncelle2 = $conn->prepare("UPDATE kullanicilar SET raporsayisi=:raporsayisi WHERE id=:id ");
 
$guncelle2->execute(array(':raporsayisi'=>$kalan2 , ':id'=>$firmaiid2));
 
if($guncelle2){
 
echo "";
 
}else{
 
echo "";
 
}

}

?>
     
<div class="col-lg-2"></div>
<div class="col-lg-8">

          <div class="container">


                <form method="POST">

                <div class="form-group" >
                  <label for="report-title">Rapor Başlığı</label>
                  <input class="form-control" id="raporbasligi" aria-describedby="emailHelp" name="raporbasligi" placeholder=""  required="required">
                  <small id="emailHelp" class="form-text text-muted">örnek : anasayfada reflected xss zaafiyeti</small>
                </div>
                <div class="form-group">
                  <label for="report-title">Zaafiyetin Tipi</label>
                  <input class="form-control" id="zafiyettipi" aria-describedby="emailHelp" name="zafiyettipi" placeholder="" required="required"  >
                  <small id="emailHelp" class="form-text text-muted">Zaafiyetin Tipi (XSS,CSRF vb)</small>
                </div>

                <div class="form-group">
                  <label for="report-title">Zaafiyetin Derecesi</label></br>

                    <button type="button" class="btn dropdown-toggle btn-success" id="zafiyetderecesi" data-toggle="dropdown" aria-haspopup="true"
                      aria-expanded="false">
                      Orta
                    </button>
                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">
                      <a class="dropdown-item" value="Kritik">Kritik</a>
                      <a class="dropdown-item" value="Yüksek">Yüksek</a>
                      <a class="dropdown-item" value="Orta">Orta</a>
                      <a class="dropdown-item" value="Düşük">Düşük</a>
                    </div>
                    <input name="zafiyetderecesi" type="hidden" id="zafiyetderecesi" value="Orta">

              </div>



                <div class="form-group" >
                  <label for="report-title">Zaafiyetin URL'si</label>
                  <input class="form-control" id="zafiyeturl" aria-describedby="emailHelp" name="zafiyeturl" placeholder=""  required="required" >
                  <small id="emailHelp" class="form-text text-muted">örnek : www.example.com/anasayfa </small>
                </div>
                <div class="form-group">
                  <label for="report-title">HTTP İsteği</label>
                  <textarea class="form-control" id="httpistek" aria-describedby="emailHelp" name="httpistek" placeholder="" style="height:300px;" required="required" ></textarea>
                  <small id="emailHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group" style="">
                  <label for="report-title">Detaylar</label>

                  <textarea class="form-control" id="detaylar" aria-describedby="emailHelp" name="detaylar" placeholder="" style="height:500px;" required="required" ></textarea>

                    <p  id="report-details-markdown"  placeholder="" style="white-space: nowrap;overflow: auto;max-height:500px;display:none;height:500px;" ></p>


                  <small id="emailHelp" class="form-text text-muted"></small>

                </div>

                <div class="form-group" style="margin-top:30px;">
                  <label for="report-title">Sonuç</label>


                  <textarea class="form-control" id="sonuc" aria-describedby="emailHelp" name="sonuc" placeholder="" style="height:500px;" required="required" ></textarea>
                        <p  id="report-conclusion-markdown"  placeholder="" style="white-space: nowrap;overflow: auto;max-height:500px;display:none;height:500px;" ></p>

                  <small id="emailHelp" class="form-text text-muted"></small>
                </div>

                <div class="form-group" style="margin-top:30px;">


                
                        <div class="m-t-lg">



                
                <button type="submit" class="btn btn-success btn-shadow px-3 my-2 ml-0 text-left" name="Gonder" >Raporla</button>
                </form>




          </div>


</div>
<div class="col-lg-2"></div>



				
				
                                              
                        

                                                
                 

