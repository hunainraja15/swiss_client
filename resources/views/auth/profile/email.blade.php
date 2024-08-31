@include('layouts.header')

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            width: 100px;
            height: auto;
        }
        .content {
            font-size: 16px;
            color: #333333;
        }
        .otp {
            font-size: 24px;
            font-weight: bold;
            
            width: max-content;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #777777;
        }
    </style>

<body>

    <div class="container">
        <div class="header">
            <img src="{{ asset('landing\img\image-removebg-preview.png') }}" alt="Company Logo">
        </div>
        <div class="content">
            <p>Hello {{ $data['name'] }},</p>
            <p>Here is your One-Time Password (OTP) for verification:</p>
            <p class="otp bg-primary text-white p-3 rounded">{{ $data['otp'] }}</p>
            <p>Please use this OTP If you did not request this, please ignore this email.</p>
        </div>
        
    </div>
</body>
</html>
