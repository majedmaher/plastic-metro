@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @if (count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $item)
                <li>
                    {{$item}}
                </li>
                @endforeach
            </ul>
            @endif

            <form action="{{route('layer.update',['id'=> $layer->id])}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="exampleFormControlInput1">صورة البانر </label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="form-group">

                    <button class="btn btn-danger" type="submit">تعديل البانر</button>
                </div>

            </form>


        </div>
    </div>
</div>

@endsection