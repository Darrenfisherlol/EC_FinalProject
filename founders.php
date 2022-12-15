<!--
--  Darren & Nicole
--  Final Project
-->

<?php require_once("header.php")?>

    <!-- Div which is 100% of page -->
    <div style="background-color: #fef1e4;">

        <div style="Width:100%; height:100px; text-align: center; font-weight: bold; font-size:75px;background-color: #fde3c8; margin-bottom: 10px;">
            <p style="font-size:50px; color: #372823;">
                About Founders:
            </p>
        </div>

        <div style="width: 100%; height:200px; margin-bottom: 10px;; background-color: #f3ce8b; color:#372823 ">
            
            <div style="width: 31%; float: left;font-size:25px; margin-top: 40px; text-align:center; margin-left:15px; margin-right:15px; background-color: #fde3c8;">
                Nicole and Darren worked with the University of Oklahoma, Dr. Bellah, and OU create to make all their dreams come true.
            </div>
            <div style="width: 31%; float: left;font-size:25px;margin-top: 40px; text-align:center; margin-left:15px; margin-right:15px;background-color: #fde3c8;">
                They hope that you have a wonderful experience using Jobly!
            </div>
            <div style="width: 31%; float: left;font-size:25px; margin-top: 40px;text-align:center; margin-left:15px; margin-right:15px;background-color: #fde3c8;">
                Jobly is their beautiful brain child that they hope will help future students and job seekers to stay organized and eventually find a job.
            </div>
          
        </div>
         
        <div style="width: 100%; height:300px; margin-bottom: 10px; background-color: #fde3c8; color:#372823; ">
        
            <div style="width: 25%; height: 100%; float: left; text-align: center;"> 
                <img style="height: 100%;  display: flex; justify-content: center; align-items: center;" src="https://media-exp1.licdn.com/dms/image/C5603AQFvAaQW30mjag/profile-displayphoto-shrink_400_400/0/1629331853308?e=1674086400&v=beta&t=z62IE1kzoF_2Y7N9iEL5oxM1gHSzvdnoPFrysVoxZ3g" alt="Nicole">
            </div>
            
            <div style="width: 75%; height: 100%; margin-top: 70px; margin-left:15px; float: left;"> 

                <p style="font-size:25px; color: #372823; background-color: #fde3c8;text-align: center;">
                    Nicole Goral is a senior studying Management Information Systems and International Business. 
                    After applying to over 70 jobs, Nicole got overwhelmed with tracking which jobs she applied to. 
                    This website is to help people like Nicole who want to find a job and stay organized while doing so!
                </p>

            </div>

        </div>

        <div style="width: 100%; height:300px; margin-bottom: 10px; background-color: #f3ce8b; color:#372823; ">
            
            <div style="width: 75%; height: 100%; float: left;text-align: center;"> 



                <p style="font-size:25px; color: #372823; background-color: #f3ce8b;text-align: center;">
                        Darren loves helping his friends and creating solutions to problems even more!
                
                    <div>
                        <p id="changeContent" style="font-size: 25px; margin-top: 40px;">
                        Darren Fisher is a senior studying Management Information Systems and is on the accelerated Masters track in Information Technology. 
                        </p>

                        <button onclick="changeContent()">Learn more</button>
                        <button onclick="changeContentTwo()">Learn more more!!</button>

                        <script>
                            function changeContent() 
                            {
                                document.getElementById("changeContent").innerHTML = "Darren is constantly trying to create the next big thing or work with startups."
                            }
                            function changeContentTwo()
                            {
                                document.getElementById("changeContent").innerHTML = "Darren needs a job!!"
                            }
                            
                        </script>

                    </div>
                </p>

            
            
            
            
            </div>

            <div style="width: 25%; height: 100%; float: left;text-align: center; "> 
                <img style="height: 100%; text-align: center; display: flex; justify-content: center; align-items: center;" src="https://media-exp1.licdn.com/dms/image/C4E03AQEXLkjEQK7QYg/profile-displayphoto-shrink_400_400/0/1621025060836?e=1674086400&v=beta&t=8iPq0SLTLrraWpaoK4p6oY-euPQlglgDJSPuNzjlu0c" alt="Darren">
            </div>

        </div>

    </body>
</html>
