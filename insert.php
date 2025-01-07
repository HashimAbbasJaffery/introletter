<?php

include "config.php";

// Check connection
if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Fetching form data safely
$full_name = isset($_POST['full_name']) ? trim($_POST['full_name']) : null;
$membership_no = isset($_POST['membership_no']) ? trim($_POST['membership_no']) : null;
$spouse = isset($_POST['spouse']) ? trim($_POST['spouse']) : null;
$children = isset($_POST['children']) ? trim($_POST['children']) : null;
$duration = isset($_POST['duration']) ? trim($_POST['duration']) : null;
$fee = isset($_POST['fee']) ? floatval($_POST['fee']) : null;
$issue = isset($_POST['issue']) ? trim($_POST['issue']) : null;
$type = isset($_POST['type']) ? trim($_POST['type']) : null; // Assuming "type" is part of the form data
$country = isset($_POST['country']) ? trim($_POST['country']) : null;
$city = isset($_POST['city']) ? trim($_POST['city']) : null;
$clubs = isset($_POST['clubs']) ? trim($_POST['clubs']) : null; // Assign default if empty
$cnic_passport = isset($_POST['cnic_passport']) ? trim($_POST['cnic_passport']) : null;
$status = 'Active';  // Or any default value, or fetch from form data if available

// Ensure Full Name and Membership No are not empty
if (empty($full_name) || empty($membership_no)) {
    die("ERROR: Full Name and Membership No are required fields.");
}

// Insert data using prepared statements
$sql = "INSERT INTO `customer` 
        (`full_name`, `membership_no`, `spouse`, `children`, `duration`, `fee`, `issue`, `country`, `city`, `clubs`, `cnic_passport`, `status`)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

// Validate the statement preparation
if (!$stmt) {
    die("ERROR: Could not prepare query. " . $conn->error);
}

// Bind parameters
$stmt->bind_param(
    "sssssdssssss",  // Correct number of types: 12 (including 'd' for fee)
    $full_name,
    $membership_no,
    $spouse,
    $children,
    $duration,
    $fee,
    $issue,
    $country,
    $city,
    $clubs,
    $cnic_passport,
    $status
);

