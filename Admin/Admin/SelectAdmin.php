<Button type="button" class="btn btn-Primary" data-toggle="modal" data-target="#myModal1">ADD</Button>
<div class="container">
  <table class="table table-dark">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Password</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Update</th>
        <th>Delete</th>
      </tr>
    </thead>
    <?php
    if (isset($_GET["page"])) {
      $page = $_GET["page"];
    } else {
      $page = 1;
    }
    if (isset($_POST["value"])) {
      $set = $_POST["value"];
    } else {
      if (!isset($_GET["page"])) {
        $set = "";
      } else {
        $set = $_GET['value'];
      }
    }
    $rowpage = 6;
    $perrow = $rowpage * $page - $rowpage;
    $Admin = SelectAllAdmin1();
    $counts = mysqli_num_rows($Admin);
    $listAdmin = SelectAllAdmin($perrow, $rowpage);
    $count = mysqli_num_rows($listAdmin);
    $totalrowpage = ceil($counts / $rowpage);
    $listpage = "";
    for ($i = 1; $i <= $totalrowpage; $i++) {

      if ($page == $i) {
        $listpage .= '<li class="page-item active" ><a class="page-link" href="dashboard.php?Key=Admin&page=' . $i . '&value=' . $set . '">' . $i . '</a></li>';
      } else {
        $listpage .= '<li class="page-item " ><a class="page-link" href="dashboard.php?Key=Admin&page=' . $i . '&value=' . $set . '">' . $i . '</a></li>';
      }
    }
    //  $select =SelectAllAdmin();
    //   $count = mysqli_num_rows($select);
    for ($i = 0; $i < $count; $i++) :
      $admin = mysqli_fetch_assoc($listAdmin);
    ?>
      <tbody>
        <tr>
          <td><?php echo $admin['idadmin']; ?></td>
          <td><?php echo $admin['adminName']; ?></td>
          <td><?php echo $admin['password']; ?></td>
          <td><?php echo $admin['phone']; ?></td>
          <td><?php echo $admin['email']; ?></td>
          <td><Button type="button" class="btn btn-success updateAdmin">Update</Button></td>
          <td><Button type="button" class="btn btn-danger deleteAdmin">Delete</Button></td>
        </tr>
      </tbody>

    <?php
    endfor;
    // mysqli_free_result($listAdmin);
    // mysqli_free_result($Admin);
    ?>
  </table>
  <!-- The Modal -->
  <div class="modal fade" id="myModal1">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Insert Admin</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form action="Admin/InsertAdmin.php" method="post">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="">

            <br>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" value="">

            <br>
            <label for="confirm_password">Confirm Password</label>
            <input type="password" name="cf_password" id="confirm_password" class="form-control" value="">

            <br>
            <label for="phone">Phone Number</label>
            <input type="number" id="phone" name="phone" class="form-control" value="">

            <br>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="">

            <div class="modal-footer">
              <input type="submit" value="Insert" class="btn btn-default" name="submit">
              <input type="button" value="cancel" class="btn btn-default" data-dismiss="modal" name="reset">
              <br>

            </div>
          </form>
        </div>

        <!-- Modal footer -->
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div> -->

      </div>
    </div>
  </div>
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Update Admin</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form action="Admin/UpdateAdmin.php" method="post">
            <input type="hidden" id="idadmin1" name="idadmin" class="form-control">
            <label for="name">Name</label>
            <input type="text" id="name1" name="name" class="form-control">

            <br>
            <label for="password">Password</label>
            <input type="password" id="password1" name="password" class="form-control">

            <br>
            <label for="phone">Phone Number</label>
            <input type="text" id="phone1" name="phone" class="form-control">

            <br>
            <label for="email">Email</label>
            <input type="email" id="email1" name="email" class="form-control">

            <div class="modal-footer">
              <input type="submit" value="Update" class="btn btn-default" name="submit">
              <input type="button" value="cancel" class="btn btn-default" data-dismiss="modal" name="reset">
              <br>

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="myModal2">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Delete Admin</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form action="Admin/DeleteAdmin.php" method="post">
            <input type="hidden" id="idadmin2" name="idadmin" class="form-control">
            <input type="text" id="name2" name="name2" class="form-control" disabled>
              <div class="modal-footer">
                <input type="submit" value="Delete" class="btn btn-default" name="submit">
                <input type="button" value="cancel" class="btn btn-default" data-dismiss="modal" name="reset">
                <br>

              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="pagination" style="position: absolute;right: 0;">
    <nav aria-label="Page navigation">
      <ul class="pagination">
        <?php
        if ($count < 6) {
          return null;
        } else {
          echo $listpage;
        }
        ?>
      </ul>
    </nav>
  </div>