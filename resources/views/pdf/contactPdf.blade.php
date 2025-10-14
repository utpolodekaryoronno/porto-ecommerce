<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Contact PDF</title>
    <style>
        body { font-family: sans-serif; color: #333; }
        h2 { color: #007BFF; }
        p { margin: 4px 0; }
        .p-30px{
            padding: 30px;
        }
    </style>
</head>
<body>
    <div class="p-30px">
        <h2>Contact Information</h2>
        <p><strong>Name:</strong> {{ $name }}</p>
        <p><strong>Email:</strong> {{ $email }}</p>
        <p><strong>Phone:</strong> {{ $phone }}</p>
        <p><strong>Address:</strong> {{ $address }}</p>
    </div>
</body>
</html>
