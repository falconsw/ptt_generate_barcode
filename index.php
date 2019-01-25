<?php
/**
 * Created by PhpStorm.
 * User: omerdogan
 * Date: 2019-01-25
 * Time: 21:41
 */


// PTT kargo barkod üretme/hesaplama fonksiyonu
function generatePttBarcode()
{
    // Ptt tarafından size verilen barkod aralığı
    $code=mt_rand(278140000000, 278149000000);
    $codeArr=str_split($code);
    $codeTotal=array();
    foreach ($codeArr as $key=>$codeVal){
        if($key%2==0){
            $codeTotal[]=$codeVal*1;
        } else {
            $codeTotal[]=$codeVal*3;
        }
    }
    $codeSum=array_sum($codeTotal);
    $newCode=$code.$codeSum%10;
    return $newCode;
}


var_dump(generatePttBarcode());
//example output : string(13) "2781475297055"