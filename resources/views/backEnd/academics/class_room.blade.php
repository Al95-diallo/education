@extends('backEnd.master')
@section('mainContent')
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1>@lang('Gestion de salle de classe')</h1>
            <div class="bc-pages">
                <a href="{{url('dashboard')}}">@lang('Tableau de bord')</a>
                <a href="#">@lang('Academique')</a>
                <a href="#">@lang('Ajouter une salle de classe')</a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
        @if(isset($class_room))
          @if(in_array(270, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 )
        <div class="row">
            <div class="col-lg-12 text-right col-md-12 mb-20">
                <a href="{{url('class-room')}}" class="primary-btn small fix-gr-bg">
                    <span class="ti-plus pr-2"></span>
                    @lang('Ajouter une salle de Classe')
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
                            <h3 class="mb-30">
                                @if(isset($class_room))
                                    @lang('Modifier')
                                 @else
                                    @lang('Ajouter une')
                                @endif
                                    @lang('Salle de Classe')
                            </h3>
                        </div>
                        @if(isset($class_room))
                        {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'class-room/'.@$class_room->id, 'method' => 'PUT']) }}
                        @else
                        @if(in_array(270, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 )
           
                        {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'class-room', 'method' => 'POST']) }}
                        @endif
                        @endif
                        <div class="white-box">
                            <div class="add-visitor">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input type="hidden" name="url" id="url" value="{{URL::to('/')}}">
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
                                            <input class="primary-input form-control{{ $errors->has('room_no') ? ' is-invalid' : '' }}" type="text" name="room_no" autocomplete="off" value="{{isset($class_room)? $class_room->room_no: old('room_no')}}">
                                            <input type="hidden" name="id" value="{{isset($class_room)? $class_room->id: ''}}">
                                            <label>@lang('Numero de la salle') <span>*</span></label>
                                            <span class="focus-border"></span>
                                            @if ($errors->has('room_no'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('room_no') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-40">
                                    <div class="col-lg-12">
                                        
                                         <div class="input-effect">
                                            <input class="primary-input form-control{{ $errors->has('capacity') ? ' is-invalid' : '' }}" type="number" name="capacity" autocomplete="off" value="{{isset($class_room)? $class_room->capacity: old('capacity')}}">
                                            <label>@lang('Capacité') <span>*</span></label>
                                            <span class="focus-border"></span>
                                            @if ($errors->has('capacity'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('capacity') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @php 
                                  $tooltip = "";
                                  if(in_array(270, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ){
                                        $tooltip = "";
                                    }else{
                                        $tooltip = "You have no permission to add";
                                    }
                                @endphp
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                        <button class="primary-btn fix-gr-bg" data-toggle="tooltip" title="{{$tooltip}}">
                                            <span class="ti-check"></span>
                                            @if(isset($class_room))
                                                @lang('Mise à jour')
                                            @else
                                                @lang('enregistrer')
                                            @endif
                                            <!-- @lang('Salle de classe') -->

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
                            <h3 class="mb-0">@lang('liste de Salle de classe')</h3>
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
                                    <th>@lang('Numero de la salle')</th>
                                    <th>@lang('Capacité')</th>
                                    <th>@lang('action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($class_rooms as $class_room)
                                <tr>
                                    <td valign="top">{{ @$class_room->room_no}}</td>
                                    <td valign="top">{{ @$class_room->capacity}}</td>
                                    
                                    <td valign="top">
                                        <div class="dropdown">
                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                @lang('Selectionnez')
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                @if(in_array(271, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 )
                                                <a class="dropdown-item" href="{{url('class-room/'.$class_room->id.'/edit')}}">@lang('Modifier')</a>
                                               @endif
                                                @if(in_array(272, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 )
                                                <a class="dropdown-item" data-toggle="modal" data-target="#deleteClassModal{{ @$class_room->id }}"  href="#">@lang('Supprimer')</a>
                                            @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <div class="modal fade admin-query" id="deleteClassModal{{ @$class_room->id }}" >
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">@lang('Supprimer une salle de classe')</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="text-center">
                                                    <h4>@lang('Este-vous sur de vouloir supprimer')</h4>
                                                </div>

                                                <div class="mt-40 d-flex justify-content-between">
                                                    <button type="button" class="primary-btn tr-bg" data-dismiss="modal">@lang('Annuler')</button>
                                                    {{ Form::open(['url' => 'class-room/'.$class_room->id, 'method' => 'DELETE', 'enctype' => 'multipart/form-data']) }}
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
