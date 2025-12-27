@extends('admin.masterlayout')
@section('content')
<style>
/* ================================
   Professional Red & White Users Table
   ================================ */
.table-container {
    max-width: 1000px;
    margin: 30px auto;
    padding: 20px;
    border-radius: 20px;
    background: #fff;
    box-shadow: 0 15px 35px rgba(211, 47, 47, 0.15);
    transition: all 0.3s ease;
}

.table.table-bordered {
    width: 100%;
    border: none;
    border-radius: 16px;
    border-collapse: separate;
    border-spacing: 0;
    table-layout: fixed;
    word-wrap: break-word;
    background: linear-gradient(135deg, #fff 0%, #fffafa 100%);
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
    padding: 14px 10px;
    border: none;
    text-align: center;
    text-shadow: 0 1px 2px rgba(0,0,0,0.2);
}

/* Body rows */
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

/* Table cells */
.table.table-bordered td {
    padding: 12px 8px;
    font-weight: 500;
    vertical-align: middle;
    overflow-wrap: break-word;
    text-align: center;
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

/* Responsive */
@media (max-width: 768px) { 
    .table td, .table th { padding: 10px 5px; font-size:0.75em; } 
    .table-container { max-width: 95%; padding: 15px; }
}
</style>

<div class="table-container">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th class="id">User ID</th>
        <th class="name">User Name</th>
        <th class="email">User Email</th>
        <th class="role">User Role</th>
      </tr>
    </thead>
    <tbody>
      @foreach($Users as $User)
      <tr>
        <td class="id">{{$User->id}}</td>
        <td class="name">{{$User->name}}</td>
        <td class="email">{{$User->email}}</td>
        <td class="role">{{$User->role}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
 <div class="export-wrapper">
    <a href="/exporttoexcel" class="btn-export">
        <i class="fas fa-file-excel"></i> Download Excel Report
    </a>
</div>



</div>
@endsection
