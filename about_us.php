<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Rescue Agency Coordination System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 900px;
            margin: auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        h2 {
            color: #444;
        }
        p {
            line-height: 1.6;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        ul li {
            margin-bottom: 10px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #777;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Rescue Agency Coordination System</h1>
    <p>Welcome to the Rescue Agency Coordination System! This platform is designed to help registered rescue agencies collaborate efficiently during emergencies.</p>

    <h2>How to Use the System</h2>

    <h3>1. Logging In</h3>
    <ul>
        <li>Open the website and navigate to the <strong>Login Page</strong>.</li>
        <li>Enter your registered <strong>Username</strong> and <strong>Password</strong>.</li>
        <li>Click <strong>Login</strong> to access your dashboard.</li>
    </ul>

    <h3>2. Dashboard Overview</h3>
    <ul>
        <li>The <strong>Dashboard</strong> is your central hub for all activities.</li>
        <li>You will see <strong>Rescue Requests</strong>, <strong>Reports</strong>, and <strong>Alerts</strong>.</li>
        <li>Navigation links allow you to explore different sections easily.</li>
    </ul>

    <h3>3. Managing Rescue Requests</h3>
    <ul>
        <li>Go to the <strong>Rescue Requests Page</strong> to view active missions.</li>
        <li>Click <strong>Create New Request</strong> to report an incident.</li>
        <li>Update the status of ongoing missions as they progress.</li>
    </ul>

    <h3>4. Viewing and Contacting Agencies</h3>
    <ul>
        <li>Visit the <strong>Agency Directory</strong> to see a list of registered agencies.</li>
        <li>Click on an agency’s name to view their contact details and services.</li>
    </ul>

    <h3>5. Uploading and Accessing Documents</h3>
    <ul>
        <li>Navigate to the <strong>Documents Page</strong> to upload reports, rescue plans, or images.</li>
        <li>Click <strong>Upload</strong> and select the file from your device.</li>
        <li>Download shared documents whenever needed.</li>
    </ul>

    <h3>6. Receiving Alerts & Notifications</h3>
    <ul>
        <li>Check the <strong>Announcements & Alerts</strong> page for real-time updates.</li>
        <li>Critical alerts are displayed at the top of your dashboard.</li>
    </ul>

    <h3>7. Accessing Reports & Analytics</h3>
    <ul>
        <li>Go to the <strong>Reports Page</strong> to view statistics on rescue operations.</li>
        <li>Use charts and filters to analyze past and ongoing missions.</li>
    </ul>

    <h3>8. Getting Support</h3>
    <ul>
        <li>Visit the <strong>Contact & Support</strong> page for help.</li>
        <li>Use the contact form to submit queries.</li>
        <li>Reach out to the admin for technical support.</li>
    </ul>

    <div class="footer">
        <p>For further assistance, visit the <strong>Help & Support</strong> section or contact the admin.</p>
        <p>Thank you for using the <strong>Rescue Agency Coordination System</strong> to make rescue operations more efficient!</p>
    </div>
    <link rel="stylesheet" href="style.css">
</div><a href="dashboard.php" class="btn">Go to Dashboard</a>


</body>
</html>
