
<?php
include('config.php');

// Fetch options for the first dropdown from the first table
$queryRes = "SELECT * FROM res";
$resultRes = mysqli_query($conn, $queryRes);

// Fetch options for the second dropdown from the second table
$queryDuration = "SELECT * FROM duration";
$resultDuration = mysqli_query($conn, $queryDuration);

$queryDuration2 = "SELECT * FROM members_2";
$resultDuration2 = mysqli_query($conn, $queryDuration2);
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<!-- CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<!-- JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Neuton:wght@200;300;800&display=swap');
* {
  box-sizing: border-box;
}

body {
  background-color:#f6f5f3;
}

#regForm {
  background-color:#f6f5f3;
  margin: 150px auto;
  border-radius:5px;
  font-family: "Neuton", Sans-serif;
  padding: 70px;
  width: 70%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}
@media screen and (max-width: 600px) {
  h1 {
    font-size: 25px;
  }
}
img{
  width:300px;
  display:block;

}
@media screen and (max-width: 600px) {
  img {
     width:150px;
     height:50px;
  }
}
@media screen and (max-width: 600px) {
 #regForm {
     background-color:#f6f5f3;
    position:relative;
    margin-top:-3%;
      border-radius:5px;
    font-family: "Neuton", Sans-serif;
    padding: 20px;
    width: 100%;
    min-width: 300px;
}

}


input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: "Neuton", Sans-serif
  text-transform:capitalize;
  border: 1px solid #aaaaaa;
}


/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}


button {
     background-color: #04AA6D;
    color: #ffffff;
    border: none;
    border-radius:5px;
    width: 100px;
    padding-top: 10px;
    padding-bottom: 10px;
    font-size: 17px;
    font-family: 'Neuton', serif;
    cursor: pointer;
    margin:10px;
}


button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}
#next {
  background-color: green;
  width:20px;
  Position:relative;
  margin-left:20px;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 8px;
  width: 8px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #04AA6D;
}
h1{
    
    font-family: 'Neuton', serif;
    text-align:center;
    position:relative;
    left:20%;
}
   header {
            padding: 10px;
            text-align: center;
            position: fixed;
            width: 100%;
            z-index: 1000;
        }

        /* Desktop Header Styles */
        .desktop-header {
          background: #ffffff5;
            	background:rgba(300, 255, 255, 0.96);
            	transition: background 0.3s, border 0.3s, border-radius 0.3s,
            	box-shadow 0.3s;
                height: 85px;
            	position: fixed;
          
        }
           .desktop-header  .logo {
            display: inline-block;
            margin: 10px;
            float:left;
            margin-left:23%;
           
        }

        .logo img {
            width: 60px; /* Set your desired width */
            height: auto;
        }

            .desktop-header   .menu {
            float: right;
            margin: 15px;
            margin-right:25%;
        
           
            
        }
        .menu h1
        {
        font-size:25px;
        top:12px;
       font-family: "Neuton", Sans-serif;
        }


        /* Mobile Header Styles */
         .mobile-header {
            background-color: transparent;
            display:none;
           
        }
        

 @media only screen and (max-width: 768px) {
       header {
            padding: 10px;
            text-align: center;
            position: fixed;
            width: 100%;
            z-index: 1000;
        }

        /* Desktop Header Styles */
        .desktop-header {
          background: #ffffff5;
            	background:rgba(300, 255, 255, 0.96);
            	transition: background 0.3s, border 0.3s, border-radius 0.3s,
            	box-shadow 0.3s;
                height: 85px;
            	position: fixed;
          
        }
        .desktop-header img {
            width:80px;
            height:60px;
            position:relative;
            right:400%;
            
        }
            .desktop-header h1 {
          font-size:30px;  
          float:right;
          position:relative;
          margin-top:20px;
          margin-left
        }


        /* Mobile Header Styles */
         .mobile-header {
            background-color: transparent;
            display:none;
           
        }



 @media only screen and (max-width: 768px) {
     body {
  background-color:#f6f5f3;
}
            /* Common Header Styles for Mobile */
            header {
                padding: 5px;
            }

            /* Desktop Header Styles for Mobile */
            .desktop-header {
                display: none; /* Hide on mobile */
            }

            /* Mobile Header Styles for Mobile */
            .mobile-header {
                display: block; /* Display on mobile */
                padding:15px;
                background: #ffffff5;
            	background:rgba(300, 255, 255, 0.96);
            	transition: background 0.3s, border 0.3s, border-radius 0.3s,
            	box-shadow 0.3s;
                height: 55px;
            	position: fixed;
            	top: 0; 
            }
            .col-4 img{
                width:40px;
                height:30px;
                float:left;
            }
             .col-8 h1 
            {
                float:left;
                font-size:14px;
                position:relative;
                top:5px;
                font-weight:500;
                
            }
            .applying
            {
               position:relative;
               margin-left:20%;
            }
        }
      }