// Execute the statement
if ($stmt->execute()) {
    echo "Record inserted successfully!";
} else {
    echo "ERROR: Could not execute query. " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();

?>




<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Neuton:wght@200;300;800&display=swap');
   body{
        background-color:#f6f5f3;
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
        

.container h1{
  font-family: "Neuton", Sans-serif;
  position:relative;
  margin-top:15%;
  font-size:70px;
  text-align:center;
  color:#333333;
  padding:0px 10px 10px;
}
.container h5{
  font-family: Arial;
  font-size:25px;
  font-weight:400;
  text-align:center;
  color:#333333;
  padding:5px 10px 10px;
}
.container h5 a{
  font-family: "Neuton", Sans-serif;  text-align:center;
  font-size:25px;
  font-weight:400;
  text-align:center;
   color:#ffffff;
  padding:5px 10px 10px;
  width:280px;
  background:#00b936;
  border-bottom :none;
  padding:10px;
}

.container a{
  font-family: "Neuton", Sans-serif;  text-align:center;
  font-size:25px;
  color:#ffffff;
  display:block;
  text-decoration:none;
  width:150px;
  background:#00b936;
  margin:10px auto 0px;
  padding:15px 20px 15px;
  border-radius:3px;
  
  border-bottom:5px solid #00b936;
}
 .container h6{
  font-family: Arial, Sans-serif;
  font-size:25px;
  font-weight:400;
  text-align:center;
  color:#333333;

}
 .container h3{
  font-family: Arial, Sans-serif;
  font-size:30px;
  font-weight:600;
  text-align:center;
  color:#333333;

}
.main-container{
    margin-top:7%;
}

 .container {
            display: flex;
            justify-content: space-between;
            width: 80%;
        }

        .column {
            flex: 1;
            padding: 20px;
            border: 1px solid #ddd; /* Optional: Add borders for visual separation */
        }
        h2{
           font-family: "Neuton", Sans-serif;
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
                float: right;
                font-family: "Neuton", Sans-serif;;
                font-size: 14px;
                margin-top: 7px;
    font-weight: 500;
                
            }
            .applying
            {
               position:relative;
               margin-left:20%;
            }
        
      
          
            .main-container{
                margin-top:20%;
            }
            .container h1{
            font-family: "Neuton", Sans-serif;
            position:relative;
            margin-top:20%;
            font-size:40px;
            text-align:center;
            color:#333333;
            padding:0px 10px 10px;
}
 .container h4{
  font-family: Arial, Sans-serif;
  font-size:18px;
  font-weight:300;
  text-align:justify;
  color:#333333;
  

}
 .container h5{
  font-family: Arial, Sans-serif;
  font-size:18px;
  font-weight:300;
  text-align:justify;
  color:#333333;
  

}
 .container h5 a{


  font-weight:300;
  text-align:center;
  color:#333333;
  
  font-family: "Neuton", Sans-serif;  text-align:center;
  font-size:18px;
  font-weight:400;
  text-align:center;
  color:#ffffff;
  padding:5px 10px 10px;
  width:180px;
  background:#00b936;
  border-bottom :none;
  padding:10px;
  

}
 .container h3{
  font-family: Arial, Sans-serif;
  font-size:22px;
  font-weight:500;
  text-align:center;
  color:#333333;

}
 .container h6{
  font-family: Arial, Sans-serif;
  font-size:18px;
  font-weight:300;
  text-align:center;
  color:#333333;

}


.container a{
  font-family: "Neuton", Sans-serif;  text-align:center;
  font-size:17px;
  color:#ffffff;
  display:block;
  text-decoration:none;
  width:130px;
  background:#00b936;
  margin:10px auto 0px;
  padding:10px;
  border-radius:3px;
  border-bottom:5px solid #00b936;
}
 .container {
            display: block;
            justify-content: space-between;
            width: 100%;
        }
        

        .column {
            flex: 1;
            padding: 10px;
            border: 1px solid #ddd; /* Optional: Add borders for visual separation */
        }

   h2{
           font-family: "Neuton", Sans-serif;
           font-size:20px;
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

 <div class="container">
        <div class="column" style="border:none;">
             <h1>Thank You For Submission </h1>
            </div>
            </div>
            
            
 <div class="container">
        <div class="column" style="border:none;">
              <h5>To obtain the Introduction Letter, please make a payment of Rs. <b><?php echo $fee; ?></b> through online payment or bank transfer.</h5>
                    
            </div>
            </div>
                        
            
 <div class="container">
        <div class="column" style="border:none;">
            <a href="https://gwadargymkhana.com.pk/membersonlinepayment.html">Pay online</a>
            <br>
            <h6>or</h6>
                    
            </div>
            </div>
             <div class="container">
            <div class="column" style="border:none;">
                <h3>Bank  Transfer</h3>
                <h5>Please deposit to below account details and share the receipt either via email at reciprocal@gwadargymkhana.com.pk or by sending the payment screenshot on WhatsApp to <a href="https://wa.me/+923359660780"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
  <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
</svg>
+92335 9660780 </a>.</h5>
                
           
                    
            </div>
            </div>
            
             <div class="container">
            <div class="column">
                
                <h5><b>Title</b>: Gwadar Gymkhana Pvt. Ltd</h5>
                <h5><b>Bank Al Habib Limited (Clifton)</b></h5>
                <h5><b>Branch Code</b>: 1241</h5>
                <h5><b>Account No</b>:  1241-0981-063986-01-1</h5>
                <h5><b>IBAN </b>: PK22 BAHL1241098106398601</h5>
            
            </div>
             <div class="column">
                
                <h5><b>Title</b>: Gwadar Gymkhana Pvt. Ltd</h5>
                <h5><b>Bank Alfalah (Sea View)</b></h5>
                <h5><b>Branch Code</b>: 1241</h5>
                <h5><b>Account No</b>:  0163-1008382404</h5>
                <h5><b>IBAN </b>: PK29 ALFH0163001008382404</h5>
            
            </div>
            </div>
            
          
           
         


</body>

</html>
