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


     
<style>
#topdiv{
  style=width:100px;
  margin-left:30%;
  margin-top:10px;
}

#reportimage {
    width: 30px;
    border-radius: 30%;
}

#leadersimage {
    height: 100px;
}

#medalimage {
    height: 30px;
}

#reportimage:hover {
}

#pp{
  width:200px;
}

.cont-class{
  position:absolute;
  margin-top:100px;
  width: 100%;
}
.display-2{
  color:#3bb12e;
}

.leaderreporters:hover{
  color:green;
  text-decoration: none;

}

.f {
  margin-top: 15px !important;

}

.glyphicon-ring {
  border: 4px dotted #f0c526;
  width: 80px;
  height: 80px;
  border-radius: 50%;
  color: #000;
  display: inline-table;
  text-align: center;
}

.glyphicon-ring2 {
  border: 3px dashed #f0c526;
  width: 30px;
  height: 30px;
  border-radius: 50%;
  color: #000;
  display: inline-table;
  text-align: center;
}

</style>

  <div class="cont-class">

  <div class="col-lg-2"></div>

  <div class="col-lg-8 col-md-12 col-sm-12">
        <div>

            <table class="table table-hover table-striped">

              <div class="row" style="margin-bottom:15px; ">
                  <div style="margin:0 auto;">
                      <div class="glyphicon-ring" style="margin-right:10px;float:left;"><i  style="font-family : 'HACK' ; font-size:40px; margin-top:10px;color:#ffffff;" class="far fa-exclamation f"  ></i></div>
                      <h1 style="font-family:'HACK' ; font-size:40px; color:#f0c526;float:left;"> Raporlarım</h1>
                  </div>
              </div>

              <thead class="thead-dark">
                <tr>
                  <th>Program  <i class="fas fa-tasks"></th>
                  <th>Zaafiyet</br>Derecesi  <i class="fas fa-signal"></i></th>
                  <th>Rapor</br>Başlığı <span class="glyphicon glyphicon-file"></span></th>
                  <th>Rapor</br>Durumu  <i class="fas fa-spinner"></th>
                  <th>Yaratılma</br>Tarihi <i class="fas fa-calendar-alt"></i></th>
                  <th>Son Değiştirilme</br>Tarihi <i class="fas fa-calendar-alt"></i></th>
                  <th>Son Güncelleyen</br>Kullanıcı  <span class="glyphicon glyphicon-pencil"></span></th>
                  <th>Rapora</br>Git  <i class="fa fa-location-arrow"></i></th>
                </tr>
              </thead>
              <tbody>
                
                                  
<?php 

$numara1 = $_SESSION['user_id'];
$verial1 = $conn -> prepare("SELECT * FROM raporlar WHERE alanid = :alanid");
$verial1->bindParam(':alanid', $numara1);
$verial1-> execute();
        while ($raporgoster = $verial1 -> fetch(PDO::FETCH_ASSOC)){
          echo ' <tr>
                                    <td>'.$raporgoster["raporadi"].'</td>
                                    
                                    
                                    <td  style="font-weight:bold; color: #FE642E;" >'.$raporgoster["zafiyetderecesi"].'</td>
                                    
                                    
                                    
                                    <td>'.$raporgoster["zafiyettipi"].'</td>

                                      <td style="color:#0489B1;font-weight:bold;">Yeni </td>

                                    <td>
                                      
                                        '.$raporgoster["tarih"].'
                                      
                                    </td>
                                    <td>
                                        
                                          '.$raporgoster["tarih"].'
                                        
                                    </td>
                                    
                                    <td style="font-weight:bold; color: #FE642E;">'.$raporgoster["raporisim"].'</td>
                                    

                                    

                                    <td><a href="303">'.$raporgoster["id"].'</a></td>
                                  </tr> '; 
		  
        }

       ?>
                                  


              </tbody>
            </table>

        </div>


  </div>
  <div class="col-lg-2"></div>

</div>


				
				
                                              
                        

                                                
                 

