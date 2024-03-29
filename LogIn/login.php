<?php
// login.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "infinity";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

// Prepare and execute SQL query to check if email and password match
$sql = "SELECT * FROM admin WHERE Email='$email' AND Password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Login successful
    echo "
    <div class='container'>
    <div class='alert alert-success' role='alert'>
    <h4 class='alert-heading'>Verify Successful!</h4>
    <p>Your Email and password have been verified successfully.</p>
    <hr>
   
    <p>Enter OTP to continue</p>
  
    <button type='button' class='btn btn-outline-primary' id='SentBtn'>Send OTP</button>
    <input type='text'  class='OtpField' placeholder='Enter OTP'>
    <button type='button' class='btn btn-outline-primary' id='verify'>Verify OTP</button>

  </div>
  </div>";
    // Redirect to a new page or perform other actions after successful login
} else {
    // Login failed
    echo "
    <div class='container'>
    <div class='alert alert-danger' role='alert' id='alert'>
    <p>Your Email and password are incorrect. Please try again with correct details.</p>
     <a href='index.php'  class='btn btn-outline-primary'>Back to Login Page</a>
   </div>
   </div>
  ";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In Verify</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style> 
.container{
    display: flex;
    align-items: center;
    justify-content: center;
    height:100vh;
}
#alert{
    display: grid;
    place-items: center;
}
.OtpField{
    outline: none;
    height:38px;
    margin-top: 4px;
    width: 50%;
    padding:0px 20px;
    border:1px solid  rgb(54, 90, 148);
    border-radius: 5px;
}
</style>
<body>
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script>
        var OtpBtn = document.getElementById('SentBtn');
        var Verify = document.getElementById('verify');
        var OtpField = document.querySelector('.OtpField');
        var generatedOtp;

        function sendOtp() {
            var email = "<?php echo $_POST['email']; ?>";
            generatedOtp = Math.floor(1000 + Math.random() * 9000);

            Email.send({
                SecureToken: "9bb57986-3250-489c-8882-78e2e2fbd04b",
                To: email,
                From: "teamcollab42@gmail.com",
                Subject: "Otp Alert",
                Body: "Your OTP is " + generatedOtp
            }).then(function (message) {
                if (message === "OK") {
                    alert("OTP Sent to your email: " + email);
                    console.log(generatedOtp);
                }
            });
        }

        OtpBtn.addEventListener('click', sendOtp);

        Verify.addEventListener('click', function () {
            var enteredOtp = OtpField.value.trim();
            if (enteredOtp === '') {
                alert("Please enter the OTP.");
                return;
            }

            if (enteredOtp === generatedOtp.toString()) {
                alert("Otp Matched");
                window.location = 'http://localhost/editnavigation/';
            } else {
                alert("Otp doesn't Match. Try Again!");
            }
        });
    </script>
</body>
</html>
