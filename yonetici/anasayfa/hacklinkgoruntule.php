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

$vericek = $conn -> prepare("SELECT * FROM hacklinkler where id = :id");
$vericek->bindParam(':id', $_GET['numara']);
$vericek-> execute();
$veriyigoster = $vericek -> fetch(PDO::FETCH_ASSOC);
?>
<?php
$alanadi = $veriyigoster["log"];
$alexaverisi = simplexml_load_file('http://data.alexa.com/data?cli=10&url='.$alanadi);
$dunyasiralamasi = number_format( (int) $alexaverisi->SD->POPULARITY['TEXT'] );
$ulkekodumuz = $alexaverisi->SD->COUNTRY['CODE'];
$ulkeadi = $alexaverisi->SD->COUNTRY['NAME'];
$ulkesiralamasi = number_format( (int) $alexaverisi->SD->COUNTRY['RANK'] );
$veriyigetir1 = $dunyasiralamasi;
$veriyigetir2 = $ulkeadi;
$veriyigetir3 = $ulkesiralamasi;
?>
     
<div class="tab-content">
      <div role="tabpanel" class="tab-pane active" id="overview">
        <div class="row">
            <div class="col-md-6">
               <div class="well billing-info">
                  <span>Alexa Dünya Sıralaması</span>
				  <br><?php echo $veriyigetir1; ?> 
               </div>
            </div>
            <div class="col-md-6">
               <div class="well billing-info">
                  <span>Ülke Adı ve Sıralaması</span>
				  <br><?php echo $veriyigetir2; ?> - <?php echo $veriyigetir3; ?> 
               </div>
            </div>
        </div>

        <div class="panel panel-default">
                <div class="panel-header">

                           <strong>Şuan'da <?php echo $veriyigoster["id"]; ?> Numaralı Hacklink'i Kontrol Ediyorsunuz !</strong><br>
                              Hacklinkinizi Kontrol Edebilirsiniz.

                           </div> 
                          <div class="panel-body">

  
                 <table style="width: 100%;" class="table table-striped">

				
			 
          <tr>
                            <td><a><div class="label label-danger">Linkiniz:</div> &nbsp;<strong><?php echo $veriyigoster["log"]; ?></strong> (#<?php echo $veriyigoster["id"]; ?>)</a></td>
                            <td><span style="float: right;">Tarih: <?php echo $veriyigoster["tarih"]; ?></span></td>
                        </tr>
          
                                              
                        

                                                
                    </table>

                
          </div>
       </div>
        
      </div>
    </div>
  </div>
</div>
