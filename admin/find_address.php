
<?php
include('../config.php');

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

#regForm, .regForm {
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

<form id="regForm" style="margin-bottom: 0px; padding-bottom: 10px;">
  <!-- Step 2: Profile Information -->

    <div class="">
        <p>
            <label for="membership_no">Membership No: <span style="color:red; width:50px;">&#8727;</span></label>
            <input type="text" id="membership_no" class="form-control" placeholder="Enter Membership No" oninput="this.className = ''" name="membership_no" required>
        </p>
        <button type="submit" id="seaarch_button" style="width: 100%; margin-right: 0px;">Get Record</button>
    </div>  
</form>
<div class="alert alert-success d-none mb-3" id="success" style="width: 70%; margin: auto;">Successfully Updated!</div>
<div class="alert alert-danger d-none mb-3" id="danger" style="width: 70%; margin: auto;">Please fill all fields!</div>
<div class="regForm d-none" id="display_form" style="background: white; margin: 150px auto; padding: 10px; margin-top: 0px; border: 1px solid black;">
    <p style="margin-bottom: 2px;">Name: <span id="name">Hashim Abbas</span></p>
    <p>Phone Number: <span id="phone">8483849</span></p>
    <input type="text" id="residential_address" placeholder="Residential Address" />
    <button onclick="updateAddress()" type="submit" class="mt-3" style="width: 100%; margin: 0px;">Update</button>
</div>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>

    const field = document.getElementById("membership_no");
    const form = document.getElementById("regForm");
    const name = document.getElementById("name");
    const phone = document.getElementById("phone");
    const residential_address = document.getElementById("residential_address");
    const display = document.getElementById("display_form");
    const success = document.getElementById("success");
    const danger = document.getElementById("danger");

    function debounce(func, delay) {
        let timer;
        return function (...args) {
            const context = this;
            clearTimeout(timer); // Clear any existing timer
            timer = setTimeout(() => {
                func.apply(context, args); // Call the function with correct `this` and arguments
            }, delay);
        };
    }
    const send_request = number => {
      success.classList.add("d-none");
      danger.classList.add("d-none");
        axios.get(`find_data.php?member_number=${number}`)
            .then(res => {
              if(res.data) {
                display.classList.remove("d-none")
              } else {
                display.classList.add("d-none");
                danger.classList.remove("d-none");
                danger.textContent = "No Record Found!";
              }
              name.textContent = res.data.full_name;
              residential_address.value = res.data.residential_address;
            })
            .catch(err => {
                console.log(err)
            })
    }

    const updateAddress = () => {
      axios.post("update_address.php", {
        membership_id: field.value,
        address: residential_address.value
      }, {
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
        }
      })
        .then(res => {
          if(res.data) {
            success.classList.remove("d-none");
            danger.classList.add("d-none");
          } else {
            success.classList.add("d-none");
            danger.textContent = "Please fill all fields!";
            danger.classList.remove("d-none");
          }
        })
        .catch(err => {
          console.log(err);
        })
    }

    form.addEventListener("submit", function(e) {
      e.preventDefault();
      send_request(field.value)
    });
</script>

</body>
</html>
