<!DOCTYPE html>
<html>
<head>
    <title>Parcel Delivered</title>
</head>
<body style="margin:0; padding:0; font-family:Arial,sans-serif; background-color:#f8f8f8; color:#333;">
    <table width="100%" cellpadding="0" cellspacing="0" bgcolor="#f8f8f8">
        <tr>
            <td align="center">
                <table width="680" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="margin:30px auto; border-radius:12px; overflow:hidden; box-shadow:0 6px 20px rgba(0,0,0,0.1);">
                    
                    <!-- Header -->
                    <tr>
                        <td style="background-color:#c62828; padding:25px; text-align:center;">
                            <h2 style="margin:0; color:#fff; font-size:24px;">📦 Parcel Delivered Successfully!</h2>
                        </td>
                    </tr>

                    <!-- Greeting -->
                    <tr>
                        <td style="padding:25px;">
                            <p style="margin:0 0 10px 0; font-size:16px;">Hi <strong>{{ $shipment->SenderName }}</strong>,</p>
                            <p style="margin:0 0 20px 0; font-size:16px;">Your parcel with tracking number <strong>{{ $shipment->tracking_number }}</strong> has been delivered. See the delivery progress below:</p>
                        </td>
                    </tr>

                    <!-- Timeline -->
                    <tr>
                        <td style="padding:0 25px 25px 25px;">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <!-- Picked Up -->
                                    <td align="center" width="33%">
                                        <div style="width:50px; height:50px; border-radius:50%; background:#c62828; color:#fff; font-size:22px; line-height:50px; text-align:center; margin:auto;">📥</div>
                                        <div style="margin-top:8px; font-weight:bold; color:#c62828;">Picked Up</div>
                                        <small style="color:#555;">{{ $shipment->PickedUpAt }}</small>
                                    </td>
                                    <!-- In Transit -->
                                    <td align="center" width="33%">
                                        <div style="width:50px; height:50px; border-radius:50%; background:#e53935; color:#fff; font-size:22px; line-height:50px; text-align:center; margin:auto;">🚚</div>
                                        <div style="margin-top:8px; font-weight:bold; color:#e53935;">In Transit</div>
                                        <small style="color:#555;">{{ $shipment->InTransitAt ?? '—' }}</small>
                                    </td>
                                    <!-- Delivered -->
                                    <td align="center" width="33%">
                                        <div style="width:50px; height:50px; border-radius:50%; background:#2e7d32; color:#fff; font-size:22px; line-height:50px; text-align:center; margin:auto;">✅</div>
                                        <div style="margin-top:8px; font-weight:bold; color:#2e7d32;">Delivered</div>
                                        <small style="color:#555;">{{ $shipment->DeliveredAt }}</small>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Rider Details -->
                    <tr>
                        <td style="padding:25px; background:#fff0f0; border-radius:12px; margin-bottom:15px;">
                            <h3 style="margin:0 0 15px 0; font-size:20px; color:#c62828;">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAABlBMVEX///8AAABVwtN+AAAAVUlEQVQYV2NgwA8YGBgYGD4j4GRkZGKg4uLi5eTk5GbNwQXKpMFcSCwrGZkYmISw+g4+Lo4+Pi4uHh5eDi4uLg6uXkYGBgYGAAxRhEBHBxRY2gIAz4MgAANhxR40O+SpwAAAABJRU5ErkJggg==" alt="Rider" width="22" height="22" style="vertical-align:middle; margin-right:6px;"/>
                                Rider Details
                            </h3>
                            <table width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse; font-size:14px;">
                                <tr><th align="left" style="padding:6px 0; color:#c62828;">Name:</th><td>{{ $shipment->rider->Fullname ?? 'N/A' }}</td></tr>
                                <tr><th align="left" style="padding:6px 0; color:#c62828;">Email:</th><td>{{ $shipment->rider->Email ?? 'N/A' }}</td></tr>
                                <tr><th align="left" style="padding:6px 0; color:#c62828;">Phone:</th><td>{{ $shipment->rider->Phone ?? 'N/A' }}</td></tr>
                                <tr><th align="left" style="padding:6px 0; color:#c62828;">Status:</th><td style="color:#2e7d32; font-weight:bold;">Delivered</td></tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Sender & Receiver -->
                    <tr>
                        <td style="padding:25px; background:#fff8f8; border-radius:12px;">
                            <h3 style="margin:0 0 15px 0; font-size:20px; color:#c62828;">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAABlBMVEX///8AAABVwtN+AAAAW0lEQVQYV2NgwA8YGBgYGD4j4GRkZGBgYGBYGBiYmJiY2NjY2BgaGhoaGBgaGAAO8oQSC5EmQQ5iMk0YpE/8wqgqoqI0SB6gw8iQyQgAAGhEBZp+oPnAAAAAElFTkSuQmCC" alt="Sender" width="22" height="22" style="vertical-align:middle; margin-right:6px;"/>
                                Sender & Receiver
                            </h3>
                            <table width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse; font-size:14px;">
                                <tr><th align="left" style="padding:6px 0; color:#c62828;">Sender Name:</th><td>{{ $shipment->SenderName }}</td></tr>
                                <tr><th align="left" style="padding:6px 0; color:#c62828;">Sender Email:</th><td>{{ $shipment->SenderEmail }}</td></tr>
                                <tr><th align="left" style="padding:6px 0; color:#c62828;">Receiver Name:</th><td>{{ $shipment->ReceiverName }}</td></tr>
                                <tr><th align="left" style="padding:6px 0; color:#c62828;">Receiver Phone:</th><td>{{ $shipment->ReceiverPhone }}</td></tr>
                                <tr><th align="left" style="padding:6px 0; color:#c62828;">Receiver Address:</th><td>{{ $shipment->ReceiverAddress }}</td></tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="padding:25px; text-align:center; font-size:14px; color:#555;">
                            Thank you for choosing our courier service!<br/>
                            We value your trust and delivery experience.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
