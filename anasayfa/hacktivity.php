

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
<style>

@font-face {
    font-family: "Redacted";
    src: url("/static/font/redacted-font/fonts/web/redacted-script-light.eot");
    src: url("/static/font/redacted-font/fonts/web/redacted-script-light.woff2") format("woff2"),
         url("/static/font/redacted-font/fonts/web/redacted-script-light.woff") format("woff"),
         url("/static/font/redacted-font/fonts/web/redacted-script-light.otf") format("opentype"),
         url("/static/font/redacted-font/fonts/web/redacted-script-light.svg%23filename") format("svg");
}

.prototype {
    font-family: "Redacted";
    color: #999;
}

.prototype-script {
    font-family: "Redacted Script";
    color: #999;
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


#Hacktivity{
  width: 920px;
  max-width: 100%;
  height: auto;
  display: flex;
  flex-direction: column;
  margin: 0px auto;
  margin-top: 120px;
  color: #e5e2fd;
}
  #Hacktivity > .logo{
    width: 100%;
    height: auto;
    display: flex;
    justify-content: center;
    margin-bottom: 15px;
  }

  #Hacktivity > .main{
    width: 100%;
    height: auto;
    padding: 20px;
    background-color: rgba(0,0,0,0.4);
    display: flex;
    flex-direction: column;
  }
    #Hacktivity > .main > .text{
      width: 100%;
      height: auto;
      padding: 25px 0px;
      padding-bottom: 40px;
    }

    #Hacktivity > .main > .wrapper{
      width: 100%;
      height: auto;
      display: flex;
      flex-direction: column;
    }
      #Hacktivity > .main > .wrapper > .wrap{
        display: flex;
        flex-direction: column;
        padding: 20px 0px;
        border-bottom: solid 2px #ffffff;
      }
        #Hacktivity > .main > .wrapper > .wrap > .head{
          width: 100%;
          height: auto;
          align-items: center;
          display: flex;
          justify-content: space-between;
          flex-direction: row;
        }
          #Hacktivity > .main > .wrapper > .wrap > .head > div{
            flex: 0px auto;
          }
            #Hacktivity > .main > .wrapper > .wrap > .head > div > img{
              width: 130px;
              height: 40px;
              border: solid 1px #ffffff;
              border-radius: 5px;
            }

          #Hacktivity > .main > .wrapper > .wrap > .head > .content{
            flex: 1;
          }

        #Hacktivity > .main > .wrapper > .wrap > .bottom{
          width: 100%;
          height: auto;
          align-items: center;
          display: flex;
          justify-content: center;
          flex-direction: row;
        }
          #Hacktivity > .main > .wrapper > .wrap > .bottom > div{
            display: flex;
            flex: 0px auto;
            align-items: center;
            font-size: 13px;
          }
          #Hacktivity > .main > .wrapper > .wrap > .bottom > div > div{
            padding-left: 4px;
            margin-right: 10px;
          }

          .particles-js-canvas-el{
            position: absolute;
            top: 0;
            left: 0;
          }
@media only screen and (max-width: 768px) {
  #Hacktivity{
  width: 100%;
}
  #Hacktivity > .logo{
    width: 100%;
    height: auto;
    display: flex;
    justify-content: center;
    margin-bottom: 15px;
  }

  #Hacktivity > .main{
    width: 100%;
    flex-direction: column;
  }
    #Hacktivity > .main > .wrapper{
      width: 100%;
      height: auto;
      display: flex;
      flex-direction: column;
    }
      #Hacktivity > .main > .wrapper > .wrap{
        display: flex;
        flex-direction: column;
      }
        #Hacktivity > .main > .wrapper > .wrap > .head{
          flex-direction: column;
          text-align: center;
        }
          #Hacktivity > .main > .wrapper > .wrap > .head > div{
            flex: 0px auto;
          }


          #Hacktivity > .main > .wrapper > .wrap > .head > .content{
            flex: 1;
            padding: 10px 0px;
            font-size: 18px;
          }

        #Hacktivity > .main > .wrapper > .wrap > .bottom{
          width: 100%;
          flex-direction: row;
          justify-content: space-between;
          padding-top: 10px;
        }
          #Hacktivity > .main > .wrapper > .wrap > .bottom > div{
            font-size: 11px;
          }
}
</style>

<div id="Hacktivity">
  <div class="logo">
    <div style="margin:0 auto;">
        <div class="glyphicon-ring" style="margin-right:10px;float:left;"><i  style="font-family : 'HACK' ; font-size:40px; margin-top:10px;color:#ffffff;" class="fas fa-user-secret"  ></i></div>
        <h1 style="font-family:'HACK' ; font-size:40px; color:#f0c526;float:left;"> Hacktivity</h1>
    </div>
  </div>

  <div class="main">
    <div class="text">
      <h2>Hacktivity</h2>
Hacktivity sayfası sayesinde sisteme kayıtlı hackerların bulduğu ve 2 tarafın anlaşmalı olarak yayınladığı raporları görüntüleyebilirsiniz. Bu size tecrübe kazandıracaktır.
    </div>


     <ul class="pagination">
         
     </ul>



      <?php 


    $verial1 = $conn -> prepare("SELECT * FROM hacktivity");
    $verial1-> execute();
	$rutbecek = 1; 
        while ($oduller = $verial1 -> fetch(PDO::FETCH_ASSOC)){
		


          echo ' <div class="wrapper">
                  <div class="wrap">
                    <div class="head">
                      <div class="image">
                        <img src="'.$oduller["firmalogo"].'">
                      </div>

                        
                              <img src="https://resmim.net/f/vjsija.png?nocache">
                        

                      <div class="date" style="font-size: 14px;">
                        '.$oduller["tarih"].'
                      </div>
                    </div>

                    <div class="bottom">
                      <div>
                        <i class="far fa-chevron-circle-right " style="color:green"></i><div> '.$oduller["firmadi"].'</div>
                      </div>

                      <div>
                        <i class="far fa-user " style="color:green"></i><div> '.$oduller["kazananisim"].'</div>
                      </div>

                      <div>
                        <i class="far fa-lock " style="color:green"></i><div>'.$oduller["seviye"].'</div>
                      </div>

                        
                      <div>
                        <i class="far fa-gift " style="color:green"></i><div>'.$oduller["hediyepaketi"].'</div>
                      </div>
					  
					   <div>
                        <i class="fas fa-money-bill-alt" style="color:green"></i><div>'.$oduller["paraodulu"].' TL</div>
                      </div>
                        
                    </div>
                  </div>
                </div>
            
    
          
                
            
    
          
              
                        
                    
            
    

  </div>

</div>'; 
		  
        }

       ?>

                    <?php  ?>
          
               

