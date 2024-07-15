<?php
    require_once "header.php";
?>
<body>
    <div class="wraper">
        <section class="form signup">
            <header>Sohbete başla!</header>
            <form action="#" enctype="multipart/form-data">
                <div class="error-txt"></div>
                <div class="name-details">
                    <div class="field input">
                        <label>Ad</label>
                        <input type="text" name="fname" placeholder="First Name" required>
                    </div>

                    <div class="field input">
                        <label>Soyad</label>
                        <input type="text" name="lname" placeholder="Last Name" required>
                    </div>

                    <div class="field input">
                        <label>Email Adresi</label>
                        <input type="email" name="email" placeholder="Enter your email" required>
                    </div>

                    <div class="field input">
                        <label>Şifre</label>
                        <input type="password" name="password" placeholder="Enter new password" required>
                    </div>

                    <div class="field image">
                        <label>Profil Seç</label>
                        <input type="file" name="image" required>
                    </div>

                    <div class="field button">
                        <input type="submit" value="Kayıt ol">
                    </div>
                </div>
            </form>
            <div class="link">Zaten kaydım var. <a href="login.php">Giriş yap</a></div>
        </section>
    </div>

    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/signup.js"></script>

</body>
</html>