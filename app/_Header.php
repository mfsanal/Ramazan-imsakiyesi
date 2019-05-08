<!DOCTYPE html>
<html class="no-js" lang="tr"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?=RX::_title()?>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=RX::_asset("css/normalize.css")?>">
    <link rel="stylesheet" href="<?=RX::_asset("css/font-awesome.css")?>">
    <link rel="stylesheet" href="<?=RX::_asset("css/bootstrap.min.css")?>">
    <link rel="stylesheet" href="<?=RX::_asset("css/templatemo-style.css")?>">
    <script src="<?=RX::_asset("js/vendor/modernizr-2.6.2.min.js")?>"></script>
    <style>
        .panel-body{color: black;}
        .gizle{display: none;}
        p{position:absolute;font-size:12px;font-family:Arial,Helvetica,sans-serif;color:#3a0f00;}
        .r90{-webkit-transform:rotate(-90deg);-moz-transform:rotate(-90deg);-ms-transform:rotate(-90deg);-o-transform:rotate(-90deg);}
        .ims{
            z-index: -9999;
            width: 1000px;
            height: 1375px;
            display: none;
        }
    </style>
</head>
<div id="ims" class="ims"></div>
<body>
<div id="loader-wrapper">
    <div id="loader"></div>
</div>
<div class="content-bg"></div>
<div class="bg-overlay"></div>

<!-- SITE TOP -->
<div class="site-top">
    <div class="site-header clearfix">
        <div class="container" align="center">
            <a href="<?=RX::_link("Home")?>">
                <img class="visible-xs hidden-sm" src="<?=RX::_asset("images/2017_3.png")?>">
                <img class="hidden-xs visible-sm" src="<?=RX::_asset("images/2017_2.png")?>">
                <img class="hidden-xs hidden-sm" src="<?=RX::_asset("images/2017.png")?>">
            </a>
        </div>
    </div> <!-- .site-header -->
</div> <!-- .site-top -->