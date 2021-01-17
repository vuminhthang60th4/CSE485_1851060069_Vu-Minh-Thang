<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
<?php 
        // PHẦN XỬ LÝ PHP
        // BƯỚC 1: KẾT NỐI CSDL
        
        $conn = mysqli_connect('localhost', 'root','', 'btl2');
 
        // BƯỚC 2: TÌM TỔNG SỐ RECORDS
        $result = mysqli_query($conn, 'select count(idedu) as total from edu');
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total'];
 
        // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 25;
 
        // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
        // tổng số trang
        $total_page = ceil($total_records / $limit);
 
        // Giới hạn current_page trong khoảng 1 đến total_page
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
 
        // Tìm Start
        $start = ($current_page - 1) * $limit;
 
        // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
        // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
        //$result = mysqli_query($conn, "SELECT * FROM users LIMIT $start, $limit");
 
        ?>

   
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">QUẢN LÝ GIÁO DỤC</h2>
                        
                    </div>
                    <div>

                        <a href="logout.php" class="btn btn-success pull-right">Log out</a>
                        <a href="read.php" class="btn btn-success pull-right">Home</a>
                        <a href="addedu.php" class="btn btn-success pull-right">Add</a>
                    </div>


                    <br>
                    <br>
                    <br>
                    


                    
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM skin";
                    if($result = mysqli_query($conn, "SELECT * FROM edu LIMIT $start, $limit")){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>id</th>";
                                        echo "<th>Tên</th>";
                                        echo "<th>Bắt đầu</th>";
                                        echo "<th>Kết thúc</th>";
                                        echo "<th>Nội dung</th>";
                                        

                                        
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while ($row = mysqli_fetch_assoc($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['idedu'] . "</td>";
                                        echo "<td>" . $row['nameedu'] . "</td>";
                                        echo "<td>" . $row['timestart'] . "</td>";
                                        echo "<td>" . $row['timeend'] . "</td>";
                                        echo "<td>" . $row['noidungedu'] . "</td>";

                                        
                                        echo "<td>";
                                            
                                            echo "<a href='updateedu.php?id=". $row['idedu'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='deleteedu.php?id=". $row['idedu'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            
                        } 
                        
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                    }





                    
 
                    // Close connection
                    mysqli_close($conn);
                    ?>
                </div>
                <div class="pagination">
           <?php 
            // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){
                echo '<a href="displayedu.php?page='.($current_page-1).'">Prev</a> | ';
            }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page){
                    echo '<span>'.$i.'</span> | ';
                }
                else{
                    echo '<a href="displayedu.php?page='.$i.'">'.$i.'</a> | ';
                }
            }
 
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<a href="displayedu.php?page='.($current_page+1).'">Next</a> | ';
            }
           ?>
        </div>
            </div>        
        </div>
    </div>



   
</body>
</html>





