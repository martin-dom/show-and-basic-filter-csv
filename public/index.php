<?php
$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

# define constants like a way between directoryes
define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'csv_files' . DIRECTORY_SEPARATOR);

# code
require APP_PATH . 'app.php';

$files = findFiles(FILES_PATH);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['tryFind'])) $data = getData($files, $_POST['tryFind']); # filter
    elseif(isset($_POST['add_first_name'])){ # add
        addPerson([$_POST['add_first_name'], $_POST['add_second_name'], $_POST['add_email']],$files);
        $data = getData($files);
    }elseif(isset($_POST['del_first_name'])){ # delete
        deletePerson($files,$_POST['del_first_name'],$_POST['del_second_name']);
    }
}

# get data from csv
$data = getData($files);
require VIEWS_PATH . 'view.php';
?>