<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Display</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #e9ecef;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        h1 {
            text-align: center;
            margin: 20px;
            font-size: 24px;
            color: #333;
        }

        .table-container {
            width: 100%;
            overflow-x: auto; /* Enable horizontal scrolling for the table */
            padding: 0 10px; /* Add some padding to prevent the table from touching the edges */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 16px;
            text-align: left;
        }

        table, th, td {
            border: 1px solid #dddddd;
        }

        th, td {
            padding: 12px;
            text-align: center;
            overflow-wrap: break-word; /* Wrap long words */
        }

        th {
            background-color: #f2f2f2;
            color: #333333;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        a {
            text-decoration: none;
            color: blue;
            font-size: 16px;
            font-weight: bold;
            padding: 10px 20px;
            border: 2px solid blue;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        a:hover {
            background-color: blue;
            color: white;
        }

        .center-link {
            display: flex;
            flex-wrap: wrap; /* Wrap links if necessary */
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        /* Responsive Styles */
        @media (max-width: 10000px) {
            table {
                font-size: 14px;
            }
            
            a {
                font-size: 14px;
            }
        }

        @media (max-width: 768px) {
            table {
                font-size: 12px;
            }

            th, td {
                padding: 10px;
            }

            a {
                font-size: 12px;
                padding: 8px 16px;
            }

            h1 {
                font-size: 20px;
            }
        }

        @media (max-width: 480px) {
            table {
                font-size: 10px;
            }

            a {
                font-size: 10px;
                padding: 6px 12px;
            }

            h1 {
                font-size: 18px;
            }
        }
    </style>
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "register";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query
    $sql = "SELECT fullname, phone, email, address, dob, gender, occupation, maritalstatus, 
            emercontact, emerconname, casetitle, casetype, casedesc, 
            casenum, DOI, DOCR, oppparty, courtname, 
            caseheardate, judge, jurisdiction, lawyerassigned, lawyercon, specialreq, notes, 
            dateoa FROM case_reg";
    $result = $conn->query($sql);
    ?>

    <h1>Client Information</h1>

    <div class="table-container">
        <?php
        if ($result->num_rows > 0) {
            echo "<table>
                <tr>
                    <th>Fullname</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Date Of Birth</th>
                    <th>Gender</th>
                    <th>Occupation</th>
                    <th>Marital Status</th>
                    <th>Emergency Contact</th>
                    <th>Emergency Phone</th>
                    <th>Case Title</th>
                    <th>Case Type</th>
                    <th>Case Description</th>
                    <th>Case Number</th>
                    <th>Incident Date</th>
                    <th>Registration Date</th>
                    <th>Opposing Party</th>
                    <th>Court Name</th>
                    <th>Hearing Date</th>
                    <th>Judge Name</th>
                    <th>Jurisdiction</th>
                    <th>Lawyer Assigned</th>
                    <th>Lawyer Contact</th>
                    <th>Special Request</th>
                    <th>Notes</th>
                    <th>Signature Date</th>
                </tr>";

            // Loop through each row of data
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . htmlspecialchars($row["fullname"]) . "</td>
                    <td>" . htmlspecialchars($row["phone"]) . "</td>
                    <td>" . htmlspecialchars($row["email"]) . "</td>
                    <td>" . htmlspecialchars($row["address"]) . "</td>
                    <td>" . htmlspecialchars($row["dob"]) . "</td>
                    <td>" . htmlspecialchars($row["gender"]) . "</td>
                    <td>" . htmlspecialchars($row["occupation"]) . "</td>
                    <td>" . htmlspecialchars($row["maritalstatus"]) . "</td>
                    <td>" . htmlspecialchars($row["emercontact"]) . "</td>
                    <td>" . htmlspecialchars($row["emerconname"]) . "</td>
                    <td>" . htmlspecialchars($row["casetitle"]) . "</td>
                    <td>" . htmlspecialchars($row["casetype"]) . "</td>
                    <td>" . htmlspecialchars($row["casedesc"]) . "</td>
                    <td>" . htmlspecialchars($row["casenum"]) . "</td>
                    <td>" . htmlspecialchars($row["DOI"]) . "</td>
                    <td>" . htmlspecialchars($row["DOCR"]) . "</td>
                    <td>" . htmlspecialchars($row["oppparty"]) . "</td>
                    <td>" . htmlspecialchars($row["courtname"]) . "</td>
                    <td>" . htmlspecialchars($row["caseheardate"]) . "</td>
                    <td>" . htmlspecialchars($row["judge"]) . "</td>
                    <td>" . htmlspecialchars($row["jurisdiction"]) . "</td>
                    <td>" . htmlspecialchars($row["lawyerassigned"]) . "</td>
                    <td>" . htmlspecialchars($row["lawyercon"]) . "</td>
                    <td>" . htmlspecialchars($row["specialreq"]) . "</td>
                    <td>" . htmlspecialchars($row["notes"]) . "</td>
                    <td>" . htmlspecialchars($row["dateoa"]) . "</td>
                </tr>";
            }

            echo "</table>";
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </div>

    <div class="center-link">
        <a href="addcase.php">Add Cases</a>
        <a href="home.php">Back to Home</a>
        <a href="index.php">Log Out</a>
    </div>

</body>
</html>
