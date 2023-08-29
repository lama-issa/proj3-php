<?php
session_start();//اذا بدي استخدم السيشن لازم اكتب هاد السطر باول الصفحة عشان يفعل السيشن
if(isset($_POST['login'])){
// من خلال الفورم وليس من مكان اخر حتى ما يعطي ايريور اذا دخلت من مكان ثانيloginعشان اتاكد اني داخلة على صفحة 
extract($_POST);// الي بالفورمname بنشا متغيرات لكل 
$errors=[];
if(empty($email)){
    $errors[]="email is empty";
}

if(empty($pass)){
    $errors[]="password is empty";
}


if(empty($errors)){
    //؟user in data base(اتاكد انه اليوز الي دخل موجود عندي بالداتا بيس)
    //واذا ايمله موجود بالداتا بيس روح اتاكد اذا الباسورد الي دخله هل موجود بالداتا بيس ولا لا
    $user=array("name"=>"lama","email"=> "lama@gmail.com","password"=>"123456");

    if($email==$user['email']){
        if($pass==$user['password']){
            //to index auth
            // authرح ننشا سيشن اسمها loginيعني هون لما اليوزر عمل 
            // فمعناها اليوزر بكون مسجل دخولauthيعني اذا في سيشن اسمها 
            $_SESSION['auth']=$user;// loginفبالتالي اليوزر بكون عامل auth  عملت سيشن وحطيت قيها كل بيانات اليوز عشان اذا كانت السيشن 
            header("Location: ../index.php");//اذا كلشي صح دخله فرح يوديني على صفحة الاندكس
        }
        else{
            $errors[]="password not correct";
            $_SESSION['errors']=$errors;
            header("Location: ../login.php");

        }
    }
    else{
        $errors[]="email not correct";
        $_SESSION['errors']=$errors;
        header("Location: ../login.php");
    }

}
else{
    //   من خلال اللوكيشن وبوخذ معه الايريور على صفحة الفورم من خلال السيشنlogin (الفورم)اذا كان قي ايريور فرح يرجعني على الصفحة الي كنت فيها صفحة ال 
    $_SESSION['errors']=$errors;//عشان ابعث الايرور من لصفحة لاخرى
    //['errors']: هاد اسم السيشن انا بسميه اي اسم بدي اياه
    header("Location: ../login.php");//  عشان انتقل لصفحة اخرلىlogin (الفورم)بطلع من صفحة الهاندلو وبروح على صفحة 
}

}










?>