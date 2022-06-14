@extends('backEnd.master')
@section('mainContent')
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1>@lang('Gestion de Roles')</h1>
            <div class="bc-pages">
                <a href="{{url('dashboard')}}">@lang('tableau de bord')</a>
                <a href="#">@lang('Ressource humaine')</a>
                <a href="#">@lang('Roles')</a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_admin_visitor up_st_admin_visitor pl_22">
    <div class="container-fluid p-0">
        @if(isset($designation))
         @if(in_array(181, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 )
                      
        <div class="row">
            <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                <a href="{{url('designation')}}" class="primary-btn small fix-gr-bg">
                    <span class="ti-plus pr-2"></span>
                    @lang('Ajouter')
                </a>
            </div>
        </div>
        @endif
        @endif
        <div class="row">
          

            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-title">
                            <h3 class="mb-30">@if(isset($designation))
                                    @lang('Modifier')
                                @else
                                    @lang('Ajouter une')
                                @endif
                                @lang('role')
                            </h3>
                        </div>
                        @if(isset($designation))
                        {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'designation/'.$designation->id, 'method' => 'PUT', 'enctype' => 'multipart/form-data']) }}
                        @else
                          @if(in_array(181, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 )
                        {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'designation',
                        'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                        @endif
                        @endif
                        <div class="white-box">
                            <div class="add-visitor">
                                <div class="row">
                                    <div class="col-lg-12">
                                        @if(session()->has('message-success'))
                                        <div class="alert alert-success">
                                            {{ session()->get('message-success') }}
                                        </div>
                                        @elseif(session()->has('message-danger'))
                                        <div class="alert alert-danger">
                                            {{ session()->get('message-danger') }}
                                        </div>
                                        @endif
                                        <div class="input-effect">
                                            <input class="primary-input form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                                type="text" name="title" autocomplete="off" value="{{isset($designation)? $designation->title:Request::old('title')}}">
                                            <input type="hidden" name="id" value="{{isset($designation)? $designation->id: ''}}">
                                            <label>@lang('Role') <span>*</span></label>

                                            <span class="focus-border"></span>
                                            @if ($errors->has('title'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @php 
                                  $tooltip = "";
                                  if(in_array(181, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ){
                                        $tooltip = "";
                                    }else{
                                        $tooltip = "You have no permission to add";
                                    }
                                @endphp
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                         <button class="primary-btn fix-gr-bg" data-toggle="tooltip" title="{{$tooltip}}">
                                            <span class="ti-check"></span>
                                            {{isset($designation)? 'update':'save'}} @lang('role')
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-4 no-gutters">
                        <div class="main-title">
                            <h3 class="mb-0">@lang('Liste de roles')</h3>
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
                                    <td colspan="2">
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
                                    <th>@lang('roles')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($designations as $designation)
                                <tr>
                                    <td>{{$designation->title}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                @lang('selectionnez')
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                               @if(in_array(182, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 )

                                               <a class="dropdown-item" href="{{url('designation', [$designation->id
                                                    ])}}">@lang('modifier')</a>
                                               @endif
                                               @if(in_array(183, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 )

                                               <a class="dropdown-item" data-toggle="modal" data-target="#deleteDesignationModal{{$designation->id}}"
                                                    href="#">@lang('Supprimer')</a>
                                            @endif
                                                </div>
                                        </div>
                                    </td>
                                </tr>
                                <div class="modal fade admin-query" id="deleteDesignationModal{{$designation->id}}" >
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">@lang('Supprimer la role')</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="text-center">
                                                    <h4>@lang('este-vous sur de vouloir supprimer')</h4>
                                                </div>

                                                <div class="mt-40 d-flex justify-content-between">
                                                    <button type="button" class="primary-btn tr-bg" data-dismiss="modal">@lang('Annuler')</button>
                                                     {{ Form::open(['url' => 'designation/'.$designation->id, 'method' => 'DELETE', 'enctype' => 'multipart/form-data']) }}
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
