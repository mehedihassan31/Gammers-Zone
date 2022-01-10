<div class="container mt-5">
    <div >
        <h2>join a Game </h2>
        <hr>
    </div>
    <div class="row">
        @foreach ($game as $game)
            <div class="col-md-6 mt-2">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4">
                        <img class="card-img-top"  src="{{asset('assets/user/images/diamond.png')}}" alt="image">
                    </div>
                    <div class="col-md-8">                      
                            <h5 class="card-title">{{$game->name}}</h5>
                            <p class="card-text">With supporting text below as a .</p>
                            <a href="#" class="btn btn-primary">join</a>
                  </div>
              </div>
            </div>
        </div>
            </div>
        @endforeach
    </div>
</div>

<div class="container mt-5">
    <div>
        <h2>Ongoing Game </h2>
        <hr>
    </div>
    <div class="row">
        @foreach ($games as $games)
            <div class="col-md-6 mt-2">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4">
                        <img class="card-img-top"  src="{{asset('assets/user/images/diamond.png')}}" alt="image">
                    </div>
                    <div class="col-md-8">                      
                            <h5 class="card-title">{{$games->Device}}</h5>
                            <p class="card-text">With supporting text below as a .</p>
                            <a href="#" class="btn btn-primary">join</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        @endforeach
    </div>
</div>