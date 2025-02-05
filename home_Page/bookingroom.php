<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Room</title>
    <link rel="stylesheet" href="dashbord.css">
    <link rel="stylesheet" href="bk.css">
    <link rel="stylesheet" href="listfood.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <script src="room.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<style>
#calendar {
    float: left;
    width: 100%;
    margin-right: 20px;
    margin-top: 150px;
}

.row::after {
    content: "";
    clear: both;
    display: table;
}
    </style>
</head>
<body>
<div class="container">
	<div class="row">
        <div id="calendar-container" class="col-lg-6">
			<div id="calendar"></div>
		</div>
    <div class="col-lg-6">

<?php
    $username = $_REQUEST['username'];
    $status_room = $_REQUEST['username'];
?>

<header>
    <nav class="navbar">
        <span class="hamburger-btn material-symbols-rounded">menu</span>
        <a href="home1.php?username=<?php echo urlencode($username); ?>" class="logo">
            <img src="image/test1.jpeg" alt="logo">
            <h2>Hotel</h2>
        </a>
        <ul class="links">
        <span class="close-btn material-symbols-rounded">close</span>
            <li><a href="home1.php?username=<?php echo urlencode($username); ?>">Home</a></li>
            <li><a href="food_page.php?username=<?php echo urlencode($username); ?>">Food</a></li>
            <li><a href="room1.php?username=<?php echo urlencode($username); ?>">Room</a></li>
            <li><a href="listfood_page.php?username=<?php echo urlencode($username); ?>">BILLFOOD</a></li>
            <li><a href="listbookingroom.php?username=<?php echo urlencode($username); ?>">BILLROOM</a></li>
        </ul>
        <div class="dropdown">
            <button class="login-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 448 512">
                    <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/>
                </svg>
            </button>
            <div class="dropdown-content">
            <p style="font-size: 16px; text-align: center;"><?php echo $username; ?></p>
            <a href="dashbord.php">Logout</a>
            </div>
        </div>
    </nav>
</header>

<?php
$room_id = htmlspecialchars($_REQUEST['room_id']);
$price = htmlspecialchars($_REQUEST['price']);
$username = htmlspecialchars($_REQUEST['username']);
?>

<div class="content">
    <br><br><br><br><br><h1>จองวันที่จะเข้าพัก</h1>
</div>
<div class="booking-form-container">
    <form action='process_bookingroom.php?username=<?php echo urlencode($username); ?>' method='post' onsubmit='return validateForm();'>
        <input type='hidden' name='room_id' value='<?php echo $room_id; ?>' required>
        <input type='hidden' name='price' value='<?php echo $price; ?>' required>
        <input type='hidden' name='username' value='<?php echo $username; ?>' required>

        <label for="checkin">Checkin:</label>
        <input type='date' name='checkin' id='checkin' required> <br>

        <label for="checkout">Checkout:</label>
        <input type='date' name='checkout' id='checkout' required> <br>

        <input type='submit' value='ยืนยันการจอง'>
    </form>
    </div>
    </div>
    </div>
    </div>

<script>
    function validateForm() {
        var checkin = document.getElementById('checkin').value;
        var checkout = document.getElementById('checkout').value;

        if (new Date(checkout) <= new Date(checkin)) {
            alert("Checkout date must be after check-in date");
            return false;
        }
        return true;
    }
</script>

<script>
$(document).ready(function() {
    var urlParams = new URLSearchParams(window.location.search);
    var room_id = urlParams.get('room_id');

    display_events(room_id);
}); 

function display_events(room_id) {
    var events = [];
    $.ajax({
        url: 'display_event.php',
        dataType: 'json',
        success: function (response) {
            var result = response.data;
            $.each(result, function (i, item) {
                if (result[i].title === room_id) {
                    var startDate = moment(result[i].start);
                    var endDate = moment(result[i].end);
                    var currentDate = startDate.clone();

                    while (currentDate.isBefore(endDate, 'day') || currentDate.isSame(endDate, 'day')) {
                        events.push({
                            bkdetail_id: result[i].bkdetail_id,
                            title: result[i].title,
                            start: currentDate.format('YYYY-MM-DD'),
                            color: result[i].color,
                            url: result[i].url
                        });
                        currentDate.add(1, 'days');
                    }
                }
            });

            var calendar = $('#calendar').fullCalendar({
                defaultView: 'month',
                aspectRatio: 1,
                timeZone: 'local',
                editable: false,
                selectable: true,
                selectHelper: true,
                select: function(start, end) {
                    $('#checkin').val(moment(start).format('YYYY-MM-DD'));
                    $('#checkout').val(moment(end).subtract(1, 'days').format('YYYY-MM-DD'));
                    $('#event_entry_modal').modal('show');
                },
                events: events,
                eventRender: function(event, element, view) {
                }
            });
        },
        error: function (xhr, status) {
            alert(response.msg);
        }
    });
}
</script>
</body>
</html>