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

            <form action="{{route('news.update',['id'=> $new->id])}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="exampleFormControlInput1">عنوان الخبر </label>
                    <input value="{{$new->title}}" type="text" name="title" class="form-control">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">تفاصيل الخبر </label>
                    <input value="{{$new->details}}" type="text" name="details" class="form-control">
                </div>

                <div class="form-group">
                    <label for="category">اختر التصنيف</label>
                    <select name="category_id" id="category">
                        @foreach ($categories as $category)
                        <option {{$category->name == $new->category->name ? "selected": ""}} value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">

                    <button class="btn btn-danger" type="submit">تعديل الخبر</button>
                </div>

            </form>


        </div>
    </div>
</div>

@endsection