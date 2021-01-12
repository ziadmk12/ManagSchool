

@extends('home')
@section('content')
<div class="header bg-primary ">
    <div class="container-fluid pb-6">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Student</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                <li class="breadcrumb-item active" aria-current="page">Students</li>
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
            <h3 class="mb-0">add new one
              <!-- Button trigger modal -->
              <a href="" data-toggle="modal" data-target="#exampleModal">
                <i class="ni ni-fat-add text-success"></i>
              </a>
             


<!-- Add Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

    <div class="modal-content" id="modalFr">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">add student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="addForm" method="POST" enctype="multipart/form-data" >
          @csrf
        <div class="form-group">
          <label for="input-name" class="form-control-label"> Name </label>
          <input type="text" class="form-control" name="name" placeholder="Enter your name">
        </div>
        <div class="row">
          <div class="col-4">
            <div class="form-group">
              <label for="" class="form-control-label"> Age </label>
                <input type="number" class="form-control" name="age"  placeholder="Enter your age">
              </div>
          </div>
          <div class="col-8">
            <div class="form-group">
              <label for="" class="form-control-label"> Phone number </label>
                <input type="tel" class="form-control" name="phone"  placeholder="Enter your phone number">
              </div>
          </div>
        </div>
        <div class="form-group">
        <label for="" class="form-control-label"> Adress </label>
          <input type="text" class="form-control" name="adress"  placeholder="Enter your adress">
        </div>
         <div class="form-group">
          <label for=""></label>
          <select class="form-control" name="class" id="">
            <option selected>Select one</option>
            @foreach ($classes as $class)
          <option value="{{$class->id}}">{{$class->className}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
        <label for="" class="form-control-label"> Email </label>
          <input type="email" class="form-control" name="email"  placeholder="Enter your email">
        </div>
        <div class="form-group">
        <label for="" class="form-control-label"> Password </label>
          <input type="password" class="form-control" name="password"  placeholder="Enter your password">
        </div>
        <div class="form-group">
        <label for="" class="form-control-label"> Picture </label>
          <input type="file" class="form-control" name="picture" placeholder="Enter your email">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button id="save" type="submit" class="btn btn-primary">Save teacher</button>
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
        <h5 class="modal-title" id="exampleModalLabel">edit student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" method="POST" id="editForm">
          @csrf
          <input type="hidden" id="id" name="id">
        <div class="form-group">
          <label for="input-name" class="form-control-label"> Name </label>
          <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name">
        </div>
        
        <div class="row">
          <div class="col-4">
            <div class="form-group">
              <label for="" class="form-control-label"> Age </label>
                <input type="number" class="form-control" name="age" id="age" placeholder="Enter your age">
              </div>
          </div>
          <div class="col-8">
            <div class="form-group">
              <label for="" class="form-control-label"> Phone number </label>
                <input type="tel" class="form-control" name="phone" id="phone" placeholder="Enter your phone number">
              </div>
          </div>
        </div>
        <div class="form-group">
        <label for="" class="form-control-label"> Adress </label>
          <input type="text" class="form-control" name="adress" id="adress" placeholder="Enter your adress">
        </div>
          <div class="form-group">
          <label for=""></label>
          <select class="form-control" name="class" id="class">
            @foreach ($classes as $class)
            <option value="{{$class->id}}">{{$class->className}}</option>
              @endforeach
          </select>
        </div>
        <div class="form-group">
        <label for="" class="form-control-label"> Email </label>
          <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email">
        </div>
        <div class="form-group">
        <label for="" class="form-control-label"> Password </label>
          <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
        </div>
        <div class="form-group">
        <label for="" class="form-control-label"> Picture </label>
          <input type="file" class="form-control" name="picture" id="picture" placeholder="Enter your email">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button id="save" type="submit" class="btn btn-primary">Save student</button>
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
                  <th >Picture</th>
                  <th>Name</th>
                  <th >class</th>
                  <th >Phone</th>
                  <th >Action</th>

                </tr>
              </thead>
              <tbody id="tableT" class="list">
                @foreach ($students as $student)
              <tr id="tid{{$student->id}}">
              <td><img class="avatar avatar-sm rounded-circle"  src="{{'storage/'.$student->picture}}"></td>
                 <td>{{$student->name}}</td>
                @foreach ($classes as $class)
                @if ($student->class==$class->id)
                <td>{{$class->className}}</td>
                @endif    
                @endforeach
                  <td>{{$student->phone}}</td>
                  <td><a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModalEdit"  onclick="editStudent({{$student->id}})" class="btn btn-sm btn-info">Edit</a>
                    <a href="javascript:void(0)" class="btn btn-sm btn-danger" onclick="deleteS({{$student->id}})" >Delete</a>
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
          url:"{{route('addStudent')}}",
          data:formdata,
          processData :false,
          contentType :false,
          cache:false,
          
          
          success:function(response) {
            $("#tableT").append('<tr><td><img src ="storage/'+response.picture+'" class="avatar avatar-sm rounded-circle" ></td><td>'+response.name+'</td><td>'+response.class+'</td><td>'
            +response.phone+'</td><td><a data-toggle="modal" data-target="#exampleModalEdit" class="btn btn-sm btn-info" >Edit</a><a class="btn btn-sm btn-danger">Delete</a></td></tr>');
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
 

    function editStudent(id)
  {
    $.get('/student/'+id,function(student){
      $("#id").val(student.id);
      $("#name").val(student.name);
      $("#class").val(student.class);
      $("#age").val(student.age);
      $("#phone").val(student.phone);
      $("#adress").val(student.adress);
      $("#email").val(student.email);

    });
  }

  
  
  $(document).ready(function(){

    $("#editForm").on('submit',function(e){
    e.preventDefault();

   

    var formData = new FormData($("#editForm")[0]);
       
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
      url:"{{route('updateStudent')}}",
      type:'POST',
      enctype:'multipart/form-data',
      data:formData,
      processData :false,
          contentType :false,
          cache:false,
      success : function(response){
        // $('#tid'+response.id+ 'td:nth-child(1)').text(response.picture);
        // $('#tid'+response.id + 'td:nth-child(2)').text(response.name);
        // $('#tid'+response.id + 'td:nth-child(3)').text(response.matter);
        // $('#tid'+response.id + 'td:nth-child(4)').text(response.phone);
        $('#exampleModalEdit').modal('toggle');
        $('#editForm')[0].reset();
        swal("Good job!", "Update Successfly", "success");
        
      }
    });
  });
  });
</script>

<script>
  function deleteS(id)
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
        url:'student/'+id,
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


