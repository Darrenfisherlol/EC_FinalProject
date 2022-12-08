<?php require_once("header.php"); ?>
<h1>Sections</h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Job Title</th>      
    </tr>
  </thead>
  <tbody>
<?php
        $servername = "localhost";
        $username = "ngoralou_finalProject";
        $password = "DarrenNicole1";
        $dbname = "ngoralou_finalProject";
    
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  switch ($_POST['saveType']) {
    case 'Add':
      $sqlAdd = "insert into friend (friendID, firstName, lastName, friendTitle) value (?,?,?,?)";
      $stmtAdd = $conn->prepare($sqlAdd);
      $stmtAdd->bind_param("sss", $_POST['fName'], $_POST['lName'], $_POST['fTitle']);
      $stmtAdd->execute();
      echo '<div class="alert alert-success" role="alert">New friend added.</div>';
      break;
    case 'Edit':
      $sqlEdit = "update friend set firstName=?, lastName=?, friendTitle=? where friendID=?";
      $stmtEdit = $conn->prepare($sqlEdit);
      $stmtEdit->bind_param("sss", $_POST['fName'], $_POST['lName'], $_POST['fTitle']);
      $stmtEdit->execute();
      echo '<div class="alert alert-success" role="alert">friend edited.</div>';
      break;
    case 'Delete':
      $sqlDelete = "delete from friend where friendID=?";
      $stmtDelete = $conn->prepare($sqlDelete);
      $stmtDelete->bind_param("i", $_POST['fID']);
      $stmtDelete->execute();
      echo '<div class="alert alert-success" role="alert">friend deleted.</div>';
      break;
  }
}
?>         
<?php
$sql = "SELECT friendID, firstName, lastName, friendTitle FROM friend";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
          
          <tr>
            <td><?=$row["firstName"]?></td>
            <td><?=$row["lastName"]?></td>
            <td><?=$row["friendTitle"]?></td>
            <td>
              <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#editSection<?=$row["friendID"]?>">
                Edit
              </button>
              <div class="modal fade" id="editFriend<?=$row["friendID"]?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editSection<?=$row["friendID"]?>Label" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="editFriend<?=$row["friendID"]?>Label">Edit friend</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!--
                    <div class="modal-body">
                      <form method="post" action="">
                        <div class="mb-3">
                          <label for="editFriend<?=$row["friendID"]?>firstName" class="form-label">First Name</label>
                          <input type="text" class="form-control" id="editFriend<?=$row["friendID"]?>Name" aria-describedby="editFriend<?=$row["friendID"]?>Help" name="sNum" value="<?=$row['sectionNumber']?>">
                          <div id="editSection<?=$row["sectionID"]?>Help" class="form-text">Enter the Section's Number.</div>
                          <label for="courseID" class="form-label">Course ID</label>
                          <input type="text" class="form-control" id="cID" aria-describedby="nameHelp" name="cID" value="<?=$row['courseID']?>">
                          <div id="nameHelp" class="form-text">Enter the Course's ID</div>                          
                        </div>
                        <input type="hidden" name="seID" value="<?=$row['sectionID']?>">
                        <input type="hidden" name="saveType" value="Edit">
                        <input type="submit" class="btn btn-primary" value="Submit">
                      </form>
                    </div>
                  -->
                  </div>
                </div>
              </div>
            </td>
            <td>
              <form method="post" action="">
                <input type="hidden" name="seID" value="<?=$row["sectionID"]?>" />
                <input type="hidden" name="saveType" value="Delete">
                <input type="submit" class="btn" onclick="return confirm('Are you sure?')" value="Delete">
              </form>
            </td>
          </tr>
          
<?php
  }
} else {
  echo "0 results";
}
$conn->close();
?>
          
        </tbody>
      </table>
      <br />
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSection">
        Add New
      </button>

      <!-- Modal -->
      <div class="modal fade" id="addSection" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addSectionLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="addSectionLabel">Add Customer</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="post" action="">
                <div class="mb-3">
                  <label for="sectionNumber" class="form-label">Section Number</label>
                  <input type="text" class="form-control" id="sNum" aria-describedby="nameHelp" name="sNum">
                  <div id="nameHelp" class="form-text">Enter the Section's Number.</div>
                   <label for="courseID" class="form-label">Course ID</label>
                   <input type="text" class="form-control" id="cID" aria-describedby="nameHelp" name="cID">
                   <div id="nameHelp" class="form-text">Enter the Section Course's ID</div>                          
                </div>
                <input type="hidden" name="saveType" value="Add">
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>