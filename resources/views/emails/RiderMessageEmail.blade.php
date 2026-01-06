<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $subjectLine }}</title>
    <style>
        /* Reset & base */
        body, html { margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f8f8f8; color: #333; }
        a { text-decoration: none; }

        /* Container */
        .container {
            max-width: 720px;
            margin: 40px auto;
            background: #fff;
            border: 2px solid #dc3545;
            border-radius: 10px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.12);
            overflow: hidden;
        }

        /* Header */
        .header {
            background: #dc3545;
            color: #fff;
            padding: 20px 25px;
            text-align: center;
            font-size: 22px;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        /* Body */
        .body {
            padding: 25px;
            font-size: 16px;
            line-height: 1.6;
            color: #333;
        }
        .body p {
            margin-bottom: 20px;
        }

        /* Highlight box */
        .highlight {
            background: #ffe6e6;
            border-left: 5px solid #dc3545;
            padding: 15px 20px;
            margin-bottom: 20px;
            border-radius: 6px;
        }

        /* Button */
        .btn {
            display: inline-block;
            background: #dc3545;
            color: #fff !important;
            padding: 12px 25px;
            border-radius: 6px;
            font-weight: 600;
            margin-top: 10px;
        }
        .btn:hover {
            background: #b71c1c;
        }

        /* Footer */
        .footer {
            background: #f2f2f2;
            text-align: center;
            font-size: 14px;
            color: #555;
            padding: 15px;
        }

        /* Responsive */
        @media screen and (max-width: 768px) {
            .container { margin: 20px; }
            .header { font-size: 20px; padding: 15px; }
            .body { padding: 20px; font-size: 15px; }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            ✉ Message for {{ $riderName }}
        </div>

        <!-- Body -->
        <div class="body">
            <div class="highlight">
                <strong>Subject:</strong> {{ $subjectLine }}<br>
            </div>

            <p>{{ $messageBody }}</p>

            <!-- Optional Call-to-Action button -->
        </div>

        <!-- Footer -->
        <div class="footer">
            &copy; {{ date('Y') }} Courier Management System. All rights reserved.
        </div>
    </div>
</body>
</html>
