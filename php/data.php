<?php
session_start();
include_once "config.php";
$outgoing_id = $_SESSION['unique_id']; // Oturumdan gelen kullanıcı ID'sini alın

$sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id}");
$output = "";

if (mysqli_num_rows($sql) > 0) {
    while($row = mysqli_fetch_assoc($sql)){
        $user_id = $row['unique_id'];

        // Son mesajı getir
        $sql2 = "SELECT * FROM messages WHERE 
                (incoming_msg_id = {$user_id} OR outgoing_msg_id = {$user_id}) 
                AND (outgoing_msg_id = {$outgoing_id} OR incoming_msg_id = {$outgoing_id}) 
                ORDER BY msg_id DESC LIMIT 1";

        $query2 = mysqli_query($conn, $sql2);
        
        if (!$query2) {
            die('Sorgu başarısız: ' . mysqli_error($conn));
        }
        
        $row2 = mysqli_fetch_assoc($query2);
        
        if ($row2) {
            $last_msg = $row2['msg'];
            $you = ($outgoing_id == $row2['outgoing_msg_id']) ? "you: " : "";
        } else {
            $last_msg = "mesaj yok.";
            $you = "";
        }

        // Kullanıcı listesi için çıktı oluştur
        $output .= '<a href="chat.php?user_id='.$row['unique_id'].'">
                    <div class="content">
                        <img src="php/images/'. $row['img'] .'" alt="">
                        <div class="details">
                            <span>'. $row['fname'] . " " . $row['lname'] .'</span>
                            <p>'. $you . $last_msg .'</p>
                        </div>
                    </div>
                    <div class="status-dot"><i class="fas fa-circle"></i></div>
                    </a>';
    }
} else {
    $output .= "Sohbet edebilecek kullanıcı yok.";
}

echo $output;
?>
