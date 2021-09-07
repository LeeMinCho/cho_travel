@section('title')
Travel Package
@endsection
<div>
    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-2">
                    <button type="button" class="btn btn-block btn-primary" data-toggle="modal"
                        data-target="#modal-travel-package" data-backdrop="static" wire:click="create()">
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
                            <th>Title</th>
                            <th>Slug</th>
                            <th>About</th>
                            <th>Featured Event</th>
                            <th>Language</th>
                            <th>Foods</th>
                            <th>Country Id</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($travel_packages as $travel_package)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $travel_package->title }}</td>
                            <td>{{ $travel_package->slug }}</td>
                            <td>{{ $travel_package->about }}</td>
                            <td>{{ $travel_package->featured_event }}</td>
                            <td>{{ $travel_package->language }}</td>
                            <td>{{ $travel_package->foods }}</td>
                            <td>{{ $travel_package->country["name"] }}</td>
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                    data-target="#modal-travel-package" data-backdrop="static"
                                    wire:click="edit({{ $travel_package->id }})">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9">No Data</td>
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

    <div class="modal fade" id="modal-travel-package" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">@if ($isEdit) Edit @else Create @endif Travel Package</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class='form-group'>
                        <label for='title'>Title</label>
                        <input type='text' id='title' name='title'
                            class='form-control @if($errors->has("title")) is-invalid @endif' placeholder='Title'
                            wire:model.lazy='title'>
                        @error('title')
                        <div class='invalid-feedback'>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class='form-group'>
                        <label for='about'>About</label>
                        <textarea id='about' name='about' rows="3"
                            class='form-control @if($errors->has("about")) is-invalid @endif' placeholder='About'
                            wire:model.lazy='about'></textarea>
                        @error('about')
                        <div class='invalid-feedback'>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class='form-group'>
                        <label for='featured_event'>Featured Event</label>
                        <input type='text' id='featured_event' name='featured_event'
                            class='form-control @if($errors->has("featured_event")) is-invalid @endif'
                            placeholder='Featured Event' wire:model.lazy='featured_event'>
                        @error('featured_event')
                        <div class='invalid-feedback'>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class='form-group'>
                        <label for='language'>Language</label>
                        <input type='text' id='language' name='language'
                            class='form-control @if($errors->has("language")) is-invalid @endif' placeholder='Language'
                            wire:model.lazy='language'>
                        @error('language')
                        <div class='invalid-feedback'>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class='form-group'>
                        <label for='foods'>Foods</label>
                        <input type='text' id='foods' name='foods'
                            class='form-control @if($errors->has("foods")) is-invalid @endif' placeholder='Foods'
                            wire:model.lazy='foods'>
                        @error('foods')
                        <div class='invalid-feedback'>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class='form-group' wire:ignore>
                        <label for='country_id'>Country Id</label>
                        <select id='country_id' name='country_id'
                            class="form-control select2 @if($errors->has('country_id')) is-invalid @endif"
                            style="width: 100%;">
                            <option value="">- Choose Country -</option>
                            @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                        @error('country_id')
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
        $("#country_id").on("change", function() {
            var country_id = $(this).val();
            @this.set('country_id', country_id);
        });

        window.livewire.on('countryId', (country_id) => {
            $("#country_id").val(country_id).trigger("change");
        });

        window.livewire.on('btnSave', (message) => {
            $('#modal-travel-package').modal('hide');
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