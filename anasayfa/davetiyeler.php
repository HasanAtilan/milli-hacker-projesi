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
   @font-face {
   font-family: "Redacted";
   src: url("/static/font/redacted-font/fonts/web/redacted-script-light.eot");
   src: url("/static/font/redacted-font/fonts/web/redacted-script-light.woff2") format("woff2"),
   url("/static/font/redacted-font/fonts/web/redacted-script-light.woff") format("woff"),
   url("/static/font/redacted-font/fonts/web/redacted-script-light.otf") format("opentype"),
   url("/static/font/redacted-font/fonts/web/redacted-script-light.svg%23filename") format("svg");
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
   #Hacktivity{
   width: 1300px;
   max-width: 100%;
   height: auto;
   display: flex;
   flex-direction: column;
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
   .particles-js-canvas-el{
   top: 0;
   left: 0;
   }
   @media only screen and (max-width: 768px) {
   #Hacktivity{
   width: 100%;
   }
   }
</style>
<br><br><br><br><br><br><br>
     <div class="col-lg-2"></div>
   <div class="col-lg-8">
      <div id="Hacktivity" style="position:absolute">
         <div class="logo">
  <div style="margin:0 auto;">
               <div class="glyphicon-ring" style="margin-right:10px;float:left;"><i  style="font-family : 'HACK' ; font-size:40px; margin-top:10px;color:#ffffff;" class="fas fa-user-secret"  ></i></div>
               <h1 style="font-family:'HACK' ; font-size:40px; color:#f0c526;float:left;"> Davetiyeler</h1>
            </div>
         </div>
         <div class="main">
            <div class="text">
               <h2>Davetiyeler</h2>
               Bu sayfada size özel gönderilmiş program davetiyelerini görebilir, bu davetiyeleri kabul ederek programlarda zaafiyet aramaya başlayabilirsiniz!
            </div>