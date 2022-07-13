@extends('layouts.app')


@php
$count = 0;
@endphp
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1"> التصنيف </label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group">

                    <button class="btn btn-danger" type="submit">إضافة التصنيف</button>
                </div>

            </form>
            <br>


            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">التصنيف</th>
                        <th scope="col">الاجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <th scope="row">{{++$count}}</th>
                        <td>
                            <form action="{{route('category.update',['id'=> $category->id])}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input value="{{$category->name}}" type="text" name="name" class="w-75">


                                <button class="btn btn-danger" type="submit">تعديل التصنيف</button>

                            </form>
                        </td>
                        <td>

                            <a class="text-danger" href="{{route('category.destroy',['id'=> $category->id])}}"> <i class="fas  fa-2x fa-trash-alt"></i> </a>

                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>


        </div>
    </div>
</div>

@endsection