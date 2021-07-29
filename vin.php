<?php
if (isset($_GET['vin'])) {
    $vin = $_GET['vin'];
    if ($vin > '') header('Location: https://app.qrcar.online/#/'.$vin);
}
?>