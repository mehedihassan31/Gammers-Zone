function getreviewdata(){
  axios.get('/getreviewsdata')
  .then(function(response){

    if(response.status==200){

    $('#mainDivReview').removeClass('d-none');     
    $('#loaderDivReview').addClass('d-none');
    $('#Reviewdatatable').DataTable().destroy();
    $('#review_table').empty();

      var jsonData=response.data;
      $.each(jsonData,function(i){
        $('<tr>').html(
          "<td class='td-sm'>"+jsonData[i].name+"</td>"+
          "<td class='td-sm'>"+jsonData[i].des+"</td>" +
          "<td> <a class='revieweditbtn' data-id='"+jsonData[i].id+"' ><i class='fas fa-edit'></i></a>Edit</td>"+
         "<td><a class='reviewDeletebtn'  data-id='"+jsonData[i].id+"' ><i class='fas fa-trash-alt'></i></a></td>"
        ).appendTo('#review_table');
      })

      $('.reviewDeletebtn').click(function(){
        var id = $(this).data('id');
        $('#deleteReviewModal').modal('show');
        $('#reviewDeletebtnid').html(id);
      })

      $('.revieweditbtn').click(function(){
        var id = $(this).data('id');
        reviewUpdatedetails(id);
        $('#reviewReviewid').html(id);
        $('#updateReviewModal').modal('show');
        
       
      })

      $('#Reviewdatatable').DataTable({"order":false});
      $('.dataTables_length').addClass('bs-select');

    }else{
      $('#loaderDivReview').addClass('d-none');
      $('#wrongDivReview').removeClass('d-none');  
    }

  }).catch(function(error){

    $('#loaderDivReview').addClass('d-none');
    $('#wrongDivReview').removeClass('d-none');  

  })
}

//delete Review


$('#reviewConfrmDeletebtn').click(function(){
  var id=$('#reviewDeletebtnid').html();
  deleteReview(id);
  })
  

function deleteReview(deleteid){

  $('#reviewConfrmDeletebtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
  axios.post('/reviewdelete',{
    id:deleteid}).then(function(response){

    $('#reviewConfrmDeletebtn').html('Yes');
    if(response.status==200){
      if(response.data==1)
      {
        $('#deleteReviewModal').modal('hide');
        toastr.success('delete sucessful');
        getreviewdata();
      }else{
        $('#deleteReviewModal').modal('hide');
        toastr.error('delete failed');
        getreviewdata();
      }

    }else{
      $('#deleteReviewModal').modal('hide');
      toastr.error("Something went wrong");
    }
  }).catch(function(error){
    $('#deleteReviewModal').modal('hide');
    toastr.error("Something went wrong");

  })

}



//add Review

$('#addReviewbtn').click(function(){
  $('#addReviewModal').modal('show');
})

$('#ReviewAddConfirmBtn').click(function(){
  var  ReviewName=$('#ReviewNameId').val();
  var  ReviewDes=$('#ReviewDesId').val();
  var  ReviewImg=$('#ReviewImgId').val();
  addReview(ReviewName,ReviewDes,ReviewImg);
})

function addReview(ReviewName,ReviewDes,ReviewImg){

  if(ReviewName.length==0){
    toastr.error('Name is empty!');
  }else if(ReviewDes.length==0){
    toastr.error('Des is empty!');
  }else if(ReviewImg.length==0){
    toastr.error('Img is empty!');
  }else{
    $('#ReviewAddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
    axios.post('/reviewAdd',{
      name:ReviewName,
      des: ReviewDes,
      img: ReviewImg
    })
    .then(function(response){
      $('#ReviewAddConfirmBtn').html("Save");
      if(response.status==200){
        if(response.data==1){
          $('#addReviewModal').modal('hide');
          toastr.success("add success");
          getreviewdata();
        }else{
          $('#addReviewModal').modal('hide');
          toastr.error("add failed");
          getreviewdata(); }

      }else{
        $('#addReviewModal').modal('hide');
        toastr.error("Something Went Wrong!");
      }

    }).catch(function(error){
      $('#addReviewModal').modal('hide');
      toastr.error("Something Went Wrong gg!");
    });

  }

}


// update Review detials

function reviewUpdatedetails(id){
  axios.post('/ReviewDetails',{
    id:id
  })
  .then(function(response){
    if(response.status==200){

      $('#reviewEditFrom').removeClass('d-none');
      $('#loaderDivReviewUpdate').addClass('d-none');

      var jsonData=response.data;
          $('#ReviewNameUpdateId').val(jsonData[0].name);
          $('#ReviewDesUpdateId').val(jsonData[0].des);
          $('#ReviewImgUpdateId').val(jsonData[0].img);

    }else{

      $('#loaderDivReviewUpdate').addClass('d-none');
      $('#wrongDivReviewUpdate').removeClass('d-none');
    }
  }).catch(function(error){

    $('#loaderDivReviewUpdate').addClass('d-none');
    $('#wrongDivReviewUpdate').removeClass('d-none');
   
  })

}

$('#ReviewUpdateConfirmBtn').click(function(){

  var id=$('#reviewReviewid').html();
  var ReviewName=$('#ReviewNameUpdateId').val();
  var ReviewDes=$('#ReviewDesUpdateId').val();
  var ReviewImg=$('#ReviewImgUpdateId').val();
  updateReview(id,ReviewName,ReviewDes,ReviewImg);
})

// update Review

function updateReview(id,ReviewName,ReviewDes,ReviewImg){

  if(ReviewName.length==0){
    toastr.error('Name is empty!');
  }else if(ReviewDes.length==0){
    toastr.error('Des is empty!');
  }else if(ReviewImg.length==0){
    toastr.error('Img is empty!');
  }else{
  axios.post('/ReviewUpdate',{
    id:id,
    name: ReviewName,
    des: ReviewDes,
    img: ReviewImg
  }).then(function(response){
    if(response.status==200){

      $('#updateReviewModal').modal('hide');
      toastr.success("Update Success")
      getreviewdata()

    }else{
      $('#updateReviewModal').modal('hide');
      toastr.error("Update failed")
    }


  }).catch(function(error){

    $('#updateReviewModal').modal('hide');
    toastr.error("Update failed")

  })

}
}



// Custom Selection



var x, i, j, l, ll, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  ll = selElmnt.length;
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < ll; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
        for (i = 0; i < sl; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;
            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, xl, yl, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;
  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);


