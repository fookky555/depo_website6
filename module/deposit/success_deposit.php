<?php
echo "<p align='center'><img src='img\loading.png'></p>";
if(empty($_GET['confirm'])){
    echo "<label id='result' data-id='0'></label>";
    echo "<label id='deposit_id' data-id='$_GET[id]'></label>";
}else{

}