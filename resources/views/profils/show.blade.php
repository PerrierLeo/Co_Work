@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-12 pl-0 pr-0">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between align-baseline"><strong>Profil de {{ Auth::user()->lastname}} |</strong></div>
                <div class="d-flex w-100  align-items-center">
                <div class="card-body mt-5 ml-5" >

                    <form action="{{route('profil.updateFirstName', ['id' => Auth::user()->id])}}" method='POST'>
                        @csrf
                    <div class="input-group mb-3 w-50">
                        <input type="text" name='firstname'class="form control @error('firstname') is-invalid @enderror" autocomplete="fisrtname" placeholder="{{ Auth::user()->firstname}}" aria-label="Nom" aria-describedby="basic-addon1">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Modifier</button>
                      </div>
                    </form>

                      <div class="input-group mb-3 w-50">
                        <input type="text" class="form control @error('lasttname') is-invalid @enderror" autocomplete="lastname" placeholder="{{ Auth::user()->lastname}}" aria-label="Prénom" aria-describedby="basic-addon1">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2">Modifier</button>
                      </div>


                      <div class="input-group mb-3 w-50">
                        <input type="text" class="form control @error('email') is-invalid @enderror" autocomplete="email" placeholder="{{ Auth::user()->email}}" aria-label="email" aria-describedby="basic-addon1">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2">Modifier</button>
                      </div>

                      <div class="input-group mb-3 w-50">
                        <input type="text" class="form-control" placeholder="Photo de profil" aria-label="email" aria-describedby="basic-addon1">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2">Modifier</button>
                      </div>

                      </div>

                      <div class="card mt-5 mr-5 mb-5" style="width: 18rem;">
                        <img src="{{ Auth::user()->url_picture}}"  class="card-img-top" alt="...">
                        <div class="card-body">
                          <p class="card-text">{{ Auth::user()->firstname}}</p>
                          <p class="card-text">{{ Auth::user()->lastname}}</p>
                          <p class="card-text">{{ Auth::user()->email}}</p>
                        </div>
                      </div>
                </div>
                <div class="d-flex w-100  align-items-center">
                    <a class="navbar-brand mb-5 ml-5 " href="{{ url('/home') }}">
                    <img src='{{asset('pictures/logo_small.png')}}' width="" height="100px">
                </a>
            </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
