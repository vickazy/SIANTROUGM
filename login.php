<!-- function for login system -->
<?php 
        if (isset($_POST['login'])) {
            $username   = $_POST['username'];
            $password   = md5($_POST['password']);
            $no = 0;
            $sqllogin = " SELECT * FROM tbl_member where member_useremail = '".$username."' and member_password= '".$password."' ";

            $hasil = mysql_query($sqllogin);
            while ($login=mysql_fetch_array($hasil)) {
                $member_id       = $login['member_id'];
                $password        = $login['member_password'];
                $namalengkap     = $login['member_name']; 
                $email     = $login['member_useremail']; 
                $phone     = $login['member_phonenumber']; 
                $no++;
            }
            if ($no>0) {
                $_SESSION['member_id'] = $member_id;
                $_SESSION['member_name']= $namalengkap;
                $_SESSION['member_password'] = $password;
                $_SESSION['member_useremail'] = $email;
                $_SESSION['member_phonenumber'] = $phone;
                $AkuratLogin = mysql_query("UPDATE tbl_member set member_login='Y' where member_id='".$_SESSION['member_id']."'");
                
                echo "<script> alert('Login sukses'); location.href='index.php?hal=control-panel';</script>  ";exit;
            }else{
                echo "<script> alert('Login Gagal Ulangi'); location.href='index.php';  </script>";exit;
            }
        }
 ?>
    <div id="signin" class="signin content-section bg-grey">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <h2 class="text-big text-center marg-40-btm">Sign In <span class="pe-7s-user"></span></h2>
            <form class="contact-form" method="POST">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control form-bordered" placeholder="Masukkan username/email" id="username" name="username">
              </div>
              <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control form-bordered" placeholder="Masukkan password" id="password" name="password">
              </div>
              <button type="submit" name="login" class="button btn-square">Masuk</button>
              <br><br><p class="text-center"><small>Belum punya akun ? <a href="index.php?hal=register">Daftar Sekarang !</a></small></p>
            </form>
          </div>
        </div><!-- .row -->
      </div><!-- .container -->
    </div><!-- #signin -->