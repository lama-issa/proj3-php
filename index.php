<?php
session_start();
//عشان احمي صفحة الاندكس ما حديدخل عليها الا الشخص الي مسجل دخول
//$_SESSION['auth']:يعني مسجل دخول
if(!isset($_SESSION['auth'])){//مش مسجل دخول فما رح يدخلة على صفحة الاندكس
    header("Location: login.php");//loginرح يدخله على صفحة 
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

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Hi <?=$_SESSION['auth']['name']?><!--عشان اطبع اسم المستخدم-->
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="handlers/logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container w-50 mt-5">

    
    <?php
   // لازم بالاول نتاكد اذا في ايرور او لا قبل ما نطبع الايريور
    if(isset($_SESSION['errors'])){
        foreach( $_SESSION['errors'] as $err){?>
     <div class="alert alert-danger"><?= $err;?></div>   
       <?php }
    }
    unset($_SESSION['errors']);
    ?>

 
<?php
   if(isset( $_SESSION['success'])){?>
    <div class="alert alert-success"><?= $_SESSION['success'];?></div>   
      <?php 
   }
     /* if(isset( $_SESSION['errors'])){
        echo "<pre>";
print_r($_SESSION['errors']);
echo "</pre>";
    }*/
   unset($_SESSION['success']);//عشان لما اعمل تحديث للصفحة يروح الايرور
   ?>

           

          


        <h2 class="text-center text-primary text-capitalize">add product</h2>
        <form class="row g-3 mt-3"  method="POST" action="handlers/add.php" enctype="multipart/form-data">
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">name</label>
                <input type="text" name="name" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">desc</label>
                <input type="text" name="desc" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-12">
                <label for="inputPassword4" class="form-label">price</label>
                <input type="number" name="price" class="form-control" id="inputPassword4">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Image</label>
                <input class="form-control" name="img" type="file" id="formFile">
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">categories</label>
                <select name="cat" id="inputState" class="form-select">
                    <option selected>Choose...</option>
                    <option value="cat1">cat1</option>
                    <option value="cat2">cat2</option>
                </select>
            </div>
            <div class="col-12">
                <button type="submit" name="add" class="btn btn-primary">add</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <script src="main.js"></script>
</body>

</html>