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
<div class="left-2 col-sm-6">
                        <a><div class="panel panel-default memory-select">
                            <div class="panel-body">
                                <p class="memory-amount" style="margin-bottom: 0;"><strong>Kullanıcı Yönetimi</strong><br>Kullanıcıları Listeliyebilirsiniz!</p>
                            </div>
                        </div></a>
                    </div>
                    <div class="right-2 col-sm-6">
                        <a><div class="panel panel-default memory-select">
                            <div class="panel-body">
                                <p class="memory-amount" style="margin-bottom: 0;"><strong>Kullanıcı Düzenleme</strong><br>Kullanıcının Üzerine Tıklayarak Düzenliyebilirsiniz</p>
                            </div>
                    </div></a>
                    </div>
					
					


<?php 

$vericek = $conn -> prepare("SELECT * FROM kullanicilar");
$vericek-> execute();

?>



<?php 
        while ($veriyigoster = $vericek -> fetch(PDO::FETCH_ASSOC)){
          echo '<table class="table table-striped">
  

        <tbody>

                                 
                        <tr>
                            <td><a href="?sayfa=uyeduzenle&id='.$veriyigoster["id"].'"><div class="label label-danger">Kullanıcı!</div> &nbsp;<strong>'.$veriyigoster["isim"].' - '.$veriyigoster["kullaniciadi"].' - '.$veriyigoster["email"].' </strong> </a></td>
                        </tr>

                                                
                        

                             '; 
        }

       ?>



 




   </div>
  
    </div>
  </div>
 </div>


					
