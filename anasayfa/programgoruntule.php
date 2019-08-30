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

$vericek = $conn -> prepare("SELECT * FROM firmalar where id = :id");
$vericek->bindParam(':id', $_GET['numara']);
$vericek-> execute();
$veriyigoster = $vericek -> fetch(PDO::FETCH_ASSOC);
?>

     
<div class="row" style="margin-top:100px;">
<div class="col-lg-1 col-md-1 col-1"></div>

<div class="col-lg-8 col-md-8 col-8">

            <div class="panel panel-default">
                <div class="panel-body">
                  <p><b>Program İsmi: </b></p>
                  <pre class="program-detail-pre"><?php echo $veriyigoster['baslik']; ?></pre>

                  <p><b>Program Durumu: </b></p>

                  
                  
                  <pre class="program-detail-pre"><?php echo $veriyigoster['programdurumu']; ?> </pre>
                  
                  <p><b>Program Özeti: </b></p>
                  <pre class="program-detail-pre"><?php echo $veriyigoster['programozeti']; ?></pre>
                  <p><b>Program Kapsamı: </b></p>
                  <pre class="program-detail-pre"><?php echo $veriyigoster['programkapsami']; ?></pre>
                  <p><b>Kapsam Dışı: </b></p>
                  <pre class="program-detail-pre"><?php echo $veriyigoster['kapsamdisi']; ?></pre>
                  <p><b>Ödül Tablosu  </b></p>
                  <pre class="program-detail-pre"><?php echo $veriyigoster['odultablosu']; ?></pre>
                  

                  <a href="/programlar/dersim-dokuman-paylasm-platformu/rapor" class="btn btn-success btn-shadow px-3 my-2 ml-0 text-left" id="green-button">Raporla</a>
                  
                </div>
              </div>


</div>

<div class="col-lg-2 col-md-2 col-2">
                <div class="panel panel-default">
                <div class="panel-body">
                  <p><b>Program Açılma Tarihi </b></p>
                  <pre class="program-detail-pre"><?php echo $veriyigoster['tarih']; ?></pre>

                </div>
              </div>
            <div class="panel panel-default">
                <div class="panel-body">
                  <p><b>Gönderilmiş Rapor Sayısı </b></p>
                  <pre class="program-detail-pre"><?php echo $veriyigoster['toplamraporsayisi']; ?></pre>

                </div>
              </div>
                <div class="panel panel-default">
                <div class="panel-body">
                  <p><b>Verilmiş Ödül Sayısı </b></p>
                  <pre class="program-detail-pre"><?php echo $veriyigoster['verilmisodulsayisi']; ?></pre>

                </div>
              </div>
</div>
<div class="col-lg-1 col-md-1 col-1"></div>

</div>