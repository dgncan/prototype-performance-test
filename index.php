<?php
/**
 * Created by PhpStorm.
 * User: dogancan
 */
ini_set("display_errors",1);
error_reporting(E_ALL & ~E_NOTICE);
require("setup.php");


?>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <a href="?test=browser">Browserdan Görünümlü Test</a>&nbsp;&nbsp;
        <a href="?test=olcum">10bin loop deneme</a><hr>
<?php

if ($_GET['test']=="browser") {
    $uret = new ResimSunum("samanyolu.jpg");
    $uret->browserdanGorunumlu();
}

if ($_GET['test']=="olcum") {
    $uret = new ResimSunum("samanyolu.jpg");
    $uret->gorunumsuzSenaryo();
}
?>

    </body>
</html>


