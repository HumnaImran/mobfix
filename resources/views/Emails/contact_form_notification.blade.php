<!DOCTYPE html>
<html>
<head>
    <title>Contact Form Notification</title>
</head>
<body>
    <h1>New Contact Form Submission</h1>

    <p>Name: {{ $data['name'] }}</p>
    <p>Email: {{ $data['email'] }}</p>
    <p>Subject:</p>
    <p>{{ $data['subject'] }}</p>
    <p>Message:</p>
    <p>{{ $data['message'] }}</p>

</body>
</html>
