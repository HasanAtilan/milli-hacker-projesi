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

<div class="row">

<div class="col-lg-2 col-md-2 col-sm-2"></div>
<div class="col-lg-8 col-md-8 col-sm-8">

          <div class="container">

            <div class="row">
              <div class="col-lg-3 col-md-3"></div>
              <div class="col-lg-8 col-md-8">

              
          </div>
     
	 <div class="col-lg-2 col-md-2"></div>
          </div>
            <div id="cards">
                
                   
                  
                     <div class="row">
                  
				  <?php 


$verial1 = $conn -> prepare("SELECT * FROM firmalar");
$verial1-> execute();
        while ($firmalarigoster = $verial1 -> fetch(PDO::FETCH_ASSOC)){
          echo ' <div class="col-lg-4 col-md-12 col-sm-12" >
                            <div class="card" id="card-id" >
                            <img class="card-img-top" src="'.$firmalarigoster["resim"].'" id="img-id" alt="Card image cap">
                             
                                    <div class="card-body" id="card-body-id" >
                             
                            <h4 class="card-title" >
                              
                              '.$firmalarigoster["baslik"].'

                            </h4>
                            <p class="card-text" >Başlangıç Tarihi : 
                                                                    '.$firmalarigoster["tarih"].'
                                                                   </p>
                            

                            <p class="card-text" style="color:#f0c526;"><i class="fas fa-money-bill-alt" style="color:#FFFFFF;"></i>    '.$firmalarigoster["minumumodul"].' TL -  '.$firmalarigoster["maksimumodul"].' TL</p>

                            

                              

                                <div class="btns">
                                  <a href="?sayfa=programgoruntule&numara='.$firmalarigoster["id"].'" class="btn btn-success" id="green-button"><i class="fas fa-eye"></i>  İncele</a>
                                  <a href="?sayfa=raporgonder&raporid='.$firmalarigoster["id"].'&raporadi='.$firmalarigoster["baslik"].'" class="btn btn-success" id="green-button"><i class="fas fa-bug"></i> Raporla</a>
                                </div>
                              

                              


                            </div>
                            </div>
                          </div> '; 
		  
        }

       ?>
	   
	   
                  
                    </div>
                  

                
              </div>

          </div>
          </div>
</div>