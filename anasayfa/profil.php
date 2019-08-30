

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
$numara1 = $_SESSION['user_id'];
$verial1 = $conn -> prepare("SELECT * FROM kullanicilar WHERE id = :id");
$verial1->bindParam(':id', $numara1);
$verial1-> execute();
$profilgoster = $verial1 -> fetch(PDO::FETCH_ASSOC);
?>
<div class="custom-cont">

    <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-1"></div>

        <div class="col-lg-2 col-md-10 col-sm-10">
            <div class="card">
                <img class="card-img-top" src="https://www.millihacker.com/media/avatars/default/hacker_default.jpg"
                     alt="Card image cap" id="hacker-pp">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item list-group-item-action"><strong>Katıldığı
                        Tarih<span class="right-span"><i
                                class="fal fa-calendar-alt"></i></span></br>
                    </strong></span>
                        
                            <?php echo $profilgoster['tarih']; ?>
                        
                    </li>
                    <li class="list-group-item list-group-item-action"><strong>Rapor
                        Sayısı<span class="right-span"><i
                                class="far fa-file-edit"></i></span></br>
                    </strong></span><?php echo $profilgoster['raporsayisi']; ?></li>
                    <li class="list-group-item list-group-item-action"><strong>Ödül
                        Sayısı<span class="right-span"><i
                                class="far fa-trophy-alt"></i></span></br>
                    </strong></span> <?php echo $profilgoster['odulsayisi']; ?></li>
                    <li class="list-group-item list-group-item-action"><strong>Seviye<span
                            class="right-span"><i
                            class="fal fa-level-up-alt"></i></span></br>
                    </strong></span><?php echo $profilgoster['seviye']; ?></li>
                    <li class="list-group-item list-group-item-action"><strong>Toplam
                        Puan<span class="right-span"><i
                                class="fal fal fa-star"></i></span></br>
                    </strong></span><?php echo $profilgoster['toplampuan']; ?></li>
                    <li class="list-group-item list-group-item-action"><strong>Genel
                        Sıralama<span class="right-span"><i
                                class="fal fa-user-secret"></i></span></br>
                    </strong></span><?php echo $profilgoster['genelsiralama']; ?>.
                    </li>


                </ul>
            </div>
            <div class="card" style="margin-top:25px; margin-bottom:15px;">
                <div class="card-header">
                    Bio <span class="right-span"><i
                        class="far fa-info"></i></span>
                </div>
                <div class="card-body">
                    <p><?php echo $profilgoster['bio']; ?></p>
                    </blockquote>
                </div>
            </div>
            <div class="row" style="margin-top:15px;">

                


               

                <div class="col-lg-1 col-sm-0"></div>

            </div>


        </div>

        <div class="col-lg-6 col-md-8 col-sm-8">
            <h1 class="display-2" style="margin-bottom:40px;">
                          <span class="left-span">
                            <div class="glyphicon-ring">
                              <i class="far fa-user"
                                 style="color:#fff;margin-top:8px;"></i>
                            </div>
                          </span>
                <span style="margin-left:10px;"><?php echo $profilgoster['kullaniciadi']; ?>
                          </span>

            </h1>


            <div class="row" style="margin-top:50px;margin:auto;">

                <h1 class="display-4 "></h1>

            </div>

            <div class="row">

                


            </div>



            


        </div>


        <div class="col-lg-2 col-md-2 col-sm-2" style="width:500px">
            <div class="row">
                              <span style="float:right;">
                              <img src="https://www.millihacker.com/media/levels/level1_iIiUy6Z.png"
                                   title="" style="width:300px;">
                              </span>

                <div style="width:300px;">

                    <div class="progress"
                         style="margin-top:10px;width:220px;margin-left:40px;"
                         title="Bu seviyede puan : 0 Bulunması Gereken : 999">
                        
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                                 role="progressbar" aria-valuenow="50"
                                 aria-valuemin="0" aria-valuemax="100"
                                 style="width : 0%;background-color:#00BFFF! important;"></div>
                        
                    </div>
                </div>
            </div>
            <div class="row">


            </div>


            <div class="row">

                <div class="col-lg-2"></div>
                <div class="col-lg-8">

                    <h1 class="display-4" style="margin-top:40px;">
                        Rozetler</h1>

                </div>
                <div class="col-lg-2"></div>

            </div>

            <div class="row">

                <div id="cards">


                    

                </div>
            </div>
        </div>

        <div class="col-lg-1 col-md-1 col-sm-1"></div>

    </div>


</div>
     