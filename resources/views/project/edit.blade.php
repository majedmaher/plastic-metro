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

            <form action="{{route('project.update',['id'=> $project->id])}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="exampleFormControlInput1">صورة المنتج </label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">عنوان المنتج </label>
                    <input value="{{$project->title}}" type="text" name="title" class="form-control">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">تفاصيل المنتج </label>
                    <input value="{{$project->description}}" type="text" name="description" class="form-control">
                </div>
                <div class="form-group">
                    <label for="category">اختر التصنيف</label>
                    <select name="category_id" id="category">
                        @foreach ($categories as $category)
                        <option {{$category->name == $project->category->name ? "selected": ""}} value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">

                    <button class="btn btn-danger" type="submit">تعديل المنتج</button>
                </div>

            </form>


        </div>
    </div>
</div>

@endsection