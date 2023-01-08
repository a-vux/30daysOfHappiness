<?php
    @include './inc/config.php';
    if (isset($_POST['submit'])){
       $username = mysqli_real_escape_string($conn, $_POST['username']);
    // mysqli_real_escape_string(connection. escapestring) dùng để escape special chars trong chuỗi dùng trong SQL query
    // cần 2 tham số:
    // + connection: dùng để kết nối với DB của MySQL
    // + escapestring: chuỗi cần escape
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = md5($_POST['password']); // md5(var): dùng để trả về dạng mã hóa hash MD5
        $cpass = md5($_POST['cpassword']);
        $type = $_POST['type'];

        $select = "SELECT * FROM user_form WHERE username = '$username' OR email = '$email'";
        $result = mysqli_query($conn, $select); 
        // mysqli_query(connection, query, resultmode): thực hiện cái truy vấn đó trên DB 
        // cần 2 tham số, tham số cuối optional:
        // + connection: kết nối với DB của MySQL
        // + query: truy vấn cần thực hiện trên MySQL
        // Return value: với những successful queries thì trả về True, còn SELECT/SHOW/DESCRIBE/EXPLAIN thì trả về mysqli_result object
        if(mysqli_num_rows($result) > 0){
        // mysqli_num_rows() trả về số hàng, ở đây nếu tồn tại ít nhất 1 hàng thì chứng tỏ email đã được đăng ký
            $select = "SELECT * FROM user_form WHERE username = '$username'";
            $result = mysqli_query($conn, $select);
            if(mysqli_num_rows($result) > 0){
                $error[] = 'This username has already been used!';
            }
            else{
                $error[] = 'This email has already been registered!';
            }
        }else{
            if ($pass != $cpass){
                $error[] = "Password doesn't match!";
            }else{
                $insert = "INSERT INTO user_form(username, email, password, type) VALUES ('$username', '$email', '$pass', '$type')";
                mysqli_query($conn, $insert);
                $success[] = "Successfully registered!";
            }
        }
     } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link 
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
      rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
      crossorigin="anonymous">
    <title>Register form</title>
</head>
<body>
    <section class="p-5">
        <div class="container">
            <div>
                <div class="d-flex col-md justify-content-center">
                    <div class="card bg-light text-dark" style="width: 50rem;">
                        <div class="card-body text-center">
                            <form class="text-start" method='POST'>
                                <h3 class="text-center">Register form</h3>
                                <?php
                                    if (isset($error)){
                                        foreach($error as $error){
                                            echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
                                        }
                                    }
                                    if (isset($success)){
                                        foreach($success as $success){
                                            echo '<div class="alert alert-success" role="alert">'.$success.'</div>';
                                        }
                                    }
                                ?>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Enter username:</label>
                                    <input type="text" name='username' required class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Enter email:</label>
                                    <input type="email" name='email' required class="form-control" id="email" aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Enter password</label>
                                    <input type="password" name='password' required class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Re-enter password</label>
                                    <input type="password" name='cpassword' required class="form-control">
                                </div>
                                    <label for="utype" class="form-label">Select user type:</label>
                                    <select class="form-select" name='type'>
                                        <option value="user">User</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                <div class="d-flex justify-content-between align-items-center" style="margin-top: 1rem;">
                                    <p style="margin-bottom: 0rem;">Already have an account? <a href="login.php">Sign in now</a></p>
                                    <button type="submit" name='submit' class="btn btn-primary">Sign up</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>