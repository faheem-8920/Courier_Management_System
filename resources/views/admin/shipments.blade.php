@extends('admin.masterlayout')
@section('content')
<style>
/* ================================
   Professional Red & White Shipments Table (Responsive)
   ================================ */
.table-container {
    max-width: 1200px;
    margin: 30px auto;
    padding: 20px;
    border-radius: 20px;
    background: #fff;
    box-shadow: 0 15px 35px rgba(211, 47, 47, 0.15);
    transition: all 0.3s ease;
    overflow-x: auto; /* allow horizontal scroll on small screens */
}

.table.table-bordered {
    width: 100%;
    border: none;
    border-radius: 16px;
    border-collapse: separate;
    border-spacing: 0;
    table-layout: auto; /* columns adjust to content */
    background: linear-gradient(135deg, #fff 0%, #fffafa 100%);
    min-width: 600px; /* ensures table stays readable */
}

.table.table-bordered thead {
    background: linear-gradient(145deg, #d32f2f 0%, #b71c1c 100%);
    position: sticky;
    top: 0;
    z-index: 10;
    border-radius: 16px;
}

.table.table-bordered thead th {
    color: #fff;
    font-weight: 700;
    text-transform: uppercase;
    font-size: 0.9em;
    padding: 14px 12px;
    border: none;
    text-align: center;
    text-shadow: 0 1px 2px rgba(0,0,0,0.2);
}

.table.table-bordered tbody tr {
    transition: all 0.35s ease, transform 0.3s ease;
    cursor: pointer;
    background: linear-gradient(90deg, #fff 0%, #fffcfc 100%);
    border-bottom: 1px solid rgba(211,47,47,0.08);
}

.table.table-bordered tbody tr:nth-child(even) {
    background: linear-gradient(90deg, #fffafa 0%, #fff5f5 100%);
}

.table.table-bordered tbody tr:hover {
    transform: translateY(-3px) scale(1.01);
    box-shadow: 0 10px 20px rgba(211,47,47,0.15);
    background: linear-gradient(90deg, #ffe5e5 0%, #fff0f0 100%);
}

.table.table-bordered td {
    padding: 12px 10px;
    font-weight: 500;
    vertical-align: middle;
    white-space: nowrap;
}

/* Column alignment */
td.name, th.name { text-align: left; }
td.status, th.status { text-align: center; }
td.action, th.action { text-align: center; }

/* Status badge */
.status-badge {
    display: inline-block;
    padding: 5px 14px;
    border-radius: 16px;
    font-weight: 600;
    font-size: 0.85em;
    text-transform: uppercase;
    color: #fff;
    transition: all 0.3s ease;
}
.status-badge.pending { background: #f44336; } 
.status-badge.in-progress { background: #ff9800; } 
.status-badge.completed { background: #4caf50; } 

/* Action buttons */
td.action {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    gap: 8px;
    white-space: nowrap;
}
.action-btn {
    padding: 6px 12px;
    border-radius: 12px;
    font-weight: 600;
    font-size: 0.85em;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    color: #fff;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}
.view-btn { background: linear-gradient(135deg, #4caf50 0%, #2e7d32 100%); }
.view-btn:hover { transform: scale(1.05); box-shadow: 0 4px 12px rgba(76,175,80,0.3); }
.delete-btn { background: linear-gradient(135deg, #f44336 0%, #d32f2f 100%); }
.delete-btn:hover { transform: scale(1.05); box-shadow: 0 4px 12px rgba(211,47,47,0.3); }

/* Ripple effect */
.ripple-effect { position: absolute; border-radius: 50%; background: rgba(211,47,47,0.15); transform: scale(0); animation: ripple 0.6s linear; pointer-events: none; }
@keyframes ripple { to { transform: scale(4); opacity:0;} }

/* Responsive */
@media (max-width: 768px) {
    .table-container { padding: 15px; }
    td, th { padding: 8px 6px; font-size: 0.8em; }
    td.action { flex-direction: column; gap: 4px; align-items: flex-start; }
    .action-btn { font-size: 0.75em; padding: 4px 8px; gap: 4px; }
}

/* Export Button */
.export-wrapper {
    display: flex;
    justify-content: flex-end;
    margin-top: 20px;
}

.btn-export {
    background: linear-gradient(135deg, #d32f2f, #b71c1c);
    color: #fff;
    padding: 10px 18px;
    border-radius: 30px;
    font-weight: 600;
    font-size: 0.9em;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 6px 15px rgba(211,47,47,0.3);
}

.btn-export i {
    margin-right: 6px;
}

.btn-export:hover {
    background: linear-gradient(135deg, #b71c1c, #7f0000);
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(211,47,47,0.4);
    color: #fff;
}


/* Column alignment */
td.id, th.id { text-align: center; }
td.name, th.name { text-align: left; }
td.email, th.email { text-align: left; }
td.role, th.role { text-align: center; }

/* Limit column widths */
td, th { max-width: 200px; }
</style>

<div class="table-container">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th class="name">Tracking Id</th>
        <th class="status">Status</th>
        <th class="name">Sender Name</th>
        <th class="name">Receiver Name</th>
        <th class="action">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($Shipments as $Shipment)
      <tr>
        <td class="name">{{$Shipment->TrackingNumber}}</td>
        <td class="status">
            <span class="status-badge {{ strtolower(str_replace(' ', '-', $Shipment->Status)) }}">
                {{$Shipment->Status}}
            </span>
        </td>
        <td class="name">{{$Shipment->SenderName}}</td>
        <td class="name">{{$Shipment->ReceiverName}}</td>
        <td class="action">
            <form method="get" action="/usercourierdetails/{{$Shipment->id}}">
                <button type="submit" class="action-btn view-btn"><i class="fas fa-eye"></i> View</button>
            </form>
            <form  style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this shipment?');">
                @csrf
                <button type="submit" class="action-btn delete-btn"><i class="fas fa-trash-alt"></i> Delete</button>
            </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="export-wrapper">
    <a href="/exporttoexcel3" class="btn-export">
        <i class="fas fa-file-excel"></i> Download Excel Report
    </a>
</div>
</div>
</div>

<!-- FontAwesome -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<script>
// Ripple effect
document.addEventListener('DOMContentLoaded', function() {
    const rows = document.querySelectorAll('.table.table-bordered tbody tr');
    rows.forEach(row => {
        row.addEventListener('click', e => {
            const ripple = document.createElement('div');
            ripple.className = 'ripple-effect';
            row.appendChild(ripple);
            ripple.style.left = e.offsetX + 'px';
            ripple.style.top = e.offsetY + 'px';
            setTimeout(()=>ripple.remove(),600);
        });
    });
});
</script>
@endsection