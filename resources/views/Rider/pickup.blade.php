


@extends('Rider.riderlayout')

@section('content')

<div class="container py-5">

    <div class="text-center mb-4">
        <h2 class="fw-bold">Pickup Requests</h2>
        <p class="text-muted">Assigned pickup locations and parcel details</p>
    </div>

    <div class="card shadow border-0">
        <div class="card-body">

            @if($pickups->count())

            <div class="table-responsive">
                <table class="table align-middle table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Tracking ID</th>
                            <th>Sender</th>
                            <th>Pickup Address</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($pickups as $key => $pickup)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $pickup->TrackingNumber }}</td>
                            <td>{{ $pickup->SenderName }}</td>
                            <td>{{ $pickup->PickupAddress }}</td>
                            <td>
                                <span class="badge bg-warning">Pending Pickup</span>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('rider.accept', $pickup->id) }}">
                                    @csrf
                                    <button class="btn btn-sm btn-success">
                                        Mark Picked
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @else
                <div class="text-center py-5">
                    <i class="fa fa-box-open fa-3x text-muted mb-3"></i>
                    <p class="text-muted">No pickup requests assigned yet</p>
                </div>
            @endif

        </div>
    </div>

</div>



@endsection
