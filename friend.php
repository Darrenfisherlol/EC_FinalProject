<?php require_once("header.php"); ?>

  <div style="height:250px; width: 100%;  height: 300px;">

    <img style="height:100%; width: 100%;" src="https://www.ou.edu/content/dam/homepage/outside-class-march-11-2020.jpg">

  </div>

  <div style="text-align: center; vertical-align:middle; display:inline-block; font-size: 100px; Height:150px; width: 100%; background-color: #fef1e4; color: #261a04; font-weight: bold;">
  Friends List
  </div>
  

  <div style="background-color: #fef1e4;">


    <table class="table table-striped">
    <thead>
      <tr style="color: #372823; font-size:20px; background-color: #fde3c8">
        <th>First Name</th>
        <th>Last Name</th>
        <th>Job Title</th>
        <th>Edit Button</th>
        <th>Delete Button</th>      
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
        $sqlAdd = "insert into friend (firstName, lastName, friendTitle) value (?,?,?)";
        $stmtAdd = $conn->prepare($sqlAdd);
        $stmtAdd->bind_param("sss", $_POST['fName'], $_POST['lName'], $_POST['fTitle']);
        $stmtAdd->execute();
        echo '<div class="alert alert-success" role="alert">New Friend added.</div>';
        break;
      case 'Edit':
        $sqlEdit = "update friend set firstName=?, lastName=?, friendTitle=? where friendID=?";
        $stmtEdit = $conn->prepare($sqlEdit);
        $stmtEdit->bind_param("sssi", $_POST['fName'], $_POST['lName'], $_POST['fTitle'], $_POST['fID']);
        $stmtEdit->execute();
        echo '<div class="alert alert-success" role="alert">Friend edited.</div>';
        break;
      case 'Delete':
        $sqlDelete = "delete from friend where friendID=?";
        $stmtDelete = $conn->prepare($sqlDelete);
        $stmtDelete->bind_param("i", $_POST['fID']);
        $stmtDelete->execute();
        echo '<div class="alert alert-success" role="alert">Friend deleted.</div>';
        break;
    }
    }
    ?>         
    <?php
    $sql = "SELECT friendID, firstName, lastName, friendTitle from friend";
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
              
              </td>
              <td>
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#editFriend<?=$row["friendID"]?>">
                  Edit
                </button>
                <div class="modal fade" id="editFriend<?=$row["friendID"]?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editFriend<?=$row["friendID"]?>Label" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editFriend<?=$row["friendID"]?>Label">Edit Friend</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form method="post" action="">
                          <div class="mb-3">

                            <label for="editFirstName<?=$row["friendID"]?>Name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="editFirstName<?=$row["friendID"]?>Name" aria-describedby="editFirstName<?=$row["friendID"]?>Help" name="fName" value="<?=$row['firstName']?>">
                            
                      
                            <label for="editLastFriend<?=$row["friendID"]?>Name" class="form-label">Enter Last Name</label>
                            <input type="text" class="form-control" id="editLastFriend<?=$row["friendID"]?>Name" aria-describedby="editLastFriend<?=$row["friendID"]?>Help" name="lName" value="<?=$row['lastName']?>">
                                                    
                            <label for="editJobFriend<?=$row["friendID"]?>Name" class="form-label">Enter the Job Title</label>
                            <input type="text" class="form-control" id="editJobFriend<?=$row["friendID"]?>Name" aria-describedby="editJobFriend<?=$row["friendID"]?>Help" name="fTitle" value="<?=$row['friendTitle']?>">
                            
                                                    
                          </div>
                          <input type="hidden" name="fID" value="<?=$row['friendID']?>">
                          <input type="hidden" name="saveType" value="Edit">
                          <input type="submit" class="btn btn-primary" value="Submit">
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <form method="post" action="">
                  <input type="hidden" name="fID" value="<?=$row["friendID"]?>" />
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
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFriend">
          Add New
        </button>

        <!-- Modal -->
        <div class="modal fade" id="addFriend" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addFriendLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="addFriendLabel">Add Friend</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form method="post" action="">
                  <div class="mb-3">
                    <label for="firstName" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="firstName" aria-describedby="nameHelp" name="fName">
                    
                    <label for="lastName" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lastName" aria-describedby="nameHelp" name="lName">
                    
                    <label for="friendTitle" class="form-label">Job Title</label>
                    <input type="text" class="form-control" id="friendTitle" aria-describedby="nameHelp" name="fTitle">
                    
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
  </div>
  </body>
</html>
