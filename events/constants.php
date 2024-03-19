<?php

include_once 'config.php';

define("SITE_NAME", $title);
date_default_timezone_set("Africa/Nairobi");
$date = date('D, d-M-Y h:i:s A');;
$date_small = date('d-M-Y');;

if (!function_exists('connect')) {

    function connect()
    {
        $con = new mysqli("localhost", "root", "", "eventbook");
        if (!$con) die("Database is being upgraded!");
        return $con;
    }
}

function genSeat($id, $type, $number)
{
    $conn = connect();
    $type_seat = $conn->query("SELECT event.first_seat as first, event.second_seat as second FROM schedule INNER JOIN event ON event.id = schedule.event_id WHERE schedule.id = '$id'")->fetch_assoc();
    $me = $type_seat[$type];
    $query = $conn->query("SELECT SUM(no) AS no FROM booked WHERE schedule_id = '$id' AND class = '$type'")->fetch_assoc();
    $no = $query['no'];
    if ($no == null) $no = 1;
    else $no++;
    //Multiple Seats or Not
    if ($number == 1) {
        while (strlen($no) != strlen($me)) {
            $no = "0" . $no;
        }
        return strtoupper(substr($type, 0, 1)) . "$no";
    } else {
        $start = $no;
        $end = $no + ($number - 1);
        while (strlen($start) != strlen($me)) {
            $start = "0" . $start;
        }
        while (strlen($end) != strlen($me)) {
            $end = "0" . $end;
        }
        $append = strtoupper(substr($type, 0, 1));

        return $append . $start . " - " . $append . $end;
    }
}


function genCode($id, $user, $class)
{
    $conn = connect();
    $query = $conn->query("SELECT SUM(no) AS no FROM booked WHERE schedule_id = '$id'")->fetch_assoc();
    $no = $query['no'];
    if ($no == null) $no = 1;
    else $no++;
    $number = "";
    switch (strlen($id)) {
        case 1:
            $number = "00";
            break;
        case 2:
            $number = "0";
            break;
        default:
            $number = "0";
            break;
    }
    $code = date('Y') . "/$number" . $id . "/" . $no . mt_rand(1, 882);
    return $code;
}

function login($username, $password)
{
    $password = md5($password);
    $q = connect()->query("SELECT * FROM customer WHERE email = '$username' AND password = '$password' AND status = '1' ")->num_rows;
    if ($q == 1) return 1;
    return 0;
}

function organizerlogin($username, $password)
{
    $password = md5($password);
    $q = connect()->query("SELECT * FROM organizer WHERE email = '$username' AND password = '$password' AND status = '1' ")->num_rows;
    if ($q == 1) return 1;
    return 0;
}

function adminLogin($username, $password)
{
    $q = connect()->query("SELECT * FROM users WHERE username = '$username' AND password = '$password' ")->num_rows;
    if ($q == 1) return 1;
    return 0;
}

function getIndividualName($id, $conn = null)
{
    $conn = connect();
    $q = $conn->query("SELECT * FROM customer WHERE id = '$id'")->fetch_assoc();
    return $q['name'];
}


function getOrganizerName($id, $conn = null)
{
    $conn = connect();
    $q = $conn->query("SELECT * FROM organizer WHERE id = '$id'")->fetch_assoc();
    return $q['name'];
}


function uploadFile($file)
{

    $loc = genRand() . "." . strtolower(pathinfo(@$_FILES[$file]['name'], PATHINFO_EXTENSION));
    $valid_extension = array("jpg", "png", "jpeg");
    //Check for valid file size
    if (($_FILES[$file]['size'] && !in_array(strtolower(pathinfo(@$_FILES[$file]['name'], PATHINFO_EXTENSION)), $valid_extension)) || ($_FILES[$file]['size'] && $_FILES[$file]['error']) > 0) {
        return -1;
    }
    $upload = move_uploaded_file(@$_FILES[$file]['tmp_name'], "uploads/" . $loc);
    if ($upload) {
        chmod("uploads/" . $loc, 0777);
        return $loc;
    } else {
        return -1;
    }
}

function genRand()
{
    return md5(mt_rand(1, 3456789) . date('dmyhmis'));
}

function getImage($id, $conn)
{
    $row = $conn->query("SELECT loc FROM customer WHERE id = '$id'")->fetch_assoc();
    if (strlen($row['loc']) < 10) return "images/profile.png";
    else return "uploads/" . $row['loc'];
}

function getOrgImage($id, $conn)
{
    $row = $conn->query("SELECT loc FROM organizer WHERE id = '$id'")->fetch_assoc();
    if (strlen($row['loc']) < 10) return "images/profile.png";
    else return "uploads/" . $row['loc'];
}

function formatDate($date)
{
    return date('d-m-Y', strtotime($date));
}

