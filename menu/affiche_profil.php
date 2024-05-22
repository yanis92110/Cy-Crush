<?php
$profiles = [];
if (($handle = fopen("../data/data2.csv", "r")) !== FALSE) {
    //Verif que ca s'ouvre bien
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $profiles[] = $data;
    }
    fclose($handle);
}
$derniers_profils = array_slice($profiles, -10);
$json_profiles = json_encode($last_ten_profiles);
