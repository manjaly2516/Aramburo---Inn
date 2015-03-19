<?php
// This is the API, 2 possibilities: show the app list or show a specific app by id.
// This would normally be pulled from a database but for demo purposes, I will be hardcoding the return values.
/*rooms =[
  {
    id:1,
    name:"101a",
    type:"Individual",
    max_people:2,
    reservations: [1],
    price: 300
  },
  {
    ...
  }]
reservations=[
  {
    id:1,
    maker: "Rodrigo López",
    maker_age: 18,
    maker_email: "rodrigo@gmail.com",
    maker_phone: 12345,
    maker_credit_card: 123412341234123,
    maker_ccv: 159,
    people: ["Rodrigo López", "Javier Martinez"],
    from: new Date(2015,04,04), //4 de Mayo de 2015
    to: new Date(2015,04,06),
    room_id: 1
  },
  {
    
  }]*/
function get_room_list(){
  
  require ('mysqli_connect.php');
  $q = "SELECT ref_num, thumb, type,price, mini_descr, n_room, status FROM houses  ";    
  $result = @mysqli_query ($dbcon, $q);
  $room_array  = array();
  $c = 0;
  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
     
      
      $room_array = array("id" => $row['ref_num'],"name" => "null", "type" => $row['type'], "max_people" => $row['n_room'], "reservation" => "0", "price" => $row['price']);
    $room_list [$c] = array($room_array);
     $c = $c +1;
   
  }
  mysqli_free_result ($result);
  
  return $room_list;
}

function get_room_by_id($id) {
  require ('mysqli_connect.php');
  $room_info = array();
  $q = "SELECT ref_num,  thumb, price, type, mini_descr, n_room, status FROM houses WHERE ref_num='$id' ";
  
  $result = @mysqli_query ($dbcon, $q);
 
  if($result) {
    
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $room_info = array("id" => $row['ref_num'],"name" => "null", "type" => $row['type'], "max_people" => $row['n_room'], "reservation" => "0", "price" => $row['price']);
    
    } //end while
  } //end if

mysqli_free_result ($result);
  return $room_info;
}
function get_app_by_id($id)
{
  $app_info = array();

  // normally this info would be pulled from a database.
  // build JSON array.
  switch ($id){
    case 1:
      $app_info = array("app_name" => "Web Demo", "app_price" => "Free", "app_version" => "2.0"); 
      break;
    case 2:
      $app_info = array("app_name" => "Audio Countdown", "app_price" => "Free", "app_version" => "1.1");
      break;
    case 3:
      $app_info = array("app_name" => "The Tab Key", "app_price" => "Free", "app_version" => "1.2");
      break;
    case 4:
      $app_info = array("app_name" => "Music Sleep Timer", "app_price" => "Free", "app_version" => "1.9");
      break;
  }

  return $app_info;
}

function get_app_list()
{
  //normally this info would be pulled from a database.
  //build JSON array
  $app_list = array(array("id" => 1, "name" => "Web Demo"), array("id" => 2, "name" => "Audio Countdown"), array("id" => 3, "name" => "The Tab Key"), array("id" => 4, "name" => "Music Sleep Timer")); 

  return $app_list;
}

$possible_url = array("get_app_list", "get_app", "get_room", "get_room_list");

$value = "An error has occurred ";
=======

function get_user_by_uname_and_passsword($uname, $psword)
{
  $user_info = array();

  $sql = "SELECT * FROM `admin` WHERE `uname` = \'".$uname."\' and `psword` = \'".$psword."\'";
  $result = @mysqli_query ($dbcon, $sql);

  if ($result) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $user_info = array(
      "user_id" => $row['user_id'],
      "uname" => $row['uname'],
      "email" => $row['email'],
      "user_level" => $row['user_level'],
      "psword" => $row['psword'],
      "fname" => $row['fname']
    ); 
    }
  }
  return $user_info;
}

$possible_url = array("autenthicate", "get_app");

$value = "An error has occurred, url does not defined";
>>>>>>> origin/Aramburo-backend

if (isset($_GET["action"]) && in_array($_GET["action"], $possible_url))
{
  switch ($_GET["action"])
    {

      case "get_app_list":
        $value = get_app_list();
        break;
      case "get_app":
        if (isset($_GET["id"]))
          $value = get_app_by_id($_GET["id"]);
        else
          $value = "Missing argument";
        break;

        case "get_room":
        if (isset($_GET["id"]))
          $value = get_room_by_id($_GET["id"]);
        else
          $value = "Missing argument";
        break;

        case "get_room_list":
          $value = get_room_list();
        break;

        case "autenthicate":
        if (isset($_GET["uname"],$_GET["psword"]))
          $value = get_user_by_uname_and_passsword($_GET["uname"],$_GET["psword"]);
        else
          $value = "Missing argument";
        break;
    }
}
//http://localhost/hotel/api.php/api.php?action=get_room_list
//http://localhost/hotel/api.php/api.php?action=get_room&id=1003

 
//return JSON array
exit(json_encode($value));
?>