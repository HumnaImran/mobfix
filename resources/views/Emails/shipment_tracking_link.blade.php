<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email for order tracking</title>
</head>
<body>

    <p>Dear {{ Auth::user()->name }},</p>
<p>Your shipment tracking link is: <a href="{{ $trackingLink }}">{{ $trackingLink }}</a></p>
<p>Thank you for using our service.</p>

</body>
</html>
