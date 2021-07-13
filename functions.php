<?php
require_once 'db_connection.php';

function get_all_data(){
    global $conn;
    $result = mysqli_query($conn,"SELECT * FROM posts");
    if(mysqli_num_rows($result)>0){

        while($row = mysqli_fetch_assoc($result)){
            echo'
               <div class="col-md-4">
                  <div class="card mb-4 box-shadow">
                     <img class="card-img-top" src="https://via.placeholder.com/150*100 alt="Card image cap">
                     <div class="card-body">
                        <h4 class=""><a class="text-secondary" href="single.php?id='.$row['id'].'">'.$row['title'].'</a></h4>
                        <p class="card-text">'.htmlspecialchars_decode(substr($row[ 'content'],0,100)).'...</p>
                        <div class="btn-group">
                        <a href="single.php?id='.$row['id'].'" class="btn btn-sm btn-outline-secondary" role="button" aria-pressed="true">Edit</a>
                        <a href="update.php?id='.$row['id'].'" class="btn btn-sm btn-outline-secondary" role="button" aria-pressed="true">Edit</a>
                        </div>
                        <small class="text-muted>9 mins</small>
                        </div>
                    </div>
                  </div>
                </div>
                 ';
                
        }

    }

    else{
        echo"<h3>Our database is not working</h3>";
    } 


}

if(isset($_POST[title]) && isset($_POST['content'])){


   //check title and content empty or not
   if(!empty($_POST['title']) $$!empty($_POST['content'])){

           //Escape Special characters
       $title = mysqli_real_escape_string($conn, htmlspecialchars($_POST['title']));
       $content = mysqli_real_escape_string($conn, htmlspecialchars($_POST['content']));
       $check_content = mysqli_query($conn, "SELECT 'title' FROM posts WHERE content = '$title'");

    if(mysqli_num_rows($check_content) > 0){
        echo "<h3>This title already exist please try a different title name</h3>";
    }else{
          //insert data in to database
          $insert_query = mysqli_query($conn. "INSERT INTO posts (title,content) VALUES('$title','$content')");

          //now check if data has been inserted
    if($insert_query){
        echo "<script>alert('Data inserted');window.location.href = 'index.php';</script>";
        exit;
    }else{
         echo "<h3>Data was not inserted!</h3>";
         }
    }

   }else{
       echo "<h4>please fill all fields</h4>";
   }

}