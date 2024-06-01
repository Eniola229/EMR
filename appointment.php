<?php
  include "includes/error_file.inc.php";
  include "classes/apply_for_appointment.classes.php";
?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="https://rccghealthcentre.com/assets/images/rccg-logo-121x121.png">
  <title>RHC Health Management</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">\
  
</head>
<body>
<style>
  body{
    color: #000;overflow-x: hidden;
    height: 100%;background-image: url("https://th.bing.com/th/id/R.b08af8a606b133db96e0f9b2fc74abf6?rik=OjOH07jniupi0A&pid=ImgRaw&r=0");
    background-repeat: no-repeat;
    background-size: 100% 100%
  }
    .card
    {
      padding: 30px 40px;
      margin-top: 60px;
      margin-bottom: 60px;
      border: none !important;
      box-shadow: 0 6px 12px 0 rgba(0,0,0,0.2)}
      .blue-text
      {
        color: #00BCD4
      }
      .form-control-label{margin-bottom: 0}
      input, textarea, button{padding: 8px 15px;
        border-radius: 5px !important;
        margin: 5px 0px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        font-size: 18px !important;
        font-weight: 300
      }
        input:focus, 
        textarea:focus{
          -moz-box-shadow: none !important;
          -webkit-box-shadow: none !important;
          box-shadow: none !important;
          border: 1px solid #00BCD4;outline-width: 0;
          font-weight: 400}.btn-block{text-transform: uppercase;
          font-size: 15px !important;
          font-weight: 400;
          height: 43px;cursor: pointer
        }
          .btn-block:hover{
            color: #fff !important
          }
          button:focus{
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            outline-width: 0
          }
    /* body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
    } */
    /* .card {
      border: none;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
    .card-header {
      background-color: darkgreen;
      color: #fff;
    }
    .card-body {
      padding: 20px;
    }
    .form-label {
      font-weight: bold;
    }
     */
    .btn-primary {
     background-color: #0056b3;
      border: none;
      color: white;
    }
   
    .btn-primary:hover {
      background-color: #0056b3;
    }
    .error-message {
      color: red;
      font-size: 14px;
      margin-top: 5px;
    } 
  </style>
<div class="container">


