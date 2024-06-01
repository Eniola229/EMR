<?php

	include "classes/doctorsearch.classes.php";
	//include "classes/locationsearc.classes.php";

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>RHC | HOME</title>'
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
	<header>
		<div class="logo">
			<img src="https://rccghealthcentre.com/assets/images/rccg-logo-121x121.png">
			<h2>Redeemers Health Center</h2>
		</div>
		<nav>
			<a href="#">
			<li >Main Site
				<div class="active"></div>
			</li></a>
			<a href="#"><li>Find a Doctor</li></a>
			
			<a href="patientlog.php"><li>Patient Login</li></a>
			<a href="adminlog.php"><li>Doctors Login</li></a>
		</nav>
	</header>
	<main>
		<div class="container">
			<div class="find">
			<h1>Find a Doctor</h1>
			<p>Do you need a doctor?, we’ve got the perfect fit for you.</p>
			<div class="search">
				<input type="text" id="search" placeholder="Doctor's Name" name="">
				<input type="text" id="location" placeholder="Location" name="location">
				<button>Search</button>
			</div>
	 <script>
             $(document).ready(function(){
            $('#search').on('keyup', function(){
                var query = $(this).val();
                $.ajax({
                    url: 'classes/doctorsearch.classes.php',
                    type: 'GET',
                    data: {first_name: query},
                    success: function(data){
                        $('#results').html(data);
                    }
                });
            });

            $('#location').on('keyup', function(){
                var query = $(this).val();
                $.ajax({
                    url: 'classes/doctorsearch.classes.php',
                    type: 'GET',
                    data: {location: query},
                    success: function(data){
                        $('#results').html(data);
                    }
                });
            });
        });
      </script>
			<div class="filter">
				<select >
					<option selected disabled>Filter</option>
					<option >Doctor</option>
					<option >Surgon</option>
					<option >Care Giver</option>
				</select>
			</div>
		  </div>
		</div>
		 <div class="ste_main">
    <div class="left">
      <h4>Doctors Avalaible</h4>
      <p>Specialization</p>
      <ul>
        <li>Cardiologist</li>
        <li>Dermatologist</li>
        <li>Endocrinologist</li>
        <li>Gastroenterologist</li>
        <li>Hematologist</li>
        <li>Infectious Disease Specialist</li>
        <li>Nephrologist</li>
        <li>Neurologist</li>
        <li>Oncologist</li>
        <li>Ophthalmologist</li>
        <li>Orthopedic Surgeon</li>
        <li>Otolaryngologist (ENT Specialist)</li>
        <li>Pediatrician</li>
        <li>Psychiatrist</li>
        <li>Pulmonologist</li>
        <li>Radiologist</li>
        <li>Rheumatologist</li>
        <li>Surgeon</li>
        <li>Urologist</li>
        <li>Gynecologist</li>
      </ul>
    </div>

    <div class="middle">

      <div  id="results"></div>
    </div>
  </div>

	</main>
	  <footer>
        <div class="footer-container">
            <div class="footer-section contact">
                <h3>Contact Us</h3>
                <p>37 Awolowo Ave, 200285, Bodija Ibadan. Nigeria</p>
                <p>Email: info@rccghealthcenter.com</p>
                <p>Phone: +2348182363462</p>
            </div>
            <div class="footer-section social-media">
                <h3>Follow Us</h3>
                <a href="#">Facebook</a>
                <a href="#">Twitter</a>
                <a href="#">Instagram</a>
                <a href="#">LinkedIn</a>
            </div>
            <div class="footer-section quick-links">
                <h3>Quick Links</h3>
                <a href="#">Home</a>
                <a href="#">Find a Doctor</a>
                <a href="#">Care Giver</a>
                <a href="#">Logim</a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Redeers Health Center. All rights reserved.</p>
        </div>
    </footer>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>



<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Doctor's Appointment Form</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     
      <div class="modal-body">
       
       <div class="container mt-5">
        
        <form>
            <div class="row">
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter your first name">
            </div>
            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter your last name">
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" class="form-control" id="age" name="age" placeholder="Enter your age">
            </div>
            <div class="form-group">
                <label for="homeaddress">Home Address</label>
                <input type="text" class="form-control" id="homeaddress" name="homeaddress" placeholder="Enter your home address">
            </div>
            <div class="form-group">
                <label for="stateofresidence">State of Residence</label>
                <input type="text" class="form-control" id="stateofresidence" name="stateofresidence" placeholder="Enter your state of residence">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
            </div>
            <div class="form-group">
                <label for="phonenumber">Phone Number</label>
                <input type="tel" class="form-control" id="phonenumber" name="phonenumber" placeholder="Enter your phone number">
            </div>
            <div class="form-group">
                <label for="complain">Complain</label>
                <textarea class="form-control" id="complain" name="complain" rows="4" placeholder="Enter your complain"></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<!-- firstname
lastname
age
homeaddress
stateofresidence
email
phonenumber -->