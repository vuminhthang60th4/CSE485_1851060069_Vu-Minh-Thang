<?php
include 'config.php';
?>



<!doctype html>
<html lang="en">

<head>
    <title>ADMIN</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="fontawesome/js/all.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="fontawesome/css/all.css">
<!--    <link rel="stylesheet" href="css/home.css"> -->
</head>

<body class="body" style="background-image:url(images/bg/bg1.jpg); background-size:100%;">
    <header>
        <nav class="navbar navbar-expand-sm header-top">
            <a class="navbar-brand logo" href="home.php">
                   Thang Vu Minh
            </a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
            </div>
            <div class="narr">
                <ul class="nav justify-content-end">
                    
                        <li class="nav-item">
                            <a type="button" class="nav-link active " href="#" data-toggle="modal" data-target="#login">
                                <span>Wellcome</span>
                            </a>
                        </li>
                        
                        
                            
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle magana" data-toggle="dropdown" href="#">Change Profile </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item i" href="displayskin.php">Kỹ năng chuyên môn</a>
                                        <a class="dropdown-item i" href="displayedu.php">Giáo dục</a>
                                        <a class="dropdown-item i" href="displayst.php">Sở thích</a>
                                        <a class="dropdown-item i" href="display.php">Xem người đăng ký</a>
                                    </div>
                                </li>
                            
                            <li class="nav-item">
                                <a class="nav-link active" href="logout.php">Logout</a>
                            </li>
                    
                </ul>
            </div>
        </nav>
        <nav class="navbar navbar-expand-lg navbar-light header-bottom">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="home.php">Trang chủ<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Giới thiệu</a>
                    </li>
                  
                    
                   
                    <li class="nav-item">
                        <a class="nav-link" href="#">Liên hệ</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </header>
    <div class="contain" style="width: 100%;">
        









        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>