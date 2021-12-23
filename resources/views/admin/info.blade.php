@extends('admin.layout.app')

@section('content')

<div id="mainDivProject" class="container d-non">
    <div class="row">
        <div class="col-md-12 p-5">
             {{-- <button id="addProjectbtn" class="btn btn-sm mr-3 btn-danger">Add New</button> --}}
                <table id="Projectdatatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                    <th class="th-sm">Add Money Link</th>
                    <th class="th-sm">Add Money Link</th>
                    <th class="th-sm">Add Money Link</th>
                    <th class="th-sm">Description</th>
                    <th class="th-sm">Edit</th>
                    </tr>
                </thead>
                <tbody id="project_table">
                
                </tbody>
                </table>
        </div>
    </div>
</div>


    <div id="loaderDivProject" class="container">
        <div class="row">
          <div class="col-md-12 p-5 text-center">
              <img class="loading-icon m-5" src="{{asset('images/loader.svg')}}" alt="">
          
          </div>
        </div>
  </div>

  <div id="wrongDivProject" class="container d-none">
        <div class="row">
          <div class="col-md-12 p-5 text-center">
              <h3>Something went worng</h3>
          </div>
        </div>
  </div>





{{-- 
update project modal --}}

<div class="modal fade" id="updateProjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
    <div class="modal-body  text-center">
      <h5 id="updateProjectid"></h5>
      <div id="projectEditFrom"  class="container d-none">

       
         <div class="row">
             <div class="col-md">
               <input id="ProjectNameUpdateId" type="text" id="" class="form-control mb-3" placeholder="how to Add Money Video Link">
                 <input id="ProjectDesUpdateId" type="text" id="" class="form-control mb-3" placeholder="How to Collect Room id Video Link">
                 <input id="ProjectLinkUpdateId" type="text" id="" class="form-control mb-3" placeholder="how to Join in match">
                 <textarea id="ProjectImgUpdateId" type="text" id="" class="form-control mb-3" placeholder="Terms & Policy"></textarea>
             </div>
         </div>
      </div>
    </div>


    <div id="loaderDivproUpdate" class="container">
        <div class="row">
          <div class="col-md-12 p-5 text-center">
              <img class="loading-icon m-5" src="{{asset('images/loader.svg')}}" alt="">
          </div>
        </div>
    </div>

    <div id="wrongDivproUpdate" class="container d-none">
          <div class="row">
            <div class="col-md-12 p-5 text-center">
                <h3>Something went worng</h3>
            </div>
          </div>
    </div>

    <div class="modal-footer">
      <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
      <button  id="ProjectUpdateConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
    </div>
  </div>
</div>
</div>


@endsection

@section('script')
<script>
getprojectsdata();


function getprojectsdata(){
  axios.get('/admin/getinformationdata')
  .then(function(response){

    if(response.status==200){

    $('#mainDivProject').removeClass('d-none');     
    $('#loaderDivProject').addClass('d-none');
    $('#Projectdatatable').DataTable().destroy();
    $('#project_table').empty();

      var jsonData=response.data;
      $.each(jsonData,function(i){
        $('<tr>').html(
          "<td class='td-sm'>"+jsonData[i].addmoneyvlink+"</td>"+
          "<td class='td-sm'>"+jsonData[i].collectroomvlink+"</td>" +
          "<td class='td-sm'>"+jsonData[i].joinmatchvlink+"</td>" +
          "<td class='td-sm'>"+jsonData[i].termspolicy+"</td>" +
          "<td> <a class='projecteditbtn' data-id='"+jsonData[i].id+"' ><i class='fas fa-edit'></i></a>Edit</td>"
        ).appendTo('#project_table');
      })


      $('.projecteditbtn').click(function(){
        var id = 0;
        informationUpdatedetails(id);
        $('#updateProjectModal').modal('show');
        
       
      })


    }else{
      $('#loaderDivProject').addClass('d-none');
      $('#wrongDivProject').removeClass('d-none');  
    }

  }).catch(function(error){

    $('#loaderDivProject').addClass('d-none');
    $('#wrongDivProject').removeClass('d-none');  

  })
}



// update project detials

function informationUpdatedetails(id){

  axios.post('/admin/informationDetails',{
    id:id
  })
  .then(function(response){
    if(response.status==200){

      $('#projectEditFrom').removeClass('d-none');
      $('#loaderDivproUpdate').addClass('d-none');

      var jsonData=response.data;
          $('#ProjectNameUpdateId').val(jsonData[0].addmoneyvlink);
          $('#ProjectDesUpdateId').val(jsonData[0].collectroomvlink);
          $('#ProjectLinkUpdateId').val(jsonData[0].joinmatchvlink);
          $('#ProjectImgUpdateId').val(jsonData[0].termspolicy);

    }else{

      $('#loaderDivproUpdate').addClass('d-none');
      $('#wrongDivproUpdate').removeClass('d-none');
    }
  }).catch(function(error){

    $('#loaderDivproUpdate').addClass('d-none');
    $('#wrongDivproUpdate').removeClass('d-none');
   
  })

}

$('#ProjectUpdateConfirmBtn').click(function(){
  
  var id=0;
  var addmoneyvlink=$('#ProjectNameUpdateId').val();
  var collectroomvlink=$('#ProjectDesUpdateId').val();
  var joinmatchvlink=$('#ProjectLinkUpdateId').val();
  var termspolicy=$('#ProjectImgUpdateId').val();
  updateProject(id,addmoneyvlink,collectroomvlink,joinmatchvlink,termspolicy);
})

// update project

function updateProject(id,addmoneyvlink,collectroomvlink,joinmatchvlink,termspolicy){

  if(addmoneyvlink.length==0){
    toastr.error('Link  is empty!');
  }else if(collectroomvlink.length==0){
    toastr.error('Link is empty!');
  }else if(termspolicy.length==0){
    toastr.error('Link is empty!');
  }else if(joinmatchvlink.length==0){
    toastr.error('Link is empty!');
  }else{
  axios.post('/admin/informationUpdate',{
    id:id,
    addmoneyvlink:addmoneyvlink,
    collectroomvlink:collectroomvlink,
    joinmatchvlink:joinmatchvlink,
    termspolicy:termspolicy
  }).then(function(response){
    if(response.status==200){

      $('#updateProjectModal').modal('hide');
      toastr.success("Update Success")
      getprojectsdata()


    }else{
      $('#updateProjectModal').modal('hide');
      toastr.error("Update failed")
    }


  }).catch(function(error){

    $('#updateProjectModal').modal('hide');
    toastr.error("Update failed")

  })

}
}

</script>
    
@endsection

