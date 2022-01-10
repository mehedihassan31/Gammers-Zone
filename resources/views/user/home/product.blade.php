
<div class="container">
    <div >

        <h1>Products</h1>
        <hr>
    </div>
    <div class="row">
        @foreach ($products as $prokducts)
        <div class="col-md-3 ">
            <div class="card" >
                <img class="card-img-top" height:"auto" src="{{asset('assets/user/images/diamond.png')}}" alt="image">
                <div class="card-body">
                <h3 class="card-title">{{$prokducts->diamond}}</h3>
                <h2 class="price">price: {{$prokducts->price}}৳ <small><del>{{$prokducts->sale_price}}</del> </small></h2>
                <a href="#" class="btn btn-primary">Buy</a>
                </div>
            </div>

        </div>

        @endforeach

    </div>

</div>