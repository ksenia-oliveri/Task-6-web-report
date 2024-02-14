<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Web report of Monaco 2018 Racing</h1>
<p>Desc order</p>
    <ul>
        <?php

use App\Http\Controllers\ReportController;

        $obj = new ReportController();
        $report = $obj->BuildReport();
        $driversDesc = array_reverse($report);
        foreach($driversDesc as $driver)
        { ?>
            <li><?php echo $driver; ?></li>
    
        <?php  } ?>
    </ul>
</body>
</html>