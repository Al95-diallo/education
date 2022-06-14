@extends('backEnd.master')
@section('mainContent')

    @php
        function showPicName($data){
            $name = explode('/', $data);
            $number = count($name);
            return $name[$number-1];
        }
        function showTimelineDocName($data){
            $name = explode('/', $data);
            $number = count($name);
            return $name[$number-1];
        }
        function showDocumentName($data){
            $name = explode('/', $data);
            $number = count($name);
            return $name[$number-1];
        }
    @endphp 
@php  $setting = App\SmGeneralSettings::find(1);  if(!empty($setting->currency_symbol)){ $currency = $setting->currency_symbol; }else{ $currency = '$'; }   @endphp 

    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1>@lang('Détails de l\'élève')</h1>
                <div class="bc-pages">
                    <a href="{{url('dashboard')}}">@lang('tableau de bord')</a>
                    <a href="{{route('student_list')}}">@lang('liste des élèves')</a>
                    <a href="#">@lang('Détails de l\'élève')</a>
                </div>
            </div>
        </div>
    </section>

    <section class="student-details">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-3">
                    <!-- Start Student Meta Information -->
                    <div class="main-title">
                        <h3 class="mb-20">@lang('Détails de l\'élève')</h3>
                    </div>
                    <div class="student-meta-box">
                        <div class="student-meta-top"></div>
                            <img class="student-meta-img img-100" src="{{ file_exists(@$student_detail->student_photo) ? asset($student_detail->student_photo) : asset('public/uploads/staff/demo/staff.jpg') }}"                            alt="">
                       
                        <div class="white-box radius-t-y-0">
                            <div class="single-meta mt-10">
                                <div class="d-flex justify-content-between">
                                    <div class="name">
                                        @lang('nom de l\'élève')
                                    </div>
                                    {{-- {{ dd($student_detail) }} --}}
                                    <div class="value">
                                        {{@$student_detail->first_name.' '.@$student_detail->last_name}}
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="single-meta">
                                <div class="d-flex justify-content-between">
                                    <div class="name">
                                        @lang('lang.admission') @lang('lang.number')
                                    </div>
                                    <div class="value">
                                        {{@$student_detail->admission_no}}
                                    </div>
                                </div>
                            </div> -->
                            <div class="single-meta">
                                <div class="d-flex justify-content-between">
                                    <div class="name">
                                        @lang('Matricule')
                                    </div>
                                    <div class="value">
                                        {{@$student_detail->roll_no}}
                                    </div>
                                </div>
                            </div>
                            <div class="single-meta">
                                <div class="d-flex justify-content-between">
                                    <div class="name">
                                        @lang('classe')
                                    </div>
                                    <div class="value">
                                        @if($student_detail->className!="" && $student_detail->session_id!="")
                                            {{@$student_detail->className->class_name}}
                                            ({{@$academic_year->year}})
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="single-meta">
                                <div class="d-flex justify-content-between">
                                    <div class="name">
                                        @lang('Niveau')
                                    </div>
                                    <div class="value">
                                        {{@$student_detail->section->section_name}}
                                    </div>
                                </div>
                            </div>
                            <div class="single-meta">
                                <div class="d-flex justify-content-between">
                                    <div class="name">
                                        @lang('sexe')
                                    </div>
                                    <div class="value">

                                        {{@$student_detail->gender !=""?$student_detail->gender->base_setup_name:""}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Student Meta Information -->
                    {{-- {{ dd($siblings) }} --}}
                    @if(count($siblings) >0 )
                        <!-- Start Siblings Meta Information -->
                        <div class="main-title mt-40">
                            <h3 class="mb-20">@lang('informations personnel ') </h3>
                        </div>
                        @foreach($siblings as $sibling)
                            
                                <div class="student-meta-box mb-20">
                                    <div class="student-meta-top siblings-meta-top"></div>
                                    <img class="student-meta-img img-100" src="{{asset(@$sibling->student_photo)}}" alt="">
                                    <div class="white-box radius-t-y-0">
                                        <div class="single-meta mt-10">
                                            <div class="d-flex justify-content-between">
                                                <div class="name">
                                                    @lang('lang.sibling') @lang('lang.name')
                                                </div>
                                                 <div class="value">
                                                    {{isset($sibling->full_name)?$sibling->full_name:''}}
                                                </div> 
                                            </div>
                                        </div>
                                        <!-- <div class="single-meta">
                                            <div class="d-flex justify-content-between">
                                                <div class="name">
                                                    @lang('lang.admission') @lang('lang.number')
                                                </div>
                                                <div class="value">
                                                    {{@$sibling->admission_no}}
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="single-meta">
                                            <div class="d-flex justify-content-between">
                                                <div class="name">
                                                    @lang('Matricule')
                                                </div>
                                                <div class="value">
                                                    {{@$sibling->roll_no}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-meta">
                                            <div class="d-flex justify-content-between">
                                                <div class="name">
                                                    @lang('classe')
                                                </div>
                                                <div class="value">
                                                    {{@$sibling->className->class_name}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-meta">
                                            <div class="d-flex justify-content-between">
                                                <div class="name">
                                                    @lang('Niveaux')
                                                </div>
                                                <div class="value">
                                                    {{$sibling->section !=""?$sibling->section->section_name:""}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-meta">
                                            <div class="d-flex justify-content-between">
                                                <div class="name">
                                                    @lang('Sexe')
                                                </div>
                                                <div class="value">
                                                    {{$sibling->gender!=""? $sibling->gender->base_setup_name:""}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    
                @endforeach
                <!-- End Siblings Meta Information -->
                
                @endif
                </div>

                <!-- Start Student Details -->
                <div class="col-lg-9 student-details up_admin_visitor">
                    <ul class="nav nav-tabs tabs_scroll_nav" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#studentProfile" role="tab" data-toggle="tab">@lang('profile')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#studentFees" role="tab" data-toggle="tab">@lang('lang.fees')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#studentExam" role="tab" data-toggle="tab">@lang('examens')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#studentDocuments" role="tab" data-toggle="tab">@lang('document')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#studentTimeline" role="tab" data-toggle="tab">@lang('chronologie')</a>
                        </li>
                        <li class="nav-item edit-button">
                            @if(@in_array(66, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1)
                                <a href="{{route('student_edit', [@$student_detail->id])}}"
                                class="primary-btn small fix-gr-bg">@lang('Modifier')
                                </a>
                            @endif
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- Start Profile Tab -->
                        <div role="tabpanel" class="tab-pane fade  show active" id="studentProfile">
                            <div class="white-box">
                                <h4 class="stu-sub-head">@lang('informations personnel')</h4>
                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div class="">
                                                @lang('Date d\inscription')
                                            </div>
                                        </div>

                                        <div class="col-lg-7 col-md-6">
                                            <div class="">
                                                {{ !empty($student_detail->admission_date)? App\SmGeneralSettings::DateConvater($student_detail->admission_date):''}} 
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-6">
                                            <div class="">
                                                @lang('date de naissance')
                                            </div>
                                        </div>

                                        <div class="col-lg-7 col-md-7">
                                            <div class="">
                                                {{ !empty($student_detail->date_of_birth)? App\SmGeneralSettings::DateConvater($student_detail->date_of_birth):''}}  
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-6">
                                            <div class="">
                                                @lang('type')
                                            </div>
                                        </div>

                                        <div class="col-lg-7 col-md-7">
                                            <div class="">
                                                {{$student_detail->category != ""? $student_detail->category->catgeory_name:""}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-6">
                                            <div class="">
                                                @lang('réligion')
                                            </div>
                                        </div>

                                        <div class="col-lg-7 col-md-7">
                                            <div class="">
                                                {{$student_detail->religion != ""? $student_detail->religion->base_setup_name:""}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-6">
                                            <div class="">
                                                @lang('téléphone')
                                            </div>
                                        </div>

                                        <div class="col-lg-7 col-md-7">
                                            <div class="">
                                                {{@$student_detail->mobile}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-6">
                                            <div class="">
                                                @lang('Adresse e-mail')
                                            </div>
                                        </div>

                                        <div class="col-lg-7 col-md-7">
                                            <div class="">
                                                {{@$student_detail->email}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-6">
                                            <div class="">
                                                @lang('Adresse actuelle') 
                                            </div>
                                        </div>

                                        <div class="col-lg-7 col-md-7">
                                            <div class="">
                                                {{@$student_detail->current_address}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-6">
                                            <div class="">
                                                @lang('Adresse permanente')
                                            </div>
                                        </div>

                                        <div class="col-lg-7 col-md-7">
                                            <div class="">
                                                {{@$student_detail->permanent_address}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Start Parent Part -->
                                <h4 class="stu-sub-head mt-40">@lang('DÉTAILS SUR LE PARENT & TUTEUR')</h4>
                                <div class="d-flex">
                                    <div class="mr-20 mt-20">
                                            <img class="student-meta-img img-100" src="{{ file_exists(@$student_detail->parents->fathers_photo) ? asset($student_detail->parents->fathers_photo) : asset('public/uploads/staff/demo/father.png') }}" alt="">

                                    </div>
                                    <div class="w-100">
                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="">
                                                        @lang('Nom du père')
                                                    </div>
                                                </div>

                                                <div class="col-lg-8 col-md-7">
                                                    <div class="">
                                                        {{@$student_detail->parents->fathers_name}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="">
                                                        @lang('occupation')
                                                    </div>
                                                </div>

                                                <div class="col-lg-8 col-md-7">
                                                    <div class="">
                                                        {{@$student_detail->parents!=""?@$student_detail->parents->fathers_occupation:""}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="">
                                                        @lang('téléphone')
                                                    </div>
                                                </div>

                                                <div class="col-lg-8 col-md-7">
                                                    <div class="">
                                                        {{@$student_detail->parents !=""?@$student_detail->parents->fathers_mobile:""}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <div class="mr-20 mt-20">
                                             <img class="student-meta-img img-100" src="{{ file_exists(@$student_detail->parents->mothers_photo) ? asset($student_detail->parents->mothers_photo) : asset('public/uploads/staff/demo/mother.jpg')}}" alt="">
                                    </div>
                                    <div class="w-100">
                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="">
                                                        @lang('nom de la mère')
                                                    </div>
                                                </div>

                                                <div class="col-lg-8 col-md-7">
                                                    <div class="">
                                                        {{$student_detail->parents !=""?@$student_detail->parents->mothers_name:""}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="">
                                                        @lang('occupation')
                                                    </div>
                                                </div>

                                                <div class="col-lg-8 col-md-7">
                                                    <div class="">
                                                        {{$student_detail->parents !=""?@$student_detail->parents->mothers_occupation:""}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="">
                                                        @lang('téléphone')
                                                    </div>
                                                </div>

                                                <div class="col-lg-8 col-md-7">
                                                    <div class="">
                                                        {{$student_detail->parents !=""?@$student_detail->parents->mothers_mobile:""}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <div class="mr-20 mt-20">
                                        <img class="student-meta-img img-100" src="{{ file_exists(@$student_detail->parents->guardians_photo) ? asset($student_detail->parents->guardians_photo) : asset('public/uploads/staff/demo/guardian.jpg')}}" alt="">

                                    </div>
                                    <div class="w-100">
                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="">
                                                        @lang('nom du gardien')
                                                    </div>
                                                </div>

                                                <div class="col-lg-8 col-md-7">
                                                    <div class="">
                                                        {{$student_detail->parents !=""?@$student_detail->parents->guardians_name:""}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="">
                                                        @lang('adresse e-mail')
                                                    </div>
                                                </div>

                                                <div class="col-lg-8 col-md-7">
                                                    <div class="">
                                                        {{$student_detail->parents !=""?@$student_detail->parents->guardians_email:""}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="">
                                                        @lang('téléphone')
                                                    </div>
                                                </div>

                                                <div class="col-lg-8 col-md-7">
                                                    <div class="">
                                                        {{$student_detail->parents !=""?@$student_detail->parents->guardians_mobile:""}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="">
                                                        @lang('Relation avec le gardien')
                                                    </div>
                                                </div>

                                                <div class="col-lg-8 col-md-7">
                                                    <div class="">
                                                        {{$student_detail->parents !=""?@$student_detail->parents->guardians_relation:""}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="">
                                                        @lang('occupation')
                                                    </div>
                                                </div>

                                                <div class="col-lg-8 col-md-7">
                                                    <div class="">
                                                        {{$student_detail->parents !=""?@$student_detail->parents->guardians_occupation:""}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="">
                                                        @lang('Adresse du gardien')
                                                    </div>
                                                </div>

                                                <div class="col-lg-8 col-md-7">
                                                    <div class="">
                                                        {{$student_detail->parents !=""?@$student_detail->parents->guardians_address:""}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Parent Part -->

                                <!-- Start Transport Part -->
                                <h4 class="stu-sub-head mt-40">@lang('INFORMATIONS SUR LE TRANSPORT ET LE DORTOIR')</h4>
                                
                                
                                @if (!empty($student_detail->route_list_id))
                                    
                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div class="">
                                                @lang('AUTRES INFORMATION')
                                            </div>
                                        </div>

                                        <div class="col-lg-7 col-md-6">
                                            <div class="">
                                                {{isset($student_detail->route_list_id)? @$student_detail->route->title: ''}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endif

                                @if (isset($student_detail->vehicle))
                                    @if (!empty($vehicle_no))
                                    <div class="single-info">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-5">
                                                <div class="">
                                                    @lang('nu,éro du vehicle')
                                                </div>
                                            </div>
    
                                            <div class="col-lg-7 col-md-6">
                                                <div class="">
                                                    {{$student_detail->vehicle != ""? @$student_detail->vehicle->vehicle_no: ''}}
                                                </div>
                                            </div>
                                        </div>
                                    </div> 


                                    @endif
                               
                                    
                                @endif
                               
                                
                                    @if (isset($driver_info))
                                        @if (!empty($driver_info->full_name))
                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-5 col-md-5">
                                                    <div class="">
                                                        @lang('nom du conducteur')
                                                    </div>
                                                </div>
        
                                                <div class="col-lg-7 col-md-6">
                                                    <div class="">
                                                        {{$student_detail->vechile_id != ""? @$driver_info->full_name:''}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        
                                    @endif
                                
                                    @if (isset($driver_info))
                                        @if (!empty($driver_info->mobile))
                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-5 col-md-5">
                                                    <div class="">
                                                        @lang('Numero de téléphone du chauffeur')
                                                    </div>
                                                </div>
        
                                                <div class="col-lg-7 col-md-6">
                                                    <div class="">
                                                        {{$student_detail->vechile_id != ""? @$driver_info->mobile:''}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    @endif
                               

                                    @if (isset($student_detail->dormitory))
                                        @if (!empty($student_detail->dormitory->dormitory_name))
                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-5 col-md-5">
                                                    <div class="">
                                                        @lang('Nom du dortoir')
                                                    </div>
                                                </div>
        
                                                <div class="col-lg-7 col-md-6">
                                                    <div class="">
                                                        {{isset($student_detail->dormitory_id)?@$student_detail->dormitory->dormitory_name: ''}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    @endif
                                
                                <!-- End Transport Part -->

                                <!-- Start Other Information Part -->
                                <h4 class="stu-sub-head mt-40">@lang('AUTRES INFORMATION')</h4>
                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div class="">
                                                @lang('Groupe sanguin')
                                            </div>
                                        </div>

                                        <div class="col-lg-7 col-md-6">
                                            <div class="">
                                                {{isset($student_detail->bloodgroup_id)? @$student_detail->bloodGroup->base_setup_name: ''}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div class="">
                                                @lang('lang.height')
                                            </div>
                                        </div>

                                        <div class="col-lg-7 col-md-6">
                                            <div class="">
                                                {{isset($student_detail->height)? @$student_detail->height: ''}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div class="">
                                                @lang('la taille')
                                            </div>
                                        </div>

                                        <div class="col-lg-7 col-md-6">
                                            <div class="">
                                                {{isset($student_detail->weight)? @$student_detail->weight: ''}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div class="">
                                                @lang('Détails de lécole précédente')
                                            </div>
                                        </div>

                                        <div class="col-lg-7 col-md-6">
                                            <div class="">
                                                {{isset($student_detail->previous_school_details)? @$student_detail->previous_school_details: ''}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div class="">
                                                @lang('numéro national d\'identité')
                                            </div>
                                        </div>

                                        <div class="col-lg-7 col-md-6">
                                            <div class="">
                                                {{isset($student_detail->national_id_no)? @$student_detail->national_id_no: ''}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div class="">
                                                @lang('Numéro didentification local')
                                            </div>
                                        </div>
                                        

                                        <div class="col-lg-7 col-md-6">
                                            <div class="">
                                                {{isset($student_detail->local_id_no)? @$student_detail->local_id_no: ''}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div class="">
                                                @lang('Numéro de compte bancaire')
                                            </div>
                                        </div>

                                        <div class="col-lg-7 col-md-6">
                                            <div class="">
                                                {{isset($student_detail->bank_account_no)? @$student_detail->bank_account_no: ''}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div class="">
                                                @lang('Nom de banque')
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-6">
                                            <div class="">
                                                {{isset($student_detail->bank_name)? @$student_detail->bank_name: ''}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div class="">
                                                @lang('Code IFSC')
                                            </div>
                                        </div>

                                        <div class="col-lg-7 col-md-6">
                                            <div class="">
                                                UBC56987
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- End Other Information Part -->
                            </div>
                        </div>
                        <!-- End Profile Tab -->

                        <!-- Start Fees Tab -->
                        <div role="tabpanel" class="tab-pane fade" id="studentFees">
                            <table class="display school-table school-table-style res_scrol" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>@lang('GROUPE DE FRAIS')</th>
                                    <th>@lang('CODE DES FRAIS')</th>
                                    <th>@lang('DATE DÉCHÉANCE')</th>
                                    <th>@lang('Statut')</th>
                                    <th>@lang('MONTANT') ({{@$currency}})</th>
                                    <th>@lang('paiement')</th>
                                    <th>@lang('mode')</th>
                                    <th>@lang('date')</th>
                                    <th>@lang('REMISE') ({{@$currency}})</th>
                                    <th>@lang('Bien') ({{@$currency}})</th>
                                    <th>@lang('payé') ({{@$currency}})</th>
                                    <th>@lang('balance') ({{@$currency}})</th>
                                </tr>
                                </thead>

                                <tbody>
                                @php
                                    $grand_total = 0;
                                    $total_fine = 0;
                                    $total_discount = 0;
                                    $total_paid = 0;
                                    $total_grand_paid = 0;
                                    $total_balance = 0;
                                @endphp
                                @foreach($fees_assigneds as $fees_assigned)
                                    @php
                                         $grand_total += $fees_assigned->feesGroupMaster->amount;
                                      

                                    @endphp

                                    @php
                                        $discount_amount = App\SmFeesAssign::discountSum($fees_assigned->student_id, $fees_assigned->feesGroupMaster->feesTypes->id, 'discount_amount');
                                        $total_discount += $discount_amount;
                                        $student_id = $fees_assigned->student_id;
                                    @endphp
                                    @php
                                        $paid = App\SmFeesAssign::discountSum($fees_assigned->student_id, $fees_assigned->feesGroupMaster->feesTypes->id, 'amount');
                                        $total_grand_paid += $paid;
                                    @endphp
                                    @php
                                        $fine = App\SmFeesAssign::discountSum($fees_assigned->student_id, $fees_assigned->feesGroupMaster->feesTypes->id, 'fine');
                                        $total_fine += $fine;
                                    @endphp

                                    @php
                                        $total_paid = $discount_amount + $paid;
                                    @endphp
                                    <tr>
                                        <td>{{$fees_assigned->feesGroupMaster->feesGroups !=""?$fees_assigned->feesGroupMaster->feesGroups->name:""}}</td>
                                        <td>{{$fees_assigned->feesGroupMaster->feesTypes !=""?$fees_assigned->feesGroupMaster->feesTypes->name:""}}</td>
                                        <td>
                                            @if(!empty($fees_assigned->feesGroupMaster)) 
                                            {{$fees_assigned->feesGroupMaster->date != ""? App\SmGeneralSettings::DateConvater($fees_assigned->feesGroupMaster->date):''}}
                                            @endif
                                        </td>
                                        <td>
                                               @if($fees_assigned->feesGroupMaster->amount == $total_paid)
                                                    <button class="primary-btn small bg-success text-white border-0">
                                                        @lang('payé')
                                                    </button>
                                                @elseif($total_paid != 0)
                                                    <button class="primary-btn small bg-warning text-white border-0">
                                                        @lang('partiel')
                                                    </button>
                                                @elseif($total_paid == 0)
                                                    <button class="primary-btn small bg-danger text-white border-0">
                                                        @lang('Non payé')
                                                    </button>
                                                @endif
                                           
                                        </td>
                                        <td>
                                            @php
                                                   echo $fees_assigned->feesGroupMaster->amount;
                                                

                                            @endphp
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td> {{$discount_amount}} </td>
                                        <td>{{$fine}}</td>
                                        <td>{{$paid}}</td>
                                        <td>
                                            @php

                                                  $rest_amount = $fees_assigned->feesGroupMaster->amount - $total_paid;
                                               

                                                $total_balance +=  $rest_amount;
                                                echo $rest_amount;
                                            @endphp
                                        </td>
                                    </tr>
                                    @php
                                        $payments = App\SmFeesAssign::feesPayment($fees_assigned->feesGroupMaster->feesTypes->id, $fees_assigned->student_id);
                                        $i = 0;
                                    @endphp

                                    @foreach($payments as $payment)
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-right"><img
                                                    src="{{asset('public/backEnd/img/table-arrow.png')}}"></td>
                                            <td>
                                                @php
                                                    $created_by = App\User::find($payment->created_by);
                                                @endphp
                                                {{-- <a href="#" data-toggle="tooltip" data-placement="right"
                                                   title="{{'Collected By: '.isset($created_by->full_name)?$created_by->full_name:''}}">{{$payment->fees_type_id.'/'.$payment->id}}</a> --}}
                                            </td>
                                            <td>
                                                @if($payment->payment_mode == "C")
                                                        {{'Cash'}}
                                                @elseif($payment->payment_mode == "Cq")
                                                    {{'Cheque'}}
                                                @elseif('DD')
                                                    {{'DD'}}
                                                @elseif('PS')
                                                    {{'Paystack'}}
                                                    @endif
                                            </td>
                                            <td> {{$payment->payment_date != ""? App\SmGeneralSettings::DateConvater($payment->payment_date):''}}

                                            </td>
                                            <td>{{@$payment->discount_amount}}</td>
                                            <td>{{@$payment->fine}}</td>
                                            <td>{{@$payment->amount}}</td>
                                            <td></td>
                                        </tr>
                                    @endforeach 
                                    @endforeach 
                                 

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>@lang('lang.grand_total') ({{@$currency}})</th>
                                    <th></th>
                                    <th>{{@$grand_total}}</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>{{@$total_discount}}</th>
                                    <th>{{@$total_fine}}</th>
                                    <th>{{@$total_grand_paid}}</th>
                                    <th>{{@$total_balance}}</th>
                                    <th></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- End Profile Tab -->

                        <!-- Start Exam Tab -->
                        <div role="tabpanel" class="tab-pane fade" id="studentExam">
                           
                            @php
                            $exam_count= count($exam_terms); 
                            @endphp
                            @if($exam_count<1)
                            <div class="white-box no-search no-paginate no-table-info mb-2">
                               <table class="display school-table" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>@lang('Matière')</th>
                                            <th>@lang('lang.full_marks')</th>
                                            <th>@lang('lang.passing_marks')</th>
                                            <th>@lang('lang.obtained_marks')</th>
                                            <th>@lang('lang.results')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                               </table>
                            </div>
                            @endif
                       
                                <div class="white-box no-search no-paginate no-table-info mb-2">
                                    @foreach($exam_terms as $exam)

                                    @php

                                        $get_results = App\SmStudent::getExamResult(@$exam->id, @$student_detail);


                                    @endphp


                                    @if($get_results)

                                    <div class="main-title">
                                        <h3 class="mb-0">{{@$exam->title}}</h3>
                                    </div>
                                    <table id="table_id" class="display school-table" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>@lang('date')</th>
                                            <th>@lang('Matières')</th>
                                            <th>@lang('lang.full_marks')</th>
                                            <th>@lang('lang.obtained_marks')</th>
                                            <th>@lang('observation')</th>
                                            <th>@lang('resultats')</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                            
                                        @php
                                            $grand_total = 0;
                                            $grand_total_marks = 0;
                                            $result = 0;
                                        @endphp

                                        @foreach($get_results as $mark)
                                            @php
                                                $subject_marks = App\SmStudent::fullMarksBySubject($exam->id, $mark->subject_id);

                                                $schedule_by_subject = App\SmStudent::scheduleBySubject($exam->id, $mark->subject_id, @$student_detail);

                                                $result_subject = 0;

                                                $grand_total_marks += @$subject_marks->exam_mark;

                                                if(@$mark->is_absent == 0){
                                                    $grand_total += @$mark->total_marks;
                                                    if($mark->marks < $subject_marks->pass_mark){
                                                       $result_subject++;
                                                       $result++;
                                                    }
                                                }else{
                                                    $result_subject++;
                                                    $result++;
                                                }
                                            @endphp
                                            <tr>
                                                <td>{{ !empty($schedule_by_subject->date)? App\SmGeneralSettings::DateConvater($schedule_by_subject->date):''}}</td>
                                                <td>{{@$mark->subject->subject_name}}</td>
                                                <td>{{@$subject_marks->exam_mark}}</td>
                                                <td>{{@$mark->total_marks}}</td>
                                                <td>{{@$mark->total_gpa_grade}}</td>
                                                <td>
                                                    @if($result_subject == 0)
                                                        <button
                                                            class="primary-btn small bg-success text-white border-0">
                                                            @lang('lang.pass')
                                                        </button>
                                                    @else
                                                        <button class="primary-btn small bg-danger text-white border-0">
                                                            @lang('lang.fail')
                                                        </button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                            <tfoot>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th>@lang('lang.grand_total'): {{$grand_total}}/{{$grand_total_marks}}</th>
                                                <th></th>
                                                <th>@lang('observation'):
                                                    @php
                                                        if($result == 0 && $grand_total_marks != 0){
                                                            $percent = $grand_total/$grand_total_marks*100;


                                                            foreach($grades as $grade){
                                                               if(floor($percent) >= $grade->percent_from && floor($percent) <= $grade->percent_upto){
                                                                   echo $grade->grade_name;
                                                               }
                                                           }

                                                        }else{
                                                            echo "F";
                                                        }
                                                    @endphp
                                                </th>
                                            </tr>
                                            </tfoot>
                                    </table>

                                    @endif

                                    @endforeach
                                </div>
                            
                        </div>
                        <!-- End Exam Tab -->

                        <!-- Start Documents Tab -->
                        <div role="tabpanel" class="tab-pane fade" id="studentDocuments">
                            <div class="white-box">
                                <div class="text-right mb-20">
                                    <button type="button" data-toggle="modal" data-target="#add_document_madal"
                                            class="primary-btn tr-bg text-uppercase bord-rad">
                                        @lang('Télécharger le document')
                                        <span class="pl ti-upload"></span>
                                    </button>
                                </div>
                                <table id="" class="table simple-table table-responsive school-table"
                                       cellspacing="0">
                                    <thead class="d-block">
                                    <tr class="d-flex">
                                        <th class="col-6">@lang('titre du document')</th>
                                        <th class="col-6">@lang('action')</th>
                                    </tr>
                                    </thead>

                                    <tbody class="d-block">
                                    @if($student_detail->document_file_1 != "")
                                        <tr class="d-flex">
                                            <td class="col-6">{{$student_detail->document_title_1}}</td>
                                            <td class="col-6">
                                                @if (file_exists($student_detail->document_file_1))
                                                    <a class="primary-btn tr-bg text-uppercase bord-rad"
                                                        href="{{url('download-document/'.showDocumentName($student_detail->document_file_1))}}">
                                                        @lang('Télécharger le document')<span class="pl ti-download"></span>
                                                    </a>
                                                @endif                                               
                                            </td>
                                        </tr>
                                    @endif
                                    @if($student_detail->document_file_2 != "")
                                        <tr class="d-flex">
                                            <td class="col-6">{{$student_detail->document_title_2}}</td>
                                            <td class="col-6">
                                                @if (file_exists($student_detail->document_file_2))
                                                    <a class="primary-btn tr-bg text-uppercase bord-rad"
                                                       href="{{url('download-document/'.showDocumentName($student_detail->document_file_2))}}">
                                                        @lang('Télécharger le document')<span class="pl ti-download"></span>
                                                    </a>
                                                @endif    
                                            </td>
                                        </tr>
                                    @endif
                                    @if($student_detail->document_file_3 != "")
                                        <tr class="d-flex">
                                            <td class="col-6">{{$student_detail->document_title_3}}</td>
                                            <td class="col-6">
                                                @if (file_exists($student_detail->document_file_3))
                                                    <a class="primary-btn tr-bg text-uppercase bord-rad"
                                                    href="{{url('download-document/'.showDocumentName($student_detail->document_file_3))}}">
                                                        @lang('Télécharger le document')<span class="pl ti-download"></span>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                    @if($student_detail->document_file_4 != "")
                                        <tr class="d-flex">
                                            <td class="col-6">{{$student_detail->document_title_4}}</td>
                                            <td class="col-6">
                                                @if (file_exists($student_detail->document_file_4))
                                                    <a class="primary-btn tr-bg text-uppercase bord-rad"
                                                    href="{{url('download-document/'.showDocumentName($student_detail->document_file_4))}}">
                                                        @lang('Télécharger le document')<span class="pl ti-download"></span>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                    
                                    @foreach($documents as $document)
                         
                                    @php
                                //    $name = explode('/', $document->file);
                                //    dd($name);

                                    // if(!function_exists('showDocumentName')){
                                    //     function showDocumentName($data){
                                    //     $name = explode('/', $data);
                                    //     return $name[4];
                                    // }
                                    // }
                                    
                                @endphp 
                                        <tr class="d-flex">
                                            <td class="col-6">{{$document->title}}</td>
                                            <td class="col-6">
                                                @if (file_exists($document->file))
                                                    <a class="primary-btn tr-bg text-uppercase bord-rad"
                                                    href="{{url('download-document/'.showDocumentName($document->file))}}">
                                                        @lang('Télécharger le document')<span class="pl ti-download"></span>
                                                    </a>
                                                @endif
                                                <a class="primary-btn icon-only fix-gr-bg" data-toggle="modal"
                                                   data-target="#deleteDocumentModal{{$document->id}}" href="#">
                                                    <span class="ti-trash"></span>
                                                </a>

                                            </td>
                                        </tr>
                                        <div class="modal fade admin-query" id="deleteDocumentModal{{$document->id}}">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">@lang('supprimer')</h4>
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            &times;
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <h4>@lang('este-vous sur de vouloir supprimer')</h4>
                                                        </div>

                                                        <div class="mt-40 d-flex justify-content-between">
                                                            <button type="button" class="primary-btn tr-bg"
                                                                    data-dismiss="modal">@lang('Annuler')
                                                            </button>
                                                            <a class="primary-btn fix-gr-bg"
                                                               href="{{route('delete-student-document', [$document->id])}}">
                                                                @lang('Supprimer')</a>
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
                        <!-- End Documents Tab -->
                        <!-- Add Document modal form start-->
                        <div class="modal fade admin-query" id="add_document_madal">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title"> @lang('Télécharger le document') </h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'upload_document',
                                                                'method' => 'POST', 'enctype' => 'multipart/form-data', 'name' => 'document_upload']) }}
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <input type="hidden" name="student_id"
                                                           value="{{$student_detail->id}}">
                                                    <div class="row mt-25">
                                                        <div class="col-lg-12">
                                                            <div class="input-effect">
                                                                <input class="primary-input form-control{" type="text"
                                                                       name="title" value="" id="title">
                                                                <label> @lang('Titre')<span>*</span> </label>
                                                                <span class="focus-border"></span>

                                                                <span class=" text-danger" role="alert"
                                                                      id="amount_error">
                                                                    
                                                                </span>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mt-30">
                                                    <div class="row no-gutters input-right-icon">
                                                        <div class="col">
                                                            <div class="input-effect">
                                                                <input class="primary-input" type="text"
                                                                       id="placeholderPhoto" placeholder="Document"
                                                                       disabled>
                                                                <span class="focus-border"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <button class="primary-btn-small-input" type="button">
                                                                <label class="primary-btn small fix-gr-bg" for="photo"> @lang('feuilleter')</label>
                                                                <input type="file" class="d-none" name="photo"
                                                                       id="photo">
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- <div class="col-lg-12 text-center mt-40">
                                                    <button class="primary-btn fix-gr-bg" id="save_button_sibling" type="button">
                                                        <span class="ti-check"></span>
                                                        save information
                                                    </button>
                                                </div> -->
                                                <div class="col-lg-12 text-center mt-40">
                                                    <div class="mt-40 d-flex justify-content-between">
                                                        <button type="button" class="primary-btn tr-bg"
                                                                data-dismiss="modal">@lang('Annuler')
                                                        </button>

                                                        <button class="primary-btn fix-gr-bg" type="submit">@lang('enregistrer')
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            {{ Form::close() }}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- Add Document modal form end-->
                        <!-- delete document modal -->

                        <!-- delete document modal -->
                        <!-- Start Timeline Tab -->
                        <div role="tabpanel" class="tab-pane fade" id="studentTimeline">
                            <div class="white-box">
                                <div class="text-right mb-20">
                                    <button type="button" data-toggle="modal" data-target="#add_timeline_madal"
                                            class="primary-btn tr-bg text-uppercase bord-rad">
                                        @lang('Ajouter')
                                        <span class="pl ti-plus"></span>
                                    </button>

                                </div>
                                @foreach($timelines as $timeline)
                                    <div class="student-activities">
                                        <div class="single-activity">
                                            <h4 class="title text-uppercase">
                                                
                                             {{$timeline->date != ""? App\SmGeneralSettings::DateConvater($timeline->date):''}}

                                            </h4>
                                            <div class="sub-activity-box d-flex">
                                                <h6 class="time text-uppercase">10.30 pm</h6>
                                                <div class="sub-activity">
                                                    <h5 class="subtitle text-uppercase"> {{$timeline->title}}</h5>
                                                    <p>
                                                        {{$timeline->description}}
                                                    </p>
                                                </div>

                                                <div class="close-activity">
                                                    
                                                    <a class="primary-btn icon-only fix-gr-bg" data-toggle="modal"
                                                       data-target="#deleteTimelineModal{{$timeline->id}}" href="#">
                                                        <span class="ti-trash text-white"></span>
                                                    </a>
                                                    
                                                    @if (file_exists($timeline->file))                                                      
                                                        <a href="{{url('staff-download-timeline-doc/'.showTimelineDocName($timeline->file))}}"
                                                           class="primary-btn tr-bg text-uppercase bord-rad">
                                                            @lang('Télécharger document')<span class="pl ti-download"></span>
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade admin-query" id="deleteTimelineModal{{$timeline->id}}">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">@lang('supprimer')</h4>
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            &times;
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <h4>@lang('este-vous sur de vouloir supprimer')</h4>
                                                        </div>

                                                        <div class="mt-40 d-flex justify-content-between">
                                                            <button type="button" class="primary-btn tr-bg"
                                                                    data-dismiss="modal">@lang('Annuler')
                                                            </button>
                                                            <a class="primary-btn fix-gr-bg"
                                                               href="{{route('delete_timeline', [$timeline->id])}}">
                                                                @lang('supprimer')</a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                            </div>
                        </div>
                        <!-- End Timeline Tab -->
                    </div>
                </div>
                <!-- End Student Details -->
            </div>


        </div>
    </section>

    <!-- timeline form modal start-->
    <div class="modal fade admin-query" id="add_timeline_madal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">@lang('Ajouter une Chronologie')</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="container-fluid">
                        {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'student_timeline_store',
                                            'method' => 'POST', 'enctype' => 'multipart/form-data', 'name' => 'document_upload']) }}
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="hidden" name="student_id" value="{{$student_detail->id}}">
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <input class="primary-input form-control{" type="text" name="title" value=""
                                                   id="title" maxlength="200">
                                            <label>@lang('titre') <span>*</span> </label>
                                            <span class="focus-border"></span>

                                            <span class=" text-danger" role="alert" id="amount_error">
                                                
                                            </span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-30">
                                <div class="no-gutters input-right-icon">
                                    <div class="col">
                                        <div class="input-effect">
                                            <input class="primary-input date form-control" readonly id="startDate" type="text"
                                                   name="date">
                                            <label>@lang('Date')</label>
                                            <span class="focus-border"></span>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button class="" type="button">
                                            <i class="ti-calendar" id="start-date-icon"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-30">
                                <div class="input-effect">
                                    <textarea class="primary-input form-control" cols="0" rows="3" name="description"
                                              id="Description"></textarea>
                                    <label>@lang('description')<span></span> </label>
                                    <span class="focus-border textarea"></span>
                                </div>
                            </div>

                            <div class="col-lg-12 mt-40">
                                <div class="row no-gutters input-right-icon">
                                    <div class="col">
                                        <div class="input-effect">
                                            <input class="primary-input" type="text" id="placeholderFileFourName"
                                                   placeholder="Document"
                                                   disabled>
                                            <span class="focus-border"></span>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button class="primary-btn-small-input" type="button">
                                            <label class="primary-btn small fix-gr-bg"
                                                   for="document_file_4">@lang('feuilleter')</label>
                                            <input type="file" class="d-none" name="document_file_4"
                                                   id="document_file_4">
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-30">

                                <input type="checkbox" id="currentAddressCheck" class="common-checkbox"
                                       name="visible_to_student" value="1">
                                <label for="currentAddressCheck">@lang('Visible à cette personne')</label>
                            </div>


                            <!-- <div class="col-lg-12 text-center mt-40">
                                <button class="primary-btn fix-gr-bg" id="save_button_sibling" type="button">
                                    <span class="ti-check"></span>
                                    save information
                                </button>
                            </div> -->
                            <div class="col-lg-12 text-center mt-40">
                                <div class="mt-40 d-flex justify-content-between">
                                    <button type="button" class="primary-btn tr-bg" data-dismiss="modal">@lang('Annuler')</button>

                                    <button class="primary-btn fix-gr-bg" type="submit">@lang('enregistrer')</button>
                                </div>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- timeline form modal end-->




@endsection
