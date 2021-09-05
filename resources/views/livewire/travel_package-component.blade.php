@section('title')
TravelPackage
@endsection
<div>
    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-2">
                    <button type="button" class="btn btn-block btn-primary" data-toggle="modal"
                        data-target="#modal-travel_package" data-backdrop="static" wire:click="create()">
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
                            							<th>Id</th>
							<th>Title</th>
							<th>Slug</th>
							<th>About</th>
							<th>Featured Event</th>
							<th>Language</th>
							<th>Foods</th>
							<th>Country Id</th>
							<th>Created At</th>
							<th>Updated At</th>
							<th>Deleted At</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($travel_packages as $travel_package)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            							<td>{{ $travel_package->id }}</td>
							<td>{{ $travel_package->title }}</td>
							<td>{{ $travel_package->slug }}</td>
							<td>{{ $travel_package->about }}</td>
							<td>{{ $travel_package->featured_event }}</td>
							<td>{{ $travel_package->language }}</td>
							<td>{{ $travel_package->foods }}</td>
							<td>{{ $travel_package->country_id }}</td>
							<td>{{ $travel_package->created_at }}</td>
							<td>{{ $travel_package->updated_at }}</td>
							<td>{{ $travel_package->deleted_at }}</td>

                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                    data-target="#modal-travel_package" data-backdrop="static" wire:click="edit({{ $travel_package->id }})">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="13">No Data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <i>Total Record: {{ $count_data }} @if ($search)
                        Filtered: {{ $travel_packages->total() }}
                        @endif</i>
                </div>
                <div class="col-md-6">
                    <div class="float-right">
                        {!! $travel_packages->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-travel_package" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">@if ($isEdit) Edit @else Create @endif TravelPackage</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    					<div class='form-group'>
                <label for='id'>Id</label>
                <input type='text' id='id' name='id' class='form-control @error('id')
                    is-invalid
                @enderror' placeholder='Id' wire:model.lazy='id'>
                @error('id')
                <div class='invalid-feedback'>
                    {{ $message }}
                </div>
                @enderror
            </div>
					<div class='form-group'>
                <label for='title'>Title</label>
                <input type='text' id='title' name='title' class='form-control @error('title')
                    is-invalid
                @enderror' placeholder='Title' wire:model.lazy='title'>
                @error('title')
                <div class='invalid-feedback'>
                    {{ $message }}
                </div>
                @enderror
            </div>
					<div class='form-group'>
                <label for='slug'>Slug</label>
                <input type='text' id='slug' name='slug' class='form-control @error('slug')
                    is-invalid
                @enderror' placeholder='Slug' wire:model.lazy='slug'>
                @error('slug')
                <div class='invalid-feedback'>
                    {{ $message }}
                </div>
                @enderror
            </div>
					<div class='form-group'>
                <label for='about'>About</label>
                <input type='text' id='about' name='about' class='form-control @error('about')
                    is-invalid
                @enderror' placeholder='About' wire:model.lazy='about'>
                @error('about')
                <div class='invalid-feedback'>
                    {{ $message }}
                </div>
                @enderror
            </div>
					<div class='form-group'>
                <label for='featured_event'>Featured Event</label>
                <input type='text' id='featured_event' name='featured_event' class='form-control @error('featured_event')
                    is-invalid
                @enderror' placeholder='Featured Event' wire:model.lazy='featured_event'>
                @error('featured_event')
                <div class='invalid-feedback'>
                    {{ $message }}
                </div>
                @enderror
            </div>
					<div class='form-group'>
                <label for='language'>Language</label>
                <input type='text' id='language' name='language' class='form-control @error('language')
                    is-invalid
                @enderror' placeholder='Language' wire:model.lazy='language'>
                @error('language')
                <div class='invalid-feedback'>
                    {{ $message }}
                </div>
                @enderror
            </div>
					<div class='form-group'>
                <label for='foods'>Foods</label>
                <input type='text' id='foods' name='foods' class='form-control @error('foods')
                    is-invalid
                @enderror' placeholder='Foods' wire:model.lazy='foods'>
                @error('foods')
                <div class='invalid-feedback'>
                    {{ $message }}
                </div>
                @enderror
            </div>
					<div class='form-group'>
                <label for='country_id'>Country Id</label>
                <input type='text' id='country_id' name='country_id' class='form-control @error('country_id')
                    is-invalid
                @enderror' placeholder='Country Id' wire:model.lazy='country_id'>
                @error('country_id')
                <div class='invalid-feedback'>
                    {{ $message }}
                </div>
                @enderror
            </div>
					<div class='form-group'>
                <label for='created_at'>Created At</label>
                <input type='text' id='created_at' name='created_at' class='form-control @error('created_at')
                    is-invalid
                @enderror' placeholder='Created At' wire:model.lazy='created_at'>
                @error('created_at')
                <div class='invalid-feedback'>
                    {{ $message }}
                </div>
                @enderror
            </div>
					<div class='form-group'>
                <label for='updated_at'>Updated At</label>
                <input type='text' id='updated_at' name='updated_at' class='form-control @error('updated_at')
                    is-invalid
                @enderror' placeholder='Updated At' wire:model.lazy='updated_at'>
                @error('updated_at')
                <div class='invalid-feedback'>
                    {{ $message }}
                </div>
                @enderror
            </div>
					<div class='form-group'>
                <label for='deleted_at'>Deleted At</label>
                <input type='text' id='deleted_at' name='deleted_at' class='form-control @error('deleted_at')
                    is-invalid
                @enderror' placeholder='Deleted At' wire:model.lazy='deleted_at'>
                @error('deleted_at')
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
            $('#modal-role').modal('hide');
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