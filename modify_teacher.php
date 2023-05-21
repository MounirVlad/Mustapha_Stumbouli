<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teacher-room";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the form data
  $teacherId = $_POST["id"];
  $FirstLastname = $_POST['FirstLastname'];
  $Email = $_POST['Email'];
  $Phone = $_POST['Phone'];
  $BestTime = $_POST['BestTime'];
  $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
  $DateofBirth = $_POST['DateofBirth'];
  $wilaya = isset($_POST['wilaya']) ? $_POST['wilaya'] : '';
  $Baladia = $_POST['Baladia'];
  $University = $_POST['University'];
  $Role = isset($_POST['Role']) ? $_POST['Role'] : '';
  $Number_students = $_POST['Number_students'];

  // Update the teacher's information in the database
  $query = "UPDATE teacher SET FirstLastname='$FirstLastname', Email='$Email', Phone='$Phone', BestTime='$BestTime', gender='$gender', DateofBirth='$DateofBirth', Baladia='$Baladia', wilaya='$wilaya', University='$University', Rolle='$Role', Number_students='$Number_students' WHERE id=$teacherId";
  $result = mysqli_query($conn, $query);
  if ($result) {
    header("Location: teacher.php");
    exit();
  } else {
    echo "Update failed.";
  }
} else if (isset($_GET['id'])) {
  $teacherId = $_GET['id'];
  $query = "SELECT * FROM teacher WHERE id = $teacherId";
  $result = mysqli_query($conn, $query);
  if ($result && mysqli_num_rows($result) > 0) {
    $teacher = mysqli_fetch_assoc($result); ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Teacher</title>
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
                <h2 class="mt-0 mb-10 ffOS">Modify Teacher</h2>
                <p class="mt-0 mb-20 c-grey  fs-15">Modify teacher information's</p>
                <form method="POST" action="">

                  <table>
                    <tr>
                      <td>
                        <div class="focus-icon d-flex align-center mb-15 m-20">
                          <input type="hidden" name="id" value="<?php echo $teacher['id']; ?>">
                          <i class="fa-solid fa-user p-10 c-grey"></i>
                          <input class="w-full" type="text" name="FirstLastname" value="<?php echo $teacher['FirstLastname']; ?>">
                        </div>
                      </td>
                      <td colspan="6">
                        <div class="focus-icon d-flex align-center mb-15 m-20">
                          <i class="fa-regular fa-envelope p-10 c-grey"></i>
                          <input class="w-full" type="Email" name="Email" value="<?php echo $teacher['Email']; ?>">
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="focus-icon d-flex align-center mb-15 m-20">
                          <i class="fa-solid fa-phone p-10 c-grey"></i>
                          <input class="w-full" type="tel" name="Phone" value="<?php echo $teacher['Phone']; ?>">
                        </div>
                      </td>
                      <td colspan="6">
                        <div class="focus-icon d-flex align-center mb-15 m-20">
                          <i class="fa-solid fa-hourglass p-10 c-grey"></i>
                          <input class="w-full c-grey" type="time" name="BestTime" value="<?php echo $teacher['BestTime']; ?>">
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="focus-icon d-flex align-center mb-15 m-20">
                          <i class="fa-solid fa-venus-mars p-10 c-grey"></i>
                          <select class="w-full c-grey" name="gender" id="gender" value="<?php echo $teacher['gender']; ?>">
                            <option value="" disabled selected>Select Gender</option>
                            <option value="1">Man</option>
                            <option value="2">Woman</option>
                          </select>
                        </div>
                      </td>
                      <td colspan="6">
                        <div class="focus-icon d-flex align-center mb-15 m-20">
                          <i class="fa-solid fa-calendar-days p-10 c-grey"></i>
                          <input class="w-full c-grey" type="date" name="DateofBirth" value="<?php echo $teacher['DateofBirth']; ?>">
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="focus-icon d-flex align-center mb-15 m-20">
                          <i class="fa-solid fa-earth-africa p-10 c-grey"></i>
                          <select class="w-full c-grey" id="wilaya" name="wilaya" value="<?php echo $teacher['wilaya']; ?>">
                            <option value="" disabled selected>Select a wilaya</option>
                            <option value="1">Adrar</option>
                            <option value="2">Chlef</option>
                            <option value="3">Laghouat</option>
                            <option value="4">Oum El Bouaghi</option>
                            <option value="5">Batna</option>
                            <option value="6">Béjaïa</option>
                            <option value="7">Biskra</option>
                            <option value="8">Béchar</option>
                            <option value="9">Blida</option>
                            <option value="10">Bouira</option>
                            <option value="11">Tamanrasset</option>
                            <option value="12">Tébessa</option>
                            <option value="13">Tlemcen</option>
                            <option value="14">Tiaret</option>
                            <option value="15">Tizi Ouzou</option>
                            <option value="16">Alger</option>
                            <option value="17">Djelfa</option>
                            <option value="18">Jijel</option>
                            <option value="19">Sétif</option>
                            <option value="20">Saïda</option>
                            <option value="21">Skikda</option>
                            <option value="22">Sidi Bel Abbès</option>
                            <option value="23">Annaba</option>
                            <option value="24">Guelma</option>
                            <option value="25">Constantine</option>
                            <option value="26">Médéa</option>
                            <option value="27">Mostaganem</option>
                            <option value="28">M'Sila</option>
                            <option value="29">Mascara</option>
                            <option value="30">Ouargla</option>
                            <option value="31">Oran</option>
                            <option value="32">El Bayadh</option>
                            <option value="33">Illizi</option>
                            <option value="34">Bordj Bou Arreridj</option>
                            <option value="35">Boumerdès</option>
                            <option value="36">El Tarf</option>
                            <option value="37">Tindouf</option>
                            <option value="38">Tissemsilt</option>
                            <option value="39">El Oued</option>
                            <option value="40">Khenchela</option>
                            <option value="41">Souk Ahras</option>
                            <option value="42">Tipaza</option>
                            <option value="43">Mila</option>
                            <option value="44">Aïn Defla</option>
                            <option value="45">Naâma</option>
                            <option value="46">Aïn Témouchent</option>
                            <option value="47">Ghardaïa</option>
                            <option value="48">Relizane</option>
                          </select>
                        </div>

                      </td>
                      <td colspan="6">
                        <div class="focus-icon d-flex align-center mb-15 m-20">
                          <i class="fa-solid fa-map p-10 c-grey"></i>
                          <input class="w-full" type="text" name="Baladia" value="<?php echo $teacher['Baladia']; ?>">
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="focus-icon d-flex align-center mb-15 m-20">
                          <i class="fa-solid fa-building p-10 c-grey"></i>
                          <input class="w-full" type="text" name="University" value="<?php echo $teacher['University']; ?>">
                        </div>
                      </td>
                      <td colspan="6">
                        <div class="focus-icon d-flex align-center mb-15 m-20">
                          <i class="fa-solid fa-user p-10 c-grey"></i>
                          <select class="w-full c-grey" name="Role" id="Role" value="<?php echo $teacher['Rolle']; ?>">
                            <option value="" disabled selected>Select Role</option>
                            <option value="1">Network</option>
                            <option value="2">Operating System</option>
                            <option value="3">Web Development</option>
                            <option value="4">Database</option>
                          </select>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <tfoot>
                        <td>
                          <div class="focus-icon d-flex align-center mb-15 m-20">
                            <i class="fa-solid fa-user p-10 c-grey"></i>
                            <input class="w-full" type="number" name="Number_students" value="<?php echo $teacher['Number_students']; ?>">
                        </td>
                        <td>
                          <label class="container-numbercheckbox">
                            <input type="checkbox" name="Group1" value="1">
                            <div class="numberstudent">1</div>
                          </label>
                        </td>
                        <td>
                          <label class="container-numbercheckbox">
                            <input type="checkbox" name="Group2" value="1">
                            <div class="numberstudent">2</div>
                          </label>
                        </td>
                        <td>
                          <label class="container-numbercheckbox">
                            <input type="checkbox" name="Group3" value="1">
                            <div class="numberstudent">3</div>
                          </label>
                        </td>
                        <td>
                          <label class="container-numbercheckbox">
                            <input type="checkbox" name="Group4" value="1">
                            <div class="numberstudent">4</div>
                          </label>
                        </td>
                        <td>
                          <label class="container-numbercheckbox">
                            <input type="checkbox" name="Group5" value="1">
                            <div class="numberstudent">5</div>
                          </label>
                        </td>
                        <td>
                          <label class="container-numbercheckbox"><input type="checkbox" name="Group6" value="1">
                            <div class="numberstudent">6</div>
                          </label>
                        </td>

                        </td>

                      </tfoot>
                    </tr>
                  </table>

                  <div class="buttons" style="top:-21px;margin-top:50px;">
                    <button type="submit" style="top: 0;left: 0;"><span></span>Update</button>
                    <button type="reset" name="insert" style="top: 0;left: 0;" onclick="reset();"><span></span>RESET</button>
                  </div>

                </form>
            <?php
          } else {
            echo "Teacher not found.";
          }
        } else {
          echo "Invalid request.";
        }

        // Close the database connection
        mysqli_close($conn);
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