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

    <div class="card">

        <div class="card-header">
            Tâches courantes
        </div>

        <div class="card-body">

            <table class="table table-striped">
                <thead>
                    Tâches
                </thead>
                  <tbody>

                    @foreach ($tasks as $task)

                        <tr>
                            <td>{{ $task->name }}</td>
                            <td>
                                <form action={{ url('task/'.$task->id) }} method="POST">

                                    <Button type="submit" class="btn btn-danger">Supprimer</Button>

                                    {{-- On précise que c'est la Route delete --}}

                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}

                                </form>

                            </td>
                        </tr>

                    @endforeach

                  </tbody>
            </table>

        </div>

    </div>


@endsection
