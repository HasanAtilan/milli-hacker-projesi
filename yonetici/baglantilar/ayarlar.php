	<?php
	
session_start();
ob_start();
require 'baglantilar/database.php';

if( isset($_SESSION['user_id']) && !empty($_SESSION['user_id']) ){

	$records = $conn->prepare('SELECT * FROM users WHERE id = :id');
	$records->bindParam(':id', $_SESSION['user_id']);
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
$id = $_SESSION['user_id'];
?>


<?php
$veri1 = $conn->prepare("select * from users where id=?");
$veri1->execute(array($_SESSION['user_id']));
$islem1	= $veri1->fetch();

$var = $_SERVER['REMOTE_ADDR'];  
?>

<?php
$veri1907 = $conn->prepare("select * from duyurular where id=1");
$veri1907->execute(array($_SESSION['user_id']));
$islem1907	= $veri1907->fetch();

$var = $_SERVER['REMOTE_ADDR'];  
?>

<div id="holder" >

<div class="container"> 
 
    


</div>
</header>

<div style="margin-left:auto;margin-right:auto;width: 80%;">

 
<div class="panel panel-default">
  <div class="panel-body"><div style="float:left;">
  <i class="fa fa-user-circle-o"></i> <b>Sistem Duyurusu:</b> </i> Sitemiz Aktif Edilmiştir İsteklerinizi Facebook Sayfamızdan Takip Edebilirsiniz!</span> 
 </i></span> 
 </div>
 <div style="float:right;"><span class="label label-info"><i class="fa fa-info-circle"></i> Sürüm : v1.0.0</span></div>
 </div>
 </div>

<div class="panel-group">
	 
    <div class="panel panel-primary">
      <div class="panel-body">
<div align="center"><b><font size="3">
<a href="/">NEPİX.NET</a> İnternet Hizmetleri Sunucu Kontrol Paneli
</font>
</b>
</div>
      </div>
	 </div>
	 
</div>



	   
        		
<div style="margin-left:auto; margin-right:auto;width:60%;">


</div>
<center></center></div>


    <div id="page_middle">
	
        <ul class="nav nav-tabarka nav-tabs">
                                <li class="active">
					<a href="?sayfa=anasayfa"><i class="fa fa-user"></i> <b>Anasayfa</b></a>
				</li>
								
				 <li class="">
					<a href="?sayfa=sunucularim"><i class="fa fa-desktop"></i> <b>Hizmetlerim</b></a>
				</li>
				                		       
	


				
						<li class="">
                    <a href="cikis.php"><i class="fa fa-sign-out"></i> <b>Çıkış</b></a>
                </li>				
				
		
                               
            
          </ul>    
	
       
					
		
		
			    	
		

		
		
	
<script type="text/javascript">
function toggleview(element1) {

   element1 = document.getElementById(element1);

   if (element1.style.display == 'block' || element1.style.display == '')
      element1.style.display = 'none';
   else
      element1.style.display = 'block';

   return;
}
</script>
									
	

		  </td>
		 </tr>
		  		</tbody></table>


			    	
		

		
		
									
	

		  