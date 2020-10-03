<?php
require_once('../lib/database.php');
require_once('../lib/initialize.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="wrapper">
        <!-- header-start -->
        <div class="header">
            <div class="header-menu">
                <div class="title">Admin</div>
                <div class="sidebar-btn">
                    <i class="fas fa-bars"></i>
                </div>
                <ul>
                    <li><a href="#"> <i class="fas fa-search"></i></a></li>
                    <li><a href="#"> <i class="fas fa-power-off"></i></a></li>
                </ul>
            </div>
        </div>
        <!-- header end-->
        <!-- sidebar-start -->
        <div class="sidebar">
            <div class="side-menu">
                <center class="profile">
                    <img src="../Sneakerimg/93821654_132414348365494_1645356272645570560_n.jpg" alt="">
                    <p>Ninh Nguyễn</p>
                </center>
                <li class="item">
                    <a href="#" class="menu-btn">
                        <i class="fas fa-desktop"></i><span>Dashboard</span>
                    </a>
                </li>
                <li class="item" id="profile">
                    <a href="#profile" class="menu-btn">
                        <i class="fas fa-user-circle"></i><span>Profile</span>
                    </a>
                </li>
                <li class="item" id="table">
                    <a href="#table" class="menu-btn">
                        <i class="fas fa-table"></i><span>table <i class="fas fa-chevron-down dropdown"></i></span>
                    </a>
                    <div class="sub-menu">
                        <a href="dashboard.php?Key=Product"><i><img src="../Sneakerimg/icons8_sneakers_50px.png" width="30" height="30"> </i><span>sneaker</span></a>
                        <a href="dashboard.php?Key=Brand"><i><img src="../Sneakerimg/icons8_sneakers_64px.png" width="30" height="30"> </i><span>brand</span></a>
                    </div>
                </li>

            </div>
        </div>
        <!-- sidebar-end -->
        <!-- main-start -->
      
        <div class="main-container">
        <?php
                        if(isset($_GET['Key'])){
                            switch ($_GET['Key']) {
                           
                             case 'Admin':
                             include_once('./Admin/SelectAdmin.php');
                               break;

                               case 'Brand':
                                include_once('./Brand/SelectBrand.php');
                                  break;

                                  case 'User':
                                    include_once('./User/SelectUser.php');
                                      break;

                                      case 'Product':
                                        include_once('./Product/SelectProduct.php');
                                          break;
                            }
                        
                        }else{
                            include_once('./Product/SelectProduct.php');
                        }
                    ?>
        </div>
        <!-- main-end -->
    </div>
    <script type="text/javascript">
    $(document).ready(function(){
        $(".sidebar-btn").click(function(){
            $(".wrapper").toggleClass("collapse");
        });
    });
    </script>
</body>

</html>
<?php
db_disconnect($db);
?>