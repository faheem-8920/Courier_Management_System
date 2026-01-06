<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CourierManagementSystem – Message Reply</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
            font-family: Arial, Helvetica, sans-serif;
        }

        .wrapper {
            width: 100%;
            padding: 30px 0;
        }

        .container {
            max-width: 680px;
            margin: auto;
            background: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 6px 18px rgba(0,0,0,0.1);
        }

        /* Header */
        .header {
            background: #dc3545;
            color: #ffffff;
            padding: 22px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 26px;
            letter-spacing: 0.5px;
        }

        .header span {
            display: block;
            margin-top: 5px;
            font-size: 13px;
            opacity: 0.9;
        }

        /* Tracking bar */
        .tracking {
            background: #fff3f3;
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #f1f1f1;
        }

        .tracking strong {
            color: #dc3545;
        }

        /* Content */
        .content {
            padding: 30px;
            color: #333;
        }

        .content h2 {
            margin-top: 0;
            color: #dc3545;
            font-size: 20px;
        }

        .content p {
            font-size: 15px;
            line-height: 1.7;
        }

        /* Status Box */
        .status-box {
            margin: 25px 0;
            border: 1px dashed #dc3545;
            background: #fff9f9;
            border-radius: 8px;
            padding: 20px;
        }

        .status-title {
            font-weight: bold;
            color: #dc3545;
            margin-bottom: 10px;
            font-size: 14px;
            text-transform: uppercase;
        }

        .status-message {
            font-size: 15px;
            color: #333;
        }

        /* Footer */
        .footer {
            background: #fafafa;
            border-top: 1px solid #eaeaea;
            text-align: center;
            padding: 20px;
            font-size: 13px;
            color: #777;
        }

        .footer strong {
            color: #dc3545;
        }

        @media (max-width: 600px) {
            .content {
                padding: 20px;
            }
            .header h1 {
                font-size: 22px;
            }
        }
    </style>
</head>
<body>

<div class="wrapper">
    <div class="container">

        <!-- Header -->
        <div class="header">
            <h1>CourierManagementSystem</h1>
            <span>Fast • Reliable • Secure Deliveries</span>
        </div>

        <!-- Tracking Style Info -->
        <div class="tracking">
            📦 <strong>Message Status:</strong> Replied by Support Team
        </div>

        <!-- Content -->
        <div class="content">
            <h2>Hello {{ $name }},</h2>

            <p>
                Your request has been successfully received and processed by
                <strong>CourierManagementSystem</strong>.
                Below is the official response from our support team.
            </p>

            <!-- Reply styled like shipment status -->
            <div class="status-box">
                <div class="status-title">Support Response</div>
                <div class="status-message">
                    {{ $reply }}
                </div>
            </div>

            <p>
                If you need further assistance or have another query,
                feel free to reply to this email. We’re always here to help.
            </p>

            <p>
                Regards,<br>
                <strong>CourierManagementSystem Support Team</strong>
            </p>
        </div>

        <!-- Footer -->
        <div class="footer">
            © {{ date('Y') }} <strong>CourierManagementSystem</strong><br>
            This email is system generated. Please do not share sensitive information.
        </div>

    </div>
</div>

</body>
</html>
