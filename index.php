<?php

    function readSheet($Reader, $sheetNr, $functionName) {
        $Reader -> ChangeSheet($sheetNr);       
        $counter = 0;
        foreach ($Reader as $row) {
            $counter++;
            if ($counter > 1) {            
                $wheres = $functionName($row, 2, 0);
                update_price($wheres, $row[4]);
                $wheres = $functionName($row, 2, 1);
                update_price($wheres, $row[5]);
                $wheres = $functionName($row, 2, 2);
                update_price($wheres, $row[6]);
                $wheres = $functionName($row, 2, 3);
                update_price($wheres, $row[7]);
                $wheres = $functionName($row, 4, 0);
                update_price($wheres, $row[8]);
                $wheres = $functionName($row, 4, 4);
                update_price($wheres, $row[9]);
                $wheres = $functionName($row, 6, 0);
                update_price($wheres, $row[10]);
                $wheres = $functionName($row, 7, 0);
                update_price($wheres, $row[11]);
                $wheres = $functionName($row, 8, 0);
                update_price($wheres, $row[12]);
            }           
        }
    }
    
    function update_price($wheres, $value) {
        print_r($wheres);
        echo $value.'<br>';
    }
    
       

    function underground($row, $price_group) {                        
        $wheres = array(
            'price_group'=>$price_group,
            'transport_mean'=>1
        );
        $wheres['zone1'] = $row[0];
        $wheres['zone2'] = $row[1];
        $wheres['euston'] = $row[2];
        $wheres['watford_junction'] = $row[3];  
        return $wheres;
    }
    
    function rail($row, $price_group) {                        
        $wheres = array(
            'price_group'=>$price_group,
            'transport_mean'=>0
        );
        $wheres['zone1'] = $row[0];
        $wheres['zone2'] = $row[1];
        $wheres['euston'] = $row[2];
        $wheres['watford_junction'] = $row[3];  
        return $wheres;
    }
    
    function railthrough($row, $price_group) {                        
        $wheres = array(
            'price_group'=>$price_group,
            'transport_mean'=>20
        );
        $wheres['zone1'] = $row[0];
        $wheres['zone2'] = $row[1];
        $wheres['euston'] = $row[2];
        $wheres['watford_junction'] = $row[3];  
        return $wheres;
    }

    /* underground */
    function underground_adult($row, $payType, $conditionalDiscount) {       
        $wheres = underground($row, 0);
        $wheres['pay_type'] = $payType;
        $wheres['conditional_discount'] = $conditionalDiscount;
        return $wheres;
    }
    
    function underground_18($row, $payType, $conditionalDiscount) {
        $wheres = underground($row, 1);
        $wheres['pay_type'] = $payType;
        $wheres['conditional_discount'] = $conditionalDiscount;
        return $wheres;
    }
    
    function underground_16($row, $payType, $conditionalDiscount) {
        $wheres = underground($row, 2);
        $wheres['pay_type'] = $payType;
        $wheres['conditional_discount'] = $conditionalDiscount;
        return $wheres;
    }
    
    function underground_11($row, $payType, $conditionalDiscount) {
        $wheres = underground($row, 3);
        $wheres['pay_type'] = $payType;
        $wheres['conditional_discount'] = $conditionalDiscount;
        return $wheres;
    }
    
    function underground_jobcentre($row, $payType, $conditionalDiscount) {
        $wheres = underground($row, 5);
        $wheres['pay_type'] = $payType;
        $wheres['conditional_discount'] = $conditionalDiscount;
        return $wheres;
    }
    
    function underground_railcard($row, $payType, $conditionalDiscount) {
        $wheres = underground($row, 8);
        $wheres['pay_type'] = $payType;
        $wheres['conditional_discount'] = $conditionalDiscount;
        return $wheres;
    }
       
    /* rail */
    
    function rail_adult($row, $payType, $conditionalDiscount) {       
        $wheres = rail($row, 0);
        $wheres['pay_type'] = $payType;
        $wheres['conditional_discount'] = $conditionalDiscount;
        return $wheres;
    }
    
    function rail_18($row, $payType, $conditionalDiscount) {
        $wheres = rail($row, 1);
        $wheres['pay_type'] = $payType;
        $wheres['conditional_discount'] = $conditionalDiscount;
        return $wheres;
    }
    
    function rail_16($row, $payType, $conditionalDiscount) {
        $wheres = rail($row, 2);
        $wheres['pay_type'] = $payType;
        $wheres['conditional_discount'] = $conditionalDiscount;
        return $wheres;
    }
    
    function rail_11($row, $payType, $conditionalDiscount) {
        $wheres = rail($row, 3);
        $wheres['pay_type'] = $payType;
        $wheres['conditional_discount'] = $conditionalDiscount;
        return $wheres;
    }
    
    function rail_5($row, $payType, $conditionalDiscount) {
        $wheres = rail($row, 4);
        $wheres['pay_type'] = $payType;
        $wheres['conditional_discount'] = $conditionalDiscount;
        return $wheres;
    }
    
    function rail_jobcentre($row, $payType, $conditionalDiscount) {
        $wheres = rail($row, 5);
        $wheres['pay_type'] = $payType;
        $wheres['conditional_discount'] = $conditionalDiscount;
        return $wheres;
    }
    
    function rail_railcard($row, $payType, $conditionalDiscount) {
        $wheres = rail($row, 8);
        $wheres['pay_type'] = $payType;
        $wheres['conditional_discount'] = $conditionalDiscount;
        return $wheres;
    }
    
    /* rail through */
    
    function railthrough_adult($row, $payType, $conditionalDiscount) {       
        $wheres = railthrough($row, 0);
        $wheres['pay_type'] = $payType;
        $wheres['conditional_discount'] = $conditionalDiscount;
        return $wheres;
    }
    
    function railthrough_18($row, $payType, $conditionalDiscount) {
        $wheres = railthrough($row, 1);
        $wheres['pay_type'] = $payType;
        $wheres['conditional_discount'] = $conditionalDiscount;
        return $wheres;
    }
    
    function railthrough_16($row, $payType, $conditionalDiscount) {
        $wheres = railthrough($row, 2);
        $wheres['pay_type'] = $payType;
        $wheres['conditional_discount'] = $conditionalDiscount;
        return $wheres;
    }
    
    function railthrough_11($row, $payType, $conditionalDiscount) {
        $wheres = railthrough($row, 3);
        $wheres['pay_type'] = $payType;
        $wheres['conditional_discount'] = $conditionalDiscount;
        return $wheres;
    }
    
    function railthrough_5($row, $payType, $conditionalDiscount) {
        $wheres = railthrough($row, 4);
        $wheres['pay_type'] = $payType;
        $wheres['conditional_discount'] = $conditionalDiscount;
        return $wheres;
    }
    
    function railthrough_jobcentre($row, $payType, $conditionalDiscount) {
        $wheres = railthrough($row, 5);
        $wheres['pay_type'] = $payType;
        $wheres['conditional_discount'] = $conditionalDiscount;
        return $wheres;
    }
    
    function railthrough_railcard($row, $payType, $conditionalDiscount) {
        $wheres = railthrough($row, 8);
        $wheres['pay_type'] = $payType;
        $wheres['conditional_discount'] = $conditionalDiscount;
        return $wheres;
    }

    /* ---------------------------------------------- */

	require('../spreadsheet-reader-master/php-excel-reader/excel_reader2.php');
    require('../spreadsheet-reader-master/SpreadsheetReader.php');

    $Reader = new SpreadsheetReader('../resources/tube.xls');
    $Sheets = $Reader -> Sheets();
         
    
    readSheet($Reader, 0, 'underground_adult');
    readSheet($Reader, 1, 'underground_18');
    readSheet($Reader, 2, 'underground_16');
    readSheet($Reader, 3, 'underground_11');
    readSheet($Reader, 4, 'underground_jobcentre');
    readSheet($Reader, 5, 'underground_adult');
    readSheet($Reader, 6, 'underground_railcard');
    
    
    
    $Reader = new SpreadsheetReader('../resources/rail_only.xls');
    $Sheets = $Reader -> Sheets();
         
    readSheet($Reader, 0, 'rail_adult');
    readSheet($Reader, 1, 'rail_18');
    readSheet($Reader, 2, 'rail_16');
    readSheet($Reader, 3, 'rail_11');
    readSheet($Reader, 3, 'rail_5');
    readSheet($Reader, 4, 'rail_jobcentre');
    readSheet($Reader, 5, 'rail_adult');
    readSheet($Reader, 6, 'rail_railcard');
   
    $Reader = new SpreadsheetReader('../resources/rail_through.xls');
    $Sheets = $Reader -> Sheets();
         
    readSheet($Reader, 0, 'railthrough_adult');
    readSheet($Reader, 1, 'railthrough_18');
    readSheet($Reader, 2, 'railthrough_16');
    readSheet($Reader, 3, 'railthrough_11');
    readSheet($Reader, 3, 'railthrough_5');
    readSheet($Reader, 4, 'railthrough_jobcentre');
    readSheet($Reader, 5, 'railthrough_adult');
    readSheet($Reader, 6, 'railthrough_railcard');
   
   
?>