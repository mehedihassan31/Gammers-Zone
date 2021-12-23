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
                  <th class="th-sm">Match Type</th>
                  <th class="th-sm">Room Id</th>
                  <th class="th-sm">Room Password</th>
                  <th class="th-sm">Totall People's</th>
                  <th class="th-sm">Entry Fee</th>
                  <th class="th-sm">Match Time</th>
                  <th class="th-sm">Winning Price</th>
                  <th class="th-sm">Edit</th>
                  <th class="th-sm">Match Status</th>
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
                                    <Label>Transection Id:</Label><h5 type="hidden"  id="updateCourseid"> </h5>
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

{{-- <div class="modal fade" id="updateCourseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Update Course</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body  text-center">
                                <div id="courseEditFrom" class="container d-none">
                                        <br><h5 id="updateCourseid"></h5>
                                      <div class="row">
                                          <div class="col-md-6">
                                            <input id="CourseNameUpdateId" type="text" id="" class="form-control mb-3" placeholder="Course Name">
                                              <input id="CourseDesUpdateId" type="text" id="" class="form-control mb-3" placeholder="Course Description">
                                            <input id="CourseFeeUpdateId" type="text" id="" class="form-control mb-3" placeholder="Course Fee">
                                            <input id="CourseEnrollUpdateId" type="text" id="" class="form-control mb-3" placeholder="Total Enroll">
                                          </div>
                                          <div class="col-md-6">
                                            <input id="CourseClassUpdateId" type="text" id="" class="form-control mb-3" placeholder="Total Class">      
                                            <input id="CourseLinkUpdateId" type="text" id="" class="form-control mb-3" placeholder="Course Link">
                                            <input id="CourseImgUpdateId" type="text" id="" class="form-control mb-3" placeholder="Course Image">
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
</div> --}}
    
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
                "<td class='td-sm'>"+jsonData[i].match_type+"</td>"+
                "<td class='td-sm'>"+jsonData[i].room_id+"</td>"+
                "<td class='td-sm'>"+jsonData[i].room_password+"</td>"+
                "<td class='td-sm'>"+jsonData[i].totall_p+"</td>"+
                "<td class='td-sm'>"+jsonData[i].Entry_Fee+"</td>"+
                "<td class='td-sm'>"+jsonData[i].match_time+"</td>"+
                "<td class='td-sm'>"+jsonData[i].winning_price+"</td>"+
                "<td> <a  href={{url('/admin/results')}}/"+jsonData[i].id+"><i class='fas fa-edit'>Results</i></a></td>"+
                "<td> <a class='statusbtn' data-id='"+jsonData[i].id+"' >"+jsonData[i].resultstatus+"<i class='fas fa-edit'>Update Status</i></a></td>"+
               "<td><a class='courseDeletebtn'  data-id='"+jsonData[i].id+"' ><i class='fas fa-trash-alt'></i></a></td>"
              ).appendTo('#course_table');
            })

            $('.courseDeletebtn').click(function(){
              var id= $(this).data('id');
              $('#deleteCourseModal').modal('show');
              $('#courseDeletebtnid').html(id);
            });


            $('.statusbtn').click(function(){
              var id=$(this).data('id');
              $('#updateCourseid').html(id);
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

  matchAdd(matchNameId,gameDeviceId,TypeId,Version,MapId,matchTypeId,roomId,roompasswordId,totallpeople,entryFee,matchtime,winningprice,runnersFirstUp,runnersSecondUp,perKill,totallprice,gamelink,GameName,gametypebyday);
})



