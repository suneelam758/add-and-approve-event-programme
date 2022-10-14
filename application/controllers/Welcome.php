<?php
class Welcome extends Controller
{
   
    function __construct()
    {
        parent::__construct();
		Auth::handleLogin();
		
		
    }
    
    function index()
    {
            $this->view->render('index/index');
    }
     
    function loginn()
    {
            $this->view->render('login/index');
    }
    function approver()
    {
            $this->view->render('index/approver');
    }
//-------------------------Get Status For Apprpver ----------------------------//
    function status(){
        
        $ut = $_POST['id'];
            $login_model = $this->loadModel('Login');
            $data=$login_model->read($ut); 
           
            echo json_encode($data);
        
    }
//-------------------------Get Status For Apprpver End ----------------------------//

//------------------------Get Venue-----------------------------------------------------//
    function venue(){
        $login_model = $this->loadModel('Login');
        $data=$login_model->venu(); 
       
        echo json_encode($data);
    }
    //------------------------Get Venue End-----------------------------------------------------//

    //-----------------------------------------Get Approver \--------------------------------//

    function approvername(){
        $login_model = $this->loadModel('Login');
        $data=$login_model->apprv(); 
       
        echo json_encode($data);
    }
    //-----------------------------------------Get Approver End\--------------------------------//


//   ------------------ insert admin request data ---------------------------------------------------------//
    
    function read1()
    {   	

		$i1=$_POST['i1'];
		$i2=$_POST['i2'];
		$i3=$_POST['i3'];
		$i4=$_POST['i4'];
		$i5=$_POST['i5'];
		$i6=$_POST['i6'];
		$i7=$_POST['i7'];
		$i8=$_POST['i8'];
		$i9=$_POST['i9'];
		$i10=$_POST['i10'];
		$i11=$_POST['i11'];
		$i12=$_POST['i12'];
		

		

		$data=array(
			'i1'=>$i1,
			'i2'=>$i2,
			'i3'=>$i3,
			'i4'=>$i4,
			'i5'=>$i5,
			'i6'=>$i6,
			'i7'=>$i7,
			'i8'=>$i8,
			'i9'=>$i9,
			'i10'=>$i10,
			'i11'=>$i11,		
			'i12'=>$i12		
		);
        $login_model = $this->loadModel('Login');
      $login_model->insert($data); 
      echo true;
       
}
//   ------------------ insert admin request data End ---------------------------------------------------------//


//------------------------------------Accept Request ---------------------------->

function change(){
    $uid = $_POST['id'];
    $login_model = $this->loadModel('Login');
    $d=$login_model->upstatus($uid);
    echo json_encode($d);
     
}
//------------------------------------Accept Request End---------------------------->

//-------------------------------Reject Request ---------------------------------//

function boom(){
    $uid = $_POST['id'];
    $login_model = $this->loadModel('Login');
    $d=$login_model->deletes($uid);
    echo json_encode($d);
     
}

//-------------------------------Reject Request End ---------------------------------//


//------------------------- log in --------------------------------///
function login()
{
    $user=$_POST['username'];
    $pass=$_POST['password'];
    $rr = $_POST['man'];

   $login_model=$this->loadModel('Login');

   $model=$login_model->checklogin($user,$pass,$rr); 
 if($model){

     echo json_encode($model);
 }  
 else{
    echo false;
 }
}
//------------------------- log in End--------------------------------///


//-------------------------------------Log Out ----------------------------------//

function logout(){
    session_destroy();
    header('location: http://localhost/mvc_asses/welcome/loginn');
    }

}

//-------------------------------------Log Out End ----------------------------------//