function getVenue($id)
{
    $val = connect()->query("SELECT * FROM venue WHERE id = '$id'")->fetch_assoc();
    return $val['venue'];
}
function getVenueFromEvent($id)
{
    $q = connect()->query("SELECT venue_id as id FROM event WHERE id = '$id'")->fetch_assoc();
    return getVenue($q['id']);
}
function formatTime($time)
{
    $time = explode(":", $time);
    if ($time[0] > 12) {
        $string = ($time[0] - 12) . ":" . $time[1] . " PM";
    } else {
        $string = ($time[0]) . ":" . $time[1] . " AM";
    }
    return $string;
}

function getToday()
{
    return date('d-m-Y');
}

function getTime()
{
    return date('H:i');
}

function querySchedule($type)
{
    $today = getToday();
    $conn = connect();
    $row = 0;
    if ($type == 'future') {
        $row = $conn->query("SELECT * FROM `schedule` WHERE STR_TO_DATE(`date`,'%d-%m-%Y') >= STR_TO_DATE('$today','%d-%m-%Y')");
    } else {
        $row = $conn->query("SELECT * FROM `schedule` WHERE STR_TO_DATE(`date`,'%d-%m-%Y') <= STR_TO_DATE('$today','%d-%m-%Y')");
    }
    return $row;
}

function getEventFromSchedule($id)
{
    $q = connect()->query("SELECT event_id as id FROM schedule WHERE id = '$id'")->fetch_assoc();
    return getEventName($q['id']);
}
function getOrganizerFromSchedule($id)
{
    $q = connect()->query("SELECT organizer_id as id FROM schedule WHERE id = '$id'")->fetch_assoc();
    return getOrganizerName($q['id']);
}

function getFee($id, $type = 'second')
{
    if ($type == 'second') {
        $type = 'second_fee';
    } else {
        $type = 'first_fee';
    }
    $q = connect()->query("SELECT $type FROM schedule WHERE id = '$id'")->fetch_assoc();
    return $q[$type];
}

function getTotalBookByType($id)
{

    $con =  connect()->query("SELECT SUM(no) as no FROM `booked` WHERE schedule_id = '$id' AND class = 'second'")->fetch_assoc();
    $con2 =  connect()->query("SELECT SUM(no) as no FROM `booked` WHERE schedule_id = '$id' AND class = 'first'")->fetch_assoc();
    $no = $con['no'];
    $no2 = $con2['no'];
    $num = $no == null ? 0 :  $con['no'];
    $num2 = $no2 == null ? 0 :  $con2['no'];
    $qu = connect()->query("SELECT event.first_seat as first, event.second_seat as second FROM schedule INNER JOIN event ON event.id = schedule.event_id WHERE schedule.id = '$id'")->fetch_assoc();
    $first = $qu['first'];
    $second = $qu['second'];
    $first = intval($first);
    $second = intval($second);
    $num = intval($num);
    $num2 = intval($num2);
    return array("first" => $first, "second" => $second, "first_booked" => $num, "second_booked" => $num2);
}

function isScheduleActive($id)
{
    $today = getToday();
    $con = connect();
    $conn = $con->query("SELECT * FROM `schedule` WHERE STR_TO_DATE(`date`,'%d-%m-%Y') >= STR_TO_DATE('$today','%d-%m-%Y') AND `id` = '$id'");
    if ($conn->num_rows == 1) {
        $row = $conn->fetch_assoc();
        $time = getTime();
        $schedule_date = $row['date'];
        $schedule_time = $row['time'];
        if ($schedule_date == $today) {
            if (strtotime($schedule_time) <= strtotime($time)) return false;
        }
        return true;
    }
    return false;
}

function getEventName($id)
{
    $val = connect()->query("SELECT name FROM event WHERE id = '$id'")->fetch_assoc();
    return $val['name'];
}


function alert($msg)
{
    echo "<script>alert('$msg')</script>";
}

function load($link)
{
    echo "<script>window.location = ('$link')</script>";
}

function sendFeedback($msg)
{
    $me = $_SESSION['user_id'];
    $msg = connect()->real_escape_string($msg);
    $stmt = connect()->query("INSERT INTO feedback (user_id, message) VALUES ('$me', '$msg')");
    if ($stmt) return 1;
    return 0;
}

function getFeedbacks()
{
    $me = $_SESSION['user_id'];
    return connect()->query("SELECT * FROM feedback WHERE user_id = '$me'");
}

function replyTo($id, $reply)
{
    $con = connect();
    $reply = $con->real_escape_string($reply);
    $sql = $con->query("UPDATE feedback SET response = '$reply' WHERE id = '$id' ");
    if ($sql) return 1;
    return 0;
}


function printReport($id)
{
  echo "report not available"; 
}