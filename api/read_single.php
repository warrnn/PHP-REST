<?php

// headers
header('Access-Control-Allow-Origin: *');
header('content-type: application/json');

// initializing api
include_once('../core/initialize.php');

// instantiate post
$post = new Post($db);

$post->id = isset($_GET['id']) ? $_GET['id'] : die();
$post->read_single();

$post_arr = array(
    'id' => $post->id,
    'title' => $post->title,
    'body' => html_entity_decode($post->body),
    'author' => $post->author,
    'category_id' => $post->category_id,
    'category_name' => $post->category_name
);

// make a JSON 
print_r(json_encode($post_arr));