@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">POST</div>

                <div class="panel-body">
                   <div class="row"> 
                    <form class="form-horizontal" method="POST" action="{{ url('/addPost') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('post_title') ? ' has-error' : '' }}">
                            <label for="post_title" class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="post_title" value="{{ old('post_title') }}" required autofocus>

                                @if ($errors->has('post_title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('post_title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('post_body') ? ' has-error' : '' }}">
                            <label for="post_body" class="col-md-4 control-label">Post Body</label>

                            <div class="col-md-6">
                                <textarea id="post_body" rows="7" class="form-control" name="post_body" value="{{ old('post_body') }}" required></textarea>

                                @if ($errors->has('post_body'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('post_body') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                            <label for="category_id" class="col-md-4 control-label">Category</label>

                            <div class="col-md-6">
                                <select id="category_id" type="category_id" class="form-control"  name="category_id" required>
                                    <option value=""> Select </option>
                                    @if (count($categories) >0)
                                      @foreach($categories->all() as $category )

                                        <option value="{{ $category->id }}"> {{$category->category}} </option>
                                      @endforeach

                                    @endif
                                      
                                </select>

                                @if ($errors->has('category_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       <div class="form-group{{ $errors->has('post_image') ? ' has-error' : '' }}">
                            <label for="post_image" class="col-md-4 control-label">  Featured Image</label>

                            <div class="col-md-6">
                                <input id="post_image" type="file" class="form-control" name="post_image" required>

                                @if ($errors->has('post_image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('post_image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-large btn-block">
                                    Publish Post
                                </button>

                            </div>
                        </div>
                    </form>
                    <div class="col-md-4" ></div>
                     <div class="col-md-6" >
                        <ul  class="list-group">
                        @if (count($categories)>0)
                        @foreach($categories->all() as $category)
                        <li class="list-group-item"> <a href='{{url ("category/{$category->id}")}}'>  {{$category->category}}</a>

                       






                       <td> <p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit{{$category->id}}" style="margin-left:250px;"><span class="glyphicon glyphicon-pencil" ></span></button></p></td>

   <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal"  data-target="#delete" style="margin-left:250px;" ><span class="glyphicon glyphicon-trash"></span></button></p></td>



































                        </li>


                        @endforeach



                         @else
                         <p>No Category Found </p>
                        @endif
                        
                        </ul>
                        

                    </div>




                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
