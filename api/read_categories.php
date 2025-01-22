<?php

// headers
header('Access-Control-Allow-Origin: *');
header('content-type: application/json');

// initializing api
include_once('../core/initialize.php');

// instantiate category
$category = new Category($db);

// blog category query
$result = $category->read();

// get the row count
$num = $result->rowCount();

if ($num > 0) {
    $category_arr = array();
    $category_arr['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $category_item = array(
            'id' => $id,
            'name' => $name,
            'created_at' => $created_at,
        );
        array_push($category_arr['data'], $category_item);
    }
    // convert to JSON and output
    echo json_encode($category_arr);
} else {
    echo json_encode(array('message' => 'No categorys found.'));
}