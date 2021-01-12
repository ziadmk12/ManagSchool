
@extends('home')
@section('content')
<div class="header bg-primary ">
    <div class="container-fluid pb-6">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Class</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                <li class="breadcrumb-item active" aria-current="page">Classes</li>
              </ol>
            </nav>
          </div>

        </div>
        <!-- Card stats -->
      </div>
    </div>
  </div>
  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col">
        <div class="card">
          <!-- Card header -->
          <div class="card-header border-0">
            <h3 class="mb-0">add new class
              <!-- Button trigger modal -->
              <a href="" data-toggle="modal" data-target="#exampleModal">
                <i class="ni ni-fat-add text-success"></i>
              </a>
              <a href="{{route('class-pdf')}}">
                <i class="ni ni-cloud-download-95 text-success"></i>
              </a>


<!-- Add Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

    <div class="modal-content" id="modalFr">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">add class</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="addForm" method="POST" enctype="multipart/form-data" >
          @csrf
        <div class="form-group">
          <label for="input-name" class="form-control-label"> Class name </label>
          <input type="text" class="form-control" name="nameclass" placeholder="Enter class name">
        </div>
        <div class="form-group">
          <label for="input-name" class="form-control-label"> Number of student </label>
          <input type="number" class="form-control" name="numberSt" placeholder="Enter number of student ">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button id="save" type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="exampleModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

    <div class="modal-content" id="modalFr">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">edit matter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" method="POST" id="editForm">
          @csrf
          <input type="hidden" id="id" name="id">
          <div class="form-group">
            <label for="input-name" class="form-control-label"> Class name </label>
            <input type="text" class="form-control" id="nameclass" name="nameclass">
          </div>
          <div class="form-group">
            <label for="input-name" class="form-control-label"> Number of student </label>
            <input type="number" class="form-control" id="numberSt" name="numberSt" >
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button id="save" type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
      </div>

    </div>

  </div>
</div>
            </h3>
          </div>
          <!-- Light table -->
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th >Calss name</th>
                  <th >Number of Student</th>
                  <th>created_at</th>          
                  <th >Action</th>

                </tr>
              </thead>
              <tbody id="tableT" class="list">
                @foreach ($Classes as $class)
                  <tr id="tid{{$class->id}}">
                  <td>{{$class->className}}</td>
                  <td>{{$class->numberStudents}}</td>
                  <td>{{$class->created_at}}</td>
                  <td><a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModalEdit" onclick="getClass({{$class->id}})"  class="btn btn-sm btn-info">Edit</a>
                    <a href="javascript:void(0)" onclick="deleteC({{$class->id}})" class="btn btn-sm btn-danger">Delete</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- Card footer -->

        </div>
      </div>
    </div>
  </div>
@endsection

<script src="{{asset('vendor/jquery/dist/jquery.min.js')}}"></script>

<script>
     $(document).ready(function(){
    $('#addForm').on('submit',function(e){
        e.preventDefault();
       

        var formdata = new FormData($("#addForm")[0]);
        
        $.ajax({
          type:"POST",
          enctype:'multipart/form-data',
          url:"{{route('addClass')}}",
          data:formdata,
          processData :false,
          contentType :false,
          cache:false,
          
          
          success:function(response) {
            $("#tableT").append('<tr><td>'+response.className+'</td><td>'+response.numberStudents+'</td><td>'+response.created_at+'</td><td><a data-toggle="modal" data-target="#exampleModalEdit" class="btn btn-sm btn-info" >Edit</a><a class="btn btn-sm btn-danger">Delete</a></td></tr>');
            $('#exampleModal').modal('toggle');
            $("#addForm")[0].reset();
            swal("Good job!", "Saved Successfly", "success");
          },
          error:function(error) {
            alert('Data not saved');
          }
        });


    });
    });
</script>

<script>
     function getClass(id)
  {
    $.get('/class/'+id,function(classe){
      $("#id").val(classe.id);
      $("#nameclass").val(classe.className);
      $("#numberSt").val(classe.numberStudents);
    });
  }


  $(document).ready(function(){

$("#editForm").on('submit',function(e){
e.preventDefault();

// var id= $("#id").val();
// var name= $("#nameclass").val();
// var _token= $("input[name=_token]").val();

var formData = new FormData($("#editForm")[0]);
   
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$.ajax({
  url:"{{route('updateClass')}}",
  type:'POST',
  enctype:'multipart/form-data',
  data:formData,
  processData :false,
      contentType :false,
      cache:false,
  success : function(response){
    // $('#tid'+response.id+ 'td:nth-child(1)').text(response.matterName);
    // $('#tid'+response.id + 'td:nth-child(2)').text(response.created_at);
    $('#exampleModalEdit').modal('toggle');
    $('#editForm')[0].reset();
    swal("Good job!", "Update Successfly", "success");
    
  }
});
});
});
</script>

<script>
    function deleteC(id)
    {
      swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this one !",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
  
      $.ajax({
          url:'class/'+id,
          type:'DELETE',
          data:{
            _token: $("input[name=_token]").val()
          },
          success: function(response){
            $('#tid'+id).remove();
          }
        });
  
      swal("Poof! Your imaginary file has been deleted!", {
        icon: "success",
      });
    } else {
      swal("Your imaginary file is safe!");
    }
  });
  
      // if(confirm("do you realy want to delete this teacher !!"))
      // {
       
      // }
    }
  </script>