/* Make sure Select2 input takes full width */
.select2-container .select2-selection--single {
    width: 100% !important;  /* Ensure it stretches across the container */
    padding: 10px;
    font-size: 14px;
    border: 1px solid #aaa; /* Border styling */
    border-radius: 4px; /* Round the corners */
    box-sizing: border-box; /* Ensure padding doesn't mess with width */
    height: 50px;
}

/* If you want a better dropdown styling */
.select2-container .select2-dropdown {
    border-radius: 4px;
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.15);
    font-size: 14px;
    padding: 10px;
}
.select2-container--default .select2-selection--single .select2-selection__arrow b{
  border-color: #888 transparent transparent transparent;
    border-style: solid;
    border-width: 5px 4px 0 4px;
    height: 0;
    left: 50%;
    margin-left: -10px;
    margin-top: 10px;
    position: absolute;
    top: 50%;
    width: 0;

}
.invalid {
  border: 1px solid red;
  background-color: #f8d7da;
}

.error-message {
  color: red;
  font-size: 12px;
  margin-top: 5px;
}

</style>
<body>

  <header class="desktop-header">
 <div class="logo">
            <a href="https://gwadargymkhana.com.pk">
                <img src="images/gg.png" alt="Logo">
            </a>
        </div>

        <div class="menu">
          <h1>Introduction Letter Request Form</h1>
        </div>
    </div>
    </header>
    
    
<header class="mobile-header">
       <div class="row">
        <div class="col-4 col-md-2"><img 
          id="MDB-logo"
          src="images/gg.png"
          alt="MDB Logo"
          draggable="false"
          height="100"
      /></div>
  <div class="col-8 col-md-4"> <h1>Introduction Letter Request Form</h1></div>
 
</div>
    </header>

<br>
<br>
<br>

<form id="regForm" onsubmit="return validateForm()" method="post" action="insert.php">
  <!-- Step 1: General Information -->
  <div class="tab">
  <p class="text-justify">
  <!--<input type="text" name="current" class="tcal" value="<?php echo date("m/d/Y"); ?>"  /> -->
  
<br>
<br>

    <b>TERMS & CONDITION:</b> To obtain an introduction letter for local reciprocal clubs, a minimum processing time of one week is required, while for overseas clubs, it takes two weeks. Members must ensure that all outstanding dues with Gwadar Gymkhana Club are cleared prior to application. Adherence to all club rules and bylaws is mandatory during visits to reciprocal clubs. Members' cooperation in following these guidelines is crucial to streamline the process and improve access to reciprocal club amenities. Your understanding and compliance are greatly appreciated.



    </p>
    <p class="text-center" style="color:red; font-family: 'Neuton', serif;">
    Read, Understood and Agreed
    </p>

    <!-- Add more fields as needed -->
    <div class="col-md-12 text-center">
    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
</div>
  </div>
  <!-- Step 2: Profile Information -->

  <div class="tab profile-tab">
    <p>
    <label for="membership_no">Membership No: <span style="color:red; width:50px;">&#8727;</span></label>
    <input type="text" id="membership_no" class="form-control" placeholder="Enter Membership No" oninput="this.className = ''" name="membership_no" required>
    </p>
    <p>
    <label for="">CNIC/Passport <span style="color:red; width:50px;">&#8727;</span></label>
    <input type="text" id="cnic_passport" class="form-control" placeholder="Enter CNIC # in XXXXX-XXXXXXX-X format or Passport Number..." oninput="this.className = ''" name="cnic_passport" required>
    </p>
    <p>
    <label for="members_name">Member's Name: <span style="color:red; width:50px;">&#8727;</span></label>
    <input type="text" id="members_name" class="form-control" placeholder="Enter Your Name..." oninput="this.className = ''" name="full_name" readonly>
    </p>

    <!-- Member Name Display -->
    <div id="memberInfo" style="margin-top: 20px; font-weight: bold; color: green;"></div>

    <div class="col-md-12 text-center">
        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
        <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
