<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rider Credentials</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: 40px auto;
            background: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            border-top: 6px solid #e74a3b;
        }

        .header {
            background-color: #e74a3b;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .body {
            padding: 30px 20px;
            color: #333333;
            line-height: 1.6;
        }

        .body h2 {
            color: #e74a3b;
            margin-top: 0;
        }

        .credentials {
            background-color: #f1f1f1;
            padding: 15px;
            border-radius: 6px;
            margin: 20px 0;
            font-family: monospace;
        }

        a.button {
            display: inline-block;
            background-color: #e74a3b;
            color: #ffffff !important;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 6px;
            margin-top: 15px;
        }

        .footer {
            background-color: #f4f6f8;
            text-align: center;
            padding: 15px;
            font-size: 12px;
            color: #888888;
        }

        @media only screen and (max-width: 600px) {
            .email-container {
                margin: 20px;
            }

            .body {
                padding: 20px 15px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">

        <!-- Header -->
        <div class="header">
            <h1>Courier Management System</h1>
        </div>

        <!-- Body -->
        <div class="body">
            <h2>Hello {{ $name }},</h2>

            <p>Your rider account has been successfully created by the admin.</p>

            <div class="credentials">
                <p><strong>Email:</strong> {{ $email }}</p>
                <p><strong>Temporary Password:</strong> {{ $password }}</p>
            </div>

            <p>
                You can use these credentials to login to the Courier Management System. 
                Keep this information secure and do not share it with anyone.
            </p>

            <p>Regards,<br><strong>Admin Team</strong></p>
        </div>

        <!-- Footer -->
        <div class="footer">
            &copy; {{ date('Y') }} Courier Management System. All rights reserved.
        </div>

    </div>
</body>
</html>
