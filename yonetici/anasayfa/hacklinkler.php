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
if (isset($_GET['numara'])) {
$numaras = $_GET['numara'];	
$silhacklink = $conn -> prepare("DELETE FROM hacklinkler where id = :id");
$silhacklink->bindParam(':id', $_GET['numara']);
$silhacklink-> execute();
if($silhacklink){
 
echo '<meta http-equiv="refresh" content="2;URL=?sayfa=hacklinkler">
 <div class="col-md-9">
<div class="alert alert-dismissible alert-success">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Hacklink Başarı İle Silindi. 2 Saniye İçinde Yönlendiriliyorsunuz</strong>
                </div>';
}else{
 
echo "başarısız";
}  
} 
?> 


        <div class="panel panel-default">
                <div class="panel-header">

                           <strong>Hacklinklerinizi Yönetebilirsiniz</strong><br>
                              Hacklinkinizi Kontrol Edebilirsiniz.

                           </div> 
                          <div class="panel-body">

  
                <table style="width: 100%;" class="table table-striped">

				
				<?php 


$verial1 = $conn -> prepare("SELECT * FROM hacklinkler");
$verial1-> execute();
        while ($hacklinkgostermrhasan = $verial1 -> fetch(PDO::FETCH_ASSOC)){
          echo ' 
          <tr>
                            <td><a><div class="label label-danger">Linkiniz:</div> &nbsp;<strong>'.$hacklinkgostermrhasan["log"].'</strong> (#'.$hacklinkgostermrhasan["id"].')</a></td>
							<td><span style="float: right;"><a href="?sayfa=hacklinkgoruntule&numara='.$hacklinkgostermrhasan['id'].'" class="btn-success btn-sm">Hemen Yönet</a>&nbsp; <a href="?sayfa=hacklinkler&numara='.$hacklinkgostermrhasan['id'].'" class="btn-success btn-sm">Hemen Sil</a></td>

					   </tr>
          '; 
		  
        }

       ?>
                                              
                        

                                                
                    </table>


                
          </div>
       </div>
        
      </div>
    </div>
  </div>
</div>
