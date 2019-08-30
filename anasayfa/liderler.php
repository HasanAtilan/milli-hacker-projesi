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



<br><br><br>
<div class="cont-class">

    <div class="col-lg-4 col-md-0"></div>

    <div class="col-lg-4 col-md-12">
        <div>
            <table class="table table-hover table-striped">


                <div class="row" style="margin-bottom:15px; ">
                    <div style="margin:0 auto;">
                        <div class="glyphicon-ring"
                             style="margin-right:10px;float:left;"><i
                                style="font-family : 'HACK' ; font-size:40px; margin-top:10px;color:#ffffff;"
                                class="far fa-crosshairs f"></i></div>
                        <h1 style="font-family:'HACK' ; font-size:40px; color:#f0c526;float:left;margin-top:20px;">
                            Liderler</h1>
                    </div>
                </div>


                <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Hacker</th>
                    <th>Puan</th>
                </tr>
                </thead>
                <tbody>
                
				<?php 


    $verial1 = $conn -> prepare("SELECT * FROM kullanicilar ORDER BY toplampuan DESC LIMIT 5");
    $verial1-> execute();
	$rutbecek = 1; 
        while ($liderler = $verial1 -> fetch(PDO::FETCH_ASSOC)){
		


          echo '<tr>
                        

                        

                            <th scope="row">
                                <div class="glyphicon-ring3"><img style="
    height: 40px;
                                        id="medalimage"
                                        src="tasarim/'.$rutbecek++.'.png"/>
                                </div>
                            </th>

                        

                        

                        


                        <td><span></span>
                            <tab style="margin-left:10px;">
                                
                                    <a href="?sayfa=kullanicilar&numara='.$liderler["id"].'" class="leaderreporters">'.$liderler["kullaniciadi"].'</a>
                                
                            </tab>
                        </td>
                        <td> '.$liderler["toplampuan"].'
                        </td>

                    </tr>'; 
		  
        }

       ?>

                    <?php  ?>
                

                </tbody>
            </table>

        </div>


    </div>
    <div class="col-lg-4 col-md-0"></div>

</div>

