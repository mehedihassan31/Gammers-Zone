@extends('admin.layout.app')
@section('title','Products')

@section('content')

<div id="maindiv" class="container d-none">
    <div class="row">
    <div class="col-md-12 p-5">
      <button id="addnewbtn" class="btn btn-sm mr-3 btn-danger">Add New</button>
    <table id="serviceDatatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th class="th-sm">Diamond Quantity</th>
          <th class="th-sm">price</th>
          <th class="th-sm">Sale Price</th>
          <th class="th-sm">Edit</th>
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
          <h5 class="modal-title" id="exampleModalLabel">Delete Services</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <form>

            <div id="detailsf" class="d-none">
                <h5 id="serviceeditid" class="mt-4 text-center"> </h5>
                <!-- Name input -->
                <div class="form-outline mb-4">
                  <input type="text" id="srid1" class="form-control" placeholder="Diamond Quantity">
                </div>
                <div class="form-outline mb-4">
                  <input type="text" id="srid2" class="form-control" placeholder="Price">
                </div>
                <div class="form-outline mb-4">
                  <input type="text" id="srid3" class="form-control" placeholder="Sale Price">
                </div>

            </div>



            <div id="loaderdivd" class="container">
              <div class="row">
                <div class="col-md-12 p-5 text-center">
                    <img class="loading-icon m-5" src="{{asset('images/loader.svg')}}" alt="">
                </div>
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
          <button data-id='' id='serconfmEditbtn' type="button" class="btn btn-sm btn-danger">Save</button>
        </div>
      </div>
    </div>
  </div> 







  <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Products</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form>
          <div id="serviceaddfrm" >

            <h6></h6>
              <!-- Name input -->
              <div class="form-outline mb-4">
                <input type="text" id="sraddid1" class="form-control" placeholder="Diamond Quantity ">
              </div>
              <div class="form-outline mb-4">
                <input type="text" id="sraddid2" class="form-control" placeholder="Price">
              </div>
              <div class="form-outline mb-4">
                <input type="text" id="sraddid3" class="form-control" placeholder="Sale Price">
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
        <button data-id='' id='serconfmaddbtn' type="button" class="btn btn-sm btn-danger">Add new</button>
      </div>
    </div>
  </div>
</div>

        




@endsection

@section('script')
<script type="text/javascript" >
getProductsData();

function getProductsData(){
axios.get('/admin/getProductsData')
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
    "<td>"+jsonData[i].diamond+ "</td>"+
    "<td>"+jsonData[i].price+"</td>"+
    "<td>"+jsonData[i].sale_price+"</td>"+
    "<td> <a class='serviceeditbtn' data-id='"+jsonData[i].id+"' ><i class='fas fa-edit'></i></a>Edit</td>"+
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
      productDetails(id);
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

function productDelete(deleteid){

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

 // each service update Details

function productDetails(detailid){

  axios.post('/admin/ProductsDetails',{id:detailid})
  .then(function(response){

    if(response.status==200){


      $('#detailsf').removeClass('d-none');
      $('#loaderdivd').addClass('d-none');
      

      var jsonData=response.data;

      $('#srid1').val(jsonData[0].diamond);
      $('#srid2').val(jsonData[0].price);
      $('#srid3').val(jsonData[0].sale_price);

    }else{
      $('#wrongdivd').removeClass('d-none');
      $('#loaderdivd').addClass('d-none');
      

    }


  }).catch(function (error) {

    $('#wrongdivd').removeClass('d-none');
    $('#loaderdivd').addClass('d-none');
});


}



    //services edit confirm
    $('#serconfmEditbtn').click(function(){
      var id=$('#serviceeditid').html();
      var diamond=$('#srid1').val();
      var price=$('#srid2').val();
      var saleprice=$('#srid3').val();

      productUpdate(id,diamond,price,saleprice);

    })

    
function productUpdate(id,diamond,price,saleprice){

  if(diamond.length==0){
    toastr.error("Diamond is empty");
    
  }else if(price.length==0){
    toastr.error("Price is empty");

  } else{

                  axios.post('/admin/ProductsUpdate',{
                    id:id,
                    diamond:diamond,
                    price:price,
                    saleprice:saleprice
                  })
                  .then(function(response){

                    if(response.data==1)
                    {
                      $('#EditModal').modal('hide');
                      toastr.success("Update success");
                      getProductsData();
                
                    }else{
                    
                      $('#EditModal').modal('hide');
                      toastr.error("Update Faild");
                      getproductsData();
                    }
                
                
                  }).catch(function (error) {
                

                });

    }
}


// // service add

$('#addnewbtn').click(function(){

$('#addModal').modal('show');

});


$('#serconfmaddbtn').click(function(){
  var diamond=$('#sraddid1').val();
  var price=$('#sraddid2').val();
  var saleprice=$('#sraddid3').val();

  serviceAdd(diamond,price,saleprice);

});


// service add method


function serviceAdd(diamond,price,saleprice){

      if(diamond.length==0){
        toastr.error("Diamond is empty");  
      }else if(price.length==0){
        toastr.error("Price is empty");
      }else{ 
        axios.post('/admin/ProductsAdd',{ 
                        diamond:diamond,
                        price:price,
                        saleprice:saleprice
                      })
                      .then(function(response){

                        if(response.data==1)
                        {
                          $('#addModal').modal('hide');
                          toastr.success("add success");
                          getProductsData();
                    
                        }else{
                        
                          $('#addModal').modal('hide');
                          toastr.error("add Faild");
                          getProductsData();
                        }

                      }).catch(function (error) {
                    

                    });

        }


}

</script>
    
@endsection