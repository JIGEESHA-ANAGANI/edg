<?php
require_once 'db_connect.php'; // Ensure this file exists with proper credentials

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Validate inputs
        if(empty($_POST['name']) || empty($_POST['designation'])) {
            throw new Exception("All fields are required");
        }

        $stmt = $conn->prepare("INSERT INTO mentors 
            (name, designation, location, institute, student_assigned) 
            VALUES (?, ?, ?, ?, ?)");
        
        // Bind parameters with type checking
        $stmt->bind_param("ssssi", 
            $_POST['name'],
            $_POST['designation'],
            $_POST['location'],
            $_POST['institute'],
            $_POST['studentAssigned']
        );

        // Execute and verify
        if ($stmt->execute()) {
            $message = "✅ Mentor registered successfully!";
            // Redirect after success
            header("Location: success.php");
            exit();
        } else {
            throw new Exception("Database error: " . $stmt->error);
        }
        
    } catch (Exception $e) {
        error_log($e->getMessage()); // Log errors
        $message = "❌ Error: " . $e->getMessage();
    } finally {
        $stmt->close();
        $conn->close();
    }
}
?>


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="style.css">
  <title>Modern Login Page | AsmrProg</title>
</head>
<body>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

.form-container {
  background-color: white;
  padding: 20px;
  border-radius: 30px;
  box-shadow: 0 5px 15px rgba(50, 49, 49, 0.35);
  width: 400px;
  text-align: center;
}

body {
    background: url(images/slider_background.jpg) no-repeat center center;
    background-size: cover;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    height: 100vh;
}
body {
    background: linear-gradient(to right, rgba(215, 147, 30, 0.7), rgba(220, 195, 152, 0.7)), 
    url(images/slider_background.jpg) no-repeat center center;
    background-size: cover;
}
h1 {
  text-align: center;
  font-size: 24px;
}

label {
  font-weight: bold;
  margin-top: 10px;
  display: block;
}

input {
  width: 100%;
  padding: 10px;
  margin-top: 5px;
  margin-bottom: 15px;
  border: 1px solid #ddd;
  border-radius: 8px;
  font-size: 14px;
}

button {
  width: 100%;
  padding: 12px;
  background-color: rgb(218, 148, 43); /* Matching button color */
  color: #312e2e;
  font-size: 14px;
  font-weight: 600;
  cursor: pointer;
  border: none;
  border-radius: 8px;
  text-transform: uppercase;
  transition: 0.3s ease-in-out;
}

button:hover {
  background-color: #bb7b1e;
}

#output {
  margin-top: 20px;
  padding: 10px;
  background-color: #f9f9f9;
  border: 1px solid #ddd;
  border-radius: 4px;
  text-align: left;
}
</style>
<div class="form-container">
    <h1>Mentor Login Form</h1>
    <form id="facultyForm">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>

      <label for="designation">Designation:</label>
      <input type="text" id="designation" name="designation" required>

      <label for="location">Location:</label>
      <input type="text" id="location" name="location" required>

      <label for="institute">Institute Working:</label>
      <input type="text" id="institute" name="institute" required>

      <label for="studentAssigned">Student Assigned:</label>
      <input type="number" id="studentAssigned" name="studentAssigned" required>

      <button type="button" onclick="submitForm()">Submit</button>
    </form>

    <div id="output"></div>
  </div>

</body>

<script>
function submitForm() {
    // Get values from the form
    const name = document.getElementById("name").value;
    const designation = document.getElementById("designation").value;
    const location = document.getElementById("location").value;
    const institute = document.getElementById("institute").value;
    const studentAssigned = document.getElementById("studentAssigned").value;
  
    // Create the output HTML
    const output = `
      <h3>Faculty Details:</h3>
      <p><strong>Name:</strong> ${name}</p>
      <p><strong>Designation:</strong> ${designation}</p>
      <p><strong>Location:</strong> ${location}</p>
      <p><strong>Institute Working:</strong> ${institute}</p>
      <p><strong>Student Assigned:</strong> ${studentAssigned}</p>
    `;
  
    // Display the output on the page
    document.getElementById("output").innerHTML = output;
  
    // Reset the form
    document.getElementById("facultyForm").reset();
}
</script>
</html>
