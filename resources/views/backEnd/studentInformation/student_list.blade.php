@extends('backEnd.master')
@section('mainContent')
<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-8 col-md-6">
                    <div class="main-title">
                        <h3 class="mb-30">@lang('Sélectionner les critères')</h3>
                    </div>
                </div>
                <div class="col-lg-4 text-md-right text-left col-md-6 mb-30-lg">
                    <a href="{{route('student_admission')}}" class="primary-btn small fix-gr-bg">
                        <span class="ti-plus pr-2"></span>
                        @lang(Ajouter une élèves')
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="white-box">
                        <form>
                            <div class="row">
                                <div class="col-lg-6">
                                    <select class="niceSelect w-100 bb">
                                        <option data-display="Selectionnez">@lang('Selectionnez')</option>
                                        <option value="1">@lang('Classe')Class 1</option>
                                        <option value="2">@lang('Classe')Class 2</option>
                                    </select>
                                </div>

                                <div class="col-lg-6 mt-30-md">
                                    <select class="niceSelect w-100 bb">
                                        <option data-display="Select Class">Selectionnez</option>
                                        <option value="1">Section 1</option>
                                        <option value="2">Section 2</option>
                                    </select>
                                </div>
                                <div class="col-lg-12 mt-20 text-right">
                                    <button type="submit" class="primary-btn small fix-gr-bg">
                                        <span class="ti-search pr-2"></span>
                                        Rechercher
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4 mt-30-md">
                    <div class="white-box">
                        <form>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="input-effect">
                                        <input class="primary-input" type="text" placeholder="Rechercher par Keyword">
                                        <span class="focus-border"></span>
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-20 text-right">
                                    <button type="submit" class="primary-btn small tr-bg">
                                        <span class="ti-search pr-2"></span>
                                        Rechercher
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row mt-40">
                

                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-4 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-0">Liste des élèves</h3>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-12">
                            <table id="table_id" class="display school-table" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Matricule.</th>
                                        <th>Nom</th>
                                        <th>Classe</th>
                                        <th>Fathers Name</th>
                                        <th>Date de naissance</th>
                                        <th>Sexe</th>
                                        <th>Type</th>
                                        <th>Téléphone"</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($students as $student)
                                    <tr>
                                        <td>{{$student->admission_no}}</td>
                                        <td>{{$student->first_name.' '.$student->last_name}}</td>
                                        <td>{{$student->className != ""? $student->className->class_name:""}}</td>
                                        <td>{{$student->parents!=""?$student->parents->fathers_name:""}}</td>
                                        <td>                                                                                
                                        {{$student->date_of_birth != ""? App\SmGeneralSettings::DateConvater($student->date_of_birth):''}}
                                        </td>
                                        <td>{{$student->gender !=""?$student->gender->base_setup_name:""}}</td>
                                        <td>{{$student->type !=""?$student->type->type:""}}</td>
                                        <td>{{$student->mobile}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                    Modifier
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="{{route('student_details', [$student->id])}}">Voir</a>
                                                    <a class="dropdown-item" href="#">Modifier</a>
                                                    <a class="dropdown-item" href="#">Supprimer</a>
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
@endsection
