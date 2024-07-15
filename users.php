<?php
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header("location:login.php");
    }
    require_once "header.php";
?>
<body>
    <div class="wraper">
        <section class="users">
           <header>
            <?php
                include_once "php/config.php";
                $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
                if(mysqli_num_rows($sql) > 0){
                    $row = mysqli_fetch_assoc($sql);
                }
            ?>
            <div class="content">
                <img src="php/images/<?php echo $row['img'] ?>" alt="">
                <div class="details">
                    <span><?php echo $row['fname'] . " " . $row['lname']; ?></span>
                    <p><?php echo $row['status']; ?></p>
                </div>
            </div>
            <a href="#" class="logout">Çıkış</a>
           </header>
           <div class="search">
            <span class="text" style="font-size: 16px; margin-top: 8px;">Sohbet başlatmak için bir kullanıcı seçin</span>
            <input type="text" placeholder="Enter name to search">
            <button>ara</button>
           </div>
           <div class="users-list">
                
           </div>
        </section>
    </div>

    <script src="javascript/user.js"></script>
</body>
</html>