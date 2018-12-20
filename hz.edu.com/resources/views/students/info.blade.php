@extends('adminlte::page')

@section('title', '学员资料')

@section('content_header')
    <h1>学员资料</h1>
@stop

@section('content')
    <div class="sec-filter">
    </div>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>姓名</th>
                    <th>年龄</th>
                    <th>学校</th>
                    <th>年级</th>
                    <th>联系方式</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->birthday }}</td>
                        <td>{{ $student->school }}</td>
                        <td>{{ $student->aclass }}</td>
                        <td>{{ $student->perplex }}</td>
                        <td><a></a><a></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/common.css">
@stop

@section('javascript')
    <script type="text/javascript">
        console.log("Hi")
    </script>
@stop