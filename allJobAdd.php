<!--
--
--  This file is for adding the desired job to a list of applied jobs 
--
-->
        <?php require_once("header.php")?>


        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

        <!-- 

        -- Make the notification for saved job / item added pretty 

        -->
        `<div>

            <div class="alert alert-success"> Job Saved</div>

        </div>

        </br>

        <div>

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

                // POST 
                $jobID = $_POST['jobID'];

                $sql = "INSERT INTO savedJob (jobID) VALUES (?)";

                $saveSql = $conn->prepare($sql);

                $saveSql->bind_param("i", $jobID);

                $saveSql->execute();

                $saveSql->close();
            ?>



    <table class="table table-striped">
      <thead>
        <tr>
            <th>title</th>
            <th>companyName</th>
            <th>location</th>
            <th>hiringTime</th>
            <th>listedDate</th>
            <th>listedTime</th>
            <th>Remove Job</th>
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
        
                // POST 
                $jobID = $_POST['jobID'];

                $sql = "SELECT title, link, companyName, location, hiringTime, listedDate, listedTime FROM savedJob sj inner join allJob aj on sj.jobID=aj.jobID WHERE jobID = $jobID";

                $result = $conn->query($sql);

                if ($result->num_rows >= 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
              ?>
                <tr>
                  <td><?=$row["title"]?></td>
                  <td><?=$row["companyName"]?></td>
                  <td><?=$row["location"]?></td>
                  <td><?=$row["hiringTime"]?></td>
                  <td><?=$row["listedDate"]?></td>
                  <td><?=$row["listedTime"]?></td>
        
                  
        
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
            <!-- 

            -- Make the notification for GO BACK pretty 

            -->
            <a href="allJob.php" class="btn btn-primary"> Back to List of Jobs </a>
            <a href="savedJob.php" class="btn btn-primary"> Back to List of Applied Jobs </a>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    </body>
</html>
