@section('title')
Gallery
@endsection
<div>
    <div class="card">
        <div class="card-body">
            <div class="row mb-3 justify-content-between">
                <div class="col-md-2">
                    <button type="button" class="btn btn-block btn-primary" data-toggle="modal"
                        data-target="#modal-gallery" data-backdrop="static" wire:click="create()">
                        <i class="fas fa-plus-circle"></i> Add
                    </button>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-sm" name="search" placeholder="Search"
                            wire:model="search">
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($galleries as $gallery)
                <div class="col-md-3">
                    <div class="card">
                        <a href="{{ asset($gallery->image) }}" class="card-img-top" data-toggle="lightbox"
                            data-title="{{ $gallery->travelPackage->title }}" data-gallery="gallery">
                            <img src="{{ asset($gallery->image) }}" class="img-fluid mb-2"
                                alt="{{ $gallery->travelPackage->title }}" />
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $gallery->travelPackage->title }}
                                ({{ $gallery->travelPackage->country->name }})</h5>
                            <p class="card-text" style="text-overflow: ellipsis">{!! $gallery->travelPackage->about !!}
                            </p>
                            <button type="button" class="btn btn-danger" onclick="deleteImage({{ $gallery->id }})">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body bg-secondary text-center">
                            No Data
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
            <div class="row">
                <div class="col-md-6">
                    <i>Total Record: {{ $count_data }} @if ($search)
                        Filtered: {{ $galleries->total() }}
                        @endif</i>
                </div>
                <div class="col-md-6">
                    <div class="float-right">
                        {!! $galleries->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-gallery" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">@if ($isEdit) Edit @else Create @endif Gallery</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class='form-group'>
                        <label for='travel_package_id'>Travel Package</label>
                        <div select2 @if($errors->has('travel_package_id')) class="border border-danger rounded" @endif>
                            <div wire:ignore>
                                <select id='travel_package_id' name='travel_package_id' class="form-control select2"
                                    style="width: 100%;">
                                    <option value="">- Choose Travel Package -</option>
                                    @foreach ($travel_packages as $travel_package)
                                    <option value="{{ $travel_package->id }}">{{ $travel_package->title }}</option>
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
                    <div class='form-group'>
                        <label for='image'>Image</label>
                        <input type='file' id='image' name='image' accept="image/*"
                            class='form-control @if($errors->has("image")) is-invalid @endif' placeholder='Image'
                            wire:model.lazy='image'>
                        @error('image')
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
        $("#travel_package_id").on("change", function() {
            var travel_package_id = $(this).val();
            @this.set('travel_package_id', travel_package_id);
        });

        window.livewire.on('countryId', (travel_package_id) => {
            $("#travel_package_id").val(travel_package_id).trigger("change");
        });

        window.livewire.on('btnSave', (message) => {
            $('#modal-gallery').modal('hide');
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: message,
                showConfirmButton: false,
                timer: 2000,
            });
        });

        function deleteImage(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes"
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit("deleteImage", id);
                }
            });
        }
    </script>
    @endpush
</div>