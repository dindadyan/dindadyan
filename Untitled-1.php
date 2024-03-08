<?php
//membuat fungsi
function perkenalan($nama, $salam="assalamualaikum"){
    echo $salam.",";
    echo"Perkenalkan,nama saya".$nama."<br/>";
    echo"Senang berkenalan dengan anda<br/>";
}
//memanggil fungsi yang sudah di buat
perkenalan("endik","hi");
echo"<hr>";
$saya= "abdi";
$ucapanSalam ="Selamat pagi";
//memanggilnya lagi tanpa mengisi salam
perkenalan($saya);
?>