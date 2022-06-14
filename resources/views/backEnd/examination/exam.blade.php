@extends('backEnd.master')
@section('mainContent')
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1>@lang('Gestion des examens')</h1>
            <div class="bc-pages">
                <a href="{{url('dashboard')}}">@lang('Tableau de bord')</a>
                <a href="#">@lang('examens')</a>
                <a href="#">@lang('Ajouter Examen')</a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
        @if(isset($exam))
        @if(in_array(215, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 )
        <div class="row">
            <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                <a href="{{url('exam')}}" class="primary-btn small fix-gr-bg">
                    <span class="ti-plus pr-2"></span>
                    @lang('Ajouter')
                </a>
            </div>
        </div>

        @endif
        @endif

    @if(isset($exam))
    {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'exam/'.$exam->id, 'method' => 'PUT', 'enctype' => 'multipart/form-data']) }}
    @else
     @if(in_array(215, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 )
    {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'exam',
    'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
    @endif
    @endif

        <div class="row">
           
            <div class="col-lg-3">
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-title">
                            <h3 class="mb-30">@if(isset($exam))
                                    @lang('modifier')
                                @else
                                    @lang('Ajouter')
                                @endif
                                @lang('examens')
                            </h3>
                        </div>
                        <div class="white-box">
                            <div class="add-visitor">
                                <div class="row">
                                    <div class="col-lg-12" id="error-message">

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        @if(Session()->has('message-success'))
                                        <div class="alert alert-success">
                                            {{ Session()->get('message-success') }}
                                        </div>
                                        @elseif(Session()->has('message-danger'))
                                        <div class="alert alert-danger">
                                            {{ Session()->get('message-danger') }}
                                        </div>
                                        @endif
                                        <input type="hidden" name="url" id="url" value="{{URL::to('/')}}">
                                        
                                    </div>
                                </div>

                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <label>@lang('selectionnez le type d\'examen')*</label>
                                
                                        @foreach($exams_types as $exams_type)
                                            <div class="input-effect">
                                                <input type="checkbox" id="exams_types_{{@$exams_type->id}}" class="common-checkbox exam-checkbox" name="exams_types[]" value="{{@$exams_type->id}}" {{isset($selected_exam_type_id)? ($exams_type->id == $selected_exam_type_id? 'checked':''):''}}>
                                                <label for="exams_types_{{@$exams_type->id}}">{{@$exams_type->title}}</label>
                                            </div>
                                        @endforeach
                                    <div class="input-effect">
                                        <input type="checkbox" id="all_exams" class="common-checkbox" name="all_exams[]" value="0" {{ (is_array(old('class_ids')) and in_array($class->id, old('class_ids'))) ? ' checked' : '' }}>
                                        <label for="all_exams">@lang('selectionnez tout')</label>
                                    </div>

                                      
                                    </div>
                                    <div class="col-lg-12">

                                        @if($errors->has('exams_types'))
                                            <span class="text-danger validate-textarea-checkbox" role="alert">
                                                <strong>{{ $errors->first('exams_types') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div> 
                                <div class="row mt-25">

                                    <div class="col-lg-12">

                                        <select class="w-100 bb niceSelect form-control {{ $errors->has('class_ids') ? ' is-invalid' : '' }}" id="exam_class" name="class_ids">
                                            <option data-display="@lang('Selectionnez la classe') *" value="">@lang('Selectionnez la classe') *</option>
                                            @foreach($classes as $class)
                                            <option value="{{@$class->id}}">{{@$class->class_name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('class_ids'))
                                        <span class="invalid-feedback invalid-select" role="alert">
                                            <strong>{{ $errors->first('class_ids') }}</strong>
                                        </span>
                                        @endif

                                </div>
                            </div>
                                <div class="row mt-25" id="exam_subejct">
                                    
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-12">

                                        <div class="input-effect">
                                            <input class="primary-input form-control{{ $errors->has('exam_marks') ? ' is-invalid' : '' }}"
                                            type="number" name="exam_marks" id="exam_mark_main" autocomplete="off" onkeypress="return isNumberKey(event)" value="{{isset($exam)? $exam->exam_mark: 0}}" required="" min="0">
                                            <label>@lang('note de l\'examen') *</label>
                                            <span class="focus-border"></span>
                                            @if ($errors->has('exam_marks'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('exam_marks') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="white-box mt-10">
                            <div class="row">
                                 <div class="col-lg-10">
                                    <div class="main-title">
                                        <h5>@lang('Enregistrer') </h5>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <button type="button" class="primary-btn icon-only fix-gr-bg" onclick="addRowMark();" id="addRowBtn">
                                    <span class="ti-plus pr-2"></span></button>
                                </div>
                            </div>
                            <table class="table" id="productTable">
                                <thead>
                                    <tr>
                                      <th>@lang('examens')</th>
                                      <th>@lang('Notes')</th>
                                      <th>@lang('action')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <tr id="row1" class="mt-40">
                                    <td class="border-top-0">
                                        <input type="hidden" name="url" id="url" value="{{URL::to('/')}}">  
                                        <div class="input-effect">
                                            <input class="primary-input form-control{{ $errors->has('exam_title') ? ' is-invalid' : '' }}"
                                                type="text" id="exam_title" name="exam_title[]" autocomplete="off" value="{{isset($editData)? $editData->exam_title : '' }}">
                                                <label>@lang('Nom')</label>
                                        </div>
                                    </td>
                                    <td class="border-top-0">
                                        <div class="input-effect">
                                            <input class="primary-input form-control{{ $errors->has('exam_mark') ? ' is-invalid' : '' }} exam_mark"
                                            type="number" id="exam_mark" name="exam_mark[]" autocomplete="off"  onkeypress="return isNumberKey(event)"  value="{{isset($editData)? $editData->exam_mark : 0 }}">
                                        </div>
                                    </td> 
                                    <td class="border-top">
                                         <button class="primary-btn icon-only fix-gr-bg" type="button">
                                             <span class="ti-trash"></span>
                                        </button>
                                       
                                    </td>
                                    </tr>
                                    <tfoot>
                                        <tr>
                                           <td class="border-top-0">@lang('total')</td>

                                           <td class="border-top-0" id="totalMark">
                                             <input type="text" class="primary-input form-control" name="totalMark" readonly="true">
                                           </td>
                                           <td class="border-top-0"></td>
                                       </tr>
                                   </tfoot>
                               </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                	           @php 
                                  $tooltip = "";
                                  if(in_array(215, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ){
                                        $tooltip = "";
                                    }else{
                                        $tooltip = "You have no permission to add";
                                    }
                                @endphp
                                <div class="row mt-20">
                                    <div class="col-lg-12">
                                        <div class="white-box">                               
                                            <div class="row mt-20">
                                                <div class="col-lg-12 text-center">
                                                  <button class="primary-btn fix-gr-bg" data-toggle="tooltip" title="{{ @$tooltip}}">
                                                        <span class="ti-check"></span>
                                                        @if(isset($exam))
                                                            @lang('Mise à jour')
                                                        @else
                                                            @lang('Enregistrer')
                                                        @endif
                                                        <!-- @lang('notes') -->

                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
            
            {{ Form::close() }}

            <div class="col-lg-9">
        <div class="row">
            <div class="col-lg-4 no-gutters">
                <div class="main-title">
                    <h3 class="mb-0">@lang('liste des examens')</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table id="table_id" class="display school-table" cellspacing="0" width="100%">
                    <thead>
                                @if(session()->has('message-success-delete') != "" ||
                                session()->get('message-danger-delete') != "")
                                <tr>
                                    <td colspan="7">
                                        @if(session()->has('message-success-delete'))
                                        <div class="alert alert-success">
                                            {{ session()->get('message-success-delete') }}
                                        </div>
                                        @elseif(session()->has('message-danger-delete'))
                                        <div class="alert alert-danger">
                                            {{ session()->get('message-danger-delete') }}
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                @endif
                                <tr>
                                    <th>@lang('lang.sl')</th>
                                    <th>@lang('Nom_examens')</th>
                                    <th>@lang('classes')</th>
                                    <th>@lang('Niveaux')</th>
                                    <th>@lang('matières')</th>
                                    <th>@lang('lang.total_mark')</th>
                                    <th>@lang('lang.mark_distribution')</th>
                                    <th>@lang('action')</th>
                                </tr>
                    </thead>

                    <tbody>
                    @php $count =1 ; @endphp
                                @foreach($exams as $exam)
                                <tr>
                                    <td>{{$count++}}</td>

                                    <td>{{$exam->GetExamTitle !=""?$exam->GetExamTitle->title:""}}</td>
                                    <td>{{$exam->getClassName !=""?$exam->getClassName->class_name:""}}</td>
                                    <td>{{$exam->GetSectionName !=""?$exam->GetSectionName->section_name:""}}</td>
                                    <td>{{$exam->GetSubjectName !=""?$exam->GetSubjectName->subject_name:""}}</td>
                                    <td>{{$exam->exam_mark}}</td>

                                   <td>
                                        @php $mark_distributions = App\SmExam::getMarkDistributions($exam->exam_type_id, $exam->class_id,  $exam->section_id, $exam->subject_id);  @endphp                                  
                                      


                                        @foreach($exam->GetExamSetup as $row)
                                        <div class="row">
                                           <div class="col-sm-6"> {{$row->exam_title}} </div> <div class="col-sm-4"><b> {{$row->exam_mark}} </b></div> 
                                       </div>
                                        @endforeach
                                    </td>

                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                @lang('Selectionnez')
                                            </button>


                                            @php 

                                                $registered = App\SmExam::getMarkREgistered($exam->exam_type_id, $exam->class_id, $exam->section_id, $exam->subject_id);
                                                    

                                            @endphp
                                                @if($registered == "")


                                            <div class="dropdown-menu dropdown-menu-right">

                                                

                                                @if(in_array(397, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 )

                                                    <a class="dropdown-item"
                                                        href="{{url('exam', $exam->id)}}">@lang('modifier')</a>
                                                 @endif

                                                @if(in_array(216, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 )

                                                    <a class="dropdown-item" data-toggle="modal" data-target="#deleteExamModal{{$exam->id}}"
                                                        href="#">@lang('supprimer')</a>
                                                 @endif
                                            </div>
                                            @endif
                                        </div> 


                                    </td>
                                </tr>
                                    <div class="modal fade admin-query" id="deleteExamModal{{$exam->id}}" >
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">@lang('supprimer l\'examen')</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="text-center">
                                                        <h4>@lang('este-vous sur de vouloir supprimer')</h4>
                                                    </div>

                                                    <div class="mt-40 d-flex justify-content-between">
                                                        <button type="button" class="primary-btn tr-bg" data-dismiss="modal">@lang('Annuler')</button>
                                                         {{ Form::open(['url' => 'exam/'.$exam->id, 'method' => 'DELETE', 'enctype' => 'multipart/form-data']) }}
                                                        <button class="primary-btn fix-gr-bg" type="submit">@lang('Supprimer')</button>
                                                         {{ Form::close() }}
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>


    </div>
</section>
@endsection
