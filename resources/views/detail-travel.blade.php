@extends('layouts.template')

@section('content')
<main>
    <section class="section-details-header"></section>
    <section class="section-details-content">
        <div class="container">
            <div class="row">
                <div class="col p-0">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                Paket Travel
                            </li>
                            <li class="breadcrumb-item active">
                                Details
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 pl-lg-0">
                    <div class="card card-details">
                        <h1>{{ $travel_offer->travelPackage->title }}</h1>
                        <p>{{ $travel_offer->travelPackage->country->name }}</p>
                        @if ($travel_offer->travelPackage->galleries->count())
                        <div class="gallery">
                            <div class="xzoom-container">
                                <img src="{{ asset($travel_offer->travelPackage->galleries->first()->image) }}"
                                    class="xzoom" id="xzoom-default"
                                    xoriginal="{{ asset($travel_offer->travelPackage->galleries->first()->image) }}">
                            </div>
                            <div class="xzoom-thumbs">
                                @foreach ($travel_offer->travelPackage->galleries as $gallery)
                                <a href="{{ asset($gallery->image) }}">
                                    <img src="{{ asset($gallery->image) }}" class="xzoom-galery" width="128"
                                        xpreview="{{ asset($gallery->image) }}">
                                </a>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        <h2>Tentang Wisata</h2>
                        <p>
                            {!! $travel_offer->travelPackage->about !!}
                        </p>
                        <h2>Panduan Wisata</h2>
                        <p>
                            {!! $travel_offer->caption !!}
                        </p>
                        <div class="features row">
                            <div class="col-md-4">
                                <img src="{{ url('assets/frontend/images/ic_event.png') }}" alt=""
                                    class="features-image">
                                <div class="description">
                                    <h3>Featured Event</h3>
                                    <p>{{ $travel_offer->travelPackage->featured_event }}</p>
                                </div>
                            </div>
                            <div class="col-md-4 border-left">
                                <img src="{{ url('assets/frontend/images/ic_language.png') }}" alt=""
                                    class="features-image">
                                <div class="description">
                                    <h3>Language</h3>
                                    <p>{{ $travel_offer->travelPackage->language }}</p>
                                </div>
                            </div>
                            <div class="col-md-4 border-left">
                                <img src="{{ url('assets/frontend/images/ic_foods.png') }}" alt=""
                                    class="features-image">
                                <div class="description">
                                    <h3>Foods</h3>
                                    <p>{{ $travel_offer->travelPackage->foods }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-details card-right">
                        <h2>Trip Informations <span
                                class="badge {{ $travel_offer->type == 1 ? 'badge-warning' : 'badge-info' }}">{{ $travel_offer->type == 1 ? 'Open Trip' : 'Private Trip' }}</span>
                        </h2>
                        <table class="trip-informations">
                            <tr>
                                <th width="50%">Start Trip</th>
                                <td width="50%" class="text-right">
                                    {{ date('F d, Y', strtotime($travel_offer->start_date)) }}</td>
                            </tr>
                            <tr>
                                <th width="50%">End Trip</th>
                                <td width="50%" class="text-right">
                                    {{ date('F d, Y', strtotime($travel_offer->end_date)) }}</td>
                            </tr>
                            <tr>
                                <th width="50%">End Booking</th>
                                <td width="50%" class="text-right">
                                    {{ date('F d, Y', strtotime($travel_offer->end_booking_date)) }}</td>
                            </tr>
                            <tr>
                                <th width="50%">Departure From</th>
                                <td width="50%" class="text-right">
                                    {{ $travel_offer->departure_from }}</td>
                            </tr>
                            <tr>
                                <th width="50%">Price</th>
                                <td width="50%" class="text-right">
                                    {{ number_format($travel_offer->price) }}</td>
                            </tr>
                            <tr>
                                <th width="50%">Min. Quota</th>
                                <td width="50%" class="text-right">
                                    {{ $travel_offer->min_quota }}</td>
                            </tr>
                            <tr>
                                <th width="50%">Max. Quota</th>
                                <td width="50%" class="text-right">
                                    {{ $travel_offer->max_quota }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="join-container">
                        @auth
                        <button type="button" data-target="#modal-booking" data-toggle="modal" data-backdrop="static"
                            class="btn btn-block btn-join-now mt-3 py-2">
                            Booking
                        </button>
                        @endauth
                        @guest
                        <a href="{{ route('login') }}" class="btn btn-block btn-join-now mt-3 py-2">
                            Login or Register to Booking
                        </a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<div class="modal fade" id="modal-booking">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Booking Trip</h4>
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
                <button type="button" class="btn btn-primary">
                    <i class="fas fa-save"></i> Save
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection

@push('custom-style')
<link rel="stylesheet" href="{{ url('frontend/libraries/xzoom/xzoom.css') }}">
@endpush

@push('custom-script')
<script src="{{ url('assets/frontend/libraries/xzoom/xzoom.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.xzoom, .xzoom-galery').xzoom({
            zoomWidth: 500,
            title: false,
            tint: '#333',
            Xoffset: 15,
        });
    });
</script>
@endpush