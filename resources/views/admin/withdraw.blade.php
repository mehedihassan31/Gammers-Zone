@extends('admin.layout.app')
@section('title','Transection')

@section('content')

<div id="maindiv" class="container d-none">
    <div class="row">
    <div class="col-md-12 p-5">
    <table id="serviceDatatable" class="table table-striped text-center table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th class="th-sm">User Name</th>
          <th class="th-sm">Ammount</th>
          <th class="th-sm">Number</th>
          <th class="th-sm">Payment Method</th>
          <th class="th-sm">Status</th>
          <th class="th-sm">Confirmation</th>
          <th class="th-sm">Delete</th>
        </tr>
      </thead>

      <tbody id="servicetable">
    
        
      </tbody>
    </table>
    
    </div>
    </div>
    </div>




    <div id="loaderdiv" class="container">
          <div class="row">
            <div class="col-md-12 p-5 text-center">

                <img class="loading-icon m-5" src="{{asset('images/loader.svg')}}" alt="">
            
            </div>
          </div>
    </div>

    <div id="wrongdiv" class="container d-none">
          <div class="row">
            <div class="col-md-12 p-5 text-center">

                <h3>Something went worng</h3>
            
            </div>
          </div>
    </div>






  
  <!-- Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
         <h6>Do you want to delete?</h6>
         <h6 id="serviceDeletebtn"></h6>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
          <button data-id='' id='serconfmdeltebtn' type="button" class="btn btn-sm btn-danger">Yes</button>
        </div>
      </div>
    </div>
  </div>








  <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Update Status</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body  text-center">
                                <div  id="courseEditFrom" class="container none">
                                    <Label>Transection Id:</Label><h5 type="hidden"  id="updateCourseid"> </h5>
                                      <div class="row">
                                          <div class="card mx-auto">
                                            {{-- <a  class="btn btn-primary" id="statusId">Pending</a> --}}
                                            <a  class="btn btn-primary" id="statusId">Confirmed</a>
                                          </div>
                                      </div>
                                </div>

                      </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                    {{-- <button  id="CourseUpdateConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button> --}}
                  </div>
      </div>
    </div>
</div>




@endsection

@section('script')
<script type="text/javascript" >
getwithdrawData();

function getwithdrawData(){
axios.get('/admin/getwithdrawData')
.then(function (response){
  if(response.status==200)
  {
    $('#maindiv').removeClass('d-none');
    $('#loaderdiv').addClass('d-none');

    $('#serviceDatatable').DataTable().destroy();
    $('#servicetable').empty();

    var jsonData=response.data;
    $.each(jsonData,function(i,item){
    $('<tr>').html(
    "<td>"+jsonData[i].user.username+ "</td>"+
    "<td>"+jsonData[i].ammount+"</td>"+
    "<td>"+jsonData[i].number+"</td>"+
    "<td>"+jsonData[i].pmethod+"</td>"+
    "<td>"+jsonData[i].status+"</td>"+
    "<td> <a class='serviceeditbtn' data-price='"+jsonData[i].ammount+"' data-user='"+jsonData[i].user.id+"' data-id='"+jsonData[i].id+"' ><i class='fas fa-edit'>Status </i></a></td>"+
    "<td><a class='serviceDeletebtn'  data-id='"+jsonData[i].id+"' ><i class='fas fa-trash-alt'></i></a></td>"
     ).appendTo('#servicetable');
    });

    //services delete
$('.serviceDeletebtn').click(function(){
  var id=$(this).data('id');
  $('#serconfmdeltebtn').attr('data-id',id);
  $('#deleteModal').modal('show');

})

    //service edit icon
    $('.serviceeditbtn').click(function(){
        var id=$(this).data('id');
        var userid=$(this).data('user');
        var ammount=$(this).data('price');
       $('#updateCourseid').html(id);
       $('#updateCourseUserid').html(userid);
       $('#tAmmount').html(ammount);

       $('#EditModal').modal('show')
    })


$('#serviceDatatable').DataTable({"order":false});
$('.dataTables_length').addClass('bs-select');



  }else{

    $('#loaderdiv').addClass('d-none');
    $('#wrongdiv').removeClass('d-none');

  }


}).catch(function (error) {

  $('#loaderdiv').addClass('d-none');
  $('#wrongdiv').removeClass('d-none');

});

}



// delete-------------------------------------------------------


$('#serconfmdeltebtn').click(function(){
  var id=$(this).data('id');
  tranDelete(id);
})

function tranDelete(deleteid){

  axios.post('/admin/WithdrawDelete',{id:deleteid})
  .then(function(response){

    if(response.data==1)
    {
      $('#deleteModal').modal('hide');
      toastr.success("Delete success");
      getwithdrawData();

    }else{
    
      $('#deleteModal').modal('hide');
      toastr.error("Delete Faild");
      getwithdrawData();
    }

  }).catch(function (error) {

});

}





//transection--------------------------------------------------------

$('#statusId').click(function(){
  var  id=$('#updateCourseid').html();
  var  status=$('#statusId').text();
   statusUpdate(id,status);
})

function statusUpdate(id,status){

    axios.post('/admin/withdrawStatusConfirm',{
                    id:id,
                    status:status
                  })
                  .then(function(response){

                    if(response.data==1)
                    {
                      $('#EditModal').modal('hide');
                      toastr.success("Update success");
                      getwithdrawData();
                
                    }else{
                    
                      $('#EditModal').modal('hide');
                      toastr.error("Update Faild");
                      getwithdrawData();
                    }
                
                
                  }).catch(function (error) {
                    $('#EditModal').modal('hide');
                    toastr.error("Something went wrong");

                });




}





</script>
    
@endsection