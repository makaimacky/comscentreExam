<?php function numtowords($num){ 
$decones = array( 
            '01' => "ONE", 
            '02' => "TWO", 
            '03' => "THREE", 
            '04' => "FOUR", 
            '05' => "FIVE", 
            '06' => "SIX", 
            '07' => "SEVEN", 
            '08' => "EIGHT", 
            '09' => "NINE", 
            10 => "TEN", 
            11 => "ELEVEN", 
            12 => "TWELVE", 
            13 => "THIRTEEN", 
            14 => "FOURTEEN", 
            15 => "FIFTEEN", 
            16 => "SIXTEEN", 
            17 => "SEVENTEEN", 
            18 => "EIGHTEEN", 
            19 => "NINETEEN" 
            );
$ones = array( 
            0 => " ",
            1 => "ONE", 
            2 => "TWO", 
            3 => "THREE", 
            4 => "FOUR", 
            5 => "FIVE", 
            6 => "SIX", 
            7 => "SEVEN", 
            8 => "EIGHT", 
            9 => "NINE", 
            10 => "TEN", 
            11 => "ELEVEN", 
            12 => "TWELVE", 
            13 => "THIRTEEN", 
            14 => "FOURTEEN", 
            15 => "FIFTEEN", 
            16 => "SIXTEEN", 
            17 => "SEVENTEEN", 
            18 => "EIGHTEEN", 
            19 => "NINETEEN" 
            ); 
$tens = array( 
            0 => "",
            2 => "TWENTY", 
            3 => "THIRTY", 
            4 => "FORTY", 
            5 => "FIFTY", 
            6 => "SIXTY", 
            7 => "SEVENTY", 
            8 => "EIGHTY", 
            9 => "NINETY" 
            ); 
$hundreds = array( 
            "HUNDRED", 
            "THOUSAND", 
            "MILLION", 
            "BILLION", 
            "TRILLION", 
            "QUADRILLION" 
            ); //limit t quadrillion 
$num = number_format($num,2,".",","); 
$num_arr = explode(".",$num); 
$wholenum = $num_arr[0]; 
$decnum = $num_arr[1]; 
$whole_arr = array_reverse(explode(",",$wholenum)); 
krsort($whole_arr); 
$rettxt = ""; 
foreach($whole_arr as $key => $i){ 
    if($i < 20){ 
       
    }
    elseif($i < 100){ 
        $rettxt .= $tens[substr($i,0,1)]; 
        $rettxt .= " ".$ones[substr($i,1,1)]; 
    }
    else{ 
        $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
        $rettxt .= " ".$tens[substr($i,1,1)]; 
        $rettxt .= "-".$ones[substr($i,2,1)]; 
    } 
    if($key > 0){ 
        $rettxt .= " ".$hundreds[$key]." "; 
    } 

} 
$rettxt = $rettxt." DOLLARS";

if($decnum > 0){ 
    $rettxt .= " AND "; 
    if($decnum < 20){ 
        $rettxt .= $decones[$decnum]; 
    }
    elseif($decnum < 100){ 
        $rettxt .= $tens[substr($decnum,0,1)]; 
        $rettxt .= " ".$ones[substr($decnum,1,1)]; 
    }
    $rettxt = $rettxt." CENTS"; 
} 
return $rettxt;} 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo numtowords($_POST["numbertoword"]);
    
  }
?>
<html>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

Name: <input type="text" name="numbertoword"><br>
<input type="submit">
</form>

</body>
</html>
