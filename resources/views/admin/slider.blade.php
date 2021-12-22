@extends('admin.layout.app')
@section('title','Slider')
@section('content')


<div id="maindiv" class="container d-none">
    <div class="row">
    <div class="col-md-12 p-5">

      <button id="addnewbtn" class="btn btn-sm mr-3 btn-danger">Add New</button>

    <table id="serviceDatatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th class="th-sm">Image</th>
          <th class="th-sm">Title</th>
          <th class="th-sm">link</th>
          <th class="th-sm">Delete</th>
        </tr>
      </thead>

      <tbody id="slidertable">
      
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
          <h5 class="modal-title" id="exampleModalLabel">Delete Services</h5>
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
                  <input type="text" id="srid1" class="form-control" placeholder="Service name ">
                </div>
                <div class="form-outline mb-4">
                  <input type="text" id="srid2" class="form-control" placeholder="Service Description">
                </div>
                <div class="form-outline mb-4">
                  <input type="text" id="srid3" class="form-control" placeholder="Link">
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
        <h5 class="modal-title" id="exampleModalLabel">Add New Slider</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form>
          <div id="serviceaddfrm" >

            <h6></h6>
              <!-- Name input -->


              <div class="mb-2">
                <input id="imgInput" type="file" >
                <img class=" imgpreview " src="{{asset('images/default-image.jpg')}}" alt="" id="imgpreview">
              </div>

              <div class="form-outline mb-4">
                <input type="text" id="sraddid1" class="form-control" placeholder="Title">
              </div>
              <div class="form-outline mb-4">
                <input type="text" id="sraddid3" class="form-control" placeholder="Link">
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
getSliderData();
function getSliderData(){
axios.get('/admin/getSliderData')
.then(function (response){

  if(response.status==200)
  {
    $('#maindiv').removeClass('d-none');
    $('#loaderdiv').addClass('d-none');
    $('#serviceDatatable').DataTable().destroy();
    $('#slidertable').empty();
    var jsonData=response.data;
    $.each(jsonData,function(i,item){
    $('<tr>').html(
    "<td><img class='table-img' src='"+jsonData[i].photo+"'></td>"+
    "<td>"+jsonData[i].title+ "</td>"+
    "<td>"+jsonData[i].link+"</td>"+
    "<td><a class='serviceDeletebtn' data-photo='"+jsonData[i].photo+"' data-id='"+jsonData[i].id+"' ><i class='fas fa-trash-alt'></i></a></td>"
     ).appendTo('#slidertable');
    });

  //services delete
$('.serviceDeletebtn').click(function(event){
  var id=$(this).data('id');
  var photo =$(this).data('photo');
  $('#serconfmdeltebtn').attr({ "data-id":id,"data-photo":photo});
  $('#deleteModal').modal('show');
  event.preventDefault();


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



$('#serconfmdeltebtn').click(function(event){
  var id=$(this).data('id');
  var photo =$(this).data('photo');
  var myFormdata=new FormData();
  myFormdata.append('id',id);
  myFormdata.append('oldphotourl',photo);
  sliderDelete(myFormdata);
  event.preventDefault();
})

function sliderDelete(myFormdata){
  axios.post('/admin/SliderDelete',myFormdata)
  .then(function(response){
    if(response.data==1)
    {
      $('#deleteModal').modal('hide');
      toastr.success("Delete success");
      getSliderData();
      location.reload();

    }else{
    
      $('#deleteModal').modal('hide');
      toastr.error("Delete Faild");
      getSliderData();
      location.reload();
    }


  }).catch(function (error) {


});


}





// silder add--------------------------------------

$('#addnewbtn').click(function(){

$('#addModal').modal('show');

});


$('#imgInput').change(function(){

var reader=new FileReader();
reader.readAsDataURL(this.files[0]);
reader.onload=function(event){
    var ImgSource=event.target.result;
    $('#imgpreview').attr('src',ImgSource)
}
})



$('#serconfmaddbtn').click(function(event){
  var title=$('#sraddid1').val();
  var link=$('#sraddid3').val();
  var PhotoFile= $('#imgInput').prop('files')[0];
  var formData=new FormData();
  formData.append('title',title);
  formData.append('link',link);
  formData.append('photo',PhotoFile);
  sliderAdd(formData);
  event.preventDefault();

});


// service add method


function sliderAdd(formData){

    axios.post('/admin/SliderAdd',formData)
                  .then(function(response){

                    if(response.data==1)
                    {
                      $('#addModal').modal('hide');
                      toastr.success("add success");
                      getSliderData();
                
                    }else{
                    
                      $('#addModal').modal('hide');
                      toastr.error("add Faild");
                      getSliderData();
                    }

                  }).catch(function (error) {
                
                });
}

</script>
    
@endsection





