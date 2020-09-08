

@extends('frontend/layouts/default')

@section('head_content')


<center><h3>Welcome to The Blog</h3></center> 


<a style="float: right;" class="btn btn-danger" href="{{ url('logout') }}">Logout</a>

@stop




@section('content')


<br>
<br>


   

                    <select onclick="window.location.href='?cat='+this.value" name="category" class="form-control" required>
                       <option value selected disabled>Select Blog Category</option>

                       
                      @foreach($category as $value)
<option value='{{ $value->id }}'>{{ $value->sr_name }}</option>
@endforeach


                    </select>
                    @error('name')
                              <strong>{{ $message }}</strong>
                      @enderror
                 

                 



<div id="blogdiv">

@foreach($blog as $value)
   {!! $value->sr_desc !!}
@endforeach

</div>




 @stop
