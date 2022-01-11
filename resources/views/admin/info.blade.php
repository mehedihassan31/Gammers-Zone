@extends('admin.layout.app')

@section('content')


<div class="container mt-5">
  <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Information</h5>
                </button>
            </div>
    <div class="mt-4 ml-2 mr-2">
      <h5 id="updateProjectid"></h5>
      <div id="projectEditFrom"  >

        <h5 id="serviceeditid"> </h5>
         <div class="row">
             <div class="col-md-6">
                How to add money video link: <input id="ProjectNameUpdateId" type="text" id="" class="form-control mb-3" placeholder="how to Add Money Video Link">
                How to collect room id video link: <input id="ProjectDesUpdateId" type="text" id="" class="form-control mb-3" placeholder="How to Collect Room id Video Link">
                How to join in match":<input id="ProjectLinkUpdateId" type="text" id="" class="form-control mb-3" placeholder="How to Join in match">
                Terms & Policy: <textarea id="ProjectImgUpdateId" type="text" id="" class="form-control mb-3" placeholder="Terms & Policy"></textarea>
             </div>
             <div class="col-md-6">
              Bkash: <input id="bkashId" type="text"  class="form-control mb-2" placeholder="Bkash number">
              Nagad: <input id="nagadId" type="text"  class="form-control mb-2" placeholder="Nagad number">
              Roket: <input id="roketId" type="text"  class="form-control mb-2" placeholder="Roket number">
             </div>
         </div>
      </div>
    </div>


    <div>

      <button  id="ProjectUpdateConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
    </div>
  </div>
</div>



@endsection

@section('script')
<script>

// update infromation detials
var id=1;
informationUpdatedetails(id);
function informationUpdatedetails(id){

  axios.post('/admin/informationDetails',{
    id:id,
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
          $('#bkashId').val(jsonData[0].bkash);
          $('#nagadId').val(jsonData[0].nagad);
          $('#roketId').val(jsonData[0].roket);

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
  
  var id=1;
  var addmoneyvlink=$('#ProjectNameUpdateId').val();
  var collectroomvlink=$('#ProjectDesUpdateId').val();
  var joinmatchvlink=$('#ProjectLinkUpdateId').val();
  var termspolicy=$('#ProjectImgUpdateId').val();
  var bkash=$('#bkashId').val();
  var nagad=$('#nagadId').val();
  var roket=$('#roketId').val();
  updateProject(id,addmoneyvlink,collectroomvlink,joinmatchvlink,termspolicy,bkash,nagad,roket);
})

// update information

function updateProject(id,addmoneyvlink,collectroomvlink,joinmatchvlink,termspolicy,bkash,nagad,roket){

  if(addmoneyvlink.length==0){
    toastr.error('Link  is empty!');
  }else if(collectroomvlink.length==0){
    toastr.error('Link is empty!');
  }else if(termspolicy.length==0){
    toastr.error('Term  is empty!');
  }else if(joinmatchvlink.length==0){
    toastr.error('Link  is empty!');
  }else if(bkash.length==0){
    toastr.error('bkash no.  is empty!');
  }else if(nagad.length==0){
    toastr.error('nagad no.  is empty!');
  }else if(roket.length==0){
    toastr.error('roket no. is empty!');
  }else{
  axios.post('/admin/informationUpdate',{
    id:id,
    addmoneyvlink:addmoneyvlink,
    collectroomvlink:collectroomvlink,
    joinmatchvlink:joinmatchvlink,
    termspolicy:termspolicy,
    bkash:bkash,
    nagad:nagad,
    roket:roket,
  }).then(function(response){
    if(response.status==200){

      $('#updateProjectModal').modal('hide');
      toastr.success("Update Success");
      informationUpdatedetails(id);
     


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

