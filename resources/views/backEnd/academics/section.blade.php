@extends('backEnd.master')
@section('mainContent')
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1>@lang('Gestion de Niveau scolaire') </h1>
            <div class="bc-pages">
                <a href="{{url('dashboard')}}">@lang('Tableau de bord')</a>
                <a href="#">@lang('Academique')</a>
                <a href="#">@lang('action')</a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
        @if(isset($section))
          @if(in_array(266, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 )
        <div class="row">
            <div class="col-lg-12 text-right col-md-12 mb-20">
                <a href="{{url('section')}}" class="primary-btn small fix-gr-bg">
                    <span class="ti-plus pr-2"></span>
                    @lang('Ajouter un niveau scolaire')
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
                            <h3 class="mb-30">@if(isset($section))
                                    @lang('Modifier')
                                @else
                                    @lang('Ajouter un niveau scolaire')
                                @endif
                                <!-- @lang('lang.section') -->
                            </h3>
                        </div>
                        @if(isset($section))
                        {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'section_update', 'method' => 'POST']) }}
                        @else
                         @if(in_array(266, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 )
           
                        {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'section_store', 'method' => 'POST']) }}
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
                                            <input class="primary-input form-control{{ @$errors->has('name') ? ' is-invalid' : '' }}" type="text" name="name" autocomplete="off" value="{{isset($section)? $section->section_name: old('name')}}">
                                            <input type="hidden" name="id" value="{{isset($section)? $section->id: ''}}">
                                            <label>@lang('Nom_Niveau') <span>*</span></label>
                                            <span class="focus-border"></span>
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ @$errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @php 
                                  $tooltip = "";
                                  if(in_array(266, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ){
                                        $tooltip = "";
                                    }else{
                                        $tooltip = "You have no permission to add";
                                    }
                                @endphp
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                        <button class="primary-btn fix-gr-bg" data-toggle="tooltip" title="{{@$tooltip}}">
                                            <span class="ti-check"></span>
                                            @if(isset($section))
                                                @lang('Mise à jour')
                                            @else
                                                @lang('Enregistrer')
                                            @endif
                                            <!-- @lang('lang.section') -->
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
                            <h3 class="mb-0">@lang('Liste de Niveaux')</h3>
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
                                    <td colspan="3">
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
                                    <th>@lang('Niveau')</th>
                                    <th>@lang('action')</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($sections as $section)
                                <tr>
                                    <td>{{@$section->section_name}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                @lang('Selectionnez')
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                @if(in_array(267, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 )
                                                <a class="dropdown-item" href="{{route('section_edit', [@$section->id])}}">@lang('Modifier')</a>
                                                @endif
                                                 @if(in_array(268, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 )
                                                <a class="dropdown-item" data-toggle="modal" data-target="#deleteSectionModal{{@$section->id}}"  href="#">@lang('Supprimer')</a>
                                           @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                  <div class="modal fade admin-query" id="deleteSectionModal{{@$section->id}}" >
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">@lang('Supprimer un niveau scolaire')</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="text-center">
                                                    <h4>@lang('Este-vous sur de vouloir supprimer')</h4>
                                                </div>

                                                <div class="mt-40 d-flex justify-content-between">
                                                    <button type="button" class="primary-btn tr-bg" data-dismiss="modal">@lang('Annuler')</button>
                                                    <a href="{{route('section_delete', [@$section->id])}}" class="text-light">
                                                    <button class="primary-btn fix-gr-bg" type="submit">@lang('Supprimer')</button>
                                                     </a>
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
