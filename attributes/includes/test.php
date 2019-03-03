<!DOCTYPE html>
<html lang="en">
<body>

<?php



    function RekenUrenUit($time1, $time2){
            
        if($time1 == "uren"){
            return "werkt";
            } else {
            $s = substr("$time1", -2);   
            $m = substr("$time1", 3, 2);   
            $h = substr("$time1", 0, 2);   
            
            $t2l = strlen($time2);

            if ($t2l > 8){
                $s2 = substr("$time2", -2);   
                $m2 = substr("$time2", 6, 2);   
                $h2 = substr("$time2", 3, 2);   
                $d2 = substr("$time2", 0, 2);  
            //    echo(" niews: [$s2]"); 
            //    echo(" niewm: [$m2]");   
            //    echo(" niewh: [$h2]");   
            //    echo(" niewd: [$d2]");  
            } else {
                $s2 = substr("$time2", -2);   
                $m2 = substr("$time2", 3, 2);   
                $h2 = substr("$time2", 0, 2);   
            } 

            $d = 0;
            $h4 = 0;
        
            $s3 = 0;
            $s3 = $s + $s2;
            if ($s3 > 60) {
                $s3 = $s3 - 60;
                $m = $m + 1;
            }
        
            $m3 = 0;
            $m3 = $m + $m2;
            if ( $m3 > 60) {
                $m3 = $m3 - 60;
                $h = $h + 1;
            }
            
            $h3 = 0;
            $h3 = $h + $h2;
            if ( $h3 > 24) {
                $h3 = $h3 - 24;
                $d = $d + 1;
            }

            $s3 = spacetime($s3);
            $m3 = spacetime($m3);
            $h3 = spacetime($h3);
            $d = spacetime($d);

            return ("$d:$h3:$m3:$s3");
        } 
    } 

    function spacetime($i){
        if( $i < 9){
            $i = "0$i";
        }
        return $i;
    }

    // testcode
    $totaal = RekenUrenUit("02:01:02", "02:01:01");
    echo ( "old[$totaal]");
    $totaal2 = RekenUrenUit("12:02:02", "$totaal");
    echo ( "new[$totaal2]");
?>


</body>
</html>