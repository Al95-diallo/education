@extends('backEnd.master')
@section('mainContent')
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1>@lang('Gestion des examens')</h1>
            <div class="bc-pages">
                <a href="{{url('dashboard')}}">@lang('Tableau de bord')</a>
                <a href="#">@lang('examens')</a>
                <a href="{{route('exam_attendance')}}">@lang(' Présence à l\'examen')</a>
                <a href="{{route('exam_attendance_create')}}">@lang('Créer une Présence')</a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="main-title">
                    <h3 class="mb-30">@lang('Sélectionner des critères') </h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                @if(session()->has('message-success') != "")
                    @if(session()->has('message-success'))
                    <div class="alert alert-success">
                        {{ session()->get('message-success') }}
                    </div>
                    @endif
                @endif
                @if(session()->has('message-danger') != "")
                    @if(session()->has('message-danger'))
                    <div class="alert alert-danger">
                        {{ session()->get('message-danger') }}
                    </div>
                    @endif
                @endif
                <div class="white-box">
                    {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'exam_attendance_create', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student']) }}
                        <div class="row">
                            <input type="hidden" name="url" id="url" value="{{URL::to('/')}}">
                                <div class="col-lg-3 mt-30-md">
                                <select class="w-100 bb niceSelect form-control{{ $errors->has('exam') ? ' is-invalid' : '' }}" name="exam">
                                    <option data-display="@lang('Selectionnez l\'examen') *" value="">@lang('Selectionnez l\'examen') *</option>
                                    @foreach($exams as $exam)
                                        <option value="{{ @$exam->id}}" {{isset($exam_id)? ($exam_id == $exam->id? 'selected':''):''}}>{{ @$exam->title}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('exam'))
                                <span class="invalid-feedback invalid-select" role="alert">
                                    <strong>{{ $errors->first('exam') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-lg-3 mt-30-md">
                                <select class="w-100 bb niceSelect form-control {{ $errors->has('class') ? ' is-invalid' : '' }}" id="select_class" name="class">
                                    <option data-display="@lang('Selectionnez la classe') *" value="">@lang('Selectionnez la classe') *</option>
                                    @foreach($classes as $class)
                                    <option value="{{ @$class->id}}"  {{isset($class_id)? ($class_id == $class->id? 'selected':''):''}}>{{ @$class->class_name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('class'))
                                <span class="invalid-feedback invalid-select" role="alert">
                                    <strong>{{ $errors->first('class') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-lg-3 mt-30-md" id="select_section_div">
                                <select class="w-100 bb niceSelect form-control{{ $errors->has('section') ? ' is-invalid' : '' }} select_section" id="select_section" name="section">
                                    <option data-display="@lang('Selectionnez le niveau') *" value="">@lang('Selectionnez le niveau') *</option>
                                </select>
                                @if ($errors->has('section'))
                                <span class="invalid-feedback invalid-select" role="alert">
                                    <strong>{{ $errors->first('section') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-lg-3 mt-30-md" id="select_subject_div">
                                <select class="w-100 bb niceSelect form-control{{ $errors->has('subject') ? ' is-invalid' : '' }}" id="select_subject" name="subject">
                                    <option data-display="@lang('Selectionnez la matière') *" value="">@lang('Selectionnez la matière') *</option>
                                </select>
                                @if ($errors->has('subject'))
                                <span class="invalid-feedback invalid-select" role="alert">
                                    <strong>{{ $errors->first('subject') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-lg-12 mt-20 text-right">
                                <button type="submit" class="primary-btn small fix-gr-bg">
                                    <span class="ti-search pr-2"></span>
                                    @lang('Rechercher')
                                </button>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
@if(isset($students))

 {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'method' => 'POST', 'enctype' => 'multipart/form-data'])}}

        <div class="row mt-40">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6 no-gutters">
                        <div class="main-title">
                            <h3 class="mb-30">@lang('Feuilles de Présence à l\'examen')</h3>
                        </div>
                    </div>
                    <div class="col-lg-6 text-right">
                        <button type="submit" class="primary-btn fix-gr-bg mb-20" onclick="javascript: form.action='{{url('exam-attendance-store')}}'">
                        <span class="ti-save pr"></span>
                            @lang('Enregistrer')
                    </button>
                    </div>
                </div>             

                <input type="hidden" name="exam_id" value="{{ @$exam_id}}">
                <input type="hidden" name="subject_id" value="{{ @$subject_id}}">
                <input type="hidden" name="class_id" value="{{ @$class_id}}">
                <input type="hidden" name="section_id" value="{{ @$section_id}}">

                <div class="row">
                    <div class="col-lg-12">
                        <table class="display school-table school-table-style" cellspacing="0" width="100%">
                            <thead>
                                @if(session()->has('message-danger') != "")
                                <tr>
                                    <td colspan="9">
                                        @if(session()->has('message-danger'))
                                        <div class="alert alert-danger">
                                            {{ session()->get('message-danger') }}
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                @endif
                                <tr>
                                    <th width="25%">@lang('lang.admission') @lang('lang.no')</th>
                                    <th width="25%">@lang('Nom_élèves')</th>
                                    <th width="25%">@lang('matricule')</th>
                                    <th width="25%">@lang('PRÉSENCE')</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if(count($exam_attendance_childs) == 0)
                                    @foreach($students as $student)
                                    <tr>
                                        <td>{{@$student->admission_no}}<input type="hidden" name="id[]" value="{{@$student->id}}"></td>
                                        <td>{{@$student->first_name.' '.@$student->last_name}}</td>
                                        <td>{{@$student->roll_no}}</td>
                                        <td>
                                            <div class="d-flex radio-btn-flex">
                                                <div class="mr-20">
                                                    <input type="radio" name="attendance[{{@$student->id}}]" id="attendanceP{{@$student->id}}" value="P" class="common-radio attd" checked>
                                                    <label for="attendanceP{{$student->id}}">@lang('présent')</label>
                                                </div>
                                                <div class="mr-20">
                                                    <input type="radio" name="attendance[{{@$student->id}}]" id="attendanceL{{@$student->id}}" value="A" class="common-radio">
                                                    <label for="attendanceL{{$student->id}}">@lang('Absent')</label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    @foreach($exam_attendance_childs as $student)
                                    <tr>
                                        <td>{{ @$student->studentInfo !=""?@$student->studentInfo->admission_no:""}}<input type="hidden" name="id[]" value="{{@$student->student_id}}"></td>
                                        <td>{{@$student->studentInfo !=""?@$student->studentInfo->first_name.' '.@$student->studentInfo->last_name:""}}</td>
                                        <td>{{@$student->studentInfo !=""?@$student->studentInfo->roll_no:""}}</td>
                                        <td>
                                            <div class="d-flex radio-btn-flex">
                                                <div class="mr-20">
                                                    <input type="radio" name="attendance[{{@$student->student_id}}]" id="attendanceP{{@$student->id}}" value="P" class="common-radio" {{@$student->attendance_type == 'P'? 'checked': ''}}>
                                                    <label for="attendanceP{{@$student->id}}">@lang('présent')</label>
                                                </div>
                                                <div class="mr-20">
                                                    <input type="radio" name="attendance[{{@$student->student_id}}]" id="attendanceL{{@$student->id}}" value="A" class="common-radio" {{@$student->attendance_type == 'A'? 'checked': ''}}>
                                                    <label for="attendanceL{{@$student->id}}">@lang('Absent')</label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
@endif

    </div>
</section>


            


@endsection
