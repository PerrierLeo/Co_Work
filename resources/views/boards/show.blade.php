@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 pl-0 pr-0">
            <div class="card w-100">
                <div class="card-header d-flex justify-content-between align-baseline "><strong>Dashboard de {{ Auth::user()->lastname}} |</strong>
                    <!-- Button trigger modal -->

                    <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">
                        Ajouter une liste
                      </button>


                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog " role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Ajouter une liste</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                            <form method='POST' action='{{ route('lists.store', ['id' => $board->id])}}'>


                                @csrf

                               <div>
                                   <label for='name'> Nom de la liste: </label>
                                    <input type='text' name='name' class="form-control @error('name') is-invalid @enderror" name="name" autocomplete="name" autofocus>
                                </div>

                                    <button type="submit" class="btn btn-primary mt-4">Ajouter</button>
                            </form>
                            </div>
                            <div class="modal-footer">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                        <div class="row w-100">


                    <div class="col-12 w-100" >
                        <h5 class="card-title">   </h5>
                    <div class="card bg-dark text-black mt-4">
                        <img src="{{ $board->url_picture }}" class="img-thumbnail" alt="...">
                        <div class="card-img-overlay d-flex align-items-start flex-wrap">

                            @foreach ($lists as $list)

                            <div class="card m-1" style="width: 20rem; height: auto;">
                                <div class="card-body">
                                    <a href="{{ route('lists.destroy', ['id' => $list->id]) }}"><button type="button" class="close" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button> </a>
                                  <h5 class="card-title">{{$list->name}}</h5>

                                  <form action="{{ route('tickets.store', ['id' => $list->id])}}" method='POST'>
                                    @csrf
                                  <div class="input-group mb-3">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" autocomplete="name" autofocus placeholder="Tâches" name='name' aria-describedby="button-addon2">
                                    <div class="input-group-append">
                                      <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Ajouter</button>
                                    </div>
                                </form>
                            </div>
                                @foreach ($tickets as $ticket)
                                    @foreach ($ticket as $tick)
                                        @if($list->id == $tick->list_id)
                                <div class="card-header">
                                    <a href="{{ route('tickets.destroy', ['id' => $tick->id]) }}"><button type="button" class="close" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button> </a>
                                    <p class="card-text">{{$tick->name}}</p>
                                    @foreach ($comments as $comment)




                                      @if ($tick->id == $comment->ticket_id)
                                      <div class="p-3 mb-2 bg-info text-white">{{$comment->description}}</div>
                                      @endif




                                        @endforeach
                                        <form action="{{ route('comments.store', ['id' => $tick->id]) }}" method='POST'>

                                            @csrf
                                        <div class="input-group sm-3 d-flex">
                                        <input type="text" name='description' class="form-control @error('description') is-invalid @enderror sm" autocomplete="description" placeholder="Comment" aria-describedby="button-addon2">
                                        <div class="input-group-append">
                                          <button class="btn btn-outline-secondary sm-3" type="submit">✔️</button>
                                        </div>
                                    </form>
                                    @endif

                                        @endforeach

                                    @endforeach


                                       </div>

                                </div>

                            </div>
                            </div>
                            @endforeach



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

