<?php
// Load and initialize post class
require_once 'Post.class.php';
$post = new Post();

if(!empty($_POST['id'])){
    
    // Get post data
    $conditions['where'] = array(
        'id' => $_POST['id']
    );
    $conditions['return_type'] = 'single';
    $postData = $post->getRows($conditions);
    
    // Post total likes
    $postLike = $postData['like_num'];
    
    // Calculates the numbers of like or dislike
    // Skaiciuoja 
    if($_POST['type'] == 1){
        $like_num = ($postLike + 1);
        $upData = array(
            'like_num' => $like_num
        );
        $return_count = $like_num;
    }
    
    // Atnaujina SIRDELIU skaiciu
    $condition = array('id' => $_POST['id']);
    $update = $post->update($upData, $condition);
    
    // Grazina SIRDELIU skaiciu, jeigu sekmingai atnaujina. Kitu atvejo ismeta klaida.
    echo $update?$return_count:'err';
}
?>