
<?php $__env->startSection('mainContent'); ?>

<?php
function showPicName($data){
@$name = explode('/', $data);
return @$name[3];
}
?>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.weekend'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.system_settings'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.weekend'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-title">
                            <h3 class="mb-30"><?php if(isset($editData)): ?>
                                    <?php echo app('translator')->get('lang.edit'); ?>
                                <?php else: ?>
                                    <?php echo app('translator')->get('lang.add'); ?>
                                <?php endif; ?>
                                <?php echo app('translator')->get('lang.weekend'); ?>
                            </h3>
                        </div>
                        <?php if(isset($editData)): ?>
                            <?php if(in_array(450, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ): ?>
                            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'weekend/'.@$editData->id, 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'id' => 'weekendForm'])); ?>

                                        <input type="hidden" name="id" value="<?php echo e(@$editData->id); ?>">
                            <?php endif; ?>
                       
                        <div class="white-box">
                            <div class="add-visitor">
                                <div class="row">
                                    <?php if(session()->has('message-success')): ?>
                                    <div class="alert alert-success">
                                        <?php echo e(session()->get('message-success')); ?>

                                    </div>
                                    <?php elseif(session()->has('message-danger')): ?>
                                    <div class="alert alert-danger">
                                        <?php echo e(session()->get('message-danger')); ?>

                                    </div>
                                    <?php endif; ?>
                                    <div class="col-lg-12 mb-20 mt-10 <?php echo e(!isset($editData)? 'disabledbutton':''); ?>">
                                        <div class="input-effect">
                                            <input class="primary-input form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"
                                            type="text" name="name" autocomplete="off" value="<?php echo e(isset($editData)? @$editData->name : ''); ?>" readonly="true">
                                            <label><?php echo app('translator')->get('lang.title'); ?> <span>*</span> </label>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('name')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('name')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">

                                </div>


                                <div class="row mt-25 <?php echo e(!isset($editData)? 'disabledbutton':''); ?>">
                                    <div class="col-lg-12"> 
                                        <div class="input-effect">
                                            <input type="checkbox" id="weekend" value="1" class="common-checkbox" name="make_weekend" value="" <?php echo e(isset($editData)?(@$editData->is_weekend == 1? 'checked':''):''); ?>>
                                            <label for="weekend"><?php echo app('translator')->get('lang.weekend'); ?></label>
                                        </div>
                                    </div>
                                </div>


                                
                                <div class="row mt-40 <?php echo e(!isset($editData)? 'disabledbutton':''); ?>">
                                    <div class="col-lg-12 text-center">
                                        <button class="primary-btn fix-gr-bg">
                                            <span class="ti-check"></span>

                                            <?php if(isset($editData)): ?>
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

                        <?php else: ?>
                        <?php if(in_array(450, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ): ?>
                            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'weekend/', 'method' => 'post', 'enctype' => 'multipart/form-data', 'id' => 'weekendForm'])); ?>

                                        
                            <?php endif; ?>
                       
                        <div class="white-box">
                            <div class="add-visitor">
                                <div class="row">
                                    <?php if(session()->has('message-success')): ?>
                                    <div class="alert alert-success">
                                        <?php echo e(session()->get('message-success')); ?>

                                    </div>
                                    <?php elseif(session()->has('message-danger')): ?>
                                    <div class="alert alert-danger">
                                        <?php echo e(session()->get('message-danger')); ?>

                                    </div>
                                    <?php endif; ?>
                                    <div class="col-lg-12 mb-20 mt-10">
                                        <div class="input-effect">
                                            <input class="primary-input form-control<?php echo e($errors->has('holiday_title') ? ' is-invalid' : ''); ?>"
                                            type="text" name="name" autocomplete="off" value="" >
                                            <label><?php echo app('translator')->get('lang.title'); ?> <span>*</span> </label>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('name')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('name')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">

                                </div>


                                <div class="row mt-25">
                                    <div class="col-lg-12"> 
                                        <div class="input-effect">
                                            <input type="checkbox" id="weekend" value="1" class="common-checkbox" name="make_weekend" value="">
                                            <label for="weekend"><?php echo app('translator')->get('lang.weekend'); ?></label>
                                        </div>
                                    </div>
                                </div>


                                
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                        <button class="primary-btn fix-gr-bg">
                                            <span class="ti-check"></span>

                                            <?php if(isset($editData)): ?>
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


                        <?php endif; ?>

                    </div>
                </div>
            </div>

            <div class="col-lg-9">
              <div class="row">
                <div class="col-lg-4 no-gutters">
                    <div class="main-title mt_4">
                        <h3 class="mb-30"><?php echo app('translator')->get('lang.day_list'); ?></h3>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-12">
                    <table id="" class="display school-table school-table-style" cellspacing="0" width="100%">

                        <thead>
                            <?php if(session()->has('message-success-delete') != "" ||
                                session()->get('message-danger-delete') != ""): ?>
                                <tr>
                                    <td colspan="5">
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
                            <th><?php echo app('translator')->get('lang.name'); ?></th>
                            <th><?php echo app('translator')->get('lang.weekend'); ?></th>
                            <th><?php echo app('translator')->get('lang.action'); ?></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $__currentLoopData = $weekends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $weekend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(@$weekend->name); ?></td>
                            <td>
                                <?php if(@$weekend->is_weekend == 1): ?>
                                <button class="primary-btn small fix-gr-bg">
                                    yes
                                </button>
                                <?php else: ?>
                                    <?php echo e('No'); ?>

                                <?php endif; ?>


                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                        <?php echo app('translator')->get('lang.select'); ?>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <?php if(in_array(449, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ): ?>
                                        <a class="dropdown-item" href="<?php echo e(url('weekend/'.@$weekend->id.'/edit')); ?>"><?php echo app('translator')->get('lang.edit'); ?></a>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </td>
                        </tr>
                
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

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\InfixEdu_v5\resources\views/backEnd/systemSettings/weekend.blade.php ENDPATH**/ ?>