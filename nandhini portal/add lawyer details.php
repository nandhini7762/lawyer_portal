<?php
session_start();
$host = 'localhost';
$username = 'root'; // Change to your MySQL username
$password = ''; // Change to your MySQL password
$database = 'register'; // Change to your database name

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Function to sanitize input
function sanitizeInput($data) {
    return htmlspecialchars(trim($data));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input
    $advocatecode = sanitizeInput($_POST['code-cis']);
    $courtcomplex = sanitizeInput($_POST['court-complex']);
    $sta = sanitizeInput($_POST['state']);
    $cou = sanitizeInput($_POST['country']);
    $name = sanitizeInput($_POST['advocate-name']);
    $gen = sanitizeInput($_POST['gender']);
    $barcouncil = sanitizeInput($_POST['bar-council-reg']);
    $offadd = sanitizeInput($_POST['office-address']);
    $offnum = sanitizeInput($_POST['office-number']);
    $mail = sanitizeInput($_POST['mail-id']);
    $fax = sanitizeInput($_POST['fax-number']);

    // Validate required fields
    if (empty($advocatecode) || empty($mail)) {
        echo "<script>alert('Please fill in all required fields.');</script>";
        exit;
    }

    // Validate email
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format.');</script>";
        exit;
    }

    // Prepare the SQL statement
    $query = "INSERT INTO lawyer_reg (cis_code, courtcomplex, sta, country, advocate, gender, bar, offaddress, offnumber, mail, fax) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare the statement
    if ($stmt = mysqli_prepare($conn, $query)) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, 'sssssssssss', $advocatecode, $courtcomplex, $sta, $cou, $name, $gen, $barcouncil, $offadd, $offnum, $mail, $fax);
        
        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Success: The details were successfully registered.');</script>";
        } else {
            echo "<script>alert('Error: Could not execute the query. " . mysqli_stmt_error($stmt) . "');</script>";
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('Error: Could not prepare the query. " . mysqli_error($conn) . "');</script>";
    }

    // Close the connection
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advocate Registration Form</title>
    <style>
       body {
    background: white;
    font-family: sans-serif;
    height: 100%;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
}

.form-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    padding: 20px;
}

.form-container {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    width: 100%;
    max-width: 600px; /* Max width for larger screens */
    height: auto; /* Adjust height to auto to accommodate content */
    overflow-y: auto; /* Allow scrolling if content overflows */
}

h1 {
    margin-bottom: 20px;
    font-size: 24px;
    color: #007BFF;
    text-align: center; /* Center the heading */
}

form {
    display: grid;
    gap: 15px;
}

label {
    font-weight: bold;
}

input[type="text"],
input[type="tel"],
input[type="email"],
textarea,
select {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

textarea {
    resize: vertical;
}

button {
    background-color: #007BFF;
    color: #fff;
    border: none;
    padding: 10px 15px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    width: 100%; /* Make the button full width on smaller screens */
}

button:hover {
    background-color: #0056b3;
}

/* Responsive Styles */
@media (max-width: 768px) {
    .form-container {
        padding: 15px;
    }

    h1 {
        font-size: 20px;
    }

    button {
        padding: 12px 0; /* Adjust button padding for smaller screens */
    }
}

@media (max-width: 480px) {
    .form-container {
        padding: 10px;
        width: 100%; /* Full width on very small screens */
        max-width: none; /* Remove max-width constraint */
    }

    h1 {
        font-size: 18px;
    }

    button {
        padding: 10px;
    }
}

    </style>
</head>
<body>
    
    <div class="form-wrapper">
        <div class="form-container">
            <h1>Advocate Registration Form</h1>
            <form method="POST">
                <label for="code-cis">Advocate Code in CIS:</label>
                <input type="text" id="code-cis" name="code-cis" required>

                <label for="court-complex">Name of Court Complex:</label>
                <input type="text" id="court-complex" name="court-complex" required>

                <label for="state">Name of State:</label>
                <input type="text" id="state" name="state" required>

                <label for="country">Country:</label>
                <input type="text" id="country" name="country" required>

                <label for="advocate-name">Name of Advocate:</label>
                <input type="text" id="advocate-name" name="advocate-name" required>

                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>

                <label for="bar-council-reg">Bar Council Registration:</label>
                <input type="text" id="bar-council-reg" name="bar-council-reg" required>

                <label for="office-address">Office Address:</label>
                <textarea id="office-address" name="office-address" rows="4" required></textarea>

                <label for="office-number">Office Number:</label>
                <input type="tel" id="office-number" name="office-number" required>

                <label for="mail-id">Mail ID:</label>
                <input type="email" id="mail-id" name="mail-id" required>

                <label for="fax-number">Fax Number:</label>
                <input type="text" id="fax-number" name="fax-number" pattern="\d*" title="Please enter only numbers">

                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    
</body>

</html>