</div>

   <!-- Step 3: Profile Information -->
   <div class="tab profile-tab">
   
   <p>
        <label for="">Include Spouse  <span style='color:red; width:50px;'>&#8727;	</span></label>  
         <select name="spouse" id="spouse" style="width:100%; border: 1px solid #aaaaaa; padding: 10px;" >
              <option value="No">No</option>
            <option value="Yes">Yes</option>
           
        </select>
</p>

<p>
        <label for="">Include Children  <span style='color:red; width:50px;'>&#8727;	</span></label>  
         <select name="children" id="children" style="width:100%; border: 1px solid #aaaaaa; padding: 10px;" >
             <option value="No">No</option>
            <option value="Yes">Yes</option>
            
        </select>
</p>

 
     <!-- Add more profile fields as needed -->
 
     <div class="col-md-12 text-center">
    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
</div>
   </div>
   <div class="tab profile-tab">
  <!-- Local City and Club Selection -->
  <div class="mb-3">
    <label for="country-select">Select Country <span style="color:red;">&#8727;</span></label>
    <select id="country-select" class="form-select" style="width: 100%;"></select>
  </div>

  <div class="mb-3">
    <label for="city-select">Select City <span style="color:red;">&#8727;</span></label>
    <select id="city-select" class="form-select" style="width: 100%;" disabled></select>
  </div>

  <div class="mb-3">
    <label for="club-select">Select Club <span style="color:red;">&#8727;</span></label>
    <select id="club-select" class="form-select" style="width: 100%;" disabled></select>
  </div>

  <!-- Hidden Inputs to display selected data -->
  <input type="hidden" id="country-input" class="form-control" name="country">
  <input type="hidden" id="city-input" class="form-control" name="city">
  <input type="hidden" id="club-input" class="form-control" name="clubs">

  <!-- Navigation Buttons -->
  <div class="col-md-12 text-center">
    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
  </div>
</div>



   <div class="tab profile-tab">
      

 
  <p>
        <label for="duration">Duration <span style='color:red; width:50px;'>&#8727;</span></label>
        <select name="duration" id="duration" style="width:100%; border: 1px solid #aaaaaa; padding: 10px;" required>
            <?php
            // Assuming $resultDuration is the result from your database query
            if ($resultDuration && mysqli_num_rows($resultDuration) > 0) {
                while ($row = mysqli_fetch_assoc($resultDuration)) {
                    $optionValue = $row['month'];
                    $fee = $row['fee'];
                    echo "<option value='$optionValue' data-fee='$fee'>$optionValue</option>";
                }
            } else {
                echo "<option value='' disabled>No options available</option>";
            }
            ?>
        </select>
        
        <br>
        <br>
        
        <label for="fee">Fee (PKR)</label>
<input type="text" id="fee_display" value="1000" readonly>
<input type="hidden" name="fee" id="fee" value="1000">

<script>
    // Update both visible and hidden fee inputs on dropdown change
    document.getElementById('duration').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        var feeValue = selectedOption.getAttribute('data-fee');

        // Update both fields
        document.getElementById('fee_display').value = feeValue;
        document.getElementById('fee').value = feeValue;
    });
</script>

    <br>
    <br>
           
   <label for="res">Visiting Date <span style='color:red; width:50px;'>&#8727;</span></label>
   <input type='date' placeholder="Name of Club" oninput="this.className = ''" name="issue" required>

       </p>  

    <!-- Add more profile fields as needed -->
    <div class="col-md-12 text-center">
        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
        <button type="submit" id="nextBtn">Submit</button>
    </div>
