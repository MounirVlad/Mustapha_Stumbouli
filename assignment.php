<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Assignment</title>
  <link rel="icon" href="images/LOGO.png">
  <link rel="stylesheet" href="css/framework.css">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,500;0,600;1,300;1,500&family=Poppins:wght@100;300&display=swap" rel="stylesheet">
</head>

<body>
  <div class="page d-flex">
    <div class="sidebar bg-white p-20 p-relative">
      <img src="images/Dutch.png" class="p-relative txt-center mt-0">
      <ul class="menu">
        <li>
          <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="index.html">
            <i class="fa-solid fa-house-chimney fa-fw"></i>
            <span class="hide-mobile"> Home</span>
          </a>
        </li>
        <li>
          <a class="Sub-menu d-flex align-center fs-14 c-black rad-6 p-10" href="teacher.php">
            <i class="fa-solid fa-chalkboard-user"></i>
            <span> Teacher</span>
          </a>
          <ul class="dropdown">
            <li>
              <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="AddTeacher.html">
                <i class="fa-solid fa-user-plus"></i>ADD Teacher</a>


            </li>
            <li>
              <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href=""><i class="fa-solid fa-user-pen"></i>Modify Teacher</a>


            </li>
            <li>
              <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href=""><i class="fa-solid fa-user-minus"></i>Delete Teacher</a>


            </li>
          </ul>
        </li>
        <li>
          <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="room.php">
            <i class="fa-solid fa-table-list"></i>
            <span>Room</span>
          </a>
          <ul class="dropdown">
            <li>
              <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="Addroom.html"><i class="fa-solid fa-user-plus"></i>ADD Room</a>

            </li>
            <li>
              <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href=""><i class="fa-solid fa-user-pen"></i>Modify Room</a>

            </li>
            <li>
              <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href=""><i class="fa-solid fa-user-minus"></i>Delete Room</a>

            </li>
          </ul>
        </li>
        <li>
          <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="assignment.php">
            <i class="fa-solid fa-clipboard-question"></i>
            <span>Assignments</span>
          </a>
          <ul class="dropdown">
            <li>
              <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="Addassignment.php"> <i class="fa-solid fa-user-plus"></i> ADD Assignment</a>

            </li>
            <li>
              <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="#"><i class="fa-solid fa-user-pen"></i>Modify Assignment</a>


            </li>
            <li>
              <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="#"><i class="fa-solid fa-user-minus"></i>Delete Assignment</a>

            </li>
          </ul>
        </li>
        <li>
          <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="index.html">
            <i class="fa-solid fa-clipboard-list"></i>
            <span>Room Report</span>
          </a>
        </li>
        <li>
          <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="index.html">
            <i class="fa-solid fa-clipboard-list"></i>
            <span>Teacher Report</span>
          </a>
        </li>
        <li>
          <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="index.html">
            <i class="fa-solid fa-table"></i>
            <span>Room Availability</span>
          </a>
        </li>
        <li>
          <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="index.html">
            <i class="fa-solid fa-arrow-up-right-dots"></i>
            <span>Most Used Room</span>
          </a>
        </li>
        <li>
          <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="export_pdf.php">
            <i class="fa-solid fa-right-to-bracket"></i>
            <span>Download PDF</span>
          </a>
        </li>
        <li>
          <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="index.html">
            <i class="fa-solid fa-person-circle-plus"></i>
            <span>Sign-Up</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="header finisher-header w-full p-relative ">
      <div class="icon1">
        <img class="icon-1" src="images/pngwing.com (1).png" alt="">
      </div>
      <div class="icon2">
        <img class="icon-2" src="images/pngwing.com (2).png" alt="">
      </div>
      <div class="iconscirc">
        <img class="icons-circ" src="images/circle-scatter-haikei.svg" alt="">
      </div>


      <div class="ADD-teacher-page p-relative">
        <div class="Information-boxes p-20 bg-white rad-10 m-60">
          <div class="content">
            <h1 style="text-align: center;">Assignment List</h1>

            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "teacher-room";

            // Create connection
            $connection = mysqli_connect($servername, $username, $password, $dbname);

            // Check connection
            if (!$connection) {
              die("Connection failed: " . mysqli_connect_error());
            }

            // Retrieve all assignments from the assignment table
            $assignmentQuery = "SELECT a.assignment_id, t.FirstLastname AS teacher_name, ts.day, ts.value AS schedule_value, r.room_name, r.machines AS room_machines
                    FROM assignment a
                    INNER JOIN teacher t ON a.teacher_id = t.id
                    INNER JOIN teacher_schedule ts ON a.schedule_id = ts.id
                    INNER JOIN room r ON a.room_id = r.room_id";
            $assignmentResult = mysqli_query($connection, $assignmentQuery);

            if (mysqli_num_rows($assignmentResult) > 0) {
              // Display the assignment information
              echo "<table style='width:85%;margin-left:110px;' class='Timetable-addteacher'>";
              echo "<tr>";
              echo "<td style='text-align: center;'>teacher_name</td>";
              echo "<td style='text-align: center;'>day</td>";
              echo "<td style='text-align: center;'>schedule_value</td>";
              echo "<td style='text-align: center;'>room_name</td>";
              echo "<td style='text-align: center;'>room_machines</td>";
              echo "<td style='text-align: center;'>Actions</td>";
              echo "</tr>";
              while ($row = mysqli_fetch_assoc($assignmentResult)) {
                echo "<tr>";
                echo "<td style='text-align: center;'>" . $row['teacher_name'] . "</td>";
                echo "<td style='text-align: center;'>" . $row['day'] . "</td>";
                echo "<td style='text-align: center;'>" . $row['schedule_value'] . "</td>";
                echo "<td style='text-align: center;'>" . $row['room_name'] . "</td>";
                echo "<td style='text-align: center;'>" . $row['room_machines'] . "</td>";
                echo "<td>";

                echo '<button style="border: 1px solid grey;border-radius:0;width:150px;height:40px;margin: 5px;px;margin-left:100px;background-color:#399AFE;cursor:pointer;color:white;" class="modify-delete-button" onclick="location.href=\'modify_assignment.php?id=' . $row['assignment_id'] . '\'">Modify</button>';
                echo '<button style="border: 1px solid grey;border-radius:0;width:150px;height:40px;background-color:crimson;color:white;cursor:pointer;margin-left:20px;" class="modify-delete-button" onclick="location.href=\'delete_assignment.php?id=' . $row['assignment_id'] . '\'">Delete</button>';
                echo "</td>";
                echo "</tr>";

                $assignmentTeacherQuery = "INSERT INTO assignment_teacher (teacher_name, day, schedule_value, room_name, room_machines) VALUES ('" . $row['teacher_name'] . "', '" . $row['day'] . "', '" . $row['schedule_value'] . "', '" . $row['room_name'] . "', '" . $row['room_machines'] . "')";
                mysqli_query($connection, $assignmentTeacherQuery);
              }
              echo "</table>";
            } else {
              echo "No rooms found.";
            }

            mysqli_close($connection);
            ?>


          </div>


        </div>
      </div>
    </div>
  </div>

  <script src="finisher-header.es5.min.js" type="text/javascript"></script>
  <script type="text/javascript">
    new FinisherHeader({
      "count": 12,
      "size": {
        "min": 1300,
        "max": 1500,
        "pulse": 0
      },
      "speed": {
        "x": {
          "min": 0.6,
          "max": 3
        },
        "y": {
          "min": 0.6,
          "max": 3
        }
      },
      "colors": {
        "background": "#398fe2",
        "particles": [
          "#1e9359",
          "#87ddfe",
          "#231efe",
          "#0affe6"
        ]
      },
      "blending": "overlay",
      "opacity": {
        "center": 1,
        "edge": 0
      },
      "skew": 0,
      "shapes": [
        "c"
      ]
    });
  </script>

  </div>

</body>

</html>