<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
           
            <form method="POST" action="includes/appointment.inc.php";   enctype="multipart/form-data" >
            <div class="card">
            <h3>Book An Appointment</h3>
             <?php
        if (isset($_GET['status'])) {
            $errorCode = htmlspecialchars($_GET['status']); // Sanitize input
            switch ($errorCode) {
                case 'stmtfailed':
                    echo '<p style="color: red; text-align: center;">An unexpected error occurred!</p>';
                    break;
                case 'emptyInput':
                    echo '<p style="color: red; text-align: center;">All fields with * are required!</p>';
                    break;
                case 'invalidEmail':
                    echo '<p style="color: red; text-align: center;">Invalid Email</p>';
                    break; 
                case 'passwordmatch':
                    echo '<p style="color: red; text-align: center;">Make sure Password And Confirm Password are the same</p>';
                    break; 
                case 'quafileuploaderror':
                  echo '<p style="color: red; text-align: center;">Erro Uploading Image! Ttry again later or check Network connection!</p>';
                    break; 
                case 'invalidfiletype':
                  echo '<p style="color: red; text-align: center;">Invalid Img Type! You can only Upload Img (Jpeg, JPG, PNG)</p>';
                    break; 
                case 'useroremailtaken':
                    echo '<p style="color: red; text-align: center;">Email Taken</p>';
                    break; 
                default:
                    // Log unrecognized error codes for debugging
                    error_log("Unrecognized error code: $errorCode");
                    echo '<p style="color: red; text-align: center;">An unexpected error occurred! Please try again later.</p>';
                    break;
            }
        } else {
            echo '<p style="color: red; text-align: center;">Kindly fill in your details correctly!</p>';
        }
        ?>

          <input type="text" name="dname" value="<?php echo $post['fname'] . " "  . $post['sname'] ?>" class="form-control" id="fname" hidden  required >
          <input type="text" name="demail" value="<?php echo $post['email']; ?>" class="form-control" id="fname" hidden  required >
          <input type="text" name="did" value="<?php echo $post['user_id']; ?>" class="form-control" id="fname" hidden  required >
            <div class="form-group d-flex justify-content-around">
                <div class="form-check">
                  <input  value="Mr" type="radio" name="title" id="flexRadioDefault1">
                  <label class="form-check-label"   for="flexRadioDefault1">Mr</label>
                </div>
                <div class="form-check">
                  <input  value="Mrs" type="radio" name="title" id="flexRadioDefault2">
                  <label class="form-check-label"  for="flexRadioDefault2">Mrs</label>
                </div>
                <div class="form-check">
                  <input  value="Doc" type="radio" name="title" id="flexRadioDefault3">
                  <label class="form-check-label"  for="flexRadioDefault3">Doc</label>
                </div>
                <div class="form-check">
                  <input  value="Prof" type="radio" name="title" id="flexRadioDefault4">
                  <label class="form-check-label"  for="flexRadioDefault4">Prof</label>
                </div>
      </div>
                    <div class="row justify-content-between text-left">
                     <div class="form-group col-sm-6 d-flex flex-column">
                        <label for="sname" class="form-label" style="align-self: flex-start;">Surname*</label>
                        <input 
                          type="text" 
                          name="sname" 
                          class="form-control" 
                          id="sname" 
                          required 
                          onblur="validate(1)"
                          aria-required="true"
                          aria-describedby="snameHelp"
                        >
                       
                      </div>


                     <div class="form-group col-sm-6 flex-column d-flex text-left">
                      <label for="fname" class="form-label" style="align-self: flex-start;">First Name*</label>
                      <input type="text" name="fname" class="form-control" id="fname" required onblur="validate(2)">
                    </div>

                    <div class="form-group col-sm-6 flex-column d-flex text-left">
                      <label for="fname" class="form-label" style="align-self: flex-start;">Other Name*</label>
                      <input type="text" name="mname" class="form-control" id="mname" required onblur="validate(2)">
                    </div>

                    <div class="form-group col-sm-6 flex-column d-flex col-md-6 text-left">
                      <label for="email" class="form-label" style="align-self: flex-start;">E-mail*</label>
                      <input type="email" name="email" class="form-control" id="email" required onblur="validate(3)">
                    </div>

                    <div class="form-group col-sm-6 flex-column d-flex col-md-6 text-left">
                      <label for="street_add" class="form-label" style="align-self: flex-start;">Home Address*</label>
                      <input type="text" name="street_add" class="form-control" id="street_add" required onblur="validate(4)">
                    </div>

                    <div class="form-group col-sm-6 flex-column d-flex col-md-6 text-left">
                      <label for="dob" class="form-label" style="align-self: flex-start;">Date of Birth*</label>
                      <input type="date" name="dob" class="form-control" id="dob" required onblur="validate(5)">
                    </div>

                    <div class="form-group col-sm-6 flex-column d-flex col-md-4 text-left">
                      <label for="marital_status" class="form-label" style="align-self: flex-start;">Marital Status*</label>
                      <select id="marital_status" name="marital_status" class="form-select" required>
                        <option value="" disabled selected>Select your status</option>
                        <option>Single</option>
                        <option>Married</option>
                        <option>Widow</option>
                        <option>Divorced</option>
                      </select>
                    </div>

                    <div class="form-group col-sm-6 flex-column d-flex col-md-4 text-left">
                      <label for="gender" class="form-label" style="align-self: flex-start;">Gender</label>
                      <select id="gender" name="gender" class="form-select" required>
                        <option value="" disabled selected>Select your gender</option>
                        <option>Male</option>
                        <option>Female</option>
                      </select>
                    </div>

                    <div class="form-group col-sm-6 flex-column d-flex col-md-4 text-left">
                      <label for="lga" class="form-label" style="align-self: flex-start;">Local Gov Area</label>
                      <input type="text" name="lga" class="form-control" id="lga" required>
                    </div>

                    <div class="form-group col-sm-6 flex-column d-flex col-md-6 text-left">
                      <label for="state" class="form-label" style="align-self: flex-start;">State of Residence</label>
                      <input type="text" name="state" class="form-control" id="state" required>
                    </div>

                    <div class="form-group col-sm-6 flex-column d-flex col-md-6 text-left">
                      <label for="phone" class="form-label" style="align-self: flex-start;">Phone Number</label>
                      <input type="text" name="phone" class="form-control" id="phone" required onblur="validate(7)">
                    </div>

              <div class="form-group col-sm-6 flex-column d-flex col-md-12 text-left">
                <label for="state" class="form-label">Complain</label>
                <div class="input-group">
                  <span class="input-group-text">Write it here</span>
                  <textarea class="form-control" name="chronic_pc" id="chronic_pc" aria-label="With textarea" required onblur="validate(6)"></textarea>    
                </div>
              </div>
                   <button type="submit" class="btn-block btn-primary">Submit</button>
                </form>
                <p style="text-align: center; color: red;">Copy right @2024 RHC HEALTH CENTER | Developed by Azriel</p>
  </div>
            </div>
        </div>
    </div>
