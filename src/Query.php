<?php
/**
 * RX Framework 1.2
 */
class Query
{
    public static function runTime(){ return date("Y-m-d H:i:s"); }

    public static function loadStates()
    {
        $reVal = array();
        $json = json_decode(file_get_contents(RX::_asset("data.json")));
        foreach ($json as $item){
            array_push($reVal,array("StateID"=>$item->StateID,"StateName"=>$item->StateName));
        }
        echo json_encode($reVal);
    }

    public static function loadCities()
    {
        $stateID = $_POST["stateID"];
        $reVal = json_encode(array("error"=>true));
        $json = json_decode(file_get_contents(RX::_asset("data.json")));
        foreach ($json as $item){
            if($item->StateID==$stateID){
                echo json_encode($item->Cities);
                break;
            }
        }
        //echo $reVal;
    }

    public static function generateImsakiye()
    {
        $iCountry = $_POST["iCountry"];
        $iState = $_POST["iState"];
        $iCity = $_POST["iCity"];
        $yearGregorian = $_POST["yearGregorian"];
        $yearHijri = $_POST["yearHijri"];
        $iFitre = $_POST["iFitre"];

        $rawData = RX::getImsakiyeRawData($iCountry,$iState,$iCity);

        $_html ='<div style="background: url(\''.RX::_asset("imsakiye.jpg").'\') no-repeat;width: 1000px;height: 1375px;">';
        for ($i=2;$i<28;$i++):
            $_html .= RX::imsWriteItem((639+(20.80*($i-2))),170,RX::imsHijriDay(RX::imsVar($rawData,$i,0)));
            $_html .= RX::imsWriteItem((639+(20.80*($i-2))),200,RX::imsGregorianDay(RX::imsVar($rawData,$i,1)));
            $_html .= RX::imsWriteItem((639+(20.80*($i-2))),270,RX::imsGregorianName(RX::imsVar($rawData,$i,1)));
            $_html .= RX::imsWriteItem((639+(20.80*($i-2))),400,RX::imsVar($rawData,$i,2));
            $_html .= RX::imsWriteItem((639+(20.80*($i-2))),480,RX::imsVar($rawData,$i,3));
            $_html .= RX::imsWriteItem((639+(20.80*($i-2))),560,RX::imsVar($rawData,$i,4));
            $_html .= RX::imsWriteItem((639+(20.80*($i-2))),640,RX::imsVar($rawData,$i,5));
            $_html .= RX::imsWriteItem((639+(20.80*($i-2))),720,RX::imsVar($rawData,$i,6));
            $_html .= RX::imsWriteItem((639+(20.80*($i-2))),800,RX::imsVar($rawData,$i,7));
        endfor;

        $_html .= RX::imsWriteItem(1179.8,460,"KADİR GECESİ");

        for ($i=29;$i<32;$i++):
            $_html .= RX::imsWriteItem((1200+(20.80*($i-29))),170,RX::imsHijriDay(RX::imsVar($rawData,$i,0)));
            $_html .= RX::imsWriteItem((1200+(20.80*($i-29))),200,RX::imsGregorianDay(RX::imsVar($rawData,$i,1)));
            $_html .= RX::imsWriteItem((1200+(20.80*($i-29))),270,RX::imsGregorianName(RX::imsVar($rawData,$i,1)));
            $_html .= RX::imsWriteItem((1200+(20.80*($i-29))),400,RX::imsVar($rawData,$i,2));
            $_html .= RX::imsWriteItem((1200+(20.80*($i-29))),480,RX::imsVar($rawData,$i,3));
            $_html .= RX::imsWriteItem((1200+(20.80*($i-29))),560,RX::imsVar($rawData,$i,4));
            $_html .= RX::imsWriteItem((1200+(20.80*($i-29))),640,RX::imsVar($rawData,$i,5));
            $_html .= RX::imsWriteItem((1200+(20.80*($i-29))),720,RX::imsVar($rawData,$i,6));
            $_html .= RX::imsWriteItem((1200+(20.80*($i-29))),800,RX::imsVar($rawData,$i,7));
        endfor;

        $_html .= RX::imsWriteItem(520,350,$yearGregorian." &nbsp; ".RX::imsState($rawData),16);
        $_html .= '<p style="top:530px; left:365px; font-size:16px;" class="r90"><b>____</b></p>';
        $_html .= RX::imsWriteItem(540,350,$yearHijri." &nbsp; Ramazan İmsakiyesi",16);
        $_html .= RX::imsWriteItem(542,350,"____________",18);
        $_html .= RX::imsWriteItem(570,350,RX::imsBayramDate($rawData)." ".RX::imsBayramTime($rawData),14);

        $_html .= '</div>';

        echo $_html;
    }
}