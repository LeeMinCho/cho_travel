<div>
    <main>
        <section class="section-details-header"></section>
        <section class="section-details-content">
            <div class="container">
                <div class="row">
                    <div class="col p-0">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    Home
                                </li>
                                <li class="breadcrumb-item active">
                                    Paket Travel
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card" style="border-radius: 10px;">
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-8">
                                        <input type="text" class="form-control" placeholder="Search" name="search"
                                            id="search" wire:model="search">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    @foreach ($travel_offers as $travel_offer)
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-img-top">
                                                <img src="{{ asset($travel_offer->travelPackage->galleries->first()['image']) }}"
                                                    class="img-fluid mb-2"
                                                    alt="{{ $travel_offer->travelPackage->title }}" />
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title text-center" style="font-weight: 600;">
                                                    {{ $travel_offer->travelPackage->title }}
                                                    ({{ $travel_offer->travelPackage->country->name }})
                                                    <span
                                                        class="badge {{ $travel_offer->type == 1 ? 'badge-warning' : 'badge-info' }}">
                                                        {{ $travel_offer->type == 1 ? 'Open Trip' : 'Private Trip' }}
                                                    </span>
                                                </h5>
                                                <p class="card-text" style="font-size: 16px;">
                                                    Start:
                                                    {{ date('m/d/Y', strtotime($travel_offer->start_date)) }}<br>
                                                    End: {{ date('m/d/Y', strtotime($travel_offer->end_date)) }}<br>
                                                    Departure From: {{ $travel_offer->departure_from }}<br>
                                                </p>
                                                <div class="row">
                                                    <div class="col-12 text-center">
                                                        <a href="{{ url('package_travel/detail/' . $travel_offer->id) }}"
                                                            class="btn px-4 mt-3"
                                                            style="color: #ffffff; background-color: #eaad11;">View
                                                            Detail</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="row justify-content-center mt-3">
                                    <div class="col-md-8">
                                        {!! $travel_offers->links() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>