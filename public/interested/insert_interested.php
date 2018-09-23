 <?php
  include('connection.php'); 
  
  if(isset($_POST['user_id']) || isset($_POST['item_id'])){
     $user_id = $_POST['user_id'];
    $item_id = $_POST['item_id'];
    mysqli_query($conn, "INSERT INTO interested(user_id, item_id) VALUES('$user_id','$item_id')");
    $response = array('user_id'=>$user_id, 'item_id'=>$item_id);

    header('Content-type: Application/json');
    echo json_encode( $response );  
  }
    
     
      ?> 