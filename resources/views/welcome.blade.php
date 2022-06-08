@extends('layouts.frontend.master')
@section('title')
    Tulungagung
@endsection

@section('css')
<style>
    .places{
        margin-top: 60px;
        margin-bottom: 60px;
    }
</style>
@endsection



@section('content')
{{-- start banner --}}
<section id="banner">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<p class="promo-title">Tentang Tulungagung</p>
				<p class="text-justify lead"> Tulungagung adalah salah satu kabupaten yang terletak di Provinsi Jawa Timur, Indonesia. Pusat pemerintahan Kabupaten Tulungagung berada di Kecamatan Tulungagung. 
                    Tulungagung terkenal sebagai satu dari beberapa daerah penghasil marmer terbesar di Indonesia. Tulungagung mempunyai banyak destinasi wisata yang terkenal dan akan terus bertambah seiring dengan berjalanya waktu. 
                    Selain destinasi wisata yang terkenal, Tulungagung juga mempunyai beragam kebudayaan dan wisata kuliner yang juga tidak kalah terkenal. Selain industri marmer, 
                    di Tulungagung juga tumbuh dan berkembang berbagai industri kecil dan menengah antara lain memproduksi alat-alat/perkakas rumah tangga, batik, dan konfeksi termasuk bordir. </p>
				<a href="{{ route('about') }}" class="btn btn-info py-2 px-3"><strong>Details</strong></a>
			</div>
			<div class="col-md-6 text-center">

			</div>
		</div>
	</div>
</section>
{{-- end banner --}}

{{-- start place --}}
<div class="container places">
    <div class="row justify-content-center">
        <h1><strong>Wisata Tulungagung</strong></h1>
    </div>
    @forelse ($places as $place)
        <div class="row my-5">
                    <div class="col-md-3">
                        <img  src="{{ asset('storage/place/'. $place->image) }}" alt="" srcset="" class="img-fluid" style="height: 190px; border-radius: 5%">
                    </div>
                    <div class="col-md-9">
                        <h2><strong>{{ $place->name }}</strong></h2>
                        <p>District: <strong>{{ $place->district->name }}</strong></p>
                        <p>Place Type: <strong>{{ $place->placetype->name }}</strong></p>
                        <a href="{{ route('place.details', $place->id) }}" class="btn btn-success">Details</a>
                        <hr>
                    </div>
        </div>
    @empty
            <h2 class="my-5 bg-info text-white text-center p-3">No Place Found. Please add some place.</h2>
     @endforelse
     <a href="{{ route('all.place') }}" class="btn view-more">View More Place</a>
</div>
{{-- end place --}}

{{-- start plan --}}
<div class="container-fluid plan">
    <div class="row text-center">
        <h1  class="m-auto"><strong>Sekilas Informasi</strong></h1>
    </div>
    <div class="row">
        <p style="color: rgb(192, 174, 174)" class="lead m-auto">Apa aja sih yang terkenal di Tulungagung??? </p>
    </div>
    <div class="row text-center">
        <div class="col-md-4">
            <i class="fa fa-heart" aria-hidden="true"></i>
            <h3>Budaya</h3>
            <p>Budaya Tulungagung, budaya yang sudah dikenal di berbagai kota di Indonesia diantaranya ada Ulur-Ulur, Upacara Adat Labuh Laut, Upacara Adat Jamasan Kyai Upas, Kesenian Jaranan & Barongan, dan Reog Kendang.</p>
        </div>

        <div class="col-md-4">
            <i class="fa fa-spoon" aria-hidden="true"></i>
            <h3>Makanan</h3>
            <p>Salah satu masakan berbahan daging ayam yang belum banyak dikenal orang adalah ayam lodho yang berasal dari Tulungagung. Pada dasarnya ayam Lodho adalah daging ayam bakar atau panggang yang dimasak lagi dalam santan dengan bumbu mirip kari pedas. Biasanya orang menggunakan api kecil ketika memasukkan daging ayam yang sudah dipanggang ke dalam bumbu. Api yang berasal dari kayu bakar ini akan mendidihkan santan beserta bumbu-bumbunya hingga kuahnya mengental dan daging ayam mengering.  </p>
        </div>

        <div class="col-md-4">
            <i class="fa fa-map-marker" aria-hidden="true"></i>
            <h3>Tempat Wisata</h3>
            <p>Tulungagung terkenal akan tempat wisatanya, biasanya tempat yang banyak dikunjungi adalah pantai, pantai yang terkenal dan legend adalah popoh, pantai ini terletak di daerah Besuki, Tulungagung. Selain pantai Tulungagung juga mempunyai tempat wisata seperti Air terjun , dan tempat camping (gunung)</p>
        </div>
    </div>
