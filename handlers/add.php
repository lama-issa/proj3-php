
<?php
session_start();
echo "<pre>";
print_r($_FILES);//img ترجع من خلال هاد الامر
echo "</pre>";
if(isset($_POST['add'])){
    extract($_POST);
}
$errors=[];
if(empty($name)){
    $errors[]="name is empty";
}
if(empty($desc)){
    $errors[]="desc is empty";
}

if(empty($price)){
    $errors[]="price is empty";
}

if(empty($cat)){
    $errors[]="cat is empty";
}


$exts=["png","jpg"];
$img=$_FILES['img'];//بجيب جميع تفاصيل الصورة
$img_name=$img['name'];
$tmp_name=$img['tmp_name'];
$size=$img['size']/(1024*1024); // mb 
        //$size/(1024*1024):لتحويل حجم الصورة الى mb
$ext=strtolower(pathinfo($img_name,PATHINFO_EXTENSION));//بجيب امتداد الصورة

        if($img['error']){
            $errors[] = "please upload corect imge";
        }elseif(!in_array($ext,$exts)){
            $errors[] = 'not valid imge';

        }elseif($img_size > 1){
            $errors[] = 'imge is greater than 1 mb';
        }


        if(empty($errors)){
            //add success
            $new_name=uniqid().".$ext";
            move_uploaded_file($tmp_name,"../images/$new_name");
        $_SESSION['success']="added successful";
        header("Location: ../index.php");
    }
    else{
        $_SESSION['errors']=$errors;
        header("Location: ../index.php");
    }



?>

