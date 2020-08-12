@extends('admin.layouts.dashboard')
@section('title','Create Category')
@section('content')

<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{route('category.index')}}" class="btn btn-md btn-success rounded-pill shadow-lg">Back</a>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('category.store')}}">
                    @csrf
                    <div class="form-group">
                        <label>Nama Category</label>
                        <input type="name" name="name" class="form-control form-control-user rounded-pill @error('name') is-invalid @enderror">
                        @error('name')
                        <span class="invalid feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                    <button type="reset" class="btn btn-danger float-right mr-1">Reset</button>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection