 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="https://rccghealthcentre.com/assets/images/rccg-logo-121x121.png">
  <title>RHC APPOINTMENT</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">\
  
</head>
<body>
<style>
  body{
    color: #000;overflow-x: hidden;
    height: 100%;background-image: url("assets/img/bg-masthead.jpg");
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
      background-color: darkgreen;
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
           
            <form method="POST" action="includes/register.inc.php";   enctype="multipart/form-data" >
            <div class="card">
            <h3>Sign up</h3>
            
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
                    echo '<p style="color: red; text-align: center; font-size: 20px;">Invalid Email</p>';
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

    </p>
            <div class="form-group d-flex justify-content-around">
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
                      <label for="oname" class="form-label" style="align-self: flex-start;">Other Name*</label>
                      <input type="text" name="oname" class="form-control" id="oname" required onblur="validate(2)">
                    </div>

                    <div class="form-group col-sm-6 flex-column d-flex col-md-6 text-left">
                      <label for="email" class="form-label" style="align-self: flex-start;">E-mail*</label>
                      <input type="email" name="email" class="form-control" id="email" required onblur="validate(3)">
                    </div>

                    <div class="form-group col-sm-6 flex-column d-flex col-md-6 text-left">
                      <label for="address" class="form-label" style="align-self: flex-start;">Street Address*</label>
                      <input type="text" name="address" class="form-control" id="address" required onblur="validate(4)">
                    </div>

                     <div class="form-group col-sm-6 flex-column d-flex col-md-6 text-left">
                      <label for="phone" class="form-label" style="align-self: flex-start;">Phone Number*</label>
                      <input type="text" name="phone" class="form-control" id="phone" required onblur="validate(4)">
                    </div>

                      <div class="form-group col-sm-6 flex-column d-flex col-md-6 text-left">
                      <label for="full_age" class="form-label" style="align-self: flex-start;">Full Age*</label>
                      <input type="text" name="full_age" class="form-control" id="full_age" required onblur="validate(4)">
                    </div>

                    <div class="form-group col-sm-6 flex-column d-flex col-md-6 text-left">
                      <label for="date_of_birth" class="form-label" style="align-self: flex-start;">Date of Birth*</label>
                      <input type="date" name="date_of_birth" class="form-control" id="date_of_birth" required onblur="validate(5)">
                    </div>

                    <div class="form-group col-sm-6 flex-column d-flex col-md-6 text-left">
                      <label for="gender" class="form-label" style="align-self: flex-start;">Gender*</label>
                      <select id="gender" name="gender" class="form-select" required>
                        <option value="" disabled selected>Select your Gender</option>
                        <option>Male</option>
                        <option>Female</option>
                      </select>
                    </div>

                    <div class="form-group col-sm-6 flex-column d-flex col-md-6 text-left">
                      <label for="lga" class="form-label" style="align-self: flex-start;">Local Gov Area</label>
                      <input type="text" name="lga" class="form-control" id="lga" required>
                    </div>

                    <div class="form-group col-sm-6 flex-column d-flex col-md-6 text-left">
                      <label for="state" class="form-label" style="align-self: flex-start;">State</label>
                      <input type="text" name="state" class="form-control" id="state" required>
                    </div>

                    <div class="form-group col-sm-6 flex-column d-flex col-md-6 text-left">
                      <label for="phone" class="form-label" style="align-self: flex-start;">Phone Number</label>
                      <input type="text" name="phone" class="form-control" id="phone" required onblur="validate(7)">
                    </div>

              <div class="form-group col-sm-6 flex-column d-flex col-md-12 text-left">
                <label for="state" class="form-label">Complain</label>
                <div class="input-group">
                  <span class="input-group-text">Write is here</span>
                  <textarea class="form-control" name="complain" id="Complain" aria-label="With textarea" required onblur="validate(6)"></textarea>    
                </div>
              </div>
             
                   <button type="submit" class="btn-block" style="margin-top:1%; background: darkblue; color: white;">Submit</button>
                </form>
                <p style="text-align: center; color: red;">Copy right @2024 RHC HEALTH CENTER | Developed by Azriel</p>
  </div>
            </div>
        </div>
    </div>
  </div>
   </div>   
  </form>

</body>
</html>