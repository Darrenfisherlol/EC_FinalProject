<!--
--  Darren & Nicole
--  Final Project
-->

<?php require_once("header.php")?>

    <!-- main div-->
    <div>

        <div style="background-color: #372823;">

        <div style="height:250px; width: 100%;  height: 300px;">
                
            <img style="height:100%; width: 100%;" src="nicewalk.jpeg">

        </div>

        <div style="text-align: center; vertical-align:middle; display:inline-block; font-size: 100px; Height:150px; width: 100%; background-color: #fef1e4; color: #261a04; font-weight: bold;">
                
            Jobly

        </div>

        <div style="height:300px; ; width: 100%; text-align:center;">


            <div style="float: left; height:100%; width: 50%; padding: 5px;  background-color: #fde3c8; color: #372823;">            
                    <div >
                            <p id="changeContent" style="font-size:40px;">
                                "Jobly helped me get 100 job interviews with 100% success"
                            </p>

                            <button onclick="changeContent()">Learn more about how we help customers</button>

                            <script>
                                function changeContent() 
                                {
                                    document.getElementById("changeContent").innerHTML = "I got a job using Jobly!"
                                }
                        
                                
                            </script>

                        </div>
                    </div>
            <div style="float: left; height:100%; width: 50%; padding: 5px;font-size:45px; background-color: #e5c185;">
                
                Jobly was created in 2022 as the increasing need for a job after graduation became more prevalent

            </div>

        </div>



        <div style="height: 300px; width: 100%; text-align:center;">

            <div style="float: left; height:100%; width: 50%; padding: 5px; background-color: #e5c185; text-align: center; ">
                
                <div>
                    <img width="30%" height="30%" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fblog.carltonstaffing.com%2Fwp-content%2Fuploads%2F2020%2F09%2Flinkedin-icon-logo-png-transparent-2048x2048.png&f=1&nofb=1&ipt=e32db8beb9891a030a378a029b8454bdfee8302fd7e4845b708a1cf0b8f767cd&ipo=images">
                </div>

            </div>

            <div style="float: left; height:100%; width: 50%; padding: 5px; background-color: #fde3c8;">
                <p style="font-size:45px; vertical-align:middle; display:inline-block;">

                    Linkedin collect user information and make you buy expensive +$30 a month subscriptions!

                <p>

            </div>

        </div>


    <div style="height:100px; font-size:25px; text-align: center; width: 100%; background-color: #fef1e4; font-weight: bold;">

        Learn more about the founders here:
        
        </br>

        <a href="founders.php" class="btn btn-warning btn-lg"> 
            Founders Page
        </a>

    </div>

    <div style="height:500px; font-size:25px; text-align: center; width: 100%; background-color: #fef1e4; font-weight: bold;">

        Check out our groth rate!

        <div>

            <div style="font-size: 25px; margin-left: 100px;"> Jobly % user growth 7/1/22 - 8-20/22</div>

            <div id="ChartGrowth" style="width:100%; height:350px;"></div>
 
            <div>

                <script>
                    TESTER = document.getElementById('ChartGrowth');
                    Plotly.newPlot( TESTER, [{

                    x: ['7-1-22','7-12-22','7-15-22','7-18-22','7-25-22','7-28-22','8-1-22','8-5-22','8-15-22','8-20-22'],
                    y: [10,20,25,23,26,29,34,40,56,60] }], {

                    margin: { t: 0 } } );
                </script>

            </div>
        </div>
    </div>

    <div style="background-color: #fef1e4;">

        <div style="text-align: center; font-size:30px; width: 100%; background-color: #fef1e4; font-weight: bold;">
            Most Recent Applied Jobs:
        </div>

        <table class="table table-striped" style="font-size: 25px;">
            <thead>
                <tr>
                    <th>Job Title</th>
                    <th>Company Name</th>
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
                $sql = "SELECT title, link, companyName, location, hiringTime, listedDate, listedTime FROM savedJob sj inner join allJob aj on sj.jobID=aj.jobID ORDER BY sj.savedID DESC LIMIT 5";
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

    </div>


    </body>
</html>
