<?php
if (isset($_SESSION['UserName'])){
	$data = $_SESSION['UserName'];
}
else{
	header('location: http://localhost/mvc_asses/welcome/loginn');
	
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Request Page</title>
    <script>
      function dat1(){
        var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();

today = yyyy + '-' + mm + '-' + dd;

if(document.getElementById("i7").value < today){
  alert("please select upcoming date");
  document.getElementById("i7").value="";
}
      }
        function dat(){
        
            var str1 = document.getElementById("i7").value;
            var str2 = document.getElementById("i8").value;
            var diff = Math.floor((Date.parse(str2) - Date.parse(str1)) / 86400000);
            document.getElementById("i9").value = diff + 1;
           if(document.getElementById("i7").value ==""){
            document.getElementById("sp").innerHTML ="please fill start date first";
            document.getElementById("i8").value ="";
            
           }
            if(str2<str1){
              alert("end date must be greater");
              document.getElementById("i8").value ="";
              document.getElementById("i9").value ="";
            }
        }
        function timeCalculating()
  {
    var time1 = $("#i10").val();
    var time2 = $("#i11").val();
    var time1 = time1.split(':');
    var time2 = time2.split(':');
    var hours1 = parseInt(time1[0], 10), 
    hours2 = parseInt(time2[0], 10),
    mins1 = parseInt(time1[1], 10),
    mins2 = parseInt(time2[1], 10);
    var hours = hours2 - hours1, mins = 0;
    if(hours < 0) hours = 24 + hours;
    if(mins2 >= mins1) {
        mins = mins2 - mins1;
    }
    else {
      mins = (mins2 + 60) - mins1;
      hours--;
    }
    if(mins < 9)
    {
      mins = '0'+mins;
    }
    if(hours < 9)
    {
      hours = '0'+hours;
    }
    $("#i12").val(hours+':'+mins);

    if(time2<time1){
      alert ("Please select upcoming time");
      document.getElementById("i11").value ="";
      document.getElementById("i12").value ="";
    }
    if(time1 ==""){
      alert("please select start time first");
      document.getElementById("i11").value ="";
      document.getElementById("i12").value ="";
    }
  }

  
   
    </script>
    <style>
      body{
        background-color: lavender;
      }
    </style>
</head>
<body>
  <!--------------------------------------Admin data -------------------------------------------------------->
   <b>
    
    <h1><tt style="padding: 10px;">Welcome <?php echo $_SESSION['UserName'] ?> <span style="user-select: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
    <button class="btn btn-outline-primary"><a href="http://localhost/mvc_asses/welcome/logout">LogOut</a></button></h1></tt>
    <span id="sts"></span>
    <form id="insertform" style="padding: 10px;">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Code</th>
      <th scope="col">Name</th>
      <th scope="col">Organiser</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><input type="text" placeholder="event code" name="i1" maxlength="8" minlength="3" required></th>
      <td><input type="text" placeholder="Event Name" name="i2" required></td>
      <td><input type="text" placeholder="Event Orgniser" name="i3" required></td>
    </tr>
  </tbody>
    
  <thead>
    <tr>
      <th scope="col">Venue</th>
      <th scope="col">Approver Name</th>
      <th scope="col">Expected Guests</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><Select name="i4" id="i4" required>
        
       
       
    </Select></th>

      <td><Select name="i5" id="i5"  required>
        
       </td>

      <td><input type="number" placeholder="Expected Guest" name="i6" min="1" oninput="validity.valid||(value='');" required></td>
    </tr>
  </tbody>

  <thead>
    <tr>
      <th scope="col">from Date</th>
      <th scope="col">To Date</th>
      <th scope="col">Total Days</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><input type="date" name="i7" id="i7" onchange="dat1()"  required></th>

      
      <td><input type="date" name="i8" id="i8" onchange="dat()"  required> <br><span id="sp"></span></td>
      <td><input type="number" placeholder="total days" id="i9"  name="i9"  readonly></td>
    </tr>
  </tbody>

  <thead>
    <tr>
      <th scope="col">Start Time</th>
      <th scope="col">End Time</th>
      <th scope="col">Total Time</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><input type="time"  name="i10" id="i10"></th>
      <td><input type="time"  name="i11" id="i11" onchange="timeCalculating()"></td>
      <td><input type="text" placeholder="total time" name="i12" id="i12" readonly></td>
    </tr>
  </tbody>
  
</table>
<center><button type="submit" class="btn btn-success">Make Request</button></center>
    </form>
    </b>

      <!--------------------------------------Admin data End -------------------------------------------------------->

    <script>
      //----------------------------------------Insert Request----------------------//
 $(document).ready(function()
 {
	$("#insertform").submit(function() {
	
	 var data1 = $("#insertform").serialize();
				$.ajax({
					type: 'POST',
					url: 'http://localhost/mvc_asses/welcome/read1',
					data: data1,
          dataType: 'json',
          // async: false,
					success: function(data) {
					
						alert("Request added successfully !!!!");
       
					},
                    error: function(){
                        alert("Request Failed ");
                    }
				});

			});
 })
      //----------------------------------------Insert Request End----------------------//

//======================Venue=======================================//
    	ven();
			function ven() {			
				$.ajax({
					type: "ajax",
					url: "http://localhost/mvc_asses/welcome/venue",
					dataType: "json",
					success: function (data) {

						var html = "";
            html+="<option value=''>Select Venue</option>"
						for (i = 0; i < data.length; i++) {
							html +=
              
								"<option value='" + data[i].Id + "'>'" + data[i].VenueName +  "'</option>"

								
						}

						$("#i4").html(html);
						
					},
				});
			}

//======================Venue End=======================================//


//======================Approver Name=======================================//
    	appr();
			function appr() {			
				$.ajax({
					type: "ajax",
					url: "http://localhost/mvc_asses/welcome/approvername",
					dataType: "json",
					success: function (data) {

						var html = "";
            html+="<option value=''>Select Approver</option>"
						for (i = 0; i < data.length; i++) {
							html +=
              
								"<option value='" + data[i].Id + "'>'" + data[i].UserName +  "'</option>"

								
						}

						$("#i5").html(html);
						
					},
				});
			}

//======================Aprover Name  End=======================================//
</script>
</body>
</html>
