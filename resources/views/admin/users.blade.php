@extends('admin.layout.app')
@section('title','Users')

@section('content')

<div id="maindiv" class="container d-none">
    <div class="row">
    <div class="col-md-12 p-5">

    <table id="serviceDatatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th class="th-sm">Name</th>
          <th class="th-sm">Username</th>
          <th class="th-sm">Email</th>
          <th class="th-sm">phone</th>
          <th class="th-sm">Balance</th>
          <th class="th-sm">Win Balance</th>
          <th class="th-sm">Add Balance</th>
          {{-- <th class="th-sm">Delete</th> --}}
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
                  <input type="text" id="srid1" class="form-control" placeholder="Balance">
                  <button data-id='' id='bconfmEditbtn' type="button" class="btn btn-sm btn-danger">Save</button>
                </div>
                <div class="form-outline mb-4">
                  <input type="text" id="srid2" class="form-control" placeholder="Win Balace">
                  <button data-id='' id='winbconfmEditbtn' type="button" class="btn btn-sm btn-danger">Save</button>
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
getUsersData();

function getUsersData(){
axios.get('/admin/getUsersData')
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
    "<td>"+jsonData[i].fname+" "+jsonData[i].lname +"</td>"+
    "<td>"+jsonData[i].username+"</td>"+
    "<td>"+jsonData[i].email+"</td>"+
    "<td>"+jsonData[i].phone+"</td>"+
    "<td>"+jsonData[i].balance+"</td>"+
    "<td>"+jsonData[i].winbalance+"</td>"+
    "<td> <a class='serviceeditbtn' data-id='"+jsonData[i].id+"' ><i class='fas fa-edit inside-table-button'>add Balance</i></a></td>"
    // "<td><a class='serviceDeletebtn'  data-id='"+jsonData[i].id+"' ><i class='fas fa-trash-alt'></i></a></td>"
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
  productDelete(id);


})

function userDelete(deleteid){

  axios.post('/admin/ProductsDelete',{id:deleteid})
  .then(function(response){

    if(response.data==1)
    {
      $('#deleteModal').modal('hide');
      toastr.success("Delete success");
      getProductsData();

    }else{
    
      $('#deleteModal').modal('hide');
      toastr.error("Delete Faild");
      getProductsData();
    }

  }).catch(function (error) {

});


}







//add balance confirm-----------------------------------------------------------------------------------------------------

    $('#bconfmEditbtn').click(function(){
      var id=$('#serviceeditid').html();
      var balance=$('#srid1').val();
      balanceAdd(id, balance);
    })

function balanceAdd(id,balance){

if(balance.length==0){
  toastr.error("Balance is empty");
} else{
                axios.post('/admin/balanceAdd',{
                  id:id,
                  balance:balance,
                })
                .then(function(response){
                  if(response.data==1)
                  {
                    $('#EditModal').modal('hide');
                    toastr.success("Update success");
                    getUsersData();
              
                  }else{
                  
                    $('#EditModal').modal('hide');
                    toastr.error("Update Faild");
                    getUsersData();
                  }
                           
                }).catch(function (error) {
              
              });
  }
}



// add win balance------------------------------------------

    $('#winbconfmEditbtn').click(function(){
      var id=$('#serviceeditid').html();
      var winbalance=$('#srid2').val();
      winBalanceAdd(id,winbalance);
    })

    
function winBalanceAdd(id,winbalance){
  if(winbalance.length==0){
    toastr.error("Win Balance is empty");
  } else{
                  axios.post('/admin/winBalanceAdd',{
                    id:id,
                    winbalance:winbalance,
                  })
                  .then(function(response){

                    if(response.data==1)
                    {
                      $('#EditModal').modal('hide');
                      toastr.success("Update success");
                      getUsersData();
                
                    }else{                  
                      $('#EditModal').modal('hide');
                      toastr.error("Update Faild");
                      getUsersData();
                    }               
                  }).catch(function (error) {
                
                });

    }
}



</script>
    
@endsection