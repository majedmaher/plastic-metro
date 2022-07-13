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

            <form action="{{route('slide.update',['id'=> $slide->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">عنوان الشريحة </label>
                    <input value="{{$slide->title}}" type="text" name="title" class="form-control">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">العنوان الفرعي للشريحة </label>
                    <input value="{{$slide->sub_title}}" type="text" name="sub_title" class="form-control">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">تفاصيل الشريحة </label>
                    <textarea style="width: 100%;" name="details">{{$slide->details}}</textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">صورة الشريحة </label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="form-group">

                    <button class="btn btn-danger" type="submit">تعديل الشريحة</button>
                </div>

            </form>


        </div>
    </div>
</div>

@endsection