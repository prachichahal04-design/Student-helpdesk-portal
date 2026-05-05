<?php

$data = json_decode(file_get_contents("tickets.json"), true);

if(!$data){
    $data = [];
}

$newTicket = [
    "id" => rand(1005,9999),
    "name" => $_POST['name'],
    "category" => $_POST['category'],
    "issue" => $_POST['issue'],
    "status" => "Pending",
    "time" => date("d-m-Y H:i")
];

$data[] = $newTicket;

file_put_contents("tickets.json", json_encode($data, JSON_PRETTY_PRINT));

echo "success";
?>
