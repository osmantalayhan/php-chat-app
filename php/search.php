<?php
    session_start();
    include_once "config.php";
    
    $outgoing_id = $_SESSION['unique_id'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
    $output = "";

    // Arama sorgusu
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE (fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%') AND unique_id != {$outgoing_id}");
    
    if (mysqli_num_rows($sql) > 0) {
        while ($row = mysqli_fetch_assoc($sql)) {
            $output .= '<a href="chat.php?user_id='.$row['unique_id'].'">
                        <div class="content">
                        <img src="php/images/'. $row['img'] .'" alt="">
                        <div class="details">
                            <span>'. $row['fname'] . " " . $row['lname'] .'</span>
                        </div>
                        </div>
                        <div class="status-dot"><i class="fas fa-circle"></i></div>
                        </a>';
        }
    } else {
        $output .= "Böyle bir kullanıcı bulunamadı!";
    }

    echo $output;
?>
