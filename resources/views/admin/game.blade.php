@extends('admin.layout.app')
@section('content')
<div id="mainDivCourse" class="container-fluid d-none">
    <div class="row">
        <div class="col-md-12 p-1">

                <button id="addCoursebtn" class="btn btn-sm mr-3 btn-danger">Add New</button>

            <table id="coursedatatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th class="th-sm">Name</th>
                  <th class="th-sm">Device</th>
                  <th class="th-sm">Type</th>
                  <th class="th-sm">Version</th>
                  <th class="th-sm">Map</th>
                  <th class="th-sm">Results</th>
                  <th class="th-sm">Match Status</th>
                  <th class="th-sm">Edit and View</th>
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



{{-- 
add modal --}}



  <div class="modal fade" id="addCourseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Add New Game</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body  text-center">
       <div class="container">
       	<div class="row">
       		<div class="col-md-6">
          <input id="matchNameId" type="text"  class="form-control mb-3" placeholder="Match Name">
          <input id="gameDeviceId" type="text"  class="form-control mb-3" placeholder="Device">
    		 	<input id="TypeId" type="text" class="form-control mb-3" placeholder="Type">
     			<input id="Version" type="text" class="form-control mb-3" placeholder="Version">
    		 	<input id="MapId" type="text"  class="form-control mb-3" placeholder="Map">
           <div class="mb-1">
            <Label>Match type :   </Label>
            <div class="custom-select" style="width:200px;">
              <select id="matchTypeId" >
                <option value="">Select</option>
                <option value="Paid">Paid</option>
                <option value="Unpaid">Unpaid</option>
              </select>
            </div>
           </div>

           <input id="roomId" type="text"  class="form-control mb-3" placeholder="Room id">      
     			<input id="roompasswordId" type="text" i class="form-control mb-3" placeholder="Room Password">
     			<input id="totallpeople" type="text"  class="form-control mb-3" placeholder="Totall People's">
     			<input id="entryFee" type="text"  class="form-control mb-3" placeholder="Entry Fee">
       		</div>
       		<div class="col-md-6">
             <input id="matchtime" type="datetime-local"  class="form-control mb-3" placeholder="Time">
     			<input id="winningprice" type="text"  class="form-control mb-3" placeholder="Winning Price">
     			<input id="runnersFirstUp" type="text"  class="form-control mb-3" placeholder="First Runner's up ">
     			<input id="runnersSecondUp" type="text"  class="form-control mb-3" placeholder="Second Runner's up ">
     			<input id="perKill" type="text"  class="form-control mb-3" placeholder="Per Kill">
     			<input id="totallprice" type="text" class="form-control mb-3" placeholder="Total Price">
     			<input id="gamelink" type="text"  class="form-control mb-3" placeholder="Game Link">
     			<input id="GameName" type="text"  class="form-control mb-3" placeholder="Game Name">

           <input id="dcoin" type="text"  class="form-control mb-3" placeholder="Default Coin">
           <input id="chskill" type="text" class="form-control mb-3" placeholder="Character Skill">
           <input id="limitammo" type="text"  class="form-control mb-3" placeholder="Limited Ammo">
           <input id="round" type="text"  class="form-control mb-3" placeholder="Round">
           
           <div>
                <Label>Game Type by Day</Label>
                <div class="custom-select"  style="width:200px;">
                  <select id="gametypebyday">
                    <option value="">Select type:</option>
                    <option value="1">Daily Matches</option>
                    <option value="2">Tournaments / Scrims</option>
                  </select>
                </div>
           </div>
       		</div>
       	</div>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button  id="CourseAddConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>






{{-- delete modal --}}
<div class="modal fade" id="deleteCourseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">

            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete course</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
            <h6>Do you want to delete?</h6>
            <h2 id="courseDeletebtnid"></h2>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
              <button data-id='' id='courseConfrmDeletebtn' type="button" class="btn btn-sm btn-danger">Yes</button>
            </div>
          </div>
        </div>
</div>








<div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                    <Label>Transection Id:</Label><h5 type="hidden"  id="updatestatusid"> </h5>
                                      <div class="row">
                                          <div class="card mx-auto">
                                            {{-- <a  class="btn btn-primary" id="statusId">Pending</a> --}}
                                            <a  class="btn btn-primary" id="statusId">close</a>
                                          </div>
                                      </div>
                                </div>
                      </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                  </div>
      </div>
    </div>
</div>







{{-- Update modal --}}

