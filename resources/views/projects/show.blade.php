@extends('layouts.app')

@section('content')


    <div class="col-md-9 col-lg-9 col-sm-9 pull-left">
        <!-- The justified navigation menu is meant for single line per list item.
             Multiple lines will require custom code not provided by Bootstrap. -->


        <!-- Jumbotron -->
        <div class="well well-lg">
            <h1>{{$project->name}}</h1>
            <p class="lead">{{$project->description}}</p>
            <!--<p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p> -->
        </div>

        <!-- Example row of columns -->
        <div class="row col-md-12 col-lg-12 col-sm-12" style="background: white; margin: 10px;">
            <a href="/projects/create" class="pull-right btn btn-primary btn-sm" >Add project</a>
           {{-- @foreach($project->projects as $project)

                <div class="col-lg-4 col-md-4 col-sm-4">
                    <h2>{{$project->name}}</h2>
                    <p class="text-danger">{{$project->description}}</p>
                    <p><a class="btn btn-primary" href="/projects/{{$project->id}}" role="button">View Project »</a></p>

                </div>
            @endforeach --}}
        </div>

    </div>



<div class="col-sm-3 col-md-3 col-lg-3 pull-right">
   <!-- <div class="sidebar-module sidebar-module-inset">
        <h4>About</h4>
        <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
    </div> -->
    <div class="sidebar-module">
        <h4>Action</h4>
        <ol class="list-unstyled">
            <!-- <li><a href="#">Add new member</a></li> -->
            <li><a href="/projects/{{ $project->id }}/edit">Edit</a></li>
            <li><a href="/project/create">Create new project</a></li>
            <li><a href="/projects">My projects</a></li>


            <br/>
            @if($projects->user_id == Auth::user()->id)
            <li>
                <a
                        href="#"
                        onclick="
                  var result = confirm('Are you sure you wish to delete this project?');
                      if( result ){
                              event.preventDefault();
                              document.getElementById('delete-form').submit();
                      }
                          "
                >
                    Delete
                </a>


                <form id="delete-form" action="{{ route('projects.ddestroy',[$project->id]) }}"
                      method="POST" style="display: none;">
                    <input type="hidden" name="_method" value="delete">
                    {{ csrf_field() }}
                </form>
            </li>
            @endif
        </ol>
    </div>

    <!-- <div class="sidebar-module">
        <h4>Members</h4>
        <ol class="list-unstyled">
            <li><a href="#">March 2014</a></li>


</div>

@endsection