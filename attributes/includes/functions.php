<?php
    function RekenUrenUit($time1, $time2){
        
        if($time1 == "uren"){
            $h2 = 0;
            $d2 = 0;
            $t2l = strlen($time2);
            if ($t2l > 8){  
                $h2 = substr("$time2", 3, 2);    
                $d2 = substr("$time2", 0, 2);  
                if ($d2 >= 0){
                    while( $d2 > 0){
                        $h2 = $h2 + 24;
                        $d2 = $d2 - 1;
                    }

                    return $h2;
                }
            } else { 
                $h2 = substr("$time2", 0, 2);

                return $h2;   
            } 
            
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
            } else {
                $s2 = substr("$time2", -2);   
                $m2 = substr("$time2", 3, 2);   
                $h2 = substr("$time2", 0, 2);   
                $d2 = 0;
            } 

            $h4 = 0;
        
            $s3 = 0;
            $s3 = $s + $s2;
            while($s3 > 60) {
                $s3 = $s3 - 60;
                $m = $m + 1;
            }
        
            $m3 = 0;
            $m3 = $m + $m2;
            while( $m3 > 60) {
                $m3 = $m3 - 60;
                $h = $h + 1;
            }
            
            $h3 = 0;
            $h3 = $h + $h2;
            while( $h3 > 24) {
                $h3 = $h3 - 24;
                $d2 = $d2 + 1;
            }

            $s3 = spacetime($s3);
            $m3 = spacetime($m3);
            $h3 = spacetime($h3);
            $d2 = spacetime($d2);


            return ("$d2:$h3:$m3:$s3");
        } 
    } 

    function spacetime($i){
        $il = strlen($i);
        if( $il < 2){
            $i = "0$i";
        }
        return $i;
    }
