@extends('admin.layout.app')

@section('title','Order')
@section('content')


<div id="mainDivCourse" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5">
            <table id="coursedatatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th class="th-sm">User Name</th>
                  <th class="th-sm">Product Diamond</th>
                  <th class="th-sm">Game ID</th>
                  <th class="th-sm">status</th>
                  <th class="th-sm">Details</th>
                  <th class="th-sm">Status update</th>
                  <th class="th-sm">Delete</th>
                </tr>
              </thead>
              <tbody id="course_table">
          
              </tbody>
            </table>
        </div>
    </div>
</div>


<div id="loaderDivCourse" class="container">
    <div class="row">
      <div class="col-md-12 p-5 text-center">
          <img class="loading-icon m-5" src="{{asset('images/loader.svg')}}" alt="">
      
      </div>
    </div>
</div>

<div id="wrongDivCourse" class="container d-none">
    <div class="row">
      <div class="col-md-12 p-5 text-center">
          <h3>Something went worng</h3>
      </div>
    </div>
</div>










<div class="modal fade" id="updateCourseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                <div id="courseEditFrom" class="container none">
                                    <h5  id="updateCourseid"> </h5>
                                      <div class="row">
                                          <div class="card mx-auto">
                                            <a  class="btn btn-primary" id="statusId1" >Pending</a>
                                            <a  class="btn btn-warning" id="statusId2">Processing</a>
                                            <a  class="btn btn-primary" id="statusId3">Accepted</a>
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
<script>
    getAllOrderData();
    
    function getAllOrderData(){
      axios.get('/getAllOrder')
            .then(function(response){
              if(response.status==200){
                $('#mainDivCourse').removeClass('d-none');
                $('#loaderDivCourse').addClass('d-none');
    
                $('#coursedatatable').DataTable().destroy();
                
                $('#course_table').empty();
    
                
                var jsonData=response.data;
                $.each(jsonData, function(i){
                  $('<tr>').html(
                    "<td class='td-sm'>"+jsonData[i].user.username+"</td>"+
                    "<td class='td-sm'>"+jsonData[i].product.diamond+"</td>"+
                    "<td class='td-sm'>"+jsonData[i].game_id+"</td>"+
                    "<td class='td-sm'>"+jsonData[i].status+"</td>"+

                    "<td> <a class='courseViewDetailsbtn' data-id='"+jsonData[i].id+"' ><i class='fas fa-eye'></i></a>Details</td>"+
                    "<td> <a class='courseeditbtn' data-id='"+jsonData[i].id+"' ><i class='fas fa-edit'>Change status</i></a></td>"+
                   "<td><a class='courseDeletebtn'  data-id='"+jsonData[i].id+"' ><i class='fas fa-trash-alt'></i></a></td>"
                  ).appendTo('#course_table');
                })
    
                $('.courseDeletebtn').click(function(){
                  var id= $(this).data('id');
                  $('#deleteCourseModal').modal('show');
                  $('#courseDeletebtnid').html(id);
                });
    
    
    
                $('.courseeditbtn').click(function(){
                  var id=$(this).data('id');
                //   courseUpdatedetails(id);
                  $('#updateCourseid').html(id);
                  $('#updateCourseModal').modal('show');
                  
                })
    
                $('#coursedatatable').DataTable({"order":false});
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






$('#statusId1').click(function(){
  var  id=$('#updateCourseid').html();
  var  status=$('#statusId1').text();

   statusUpdate(id,status);
})
$('#statusId2').click(function(){
  var  id=$('#updateCourseid').html();
  var  status=$('#statusId2').text();

   statusUpdate(id,status);
})
$('#statusId3').click(function(){
  var  id=$('#updateCourseid').html();
  var  status=$('#statusId3').text();
   statusUpdate(id,status);
})

function statusUpdate(id,status){
    axios.post('/StatusUpdate',{
      id:id,
      status:status
    }).then(function(response){
      if(response.status==200){
        if(response.data==1){
          $('#updateCourseModal').modal('hide');
          toastr.success("Update success");
          getAllOrderData();
        }else{

          $('#updateCourseModal').modal('hide');
          toastr.error("Update fail");
          getAllOrderData();
        }

      }else{
        $('#updateCourseModal').modal('hide');
        toastr.error("Something went wrong");
      }


    }).catch(function(error){
      $('#updateCourseModal').modal('hide');
      toastr.error("Something went wrong");

    });
  
}







</script>
@endsection