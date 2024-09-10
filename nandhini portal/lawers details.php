<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT cis_code, courtcomplex, sta, country, advocate, gender, bar, offaddress, offnumber, mail, fax FROM lawyer_reg";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Display</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            text-align: center;
            margin: 20px;
            font-size: 24px;
            color: #333;
        }

        .table-container {
            width: 100%;
            max-width: 1200px; /* Limit maximum width */
            overflow-x: auto; /* Enable horizontal scroll */
            margin: 0 auto; /* Center table container */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 16px;
            text-align: left;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: center;
            overflow-wrap: break-word; /* Wrap long words */
        }

        th {
            background-color: #f2f2f2;
            color: #333;
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
            flex-wrap: wrap;
            justify-content: center;
            margin: 20px;
            gap: 20px;
        }

        @media (max-width: 768px) {
            table {
                font-size: 14px;
            }

            a {
                font-size: 14px;
                padding: 8px 16px;
            }

            h1 {
                font-size: 20px;
            }
        }

        @media (max-width: 480px) {
            table {
                font-size: 12px;
            }

            a {
                font-size: 12px;
                padding: 6px 12px;
            }

            h1 {
                font-size: 18px;
            }
        }
    </style>
</head>
<body>

    <h1>Below is the attorney's contact information</h1>

    <div class="table-container">
        <?php
        if ($result->num_rows > 0) {
            echo "<table>
                <tr>
                    <th>cis_code</th>
                    <th>courtcomplex</th>
                    <th>sta</th>
                    <th>country</th>
                    <th>advocate</th>
                    <th>gender</th>
                    <th>bar</th>
                    <th>offaddress</th>
                    <th>offnumber</th>
                    <th>mail</th>
                    <th>fax</th>
                </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . htmlspecialchars($row["cis_code"]) . "</td>
                    <td>" . htmlspecialchars($row["courtcomplex"]) . "</td>
                    <td>" . htmlspecialchars($row["sta"]) . "</td>
                    <td>" . htmlspecialchars($row["country"]) . "</td>
                    <td>" . htmlspecialchars($row["advocate"]) . "</td>
                    <td>" . htmlspecialchars($row["gender"]) . "</td>
                    <td>" . htmlspecialchars($row["bar"]) . "</td>
                    <td>" . htmlspecialchars($row["offaddress"]) . "</td>
                    <td>" . htmlspecialchars($row["offnumber"]) . "</td>
                    <td>" . htmlspecialchars($row["mail"]) . "</td>
                    <td>" . htmlspecialchars($row["fax"]) . "</td>
                </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No results found.</p>";
        }
        $conn->close();
        ?>
    </div>

    <div class="center-link">
        <a href="add lawyer details.php">Add Lawyer Details</a>
        <a href="home.php">Back to Home</a>
        <a href="index.php">Log Out</a>
    </div>

</body>
</html>
