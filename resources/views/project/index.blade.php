@extends('layouts.app')


@php
$count = 0;
@endphp
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form action="{{route('project.store')}}" method="POST" enctype="multipart/form-data">
                @csrf


                <div class="form-group">
                    <label for="exampleFormControlInput1">صورة المنتج </label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">عنوان المنتج </label>
                    <input type="text" name="title" class="form-control">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">تفاصيل المنتج </label>
                    <input type="text" name="description" class="form-control">
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
                        <th scope="col">صورة المشروع</th>
                        <th scope="col">عنوان المشروع</th>
                        <th scope="col">تصنيف المشروع</th>
                        <th scope="col">تفاصيل المشروع</th>

                        <th scope="col">الاجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                    <tr>
                        <th scope="row">{{++$count}}</th>
                        <td><img width="150px" src="{{URL::asset($project->image)}}" alt="{{$project->image}}"></td>
                        <td>{{$project->title}}</td>
                        <td>{{$project->category->name}}</td>
                        <td>{{$project->description}}</td>
                        <td>

                            <a href="{{route('project.edit',['id'=> $project->id])}}"> <i class="fas fa-2x fa-edit"></i> </a>&nbsp;&nbsp;
                            <a class="text-danger" href="{{route('project.destroy',['id'=> $project->id])}}"> <i class="fas  fa-2x fa-trash-alt"></i> </a>

                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>


        </div>
    </div>
</div>

@endsection