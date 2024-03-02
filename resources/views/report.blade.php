<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
</head>
<body>
    <h1>Web report of Monaco 2018 Racing</h1>
    <div>

    </div>
    @if($order == 'desc')
    @foreach(array_reverse($report) as $driver)
        <div>
            {{ $driver['name'] }} | {{ $driver['car']}} | {{ $driver['time']}}
        </div>
    @endforeach 

    @else
    @foreach($report as $driver)
        <div>
            {{ $driver['name'] }} | {{ $driver['car']}} | {{ $driver['time']}}
        </div>
    @endforeach
    @endif
   
        
</body>
</html>