<?php
session_start();
//بفحص اذا اليوزر مسجل دخول ما في داعي يرد يسجل دخول كمان مرة فرح يدخله مباشرة على صفحة الاندكس
//$_SESSION['auth']:يعني مسجل دخول
if(isset($_SESSION['auth'])){// مسجل دخول 
    header("Location: index.php");//ف رح يدخلة على صفحة الاندكس
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container w-50 mt-5">

    <?php
    // لازم بالاول نتاكد اذا في ايرور او لا قبل ما نطبع الايريور
    if(isset($_SESSION['errors'])){
        foreach($_SESSION['errors'] as $err){?>
    <div class="alert alert-danger"><?= $err;?></div>   
       <?php }
    }
 
    unset($_SESSION['errors']);//عشان لما اعمل تحديث للصفحة يروح الايرور
    ?>


        <h2 class="text-center text-primary text-capitalize">login form</h2>
        <form class="row g-3 mt-3" method="POST" action="handlers/login.php" >
            <!--action="handlers/login.php": handlers/login.php يعني لما اعمل سبمت تروح كل البيانات الي بالفورم على صفحة -->
            <div class="col-md-12">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-12">
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="password" name="pass" class="form-control" id="inputPassword4">
            </div>
            <div class="col-12">
                <button type="submit" name="login" class="btn btn-primary">Sign in</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <script src="main.js"></script>
</body>

</html>