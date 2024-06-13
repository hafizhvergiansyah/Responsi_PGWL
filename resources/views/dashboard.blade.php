<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="container py-12">
        <div class="card shadow">
            <div class="card-header">
                <h3 class="card-title">Data</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="alert alert-primary center" role="alert">
                            <h4><i class="fa-solid fa-location-dot"></i> Total Tourist Spots</h4>
                            <p style="font-size: 28pt">{{$total_points}}</p>
                        </div>
                    </div>


                    <hr>
        <p>
            Anda login sebagai <span class="fw-bold">{{ Auth::user()->name }}</span> dengan email <span class="fst-italic">{{ Auth::user()->email }}</span>
        </p>
                </div>
            </div>
        </div>



</x-app-layout>
