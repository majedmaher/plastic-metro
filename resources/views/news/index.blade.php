@extends('layouts.app')


@php
$count = 0;
@endphp
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form action="{{route('news.store')}}" method="POST" enctype="multipart/form-data">
                @csrf


                <div class="form-group">
                    <label for="exampleFormControlInput1">عنوان الخبر </label>
                    <input type="text" name="title" class="form-control">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">تفاصيل الخبر </label>
                    <input type="text" name="details" class="form-control">
                </div>

                <div class="form-group">
                    <label for="category">اختر التصنيف</label>
                    <select name="category_id" id="category">
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">

                    <button class="btn btn-danger" type="submit">حفظ المشروع</button>
                </div>

            </form>
            <br>



            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">عنوان الخبر</th>
                        <th scope="col">تصنيف الخبر</th>
                        <th scope="col">تاريخ الخبر</th>
                        <th scope="col">تفاصيل الخبر</th>

                        <th scope="col">الاجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($news as $new)
                    <tr>
                        <th scope="row">{{++$count}}</th>
                        <td>{{$new->title}}</td>
                        <td>{{$new->details}}</td>
                        <td>{{$new->created_at->format('d/M/Y')}}</td>
                        <td>{{$new->category->name}}</td>
                        <td>

                            <a href="{{route('news.edit',['id'=> $new->id])}}"> <i class="fas fa-2x fa-edit"></i> </a>&nbsp;&nbsp;
                            <a class="text-danger" href="{{route('news.destroy',['id'=> $new->id])}}"> <i class="fas  fa-2x fa-trash-alt"></i> </a>

                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>


        </div>
    </div>
</div>

@endsection