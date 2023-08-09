<?php
session_start();
include_once __DIR__ . '/../controller/brandsController.php';
include_once __DIR__ . '/../controller/accountsController.php';
include_once __DIR__ . '/../controller/packageController.php';

$acc_controller=new AccountsController();
if(isset($_SESSION['email'])){
    $email=$_SESSION['email'];
}
if(isset($_SESSION['user_id'])){
    $user_id=$_SESSION['user_id'];
    $acc_id=$acc_controller->getAccountId($user_id);
    $_SESSION['acc_id']=$acc_id;
}
$brandsController = new brandsController();
$getAllBrands = $brandsController->getAllBrands();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MSST</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <!--    <link rel="stylesheet" href="assets/css/animate.css">-->
    <link rel="stylesheet" href="assets/css/animate4.1.1.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@700&family=Poppins:ital,wght@1,500;1,800&family=Tajawal:wght@500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@700&family=Tangerine:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/mystyle.css">
     <!-- favicon -->
     <link rel="apple-touch-icon" sizes="180x180" href="uploads/logo/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="uploads/logo/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="uploads/logo/favicon-16x16.png">
    <link rel="manifest" href="uploads/logo/site.webmanifest">
    <!-- endfavicon -->
</head>

<body class="bg-white container-fluid g-0 overflow-x-hidden">
    <!--nav bar-->
    <section class="container-fluid bg-dark g-0">
        <nav class="container bg-dark navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand text-white me-auto" href="index.php">
                    M&nbsp;S&nbsp;S&nbsp;T&nbsp;
                    <img src="assets/images/logo_white.png" alt="Bootstrap" style="width: 30px; height: 24px">
                </a>

                <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-lg-0 ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item dropdown" data-wow-delay="0.2s">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Firmwares
                            </a>
                            <ul class="dropdown-menu  animate__animated animate__flipInY">

                            <?php
                            foreach($getAllBrands as $getBrand){
                                echo '<li class="animate__animated animate__flipInY wow" data-wow-delay="0.3s"><a class="dropdown-item" href="models.php?id='.$getBrand['id'].'">'.$getBrand['name'].'</a></li>';
                            }
                            ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="tutorials.php">Tutorials</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="tools.php">Tools</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="box.php">Box</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                    </ul>
                    <?php if(isset($acc_id)){?>
                        <a href=""><span class="me-2 btn-sm animate__animated animate__bounceInRight wow " data-wow-delay="0.2s" type="submit"><?php echo $email;?>
                    </span></a>
                        <a href="logout.php"><button class="btn  btn-sm animate__animated animate__bounceInRight wow register_btn" data-wow-delay="0.5s" type="submit">Logout</button></a>
                    <?php }else{ ?>
                    <a href="register.php"><button class="btn me-2 btn-sm animate__animated animate__bounceInRight wow login_btn" data-wow-delay="0.2s" type="submit">Register
                    </button></a>
                    <a href="signin.php"><button class="btn  btn-sm animate__animated animate__bounceInRight wow register_btn" data-wow-delay="0.5s" type="submit">Login</button></a>
                     <?php }?>
                </div>
            </div>
        </nav>
    </section>
