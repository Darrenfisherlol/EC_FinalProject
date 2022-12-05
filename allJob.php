<!--
--  Darren & Nicole
--  Final Project
-->

    <?php require_once("header.php")?>

    <div>
      <table class="table table-striped">
          <thead>
            <tr>                
                <th>Job Title</th>
                <th>Company Name</th>
                <th>Location</th>
                <th>Hiring Time</th>
                <th>Job Link</th>
                <th>Save Job</th>
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
            
            // GET, query, and comple
            
            $sql = "SELECT jobID, title, link, companyName, location, hiringTime, listedDate, listedTime FROM allJob j";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
          ?>
            <tr>              
              <td><?=$row["title"]?></td>
              <td><?=$row["companyName"]?></td>
              <td><?=$row["location"]?></td>
              <td><?=$row["link"]?></td>              
              <td><?=$row["listedTime"]?></td>

              <td>
                <form method="post" action="allJobAdd.php">
                  <input type="hidden" name="jobID" value="<?=$row["jobID"]?>" />
                  <button type="submit" class="btn"> <div class="btn btn-primary"> Save Job <div> </button>
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

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>
