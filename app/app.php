<?php
declare(strict_types = 1);

# find csv files and store to $files
function findFiles($path)
{
    $files = [];
    # array with basic strings
    $inDir = scandir($path);
    
    foreach ($inDir as $file) {
        # string with full path
        $full = $path . $file;
        if(is_dir($full)) continue;
        $files[] = $full;
    }
    return $files;
}

# push all data from files to array $data
function getData($files, ?string $find = null):array 
{
    $data = [];
    foreach($files as $file){
        if (!file_exists($file))echo 'chyba';
        else{
            $file = fopen($file, 'r');
    
            # if user want find something
            if(is_null($find)){
                while(($line = fgetcsv($file)) !== false) $data[] = $line;
            }else{
                while(($line = fgetcsv($file)) !== false){
                    # return only finding lines
                    if(strpos(strtolower($line[1]),$find) !== false) $data[] = $line;
                }
            }
            $file = fclose($file);
        }
    }
    return $data;
}

# add new person to csv
function addPerson($line, $files){
    if(!file_exists($files[0]))echo 'chyba';
    else{
        $file = fopen($files[0], 'a');
        fputcsv($file,$line); # add new line to the bottom of csv
        fclose($file);
    }
}

# delete person from csv
function deletePerson($files, $first_name, $second_name){
    # separe everey file
    for($i = 0; $i < count($files); $i++){
        if (!file_exists($files[$i]))echo 'chyba';
        else{
            $data = getData([$files[$i]]);
            # try to find line which we want delete
            for($y = 0; $y < count($data); $y++){
                if($data[$y][0] === $first_name && $data[$y][1] === $second_name){
                    unset($data[$y]);
                    $data = array_values($data); # new indexes for array
                } 
            }
            # add data except delete line back to the csv
            $file = fopen($files[$i], 'w');
            foreach($data as $line) fputcsv($file, $line);
            fclose($file);
        }
    }
}


?>