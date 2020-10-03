
<div class="container">
  <table class="table table-dark">
    <thead>
      <tr>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Address</th>
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
    $User1= SelectAllUser1();
    $counts = mysqli_num_rows($User1);
    $listUser = SelectAllUser($perrow,$rowpage);
    $count = mysqli_num_rows($listUser);
    $totalrowpage=ceil($counts/$rowpage);
    $listpage = "";
    for ($i = 1;$i <= $totalrowpage;$i++){
  
        if ($page == $i){
            $listpage .= '<li class="page-item active" ><a class="page-link" href="dashboard.php?Key=User&page='.$i.'&value=' . $set . '">' . $i . '</a></li>';
        }
        else{
            $listpage .= '<li class="page-item " ><a class="page-link" href="dashboard.php?Key=User&page='.$i.'&value=' . $set . '">' . $i . '</a></li>';
        }
  }
    for($i=0;$i<$count;$i++):
        $User =mysqli_fetch_assoc($listUser);
   ?>
    <tbody>
      <tr>
        <td><?php echo $User['userName'];?></td>
        <td><?php echo $User['phonenumber'];?></td>
        <td><?php echo $User['email'];?></td>
        <td><?php echo $User['address'];?></td>
      </tr>
    </tbody>
    <?php 
       endfor;
        mysqli_free_result($listUser);
        mysqli_free_result($User1);
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
