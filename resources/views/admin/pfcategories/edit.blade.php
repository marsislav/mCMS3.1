@extends('layouts.app')

@section('content')

    @include('admin.includes.errors')

    <div class="panel panel-default">
        <div class="panel-heading">
            Update portfolio category: {{ $pfcategory->name }}
        </div>

        <div class="panel-body">
            <form action="{{ route('pfcategory.update', ['id' => $pfcategory->id]) }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ $pfcategory->name }}" class="form-control">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">
                            Update portfolio category
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
