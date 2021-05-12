<?php 

function csvToJson($fname) {

    // Read data from Movies.csv
    $f = file_get_contents('Movies.csv');

    $array = array_map("str_getcsv", explode("\n", $f));


    // open csv file
    if (!($fp = fopen($fname, 'r'))) {
        die("Can't open file...");
    }

    //read csv headers
    $key = fgetcsv($fp, ",");


    // parse csv rows into array
    $json = array();
    while ($row = fgetcsv($fp, "1024", ",")) {
        $json[] = array_combine($key, $row);
    }

    // release file handle
    fclose($fp);

    // encode array to json
    return json_encode($json);


}


print_r(csvToJson("Movies.csv"));




