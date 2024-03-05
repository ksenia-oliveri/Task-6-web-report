<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drivers</title>
</head>
<body>
    <h1>List of drivers</h1>
    @if($order == 'desc')
    @foreach(array_reverse($drivers) as $driver)
        <div>
        <a href= '{{ route('report.drivers.info', ['driver_id' => $driver['short-name']])}}'>{{ $driver['short-name'] }}</a> -- {{ $driver['name']}}
        </div>
    @endforeach
    @else
    @foreach($drivers as $driver)
    <div>
        <a href= '{{ route('report.drivers.info', ['driver_id' => $driver['short-name']])}}'>{{ $driver['short-name'] }}</a> -- {{ $driver['name']}}    
    </div>
    @endforeach  
    @endif
</body>
</html>