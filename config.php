<?php
/**
 * RX Framework 1.2
 */
    require_once 'src/RXCore.php';

    date_default_timezone_set('Europe/Istanbul');
    header('Content-Type: text/html; Charset=UTF-8');
    $StaticConfig = array(
        'SYS_VERSION'=>'1.0.0',
        'SYS_ASSET'=>'assets',
        'SYS_SRC'=>'src',
        'SYS_WEBAPP_APP'=>'app',
        'SYS_WEBAPP_HEADER'=>'_Header',
        'SYS_WEBAPP_HOME'=>'_Home',
        'SYS_WEBAPP_FOOTER'=>'_Footer',
        'SYS_DOWNLOAD_FOLDER'=>'DownFiles',
        'SYS_TITLE'=>'Ramazan İmsakiyesi 2019'
    );
    $ProdConfig = array(
        'SYS_MAIN'=>'',
        'MYSQL_HOST'=>'',
        'MYSQL_DB'=>'',
        'MYSQL_USER'=>'',
        'MYSQL_PASS'=>'',
        'SYS_SSL'=>false,
        'SYS_PROXY'=>false
    );
    $DevConfig = array(
        'SYS_MAIN'=>'FS@Imsakiye', // localhost/????
        'MYSQL_HOST'=>'',
        'MYSQL_DB'=>'',
        'MYSQL_USER'=>'',
        'MYSQL_PASS'=>'',
        'SYS_SSL'=>false,
        'SYS_PROXY'=>false
    );
    $ConfigList = array(
        "PROD" => $ProdConfig,
        "DEV" => $DevConfig
    );

/*************************** RUNNING ******************************/

    RXCore::generateDefines($StaticConfig);
    RXCore::setConfig("DEV",$ConfigList);


    // Custom Classes && Modules
    RXCore::getCore("RX");
    RXCore::getCore("Query");



?>