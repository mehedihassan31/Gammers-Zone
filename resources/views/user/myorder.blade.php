@extends('user.layouts.app')

@section('content')
<div class="container mt-5">

<div class="row">
@include('user.layouts.usersidebar')

<div class="col-lg-9">


<div class="row row-cards-one mb-5">
    <div class="col-md-4 col-xl-4">
        <div class="card c-info-box-area">
            <div class="c-info-box box2">
                <p>{{$cTotall}}</p>
            </div>
            <div class="c-info-box-content">
                <h6 class="title">Total Orders</h6>
                <p class="text">All Time</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-xl-4">
        <div class="card c-info-box-area">
            <div class="c-info-box box1">
                <p>{{$cpen}}</p>
            </div>
            <div class="c-info-box-content">
                <h6 class="title">Pending Orders</h6>
                <p class="text">All Time</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-xl-4">
        <div class="card c-info-box-area">
            <div class="c-info-box box1">
                <p>{{$cdeli}}</p>
            </div>
            <div class="c-info-box-content">
                <h6 class="title">Delivered Orders</h6>
                <p class="text">All Time</p>
            </div>
        </div>
    </div>
    </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="user-profile-details">
                    <div class="account-info wallet">
                        <div class="header-area">
                            <h4 class="title">
                                Recent Orders
                            </h4>
                        </div>
                        <div class="edit-info-area"> </div>
                        <div class="main-info">
                            <div class="mr-table allproduct mt-4">
                                <div class="table-responsiv">
                                
   
                                                <table id="usedatatable"  class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                  <thead>
                                                    <tr>
                                                      <th class="th-sm">User Name</th>
                                                      <th class="th-sm">Product Diamond</th>
                                                      <th class="th-sm">Game ID</th>
                                                      <th class="th-sm">status</th>

                                                    </tr>
                                                  </thead>
                                                  <tbody id="course_table">
                                              
                                                  </tbody>
                                                </table>
                                </div>
                            </div>
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
@section('script')
<script>
    getAllOrderData();
    
    function getAllOrderData(){
      axios.get('/getorderlist')
            .then(function(response){
              if(response.status==200){
                $('#mainDivCourse').removeClass('d-none');
                $('#loaderDivCourse').addClass('d-none');
    
                $('#usedatatable').DataTable().destroy();
                
                $('#course_table').empty();
                var jsonData=response.data;
                $.each(jsonData, function(i){
                  $('<tr>').html(
                    "<td class='td-sm'>"+jsonData[i].user.username+"</td>"+
                    "<td class='td-sm'>"+jsonData[i].product.diamond+"</td>"+
                    "<td class='td-sm'>"+jsonData[i].game_id+"</td>"+
                    "<td class='td-sm'>"+jsonData[i].status+"</td>"
                  ).appendTo('#course_table');
                })
    
                $('#usedatatable').DataTable({"order":false});
                $('.dataTables_length').addClass('bs-select');
    
              }else{
                $('#wrongDivCourse').removeClass('d-none');
                $('#loaderDivCourse').addClass('d-none');
    
              }
            }).catch(function(error){
              $('#wrongDivCourse').removeClass('d-none');
              $('#loaderDivCourse').addClass('d-none');
            })
    }

</script>
@endsection