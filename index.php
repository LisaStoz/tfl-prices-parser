<?php

    function adult_underground($row, $payType, $conditionalDiscount) {
        $wheres = array(
            'price_group'=>1,
            'transport_mean'=>1
        );
        $wheres['zone1'] = $row[0];
        $wheres['zone2'] = $row[1];
        $wheres['euston'] = $row[2];
        $wheres['watford_junction'] = $row[3];  
        
        $wheres['pay_type'] = $payType;
        $wheres['conditional_discount'] = $conditionalDiscount;
        return $wheres;
    }
   
    function update_price($wheres, $value) {
        print_r($wheres);
        echo $value.'<br>';
    }

    /* ---------------------------------------------- */

	require('../spreadsheet-reader-master/php-excel-reader/excel_reader2.php');

    require('../spreadsheet-reader-master/SpreadsheetReader.php');

    $Reader = new SpreadsheetReader('../resources/tube.xls');
    $Sheets = $Reader -> Sheets();
   
       
    /* adult - tube, dlr, overground */
    $Reader -> ChangeSheet(0);   
    
    $counter = 0;
    foreach ($Reader as $row) {
        $counter++;
        if ($counter > 1) {            
            $wheres = adult_underground($row, 2, 0);
            update_price($wheres, $row[4]);
            $wheres = adult_underground($row, 2, 1);
            update_price($wheres, $row[5]);
            $wheres = adult_underground($row, 2, 2);
            update_price($wheres, $row[6]);
            $wheres = adult_underground($row, 2, 3);
            update_price($wheres, $row[7]);
            $wheres = adult_underground($row, 4, 0);
            update_price($wheres, $row[8]);
            $wheres = adult_underground($row, 4, 4);
            update_price($wheres, $row[9]);
            $wheres = adult_underground($row, 6, 0);
            update_price($wheres, $row[10]);
            $wheres = adult_underground($row, 7, 0);
            update_price($wheres, $row[11]);
            $wheres = adult_underground($row, 8, 0);
            update_price($wheres, $row[12]);
        }           
    }
    
    /*
    foreach ($Sheets as $Index => $Name)
    {
        echo 'Sheet #'.$Index.': '.$Name;

        
        
        foreach ($Reader as $Row)
        {
            print_r($Row);
        }
    }
     
     */
?>