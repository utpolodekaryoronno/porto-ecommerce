<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Payment Successful</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f8fafc;
      color: #111827;
      margin: 0;
      padding: 40px;
    }

    .email-container {
      max-width: 700px;
      margin: 0 auto;
      background: #ffffff;
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
    }

    h1 {
      font-size: 22px;
      margin-bottom: 10px;
      color: #1e40af;
    }

    p {
      line-height: 1.6;
      font-size: 15px;
      margin-bottom: 16px;
    }

    .signature {
      margin-top: 30px;
      border-top: 1px solid #e5e7eb;
      padding-top: 20px;
    }

    .signature strong {
      display: block;
      font-size: 16px;
      color: #111827;
    }

    .signature span {
      font-size: 14px;
      color: #6b7280;
    }

    @media (max-width: 600px) {
      body {
        padding: 20px;
      }
      .email-container {
        padding: 20px;
      }
    }
  </style>
</head>
<body>
  <div class="email-container">
    <p>{{ $cart }},</p>
    <p>{{$grandTotal}}</p>





    <div class="signature">
      <strong>Utpol Odekary</strong>
      <span>Front-End Developer | Laravel Expert</span><br>
      <span>📧 utpolodekary51@email.com</span>
    </div>
  </div>
</body>
</html>
