<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Shipment Rejected</title>
</head>
<body style="margin:0; padding:0; font-family:Arial,sans-serif; background-color:#f5f5f5; color:#333;">
    <table width="100%" cellpadding="0" cellspacing="0" bgcolor="#f5f5f5">
        <tr>
            <td align="center">

                <!-- Main Container -->
                <table width="680" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="margin:30px auto; border-radius:15px; overflow:hidden; box-shadow:0 8px 25px rgba(0,0,0,0.1);">
                    
                    <!-- Header -->
                    <tr>
                        <td style="background:linear-gradient(135deg, #d32f2f, #b71c1c); padding:25px; text-align:center;">
                            <h1 style="margin:0; color:#fff; font-size:26px;">❌ Shipment Rejected</h1>
                        </td>
                    </tr>

                    <!-- Greeting -->
                    <tr>
                        <td style="padding:25px;">
                            <p style="margin:0 0 10px 0; font-size:16px;">Hi <strong>{{ $shipment->ReceiverName }}</strong>,</p>
                            <p style="margin:0 0 20px 0; font-size:16px;">We regret to inform you that your shipment with Tracking ID <strong>{{ $shipment->TrackingNumber }}</strong> has been <strong style="color:#d32f2f;">rejected</strong> by our admin.</p>
                        </td>
                    </tr>

                    <!-- Shipment Info -->
                    <tr>
                        <td style="padding:25px; background:#fff0f0; border-radius:12px; margin-bottom:15px;">
                            <h3 style="margin:0 0 12px 0; font-size:20px; color:#d32f2f;">📦 Shipment Details</h3>
                            <table width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse; font-size:14px;">
                                <tr><th align="left" style="padding:6px 0; color:#d32f2f;">Tracking ID:</th><td>{{ $shipment->TrackingNumber }}</td></tr>
                                <tr><th align="left" style="padding:6px 0; color:#d32f2f;">Sender Name:</th><td>{{ $shipment->SenderName }}</td></tr>
                                <tr><th align="left" style="padding:6px 0; color:#d32f2f;">Receiver Name:</th><td>{{ $shipment->ReceiverName }}</td></tr>
                                <tr><th align="left" style="padding:6px 0; color:#d32f2f;">Parcel Type:</th><td>{{ $shipment->ParcelType ?? 'Standard' }}</td></tr>
                                <tr><th align="left" style="padding:6px 0; color:#d32f2f;">Weight:</th><td>{{ $shipment->Weight ?? '—' }} kg</td></tr>
                                <tr><th align="left" style="padding:6px 0; color:#d32f2f;">Rejection Reason:</th><td>{{ $shipment->RejectionReason ?? 'No reason provided' }}</td></tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Support Info -->
                    <tr>
                        <td style="padding:25px; background:#fff8f8; border-radius:12px;">
                            <h3 style="margin:0 0 12px 0; font-size:20px; color:#d32f2f;">📞 Support Contact</h3>
                            <p style="margin:0 0 8px 0; font-size:14px;">If you have any questions or need further assistance, please contact our support team:</p>
                            <p style="margin:0; font-size:14px;">
                                Email: <a href="mailto:support@courier.com" style="color:#d32f2f; text-decoration:none;">support@courier.com</a><br/>
                                Phone: <span style="color:#d32f2f;">+1 (555) 123-4567</span>
                            </p>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="padding:25px; text-align:center; font-size:14px; color:#555;">
                            Thank you for using our courier service!<br/>
                            We value your trust and apologize for any inconvenience caused.
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>
</body>
</html>
