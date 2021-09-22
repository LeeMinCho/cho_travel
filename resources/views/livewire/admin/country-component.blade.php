@section('title')
Country
@endsection
<div>
    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-2">
                    <button type="button" class="btn btn-block btn-primary" data-toggle="modal"
                        data-target="#modal-country" data-backdrop="static" wire:click="create()">
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
                            <th>Code</th>
                            <th>Name</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($countries as $country)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $country->code }}</td>
                            <td>{{ $country->name }}</td>

                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                    data-target="#modal-country" data-backdrop="static"
                                    wire:click="edit({{ $country->id }})">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">No Data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <i>Total Record: {{ $count_data }} @if ($search)
                        Filtered: {{ $countries->total() }}
                        @endif</i>
                </div>
                <div class="col-md-6">
                    <div class="float-right">
                        {!! $countries->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-country" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">@if ($isEdit) Edit @else Create @endif Country</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class='form-group'>
                        <label for='code'>Code</label>
                        <input type='text' id='code' name='code'
                            class='form-control @if($errors->has("code")) is-invalid @endif' placeholder='Code'
                            wire:model.lazy='code'>
                        @error('code')
                        <div class='invalid-feedback'>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class='form-group'>
                        <label for='name'>Name</label>
                        <input type='text' id='name' name='name'
                            class='form-control @if($errors->has("name")) is-invalid @endif' placeholder='Name'
                            wire:model.lazy='name'>
                        @error('name')
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
            $('#modal-country').modal('hide');
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