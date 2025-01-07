
<?php
include('config.php');

// Fetch options for the first dropdown from the first table
$queryRes = "SELECT * FROM res";
$resultRes = mysqli_query($conn, $queryRes);

// Fetch options for the second dropdown from the second table
$queryDuration = "SELECT * FROM duration";
$resultDuration = mysqli_query($conn, $queryDuration);
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

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
    /*margin: 100px auto;*/
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
  font-family: "Neuton", Sans-serif;
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

<b>شرائط و ضوابط:</b>مقامی باہمی کلبوں کے لیے تعارفی خط حاصل کرنے کے لیے، کم از کم ایک ہفتے کا پروسیسنگ وقت درکار ہوتا ہے، جبکہ بیرونِ ملک کلبوں کے لیے، اس میں دو ہفتے لگتے ہیں۔ ممبران کو اس بات کو یقینی بنانا چاہیے کہ گوادر جم خانہ کلب کے تمام بقایا جات درخواست دینے سے پہلے کلیئر کر دیے جائیں۔ باہمی کلبوں کے دورے کے دوران کلب کے تمام قواعد و ضوابط کی پابندی لازمی ہے۔ ان رہنما خطوط پر عمل کرنے میں اراکین کا تعاون عمل کو ہموار کرنے اور باہمی کلب کی سہولیات تک رسائی کو بہتر بنانے کے لیے بہت اہم ہے۔ آپ کی سمجھ اور تعمیل کی بہت تعریف کی جاتی ہے۔
 
    </p>
    <p class="text-center" style='color:red;'>
   پڑھا، سمجھا اور اتفاق کیا۔
    </p>

    <!-- Add more fields as needed -->
    <div class="col-md-12 text-center">
    <button type="button" id="prevBtn" onclick="nextPrev(-1)">پچھلا</button>
    <button type="button" id="nextBtn" onclick="nextPrev(1)">اگلے</button>
</div>
  </div>
  <!-- Step 2: Profile Information -->
  <div class="tab profile-tab">
   
  <p>
        <label for="">پورا نام<span style='color:red; width:50px;'>&#8727;	</span></label>
        <input type='text' placeholder="پورا نام" oninput="this.className = ''" name="full_name" required>
    </p>
    <p>
        <label for="">رکنیت سازی کانمبر<span style='color:red; width:50px;'>&#8727;	</span></label>
        <input type='text' placeholder="رکنیت سازی کانمبر" oninput="this.className = ''" name="membership_no" required>
    </p>


    <!-- Add more profile fields as needed -->

    <div class="col-md-12 text-center">
    <button type="button" id="prevBtn" onclick="nextPrev(-1)">پچھلا</button>
    <button type="button" id="nextBtn" onclick="nextPrev(1)">اگلے</button>
</div>
  </div>

   <!-- Step 3: Profile Information -->
   <div class="tab profile-tab">
   
   <p>
        <label for="">شریک حیات کو شامل کریں۔  <span style='color:red; width:50px;'>&#8727;	</span></label>  
         <select name="spouse" id="spouse" style="width:100%; border: 1px solid #aaaaaa; padding: 10px;" >
             <option value="No">No</option>
            <option value="Yes">Yes</option>
            
        </select>
</p>
<p>
        <label for="">بچوں کو شامل کریں۔ <span style='color:red; width:50px;'>&#8727;	</span></label>  
         <select name="children" id="children" style="width:100%; border: 1px solid #aaaaaa; padding: 10px;" >
             <option value="No">No</option>
            <option value="Yes">Yes</option>
            
        </select>
</p>

 
     <!-- Add more profile fields as needed -->
 
     <div class="col-md-12 text-center">
     <button type="button" id="prevBtn" onclick="nextPrev(-1)">پچھلا</button>
    <button type="button" id="nextBtn" onclick="nextPrev(1)">اگلے</button>
</div>
   </div>


   <div class="tab profile-tab">
       <p>
              <label for="res">کلب کا نام<span style='color:red; width:50px;'>&#8727;</span></label>
             <input type='text' placeholder="کلب کا نام" oninput="this.className = ''" name="res" required>
       </p>
 
 <p>
        <label for="duration">دورانیہ <span style='color:red; width:50px;'>&#8727;</span></label>
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
        
        <label for="fee">فیس (PKR)</label>
        <input type="text" name="fee" id="fee" value="1000" disable>
      <script>
        // Add an event listener to the duration dropdown
        document.getElementById('duration').addEventListener('change', function() {
            // Get the selected option
            var selectedOption = this.options[this.selectedIndex];
            
            // Get the fee value from the data-fee attribute
            var feeValue = selectedOption.getAttribute('data-fee');
            
            // Update the fee input field
            document.getElementById('fee').value = feeValue;
        });
    </script>
    <br>
    <br>
           
   <label for="res">ملاقات کی تاریخ <span style='color:red; width:50px;'>&#8727;</span></label>
   <input type='date' placeholder="Name of Club" oninput="this.className = ''" name="issue" required>

       </p>
 

 
   

    <!-- Add more profile fields as needed -->
    <div class="col-md-12 text-center">
        <button type="button" id="prevBtn" onclick="nextPrev(-1)">پچھلا</button>
        <button type="submit" id="nextBtn">جمع کرائیں
</button>
    </div>
</div>
   


  <!-- Circles for steps -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
   
    <!-- Add more steps as needed -->
  </div>

  
</form>

<script>
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
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].hasAttribute("required") && y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
   var textArea = x[currentTab].getElementsByTagName("textarea")[0];
if (textArea && textArea.hasAttribute("required") && textArea.value.trim() === "") {
    textArea.classList.add("invalid");
    valid = false;

    // Display an error message
    var errorMessage = document.createElement("div");
    errorMessage.className = "error-message";
    errorMessage.textContent = "This field is required.";
    x[currentTab].appendChild(errorMessage);

    // Log an error message
    console.error("Textarea cannot be empty. Please enter a value.");
}
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>


</body>
</html>
