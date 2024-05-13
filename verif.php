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

function get_data1($k){
    $chemin = '../data/data1.csv';
    $data1 = fopen($chemin,"r");
    $num_ligne = 1;
    $data = array();

    while(($ligne = fgetcsv($data1)) !== FALSE){
        if($num_ligne === $k){
            $data = $ligne;
            break;
        }
        $num_ligne++;
    }
    fclose($data1);
    return $data;
}

function get_data2($k){
    $chemin = '../data/data2.csv';
    $data2 = fopen($chemin,"r");
    $num_ligne = 1;
    $data = array();

    while(($ligne = fgetcsv($data2)) !== FALSE){
        if($num_ligne === $k){
            $data = $ligne;
            break;
        }
        $num_ligne++;
    }
    fclose($data2);
    return $data;
}



function mettreAJourDonneesUtilisateur($fichier, $pseudo, $new_data) {
    $lignes = file($fichier);
    
    foreach ($lignes as $index => $ligne) {
        $champs = explode(',', trim($ligne));

        if ($champs[0] === $pseudo) {
            $lignes[$index] = implode(',', $new_data) . "\n";
            break;
        }
    }
    
    file_put_contents($fichier, implode('', $lignes));
}

?>

