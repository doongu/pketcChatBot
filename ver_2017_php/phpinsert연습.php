<?php
    

$mysqli_2 = mysqli_connect('18.188.253.23','root','rlflsdPrh12', 'weather');
mysqli_select_db($mysqli_2, 'weather') or die('dd');
mysqli_query($mysqli_2,"set names utf8"); 
$sql_wea = "SELECT * FROM weather";
$result_wea = mysqli_query($mysqli_2,$sql_wea);
$wea = "";

for($p=0; $p<2; $p++){
  $data_2 = mysqli_fetch_array($result_wea);
  $wea = $wea."\n".$data_2[0]."\n"."\n".$data_2[1]."\n";
  
}

printf("%s", $wea);
?>