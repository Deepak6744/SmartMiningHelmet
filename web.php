<?php

$connect=mysqli_connect("localhost","id21966681_projects","Project@1","id21966681_project") or die(mysqli_connect_error());



if(isset($_GET['back']))
{
echo ' <script language="javascript" type="text/javascript">
parent.document.location="index.php";
</script>';
}
	
$query=mysqli_query($connect,"SELECT * FROM `helmet_iot` WHERE 1 ") or die(mysqli_error($connect));

$row=mysqli_fetch_array($query);

    $temp=$row['temp'];
    $hum=$row['hum'];
    $sm=$row['sm'];
    $ir=$row['ir'];
    $gas=$row['gas'];
    $ph=$row['ph'];
    $n=$row['n'];
    $p=$row['p'];
    $k=$row['k'];
    $s1=$row['s1'];
    $s2=$row['s2'];
    
    if($sm==1)
    {$sm="LOW";
        
    }
    else
    {
        $sm="HIGH";
     
        
    }
    if($gas==1)
    {$gas="Gas Detected";
        
    }
    else
    {
        $gas="No Gas Detected";
     
        
    }
     if($s1==0)
    {
        $s1="Normal";
        
    }
     else 
    {
        $s1="Miner Fainted";
        
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MINING SERVER AREA</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url(https://hexagon.com/-/media/project/one-web/master-site/industries/hxgn-live-industries/undergroundmining-portfolio-marquee.jpg?h=880&iar=0&w=2560&hash=B39A57A8D2FE821036B7A252A73581B9);
            background-attachment: fixed;
        }

        .navbar {
            background: radial-gradient(rgb(19, 30, 37) 24.5%, rgb(19, 30, 37) 66%);
            color: #fff;
            padding: 20px 20px; /* Increased padding for better visibility */
            text-align: center;
            font-size: 24px; /* Larger font size */
            font-weight: bold; /* Bold text */
            text-transform: uppercase; /* Uppercase text */
            letter-spacing: 2px; /* Increased letter spacing */
            border-bottom: 2px solid #fff; /* Bottom border */
            position: relative; /* Position relative for absolute positioning */
            backdrop-filter: blur(10px); /* Add blur effect */
        }
        .logo {
          width: 100px; /* Adjust the width as needed */
          border-radius: 20px;
          height: auto; /* Maintain aspect ratio */
          position: absolute;
          left: 20px; /* Adjust the position from the left */
          top: 50%; /* Align vertically */
          transform: translateY(-50%); /* Center vertically */
        }


        .navbar h1 {
            margin: 0;
            padding: 10px 0;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Text shadow for emphasis */
            color: #fff; /* Text color */
        }

        .navbar marquee {
            position: absolute;
            top: 0;
            left: 20px; /* Adjusted left position */
            font-size: 18px; /* Smaller font size for marquee */
            color: #fff; /* Marquee text color */
        }

        .dashboard {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 60px); /* Subtract navbar height */
        }

        .card-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
            margin-top: 20px; /* Increase margin at the top */
            margin-bottom: 20px; /* Increase margin at the bottom */
        }


        .card {
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            margin: 10px;
            padding: 30px;
            text-align: center;
            width: 80%; /* Adjusted width */
            max-width: 600px; /* Maximum width for larger screens */
            height: 300px;
            transition: transform 0.3s ease-in-out;
            cursor: pointer; /* Add cursor pointer for clickable effect */
            position: relative; /* Position relative for absolute positioning */
        }
        .card:hover {
            transform: scale(1.1); /* Increase scale on hover */
            z-index: 1; /* Ensure hovered card is on top */
        }

        .card h2 {
            margin-top: 0;
            font-size: 28px;
            color: #333;
        }

        .card p {
            margin: 10px 0;
            font-size: 20px;
            color: #777;
        }

        .icon img {
            width: 120px;
            height: 120px;
            margin-bottom: 20px;
            border-radius: 50%; /* Perfectly circular */
        }

        /* Message box styles */
        .message-box {
            position: absolute;
            top: 0;
            right: calc(100% + 20px); /* Position message box to the right */
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            padding: 10px;
            border-radius: 5px;
            display: none;
        }

        .message-box:before {
            content: "";
            position: absolute;
            top: 50%;
            right: -10px;
            border-style: solid;
            border-width: 10px 0 10px 10px;
            border-color: transparent transparent transparent #fff;
            transform: translateY(-50%);
        }

        /* Show message box on card hover */
        .card:hover .message-box {
            display: block;
        }
        .additional-info {
            position: absolute;
            top: 0;
            left: calc(100% + 20px); /* Position to the right of the card */
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            padding: 10px;
            border-radius: 5px;
            display: none;
            z-index: 1; /* Ensure it's above other elements */
        }

        /* Show additional info on card hover */
        .card:hover .additional-info {
            display: block;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRAeayLIFkPkEeKa38YYDxhtznUNJKJ0I9AQHAFI2n3zxjwUyBB_4pKw_R-LXx5MfLUvdk&usqp=CAU" alt="Logo" class="logo">
        <marquee behavior="fix" direction="left corner">BYTE BRIGADE</marquee>
        <h1>MINING SAFETY DASHBOARD</h1>
    </div>

    <div class="dashboard">
        <div class="card-container">
            <div class="card" style="background-image: linear-gradient(to top, #ff0844 0%, #ffb199 100%);" >
                <div class="icon">
                    <img src="https://png.pngtree.com/png-clipart/20230927/original/pngtree-heat-temperature-wave-symbol-logo-icon-light-cool-season-vector-png-image_12889955.png" alt="Temperature Icon">
                </div>
                <h2>Temperature</h2>
                <p>Current Temperature: <?php  echo $temp; ?>°C</p>
                <div class="message-box">
                    <p><b style="color: #595757;">Average Temperature Range :</b>  18°C - 24°C</p>
                </div>
                <div class="additional-info">
                    <!-- Additional information content for the first card -->
                    <img src="https://probots.co.in/pub/media/catalog/product/cache/d8ddd0f9b0cd008b57085cd218b48832/d/h/dht11_humidity_and_temperature_sensor_module_for_arduino-5.jpg" alt="temp sensor" style="height: 200px; width: 200px;">
                </div>
            </div>
            <div class="card" style="background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%);">
                <div class="icon">
                    <img src="https://img.freepik.com/premium-vector/gas-logo_773550-62.jpg" alt="Gas Icon">
                </div>
                <h2>Gas Level</h2>
                <p>Gas Concentration: <?php  echo $gas; ?> ppm</p>
                <div class="message-box">
                    <p> <b style="color: #121212;">Harmfull Gases :</b> Methane[CH4], Carbon Monoxide[CO], Radon[Rn], Particulate Matter[PM]</p>
                </div>
                <div class="additional-info">
                    <!-- Additional information content for the first card -->
                    <img src="https://www.jiomart.com/images/product/original/rvuwbgwrb4/srs-mq-2-mq2-smoke-gas-lpg-butane-hydrogen-gas-sensor-detector-module-pack-4-product-images-orvuwbgwrb4-p600055053-0-202304010045.jpg?im=Resize=(1000,1000)" alt="gas sensor" style="height: 200px; width: 200px;">
                </div>
            </div>
            <div class="card" style="background-image: linear-gradient(to top, #e6b980 0%, #eacda3 100%);">
                <div class="icon">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQOSCsDSxfyaO1DlKP1t4dpF7GQjR3g8jM_S9SBJ__zZg&s" alt="Light Icon">
                </div>
                <h2>Light Level</h2>
                <p>Light Intensity: <?php  echo $ir; ?> Lux</p>
                <div class="message-box">
                    <p><b style="color: #121212;">Average Light Intensity :</b> 1000lux[Daylight], 5-10lux[Dim light]</p>
                </div>
                <div class="additional-info">
                    <!-- Additional information content for the first card -->
                    <img src="https://www.flyrobo.in/image/cache/catalog/lm393-photosensitive-ldr-sensor-module/lm393-photosensitive-ldr-sensor-module1-1000x1000.jpg" alt="ldr sensor" style="height: 200px; width: 200px;">
                </div>
            </div>
            <div class="card" style="background: linear-gradient(to right, #fc4a1a, #f7b733);">
                <div class="icon">
                    <img src="https://t3.ftcdn.net/jpg/00/98/50/44/360_F_98504484_2yO5mCA6GdsfClfHVvVR0pX7GfcDiuqb.jpg" alt="Miner Status Icon">
                </div>
                <h2>Miner Status</h2>
                <p>Worker Status:  <?php  echo $s1; ?> </p>
                <div class="message-box">
                    <p><b style="color: #121212;">Miner Info:</b> Normal or Fainted</p>
                </div>
                <div class="additional-info">
                    <!-- Additional information content for the first card -->
                    <img src="https://m.media-amazon.com/images/I/71XDLlzKgHL.jpg" alt="Accelerometer" style="height: 200px; width: 200px;">
                </div>
            </div>
            <div class="card" style="background: linear-gradient(to bottom right, #4682B4, #87CEEB);">
                <div class="icon">
                    <img src="data:image/png;base64,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" alt="health" Icon">
                </div>
                <h2>Health</h2>
                <p>Heart Beat:  <?php  echo $s2; ?> </p>
                <div class="message-box">
                    <p><b style="color: #121212;">Health Info :</b> <u>Normal</u>-Less than 100BPM <br> <u>SPO2</u> Level-95%-100%</p>
                </div>
                <div class="additional-info">
                    <!-- Additional information content for the first card -->
                    <img src="https://m.media-amazon.com/images/I/51BvHGUYtmL._SL1002_.jpg" alt="Accelerometer" style="height: 200px; width: 200px;">
                </div>
            </div>
            <div class="card" style="background: linear-gradient(to bottom, #323232 0%, #3F3F3F 40%, #1C1C1C 150%), linear-gradient(to top, rgba(255,255,255,0.40) 0%, rgba(0,0,0,0.25) 200%);
            background-blend-mode: multiply;">
                <div class="icon">
                    <img src="https://static.vecteezy.com/system/resources/previews/005/543/156/original/mining-tools-with-pin-map-location-logo-symbol-icon-design-graphic-illustration-vector.jpg" alt="Light Icon">
                </div>
                <h2 style="color: #87CEEB;">Zone Status</h2>
                <p style="color: #dcdddf;">ZONE A <br>ZONE B <br>ZONE C</p>
                <div class="message-box">
                    <p><b style="color: #121212;">ZONE A</b></p>
                </div>
                <div class="additional-info">
                    <!-- Additional information content for the first card -->
                    <img src="https://i.ebayimg.com/images/g/-0cAAOSwC-taJfbb/s-l1200.webp" alt="Accelerometer" style="height: 200px; width: 200px;">
                </div>
            </div>
        </div>
    </div>

    <!-- Simulated JavaScript to update values -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const cards = document.querySelectorAll('.card');
            cards.forEach(card => {
                card.style.display = 'block'; // Show cards after page load
            });
        });
        function enlargeCard(card) {
            card.style.transform = 'scale(1.3)'; // Increase scale to 1.3 when clicked
        }
    </script>
</body>
</html>

