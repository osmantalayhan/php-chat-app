<?php
    include_once "header.php";
?>
<body>
    <div class="wraper">
        <section class="form login">
            <header>Sohbete Başla!</header>
            <form action="#">
                <div class="error-txt"></div>
                <div class="name-details">
                    
                    <div class="field input">
                        <label>Email Adresi</label>
                        <input type="email" placeholder="Enter your email" name="email">
                    </div>

                    <div class="field input">
                        <label>Şifre</label>
                        <input type="password" placeholder="Enter your password" name="password">
                    </div>

            
                    <div class="field button">
                        <input type="submit" value="Giriş yap">
                    </div>
                </div>
            </form>
            <div class="link">Kaydın yok mu? <a href="index.php">Kayıt ol</a></div>
        </section>
    </div>

    <script src="javascript/login.js"></script>
</body>
</html>