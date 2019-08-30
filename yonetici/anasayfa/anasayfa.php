

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


 
 <div class="panel panel-default">
                <div class="panel-header">

                           <strong>Sayın Hasan Hoşgeldin.</strong><br>
                              Yöneticisiniz Görevinizi İyi Kullanın!.

                           </div> 
                          
       </div>