@extends('admin.layout.app')
@section('title','Results')

@section('content')

<div id="maindiv" class="container d-none">
    <div class="row">
    <div class="col-md-12 p-5">

        <Label>Game Id: </Label><h3 id="matchid">{{$match_id}}</h3>

    <table id="serviceDatatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th class="th-sm">Name</th>
          <th class="th-sm">Username</th>
          <th class="th-sm">Game User Name</th>
          <th class="th-sm">Phone </th>
          <th class="th-sm">Price Money</th>
          <th class="th-sm">Totall Kill</th>
          <th class="th-sm">Add</th>
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
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Balance</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div>
                <h5 id="serviceeditid" class="mt-4 text-center"> </h5>
                <div class="form-outline mb-4">
                  <input type="text" id="srid1" class="form-control" placeholder="Single Win Money">
                  <button data-id='' id='pconfmEditbtn' type="button" class="btn btn-sm btn-danger">Save</button>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="srid2" class="form-control" placeholder="Single kill">
                  <button data-id='' id='killpconfmEditbtn' type="button" class="btn btn-sm btn-danger">Save</button>
                </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">cancel</button>
        </div>
      </div>
    </div>
  </div> 




</div>

        




@endsection

@section('script')
<script type="text/javascript" >

var matchid=$('#matchid').html();
getUsersData(matchid);
function getUsersData(id){

axios.post('/admin/getAllsubsData',{
  id:id,
  }).then(function (response){

  if(response.status==200)
  {
    $('#maindiv').removeClass('d-none');
    $('#loaderdiv').addClass('d-none');

    $('#serviceDatatable').DataTable().destroy();
    $('#servicetable').empty();

    var jsonData=response.data;
    $.each(jsonData,function(i,item){
    $('<tr>').html(
    "<td>"+jsonData[i].user.fname+" "+jsonData[i].user.lname +"</td>"+
    "<td>"+jsonData[i].user.username+"</td>"+
    "<td>"+jsonData[i].gamename+"</td>"+
    "<td>"+jsonData[i].user.phone+"</td>"+
    "<td>"+jsonData[i].price_money+"</td>"+
    "<td>"+jsonData[i].killbyuser+"</td>"+
    "<td> <a class='serviceeditbtn' data-id='"+jsonData[i].id+"' ><i class='fas fa-edit inside-table-button'>add</i></a></td>"+
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
      $('#serviceeditid').html(id);
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






$('#serconfmdeltebtn').click(function(){
  var id=$(this).data('id');
  resultDelete(id);


})

function resultDelete(deleteid){

  axios.post('/admin/ResultDelete',{id:deleteid})
  .then(function(response){

    if(response.data==1)
    {
      $('#deleteModal').modal('hide');
      toastr.success("Delete success");
      getUsersData(matchid)

    }else{
    
      $('#deleteModal').modal('hide');
      toastr.error("Delete Faild");
      getUsersData(matchid)
    }

  }).catch(function (error) {

});


}







//add balance confirm-----------------------------------------------------------------------------------------------------

    $('#pconfmEditbtn').click(function(){
      var id=$('#serviceeditid').html();
      var pricemoney=$('#srid1').val();
      pricemoneyAddd(id,pricemoney);
    })

function pricemoneyAddd(rid,pricemoney){

if(pricemoney.length==0){
  toastr.error("pricemoney is empty");
} else{
                axios.post('/admin/pricemoneyAdd',{
                  rid:rid,
                  pricemoney:pricemoney,
                })
                .then(function(response){
                  if(response.data==1)
                  {
                    $('#EditModal').modal('hide');
                    toastr.success("Update success");
                    getUsersData(matchid);
              
                  }else{
                  
                    $('#EditModal').modal('hide');
                    toastr.error("Update Faild");
                    getUsersData(matchid);
                  }
                           
                }).catch(function (error) {
              
              });
  }
}



// add win balance------------------------------------------

    $('#killpconfmEditbtn').click(function(){
      var id=$('#serviceeditid').html();
      var kill=$('#srid2').val();
      killAdd(id,kill);
    })

    
function killAdd(id,kill){
  if(kill.length==0){
    toastr.error("Win Balance is empty");
  } else{
                  axios.post('/admin/killAdd',{
                    id:id,
                    kill:kill,
                  })
                  .then(function(response){

                    if(response.data==1)
                    {
                      $('#EditModal').modal('hide');
                      toastr.success("Update success");
                      getUsersData(matchid);
                
                    }else{                  
                      $('#EditModal').modal('hide');
                      toastr.error("Update Faild");
                      getUsersData(matchid);
                    }               
                  }).catch(function (error) {
                
                });

    }
}

</script>
    
@endsection