</div>
   


  <!-- Circles for steps -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
   
    <!-- Add more steps as needed -->
  </div>

  
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
  
  function checkMemberData() {
  var membershipNo = document.getElementById('membership_no').value;
  var cnicPassport = document.getElementById('cnic_passport').value;

  // Only proceed if at least one of the fields is filled
  if (membershipNo.length > 0 || cnicPassport.length > 0) {
    // Send an AJAX request to fetch member data
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'fetch_member_data.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    // Send the data (membership_no or cnic_passport)
    xhr.send('membership_no=' + encodeURIComponent(membershipNo) + '&cnic_passport=' + encodeURIComponent(cnicPassport));

    // Handle the response from the server
    xhr.onload = function () {
      if (xhr.status === 200) {
        var response = JSON.parse(xhr.responseText);
        if (response.status === 'success') {
          // Set the full name field with the fetched member name
          document.getElementById('members_name').value = response.data.full_name;

          // Display the member info (optional)
          var memberInfo = document.getElementById('memberInfo');
          memberInfo.innerHTML = "Member Info: <br>" +
                                "Full Name: " + response.data.full_name + "<br>" +
                                "Membership No: " + response.data.membership_no + "<br>" +
                                "CNIC/Passport: " + response.data.cnic_passport;
        } else {
          // Handle error if no member is found
          alert(response.message);
        }
      }
    };
  }
}
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n);
}



function nextPrev(n) {
  var x = document.getElementsByClassName("tab");
  
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) {
    console.log("Form validation failed, can't move to the next tab.");
    return false; // Prevent moving to next tab
  }

  // Hide the current tab:
  x[currentTab].style.display = "none";

  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;

  // If you've reached the end of the form...
  if (currentTab >= x.length) {
    // The form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }

  // Otherwise, display the correct tab:
  showTab(currentTab);
}


function validateForm() {
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");

  // Remove previous error messages:
  var errorMessages = document.getElementsByClassName("error-message");
  while (errorMessages.length > 0) {
    errorMessages[0].remove();
  }

  // Validate input fields:
  y = x[currentTab].getElementsByTagName("input");
  for (i = 0; i < y.length; i++) {
    // If an input field is required and empty
    if (y[i].hasAttribute("required") && y[i].value === "") {
      y[i].className += " invalid"; // add an "invalid" class to the field
      valid = false;
      
      // Create error message for input fields
      var errorMessage = document.createElement("div");
      errorMessage.className = "error-message";
      errorMessage.textContent = "This field is required.";
      y[i].parentNode.appendChild(errorMessage); // Append the message after the input field
      console.log("Input field validation failed: " + y[i].name);
    }

    // Check for "Not Found" in the members_name field
    if (y[i].id === "members_name" && y[i].value === "Not Found") {
      y[i].className += " invalid"; // add an "invalid" class to the field
      valid = false;

      // Create error message for members_name
      var errorMessage = document.createElement("div");
      errorMessage.className = "error-message";
      errorMessage.textContent = "Member not found. Please provide valid details.";
      y[i].parentNode.appendChild(errorMessage); // Append the message after the input field
      console.log("Validation failed: members_name is 'Not Found'.");
    }
  }

  // Validate select dropdowns:
  var selectElements = x[currentTab].getElementsByTagName("select");
  for (i = 0; i < selectElements.length; i++) {
    if (selectElements[i].hasAttribute("required") && selectElements[i].value === "") {
      selectElements[i].className += " invalid"; // add "invalid" class if no option is selected
      valid = false;
      
      // Create error message for select dropdowns
      var errorMessage = document.createElement("div");
      errorMessage.className = "error-message";
      errorMessage.textContent = "This field is required.";
      selectElements[i].parentNode.appendChild(errorMessage); // Append the message after the select field
      console.log("Select dropdown validation failed: " + selectElements[i].name);
    }
  }

  // Validate textarea:
  var textArea = x[currentTab].getElementsByTagName("textarea")[0];
  if (textArea && textArea.hasAttribute("required") && textArea.value.trim() === "") {
    textArea.classList.add("invalid");
    valid = false;

    // Create error message for textarea
    var errorMessage = document.createElement("div");
    errorMessage.className = "error-message";
    errorMessage.textContent = "This field is required.";
    textArea.parentNode.appendChild(errorMessage); // Append the message after the textarea
    console.log("Textarea validation failed: " + textArea.name);
  }

  // If all fields are valid, mark the step as finished:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
    console.log("All fields valid, moving to next tab.");
  }

  return valid; // return the valid status
}




function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on  the current step:
  x[n].className += " active";
}

// Check if the member data exists based on Membership Number or CNIC/Passport
// Check if the member data exists based on Membership Number or CNIC/Passport

