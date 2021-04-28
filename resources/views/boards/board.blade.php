@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 pl-0 pr-0">
            <div class="card w-100">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">


                    <div class="col-12">
                        <h5 class="card-title">  <strong>{{$board->name}}</strong>  </h5>
                    <div class="card bg-dark text-white mt-4">
                        <img src="{{$board->$url_picture}}" class="img-thumbnail" alt="...">
                        <div class="card-img-overlay">

                          <p class="card-text">{{$board->created_at}}</p>
                        </div>
                      </div>
                    </div>

                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

