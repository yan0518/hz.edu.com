@extends('adminlte::page')

@section('title', '新生录入')


@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css?v2') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('plugins/adminlte/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/adminlte/css/skins/_all-skins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <style type="text/css">
        .sub-label{
            font-size: 12px;
        }
    </style>
@stop

@section('content_header')
    <h1>新生录入</h1>
    <ol class="breadcrumb">
        <li><a href="info"><i class="fa fa-user-o"></i> 招生管理</a></li>
        <li class="active">新生录入</li>
    </ol>
@stop

@section('content')
    <div class="contentpanel">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="">
                            <form class="form-horizontal form-bordered form-submit"
                                  action="{{ route('students.new') }}" method="POST">
                                <div class="panel-body panel-body-nopadding">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">基本信息：</label>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-9 col-sm-offset-1">
                                            <label class="control-label col-sm-2 sub-label">姓名</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="name" 
                                                    value="{{ old('name') }}">
                                            </div>
                                            <label class="control-label col-sm-2 sub-label">学校</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="school"
                                                    value="{{ old('school') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-9 col-sm-offset-1">
                                            <label class="control-label col-sm-2 sub-label">出生年月</label>
                                            <div class="col-sm-4">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input type="text" id="birth_date" name="birth_date" 
                                                            class="form-control" readonly required
                                                            value="{{ (old('birth_date')=='1900-01-01')?'':old('birth_date') }} ">
                                                </div>
                                            </div>
                                            <label class="control-label col-sm-2 sub-label">在读年级</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="grade"
                                                    value="{{ old('grade') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-9 col-sm-offset-1">
                                            <label class="control-label col-sm-2 sub-label">父母姓名</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="p_name" 
                                                    value="{{ old('p_name') }}">
                                            </div>
                                            <label class="control-label col-sm-2 sub-label">父母联系方式</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="p_contact"
                                                    value="{{ old('p_contact') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-9 col-sm-offset-1">
                                            <label class="control-label col-sm-2 sub-label">需求科目</label>
                                            <div class="col-sm-10 padding-gap">
                                                <div class="width_10">
                                                    <input type="checkbox" name="courses" value="1"><span class="course_name">语文</span>
                                                </div>
                                                <div class="width_10">
                                                    <input type="checkbox" name="courses" value="2"><span class="course_name">数学</span>
                                                </div>
                                                <div class="width_10">
                                                    <input type="checkbox" name="courses" value="3"><span class="course_name">英语</span>
                                                </div>
                                                <div class="width_10">
                                                    <input type="checkbox" name="courses" value="4"><span class="course_name">物理</span>
                                                </div>
                                                <div class="width_10">
                                                    <input type="checkbox" name="courses" value="5"><span class="course_name">化学</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-9 col-sm-offset-1">
                                            <label class="control-label col-sm-2 sub-label"></label>
                                            <div class="col-sm-10 padding-gap">
                                                <div class="width_10">
                                                    <input type="checkbox" name="courses" value="6"><span class="course_name">地理</span>
                                                </div>
                                                <div class="width_10">
                                                    <input type="checkbox" name="courses" value="7"><span class="course_name">生物</span>
                                                </div>
                                                <div class="width_10">
                                                    <input type="checkbox" name="courses" value="8"><span class="course_name">政治</span>
                                                </div>
                                                <div class="width_10">
                                                    <input type="checkbox" name="courses" value="9"><span class="course_name">历史</span>
                                                </div>
                                                <div class="width_40">
                                                    <input type="checkbox" name="courses" value="10"><span class="course_name">其他</span>
                                                    <input type="text" class="text_line col_sm_2" name="courses_others">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-9 col-sm-offset-1">
                                            <label class="control-label col-sm-2 sub-label">目前成绩情况</label>
                                            <div class="col-sm-10 padding-gap">
                                                <div class="width_15">
                                                    <input type="checkbox" name="grade" value="1"><span class="grade_name">优秀</span>
                                                </div>
                                                <div class="width_15">
                                                    <input type="checkbox" name="grade" value="2"><span class="grade_name">中等偏上</span>
                                                </div>
                                                <div class="width_15">
                                                    <input type="checkbox" name="grade" value="3"><span class="grade_name">中等</span>
                                                </div>
                                                <div class="width_15">
                                                    <input type="checkbox" name="grade" value="4"><span class="grade_name">中等偏下</span>
                                                </div>
                                                <div class="width_15">
                                                    <input type="checkbox" name="grade" value="5"><span class="grade_name">较差</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-9 col-sm-offset-1">
                                            <label class="control-label col-sm-2 sub-label">是否有补习经历</label>
                                            <div class="col-sm-10 padding-gap">
                                                <div class="width_15">
                                                    <input type="checkbox" name="isremedial" value="0"><span class="isremedial_name">无</span>
                                                </div>
                                                <div class="width_40">
                                                    <input type="checkbox" name="isremedial" value="1"><span class="isremedial_name">有</span>
                                                    <input type="text" class="text_line col_sm_4" name="isremedial_others">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-9 col-sm-offset-1">
                                            <label class="control-label col-sm-2 sub-label">目前学习存在的困惑</label>
                                            <div class="col-sm-10 padding-gap">
                                                <div class="width_40">
                                                    <input type="checkbox" name="perplex" value="0"><span class="perplex_name">缺少一位能引导我学习的好老师</span>
                                                </div>
                                                <div class="width_40">
                                                    <input type="checkbox" name="perplex" value="1"><span class="perplex_name">没有良好的学习习惯</span>
                                                </div>
                                                <div class="width_40">
                                                    <input type="checkbox" name="perplex" value="2"><span class="perplex_name">缺乏好的学习方法</span>
                                                </div>
                                                <div class="width_40">
                                                    <input type="checkbox" name="perplex" value="3"><span class="perplex_name">玩心重，容易受到干扰</span>
                                                </div>
                                                <div class="width_40">
                                                    <input type="checkbox" name="perplex" value="4"><span class="perplex_name">上课专注度不够，容易走神</span>
                                                </div>
                                                <div class="width_40">
                                                    <input type="checkbox" name="perplex" value="5"><span class="perplex_name">家长不满意我的学习情况</span>
                                                </div>
                                                <div class="width_40">
                                                    <input type="checkbox" name="perplex" value="6"><span class="perplex_name">学习基础不好，存在漏洞</span>
                                                </div>
                                                <div class="width_40">
                                                    <input type="checkbox" name="perplex" value="7"><span class="perplex_name">学习遇到瓶颈</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-9 col-sm-offset-1">
                                            <label class="control-label col-sm-2 sub-label">你是通过何种途径知道瀚宗教育？</label>
                                            <div class="col-sm-10 padding-gap">
                                                <div class="width_15">
                                                    <input type="checkbox" name="way" value="0"><span class="way_name">报纸</span>
                                                </div>
                                                <div class="width_15">
                                                    <input type="checkbox" name="way" value="1"><span class="way_name">手机短信</span>
                                                </div>
                                                <div class="width_15">
                                                    <input type="checkbox" name="way" value="2"><span class="way_name">新乡</span>
                                                </div>
                                                <div class="width_25">
                                                    <input type="checkbox" name="way" value="3"><span class="way_name">邮件</span>
                                                </div>
                                                <div class="width_15">
                                                    <input type="checkbox" name="way" value="4"><span class="way_name">户外广告</span>
                                                </div>
                                                <div class="width_15">
                                                    <input type="checkbox" name="way" value="5"><span class="way_name">电视</span>
                                                </div>
                                                <div class="width_15">
                                                    <input type="checkbox" name="way" value="6"><span class="way_name">网络</span>
                                                </div>
                                                <div class="width_15">
                                                    <input type="checkbox" name="way" value="7"><span class="way_name">展台</span>
                                                </div>
                                                <div class="width_25">
                                                    <input type="checkbox" name="way" value="8"><span class="way_name">学校老师推荐</span>
                                                </div>
                                                <div class="width_15">
                                                    <input type="checkbox" name="way" value="9"><span class="way_name">同学介绍</span>
                                                </div>
                                                <div class="width_15">
                                                    <input type="checkbox" name="way" value="10"><span class="way_name">朋友介绍</span>
                                                </div>
                                                <div class="width_40">
                                                    <input type="checkbox" name="way" value="11"><span class="way_name">其他</span>
                                                    <input type="text" class="text_line col_sm_4" name="way_others">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{ csrf_field() }}
                                </div>
                                <div class="box-footer">
                                    <div class="row">
                                        <div class="col-sm-offset-1">
                                            <button class="btn btn-default">取消</button>
                                            <button class="btn btn-primary submit">保存</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js') 
    <script src="{{ asset('plugins/fastclick/fastclick.js') }}"></script>
    <script src="{{ asset('plugins/adminlte/js/app.min.js') }}"></script>
    <script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <script>
        $('#birth_date').datepicker({
            autoclose:true,
            format: 'yyyy-mm-dd'
        });
    </script>
@stop