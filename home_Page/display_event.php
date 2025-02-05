<?php                
$link = mysqli_connect('localhost', 'root', '', 'hostel') or die('Connect Failed' . mysqli_connect_error());
$display_query = "SELECT bkdetail_id, room_id, checkin, checkout FROM bookingdetail";
$results = mysqli_query($link, $display_query);
$count = mysqli_num_rows($results);


if ($count > 0) {
    $data_arr = array();

    $i = 1;
    while ($data_row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {	
        $data_arr[$i]['bkdetail_id'] = $data_row['bkdetail_id'];
        $data_arr[$i]['title'] = $data_row['room_id'];
        $data_arr[$i]['start'] = date("Y-m-d", strtotime($data_row['checkin']));
        $data_arr[$i]['end'] = date("Y-m-d", strtotime($data_row['checkout']));
        $data_arr[$i]['color'] = '#' . substr(uniqid(), -6);
        $i++;
    }
	
    $data = array(
        'status' => true,
        'msg' => 'Successfully!',
        'data' => $data_arr
    );
} else {
    $data = array(
        'status' => false,
        'msg' => 'Error! No booking data found.'				
    );
}

echo json_encode($data);
?>
