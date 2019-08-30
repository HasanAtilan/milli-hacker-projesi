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
error_reporting(0);
$sunucu = 'localhost';
$kullanici = 'root';
$sifre = 'hacker';
$veritabani = 'hacker';

try{
	$conn = new PDO("mysql:host=$sunucu;dbname=$veritabani;", $kullanici, $sifre);
	$conn->exec("SET NAMES 'utf8'; SET CHARSET 'utf8'");
} catch(PDOException $e){
	die( "Bağlantı sağlanamadı: " . $e->getMessage());
}