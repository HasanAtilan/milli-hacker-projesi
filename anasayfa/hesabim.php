

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


<div class="row" >


<div class="col-lg-12" style="position:absolute">



                <div class="tab-pane" style="margin-top:80px;">

                     <div class="row" >
                       <div class="col-lg-4"></div>
                      <div class="col-lg-1" ></div>
                      <div class="col-lg-4" >
                        <div class="glyphicon-ring" style="float:left;margin-right:10px;"><i   class="fas fa-wrench fset"></i></div>
                        <h1 class="display-2" style="color:#f0c526;">Ayarlar</h1>
                      </div>
                      <div class="col-lg-3"></div>

                      </div>
                      <div class="row" >
                        <div class="col-lg-1"></div>
                        <div class="col-lg-10">

                    <form class="form" action="##" method="post" id="registrationForm" enctype="multipart/form-data">

                        <input type='hidden' name='csrfmiddlewaretoken' value='wxQDlDkNpez403x1CQu8BYXx2piltD7hyudrcGi7QlwlNBHHpeTea2x2SV4ofuvL' />

                        <div class="form-group">
                          <div class="col-xs-6">
                              <label>İsim</label>
                              
                              <input class="form-control"  aria-describedby="emailHelp" name="first_name" id="last_name" value="<?php echo $profilgoster['isim']; ?>">
                              
                              <small id="first_name_help" class="form-text text-muted">Isminizi Giriniz</small>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-xs-6">
                            <label>Kullanici Adi</label>
                            
                            <input class="form-control"  aria-describedby="emailHelp" name="last_name" id="last_name" value="<?php echo $profilgoster['kullaniciadi']; ?>">
                            
                            <small id="first_name_help" class="form-text text-muted">Kullanici Adi Giriniz</small>
                          </div>
                        </div>

                      

                        <div class="form-group">
                          <div class="col-xs-12">

                              <label>Bio</label>
                              
                              <input class="form-control"  aria-describedby="emailHelp" name="bio" id="bio" placeholder="<?php echo $profilgoster['bio']; ?>" >
                              
                              <small id="first_name_help" class="form-text text-muted">Profilinizde görünecek bioyu giriniz</small>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-xs-6">
                            <label>Iban</label>
                            
                            <input class="form-control"  aria-describedby="emailHelp" name="iban" id="iban" placeholder="<?php echo $profilgoster['iban']; ?>" >
                            
                            <small id="first_name_help" class="form-text text-muted">IBAN bilginizi giriniz</small>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-xs-6">
                            <label>Telefon Numarası</label>
                            
                            <input class="form-control"  aria-describedby="emailHelp" name="phone_number" id="phone_number" placeholder="<?php echo $profilgoster['telefon']; ?>" >
                            
                            <small id="first_name_help" class="form-text text-muted">Telefon numarınızı giriniz</small>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-xs-12">

                              <label>Email</label>
                              <input class="form-control"  required="True" aria-describedby="emailHelp" name="email" id="id_email" placeholder="you@email.com" value="<?php echo $profilgoster['email']; ?>">
                              <small id="first_name_help" class="form-text text-muted">Emailinizi giriniz</small>
                          </div>
                        </div>



                     


                      



                      


                        





                        <div class="form-group">
                            <div class="col-xs-12">
                              
                              

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button type="submit" class="btn btn-success btn-shadow px-3 my-2 ml-0 text-left" id="green-button" >Güncelle</button>

                            </div>
                        </div>


                    </form>
                    </div>
                    <div class="col-lg-1"></div>

  </div>
                </div>

              </div>
      </div>
</div>
