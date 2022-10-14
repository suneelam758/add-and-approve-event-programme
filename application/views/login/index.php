<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title>LogIN</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!--Stylesheet-->
    <style media="screen">
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #080710;
}
.background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}
.shape:first-child{
    background: linear-gradient(
        #1845ad,
        #23a2f6
    );
    left: -80px;
    top: -80px;
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #f09819
    );
    right: -30px;
    bottom: -80px;
}
form{
    height: 520px;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}
button{
    margin-top: 50px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
.social{
  margin-top: 30px;
  display: flex;
}
.social div{
  background: red;
  width: 150px;
  border-radius: 3px;
  padding: 5px 10px 10px 5px;
  background-color: rgba(255,255,255,0.27);
  color: #eaf0fb;
  text-align: center;
}
.social div:hover{
  background-color: rgba(255,255,255,0.47);
}
.social .fb{
  margin-left: 25px;
}
.social i{
  margin-right: 4px;
}

/* Loder css  */
          
          
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');
.container-text {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100vh;
}

#txt {
  text-transform: uppercase;
	background-image: linear-gradient(to right top, #ffff34, #ffc812, #ff8f2f, #ff554d, #eb1267);
   background-size: 50% auto;
   background-clip: text;
	-webkit-background-clip: text;
	-webkit-text-fill-color: transparent;
  font-family: 'Poppins', sans-serif;
  font-size: 5vw;
  animation: ubi 7.5s ease  alternate infinite;
}


@keyframes ubi {
  to {
    background-position: 100% top;
  }
}
          
/* Loder css  */

    </style>
</head>
<body>

<!------------------------Loader-------------------------------------------->

<div id="xx">
    
<div class="container-text">
  <h1 id="txt">UBITECH SOLUTIONS</h1>
</div>

</div>
<!------------------------Loader-------------------------------------------->




    <div id="kris" style="display: none;">
    <tt>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form  id="login">
        
       
       <table>
        <tr>
            <th> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Admin  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  </th>
            <th>Aprrover</th>
    </tr>
    <tr>
        <td><input type="radio" name="man" value="1"></td>
        <td><input type="radio" name="man" value="2"></td>
    </tr>
       </table> 
        
        <label for="username">Email</label>
        <input type="email" name="username" value="" placeholder="Email" id="username" required>
        <span></span>

        <label for="password">Password</label>
        <input type="password" name="password" value="" placeholder="Password" id="password" required>

        <button type="submit" >Log In</button>
    </form>
    </tt>
    </div>
    <script>
        $("#login").submit(function () {
				$.ajax({
					type: "POST",
					url: "http://localhost/mvc_asses/welcome/login" ,
					data: $("#login").serialize(),
					dataType: "json",
					success: function (data) {
					if(data.UserType=='Admin'){
                        window.location="http://localhost/mvc_asses/welcome/index";
                    }else{
                        window.location="http://localhost/mvc_asses/welcome/approver?id="+data.Id;
                    }
					},
					error: function () {
                        document.querySelector("span").innerHTML= "UserName and Password Don't match";
						alert("Credentials Not Found");
                        window.location="http://localhost/mvc_asses/index/index";
					},
				});
			});
            function xx(){
        document.getElementById("xx").style.display="none";
        document.getElementById("kris").style.display="block";
        
    }
    setInterval(xx,1000);
    
    </script>
</body>
</html>
