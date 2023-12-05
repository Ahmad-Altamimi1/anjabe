@extends('layouts.dashboard')

@section('content')
    <section style="text-align: right; " class="hk-sec-wrapper">
        <h5 class="hk-sec-title">السلايدر(<?php echo count($sliders); ?>)</h5>
        <a class="btn btn-primary" type="button" href="/slider/create">إضافة سلايدر جديد</a>
        <!-- search.blade.php -->
    

        <div class="row">
            <div class="col-sm">
                <div class="table-wrap">
                    <table style="direction: rtl;" id="datable_5" class="table table-hover w-100 display">
                        <thead>
                            <tr>
                                <th>المقال المستخدم في السلايدر</th>
                                <th>تاريخ الإنشاء</th>
                                <th>تاريخ النشر على الموقع</th>
                                <th>عدد المشاهدات</th>
                                <th>الصوره</th>
                                <th>تعديل</th>
                                <th>حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $slider)
                            {{-- @dd($slider) --}}
                                <tr>
                                    @if ($slider->posts)
                                    <td>{{  $slider->posts->TITLE }}</td>
                                        
                                    @else
                                        <td>لا بوجد</td>
                                    @endif
                                    <td>{{ $slider->DATE_SCHEDULER}}</td>
                                    <td>{{ $slider->DATE_SCHEDULER }}</td>
                                    @if ($slider->posts)
                                    
                                    <td>{{ $slider->posts->SHOW }}</td>
                                    @else
                                        <td>لا بوجد</td>
                                        
                                    @endif
                                    <td >

                                    @if ($slider->posts)
                                        
                                    <img style="width: 60%" src="{{asset ("../../".$slider->posts->IMG)  }}" alt="">
                                    @else
                                                   <video class="col-md-3 col-sm-3 col-3">
                <source src="../../{{ $slider->video }}" type="video/mp4">
            </video>
                                    @endif
                                    </td>
                                    <td><a class="btn btn-primary" type="button"
                                            href="/slider/{{ $slider->id }}/edit">تعديل</a></td>
                                    <td><a type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#exampleModal{{ $slider->id }}">حذف</a></td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>



    @foreach ($sliders as $slider)
        <div class="modal fade" id="exampleModal{{ $slider->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>هل تريد حذف السلايدر ""</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">خروج</button>
                        <form action="/slider/delete/{{ $slider->id }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="id" value="{{ $slider->id }}">
                            <button onclick="tinyMCEwwww();" class="btn btn-danger" type="submit">حذف</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
