@section('title')
Travel Offer
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
                            <th>Travel Package</th>
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
                            <td>{{ $travel_offer->travelPackage["title"] }}</td>
                            <td>{{ date("m/d/Y", strtotime($travel_offer->start_date))  }}</td>
                            <td>{{ date("m/d/Y", strtotime($travel_offer->end_date))  }}</td>
                            <td>{{ $travel_offer->type == 1 ? "Open Trip" : "Private Trip" }}</td>
                            <td>{{ $travel_offer->caption }}</td>
                            <td>{{ $travel_offer->min_quota }}</td>
                            <td>{{ $travel_offer->max_quota }}</td>
                            <td>{{ $travel_offer->trip_number }}</td>
                            <td align="right">{{ number_format($travel_offer->price) }}</td>
                            <td>{{ $travel_offer->departure_from }}</td>

                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                    data-target="#modal-travel-offer" data-backdrop="static"
                                    wire:click="edit({{ $travel_offer->id }})">
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">@if ($isEdit) Edit @else Create @endif Travel Offer</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class='form-group'>
                                        <label for='travel_package_id'>Travel Package</label>
                                        <div @if($errors->has("travel_package_id")) class="border border-danger rounded"
                                            @endif>
                                            <div wire:ignore>
                                                <select id='travel_package_id' name='travel_package_id'
                                                    class="form-control select2" style="width: 100%;">
                                                    <option value="">- Choose Travel Package -</option>
                                                    @foreach ($travel_packages as $travel_package)
                                                    <option value="{{ $travel_package->id }}">
                                                        {{ $travel_package->title }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        @error('travel_package_id')
                                        <div class='text-danger small'>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for='start_date'>Start Date</label>
                                        <div @if($errors->has('start_date'))
                                            class="border border-danger rounded" @endif>
                                            <div class="input-group date" id="start_date" data-target-input="nearest"
                                                wire:ignore>
                                                <input type="text" class="form-control datetimepicker-input"
                                                    data-target="#start_date" />
                                                <div class="input-group-append" data-target="#start_date"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @error('start_date')
                                        <div class='text-danger small'>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group">
                                        <label for='end_date'>End Date</label>
                                        <div @if($errors->has('end_date')) class="border border-danger rounded" @endif>
                                            <div class="input-group date" id="end_date" data-target-input="nearest"
                                                wire:ignore>
                                                <input type="text" class="form-control datetimepicker-input"
                                                    data-target="#end_date" />
                                                <div class="input-group-append" data-target="#end_date"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @error('end_date')
                                        <div class='text-danger small'>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group">
                                        <label for='end_booking_date'>End Booking Date</label>
                                        <div @if($errors->has('end_booking_date')) class="border border-danger rounded"
                                            @endif>
                                            <div class="input-group date" id="end_booking_date"
                                                data-target-input="nearest" wire:ignore>
                                                <input type="text" class="form-control datetimepicker-input"
                                                    data-target="#end_booking_date" />
                                                <div class="input-group-append" data-target="#end_booking_date"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @error('end_booking_date')
                                        <div class='text-danger small'>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <!-- /.form group -->
                                    <div class='form-group'>
                                        <label for='type'>Type</label>
                                        <div @if($errors->has('type')) class="border border-danger rounded" @endif>
                                            <div wire:ignore>
                                                <select class="form-control" name="type" id="type">
                                                    <option value="">- Choose Type -</option>
                                                    <option value="1">Open Trip</option>
                                                    <option value="2">Private Trip</option>
                                                </select>
                                            </div>
                                        </div>
                                        @error('type')
                                        <div class='text-danger small'>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class='form-group'>
                                        <label for='caption'>Caption</label>
                                        <textarea id='caption' name='caption' rows="3"
                                            class='form-control @if($errors->has("caption")) is-invalid @endif'
                                            placeholder='Caption' wire:model.lazy='caption'></textarea>
                                        @error('caption')
                                        <div class='invalid-feedback'>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End col --}}
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class='form-group'>
                                        <label for='min_quota'>Min Quota</label>
                                        <input type='number' id='min_quota' name='min_quota'
                                            class='form-control @if($errors->has("min_quota")) is-invalid @endif'
                                            placeholder='Min Quota' wire:model.lazy='min_quota'>
                                        @error('min_quota')
                                        <div class='invalid-feedback'>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class='form-group'>
                                        <label for='max_quota'>Max Quota</label>
                                        <input type='number' id='max_quota' name='max_quota'
                                            class='form-control @if($errors->has("max_quota")) is-invalid @endif'
                                            placeholder='Max Quota' wire:model.lazy='max_quota'>
                                        @error('max_quota')
                                        <div class='invalid-feedback'>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class='form-group'>
                                        <label for='trip_number'>Trip Number</label>
                                        <input type='text' id='trip_number' name='trip_number'
                                            class='form-control @if($errors->has("trip_number")) is-invalid @endif'
                                            placeholder='Trip Number' wire:model.lazy='trip_number'>
                                        @error('trip_number')
                                        <div class='invalid-feedback'>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class='form-group'>
                                        <label for='price'>Price</label>
                                        <input type='text' id='price' name='price'
                                            class='form-control money @if($errors->has("price")) is-invalid @endif'
                                            placeholder='Price' wire:model.lazy='price'>
                                        @error('price')
                                        <div class='invalid-feedback'>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class='form-group'>
                                        <label for='departure_from'>Departure From</label>
                                        <input type='text' id='departure_from' name='departure_from'
                                            class='form-control @if($errors->has("departure_from")) is-invalid @endif'
                                            placeholder='Departure From' wire:model.lazy='departure_from'>
                                        @error('departure_from')
                                        <div class='invalid-feedback'>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End col md --}}
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
        $("#travel_package_id").on("change", function(e) {
            @this.set('travel_package_id', $(this).val());
        });

        $('#start_date, #end_date, #end_booking_date').datetimepicker({
            format: 'L'
        });
        
        $("#start_date").on("change.datetimepicker", function({date, oldDate}) {
            @this.set('start_date', date.format("YYYY-MM-DD"));
        });
        
        $("#end_date").on("change.datetimepicker", function({date, oldDate}) {
            @this.set('end_date', date.format("YYYY-MM-DD"));
        });
        
        $("#end_booking_date").on("change.datetimepicker", function({date, oldDate}) {
            @this.set('end_booking_date', date.format("YYYY-MM-DD"));
        });
        
        $("#type").on("change", function() {
            @this.set('type', $(this).val());
        });

        window.livewire.on("travelPackageId", (travelPackageId) => {
            $("#travel_package_id").val(travelPackageId).trigger("change");
        });
        
        window.livewire.on("type", (type) => {
            $("#type").val(type).trigger("change");
        });
        
        window.livewire.on("startDate", (startDate) => {
            $("#start_date").datetimepicker("date", moment(startDate).format("MM/DD/YYYY"));
        });
        
        window.livewire.on("endDate", (endDate) => {
            $("#end_date").datetimepicker("date", moment(endDate).format("MM/DD/YYYY"));
        });
        
        window.livewire.on("endBookingDate", (endBookingDate) => {
            $("#end_booking_date").datetimepicker("date", moment(endBookingDate).format("MM/DD/YYYY"));
        });

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