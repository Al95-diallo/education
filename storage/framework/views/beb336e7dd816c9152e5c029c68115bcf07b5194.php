
<?php $__env->startSection('mainContent'); ?>

    <?php
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
    ?> 
<?php  $setting = App\SmGeneralSettings::find(1);  if(!empty($setting->currency_symbol)){ $currency = $setting->currency_symbol; }else{ $currency = '$'; }   ?> 

    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('Détails de l\'élève'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(url('dashboard')); ?>"><?php echo app('translator')->get('tableau de bord'); ?></a>
                    <a href="<?php echo e(route('student_list')); ?>"><?php echo app('translator')->get('liste des élèves'); ?></a>
                    <a href="#"><?php echo app('translator')->get('Détails de l\'élève'); ?></a>
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
                        <h3 class="mb-20"><?php echo app('translator')->get('Détails de l\'élève'); ?></h3>
                    </div>
                    <div class="student-meta-box">
                        <div class="student-meta-top"></div>
                            <img class="student-meta-img img-100" src="<?php echo e(file_exists(@$student_detail->student_photo) ? asset($student_detail->student_photo) : asset('public/uploads/staff/demo/staff.jpg')); ?>"                            alt="">
                       
                        <div class="white-box radius-t-y-0">
                            <div class="single-meta mt-10">
                                <div class="d-flex justify-content-between">
                                    <div class="name">
                                        <?php echo app('translator')->get('nom de l\'élève'); ?>
                                    </div>
                                    
                                    <div class="value">
                                        <?php echo e(@$student_detail->first_name.' '.@$student_detail->last_name); ?>

                                    </div>
                                </div>
                            </div>
                            <!-- <div class="single-meta">
                                <div class="d-flex justify-content-between">
                                    <div class="name">
                                        <?php echo app('translator')->get('lang.admission'); ?> <?php echo app('translator')->get('lang.number'); ?>
                                    </div>
                                    <div class="value">
                                        <?php echo e(@$student_detail->admission_no); ?>

                                    </div>
                                </div>
                            </div> -->
                            <div class="single-meta">
                                <div class="d-flex justify-content-between">
                                    <div class="name">
                                        <?php echo app('translator')->get('Matricule'); ?>
                                    </div>
                                    <div class="value">
                                        <?php echo e(@$student_detail->roll_no); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="single-meta">
                                <div class="d-flex justify-content-between">
                                    <div class="name">
                                        <?php echo app('translator')->get('classe'); ?>
                                    </div>
                                    <div class="value">
                                        <?php if($student_detail->className!="" && $student_detail->session_id!=""): ?>
                                            <?php echo e(@$student_detail->className->class_name); ?>

                                            (<?php echo e(@$academic_year->year); ?>)
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="single-meta">
                                <div class="d-flex justify-content-between">
                                    <div class="name">
                                        <?php echo app('translator')->get('Niveau'); ?>
                                    </div>
                                    <div class="value">
                                        <?php echo e(@$student_detail->section->section_name); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="single-meta">
                                <div class="d-flex justify-content-between">
                                    <div class="name">
                                        <?php echo app('translator')->get('sexe'); ?>
                                    </div>
                                    <div class="value">

                                        <?php echo e(@$student_detail->gender !=""?$student_detail->gender->base_setup_name:""); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Student Meta Information -->
                    
                    <?php if(count($siblings) >0 ): ?>
                        <!-- Start Siblings Meta Information -->
                        <div class="main-title mt-40">
                            <h3 class="mb-20"><?php echo app('translator')->get('informations personnel '); ?> </h3>
                        </div>
                        <?php $__currentLoopData = $siblings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sibling): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                                <div class="student-meta-box mb-20">
                                    <div class="student-meta-top siblings-meta-top"></div>
                                    <img class="student-meta-img img-100" src="<?php echo e(asset(@$sibling->student_photo)); ?>" alt="">
                                    <div class="white-box radius-t-y-0">
                                        <div class="single-meta mt-10">
                                            <div class="d-flex justify-content-between">
                                                <div class="name">
                                                    <?php echo app('translator')->get('lang.sibling'); ?> <?php echo app('translator')->get('lang.name'); ?>
                                                </div>
                                                 <div class="value">
                                                    <?php echo e(isset($sibling->full_name)?$sibling->full_name:''); ?>

                                                </div> 
                                            </div>
                                        </div>
                                        <!-- <div class="single-meta">
                                            <div class="d-flex justify-content-between">
                                                <div class="name">
                                                    <?php echo app('translator')->get('lang.admission'); ?> <?php echo app('translator')->get('lang.number'); ?>
                                                </div>
                                                <div class="value">
                                                    <?php echo e(@$sibling->admission_no); ?>

                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="single-meta">
                                            <div class="d-flex justify-content-between">
                                                <div class="name">
                                                    <?php echo app('translator')->get('Matricule'); ?>
                                                </div>
                                                <div class="value">
                                                    <?php echo e(@$sibling->roll_no); ?>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-meta">
                                            <div class="d-flex justify-content-between">
                                                <div class="name">
                                                    <?php echo app('translator')->get('classe'); ?>
                                                </div>
                                                <div class="value">
                                                    <?php echo e(@$sibling->className->class_name); ?>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-meta">
                                            <div class="d-flex justify-content-between">
                                                <div class="name">
                                                    <?php echo app('translator')->get('Niveaux'); ?>
                                                </div>
                                                <div class="value">
                                                    <?php echo e($sibling->section !=""?$sibling->section->section_name:""); ?>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-meta">
                                            <div class="d-flex justify-content-between">
                                                <div class="name">
                                                    <?php echo app('translator')->get('Sexe'); ?>
                                                </div>
                                                <div class="value">
                                                    <?php echo e($sibling->gender!=""? $sibling->gender->base_setup_name:""); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!-- End Siblings Meta Information -->
                
                <?php endif; ?>
                </div>

                <!-- Start Student Details -->
                <div class="col-lg-9 student-details up_admin_visitor">
                    <ul class="nav nav-tabs tabs_scroll_nav" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#studentProfile" role="tab" data-toggle="tab"><?php echo app('translator')->get('profile'); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#studentFees" role="tab" data-toggle="tab"><?php echo app('translator')->get('lang.fees'); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#studentExam" role="tab" data-toggle="tab"><?php echo app('translator')->get('examens'); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#studentDocuments" role="tab" data-toggle="tab"><?php echo app('translator')->get('document'); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#studentTimeline" role="tab" data-toggle="tab"><?php echo app('translator')->get('chronologie'); ?></a>
                        </li>
                        <li class="nav-item edit-button">
                            <?php if(@in_array(66, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                                <a href="<?php echo e(route('student_edit', [@$student_detail->id])); ?>"
                                class="primary-btn small fix-gr-bg"><?php echo app('translator')->get('Modifier'); ?>
                                </a>
                            <?php endif; ?>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- Start Profile Tab -->
                        <div role="tabpanel" class="tab-pane fade  show active" id="studentProfile">
                            <div class="white-box">
                                <h4 class="stu-sub-head"><?php echo app('translator')->get('informations personnel'); ?></h4>
                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div class="">
                                                <?php echo app('translator')->get('Date d\inscription'); ?>
                                            </div>
                                        </div>

                                        <div class="col-lg-7 col-md-6">
                                            <div class="">
                                                <?php echo e(!empty($student_detail->admission_date)? App\SmGeneralSettings::DateConvater($student_detail->admission_date):''); ?> 
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-6">
                                            <div class="">
                                                <?php echo app('translator')->get('date de naissance'); ?>
                                            </div>
                                        </div>

                                        <div class="col-lg-7 col-md-7">
                                            <div class="">
                                                <?php echo e(!empty($student_detail->date_of_birth)? App\SmGeneralSettings::DateConvater($student_detail->date_of_birth):''); ?>  
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-6">
                                            <div class="">
                                                <?php echo app('translator')->get('type'); ?>
                                            </div>
                                        </div>

                                        <div class="col-lg-7 col-md-7">
                                            <div class="">
                                                <?php echo e($student_detail->category != ""? $student_detail->category->catgeory_name:""); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-6">
                                            <div class="">
                                                <?php echo app('translator')->get('réligion'); ?>
                                            </div>
                                        </div>

                                        <div class="col-lg-7 col-md-7">
                                            <div class="">
                                                <?php echo e($student_detail->religion != ""? $student_detail->religion->base_setup_name:""); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-6">
                                            <div class="">
                                                <?php echo app('translator')->get('téléphone'); ?>
                                            </div>
                                        </div>

                                        <div class="col-lg-7 col-md-7">
                                            <div class="">
                                                <?php echo e(@$student_detail->mobile); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-6">
                                            <div class="">
                                                <?php echo app('translator')->get('Adresse e-mail'); ?>
                                            </div>
                                        </div>

                                        <div class="col-lg-7 col-md-7">
                                            <div class="">
                                                <?php echo e(@$student_detail->email); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-6">
                                            <div class="">
                                                <?php echo app('translator')->get('Adresse actuelle'); ?> 
                                            </div>
                                        </div>

                                        <div class="col-lg-7 col-md-7">
                                            <div class="">
                                                <?php echo e(@$student_detail->current_address); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-6">
                                            <div class="">
                                                <?php echo app('translator')->get('Adresse permanente'); ?>
                                            </div>
                                        </div>

                                        <div class="col-lg-7 col-md-7">
                                            <div class="">
                                                <?php echo e(@$student_detail->permanent_address); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Start Parent Part -->
                                <h4 class="stu-sub-head mt-40"><?php echo app('translator')->get('DÉTAILS SUR LE PARENT & TUTEUR'); ?></h4>
                                <div class="d-flex">
                                    <div class="mr-20 mt-20">
                                            <img class="student-meta-img img-100" src="<?php echo e(file_exists(@$student_detail->parents->fathers_photo) ? asset($student_detail->parents->fathers_photo) : asset('public/uploads/staff/demo/father.png')); ?>" alt="">

                                    </div>
                                    <div class="w-100">
                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="">
                                                        <?php echo app('translator')->get('Nom du père'); ?>
                                                    </div>
                                                </div>

                                                <div class="col-lg-8 col-md-7">
                                                    <div class="">
                                                        <?php echo e(@$student_detail->parents->fathers_name); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="">
                                                        <?php echo app('translator')->get('occupation'); ?>
                                                    </div>
                                                </div>

                                                <div class="col-lg-8 col-md-7">
                                                    <div class="">
                                                        <?php echo e(@$student_detail->parents!=""?@$student_detail->parents->fathers_occupation:""); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="">
                                                        <?php echo app('translator')->get('téléphone'); ?>
                                                    </div>
                                                </div>

                                                <div class="col-lg-8 col-md-7">
                                                    <div class="">
                                                        <?php echo e(@$student_detail->parents !=""?@$student_detail->parents->fathers_mobile:""); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <div class="mr-20 mt-20">
                                             <img class="student-meta-img img-100" src="<?php echo e(file_exists(@$student_detail->parents->mothers_photo) ? asset($student_detail->parents->mothers_photo) : asset('public/uploads/staff/demo/mother.jpg')); ?>" alt="">
                                    </div>
                                    <div class="w-100">
                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="">
                                                        <?php echo app('translator')->get('nom de la mère'); ?>
                                                    </div>
                                                </div>

                                                <div class="col-lg-8 col-md-7">
                                                    <div class="">
                                                        <?php echo e($student_detail->parents !=""?@$student_detail->parents->mothers_name:""); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="">
                                                        <?php echo app('translator')->get('occupation'); ?>
                                                    </div>
                                                </div>

                                                <div class="col-lg-8 col-md-7">
                                                    <div class="">
                                                        <?php echo e($student_detail->parents !=""?@$student_detail->parents->mothers_occupation:""); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="">
                                                        <?php echo app('translator')->get('téléphone'); ?>
                                                    </div>
                                                </div>

                                                <div class="col-lg-8 col-md-7">
                                                    <div class="">
                                                        <?php echo e($student_detail->parents !=""?@$student_detail->parents->mothers_mobile:""); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <div class="mr-20 mt-20">
                                        <img class="student-meta-img img-100" src="<?php echo e(file_exists(@$student_detail->parents->guardians_photo) ? asset($student_detail->parents->guardians_photo) : asset('public/uploads/staff/demo/guardian.jpg')); ?>" alt="">

                                    </div>
                                    <div class="w-100">
                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="">
                                                        <?php echo app('translator')->get('nom du gardien'); ?>
                                                    </div>
                                                </div>

                                                <div class="col-lg-8 col-md-7">
                                                    <div class="">
                                                        <?php echo e($student_detail->parents !=""?@$student_detail->parents->guardians_name:""); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="">
                                                        <?php echo app('translator')->get('adresse e-mail'); ?>
                                                    </div>
                                                </div>

                                                <div class="col-lg-8 col-md-7">
                                                    <div class="">
                                                        <?php echo e($student_detail->parents !=""?@$student_detail->parents->guardians_email:""); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="">
                                                        <?php echo app('translator')->get('téléphone'); ?>
                                                    </div>
                                                </div>

                                                <div class="col-lg-8 col-md-7">
                                                    <div class="">
                                                        <?php echo e($student_detail->parents !=""?@$student_detail->parents->guardians_mobile:""); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="">
                                                        <?php echo app('translator')->get('Relation avec le gardien'); ?>
                                                    </div>
                                                </div>

                                                <div class="col-lg-8 col-md-7">
                                                    <div class="">
                                                        <?php echo e($student_detail->parents !=""?@$student_detail->parents->guardians_relation:""); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="">
                                                        <?php echo app('translator')->get('occupation'); ?>
                                                    </div>
                                                </div>

                                                <div class="col-lg-8 col-md-7">
                                                    <div class="">
                                                        <?php echo e($student_detail->parents !=""?@$student_detail->parents->guardians_occupation:""); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="">
                                                        <?php echo app('translator')->get('Adresse du gardien'); ?>
                                                    </div>
                                                </div>

                                                <div class="col-lg-8 col-md-7">
                                                    <div class="">
                                                        <?php echo e($student_detail->parents !=""?@$student_detail->parents->guardians_address:""); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Parent Part -->

                                <!-- Start Transport Part -->
                                <h4 class="stu-sub-head mt-40"><?php echo app('translator')->get('INFORMATIONS SUR LE TRANSPORT ET LE DORTOIR'); ?></h4>
                                
                                
                                <?php if(!empty($student_detail->route_list_id)): ?>
                                    
                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div class="">
                                                <?php echo app('translator')->get('AUTRES INFORMATION'); ?>
                                            </div>
                                        </div>

                                        <div class="col-lg-7 col-md-6">
                                            <div class="">
                                                <?php echo e(isset($student_detail->route_list_id)? @$student_detail->route->title: ''); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php endif; ?>

                                <?php if(isset($student_detail->vehicle)): ?>
                                    <?php if(!empty($vehicle_no)): ?>
                                    <div class="single-info">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-5">
                                                <div class="">
                                                    <?php echo app('translator')->get('nu,éro du vehicle'); ?>
                                                </div>
                                            </div>
    
                                            <div class="col-lg-7 col-md-6">
                                                <div class="">
                                                    <?php echo e($student_detail->vehicle != ""? @$student_detail->vehicle->vehicle_no: ''); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div> 


                                    <?php endif; ?>
                               
                                    
                                <?php endif; ?>
                               
                                
                                    <?php if(isset($driver_info)): ?>
                                        <?php if(!empty($driver_info->full_name)): ?>
                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-5 col-md-5">
                                                    <div class="">
                                                        <?php echo app('translator')->get('nom du conducteur'); ?>
                                                    </div>
                                                </div>
        
                                                <div class="col-lg-7 col-md-6">
                                                    <div class="">
                                                        <?php echo e($student_detail->vechile_id != ""? @$driver_info->full_name:''); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                        
                                    <?php endif; ?>
                                
                                    <?php if(isset($driver_info)): ?>
                                        <?php if(!empty($driver_info->mobile)): ?>
                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-5 col-md-5">
                                                    <div class="">
                                                        <?php echo app('translator')->get('Numero de téléphone du chauffeur'); ?>
                                                    </div>
                                                </div>
        
                                                <div class="col-lg-7 col-md-6">
                                                    <div class="">
                                                        <?php echo e($student_detail->vechile_id != ""? @$driver_info->mobile:''); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                               

                                    <?php if(isset($student_detail->dormitory)): ?>
                                        <?php if(!empty($student_detail->dormitory->dormitory_name)): ?>
                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-5 col-md-5">
                                                    <div class="">
                                                        <?php echo app('translator')->get('Nom du dortoir'); ?>
                                                    </div>
                                                </div>
        
                                                <div class="col-lg-7 col-md-6">
                                                    <div class="">
                                                        <?php echo e(isset($student_detail->dormitory_id)?@$student_detail->dormitory->dormitory_name: ''); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                
                                <!-- End Transport Part -->

                                <!-- Start Other Information Part -->
                                <h4 class="stu-sub-head mt-40"><?php echo app('translator')->get('AUTRES INFORMATION'); ?></h4>
                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div class="">
                                                <?php echo app('translator')->get('Groupe sanguin'); ?>
                                            </div>
                                        </div>

                                        <div class="col-lg-7 col-md-6">
                                            <div class="">
                                                <?php echo e(isset($student_detail->bloodgroup_id)? @$student_detail->bloodGroup->base_setup_name: ''); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div class="">
                                                <?php echo app('translator')->get('lang.height'); ?>
                                            </div>
                                        </div>

                                        <div class="col-lg-7 col-md-6">
                                            <div class="">
                                                <?php echo e(isset($student_detail->height)? @$student_detail->height: ''); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div class="">
                                                <?php echo app('translator')->get('la taille'); ?>
                                            </div>
                                        </div>

                                        <div class="col-lg-7 col-md-6">
                                            <div class="">
                                                <?php echo e(isset($student_detail->weight)? @$student_detail->weight: ''); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div class="">
                                                <?php echo app('translator')->get('Détails de lécole précédente'); ?>
                                            </div>
                                        </div>

                                        <div class="col-lg-7 col-md-6">
                                            <div class="">
                                                <?php echo e(isset($student_detail->previous_school_details)? @$student_detail->previous_school_details: ''); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div class="">
                                                <?php echo app('translator')->get('numéro national d\'identité'); ?>
                                            </div>
                                        </div>

                                        <div class="col-lg-7 col-md-6">
                                            <div class="">
                                                <?php echo e(isset($student_detail->national_id_no)? @$student_detail->national_id_no: ''); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div class="">
                                                <?php echo app('translator')->get('Numéro didentification local'); ?>
                                            </div>
                                        </div>
                                        

                                        <div class="col-lg-7 col-md-6">
                                            <div class="">
                                                <?php echo e(isset($student_detail->local_id_no)? @$student_detail->local_id_no: ''); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div class="">
                                                <?php echo app('translator')->get('Numéro de compte bancaire'); ?>
                                            </div>
                                        </div>

                                        <div class="col-lg-7 col-md-6">
                                            <div class="">
                                                <?php echo e(isset($student_detail->bank_account_no)? @$student_detail->bank_account_no: ''); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div class="">
                                                <?php echo app('translator')->get('Nom de banque'); ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-6">
                                            <div class="">
                                                <?php echo e(isset($student_detail->bank_name)? @$student_detail->bank_name: ''); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="single-info">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div class="">
                                                <?php echo app('translator')->get('Code IFSC'); ?>
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
                                    <th><?php echo app('translator')->get('GROUPE DE FRAIS'); ?></th>
                                    <th><?php echo app('translator')->get('CODE DES FRAIS'); ?></th>
                                    <th><?php echo app('translator')->get('DATE DÉCHÉANCE'); ?></th>
                                    <th><?php echo app('translator')->get('Statut'); ?></th>
                                    <th><?php echo app('translator')->get('MONTANT'); ?> (<?php echo e(@$currency); ?>)</th>
                                    <th><?php echo app('translator')->get('paiement'); ?></th>
                                    <th><?php echo app('translator')->get('mode'); ?></th>
                                    <th><?php echo app('translator')->get('date'); ?></th>
                                    <th><?php echo app('translator')->get('REMISE'); ?> (<?php echo e(@$currency); ?>)</th>
                                    <th><?php echo app('translator')->get('Bien'); ?> (<?php echo e(@$currency); ?>)</th>
                                    <th><?php echo app('translator')->get('payé'); ?> (<?php echo e(@$currency); ?>)</th>
                                    <th><?php echo app('translator')->get('balance'); ?> (<?php echo e(@$currency); ?>)</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php
                                    $grand_total = 0;
                                    $total_fine = 0;
                                    $total_discount = 0;
                                    $total_paid = 0;
                                    $total_grand_paid = 0;
                                    $total_balance = 0;
                                ?>
                                <?php $__currentLoopData = $fees_assigneds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fees_assigned): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                         $grand_total += $fees_assigned->feesGroupMaster->amount;
                                      

                                    ?>

                                    <?php
                                        $discount_amount = App\SmFeesAssign::discountSum($fees_assigned->student_id, $fees_assigned->feesGroupMaster->feesTypes->id, 'discount_amount');
                                        $total_discount += $discount_amount;
                                        $student_id = $fees_assigned->student_id;
                                    ?>
                                    <?php
                                        $paid = App\SmFeesAssign::discountSum($fees_assigned->student_id, $fees_assigned->feesGroupMaster->feesTypes->id, 'amount');
                                        $total_grand_paid += $paid;
                                    ?>
                                    <?php
                                        $fine = App\SmFeesAssign::discountSum($fees_assigned->student_id, $fees_assigned->feesGroupMaster->feesTypes->id, 'fine');
                                        $total_fine += $fine;
                                    ?>

                                    <?php
                                        $total_paid = $discount_amount + $paid;
                                    ?>
                                    <tr>
                                        <td><?php echo e($fees_assigned->feesGroupMaster->feesGroups !=""?$fees_assigned->feesGroupMaster->feesGroups->name:""); ?></td>
                                        <td><?php echo e($fees_assigned->feesGroupMaster->feesTypes !=""?$fees_assigned->feesGroupMaster->feesTypes->name:""); ?></td>
                                        <td>
                                            <?php if(!empty($fees_assigned->feesGroupMaster)): ?> 
                                            <?php echo e($fees_assigned->feesGroupMaster->date != ""? App\SmGeneralSettings::DateConvater($fees_assigned->feesGroupMaster->date):''); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td>
                                               <?php if($fees_assigned->feesGroupMaster->amount == $total_paid): ?>
                                                    <button class="primary-btn small bg-success text-white border-0">
                                                        <?php echo app('translator')->get('payé'); ?>
                                                    </button>
                                                <?php elseif($total_paid != 0): ?>
                                                    <button class="primary-btn small bg-warning text-white border-0">
                                                        <?php echo app('translator')->get('partiel'); ?>
                                                    </button>
                                                <?php elseif($total_paid == 0): ?>
                                                    <button class="primary-btn small bg-danger text-white border-0">
                                                        <?php echo app('translator')->get('Non payé'); ?>
                                                    </button>
                                                <?php endif; ?>
                                           
                                        </td>
                                        <td>
                                            <?php
                                                   echo $fees_assigned->feesGroupMaster->amount;
                                                

                                            ?>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td> <?php echo e($discount_amount); ?> </td>
                                        <td><?php echo e($fine); ?></td>
                                        <td><?php echo e($paid); ?></td>
                                        <td>
                                            <?php

                                                  $rest_amount = $fees_assigned->feesGroupMaster->amount - $total_paid;
                                               

                                                $total_balance +=  $rest_amount;
                                                echo $rest_amount;
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                        $payments = App\SmFeesAssign::feesPayment($fees_assigned->feesGroupMaster->feesTypes->id, $fees_assigned->student_id);
                                        $i = 0;
                                    ?>

                                    <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-right"><img
                                                    src="<?php echo e(asset('public/backEnd/img/table-arrow.png')); ?>"></td>
                                            <td>
                                                <?php
                                                    $created_by = App\User::find($payment->created_by);
                                                ?>
                                                
                                            </td>
                                            <td>
                                                <?php if($payment->payment_mode == "C"): ?>
                                                        <?php echo e('Cash'); ?>

                                                <?php elseif($payment->payment_mode == "Cq"): ?>
                                                    <?php echo e('Cheque'); ?>

                                                <?php elseif('DD'): ?>
                                                    <?php echo e('DD'); ?>

                                                <?php elseif('PS'): ?>
                                                    <?php echo e('Paystack'); ?>

                                                    <?php endif; ?>
                                            </td>
                                            <td> <?php echo e($payment->payment_date != ""? App\SmGeneralSettings::DateConvater($payment->payment_date):''); ?>


                                            </td>
                                            <td><?php echo e(@$payment->discount_amount); ?></td>
                                            <td><?php echo e(@$payment->fine); ?></td>
                                            <td><?php echo e(@$payment->amount); ?></td>
                                            <td></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                 

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th><?php echo app('translator')->get('lang.grand_total'); ?> (<?php echo e(@$currency); ?>)</th>
                                    <th></th>
                                    <th><?php echo e(@$grand_total); ?></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th><?php echo e(@$total_discount); ?></th>
                                    <th><?php echo e(@$total_fine); ?></th>
                                    <th><?php echo e(@$total_grand_paid); ?></th>
                                    <th><?php echo e(@$total_balance); ?></th>
                                    <th></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- End Profile Tab -->

                        <!-- Start Exam Tab -->
                        <div role="tabpanel" class="tab-pane fade" id="studentExam">
                           
                            <?php
                            $exam_count= count($exam_terms); 
                            ?>
                            <?php if($exam_count<1): ?>
                            <div class="white-box no-search no-paginate no-table-info mb-2">
                               <table class="display school-table" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th><?php echo app('translator')->get('Matière'); ?></th>
                                            <th><?php echo app('translator')->get('lang.full_marks'); ?></th>
                                            <th><?php echo app('translator')->get('lang.passing_marks'); ?></th>
                                            <th><?php echo app('translator')->get('lang.obtained_marks'); ?></th>
                                            <th><?php echo app('translator')->get('lang.results'); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                               </table>
                            </div>
                            <?php endif; ?>
                       
                                <div class="white-box no-search no-paginate no-table-info mb-2">
                                    <?php $__currentLoopData = $exam_terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <?php

                                        $get_results = App\SmStudent::getExamResult(@$exam->id, @$student_detail);


                                    ?>


                                    <?php if($get_results): ?>

                                    <div class="main-title">
                                        <h3 class="mb-0"><?php echo e(@$exam->title); ?></h3>
                                    </div>
                                    <table id="table_id" class="display school-table" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th><?php echo app('translator')->get('date'); ?></th>
                                            <th><?php echo app('translator')->get('Matières'); ?></th>
                                            <th><?php echo app('translator')->get('lang.full_marks'); ?></th>
                                            <th><?php echo app('translator')->get('lang.obtained_marks'); ?></th>
                                            <th><?php echo app('translator')->get('observation'); ?></th>
                                            <th><?php echo app('translator')->get('resultats'); ?></th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                            
                                        <?php
                                            $grand_total = 0;
                                            $grand_total_marks = 0;
                                            $result = 0;
                                        ?>

                                        <?php $__currentLoopData = $get_results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mark): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
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
                                            ?>
                                            <tr>
                                                <td><?php echo e(!empty($schedule_by_subject->date)? App\SmGeneralSettings::DateConvater($schedule_by_subject->date):''); ?></td>
                                                <td><?php echo e(@$mark->subject->subject_name); ?></td>
                                                <td><?php echo e(@$subject_marks->exam_mark); ?></td>
                                                <td><?php echo e(@$mark->total_marks); ?></td>
                                                <td><?php echo e(@$mark->total_gpa_grade); ?></td>
                                                <td>
                                                    <?php if($result_subject == 0): ?>
                                                        <button
                                                            class="primary-btn small bg-success text-white border-0">
                                                            <?php echo app('translator')->get('lang.pass'); ?>
                                                        </button>
                                                    <?php else: ?>
                                                        <button class="primary-btn small bg-danger text-white border-0">
                                                            <?php echo app('translator')->get('lang.fail'); ?>
                                                        </button>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                            <tfoot>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th><?php echo app('translator')->get('lang.grand_total'); ?>: <?php echo e($grand_total); ?>/<?php echo e($grand_total_marks); ?></th>
                                                <th></th>
                                                <th><?php echo app('translator')->get('observation'); ?>:
                                                    <?php
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
                                                    ?>
                                                </th>
                                            </tr>
                                            </tfoot>
                                    </table>

                                    <?php endif; ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            
                        </div>
                        <!-- End Exam Tab -->

                        <!-- Start Documents Tab -->
                        <div role="tabpanel" class="tab-pane fade" id="studentDocuments">
                            <div class="white-box">
                                <div class="text-right mb-20">
                                    <button type="button" data-toggle="modal" data-target="#add_document_madal"
                                            class="primary-btn tr-bg text-uppercase bord-rad">
                                        <?php echo app('translator')->get('Télécharger le document'); ?>
                                        <span class="pl ti-upload"></span>
                                    </button>
                                </div>
                                <table id="" class="table simple-table table-responsive school-table"
                                       cellspacing="0">
                                    <thead class="d-block">
                                    <tr class="d-flex">
                                        <th class="col-6"><?php echo app('translator')->get('titre du document'); ?></th>
                                        <th class="col-6"><?php echo app('translator')->get('action'); ?></th>
                                    </tr>
                                    </thead>

                                    <tbody class="d-block">
                                    <?php if($student_detail->document_file_1 != ""): ?>
                                        <tr class="d-flex">
                                            <td class="col-6"><?php echo e($student_detail->document_title_1); ?></td>
                                            <td class="col-6">
                                                <?php if(file_exists($student_detail->document_file_1)): ?>
                                                    <a class="primary-btn tr-bg text-uppercase bord-rad"
                                                        href="<?php echo e(url('download-document/'.showDocumentName($student_detail->document_file_1))); ?>">
                                                        <?php echo app('translator')->get('Télécharger le document'); ?><span class="pl ti-download"></span>
                                                    </a>
                                                <?php endif; ?>                                               
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if($student_detail->document_file_2 != ""): ?>
                                        <tr class="d-flex">
                                            <td class="col-6"><?php echo e($student_detail->document_title_2); ?></td>
                                            <td class="col-6">
                                                <?php if(file_exists($student_detail->document_file_2)): ?>
                                                    <a class="primary-btn tr-bg text-uppercase bord-rad"
                                                       href="<?php echo e(url('download-document/'.showDocumentName($student_detail->document_file_2))); ?>">
                                                        <?php echo app('translator')->get('Télécharger le document'); ?><span class="pl ti-download"></span>
                                                    </a>
                                                <?php endif; ?>    
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if($student_detail->document_file_3 != ""): ?>
                                        <tr class="d-flex">
                                            <td class="col-6"><?php echo e($student_detail->document_title_3); ?></td>
                                            <td class="col-6">
                                                <?php if(file_exists($student_detail->document_file_3)): ?>
                                                    <a class="primary-btn tr-bg text-uppercase bord-rad"
                                                    href="<?php echo e(url('download-document/'.showDocumentName($student_detail->document_file_3))); ?>">
                                                        <?php echo app('translator')->get('Télécharger le document'); ?><span class="pl ti-download"></span>
                                                    </a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if($student_detail->document_file_4 != ""): ?>
                                        <tr class="d-flex">
                                            <td class="col-6"><?php echo e($student_detail->document_title_4); ?></td>
                                            <td class="col-6">
                                                <?php if(file_exists($student_detail->document_file_4)): ?>
                                                    <a class="primary-btn tr-bg text-uppercase bord-rad"
                                                    href="<?php echo e(url('download-document/'.showDocumentName($student_detail->document_file_4))); ?>">
                                                        <?php echo app('translator')->get('Télécharger le document'); ?><span class="pl ti-download"></span>
                                                    </a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    
                                    <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         
                                    <?php
                                //    $name = explode('/', $document->file);
                                //    dd($name);

                                    // if(!function_exists('showDocumentName')){
                                    //     function showDocumentName($data){
                                    //     $name = explode('/', $data);
                                    //     return $name[4];
                                    // }
                                    // }
                                    
                                ?> 
                                        <tr class="d-flex">
                                            <td class="col-6"><?php echo e($document->title); ?></td>
                                            <td class="col-6">
                                                <?php if(file_exists($document->file)): ?>
                                                    <a class="primary-btn tr-bg text-uppercase bord-rad"
                                                    href="<?php echo e(url('download-document/'.showDocumentName($document->file))); ?>">
                                                        <?php echo app('translator')->get('Télécharger le document'); ?><span class="pl ti-download"></span>
                                                    </a>
                                                <?php endif; ?>
                                                <a class="primary-btn icon-only fix-gr-bg" data-toggle="modal"
                                                   data-target="#deleteDocumentModal<?php echo e($document->id); ?>" href="#">
                                                    <span class="ti-trash"></span>
                                                </a>

                                            </td>
                                        </tr>
                                        <div class="modal fade admin-query" id="deleteDocumentModal<?php echo e($document->id); ?>">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title"><?php echo app('translator')->get('supprimer'); ?></h4>
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            &times;
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <h4><?php echo app('translator')->get('este-vous sur de vouloir supprimer'); ?></h4>
                                                        </div>

                                                        <div class="mt-40 d-flex justify-content-between">
                                                            <button type="button" class="primary-btn tr-bg"
                                                                    data-dismiss="modal"><?php echo app('translator')->get('Annuler'); ?>
                                                            </button>
                                                            <a class="primary-btn fix-gr-bg"
                                                               href="<?php echo e(route('delete-student-document', [$document->id])); ?>">
                                                                <?php echo app('translator')->get('Supprimer'); ?></a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                        <h4 class="modal-title"> <?php echo app('translator')->get('Télécharger le document'); ?> </h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'upload_document',
                                                                'method' => 'POST', 'enctype' => 'multipart/form-data', 'name' => 'document_upload'])); ?>

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <input type="hidden" name="student_id"
                                                           value="<?php echo e($student_detail->id); ?>">
                                                    <div class="row mt-25">
                                                        <div class="col-lg-12">
                                                            <div class="input-effect">
                                                                <input class="primary-input form-control{" type="text"
                                                                       name="title" value="" id="title">
                                                                <label> <?php echo app('translator')->get('Titre'); ?><span>*</span> </label>
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
                                                                <label class="primary-btn small fix-gr-bg" for="photo"> <?php echo app('translator')->get('feuilleter'); ?></label>
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
                                                                data-dismiss="modal"><?php echo app('translator')->get('Annuler'); ?>
                                                        </button>

                                                        <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('enregistrer'); ?>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php echo e(Form::close()); ?>

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
                                        <?php echo app('translator')->get('Ajouter'); ?>
                                        <span class="pl ti-plus"></span>
                                    </button>

                                </div>
                                <?php $__currentLoopData = $timelines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timeline): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="student-activities">
                                        <div class="single-activity">
                                            <h4 class="title text-uppercase">
                                                
                                             <?php echo e($timeline->date != ""? App\SmGeneralSettings::DateConvater($timeline->date):''); ?>


                                            </h4>
                                            <div class="sub-activity-box d-flex">
                                                <h6 class="time text-uppercase">10.30 pm</h6>
                                                <div class="sub-activity">
                                                    <h5 class="subtitle text-uppercase"> <?php echo e($timeline->title); ?></h5>
                                                    <p>
                                                        <?php echo e($timeline->description); ?>

                                                    </p>
                                                </div>

                                                <div class="close-activity">
                                                    
                                                    <a class="primary-btn icon-only fix-gr-bg" data-toggle="modal"
                                                       data-target="#deleteTimelineModal<?php echo e($timeline->id); ?>" href="#">
                                                        <span class="ti-trash text-white"></span>
                                                    </a>
                                                    
                                                    <?php if(file_exists($timeline->file)): ?>                                                      
                                                        <a href="<?php echo e(url('staff-download-timeline-doc/'.showTimelineDocName($timeline->file))); ?>"
                                                           class="primary-btn tr-bg text-uppercase bord-rad">
                                                            <?php echo app('translator')->get('Télécharger document'); ?><span class="pl ti-download"></span>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade admin-query" id="deleteTimelineModal<?php echo e($timeline->id); ?>">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title"><?php echo app('translator')->get('supprimer'); ?></h4>
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            &times;
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <h4><?php echo app('translator')->get('este-vous sur de vouloir supprimer'); ?></h4>
                                                        </div>

                                                        <div class="mt-40 d-flex justify-content-between">
                                                            <button type="button" class="primary-btn tr-bg"
                                                                    data-dismiss="modal"><?php echo app('translator')->get('Annuler'); ?>
                                                            </button>
                                                            <a class="primary-btn fix-gr-bg"
                                                               href="<?php echo e(route('delete_timeline', [$timeline->id])); ?>">
                                                                <?php echo app('translator')->get('supprimer'); ?></a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                    <h4 class="modal-title"><?php echo app('translator')->get('Ajouter une Chronologie'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="container-fluid">
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'student_timeline_store',
                                            'method' => 'POST', 'enctype' => 'multipart/form-data', 'name' => 'document_upload'])); ?>

                        <div class="row">
                            <div class="col-lg-12">
                                <input type="hidden" name="student_id" value="<?php echo e($student_detail->id); ?>">
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <input class="primary-input form-control{" type="text" name="title" value=""
                                                   id="title" maxlength="200">
                                            <label><?php echo app('translator')->get('titre'); ?> <span>*</span> </label>
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
                                            <label><?php echo app('translator')->get('Date'); ?></label>
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
                                    <label><?php echo app('translator')->get('description'); ?><span></span> </label>
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
                                                   for="document_file_4"><?php echo app('translator')->get('feuilleter'); ?></label>
                                            <input type="file" class="d-none" name="document_file_4"
                                                   id="document_file_4">
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-30">

                                <input type="checkbox" id="currentAddressCheck" class="common-checkbox"
                                       name="visible_to_student" value="1">
                                <label for="currentAddressCheck"><?php echo app('translator')->get('Visible à cette personne'); ?></label>
                            </div>


                            <!-- <div class="col-lg-12 text-center mt-40">
                                <button class="primary-btn fix-gr-bg" id="save_button_sibling" type="button">
                                    <span class="ti-check"></span>
                                    save information
                                </button>
                            </div> -->
                            <div class="col-lg-12 text-center mt-40">
                                <div class="mt-40 d-flex justify-content-between">
                                    <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('Annuler'); ?></button>

                                    <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('enregistrer'); ?></button>
                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- timeline form modal end-->




<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\InfixEdu_v5\resources\views/backEnd/studentInformation/student_view.blade.php ENDPATH**/ ?>