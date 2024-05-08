<?php
function list_data($chemin, $k){
    if(is_int($k) && ($k <= 9)){
        $list = array();

        if(($file = fopen("$chemin", "r")) !== FALSE){
            while(($data = fgetcsv($file, 1000, ",")) !== FALSE){
                $list[] = $data[$k];
            }
        fclose($file);
        }
        return $list;
    }
}

/*foreach ($lists as $list)
    echo $list , "<br>";
*/
?>