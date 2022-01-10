<div class="col-md-3 ">
    <div class="list-group ">
     <a href="{{route('userdashboard')}}" class="list-group-item list-group-item-action {{Request::is('userdashboard')?'active':'';}}">Dashboard</a>
     <a href="{{route('profile')}}" class="list-group-item list-group-item-action {{Request::is('profile')?'active':'';}}">Profile</a>
     <a href="{{route('wallet')}}" class="list-group-item list-group-item-action {{Request::is('wallet')?'active':'';}}">Wallet</a>
     <a href="{{route('mystatistics')}}" class="list-group-item list-group-item-action {{Request::is('mystatistics')?'active':'';}}">My Statistics</a>
     <a href="{{route('myorder')}}" class="list-group-item list-group-item-action {{Request::is('myorder')?'active':'';}}">My Order</a>
     <a href="{{route('deposits')}}" class="list-group-item list-group-item-action {{Request::is('deposits')?'active':'';}}">Add Money</a>
     <a href="{{route('withdraw')}}" class="list-group-item list-group-item-action {{Request::is('withdraw')?'active':'';}}">Withdraw</a>
     <a href="{{route('transection')}}" class="list-group-item list-group-item-action {{Request::is('transection')?'active':'';}}">Transaction</a>
     <a href="{{route('refer')}}" class="list-group-item list-group-item-action {{Request::is('refer')?'active':'';}}">Refer & Earn</a>
     
     
   </div> 
</div>