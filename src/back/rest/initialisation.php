<?php
    include './service.php';
    $api = new Service('SW227', 'QLUdK193Ye');
    $api->setSerial(Service::generateSerial());
    $api->initialization();
?>