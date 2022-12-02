<?php

function setComments($conn) {
    if (isset($_POST['commentSubmit'])) {
        $uid = $_POST['uid'];
        $date = $_POST['date'];
        $message = $_POST['message'];
        $likes = $_POST['likes'];
        $sql = "INSERT INTO comments (uid, date, message, likes) VALUES ('$uid', '$date', '$message', '$likes')";
        $result = $conn->query($sql);
        header('Location: index.php' );
    }
}

function getComments($conn){
    $sql = "SELECT * FROM comments";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
        echo "<div class='comment-box'><p>";
             echo $row['uid']."<br>";
             echo $row['date']."<br>";
             echo $row['message']."<br>";
             echo "<div>  <form method='POST' action='".likeSubmit($conn,$row)."'>  <button type='submit' name='".$row['cid']."' class='likeSubmit'>Like</button>  Likes: ".$row["likes"]."  </form></div>";
             echo "<hr>";
             echo "<p></div>";
    }
}

function likeSubmit($conn,$row) {
    if(isset($_POST[$row['cid']])) {
        $cid = $row['cid'];
        $likes = $row['likes']+1;
        $query = "UPDATE comments SET likes = '$likes' WHERE cid = '$cid'";
        $result = mysqli_query($conn, $query);
    }
}

