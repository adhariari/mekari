@extends('layout/main')

@section('container')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-5">
            <h3 class="mt-3 text-center mb-3">My To Do List</h3>
            <form action="" method="POST">
                {{-- cross site request forgery --}}
                {{ csrf_field() }}
                <div class="input-group mb-4">
                    <input type="text" class="form-control @if (count($errors) > 0) is-invalid @endif"
                        placeholder="I want to do.." name="name" id="addItem">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit" id="AddButton">Add</button>
                    </div>
                    {{--show error feedback if fill input blank--}}
                    @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)
                    <div class="invalid-feedback">
                        {{$error}}
                    </div>
                    @endforeach
                    @endif
                </div>
            </form>

        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-8">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">To Do</th>
                        <th scope="col">Status</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    @foreach ($todos as $todo)
                    <tr>
                        <td scope="row">{{$i}}</td>
                        <td>{{$todo->name}}</td>
                        <td>{{$todo->is_done ? 'Done' : 'Not Done'}}</td>
                        <td class="text-center">
                            <div class="btn-group " role="group" aria-label="Basic example">
                                <form action="{{url('todolists/'.$todo->id)}}" method="post">
                                    {{ csrf_field() }}
                                    {{-- changes post method into put for route update --}}
                                    {{ method_field('put') }}
                                    <button type="submit" class="btn btn-outline-success mr-1">Done</button>
                                </form>
                                <form action="{{url('todolists/'.$todo->id)}}" method="post">
                                    {{ csrf_field() }}
                                    {{-- changes post method into delete for route update--}}
                                    {{ method_field('delete') }}
                                    <button type="submit" class="btn btn-outline-danger ">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    @endforeach
                    @if(! count($todos))
                    <tr>
                        <td colspan="4" class="text-center">Nothing to do</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection