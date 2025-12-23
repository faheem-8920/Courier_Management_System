<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Courier Invoice</title>

<style>
@page {
    size: A4;
    margin: 10px;
}

body{
    font-family: DejaVu Sans, Arial, sans-serif;
    font-size:10.5px;
    color:#333;
    margin:0;
    padding:0;
    background:#f7f7f7;
}
table{
    width:100%;
    border-collapse:collapse;
    page-break-inside:avoid;
}
td,th{
    padding:6px;
    border:1px solid #ddd;
    vertical-align:top;
}
.invoice-box{
    border:2px solid #e74a3b;
    padding:10px;
    background:#fff;
    page-break-inside:avoid;
    box-shadow:0 0 5px rgba(0,0,0,0.1);
    border-radius:5px;
}

/* HEADER */
.system-header{
    text-align:center;
    padding:10px 0;
    border-bottom:2px solid #e74a3b;
}
.system-header h1{
    margin:0;
    font-size:22px;
    color:#e74a3b;
}
.system-header p{
    margin:2px 0 0;
    font-size:11px;
    color:#555;
}

/* IMAGE */
.image-header img{
    width:100%;
    height:100px;
    object-fit:cover;
    border-bottom:2px solid #e74a3b;
}

/* TITLES */
.title-row{
    background:#e74a3b;
    color:#fff;
    font-size:16px;
    font-weight:bold;
    text-align:center;
    padding:8px;
    letter-spacing:0.5px;
    border-radius:3px;
}
.section-title{
    background:#fbeaea;
    color:#e74a3b;
    font-weight:bold;
    text-transform:uppercase;
    font-size:11px;
    padding:5px;
}

/* META */
.meta-table td{
    border:none;
    padding:3px 6px;
    font-size:10.5px;
}
.label{
    font-weight:bold;
    background:#fafafa;
    width:22%;
}
.status{
    background:#e74a3b;
    color:#fff;
    padding:3px 6px;
    font-weight:bold;
    font-size:10px;
    border-radius:3px;
}

/* EXTRA SECTIONS */
.info-section{
    margin-top:8px;
    border:1px solid #ddd;
    page-break-inside:avoid;
    border-radius:3px;
}
.info-section h3{
    margin:0;
    padding:5px 8px;
    background:#e74a3b;
    color:#fff;
    font-size:12px;
    border-top-left-radius:3px;
    border-top-right-radius:3px;
}
.info-section ul{
    margin:4px 12px;
    padding:0;
    list-style-type: disc;
}
.info-section li{
    margin-bottom:3px;
    font-size:9.5px;
}

/* QR CODE */
.qr-section{
    text-align:center;
    margin-top:10px;
}
.qr-section img{
    width:80px;
    height:80px;
}

/* FOOTER */
.footer{
    border-top:2px solid #e74a3b;
    margin-top:10px;
    padding-top:6px;
    text-align:center;
    font-size:9.5px;
    color:#555;
}

/* ENHANCED TABLE STYLING */
table th {
    background:#fbeaea;
    color:#e74a3b;
    font-weight:bold;
    font-size:10.5px;
    padding:5px;
}
table td{
    font-size:10px;
    padding:5px;
}

/* COMPACT SPACING */
td,th{
    line-height:1.2;
}
</style>
</head>

<body>

<div class="invoice-box">

<!-- SYSTEM NAME -->
<div class="system-header">
    <h1>Courier Management System</h1>
    <p>Fast • Secure • Reliable Delivery</p>
</div>

<!-- IMAGE -->
<table class="image-header">
<tr>
<td style="border:none;padding:0;">
<img src="{{ public_path('img/truckimg.jpeg') }}">
</td>
</tr>
</table>

<!-- TITLE -->
<table>
<tr>
<td class="title-row">
Courier Invoice — Tracking No: {{ $courier->TrackingNumber }}
</td>
</tr>
</table>

<!-- META -->
<table class="meta-table">
<tr>
<td><strong>Status:</strong> <span class="status">{{ strtoupper($courier->Status) }}</span></td>
<td><strong>Date:</strong> {{ $courier->created_at->format('d M Y') }}</td>
<td><strong>User ID:</strong> {{ $courier->UserId }}</td>
</tr>
</table>

<!-- SENDER / RECEIVER -->
<table>
<tr>
<th colspan="2" class="section-title">Sender Details</th>
<th colspan="2" class="section-title">Receiver Details</th>
</tr>
<tr>
<td class="label">Name</td><td>{{ $courier->SenderName }}</td>
<td class="label">Name</td><td>{{ $courier->ReceiverName }}</td>
</tr>
<tr>
<td class="label">Phone</td><td>{{ $courier->SenderPhone }}</td>
<td class="label">Phone</td><td>{{ $courier->ReceiverPhone }}</td>
</tr>
<tr>
<td class="label">Email</td><td>{{ $courier->SenderEmail }}</td>
<td class="label">Email</td><td>{{ $courier->ReceiverEmail }}</td>
</tr>
</table>

<!-- ADDRESS -->
<table>
<tr><th colspan="4" class="section-title">Addresses</th></tr>
<tr>
<td class="label">Pickup</td>
<td colspan="3">{{ $courier->PickupAddress }}</td>
</tr>
<tr>
<td class="label">Delivery</td>
<td colspan="3">{{ $courier->DeliveryAddress }}</td>
</tr>
</table>

<!-- SHIPMENT -->
<table>
<tr><th colspan="6" class="section-title">Shipment Details</th></tr>
<tr>
<td class="label">Zone</td><td>{{ $courier->DeliveryZone }}</td>
<td class="label">Type</td><td>{{ $courier->DeliveryType }}</td>
<td class="label">Weight</td><td>{{ $courier->ParcelWeight }} kg</td>
</tr>
</table>

<!-- RULES & SUPPORT -->
<div class="info-section">
<h3>Rules & Support</h3>
<ul>
<li>Charges are non-refundable after dispatch.</li>
<li>Incorrect address may cause delivery delay.</li>
<li>Report damage within 24 hours.</li>
<li>Support: support@courierms.com | +92-300-0000000</li>
</ul>
</div>

<!-- MORE INFORMATION -->
<div class="info-section">
<h3>More Information</h3>
<ul>
<li>Keep this invoice for tracking and reference.</li>
<li>Deliveries may be delayed due to weather or traffic.</li>
<li>All parcels are insured; report lost/damaged items immediately.</li>
<li>Track your parcel using the Tracking Number provided.</li>
</ul>
</div>

<!-- NOTES / INSTRUCTIONS -->
<div class="info-section">
<h3>Notes / Instructions</h3>
<ul>
<li>Ensure recipient is available at the delivery address.</li>
<li>Handle fragile items with care.</li>
<li>For urgent deliveries, contact support immediately.</li>
<li>Verify all details before dispatch.</li>
</ul>
</div>


<!-- FOOTER -->
<div class="footer">
Thank you for choosing <strong>Courier Management System</strong><br>
Generated on {{ now()->format('d M Y, h:i A') }}
</div>

</div>

</body>
</html>