<div class="modal fade" id="updateCourseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Update Game And View</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body  text-center">
                                <div id="courseEditFrom" class="container ">
                                        <br> <label>Match Id: </label><h5 id="updateCourseid"></h5>
                                      <div class="row">
                                          <div class="col-md-6">
                                            <input id="matchupdateNameId" type="text"  class="form-control mb-3" placeholder="Match Name">
                                            <input id="gameupdateDeviceId" type="text"  class="form-control mb-3" placeholder="Device">
                                             <input id="TypeupdateId" type="text" class="form-control mb-3" placeholder="Type">
                                             <input id="updateVersion" type="text" class="form-control mb-3" placeholder="Version">
                                             <input id="updateMapId" type="text"  class="form-control mb-3" placeholder="Map">
                                             <div class="mb-1">
                                              <Label>Match type :  </Label>                                              
                                                <h2 id="matchupdateTypeId">
                                                </h2>
                                              
                                             </div>                                 
                                             <input id="roomupdateId" type="text"  class="form-control mb-3" placeholder="Room id">      
                                             <input id="roomupdatepasswordId" type="text" i class="form-control mb-3" placeholder="Room Password">
                                             <input id="totallupdatepeople" type="text"  class="form-control mb-3" placeholder="Totall People's">
                                             <input id="entryupdateFee" type="text"  class="form-control mb-3" placeholder="Entry Fee">
                                             </div>
                                             <div class="col-md-6">
                                             <label>Match Time:</label> <h4 id="matchupdatetime" ></h4>
                                             <input id="winningupdateprice" type="text"  class="form-control mb-3" placeholder="Winning Price">
                                             <input id="runnersupdateFirstUp" type="text"  class="form-control mb-3" placeholder="First Runner's up ">
                                             <input id="runnersupdateSecondUp" type="text"  class="form-control mb-3" placeholder="Second Runner's up ">
                                             <input id="perupdateKill" type="text"  class="form-control mb-3" placeholder="Per Kill">
                                             <input id="totallupdateprice" type="text" class="form-control mb-3" placeholder="Total Price">
                                             <input id="gameupdatelink" type="text"  class="form-control mb-3" placeholder="Game Link">
                                             <input id="GameupdateName" type="text"  class="form-control mb-3" placeholder="Game Name">

                                             <input id="updatedcoin" type="text"  class="form-control mb-3" placeholder="Default Coin">
                                             <input id="updatechskill" type="text" class="form-control mb-3" placeholder="Character Skill">
                                             <input id="updatelimitammo" type="text"  class="form-control mb-3" placeholder="Limited Ammo">
                                             <input id="updateround" type="text"  class="form-control mb-3" placeholder="Round">

                                             </div>



                                      </div>
                                </div>

                              <div id="loaderDivUpdate" class="container">
                                  <div class="row">
                                    <div class="col-md-12 p-5 text-center">
                                        <img class="loading-icon m-5" src="{{asset('images/loader.svg')}}" alt="">
                                    </div>
                                  </div>
                              </div>

                              <div id="wrongDivUpdate" class="container d-none">
                                    <div class="row">
                                      <div class="col-md-12 p-5 text-center">
                                          <h3>Something went worng</h3>
                                      </div>
                                    </div>
                              </div>


                      </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                    <button  id="CourseUpdateConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
                  </div>
      </div>
    </div>
</div>
    
@endsection


