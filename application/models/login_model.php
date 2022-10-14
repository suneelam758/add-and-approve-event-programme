<?php

/**
 * LoginModel
 *
 * Handles the user's login / logout / registration stuff
 */


class LoginModel
{
    /**
     * Constructor, expects a Database connection
     * @param Database $db The Database object
     */
    public function __construct(Database $db)
    {
        $this->db = $db;
    }
    /**
     * Login process (for DEFAULT user accounts).
     * Users who login with Facebook etc. are handled with loginWithFacebook()
     * @return bool success state
     */

//--------------------------Make Request -----------------------------------------//

	public function insert($data)
    { 
 

      $sql = "INSERT INTO `eventmaster`(`EventCode`, `EventName`, `OrganizedBy`, `FromDate`, `EndDate`, `TotalDays`, `StartTime`, `EndTime`, `TotalTimeDuration`, `MembersCount`, `VenueId`, `ApproverId`, `Status`) VALUES (:i1,:i2,:i3,:i7,:i8,:i9,:i10,:i11,:i12,:i6,:i4,:i5,'0')";


      $stmt= $this->db->prepare($sql);
      $stmt->execute($data);
       
  
     echo $data['i1'];
      return true;
      // $aa=$data['i4'];
      //  $select = "SELECT * FROM eventmaster WHERE `venue=`?`";
      //  $query=$this->db->prepare($select);
      //  $query->execute(array($aa));
      // $rres= $query -> fetchAll();
      //  if($rres > 0){
      //   return false;
      //  }
      //  else{
      //   $sql = "INSERT INTO `eventmaster`(`EventCode`, `EventName`, `OrganizedBy`, `FromDate`, `EndDate`, `TotalDays`, `StartTime`, `EndTime`, `TotalTimeDuration`, `MembersCount`, `VenueId`, `ApproverId`, `Status`) VALUES (:i1,:i2,:i3,:i7,:i8,:i9,:i10,:i11,:i12,:i6,:i4,:i5,'0')";


      //   $stmt= $this->db->prepare($sql);
      //   $stmt->execute($data); 
      //   return true;
      // }

    
//  $sql = "INSERT INTO `eventmaster`(`EventCode`, `EventName`, `OrganizedBy`, `FromDate`, `EndDate`, `TotalDays`, `StartTime`, `EndTime`, `TotalTimeDuration`, `MembersCount`, `VenueId`, `ApproverId`, `Status`) VALUES (:i1,:i2,:i3,:i7,:i8,:i9,:i10,:i11,:i12,:i6,:i4,:i5,'0')";


//         $stmt= $this->db->prepare($sql);
//         $stmt->execute($data); 
//         return true;
}
//--------------------------Make Request End -----------------------------------------//



// -------------------------Check Login User------------------------------------------//
public function checklogin($user,$pass,$rr)
{ 

if($rr == 1){
    $uty = "Admin";
}
else{
    $uty = "Approver";
}
  $select = "SELECT * FROM `users` WHERE (`UserType` = ? && `UserEmail`=? && `Password`=?)";
  $query=$this->db->prepare($select);


  $query->execute(array($uty,$user,$pass));
  $fetch=$query -> fetch();
if($query -> rowCount() > 0)
{
session::init();
  $_SESSION['UserName']=$fetch->UserName;
 
    return $fetch;
  }
  else{
    return false;
  }
}
// -------------------------Check Login User End------------------------//


// --------------------------approver status data---------------------------//
public function read($ut)
    { 
      $select = "SELECT * FROM eventmaster WHERE `ApproverId` = $ut";
      $query=$this->db->prepare($select);
      $query->execute();
      $result= $query->fetchAll();
      if ($result)
       {
        return $result;
      }
	  }

    // --------------------------approver status data End---------------------------//



    //------------------------ Select Venue-----------------------------------------//
    public function venu(){
      $sel = "SELECT * FROM venuemaster WHERE 1";
      $que = $this->db->prepare($sel);
      $que->execute();
      $res = $que->fetchAll();
      if($res){
        return $res;
      }
    }

        //------------------------ Select Venue End-----------------------------------------//



        //-----------------------Select Approver Name ---------------------------------//

    public function apprv(){
      $xy = 'Approver';
      $sel = "SELECT * FROM users WHERE `UserType` = ?";
      $que = $this->db->prepare($sel);
      $que->execute(array($xy));
      $res = $que->fetchAll();
      if($res){
        return $res;
      }
    }
        //-----------------------Select Approver Name End ---------------------------------//




  //-------------------------------Accept Request--------------------------------------//
    public function upstatus($uid){
      $sql = "UPDATE `eventmaster` SET `Status`='1' WHERE `Id`=?";
      $stmt= $this->db->prepare($sql);
      $stmt->execute(array($uid));

    }
      //-------------------------------Accept Request End--------------------------------------//


//--------------------------------Reject Request--------------------------------------------//
    public function deletes($uid){
      $sql = "UPDATE `eventmaster` SET `Status`='2' WHERE `Id`=?";
      $stmt= $this->db->prepare($sql);
      $stmt->execute(array($uid));

    }
}

//--------------------------------Reject Request End--------------------------------------------//
