<?php include_once '_DB.php'; ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/P2.css">
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="manifest" href="img/site.webmanifest">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <title>KGrader</title>
</head>

<body>


    <!-- Init PHP Code -->
    <?php

    // GET DB ROWS AND STORE ASSOC ARRAY
    $sql_query = "SELECT * FROM Students ORDER BY LNAME ASC"; // Query Var
    $sql_serv_request = $serv_conn->query($sql_query); // Result of Query 
    $data = array(); // Holds the result of the query
    if (mysqli_num_rows($sql_serv_request) > 0) {
        while ($db_row = mysqli_fetch_assoc($sql_serv_request)) {
            $data[] = $db_row;
        }
    } else {
        echo "?";
    }

    $serv_conn;

    //  CHECK GET STATUS
    $get_empty = empty($_GET);


    // GENERATE GRADE FUNCTION
    function getGrade($grade)
    {
        if ($grade >= 93 && $grade <= 100) {
            return "A";
        } else if ($grade >= 90 && $grade <= 92) {
            return "A-";
        } else if ($grade >= 87 && $grade <= 89) {
            return "B+";
        } else if ($grade >= 83 && $grade <= 86) {
            return "B";
        } else if ($grade >= 80 && $grade <= 82) {
            return "B-";
        } else if ($grade >= 77 && $grade <= 79) {
            return "C+";
        } else if ($grade >= 73 && $grade <= 76) {
            return "C";
        } else if ($grade >= 70 && $grade <= 72) {
            return "C-";
        } else if ($grade >= 67 && $grade <= 69) {
            return "D+";
        } else if ($grade >= 63 && $grade <= 66) {
            return "D";
        } else if ($grade >= 60 && $grade <= 62) {
            return "D-";
        } else {
            return "F";
        }
    }



    ?>




    <header id="main-header">
        <h1 class="bg-header"><span class="bg-header-text">K</span>Gr<span class="bg-header-text" id="bg-header-special">æ</span>dr</h1>
        <h4 class="sm-header">A grading web-app that <span class="sm-header-text">works</span></h4>
    </header>

    <main class="main-content">
        <div class="container">
            <div class="student-view">
                <div class="table-container" id="table-container">
                    <!-- PHP Table -->
                    <?php

                    echo "<table class = 'students-table' id = 'students-table'><tr><th class = 'table-heading' colspan = '3'>
Student List </th></tr>";

                    foreach ($data as $row => $rows) {
                        echo "<tr>";
                        echo '<td>' . $rows["STUDENT_ID"] . '</td><td>' . $rows["LNAME"] . '</td>';
                        echo "<td class='data-link'>View details" . '   <i class="far fa-arrow-alt-circle-right detail-link" onclick="viewStudent(event)"></i></td></tr>';
                    }

                    echo "</table>";

                    ?>

                </div>
            </div>
            <?php if (!$get_empty) {
            ?> <div class="student-details">

                    <div class="details-container">
                        <!-- MAKE DETAIL TABLE -->
                        <?php
                        if (!$get_empty) {
                            $sid = $_GET["sid"];
                            echo "<table class='detail-table'>";
                            foreach ($data as $row => $rows) {
                                if ($rows["STUDENT_ID"] === $sid) {
                                    echo "<tr><td colspan='2' class='img-container'>
                               " . '<img src="data:image/jpg;charset-utf8;base64, ' . base64_encode($rows["IMG"]) . '"/></td></tr>';
                                    echo "<tr><td colspan='2' class='detail-title'>" . strtok($rows["FNAME"], " ") . "'s <span class='student-details-title'>DETAILS:</span></td></tr>";
                                    echo "<tr><td class='column-title'>Student Number:</td><td>" . $rows["STUDENT_ID"] . "</td></tr>";
                                    echo "<tr><td class='column-title'>Name:</td><td><span class='last-name'>" . $rows["LNAME"] . "</span>, " . $rows["FNAME"] . " " . substr($rows["MNAME"], 0, 1) . ".</td></tr>";
                                    echo "<tr><td class='column-title'>Grade:</td><td>" . $rows["GRADE"] . "</td></tr>";
                                    echo "<tr><td class='column-title'>Rank:</td><td>" . getGrade($rows["GRADE"]) . "</td></tr>";
                                    echo "<tr><td class='column-title'>Program:</td><td>" . $rows["PROGRAM"] . "</td></tr>";
                                    echo "<tr><td class='column-title'>Section:</td><td>" . $rows["SECTION"] . "</td></tr>";
                                    echo "<tr><td class='column-title'>Year Level:</td><td>" . $rows["LEVEL"] . "</td></tr>";
                                    echo "<tr><td class='column-title'>Campus:</td><td>" . $rows["CAMPUS"] . "</td></tr>";
                                }
                            }
                        }
                        ?>

                    </div>

                </div>
            <?php  } ?>
        </div>
    </main>
    <script src="../js/P2.js"></script>
</body>

</html>