</div>
 </div>   
  <script>
    document.getElementById('marital_status').addEventListener('change', function() {
        var maritalStatus = this.value;
        var spouseDetails = document.getElementById('spouse-details');
        var spouseFirstname = document.getElementById('spouse-surname');
        var spouseSurname = document.getElementById('spouse-firstname');
        var spouseDob = document.getElementById('spouse-dob');
        var spouseRelationship = document.getElementById('spouse-relationship');
       var spouseRelationshipco = document.getElementById('spouse-co');   
       var spouseText = document.getElementById('spouse-text');    
        if (maritalStatus === 'Married') {
            spouseDetails.style.display = 'block';
            spouseFirstname.style.display = 'block';
            spouseSurname.style.display = 'block';
            spouseDob.style.display = 'block';
            spouseRelationship.style.display = 'block';
            spouseRelationshipco.style.display = 'block';
            spouseText.style.display = 'block';
        } else {
            spouseDetails.style.display = 'none';
            spouseFirstname.style.display = 'none';
            spouseSurname.style.display = 'none';
            spouseDob.style.display = 'none';
            spouseRelationship.style.display = 'none';
            spouseRelationshipco.style.display = 'none';
            spouseText.style.display = 'none';
        }
    });

    function validate(val) {
    v1 = document.getElementById("fname");
    v2 = document.getElementById("sname");
    v3 = document.getElementById("email");
    v4 = document.getElementById("street_add");
    v5 = document.getElementById("dob");
    v6 = document.getElementById("chronic_pc");
    v7 = document.getElementById("phone");

    flag1 = true;
    flag2 = true;
    flag3 = true;
    flag4 = true;
    flag5 = true;
    flag6 = true;
    flag7 = true;

    if(val>=1 || val==0) {
        if(v1.value == "") {
            v1.style.borderColor = "red";
            flag1 = false;
        }
        else {
            v1.style.borderColor = "green";
            flag1 = true;
        }
    }

    if(val>=2 || val==0) {
        if(v2.value == "") {
            v2.style.borderColor = "red";
            flag2 = false;
        }
        else {
            v2.style.borderColor = "green";
            flag2 = true;
        }
    }
    if(val>=3 || val==0) {
        if(v3.value == "") {
            v3.style.borderColor = "red";
            flag3 = false;
        }
        else {
            v3.style.borderColor = "green";
            flag3 = true;
        }
    }
    if(val>=4 || val==0) {
        if(v4.value == "") {
            v4.style.borderColor = "red";
            flag4 = false;
        }
        else {
            v4.style.borderColor = "green";
            flag4 = true;
        }
    }
    if(val>=5 || val==0) {
        if(v5.value == "") {
            v5.style.borderColor = "red";
            flag5 = false;
        }
        else {
            v5.style.borderColor = "green";
            flag5 = true;
        }
    }
    if(val>=6 || val==0) {
        if(v6.value == "") {
            v6.style.borderColor = "red";
            flag6 = false;
        }
        else {
            v6.style.borderColor = "green";
            flag6 = true;
        }
    }

    if(val>=7 || val==7) {
        if(v7.value == "") {
            v7.style.borderColor = "red";
            flag6 = false;
        }
        else {
            v7.style.borderColor = "green";
            flag6 = true;
        }
    }

    flag = flag1 && flag2 && flag3 && flag4 && flag5 && flag6;
    
    return flag;
}
</script>

</script>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
