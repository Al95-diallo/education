@extends('backEnd.master')
@section('mainContent')
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1>@lang('Catégories de frais')</h1>
            <div class="bc-pages">
                <a href="{{url('dashboard')}}">@lang('Tableau de bord')</a>
                <a href="#">@lang('Collection de frais')</a>
                <a href="#">@lang('Catégories de frais')</a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
        @if(isset($fees_group))
         @if(in_array(124, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 )
                       
        <div class="row">
            <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                <a href="{{url('fees-group')}}" class="primary-btn small fix-gr-bg">
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
                            <h3 class="mb-30">
                                @if(isset($fees_group))
                                    @lang('Modifier')
                                @else
                                    @lang('Ajouter une')
                                @endif
                                @lang('Catégories de frais')
                            </h3>
                        </div>
                        @if(isset($fees_group))
                        {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'fees_group_update',
                        'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                        @else
                          @if(in_array(124, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 )
                        {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'fees_group_store',
                        'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                        @endif
                        @endif
                        <div class="white-box">
                            <div class="add-visitor">
                                <div class="row  mt-25">
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
                                            <input class="primary-input form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                type="text" name="name" autocomplete="off" value="{{isset($fees_group)? $fees_group->name: old('name')}}">
                                            <input type="hidden" name="id" value="{{isset($fees_group)? $fees_group->id: ''}}">
                                            <label>@lang('Nom_categorie') <span>*</span></label>
                                            <span class="focus-border"></span>
                                            @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <textarea class="primary-input form-control" cols="0" rows="4"
                                                name="description">{{isset($fees_group)? $fees_group->description: old('description')}}</textarea>
                                                <label>@lang('description')</label>
                                            <span class="focus-border textarea"></span>
                                        </div>
                                    </div>
                                </div>
                                  @php 
                                  $tooltip = "";
                                  if(in_array(124, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ){
                                        $tooltip = "";
                                    }else{
                                        $tooltip = "You have no permission to add";
                                    }
                                @endphp
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                        <button class="primary-btn fix-gr-bg" data-toggle="tooltip" title="{{$tooltip}}">
                                            <span class="ti-check"></span>
                                            @if(isset($fees_group))
                                                @lang('Mise à jour')
                                            @else
                                                @lang('Enregistrer')
                                            @endif
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
                            <h3 class="mb-0"> @lang('Liste de categorie de frais')</h3>
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
                                    <th> @lang('nom_catégories')</th>
                                    <th> @lang('Description')</th>
                                    <th> @lang('action')</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($fees_groups as $fees_group)
                                <tr>
                                    <td>{{@$fees_group->name}}</td>
                                    <td>{{@$fees_group->description}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                @lang('selectionnez')
                                            </button>
                                         
                                            <div class="dropdown-menu dropdown-menu-right">
                                                @if(in_array(125, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 )

                                                <a class="dropdown-item" href="{{route('fees_group_edit', [$fees_group->id])}}"> @lang('modifier')</a>
                                                @endif
                                                @if(in_array(126, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 )
                                                <a class="dropdown-item deleteFeesGroupModal" data-toggle="modal" data-target="#deleteFeesGroupModal"
                                                    href="#" data-id="{{$fees_group->id}}">@lang('Supprimer')</a>
                                            @endif
                                                </div> 
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade admin-query" id="deleteFeesGroupModal" >
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> @lang('Supprimer une Catégories de frais')</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="text-center">
                    <h4> @lang('este-vous sur de vouloir supprimer')</h4>
                </div>

                <div class="mt-40 d-flex justify-content-between">
                    <button type="button" class="primary-btn tr-bg" data-dismiss="modal">@lang('Annuler')</button>
                     {{ Form::open(['route' => 'fees_group_delete', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                     <input type="hidden" name="id" id="fees_group_id">
                    <button class="primary-btn fix-gr-bg" type="submit"> @lang('Supprimer')</button>
                     {{ Form::close() }}
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
