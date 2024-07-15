<?php
session_start();
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        // let's check user mail is valid or not 
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){ // if email is valid
            // e-postanın veritabanında zaten var olup olmadığını kontrol edelim.
            $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0){//if email already exist
                echo "'" . $email . "' bu email zaten var!";
            }else{
                // kullanıcı yükleme dosyasını kontrol edelim
                if(isset($_FILES['image'])){// if file uploaded
                    $img_name = $_FILES['image']['name'];
                    $tmp_name = $_FILES['image']['tmp_name'];
                    // $img_type = $_FILES['image']['type']; 
                    $img_explode = explode('.', $img_name);
                    $img_ext = end($img_explode); // here we get the extenxion of an user uploaded img file

                    $extensions = ['png', "jpeg", "jpg"]; // these are some valid image ext and we've store them in array
                    if(in_array($img_ext, $extensions) === true){
                        $time = time();
                        $new_img_name = $time.$img_name;
                        
                        if(move_uploaded_file($tmp_name, "images/" . $new_img_name)){
                            $status = "şu an aktif";
                            $random_id = rand(time(), 10000000);
                            $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status)
                                                 VALUES ({$random_id}, '{$fname}','{$lname}','{$email}','{$password}','{$new_img_name}', '{$status}')");

                            if($sql2){
                                $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                if(mysqli_num_rows($sql3) > 0){
                                    $row = mysqli_fetch_assoc($sql3);
                                    $_SESSION['unique_id'] = $row['unique_id'];
                                    echo "başarılı";
                                }
                            }else{
                                echo "bir şeyler ters gitti!";
                            }
                        }

                    }else{
                        echo "Lütfen resim formatınız jpg, jpeg veya png seçiniz!";
                    }
                }else{
                    echo "Lütfen bir profil fotoğrafı seçiniz.";
                }
            }

        }else{
            echo "'" . $email . "' bu geçerli bir e-posta değil";
        }
    }else{
        echo "Tüm giriş alanları zorunludur!";
    }
?>