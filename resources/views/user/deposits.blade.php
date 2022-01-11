@extends('user.layouts.app')

@section('content')
<div class="container mt-5">

<div class="row">
@include('user.layouts.usersidebar')

<div class="col-lg-9">

  <div class="row row-cards-one mb-5">
    <div class="col-md-6 col-xl-6">
        <div class="card c-info-box-area">
            <div class="c-info-box box2">
                <p>{{$userdata->balance+$userdata->winbalance}}৳</p>
            </div>
            <div class="c-info-box-content">
                <h6 class="title">Total Balance</h6>
                
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-6">
        <div class="main-info">
            <h3 class="title w-title">Your Beposit Balance: {{$userdata->balance}}৳</h3>
            <hr>
            <a href="{{route('deposits')}}" class="mybtn1 sm">
                <i class="fas fa-plus"></i> Add Deposit
            </a>
            <div class="mb-2">
              <button id="addnewbtn" class="btn btn-md mr-3 btn-danger"> Deposit Money</button>
          </div>
        </div>
    </div>
</div>



    <div id="maindiv" class="container d-none">
        <div class="row">

        <div class="col-md-12 mt-1 pt-2">

            <h3>All deposit history</h3>
    
        <table id="serviceDatatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                  <th class="th-sm">Ammount</th>
                  <th class="th-sm">Number</th>
                  <th class="th-sm">Payment Method</th>
                  <th class="th-sm">Status</th>
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

    
      <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
    
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add money to your wallet</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
    
          <div class="modal-body">
              <p>Pay first using any one of the payment methods and fill in the input box. If your payment is correct, the desired amount will be added to your wallet </p>
              <div>
                <div class="row mb-2">

                        <div class="card col-3 m-2 p-2"><img src="{{asset('assets/user/images/bkash.png')}}" height="40%" width="30%" alt="bkash"><h3>{{$info[0]->bkash}}</h3></div>
                        <div class="card col-3 m-2 p-2"><img src="{{asset('assets/user/images/nagad1.png')}}" height="40%" width="30%"  alt="nagad"><h3>{{$info[0]->nagad}}</h3></div>
                        <div class="card col-3 m-2 p-2"><img src="{{asset('assets/user/images/rocket.png')}}" height="40%" width="30%"  alt="rocket"><h3>{{$info[0]->roket}}</h3></div>

                </div>
             </div>



            <form>
              <div id="serviceaddfrm" >

                  <!-- Name input -->
                  <div class="form-outline mb-4">
                    <Label>Payment Method</Label>
                    <div class="custom-select"  style="width:200px;">
                      <select id="paymethod">
                        <option value="">Select a Method:</option>
                        <option value="bkash">Bkash</option>
                        <option value="nagad">Nagad</option>
                        <option value="rocket">rocket</option>
                      </select>
                    </div>
               </div>
                  <div class="form-outline mb-4">
                    <input type="text" id="sraddid2" class="form-control" placeholder="Ammount thats you send us">
                  </div>
                  <div class="form-outline mb-4">
                    <input type="text" id="sraddid3" class="form-control" placeholder="Your payment number">
                  </div>
    
    
              </div>
    
                <div id="wrongdivd" class="container d-none">
                      <div class="row">
                        <div class="col-md-12 p-5 text-center">
            
                            <h3>Something went worng</h3>
                        
                        </div>
                      </div>
                </div>
            </form>
    
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">cancel</button>
            <button data-id='' id='serconfmaddbtn' type="button" class="btn btn-sm btn-danger">Verify Payment</button>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection

@section('script')
<script type="text/javascript" >
getTransectionData();

function getTransectionData(){
axios.get('/depositsbyid')
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
    "<td>"+jsonData[i].ammount+"</td>"+
    "<td>"+jsonData[i].number+"</td>"+
    "<td>"+jsonData[i].pmethod+"</td>"+
    "<td>"+jsonData[i].status+"</td>"
     ).appendTo('#servicetable');
    });




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





 // service add

$('#addnewbtn').click(function(){

$('#addModal').modal('show');

});


$('#serconfmaddbtn').click(function(){
  var paymethod=$('#paymethod').val();
  var ammount=$('#sraddid2').val();
  var number=$('#sraddid3').val();

  makeDeposit(paymethod,ammount,number);

});


// service add method

function makeDeposit(paymethod,ammount,number){

    alert(paymethod+ammount+number)

      if(paymethod.length==0){
        toastr.error("Paymethod is empty");  
      }else if(ammount.length==0){
        toastr.error("Ammount is empty");
      }else if(number.length==0){
        toastr.error("Number is empty");
      }
      else{ 
        axios.post('/makedeposit',{ 
                        pmethod:paymethod,
                        ammount:ammount,
                        number:number
                      })
                      .then(function(response){

                        if(response.data==1)
                        {
                          $('#addModal').modal('hide');
                          toastr.success("add success");
                          getTransectionData()
                    
                        }else{
                        
                          $('#addModal').modal('hide');
                          toastr.error("add Faild");
                          getTransectionData()
                        }

                      }).catch(function (error) {
                    

                    });

        }


}


</script>
    
@endsection