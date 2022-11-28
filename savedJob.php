<!--
--  Darren & Nicole
--  Final Project
-->
<!--
--  Darren & Nicole
--  Final Project
-->

<?php require_once("header.php")?>

<div>
  <table class="table table-striped">
      <thead>
        <tr>
            <th>title</th>
            <th>companyName</th>
            <th>location</th>
            <th>hiringTime</th>
            <th>listedDate</th>
            <th>listedTime</th>
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
       
        $sql = "SELECT title, link, companyName, location, hiringTime, listedDate, listedTime FROM savedJob";
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

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>
