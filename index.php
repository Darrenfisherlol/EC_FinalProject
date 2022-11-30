<!--
--  Darren & Nicole
--  Final Project
-->

<?php require_once("header.php")?>

    <!-- main div-->
    <div>

        <div>
            <p>
                Links to other pages
            </p>
            <div>
                <a class="btn btn-primary" href="index.php"  role="button"> Home </a> 
                <a class="btn btn-primary" href="allJob.php"  role="button"> All Jobs </a> 
                <a class="btn btn-primary" href="savedJob.php"  role="button"> Saved Jobs  </a> 
                <a class="btn btn-primary" href="info.php"  role="button"> Your Profile </a> 
                <a class="btn btn-primary" href="founders.php"  role="button"> Founders </a> 

            </div>

        </div>

        <div>
            Explore jobs:
        </div>


        <!-- Sample of other jobs ~ top 5 - most recent-->
          
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>title</th>
                    <th>companyName</th>
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
                $sql = "SELECT TOP(3) title, link, companyName, location, hiringTime, listedDate, listedTime FROM savedJob sj inner join allJob aj on sj.jobID=aj.jobID;
                $result = $conn->query($sql);

                if ($result->num_rows >= 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
            ?>
                <tr>
                <td><?=$row["title"]?></td>
                <td><?=$row["companyName"]?></td>
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



        <div>

        <!-- Bottom banner of info-->
        </div>

            <!-- Info about you - just about section and your major info some not all-->
        
        <div>

        </div>
    </div>


    </body>
</html>