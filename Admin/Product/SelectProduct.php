
<div class="container">
  <table class="table table-dark">
    <thead>
      <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Image</th>
      </tr>
    </thead>
    <?php
    if(isset($_GET["page"])){
      $page=$_GET["page"];
  } else {
      $page=1;
  }
  if(isset($_POST["value"])){
    $set=$_POST["value"];
  } else{
    if(!isset($_GET["page"])){
      $set="";
    }  else{
      $set=$_GET['value'];
    }
  }
  $rowpage=6;
  $perrow=$rowpage*$page-$rowpage;
  $Product= SelectAllProduct1();
  $counts = mysqli_num_rows($Product);
  $listProduct = SelectAllProduct($perrow,$rowpage);
  $count = mysqli_num_rows($listProduct);
  $totalrowpage=ceil($counts/$rowpage);
  $listpage = "";
  for ($i = 1;$i <= $totalrowpage;$i++){
  
      if ($page == $i){
          $listpage .= '<li class="page-item active" ><a class="page-link" href="dashboard.php?Key=Product&page='.$i.'&value=' . $set . '">' . $i . '</a></li>';
      }
      else{
          $listpage .= '<li class="page-item " ><a class="page-link" href="dashboard.php?Key=Product&page='.$i.'&value=' . $set . '">' . $i . '</a></li>';
      }
  }
    for($i=0;$i<$count;$i++):
        $Sneaker =mysqli_fetch_assoc($listProduct);
   ?>
    <tbody>
      <tr>
        <td><?php echo $Sneaker['sneakerName'];?></td>
        <td><?php echo $Sneaker['price'];?></td>
        <td><img src="../Sneakerimg/<?php echo $Sneaker['img']; ?>" style="width: 100px; height: 50px;"></td>
      </tr>
    </tbody>
    <?php 
       endfor;
        mysqli_free_result($listProduct);
        mysqli_free_result($Product);
        ?>
  </table>
  <div class="pagination"  style="position: absolute;right: 0;">
    <nav aria-label="Page navigation">
        <ul class="pagination">
        <?php      
          if($count<6){
            return null;
          }else{
            echo $listpage;
          }
               
            ?>
        </ul>
    </nav>
</div>