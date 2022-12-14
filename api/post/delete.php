<?php 

//Headers 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Post.php';

//Instantiate DB & connect
$database = new Database();
$db = $database->connect();


// Instantiate Blog Post Object
$post = new Post($db);


//Get post data
$data = json_decode(file_get_contents("php://input"));

//Set ID to update
$post->id = $data->id;


//Delete post
if($post->update()){
    echo json_encode(
        array('message' => 'Deleted')
    );
}else{
    echo json_encode(
        array('message' => 'Not deleted')
    );
}

?>