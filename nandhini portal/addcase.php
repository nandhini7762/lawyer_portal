<?php
session_start();

// Database connection details
$host = 'localhost';
$username = 'root'; // Change to your MySQL username
$password = ''; // Change to your MySQL password
$database = 'register'; // Change to your database name

// Create a connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
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

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input
    $fullName = sanitizeInput($_POST['fullName']);
    $phone = sanitizeInput($_POST['phone']);
    $email = sanitizeInput($_POST['email']);
    $address = sanitizeInput($_POST['address']);
    $dob = sanitizeInput($_POST['dob']);
    $gender = sanitizeInput($_POST['gender']);
    $occupation = sanitizeInput($_POST['occupation']);
    $maritalStatus = sanitizeInput($_POST['maritalStatus']);
    $emergencyContact = sanitizeInput($_POST['emergencyContact']);
    $emergencyPhone = sanitizeInput($_POST['emergencyPhone']);
    $caseTitle = sanitizeInput($_POST['caseTitle']);
    $caseType = sanitizeInput($_POST['caseType']);
    $caseDescription = sanitizeInput($_POST['caseDescription']);
    $caseNumber = sanitizeInput($_POST['caseNumber']);
    $incidentDate = sanitizeInput($_POST['incidentDate']);
    $registrationDate = sanitizeInput($_POST['registrationDate']);
    $opposingParty = sanitizeInput($_POST['opposingParty']);
    $courtName = sanitizeInput($_POST['courtName']);
    $hearingDate = sanitizeInput($_POST['hearingDate']);
    $judgeName = sanitizeInput($_POST['judgeName']);
    $jurisdiction = sanitizeInput($_POST['jurisdiction']);
    $lawyerassigned = sanitizeInput($_POST['lawyerName']);
    $lawyercon = sanitizeInput($_POST['lawyerContact']);
    $specialRequests = sanitizeInput($_POST['specialRequests']);
    $notes = sanitizeInput($_POST['notes']);
    $signatureDate = sanitizeInput($_POST['signatureDate']);

    // Validate required fields
    if (empty($phone) || empty($email)) {
        echo "<script>alert('Please fill in all required fields.');</script>";
        exit;
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format.');</script>";
        exit;
    }

    // Prepare the SQL statement
    $query = "INSERT INTO case_reg (fullname, phone, email, address, dob, gender, occupation, maritalstatus, 
        emercontact, emerconname, casetitle, casetype, casedesc, 
        casenum, DOI, DOCR, oppparty, courtname, 
        caseheardate, judge, jurisdiction, lawyerassigned, lawyercon, specialreq, notes, 
        dateoa) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";

    // Prepare the statement
    if ($stmt = mysqli_prepare($conn, $query)) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, 'ssssssssssssssssssssssssss', $fullName, $phone, $email, $address, $dob, $gender, $occupation, $maritalStatus,
            $emergencyContact, $emergencyPhone, $caseTitle, $caseType, $caseDescription, $caseNumber, $incidentDate, $registrationDate, $opposingParty, 
            $courtName, $hearingDate, $judgeName, $jurisdiction, $lawyerassigned, $lawyercon, $specialRequests, $notes, $signatureDate);

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
    <title>Client Case Registration Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

 <style>

body {
    font-family: 'Roboto', sans-serif;
    background-color: #e9ecef;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh; /* Ensure full viewport height */
}

.container {
    max-width: 800px; /* Adjust max width for larger screens */
    width: 100%;
    margin: 20px;
    background: #fff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    color: #333;
    margin-bottom: 30px;
    font-size: 24px;
    font-weight: 600;
}

form {
    display: flex;
    flex-direction: column;
}

fieldset {
    border: 1px solid #ddd;
    margin-bottom: 20px;
    padding: 20px;
    border-radius: 8px;
    background-color: #f8f9fa;
}

legend {
    font-weight: 700;
    color: #007BFF;
    padding: 0 10px;
    font-size: 18px;
}

label {
    display: block;
    margin-bottom: 8px;
    color: #555;
    font-weight: 500;
}

input[type="text"],
input[type="tel"],
input[type="email"],
input[type="date"],
input[type="file"],
select,
textarea {
    width: 100%;
    padding: 12px;
    margin-bottom: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    transition: border-color 0.3s ease;
}

input[type="text"]:focus,
input[type="tel"]:focus,
input[type="email"]:focus,
input[type="date"]:focus,
input[type="file"]:focus,
select:focus,
textarea:focus {
    border-color: #007BFF;
    outline: none;
}

textarea {
    resize: vertical;
    min-height: 100px;
}

input[type="checkbox"] {
    margin-right: 10px;
    transform: scale(1.2);
    margin-top: 5px;
}

button[type="submit"] {
    width: 100%;
    padding: 14px;
    background-color: #007BFF;
    border: none;
    border-radius: 4px;
    color: white;
    font-size: 18px;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
    background-color: #0056b3;
}

