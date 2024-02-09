<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drivers</title>
</head>
<body>
    <h1>List of drivers</h1>
    <ul>
        <?php

use App\Http\Controllers\DriversController;

        $obj = new DriversController();
        $drivers = $obj->getDriversList();
        foreach($drivers as $driver)
        { ?>
            <li><a href="{{route('driversInfo', ['id' => $driver[0], 'driver_id' => $driver[0]]) }}"><?php echo $driver[0]?></a><?php echo " " . $driver[1]; ?></li>
    
        <?php  } ?>
    </ul>
</body>
</html>