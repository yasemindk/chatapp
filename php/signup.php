<?php
session_start();
 include_once "config.php";
 $fname = mysqli_real_escape_string($conn, $_POST['fname']);
 $lname = mysqli_real_escape_string($conn, $_POST['lname']);
 $email = mysqli_real_escape_string($conn, $_POST['email']);
 $password = mysqli_real_escape_string($conn, $_POST['password']);

 if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
   //email geçerlimi?
   if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
     // email zaten varmu?
     $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
     if (mysqli_num_rows($sql) > 0){//email zaten varsa
       echo "$email - bu email zaten kullanılmış";
       // code...
     }else {
       if (isset($_FILES['image'])) {//dosya yüklendimi?
         $img_name = $_FILES['image']['name'];//kullanıcının yüklediği belgenin ismini çeker
         $img_type = $_FILES['image']['type'];//belge türü
         $tmp_name = $_FILES['image']['tmp_name'];//belgeyi bizim dosyamıza yüklerken belgenin aldığı geçici isim

         $img_explode = explode('.', $img_name);
         $img_ext = end($img_explode);//extension(jpg png jpeg)

         $extensions = ['png','jpeg','jpg'];
         if (in_array($img_ext, $extensions) === true) {
           $time=time();//yüklenen dosyalar yükleme zamanına göre isimlendirilir sistemde
           $new_img_name = $time.$img_name;
           if(move_uploaded_file($tmp_name, "images/".$new_img_name)){
             $status = "Aktif";
             $random_id = rand(time(), 10000000);//random id oluşturma kullanıcı içinc
             $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status)
                                   VALUES ({$random_id}, '{$fname}', '{$lname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");
             if ($sql2){
               $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");

                if(mysqli_num_rows($sql3) > 0) {
                  $row = mysqli_fetch_assoc($sql3);//mysqli_query ile dönen sonuç kümesini işleyip her satırı diziye aktarır(tabloya)
                  $_SESSION['unique_id'] = $row['unique_id'];//1.25
                  echo "başarılı";
                }

             }else {
               echo "birşeyler ters gitti";
             }
           }

         }else {
           echo "lütfen bir resim dosyası seçiniz..";
         }



       }else {
         echo "Lütfen bir dosya seçiniz";
       }
     }
   }else {
     echo "$email - geçerli bi mail adresi değil";
   }
 }else {
   echo "Lütfen bütün boşlukları doldurunuz..";
 }
 ?>
