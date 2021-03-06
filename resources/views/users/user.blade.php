@extends('layouts.app')
@section('content')
<script language="JavaScript" src="https://code.jquery.com/jquery-1.11.1.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">
<head>
  <style>
  .pagination>li {
display: inline;
padding:0px !important;
margin:0px !important;
border:none !important;
}
.modal-backdrop {
  z-index: -1 !important;
}
/*
Fix to show in full screen demo
*/
iframe
{
    height:700px !important;
}

.btn {
display: inline-block;
padding: 6px 12px !important;
margin-bottom: 0;
font-size: 14px;
font-weight: 400;
line-height: 1.42857143;
text-align: center;
white-space: nowrap;
vertical-align: middle;
-ms-touch-action: manipulation;
touch-action: manipulation;
cursor: pointer;
-webkit-user-select: none;
-moz-user-select: none;
-ms-user-select: none;
user-select: none;
background-image: none;
border: 1px solid transparent;
border-radius: 4px;
}

.btn-primary {
color: #fff !important;
background: #428bca !important;
border-color: #357ebd !important;
box-shadow:none !important;
}
.btn-danger {
color: #fff !important;
background: #d9534f !important;
border-color: #d9534f !important;
box-shadow:none !important;
}
</style>
<!-- $(document).ready(function() {
    $('#datatable').dataTable();
    
     $("[data-toggle=tooltip]").tooltip();
    
} ); -->

  </head>
<body>
<div class="container">
	<div class="row">
		<h2 class="text-center">All Users</h2>
	</div>
    
        <div class="row">
		
            <div class="col-md-12">
             
            
            
<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
    				<thead>
						<tr>
							<th>Name</th>
							<th>E-Mail</th>
                <th>Action</th>
							<!-- <th>Edit</th>
              <th>Delete</th> -->
						</tr>
					</thead>

					

					<tbody>

            @foreach($users as $user)
						<tr>
							<td>{{$user->name}} </td>
              <td>{{$user->email}} </td>
              
							
          <td> <p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit{{$user->id}}"><span class="glyphicon glyphicon-pencil"></span></button></p>

   <p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal"  data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
						</tr>


                           
             @endforeach             
                           
					</tbody>
				</table>
     
	
	</div>
	</div>
</div>

 <div class="modal fade" id="edit{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
 
 <div class="modal-dialog">
   <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
      </div>
         <div class="modal-body">
          <form class="form-horizontal" method="POST" action='{{url("/editUser/{$user->id}")}}' enctype="multipart/form-data">
                        {{ csrf_field() }}
          <!--  -->
          
       
          <div class="form-group">
        <input class="form-control" name="name" type="text" value="{{$user->name}}">
        </div>
        <div class="form-group">
        
        <input class="form-control" name="email" type="email" value="{{$user->email}}">
        </div>
     <div class="modal-footer ">
       
        <button type="submit" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
      </div>
   
       </form>
        </div>
           </div>
   </div>
  
    </div>
  
    
    
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
          <div class="modal-body">
       
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
       
      </div>
        <div class="modal-footer ">
       <a href='{{url("/deleteuser/{$user->id}")}}'><button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button></a>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
    </body>
    @endsection