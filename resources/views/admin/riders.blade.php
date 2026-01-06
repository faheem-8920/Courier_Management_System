@extends('admin.masterlayout')

@section('content')
<style>
/* ================================
   Professional Red & White Riders Table
   ================================ */
.table-container {
    max-width: 1100px;
    margin: 30px auto;
    padding: 20px;
    border-radius: 20px;
    background: #fff;
    box-shadow: 0 15px 35px rgba(211, 47, 47, 0.15);
    overflow-x: hidden;
    transition: all 0.3s ease;
}

.table.table-bordered {
    width: 100%;
    border: none;
    border-radius: 16px;
    border-collapse: separate;
    border-spacing: 0;
    background: linear-gradient(135deg, #fff 0%, #fffafa 100%);
    table-layout: fixed;
    word-wrap: break-word;
}

.table.table-bordered thead {
    background: linear-gradient(145deg, #d32f2f 0%, #b71c1c 100%);
    position: sticky;
    top: 0;
    z-index: 10;
}

.table.table-bordered thead th {
    color: #fff;
    font-weight: 700;
    text-transform: uppercase;
    font-size: 0.85em;
    padding: 14px 10px;
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
    transform: translateY(-2px) scale(1.005);
    box-shadow: 0 8px 15px rgba(211,47,47,0.1);
}

.table.table-bordered td {
    padding: 12px 8px;
    font-weight: 500;
    vertical-align: middle;
    text-align: center;
    overflow-wrap: break-word;
}

.table.table-bordered th, .table.table-bordered td {
    max-width: 200px;
}

/* Status Badge */
.status-badge {
    display: inline-block;
    padding: 4px 10px;
    border-radius: 16px;
    font-weight: 600;
    font-size: 0.8em;
    text-transform: uppercase;
    position: relative;
    overflow: hidden;
    box-shadow: 0 1px 4px rgba(0,0,0,0.1);
}

.status-badge.active { background: linear-gradient(135deg, #4caf50 0%, #2e7d32 100%); color:white; }
.status-badge.pending { background: linear-gradient(135deg, #f44336 0%, #d32f2f 100%); color:white; }
.status-badge.inactive { background: linear-gradient(135deg, #ff9800 0%, #f57c00 100%); color:white; }

/* Action Buttons Container */
.action-buttons {
    display: flex;
    gap: 6px;
    justify-content: center;
    flex-wrap: wrap;
}

/* Common Button Styles */
.btn-action {
    padding: 6px 12px;
    border: none;
    border-radius: 6px;
    font-size: 0.85em;
    font-weight: 600;
    color: #fff;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 4px;
    transition: all 0.3s ease;
}

/* View Button */
.view-btn {
    background: linear-gradient(135deg, #2196f3 0%, #1565c0 100%);
}
.view-btn:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 12px rgba(33,150,243,0.3);
}

/* Update Button */
.update-btn {
    background: linear-gradient(135deg, #ff9800 0%, #f57c00 100%);
}
.update-btn:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 12px rgba(255,152,0,0.3);
}

/* Delete Button */
.delete-btn {
    background: linear-gradient(135deg, #f44336 0%, #d32f2f 100%);
}
.delete-btn:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 12px rgba(244,67,54,0.3);
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
}

/* Responsive */
@media (max-width: 768px) { 
    .table td, .table th { padding: 8px 5px; font-size:0.75em; } 
    .table-container { max-width: 95%; padding: 15px; }
    .btn-action { font-size: 0.7em; padding: 4px 8px; }
}
</style>

<div class="table-container">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Fullname</th>
        <th>Status</th>
        <th>Email</th>
        <th>Zone</th>
        <th style="width: 36%;">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($riders as $rider)
      <tr>
        <td>{{ $rider->Fullname }}</td>
        <td><span class="status-badge {{ $rider->status }}">{{ $rider->status }}</span></td>
        <td>{{ $rider->Email }}</td>
        <td>{{ $rider->WorkingZone }}</td>
        <td>
            <div class="action-buttons">
                <!-- View -->
                <form method="get" action="{{ url('/showriderdetails/'.$rider->id) }}">
                    @csrf
                    <button type="submit" class="btn-action view-btn">
                        <i class="fas fa-eye"></i> View
                    </button>
                </form>

                <!-- Update -->
                <form method="get" action="{{ url('/getriderdetails/'.$rider->id) }}">
                    @csrf
                    <button type="submit" class="btn-action update-btn">
                        <i class="fas fa-edit"></i> Update
                    </button>
                </form>

                <!-- Delete -->
                <form method="post" action="{{ url('/delete/'.$rider->id) }}">
                    @csrf
                    <button type="submit" class="btn-action delete-btn" onclick="return confirm('Are you sure?')">
                        <i class="fas fa-trash-alt"></i> Delete
                    </button>
                </form>
            </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <div class="export-wrapper">
    <a href="/exporttoexcel2" class="btn-export">
        <i class="fas fa-file-excel"></i> Download Excel Report
    </a>
  </div>
</div>

<!-- Font Awesome for icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

@endsection
