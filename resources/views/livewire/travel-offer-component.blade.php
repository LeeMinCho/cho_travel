@section('title')
TravelOffer
@endsection
<div>
    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-2">
                    <button type="button" class="btn btn-block btn-primary" data-toggle="modal"
                        data-target="#modal-travel-offer" data-backdrop="static" wire:click="create()">
                        <i class="fas fa-plus-circle"></i> Add
                    </button>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-md-2">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-sm" name="search" placeholder="Search"
                            wire:model="search">
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            							<th>Travel Package Id</th>
							<th>Start Date</th>
							<th>End Date</th>
							<th>Type</th>
							<th>Caption</th>
							<th>Min Quota</th>
							<th>Max Quota</th>
							<th>Trip Number</th>
							<th>Price</th>
							<th>Departure From</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($travel_offers as $travel_offer)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            							<td>{{ $travel_offer->travel_package_id }}</td>
							<td>{{ $travel_offer->start_date }}</td>
							<td>{{ $travel_offer->end_date }}</td>
							<td>{{ $travel_offer->type }}</td>
							<td>{{ $travel_offer->caption }}</td>
							<td>{{ $travel_offer->min_quota }}</td>
							<td>{{ $travel_offer->max_quota }}</td>
							<td>{{ $travel_offer->trip_number }}</td>
							<td>{{ $travel_offer->price }}</td>
							<td>{{ $travel_offer->departure_from }}</td>

                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                    data-target="#modal-travel-offer" data-backdrop="static" wire:click="edit({{ $travel_offer->id }})">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="12">No Data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <i>Total Record: {{ $count_data }} @if ($search)
                        Filtered: {{ $travel_offers->total() }}
                        @endif</i>
                </div>
                <div class="col-md-6">
                    <div class="float-right">
                        {!! $travel_offers->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-travel-offer" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">@if ($isEdit) Edit @else Create @endif TravelOffer</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    					<div class='form-group'>
                    <label for='travel_package_id'>Travel Package Id</label>
                    <input type='text' id='travel_package_id' name='travel_package_id' class='form-control @if($errors->has("travel_package_id")) is-invalid @endif' placeholder='Travel Package Id' wire:model.lazy='travel_package_id'>
                    @error('travel_package_id')
                    <div class='invalid-feedback'>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
					<div class='form-group'>
                    <label for='start_date'>Start Date</label>
                    <input type='text' id='start_date' name='start_date' class='form-control @if($errors->has("start_date")) is-invalid @endif' placeholder='Start Date' wire:model.lazy='start_date'>
                    @error('start_date')
                    <div class='invalid-feedback'>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
					<div class='form-group'>
                    <label for='end_date'>End Date</label>
                    <input type='text' id='end_date' name='end_date' class='form-control @if($errors->has("end_date")) is-invalid @endif' placeholder='End Date' wire:model.lazy='end_date'>
                    @error('end_date')
                    <div class='invalid-feedback'>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
					<div class='form-group'>
                    <label for='type'>Type</label>
                    <input type='text' id='type' name='type' class='form-control @if($errors->has("type")) is-invalid @endif' placeholder='Type' wire:model.lazy='type'>
                    @error('type')
                    <div class='invalid-feedback'>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
					<div class='form-group'>
                    <label for='caption'>Caption</label>
                    <input type='text' id='caption' name='caption' class='form-control @if($errors->has("caption")) is-invalid @endif' placeholder='Caption' wire:model.lazy='caption'>
                    @error('caption')
                    <div class='invalid-feedback'>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
					<div class='form-group'>
                    <label for='min_quota'>Min Quota</label>
                    <input type='text' id='min_quota' name='min_quota' class='form-control @if($errors->has("min_quota")) is-invalid @endif' placeholder='Min Quota' wire:model.lazy='min_quota'>
                    @error('min_quota')
                    <div class='invalid-feedback'>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
					<div class='form-group'>
                    <label for='max_quota'>Max Quota</label>
                    <input type='text' id='max_quota' name='max_quota' class='form-control @if($errors->has("max_quota")) is-invalid @endif' placeholder='Max Quota' wire:model.lazy='max_quota'>
                    @error('max_quota')
                    <div class='invalid-feedback'>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
					<div class='form-group'>
                    <label for='trip_number'>Trip Number</label>
                    <input type='text' id='trip_number' name='trip_number' class='form-control @if($errors->has("trip_number")) is-invalid @endif' placeholder='Trip Number' wire:model.lazy='trip_number'>
                    @error('trip_number')
                    <div class='invalid-feedback'>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
					<div class='form-group'>
                    <label for='price'>Price</label>
                    <input type='text' id='price' name='price' class='form-control @if($errors->has("price")) is-invalid @endif' placeholder='Price' wire:model.lazy='price'>
                    @error('price')
                    <div class='invalid-feedback'>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
					<div class='form-group'>
                    <label for='departure_from'>Departure From</label>
                    <input type='text' id='departure_from' name='departure_from' class='form-control @if($errors->has("departure_from")) is-invalid @endif' placeholder='Departure From' wire:model.lazy='departure_from'>
                    @error('departure_from')
                    <div class='invalid-feedback'>
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click.prevent="buttonSave()">
                        <i class="fas fa-save"></i> Save
                    </button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    @push('custom-scripts')
    <script>
        window.livewire.on('btnSave', (message) => {
            $('#modal-travel-offer').modal('hide');
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: message,
                showConfirmButton: false,
                timer: 2000,
            });
        });
    </script>
    @endpush
</div>