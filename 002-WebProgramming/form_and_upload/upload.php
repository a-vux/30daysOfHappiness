<!-- Check file đã tồn tại -->
<?php
    session_start();
    @include '../inc/config.php';
    @include './check_user.php';
    @include '../logout.php';
    if (isset($_POST['submit'])){
        $allowed_ext = "pdf";
        if (!empty($_FILES['upload']['name'])){
            $name = $_FILES['upload']['name'];
            $size = $_FILES['upload']['size'];
            $type = $_FILES['upload']['type'];
            $file_tmp = $_FILES['upload']['tmp_name'];
            $targer_dir = "../uploads/" . $_SESSION['username'] . "/";
            $file_ext = explode('.', $name);
            $file_ext = strtolower(end($file_ext));

            // Validate file ext
            if ($file_ext === $allowed_ext){
                // Validate the size
                if ($size <= 5000000){ // <= 5MB
                    if (!file_exists($targer_dir))
                        mkdir($targer_dir, 0777, true);
                    $targer_dir = $targer_dir . "${name}";
                    move_uploaded_file($file_tmp, $targer_dir);
                    $uploader = $_SESSION['username'];
                    $search = "SELECT * FROM upload WHERE uploader='$uploader' AND name='$name'";
                    $result = mysqli_query($conn, $search);
                    if (mysqli_num_rows($result) == 0){
                        $query = "INSERT INTO upload(uploader, name, size) VALUES ('$uploader', '$name', '$size')";
                        mysqli_query($conn, $query);
                    }
                    $successes[] = "File uploaded!";
                }else{
                    $errors[] = "File is toooo big!";
                }
            }else{
                $errors[] = "Invalid file type!";
            }
        }else{
            $errors[] = "No files chosen!";
        }
    }
?>

<?php @include '../inc/user/header.php'; ?>
<section class="p-5">
        <div class="container">
            <div>
                <div class="d-flex col-md justify-content-center">
                    <div class="card bg-light text-dark" style="width: 50rem;">
                        <div class="card-body text-center">
                            <form class="text-start" method="POST" enctype="multipart/form-data">
                                <h3 class="text-center">File Upload</h3>
                                <?php
                                    if (isset($errors)){
                                        foreach($errors as $error){
                                            echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
                                        }
                                    }
                                    if (isset($successes)){
                                        foreach($successes as $success){
                                            echo '<div class="alert alert-success" role="alert">'.$success.'</div>';
                                        }
                                    }
                                ?>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Choose a PDF file to upload:</label>
                                    <input class="form-control" type="file" name="upload">
                                </div>
                                <div class="d-flex flex-row-reverse" style="margin-top: 1rem;">
                                    <button type="submit" name='submit' class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php @include '../inc/footer.php'; ?>