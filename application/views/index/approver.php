<?php
if (isset($_SESSION['UserName'])){
	$data = $_SESSION['UserName'];
}
else{
	header('location: http://localhost/mvc_asses/welcome/loginn');
	
}
?>
<input type="hidden" id="inp" value="<?php echo $_GET['id']?>">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
    <style>
        body{
            background-color: lemonchiffon;
            font-family: Georgia, 'Times New Roman', Times, serif;
        }
		.abg:hover{
			background-color: black;
			transition: ease 0.5s;
			
		}
		a:hover{
			color: white;
		}
		
    </style>
 
</head>
<body style="padding: 10px;" onload="bbt();">
<!-- ----------------------------------------- Approver Table Data------------------------------------ -->
<form >
<h3><tt><b>Welcome <?php echo $_SESSION['UserName'] ?><span style="user-select: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
    <button class="btn btn-dark abg"><a href="http://localhost/mvc_asses/welcome/logout" style="text-decoration: none;">LogOut</a></button></b></h3></tt>
<table cellpadding="7px" border="2px"  class="table " >
    <thead>
    <tr>
	<th>S.No.</th>
    <th>Code</th>
    <th>Name</th>
    <th>Organiser</th>
    <th>Venue</th>
    <th>Expected Guests</th>
    <th>From date</th>
    <th>To Date</th>
    <th>Status</th>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;Action</th>
    </tr>
</thead>  
   <tbody id="tbody">

   </tbody>
            
      
</table>
<!-- ----------------------------------------- Approver Table Data End------------------------------------ -->

<!-- -----------------------------------accept Modal------------------------------------- -->
<div class="modal fade" id="eModal" tabindex="-1" role="dialog" aria-labelledby="eModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="eModalLabel">Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
			Are You Sure Want to Accept Request?
			<input type="hidden" name="xx" id="xx" value="">
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="upd()">Accept</button>
      </div>
	  
    </div>
  </div>
</div>
<!-- ----------------------------------------------modal body------------------------------------- -->

<!-- ----------------------------------------------Reject modal body------------------------------------- -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
			Are You Sure Want to Reject Request?
			<input type="hidden" name="zz" id="zz" value="">
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="dlt()">Reject</button>
      </div>
	  
    </div>
  </div>
</div>
<!-- ----------------------------------------------modal body------------------------------------- -->

<script>

	//-------------------------Approver Data--------------------------------------//
    	abc();
			function abc() {
				var idd = document.getElementById("inp").value;
			
				$.ajax({
					type: "POST",
					url: "http://localhost/mvc_asses/welcome/status",
					data: {id:idd},
					dataType: "json",
					success: function (data) {

						var html = "";
						for (i = 0; i < data.length; i++) {
							html +=
								"<tr>" +
								"<td>" +
								data[i].Id+
								"</td>" +
								"<td>" +
								data[i].EventCode+
								"</td>" +
                                "<td>" +
								data[i].EventName+
								"</td>" +
								"<td>" +
								data[i].OrganizedBy +
								"</td>" +
								"<td>" +
								data[i].VenueId+
								"</td>" +
								"<td>" +
								data[i].MembersCount +
								"</td>" +
                                "<td>" +
								data[i].FromDate +
								"</td>" +
                                "<td>" +
								data[i].EndDate +
								"</td>" +
                                "<td class='total'>" +
								data[i].Status +
								"</td>" +
                                
								
								"<td><button type='button' class='btn btn-success settle-button' data-toggle='modal' data-target='#eModal' onclick=mod1(" +
								data[i].Id +")><i class='fa fa-check'></i></button>" +'&nbsp;'+

								"<button type='button' class='btn btn-danger settle-button' data-toggle='modal' data-target='#exampleModal' onclick=mod(" +
								data[i].Id +")><i class='fa fa-close'></i></button>";
								

								
						}

						$("#tbody").html(html);
						
					},
				});
			}
	//-------------------------Approver Data End--------------------------------------//


			// --------------------------------Status change Function-------------------------
		function upd() {
		
			var id = document.getElementById("xx").value;
			
			$.ajax({
				type: "POST",
				url: "http://localhost/mvc_asses/welcome/change",
				data: { id:id },
				dataType: "json",
				success: function (data) {
					

					window.location.reload();
				},
				error: function () {
					alert("Unknown Error");
				},
			});
		}
	function mod(Id){
		var id=Id;
			document.getElementById("zz").value=id;

	}
	function mod1(Id){
		var id=Id;
			document.getElementById("xx").value=id;

	}
		function dlt() {
		var id = document.getElementById("zz").value;
			
			$.ajax({
				type: "POST",
				url: "http://localhost/mvc_asses/welcome/boom",
				data: { id:id },
				dataType: "json",
				success: function (data) {
					window.location.reload();
				},
				error: function () {
					alert("Unknown Error");
				},
			});
		}
	
	function bbt(){
		$(function () {
    $('table tr').each(function () {
        if ($(this).find('.total').html() == 1 || $(this).find('.total').html() == 2 ) {
            $(this).find('.settle-button').prop('disabled', true);
		
        }
        else {
            $(this).find('.settle-button').prop('disabled', false);
        }
    });
});
	}
// --------------------------------------------------------Status change Function End -------------------------//


</script>
</body>
</html>
