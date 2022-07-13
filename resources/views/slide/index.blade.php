@extends('layouts.app')


@php
$count = 0;
@endphp
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-header">
                <h3> الشرائح </h3>
                <a href="{{route('slide.create')}}">اضافة شريحة</a>
            </div>
            <br>


            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">صورة الشريحة</th>
                        <th scope="col">عنوان الشريحة</th>
                        <th scope="col">العنوان الفرعي للشريحة</th>
                        <th scope="col">تفاصيل الشريحة</th>
                        <th scope="col">الاجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($slides as $slide)
                    <tr>
                        <th scope="row">{{++$count}}</th>
                        <td><img width="150px" src="{{URL::asset($slide->image)}}" alt="{{$slide->image}}"></td>
                        <td>{{$slide->title}}</td>
                        <td>{{$slide->sub_title}}</td>
                        <td>{{$slide->details }}</td>
                        <td>

                            <a href="{{route('slide.edit',['id'=> $slide->id])}}"> <i class="fas fa-2x fa-edit"></i> </a>&nbsp;&nbsp;
                            <a class="text-danger" href="{{route('slide.destroy',['id'=> $slide->id])}}"> <i class="fas  fa-2x fa-trash-alt"></i> </a>

                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>


        </div>
    </div>
</div>

@endsection