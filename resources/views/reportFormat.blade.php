<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Format</title>
</head>
<body>
    @if($format == 'json')
    <div>
        {{ json_encode($report) }}
    </div>
    @elseif($format == 'xml')
    <div>
        {{ file_get_contents('report_XML_Format.xml') }}
        
    </div>
    
    @endif
</body>
</html>