// course add method
function matchAdd(matchNameId,gameDeviceId,TypeId,Version,MapId,matchTypeId,roomId,roompasswordId,totallpeople,entryFee,matchtime,winningprice,runnersFirstUp,runnersSecondUp,perKill,totallprice,gamelink,GameName,gametypebyday){



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
      gametypebyday:gametypebyday

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
  var  id=$('#updateCourseid').html();
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






// update course

// function courseUpdatedetails(detailsid){

//   axios.post('/CourseDetails',{
//     id:detailsid
//   })
//   .then(function(response){
//     if(response.status==200){

//       $('#courseEditFrom').removeClass('d-none');
//       $('#loaderDivUpdate').addClass('d-none');

//       var jsonData=response.data;

//           $('#CourseNameUpdateId').val(jsonData[0].course_name);
//           $('#CourseDesUpdateId').val(jsonData[0].course_des);
//           $('#CourseFeeUpdateId').val(jsonData[0].course_fee);
//           $('#CourseEnrollUpdateId').val(jsonData[0].course_totalenroll);
//           $('#CourseClassUpdateId').val(jsonData[0].course_totalclass);
//           $('#CourseLinkUpdateId').val(jsonData[0].course_link);
//           $('#CourseImgUpdateId').val(jsonData[0].course_img);

//     }else{

//       $('#loaderDivUpdate').addClass('d-none');
//       $('#wrongDivUpdate').removeClass('d-none');
//     }
//   }).catch(function(error){

//     $('#loaderDivUpdate').addClass('d-none');
//     $('#wrongDivUpdate').removeClass('d-none');
//   })


// }



// Course update


// $('#CourseUpdateConfirmBtn').click(function(){
//   var  CourseId=$('#updateCourseid').html();
//   var  CourseName=$('#CourseNameUpdateId').val();
//   var  CourseDes=$('#CourseDesUpdateId').val();
//   var  CourseFee=$('#CourseFeeUpdateId').val();
//   var  CourseEnroll=$('#CourseEnrollUpdateId').val();
//   var  CourseClass=$('#CourseClassUpdateId').val();
//   var  CourseLink=$('#CourseLinkUpdateId').val();
//   var  CourseImg=$('#CourseImgUpdateId').val();

// courseUpdate(CourseId,CourseName,CourseDes,CourseFee,CourseEnroll,CourseClass,CourseLink,CourseImg);
// })

// function courseUpdate(CourseId,CourseName,CourseDes,CourseFee,CourseEnroll,CourseClass,CourseLink,CourseImg){

//   if(CourseName.length==0){
//     toastr.error('Course Name is empty!');
//   }else if(CourseDes.length==0){
//     toastr.error('Course Des is empty!');

//   }else if(CourseFee.length==0){
//     toastr.error('Course Fee is empty!');
//   }else if(CourseEnroll.length==0){
//     toastr.error('Course Enroll is empty!');
//   }else if(CourseClass.length==0){
//     toastr.error('Course Class is empty!');
//   }else if(CourseLink.length==0){
//     toastr.error('Course Link is empty!');
//   }else if(CourseImg.length==0){
//     toastr.error('Course Image is empty!');
//   }else{
//     $('#CourseUpdateConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
//     axios.post('/CourseUpdate',{
//       id: CourseId,
//       course_name: CourseName,
//       course_des: CourseDes,
//       course_fee: CourseFee,
//       course_totalenroll: CourseEnroll,
//       course_totalclass: CourseClass,
//       course_link: CourseLink,
//       course_img: CourseImg
//     })
//     .then(function(response){
//       $('#CourseUpdateConfirmBtn').html("Save");
//       if(response.status==200){

//         if(response.data==1){
//           $('#updateCourseModal').modal('hide');
//           toastr.success("Update success");
//           getCoursesData();
//         }else{

//           $('#updateCourseModal').modal('hide');
//           toastr.error("Update fail");
//           getCoursesData();
//         }

//       }else{
//         $('#updateCourseModal').modal('hide');
//         toastr.error("Something went wrong");
//       }


//     }).catch(function(error){
//       $('#updateCourseModal').modal('hide');
//       toastr.error("Something went wrong");

//     });
//   }
// }



</script>
    
@endsection