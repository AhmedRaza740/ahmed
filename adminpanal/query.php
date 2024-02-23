<?php
include('dbcon.php');
session_start();
if(isset($_POST['signin'])){
    $useremail = $_POST['usemail'];
    $userpassword = $_POST['upassword'];
    $query = $pdo->prepare('select * from users where email=uemail AND password =:upassword ');
    $query->bindparam('usemail',$useremail);
    $query->bindparam('uspassword',$userpassword);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);
    if($user){
        $_SESSION['usemail'] =$user['email'];
        $_SESSION['usname'] = $user['name'];
        $_SESSION['usid'] = $user['id'];
        echo "<script>alert('login successfully');location.assign('index.php')</script>";
    }
}
// add category work //
if(isset($_POST['addCategory'])){
    $cName = $_POST['categoryName'];
    $cDes = $_POST['categoryDescription'];
    $imageName = $_FILES['categoryImage']['name'];
    $imageTmpName = $_FILES['categoryImage']['tmp_name'];
    $extension = pathinfo($imageName,PATHINFO_EXTENSION );
    $destination = "img/". $imageName;
    if($extension == "jpg" || $extension == "png" || $extension == "jpeg" || $extension == "webp"){
        if(move_uploaded_file($imageTmpName, $destination)){
            $query = $pdo->prepare("insert into categories (Name, Image, Des) values(:cName , :cImage, :cDes)");
            $query->bindParam('cName', $cName);
            $query->bindParam('cImage', $imageName);
            $query->bindParam('cDes', $cDes);
            $query->execute();
            echo "<script>alert('category added successfully');
            location.assign('index.php')</script>";
        }
    }
}
// update category
if(isset($_POST['updatecategories'])){
    $id = $_GET['id'];
    $cName = $_POST['categoryName'];
    $cDes = $_POST['categoryDes'];
    $query = $pdo->prepare("update categories set name = :cName , des =:cDes where id = :cId");
    if(isset($_FILES['categoryImage'])){
        $cImageName = $_FILES['categoryImage']['name'];
        $cImageTmpName = $_FILES['categoryImage']['tmp_name'];
        $extension = pathinfo($cImageName,PATHINFO_EXTENSION );
        $destination = "img/" .$cImageName;
        if($extension == "png" || $extension == "jpeg" || $extension == "jpg" || $extension == "webp"){
            if(move_uploaded_file($cImageTmpName,$destination)){
                $query = $pdo->prepare("update categories set Name = :cName , Des = :cDes ,Image = :cImage where id = :cId");
                $query-> bindParam ('cImage',$cImageName);
            }
        } 
    }
    $query->bindParam('cName',$cName);
    $query->bindParam('cDes',$cDes);
    $query->bindParam('cId',$id);
    $query->execute();
    echo "<script>alert('category updated successfully');</script>";
}
// ALL PRODUCT
if(isset($_POST['addProduct'])){
    $ProductName = $_POST['ProductName'];
    $ProductPrice = $_POST['ProductPrice']; 
    $ProductDes = $_POST['ProductDes'];
    $ProductQty = $_POST['ProductQty'];
    $Cid = $_POST['Cid'];
    $ProductImageName = $_FILES['ProductImage']['name'];
    $ProductImageTmpName = $_FILES['ProductImage']['tmp_Name'];
    $extension = pathinfo($ProductImageName,PATHINFO_EXTENSION);
    $destination = "Img/".$ProductImageName;
    if(extension == "jpg" || $extension == "png"|| $extension == "jpeg" || $extension == "webp"){
        if(move_uploaded_file($ProductImageTmpName ,$destination)){
            $query = $pdo->prepare("insert into products(Name,Price,Image,Des,Qty,C_id)values(:PName,:PPrice,:PImage,:PDes,:PQty, :Cid)");
            $query->bindParam ('PName',$ProductName);
            $query->bindParam ('PImage',$ProductImageName);
            $query->bindParam ('PDes',$ProductDes);
            $query->bindParam ('PQty',$ProductQty);
            $query->bindParam ('PPrice',$ProductPrice);
            $query->bindParam ('Cid',$Cid);
            $query->execute();
            echo "<script>alert('Product added successfully');</script>";
        }
        }
        }
        //edit Product
        if(isset($_POST['editProduct'])){
            $id = $_GET['id'];
            $cName = $_POST['ProductName'];
            $cDes = $_POST['categoryDes'];
            $query = $pdo->prepare("update categories set name = :cName , des =:cDes where id = :cId");
            if(isset($_FILES['categoryImage'])){
                $cImageName = $_FILES['categoryImage']['name'];
                $cImageTmpName = $_FILES['categoryImage']['tmp_name'];
                $extension = pathinfo($cImageName,PATHINFO_EXTENSION );
                $destination = "img/" .$cImageName;
                if($extension == "png" || $extension == "jpeg" || $extension == "jpg" || $extension == "webp"){
                    if(move_uploaded_file($cImageTmpName,$destination)){
                        $query = $pdo->prepare("edit categories set Name = :cName , Des = :cDes ,Image = :cImage where id = :cId");
                        $query-> bindParam ('cImage',$cImageName);
                    }
                } 
            }
            $query->bindParam('cName',$cName);
            $query->bindParam('cDes',$cDes);
            $query->bindParam('cId',$id);
            $query->execute();
            echo "<script>alert('category edit successfully');</script>";
        }
    
    
    
   


?>