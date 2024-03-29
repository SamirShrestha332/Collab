function sendOtp(){
    var email=document.getElementById("email").value;
    var password=document.getElementById("password").value;

    var Otp=Math.floor(1000 + Math.random() * 9000);

    Email.send({
      SecureToken : "de825683-5360-4e76-bf4c-f2c9bdcb6da0",
      To :email,
      From : "infinity19212@gmail.con",
      Subject : "Otp Alert",
      Body : "Your OTP is "+Otp
  }).then(
    message => {
    if(message == "OK"){
      alert("OTP Sent to your email: "+email);
      console.log(Otp)
    }
    
    
    });
  }


