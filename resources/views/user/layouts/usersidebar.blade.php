<div class="col-md-3 ">
    <div class="list-group ">
     <a href="{{route('userdashboard')}}" class="list-group-item list-group-item-action {{Request::is('userdashboard')?'active':'';}}">Dashboard</a>
     <a href="{{route('profile')}}" class="list-group-item list-group-item-action {{Request::is('profile')?'active':'';}}">Profile</a>
     <a href="{{route('mystatistics')}}" class="list-group-item list-group-item-action {{Request::is('mystatistics')?'active':'';}}">My Statistics</a>
     <a href="{{route('myorder')}}" class="list-group-item list-group-item-action {{Request::is('myorder')?'active':'';}}">My Order</a>
     <a href="{{route('deposits')}}" class="list-group-item list-group-item-action {{Request::is('deposits')?'active':'';}}">Deposits</a>
     <a href="{{route('withdraw')}}" class="list-group-item list-group-item-action {{Request::is('withdraw')?'active':'';}}">Withdraw</a>
     <a href="{{route('refer')}}" class="list-group-item list-group-item-action {{Request::is('refer')?'active':'';}}">Refer & Earn</a>
     
     
   </div> 
</div>