</div>
{{-- end plan --}}

{{-- start packages --}}
<div class="container places">
    <div class="row justify-content-center">
        <h1><strong>Tawaran Paket dari Kami</strong></h1>
    </div>
    <div class="row my-5">
        @forelse ($packages as $package)
                <div class="col-md-4">
                    <div class="card mx-2 my-3" style="border: 2px solid black">
                        <div class="card-header">
                            <img src="{{ asset('storage/packageImage/'.$package->package_image) }}" alt="" class="img-fluid p-0 m-0">
                        </div>
                        <div class="card-body package-details">
                            <p>Package Name: {{ $package->name }}</p>
                            <p>Price: {{ $package->price }}</p>
                            <p>People: {{ $package->people }}</p>
                        </div>
                        <div class="card-footer bg-dark" >
                            <div class="d-flex justify-content-between">
                                <div>
                                    <a href="{{ route('package.details', $package->id) }}" class="btn btn-info">Details</a>
                                </div>
                                <div>
                                    @auth
                                        @if (Auth::user()->role_id == 2)
                                            <a href="{{ route('package.booking', $package->id) }}" class="btn btn-success">Book Now</a>
                                        @endif
                                    @endauth
                                        
                                    @guest
                                        <a href="{{ route('login') }}" class="btn btn-success">Book Now</a>
                                    @endguest
                                </div>
                            </div>
                        </div>
    
                    </div>    
                </div> 
                @empty
                    <h2 class="m-auto my-5 bg-info text-white text-center p-3">No Package Found. Please add some place.</h2>
                @endforelse
    </div>    
    
    <div class="row">
        <div class="d-flex justify-content-center m-auto">
            <div>
                <a href="{{ route('all.package') }}" class="btn view-more">View More Package</a>
            </div>
        </div>
    </div>
</div>
{{-- end packages --}}

{{-- start district --}}
<div class="container-fluid district-show text-center">
    <div class="row">
        <h1 class="m-auto "><strong>Show District Wise Amazing Places</strong></h1>
    </div>
    <div class="row px-3 justify-content-center my-5">
        @forelse ($districts as $district)
            <div class="col-sm-2">
                <a href="{{ route('district.wise.place', $district->id) }}" class="btn btn-district my-3">
                    <strong>{{ $district->name }} ({{ $district->places->count() }})</strong>
                </a>
            </div>
        @empty
            <h2 class="m-auto p-3 text-white bg-dark">No Districts Found Right Now. Please Add Some Areas</h2>
        @endforelse
    </div>
</div>
{{-- end district --}}



{{-- start social media --}}
<section id="social-media">
	<div class="container text-center">
		<p>	Find us on Social Media</p>
		<div class="social-icon">
            <a target="_blank" href="https://www.facebook.com/"><img src="{{ asset('frontend/img/facebook.png') }}"></a>
			<a target="_blank" href="https://twitter.com/"><img src="{{ asset('frontend/img/twitter.png') }}"></a>
			<a target="_blank" href="https://www.instagram.com/"><img src="{{ asset('frontend/img/instagram.png') }}"></a>
			<a target="_blank" href="https://www.linkedin.com/"><img src="{{ asset('frontend/img/linkedin.png') }}">
            </a>
			
			
		</div>
	</div>
</section>
{{-- end social media --}}





{{-- start searching --}}
<div class="container-fluid search-section text-center">
    <div class="row">
        <h1 class="m-auto "><strong>You Can Search Our Amazing Places</strong></h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-9">
            <form action="{{ route('search') }}" method="GET">
                @csrf
                <div class="row justify-content-center">
                    @if(session('search'))
                        <div class="alert alert-danger mt-3" id="alert" roles="alert">
                            {{ session('search') }} 
                        </div> 
                    @endif 
                </div> 
                <div class="d-flex flex-row  justify-content-center py-5">
                    <div class="form-group" style="width: 60%">
                        <input type="text" placeholder="search a place" class="form-control" name="query">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success float-left ml-1">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- End Search --}}


@endsection

@section('scripts')
   
@endsection

@section('css')

@endsection
      
