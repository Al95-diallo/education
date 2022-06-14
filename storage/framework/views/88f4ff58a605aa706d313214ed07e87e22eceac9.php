
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-40 white-box up_breadcrumb">
    <div class="container-fluid">
        <div class="row justify-content-between">

        <h1><?php echo app('translator')->get('lang.manage'); ?> <?php echo app('translator')->get('lang.admin_setup'); ?></h1>
        <div class="bc-pages">
            <a href="<?php echo e(url('dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
            <a href="#"><?php echo app('translator')->get('lang.admin_section'); ?></a>
            <a href="#"><?php echo app('translator')->get('lang.admin_setup'); ?></a>

        </div>
    </div>
</section>
<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
        <?php if(isset($admin_setup)): ?>
        <div class="row">
            <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                <a href="<?php echo e(url('setup-admin')); ?>" class="primary-btn small fix-gr-bg">
                    <span class="ti-plus pr-2"></span>
                    <?php echo app('translator')->get('lang.add'); ?>
                </a>
            </div>
        </div>
        <?php endif; ?>
        <div class="row">
           
            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-title">
                            <h3 class="mb-30"><?php if(isset($admin_setup)): ?>
                                    <?php echo app('translator')->get('lang.edit'); ?>

                                <?php else: ?>
                                    <?php echo app('translator')->get('lang.add'); ?>

                                <?php endif; ?>
                                <?php echo app('translator')->get('lang.admin_setup'); ?>
                            </h3>
                        </div>
                        <?php if(isset($admin_setup)): ?>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'setup-admin/'.@$admin_setup->id,
                        'method' => 'PUT'])); ?>

                        <?php else: ?>
                          <?php if(in_array(42, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'setup-admin',
                        'method' => 'POST'])); ?>

                        <?php endif; ?>
                        <?php endif; ?>
                        <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                        <div class="white-box">
                            <div class="add-visitor">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <?php if(session()->has('message-success')): ?>
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <?php echo e(session()->get('message-success')); ?>

                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <?php elseif(session()->has('message-danger')): ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <?php echo e(session()->get('message-danger')); ?>

                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <?php endif; ?>
                                        <select class="niceSelect w-100 bb form-control<?php echo e($errors->has('type') ? ' is-invalid' : ''); ?>"
                                            name="type">
                                            <option data-display="<?php echo app('translator')->get('lang.type'); ?> *" value=""><?php echo app('translator')->get('lang.type'); ?> *</option>
                                           
                                            <option value="1" <?php echo e(isset($admin_setup)? ($admin_setup->type == '1'? 'selected':''):''); ?>><?php echo app('translator')->get('lang.purpose'); ?></option>
                                            <option value="2" <?php echo e(isset($admin_setup)? ($admin_setup->type == '2'? 'selected':''):''); ?>><?php echo app('translator')->get('lang.complaint'); ?> <?php echo app('translator')->get('lang.type'); ?></option>
                                            <option value="3" <?php echo e(isset($admin_setup)? ($admin_setup->type == '3'? 'selected':''):''); ?>><?php echo app('translator')->get('lang.source'); ?></option>
                                            <option value="4" <?php echo e(isset($admin_setup)? ($admin_setup->type == '4'? 'selected':''):''); ?>><?php echo app('translator')->get('lang.reference'); ?></option>
                                           
                                        </select>
                                        <?php if($errors->has('type')): ?>
                                        <span class="invalid-feedback invalid-select" role="alert">
                                            <strong><?php echo e($errors->first('type')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="row  mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <input class="primary-input form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"
                                                type="text" name="name" maxlength="50" value="<?php echo e(isset($admin_setup)? $admin_setup->name: ''); ?>">
                                            <input type="hidden" name="id" value="<?php echo e(isset($admin_setup)? $admin_setup->id: ''); ?>">
                                            <label><?php echo app('translator')->get('lang.name'); ?> <span>*</span></label>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('name')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('name')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <textarea class="primary-input form-control" cols="0" rows="4" name="description"><?php echo e(isset($admin_setup)? $admin_setup->description: ''); ?></textarea>
                                            <label><?php echo app('translator')->get('lang.description'); ?> <span></span></label>
                                            <span class="focus-border textarea"></span>
                                        </div>
                                    </div>
                                </div>
                                    <?php 
                                  $tooltip = "";
                                  if(in_array(42, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ){
                                        $tooltip = "";
                                    }else{
                                        $tooltip = "You have no permission to add";
                                    }
                                ?>
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                        <button class="primary-btn fix-gr-bg" data-toggle="tooltip" title="<?php echo e(@$tooltip); ?>">
                                            <span class="ti-check"></span>
                                            <?php if(isset($admin_setup)): ?>
                                                <?php echo app('translator')->get('lang.update'); ?>
                                            <?php else: ?>
                                                <?php echo app('translator')->get('lang.save'); ?>
                                            <?php endif; ?>
                                           <?php echo app('translator')->get('lang.setup'); ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-4 no-gutters">
                        <div class="main-title">
                            <h3 class="mb-0"><?php echo app('translator')->get('lang.admin_setup'); ?> <?php echo app('translator')->get('lang.list'); ?></h3>
                        </div>
                    </div>
                </div>

                <div class="row base-setup mt-30">
                    <div class="col-lg-12">
                        <table class="display school-table school-table-data" cellspacing="0" width="100%">
                            <thead>
                                <?php if(session()->has('message-success-delete') != "" ||
                                session()->get('message-danger-delete') != ""): ?>
                                <tr>
                                    <td colspan="3">
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
                                    <th width="33%"><?php echo app('translator')->get('lang.type'); ?></th>
                                    <th width="33%"><?php echo app('translator')->get('lang.name'); ?></th>
                                    <th width="33%"><?php echo app('translator')->get('lang.actions'); ?></th>
                                </tr>
                            </thead>

                            <tbody>

                                <tr>
                                    <td colspan="3" class="pr-0">
                                        <div id="accordion" role="tablist">
                                            <?php $i = 0; ?>
                                            <?php $__currentLoopData = $admin_setups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="card">
                                                <div class="card-header d-flex justify-content-between" role="tab" id="headingOne<?php echo e($key); ?>">
                                                    <div class="row w-100 align-items-center">
                                                        <div class="col-lg-6">
                                                            <a data-toggle="collapse" href="#collapseOne<?php echo e($key); ?>" aria-expanded="true" aria-controls="collapseOne<?php echo e($key); ?>">
                                                            <?php

                                                            	if($key == 1){
                                                            		echo 'Purpose';
	                                                            }elseif($key == 2){
		                                                            echo 'Complaint Type';
		                                                        }elseif($key == 3){
		                                                            echo 'Source';
		                                                        }elseif($key == 4){
																	echo 'Reference';
		                                                        }



                                                            ?>
                                                            </a>
                                                        </div>
                                                        <div class="col-lg-6 text-right">
                                                            <a class="primary-btn icon-only tr-bg" data-toggle="collapse" href="#collapseOne<?php echo e($key); ?>" aria-expanded="true" aria-controls="collapseOne">
                                                                <span class="ti-arrow-down"></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                        
                                                <div id="collapseOne<?php echo e($key); ?>" class="collapse <?php echo e($i++ == 0? 'show':''); ?>" role="tabpanel" aria-labelledby="headingOne<?php echo e($key); ?>" data-parent="#accordion">
                                                    <div class="card-body">
                                                        <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin_setup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="row py-3 border-bottom align-items-center">
                                                            <div class="offset-lg-4 col-lg-4"><?php echo e(@$admin_setup->name); ?></div>
                                                            <div class="col-lg-4">
                                                                <div class="dropdown">
                                                                    <button type="button" class="btn dropdown-toggle"
                                                                        data-toggle="dropdown">
                                                                        <?php echo app('translator')->get('lang.select'); ?>
                                                                    </button>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <?php if(in_array(43, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                                                                       <a class="dropdown-item" href="<?php echo e(url('setup-admin', [@$admin_setup->id])); ?>"><?php echo app('translator')->get('lang.edit'); ?></a>
                                                                        <?php endif; ?>
                                                                         <?php if(in_array(44, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                                                                        <a class="dropdown-item deleteSetupAdminModal" href="#" data-toggle="modal" data-target="#deleteSetupAdminModal" data-id="<?php echo e(@$admin_setup->id); ?>"><?php echo app('translator')->get('lang.delete'); ?></a>
                                                                    <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            
                                        </div>
                                    </td> 
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<div class="modal fade admin-query" id="deleteSetupAdminModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo app('translator')->get('lang.delete'); ?> <?php echo app('translator')->get('lang.admin_setup'); ?></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="text-center">
                    <h4><?php echo app('translator')->get('lang.are_you_sure_to_delete'); ?></h4>
                </div>


                <div class="mt-40 d-flex justify-content-between">
                    <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('lang.cancel'); ?></button>
                    <a href="" class="primary-btn fix-gr-bg"><?php echo app('translator')->get('lang.delete'); ?></a>
                     
                </div>
            </div>

        </div>
    </div>
</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\InfixEdu_v5\resources\views/backEnd/admin/setup_admin.blade.php ENDPATH**/ ?>