$(document).ready(function() {
    // Function to fetch member name
    function fetchMemberName() {
        const membership_no = $('#membership_no').val().trim();
        const cnic_passport = $('#cnic_passport').val().trim();

        // Check if both fields are filled
        if (membership_no !== '' && cnic_passport !== '') {
            $.ajax({
                url: 'fetch_member.php',
                type: 'POST',
                data: {
                    membership_no: membership_no,
                    cnic_passport: cnic_passport
                },
                success: function(response) {
                    // Set the member's name input value
                    $('#members_name').val(response);
                },
                error: function() {
                    alert('Error fetching member data.');
                }
            });
        } else {
            $('#members_name').val(''); // Clear the field if inputs are empty
        }
    }

    // Event listeners for input changes
    $('#membership_no').on('input', fetchMemberName);
    $('#cnic_passport').on('input', fetchMemberName);
});

$(document).ready(function () {
  // Initialize Select2 for dropdowns
  $('#country-select, #city-select, #club-select').select2({
    placeholder: 'Search...',
    allowClear: true,
    width: '100%' // Ensure the dropdowns fit properly
  });

  // Fetch Countries for International Cities (if needed)
  $.ajax({
    url: 'fetch_data.php',
    type: 'GET',
    data: { type: 'country' },
    success: function (data) {
      const countries = JSON.parse(data);
      $('#country-select').empty().append('<option value="">Select Country</option>');
      countries.forEach(country => {
        $('#country-select').append(`<option value="${country.id}">${country.country_name}</option>`);
      });
      $('#country-select').select2();
    }
  });

  // Fetch Cities based on Country Selection
  $('#country-select').on('change', function () {
    const countryId = $(this).val();
    if (countryId) {  // Only fetch cities if country is selected
      $.ajax({
        url: 'fetch_data.php',
        type: 'GET',
        data: { type: 'city', country_id: countryId },
        success: function (data) {
          const cities = JSON.parse(data);
          $('#city-select').empty().append('<option value="">Select City</option>');
          cities.forEach(city => {
            $('#city-select').append(`<option value="${city.id}">${city.city_name}</option>`);
          });
          $('#city-select').prop('disabled', false);  // Enable the city select
          $('#city-select').select2();  // Reinitialize Select2
        }
      });
    } else {
      $('#city-select').prop('disabled', true).empty().append('<option value="">Select City</option>');  // Reset and disable city select
      $('#club-select').prop('disabled', true).empty().append('<option value="">Select Club</option>');  // Reset and disable club select
    }
  });

  // Fetch Clubs based on City Selection
  $('#city-select').on('change', function () {
    const cityId = $(this).val();
    if (cityId) {  // Only fetch clubs if city is selected
      $.ajax({
        url: 'fetch_data.php',
        type: 'GET',
        data: { type: 'club', city_id: cityId },
        success: function (data) {
          console.log(data); // Log the response to the console for debugging
          const clubs = JSON.parse(data);

          // Check if clubs data is an array and contains the expected values
          if (Array.isArray(clubs) && clubs.length > 0) {
            $('#club-select').empty().append('<option value="">Select Club</option>');
            clubs.forEach(club => {
              if (club.id && club.club_name) { // Ensure valid data
                $('#club-select').append(`<option value="${club.id}">${club.club_name}</option>`);
              }
            });
            $('#club-select').prop('disabled', false);  // Enable the club select
            $('#club-select').select2();  // Reinitialize Select2
          } else {
            $('#club-select').empty().append('<option value="">No Clubs Available</option>').prop('disabled', true);
          }
        },
        error: function () {
          $('#club-select').empty().append('<option value="">Error loading clubs</option>').prop('disabled', true);
        }
      });
    } else {
      $('#club-select').prop('disabled', true).empty().append('<option value="">Select Club</option>');  // Reset and disable club select
    }
  });
  // Update hidden inputs when dropdowns change
  $('#country-select').on('change', function () {
    const country = $('#country-select option:selected').text();
    $('#country-input').val(country); // Set selected country in hidden input
  });

  $('#city-select').on('change', function () {
    const city = $('#city-select option:selected').text();
    $('#city-input').val(city); // Set selected city in hidden input
  });

  $('#club-select').on('change', function () {
    const club = $('#club-select option:selected').text();
    $('#club-input').val(club); // Set selected club in hidden input
  });
});



</script>


</body>
</html>
