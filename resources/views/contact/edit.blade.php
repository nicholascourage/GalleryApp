@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Contact</div>
                <form action="{{route('contact.update', [$contact->id])}}" method="POST">
                @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" name="name" class="form-control" value="{{$contact->name}}">
                        </div>
                        <div class="form-group">
                            <label>Address:</label>
                            <input type="text" name="address" class="form-control" value="{{$contact->address}}">
                        </div>
                        <div class="form-group">
                            <label>Phone:</label>
                            <input type="text" name="phone" class="form-control" value="{{$contact->phone}}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>    
            </div>
        </div>
    </div>
</div>
@endsection