# PTT Generate Barcode

```php
PTT kargo barkod üretme/hesaplama fonksiyonu
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
 ```
 
 ### Hesaplama Formülü
 
 ```php
 Verilen 12 haneli barkod aşağıda örnek gösterilen metodla 1 ve 3 değerleri 
 ile sırasıyla çarpılıp, elde dile toplamı bir üstteki 10 un katına tamamlayan 
 sayı check digit olarak bulunur. 
 Toplam zaten 10 un katı ise check digit 0 dır.
  															
  			N1 	N2 	N3	N4 	N5 	N6 	N7 	N8 	N9 	N10 	N11 	
  
  	
  Barkod	2	7	5	0	3	6	5	6	9	8	4	5	6		
  Çarpan	1	3	1	3	1	3	1	3	1	3	1	3			
  															
  Çarpım	2	21	5	0	3	18	5	18	9	24	4	15			
  															
  Toplam	124			
  Check Digit	6			0
 ```