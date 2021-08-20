@extends('layouts.app')

@section('content')

    <div class="card mt-3">

        <div class="card-header">
            ToDo List
        </div>

        <div class="card-body mb-3">

            @include('common.errors')

            <form action="{{ url('task') }}" method="POST" class="form-horizontal">

                <div class="form-group mb-3">

                    <label for="name" class="col-sm-3 control-label">Tâche</label>
                    <div class="col-sm-6">
                        <input type="text" id="name" name="name" class="form-control">
                    </div>

                </div>

                <div class="form-group mb-3">

                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-primary">Ajouter une tâche</button>
                    </div>

                </div>

                {{ csrf_field() }}

            </form>

        </div>

    </div>


@endsection
