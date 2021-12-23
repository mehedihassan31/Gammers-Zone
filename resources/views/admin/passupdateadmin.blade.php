@extends('admin.layout.app')

@section('content')



{{-- 
update project modal --}}

<div class="container mt-5">    
         <div class="row">
             <div class="col-md-6">
               <input id="ProjectNameUpdateId" type="text" id="" class="form-control mb-3" placeholder="Old Password">
                 <input id="ProjectDesUpdateId" type="text" id="" class="form-control mb-3" placeholder="New password">
                 <input id="ProjectLinkUpdateId" type="text" id="" class="form-control mb-3" placeholder="Confirm Password">
             </div>
         </div>
      <button  id="ProjectUpdateConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
</div>


@endsection

@section('script')
<script>




$('#ProjectUpdateConfirmBtn').click(function(){
  
  var id=1;
  var Old_Password=$('#ProjectNameUpdateId').val();
  var New_password=$('#ProjectDesUpdateId').val();
  var Con_Password=$('#ProjectLinkUpdateId').val();
  updateProject(id,Old_Password,New_password,Con_Password);
})

// update project

function updateProject(id,Old_Password,New_password,Con_Password){

  if(Old_Password.length==0){
    toastr.error('Old password is empty!');
  }else if(New_password.length==0){
    toastr.error('New password is empty!');
  }else if(Con_Password.length==0){
    toastr.error('Confirm password is empty!');
  }else{
  axios.post('/admin/adpassdupdatereq',{
    id:id,
    passwordold:Old_Password,
    password:New_password,
    password_confirmation:Con_Password
  }).then(function(response){
    if(response.status==200){
      toastr.success("Update Success")

    }else{
      toastr.error("Update failed")
    }


  }).catch(function(error){
    toastr.error("Update failed")

  })

}
}

</script>
    
@endsection

