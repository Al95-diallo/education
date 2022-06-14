
<?php $__env->startSection('mainContent'); ?>

<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.custom_result_setting'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.system_settings'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.custom_result_setting'); ?></a>
            </div>
        </div>
    </div>
</section>

<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
      
        <div class="row">
            <?php
                @$system_setting=App\SmGeneralSettings::find(1);
                @$system_setting=$system_setting->session_id;

                @$check_exist=App\CustomResultSetting::where('academic_year','=',@$system_setting)->first();
            ?>
            <?php if($check_exist=='' || $result_setting!=''): ?>
                
            
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-title">
                            <h3 class="mb-30"><?php if(isset($result_setting)): ?>
                                    <?php echo app('translator')->get('lang.edit'); ?>
                                <?php else: ?>
                                    <?php echo app('translator')->get('lang.add'); ?>
                                <?php endif; ?>
                                <?php echo app('translator')->get('lang.custom_result_setting'); ?>
                            </h3>
                        </div>
                        <?php if(isset($result_setting)): ?>
                            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'custom-result-setting/update/'.@$result_setting->id, 'method' => 'PUT', 'enctype' => 'multipart/form-data'])); ?>

                        <?php else: ?>
                            <?php if(in_array(437, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ): ?>
                                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'custom-result-setting/store','method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                            <?php endif; ?>
                        <?php endif; ?>
                        <div class="white-box">
                            <div class="add-visitor">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <?php if(session()->has('message-success')): ?>
                                        <div class="alert alert-success">
                                            <?php echo e(session()->get('message-success')); ?>

                                        </div>
                                        <?php elseif(session()->has('message-danger')): ?>
                                        <div class="alert alert-danger">
                                            <?php echo e(session()->get('message-danger')); ?>

                                        </div>
                                        <?php endif; ?>
                                       
                                        
                                    </div>
                                </div>

                                <div class="row ">
                                    
                                    <div class="col-lg-6 ">
                                    <select class="w-100 bb niceSelect form-control<?php echo e($errors->has('exam_term1') ? ' is-invalid' : ''); ?>" name="exam_term1">
                                        <option data-display="<?php echo app('translator')->get('lang.select'); ?> <?php echo app('translator')->get('lang.first_term'); ?>*" value=""><?php echo app('translator')->get('lang.select'); ?> <?php echo app('translator')->get('lang.first_term'); ?> *</option>
                                        <?php $__currentLoopData = $exams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($exam->id); ?>" <?php echo e(isset($result_setting)? (@$result_setting->exam_term_id1 == $exam->id? 'selected':''):''); ?>><?php echo e(@$exam->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('exam_term1')): ?>
                                    <span class="invalid-feedback invalid-select" role="alert">
                                        <strong><?php echo e($errors->first('exam_term1')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-effect">
                                            <input class="primary-input form-control<?php echo e($errors->has('percentage_ex_1') ? ' is-invalid' : ''); ?>"
                                                type="number" name="percentage_ex_1" autocomplete="off" value="<?php echo e(isset($result_setting)? @$result_setting->percentage1:old('percentage_ex_1')); ?>">
                                            <input type="hidden" name="id" value="<?php echo e(isset($result_setting)? @$result_setting->percentage1: ''); ?>">
                                            <label> <?php echo app('translator')->get('lang.first_term'); ?> <?php echo app('translator')->get('lang.percentage'); ?><span>*</span></label>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('percentage_ex_1')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('percentage_ex_1')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-lg-6 ">
                                    <select class="w-100 bb niceSelect form-control<?php echo e($errors->has('exam_term2') ? ' is-invalid' : ''); ?>" name="exam_term2">
                                        <option data-display="<?php echo app('translator')->get('lang.select'); ?> <?php echo app('translator')->get('lang.second_term'); ?>*" value=""><?php echo app('translator')->get('lang.select'); ?> <?php echo app('translator')->get('lang.second_term'); ?> *</option>
                                        <?php $__currentLoopData = $exams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($exam->id); ?>" <?php echo e(isset($result_setting)? (@$result_setting->exam_term_id2 == @$exam->id? 'selected':''):''); ?>><?php echo e(@$exam->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('exam_term2')): ?>
                                    <span class="invalid-feedback invalid-select" role="alert">
                                        <strong><?php echo e($errors->first('exam_term2')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-effect">
                                            <input class="primary-input form-control<?php echo e($errors->has('percentage_ex_2') ? ' is-invalid' : ''); ?>"
                                                type="number" name="percentage_ex_2" autocomplete="off" value="<?php echo e(isset($result_setting)? @$result_setting->percentage2:old('percentage_ex_2')); ?>">
                                            <input type="hidden" name="id" value="<?php echo e(isset($result_setting)? @$result_setting->percentage2: ''); ?>">
                                            <label> <?php echo app('translator')->get('lang.second_term'); ?> <?php echo app('translator')->get('lang.percentage'); ?><span>*</span></label>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('percentage_ex_2')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('percentage_ex_2')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-lg-6 ">
                                    <select class="w-100 bb niceSelect form-control<?php echo e($errors->has('exam_term3') ? ' is-invalid' : ''); ?>" name="exam_term3">
                                        <option data-display="<?php echo app('translator')->get('lang.select'); ?> <?php echo app('translator')->get('lang.third_term'); ?>*" value=""><?php echo app('translator')->get('lang.select'); ?> <?php echo app('translator')->get('lang.third_term'); ?> *</option>
                                        <?php $__currentLoopData = $exams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e(@$exam->id); ?>" <?php echo e(isset($result_setting)? (@$result_setting->exam_term_id3 == @$exam->id? 'selected':''):''); ?>><?php echo e(@$exam->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('exam_term3')): ?>
                                    <span class="invalid-feedback invalid-select" role="alert">
                                        <strong><?php echo e($errors->first('exam_term3')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-effect">
                                            <input class="primary-input form-control<?php echo e($errors->has('percentage_ex_3') ? ' is-invalid' : ''); ?>"
                                                type="number" name="percentage_ex_3" autocomplete="off" value="<?php echo e(isset($result_setting)? @$result_setting->percentage3:old('percentage_ex_3')); ?>">
                                            <input type="hidden" name="id" value="<?php echo e(isset($academic_year)? @$academic_year->id: ''); ?>">
                                            <label> <?php echo app('translator')->get('lang.third_term'); ?> <?php echo app('translator')->get('lang.percentage'); ?><span>*</span></label>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('percentage_ex_3')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('percentage_ex_3')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                

                               
                               
                               <?php 
                                    $tooltip = "";
                                    if(in_array(437, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ){
                                            $tooltip = "";
                                        }else{
                                            $tooltip = "You have no permission to add";
                                        }
                                ?>
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                        <button class="primary-btn fix-gr-bg" data-toggle="tooltip" title="<?php echo e(@$tooltip); ?>">
                                            <span class="ti-check"></span>
                                            <?php if(isset($result_setting)): ?>
                                                <?php echo app('translator')->get('lang.update'); ?>
                                            <?php else: ?>
                                                <?php echo app('translator')->get('lang.save'); ?>
                                            <?php endif; ?>

                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
            <?php endif; ?>
            <div class="col-lg-12 mt-20">
                <div class="row">
                    <div class="col-lg-4 no-gutters">
                        <div class="main-title">
                            <h3 class="mb-0">  <?php echo app('translator')->get('lang.custom_result_setting'); ?></h3>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">

                        <table id="table_id" class="display school-table" cellspacing="0" width="100%">

                            <thead>
                                <?php if(session()->has('message-success-delete') != "" ||
                                session()->get('message-danger-delete') != ""): ?>
                                <tr>
                                    <td colspan="6">
                                        <?php if(session()->has('message-success-delete')): ?>
                                        <div class="alert alert-success">
                                            <?php echo e(session()->get('message-success-delete')); ?>

                                        </div>
                                        <?php elseif(session()->has('message-danger-delete')): ?>
                                        <div class="alert alert-danger">
                                            <?php echo e(session()->get('message-danger-delete')); ?>

                                        </div>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endif; ?>
                                <tr>
                                    <th><?php echo app('translator')->get('lang.exam'); ?> <?php echo app('translator')->get('lang.term'); ?></th>
                                    <th><?php echo app('translator')->get('lang.percentage'); ?></th>
                                    <th><?php echo app('translator')->get('lang.exam'); ?> <?php echo app('translator')->get('lang.term'); ?></th>
                                    <th><?php echo app('translator')->get('lang.percentage'); ?></th>
                                    <th><?php echo app('translator')->get('lang.exam'); ?> <?php echo app('translator')->get('lang.term'); ?></th>
                                    <th><?php echo app('translator')->get('lang.percentage'); ?></th>
                                    <th><?php echo app('translator')->get('lang.action'); ?></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $custom_settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $custom_setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(@$custom_setting->exam_1); ?></td>
                                    <td><?php echo e(@$custom_setting->percentage1); ?>%</td>
                                    <td><?php echo e(@$custom_setting->exam_2); ?></td>
                                    <td><?php echo e(@$custom_setting->percentage2); ?>%</td>
                                    <td><?php echo e(@$custom_setting->exam_3); ?></td>
                                    <td><?php echo e(@$custom_setting->percentage3); ?>%</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                <?php echo app('translator')->get('lang.select'); ?>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <?php if(in_array(438, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ): ?>
                                                <a class="dropdown-item" href="<?php echo e(url('custom-result-setting/edit', [@$custom_setting->id])); ?>"><?php echo app('translator')->get('lang.edit'); ?></a>
                                                <?php endif; ?>
                                                <?php if(in_array(438, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ): ?>
                                                <a class="dropdown-item" data-toggle="modal" data-target="#deleteAcademicYearModal<?php echo e(@$custom_setting->id); ?>"
                                                    href="#"><?php echo app('translator')->get('lang.delete'); ?></a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                               <!--  -->

                                <div class="modal fade admin-query" id="deleteAcademicYearModal<?php echo e(@$custom_setting->id); ?>" >
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title"><?php echo app('translator')->get('lang.delete'); ?> <?php echo app('translator')->get('lang.academic_year'); ?></h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="text-center">
                                                    <h4><?php echo app('translator')->get('lang.are_you_sure_to_delete'); ?></h4>
                                                </div>

                                                <div class="mt-40 d-flex justify-content-between">
                                                    <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('lang.cancel'); ?></button>
                                                     
                                                    <?php echo e(Form::open(['url' => 'custom-result-setting/'.@$custom_setting->id, 'method' => 'DELETE', 'enctype' => 'multipart/form-data'])); ?>

                                                 <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('lang.delete'); ?></button>
                                                 <?php echo e(Form::close()); ?>

                                                     
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
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\InfixEdu_v5\resources\views/backEnd/systemSettings/custom_result_setting_add.blade.php ENDPATH**/ ?>