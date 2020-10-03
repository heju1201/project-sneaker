<?php
require_once('../Lib/database.php');
require_once('../Lib/initialize.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body>

  <ul class="navbar-nav">
    <li class="nav-item">
      <a href="Admin.php?Key=Admin" class="nav-link active">Admin</a>
    </li>
    <li class="nav-item">
      <a href="Admin.php?Key=Product" class="nav-link">Product</a>
    </li>
    <li class="nav-item">
      <a href="Admin.php?Key=User" class="nav-link">User</a>
    </li>
    <li class="nav-item">
      <a href="Admin.php?Key=Brand" class="nav-link">Brand</a>
    </li>
  </ul>
  <?php
  if (isset($_GET['Key'])) {
    switch ($_GET['Key']) {

      case 'Admin':
        include_once('./Admin/SearchAdmin.php');
        break;

      case 'Brand':
        include_once('./Brand/SearchBrand.php');
        break;

      case 'User':
        include_once('./User/SearchUser.php');
        break;

      case 'Product':
        include_once('./Product/SearchProduct.php');
        break;
    }
  } else {
    include_once('./Product/SearchProduct.php');
  }
  ?>

  <?php
  if (isset($_GET['Key'])) {
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
  } else {
    include_once('./Product/SelectProduct.php');
  }
  ?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      $('.updateAdmin').on('click', function() {
        $('#myModal').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children('td').map(function() {
          return $(this).text();
        }).get();
        console.log(data);
        $('#idadmin1').val(data[0]);
        $('#name1').val(data[1]);
        $('#password1').val(data[2]);
        $('#phone1').val(data[3]);
        $('#email1').val(data[4]);
      });
    });
  </script>
    <script>
    $(document).ready(function() {
      $('.deleteAdmin').on('click', function() {
        $('#myModal2').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children('td').map(function() {
          return $(this).text();
        }).get();
        console.log(data);
        $('#idadmin2').val(data[0]);
        $('#name2').val("adasddasdasdasd : "+data[1]);
      });
    });
  </script>
</body>

</html>
<?php
db_disconnect($db);
?>