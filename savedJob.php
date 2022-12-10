<!--
--  Darren & Nicole
--  Final Project
-->
<!--
--  Darren & Nicole
--  Final Project
-->

<?php require_once("header.php")?>

<div style="height:250px; width: 100%;  height: 300px;">

    <img style="height:100%; width: 100%;" src="savedjob.jpeg">

  </div>

  <div style="text-align: center; vertical-align:middle; display:inline-block; font-size: 100px; Height:150px; width: 100%; background-color: #fef1e4; color: #261a04; font-weight: bold;">
    Saved Jobs
  </div>

<div>
  <table class="table table-striped">
      <thead style="background-color: #fde3c8;">
        <tr style="color:#372823; font-size:20px">
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
       
        $sql = "SELECT sj.savedID, title, link, companyName, location, hiringTime, listedDate, listedTime FROM savedJob sj inner join allJob aj on sj.jobID=aj.jobID";
        $result = $conn->query($sql);

        if ($result->num_rows >= 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
      ?>
        <tr style="background-color: #fef1e4; font-size:15px">
          <td><?=$row["title"]?></td>
          <td><?=$row["companyName"]?></td>
          <td><?=$row["location"]?></td>
          <td><?=$row["hiringTime"]?></td>
          <td><a class="btn btn-warning" href="<?=$row["link"]?>" role="button">Job Link</a></td>

          <td>
              <form method="post" action="savedJobDelete.php">
                  <input type="hidden" name="savedID" value="<?=$row["savedID"]?>" />
                  <button type="submit" class="btn" onclick="return confirm('Confirm delete?')"> <div class="btn btn-danger"> Delete </div> </button>
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