@section('script')
<script>
getOrderData();
function getOrderData(){
  axios.get('/admin/getGameData')
        .then(function(response){
          if(response.status==200){
            $('#mainDivCourse').removeClass('d-none');
            $('#loaderDivCourse').addClass('d-none');
            $('#coursedatatable').DataTable().destroy();
          
            $('#course_table').empty();
           
            var jsonData=response.data;
            $.each(jsonData, function(i){
              $('<tr>').html(
                "<td class='td-sm'>"+jsonData[i].name+"</td>"+
                "<td class='td-sm'>"+jsonData[i].Device+"</td>"+
                "<td class='td-sm'>"+jsonData[i].Type+"</td>"+
                "<td class='td-sm'>"+jsonData[i].version+"</td>"+
                "<td class='td-sm'>"+jsonData[i].map+"</td>"+
                "<td> <a  href={{url('/admin/results')}}/"+jsonData[i].id+"><i class='fas fa-edit'>Results</i></a></td>"+
                "<td> <a class='statusbtn' data-id='"+jsonData[i].id+"' >"+jsonData[i].resultstatus+"<br><i class='fas fa-edit'>Update Status</i></a></td>"+
                "<td> <a class='courseeditbtn' data-id='"+jsonData[i].id+"' ><i class='fas fa-edit'>Update And Edit</i></a></td>"+
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
              courseUpdatedetails(id);
              $('#updateCourseid').html(id);
              $('#updateCourseModal').modal('show');
              
            })



            $('.statusbtn').click(function(){
              var id=$(this).data('id');
              $('#updatestatusid').html(id);
              $('#statusModal').modal('show');
              
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


$('#addCoursebtn').click(function(){
  $('#addCourseModal').modal('show');

})




$('#CourseAddConfirmBtn').click(function(){
  var  matchNameId=$('#matchNameId').val();
  var  gameDeviceId=$('#gameDeviceId').val();
  var  TypeId=$('#TypeId').val();
  var  Version=$('#Version').val();
  var  MapId=$('#MapId').val();
  var  matchTypeId=$('#matchTypeId').val();
  var  roomId=$('#roomId').val();
  var  roompasswordId=$('#roompasswordId').val();
  var  totallpeople=$('#totallpeople').val();
  var  entryFee=$('#entryFee').val();
  var  matchtime=$('#matchtime').val();
  var  winningprice=$('#winningprice').val();
  var  runnersFirstUp=$('#runnersFirstUp').val();
  var  runnersSecondUp=$('#runnersSecondUp').val();
  var  perKill=$('#perKill').val();
  var  totallprice=$('#totallprice').val();
  var  gamelink=$('#gamelink').val();
  var  GameName=$('#GameName').val();
  var  gametypebyday=$('#gametypebyday').val();
  var  dcoin=$('#dcoin').val();
  var  chskill=$('#chskill').val();
  var  limitammo=$('#limitammo').val();
  var  round=$('#round').val();
  
                                             

  matchAdd(matchNameId,gameDeviceId,TypeId,Version,MapId,matchTypeId,roomId,roompasswordId,totallpeople,entryFee,matchtime,winningprice,runnersFirstUp,runnersSecondUp,perKill,totallprice,gamelink,GameName,gametypebyday,dcoin,chskill,limitammo,round);
})



// course add method
function matchAdd(matchNameId,gameDeviceId,TypeId,Version,MapId,matchTypeId,roomId,roompasswordId,totallpeople,entryFee,matchtime,winningprice,runnersFirstUp,runnersSecondUp,perKill,totallprice,gamelink,GameName,gametypebyday,dcoin,chskill,limitammo,round){

  if(matchNameId.length==0){
    toastr.error('Match Name is empty!');
  }else if(gameDeviceId.length==0){
    toastr.error('Device is empty!');
  }else if(TypeId.length==0){
    toastr.error('Type Fee is empty!');
  }else if(Version.length==0){
    toastr.error('Version  empty!');
  }else if(MapId.length==0){
    toastr.error('Map is empty!');
  }else if(matchTypeId.length==0){
    toastr.error('Match type is empty!');
  }else if(roomId.length==0){
    toastr.error('Room Id is empty!');
  }else if(roompasswordId.length==0){
    toastr.error('Room Password is empty!');
  }else if(totallpeople.length==0){
    toastr.error('Total is empty!');
  }else if(entryFee.length==0){
    toastr.error('Entry fee  is empty!');
  }else if(matchtime.length==0){
    toastr.error('Match time is empty!');
  }else if(winningprice.length==0){
    toastr.error('Winning price is empty!');
  }else if(runnersFirstUp.length==0){
    toastr.error('Runners up First is empty!');
  }else if(runnersSecondUp.length==0){
    toastr.error('Runners up Second is empty!');
  }else if(perKill.length==0){
    toastr.error('Per kill is empty!');
  }else if(totallprice.length==0){
    toastr.error('Totall price is empty!');
  }else if(gamelink.length==0){
    toastr.error('Game Link is empty!');
  }else if(GameName.length==0){
    toastr.error('Game Name is empty!');
  }else if(gametypebyday.length==0){
    toastr.error('Game type BY day is empty!');
  }else{
    $('#CourseAddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
    axios.post('/admin/gameAdd',{
      matchNameId: matchNameId,
      gameDeviceId: gameDeviceId,
      TypeId: TypeId,
      Version: Version,
      MapId: MapId,
      matchTypeId :matchTypeId,
      roomId:roomId,
      roompasswordId:roompasswordId,
      totallpeople:totallpeople,
      entryFee:entryFee,
      matchtime:matchtime,
      winningprice:winningprice,
      runnersFirstUp:runnersFirstUp,
      runnersSecondUp:runnersSecondUp,
      perKill:perKill,
      totallprice:totallprice,
      gamelink:gamelink,
      GameName:GameName,
      gametypebyday:gametypebyday,
      dcoin:dcoin,
      chskill:chskill,
      limitammo:limitammo,
      round:round,

    })
    .then(function(response){
      $('#CourseAddConfirmBtn').html("Save");
      if(response.data==1){
          $('#addCourseModal').modal('hide');
          toastr.success("add success");
          getOrderData();
        }else{
        $('#addCourseModal').modal('hide');
        toastr.error("Something Went Wrong!");
        getOrderData();
      }
    }).catch(function(error){
      $('#addCourseModal').modal('hide');
      toastr.error("Something Went Wrong!");
    });

  }

}


// status update
$('#statusId').click(function(){
  var  id=$('#updatestatusid').html();
  var  status=$('#statusId').text();
   statusUpdate(id,status);
})
function statusUpdate(id,status){

    axios.post('/admin/gameStatusConfirm',{
                    id:id,
                    status:status
                  })
                  .then(function(response){

                    if(response.data==1)
                    {
                      $('#statusModal').modal('hide');
                      toastr.success("Update success");
                      getOrderData();
                
                    }else{
                    
                      $('#statusModal').modal('hide');
                      toastr.error("Update Faild");
                      getOrderData();
                    }
                
                
                  }).catch(function (error) {
                    $('#statusModal').modal('hide');
                    toastr.error("Something went wrong");

                });
}





//delete course

$('#courseConfrmDeletebtn').click(function(){
var id=$('#courseDeletebtnid').html();
 gameDelete(id);
})


function gameDelete(deleteid){

  $('#courseConfrmDeletebtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");

  axios.post('/admin/gameDelete',{id: deleteid})
  .then(function(response){
    $('#courseConfrmDeletebtn').html("Yes");
    if(response.status==200){
      if(response.data==1){
        $('#deleteCourseModal').modal('hide');
        toastr.success("Delete success");
        getOrderData();

      }else{
        $('#deleteCourseModal').modal('hide');
        toastr.error("Delete fail");
        getOrderData();

      }

    }else{
      $('#deleteCourseModal').modal('hide');
      toastr.error("Something went wrong");


    }

  }).catch(function(error){
    $('#deleteCourseModal').modal('hide');
      toastr.error("Something went wrong");
  })
}






// update game details

function courseUpdatedetails(id){

  axios.post('/admin/gameDetails',{
    id:id,
  }).then(function(response){
    if(response.status==200){

      $('#courseEditFrom').removeClass('d-none');
      $('#loaderDivUpdate').addClass('d-none');
        var jsonData=response.data;

        $('#matchupdateNameId').val(jsonData[0].name);
        $('#gameupdateDeviceId').val(jsonData[0].Device);
        $('#TypeupdateId').val(jsonData[0].Type);
        $('#updateVersion').val(jsonData[0].version);
        $('#updateMapId').val(jsonData[0].map);
        $('#matchupdateTypeId').html(jsonData[0].match_type);
        $('#roomupdateId').val(jsonData[0].room_id);
        $('#roomupdatepasswordId').val(jsonData[0].room_password);
        $('#totallupdatepeople').val(jsonData[0].totall_p);
        $('#entryupdateFee').val(jsonData[0].Entry_Fee);
        $('#matchupdatetime').html(jsonData[0].match_time);
        $('#winningupdateprice').val(jsonData[0].winning_price);
        $('#runnersupdateFirstUp').val(jsonData[0].runnerup_one);
        $('#runnersupdateSecondUp').val(jsonData[0].runnerup_two);
        $('#perupdateKill').val(jsonData[0].per_kill);
        $('#totallupdateprice').val(jsonData[0].total_price);
        $('#gameupdatelink').val(jsonData[0].game_link);
        $('#GameupdateName').val(jsonData[0].game_name);
        $('#updatedcoin').val(jsonData[0].default_coin);
        $('#updatechskill').val(jsonData[0].cskill);
        $('#updatelimitammo').val(jsonData[0].limited_ammo);
        $('#updateround').val(jsonData[0].round);
        

    }else{

      $('#loaderDivUpdate').addClass('d-none');
      $('#wrongDivUpdate').removeClass('d-none');
    }
  }).catch(function(error){

    $('#loaderDivUpdate').addClass('d-none');
    $('#wrongDivUpdate').removeClass('d-none');
  })



}


//  game update

$('#CourseUpdateConfirmBtn').click(function(){
  
  var  id=$('#updateCourseid').html();
  var  matchNameId=$('#matchupdateNameId').val();
  var  gameDeviceId=$('#gameupdateDeviceId').val();
  var  TypeId=$('#TypeupdateId').val();
  var  Version=$('#updateVersion').val();
  var  MapId=$('#updateMapId').val();
  var  roomId=$('#roomupdateId').val();
  var  roompasswordId=$('#roomupdatepasswordId').val();
  var  totallpeople=$('#totallupdatepeople').val();
  var  entryFee=$('#entryupdateFee').val();

  var  winningprice=$('#winningupdateprice').val();
  var  runnersFirstUp=$('#runnersupdateFirstUp').val();
  var  runnersSecondUp=$('#runnersupdateSecondUp').val();
  var  perKill=$('#perupdateKill').val();
  var  totallprice=$('#totallupdateprice').val();
  var  gamelink=$('#gameupdatelink').val();
  var  GameName=$('#GameupdateName').val();

  var  dcoin=$('#updatedcoin').val();
  var  cskill=$('#updatechskill').val();
  var  limitammo=$('#updatelimitammo').val();
  var  round=$('#updateround').val();



  courseUpdate(id,matchNameId,gameDeviceId,TypeId,Version,MapId,roomId,roompasswordId,totallpeople,entryFee,winningprice,runnersFirstUp,runnersSecondUp,perKill,totallprice,gamelink,GameName,dcoin,cskill,limitammo,round);
})

function courseUpdate(id,matchNameId,gameDeviceId,TypeId,Version,MapId,roomId,roompasswordId,totallpeople,entryFee,winningprice,runnersFirstUp,runnersSecondUp,perKill,totallprice,gamelink,GameName,dcoin,cskill,limitammo,round){

  if(matchNameId.length==0){
    toastr.error('Match Name is empty!');
  }else if(gameDeviceId.length==0){
    toastr.error('Device is empty!');
  }else if(TypeId.length==0){
    toastr.error('Type Fee is empty!');
  }else if(Version.length==0){
    toastr.error('Version  empty!');
  }else if(MapId.length==0){
    toastr.error('Map is empty!');
  }else if(roomId.length==0){
    toastr.error('Room Id is empty!');
  }else if(roompasswordId.length==0){
    toastr.error('Room Password is empty!');
  }else if(totallpeople.length==0){
    toastr.error('Total is empty!');
  }else if(entryFee.length==0){
    toastr.error('Entry fee  is empty!');
  }else if(winningprice.length==0){
    toastr.error('Winning price is empty!');
  }else if(runnersFirstUp.length==0){
    toastr.error('Runners up First is empty!');
  }else if(runnersSecondUp.length==0){
    toastr.error('Runners up Second is empty!');
  }else if(perKill.length==0){
    toastr.error('Per kill is empty!');
  }else if(totallprice.length==0){
    toastr.error('Totall price is empty!');
  }else if(gamelink.length==0){
    toastr.error('Game Link is empty!');
  }else if(GameName.length==0){
    toastr.error('Game Name is empty!');
  }else{
    $('#CourseUpdateConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
    axios.post('/admin/gameUpdate',{
      id:id,
      matchNameId: matchNameId,
      gameDeviceId: gameDeviceId,
      TypeId: TypeId,
      Version: Version,
      MapId: MapId,
      roomId:roomId,
      roompasswordId:roompasswordId,
      totallpeople:totallpeople,
      entryFee:entryFee,
      winningprice:winningprice,
      runnersFirstUp:runnersFirstUp,
      runnersSecondUp:runnersSecondUp,
      perKill:perKill,
      totallprice:totallprice,
      gamelink:gamelink,
      GameName:GameName,
      dcoin:dcoin,
      cskill:cskill,
      limitammo:limitammo,
      round:round
    })
    .then(function(response){
      $('#CourseUpdateConfirmBtn').html("Save");
      if(response.status==200){

        if(response.data==1){
          $('#updateCourseModal').modal('hide');
          toastr.success("Update success");
          getOrderData();
        }else{

          $('#updateCourseModal').modal('hide');
          toastr.error("Update fail");
          getOrderData();
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
}



</script>
    
@endsection