/* Responsive Styles */
@media (max-width: 1200px) {
    .container {
        max-width: 90%;
        padding: 20px;
    }

    h2 {
        font-size: 22px;
    }

    legend {
        font-size: 16px;
    }

    button[type="submit"] {
        font-size: 16px;
    }
}

@media (max-width: 768px) {
    .container {
        max-width: 100%;
        padding: 15px;
    }

    h2 {
        font-size: 20px;
    }

    legend {
        font-size: 14px;
    }

    button[type="submit"] {
        font-size: 14px;
        padding: 12px;
    }

    input[type="text"],
    input[type="tel"],
    input[type="email"],
    input[type="date"],
    input[type="file"],
    select,
    textarea {
        font-size: 14px;
    }
}

@media (max-width: 480px) {
    .container {
        padding: 10px;
    }

    h2 {
        font-size: 18px;
    }

    legend {
        font-size: 12px;
    }

    button[type="submit"] {
        font-size: 12px;
        padding: 10px;
    }

    input[type="text"],
    input[type="tel"],
    input[type="email"],
    input[type="date"],
    input[type="file"],
    select,
    textarea {
        font-size: 12px;
    }
}


</style>


</head>
<body>
    <div class="container">
        <h2>Client Case Registration Form</h2>
        <form action="#" method="POST">
            <!-- Client Information -->
            <fieldset>
                <legend>Client Information</legend>
                <label for="fullName">Full Name:</label>
                <input type="text" id="fullName" name="fullName" required>

                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" required>

                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" required>

                <label for="address">Mailing Address:</label>
                <textarea id="address" name="address" required></textarea>

                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" required>

                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>

                <label for="occupation">Occupation:</label>
                <input type="text" id="occupation" name="occupation" required>

                <label for="maritalStatus">Marital Status:</label>
                <select id="maritalStatus" name="maritalStatus" required>
                    <option value="single">Single</option>
                    <option value="married">Married</option>
                    <option value="divorced">Divorced</option>
                    <option value="widowed">Widowed</option>
                </select>

                <label for="emergencyContact">Emergency Contact Name:</label>
                <input type="text" id="emergencyContact" name="emergencyContact" required>

                <label for="emergencyPhone">Emergency Contact Phone:</label>
                <input type="tel" id="emergencyPhone" name="emergencyPhone" required>
            </fieldset>

            <!-- Case Information -->
            <fieldset>
                <legend>Case Information</legend>
                <label for="caseTitle">Case Title/Name:</label>
                <input type="text" id="caseTitle" name="caseTitle" required>

                <label for="caseType">Case Type:</label>
                <select id="caseType" name="caseType" required>
                    <option value="criminal">Criminal</option>
                    <option value="civil">Civil</option>
                    <option value="family">Family</option>
                    <option value="corporate">Corporate</option>
                </select>

                <label for="caseDescription">Case Description:</label>
                <textarea id="caseDescription" name="caseDescription" required></textarea>

                <label for="caseNumber">Case Number (if available):</label>
                <input type="text" id="caseNumber" name="caseNumber">

                <label for="incidentDate">Date of Incident/Dispute:</label>
                <input type="date" id="incidentDate" name="incidentDate" required>

                <label for="registrationDate">Date of Case Registration:</label>
                <input type="date" id="registrationDate" name="registrationDate" required>

                <label for="opposingParty">Opposing Party Name:</label>
                <input type="text" id="opposingParty" name="opposingParty" required>

                <label for="courtName">Court Name (if applicable):</label>
                <input type="text" id="courtName" name="courtName">

                <label for="hearingDate">Case Hearing Date (if applicable):</label>
                <input type="date" id="hearingDate" name="hearingDate">

                <label for="judgeName">Judge's Name (if applicable):</label>
                <input type="text" id="judgeName" name="judgeName">

                <label for="jurisdiction">Jurisdiction:</label>
                <input type="text" id="jurisdiction" name="jurisdiction" required>

            </fieldset>

            <!-- Legal Representation -->
            <fieldset>
                <legend>Legal Representation</legend>
                <label for="lawyerName">Lawyer Assigned:</label>
                <input type="text" id="lawyerName" name="lawyerName" required>

                

                <label for="lawyerContact">Lawyer’s Contact Information:</label>
                <input type="tel" id="lawyerContact" name="lawyerContact" required>

               

            
            </fieldset>

            <!-- Additional Information -->
            <fieldset>
                <legend>Additional Information</legend>
                <label for="specialRequests">Special Requests or Considerations:</label>
                <textarea id="specialRequests" name="specialRequests"></textarea>

                <label for="notes">Notes:</label>
                <textarea id="notes" name="notes"></textarea>
            </fieldset>

            <!-- Consent and Acknowledgment -->
            <fieldset>
              

                

                <label for="signatureDate">Date:</label>
                <input type="date" id="signatureDate" name="signatureDate" required>
            </fieldset>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
