
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('Catégories de frais'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('dashboard')); ?>"><?php echo app('translator')->get('Tableau de bord'); ?></a>
                <a href="#"><?php echo app('translator')->get('Collection de frais'); ?></a>
                <a href="#"><?php echo app('translator')->get('Catégories de frais'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
        <?php if(isset($fees_group)): ?>
         <?php if(in_array(124, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ): ?>
                       
        <div class="row">
            <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                <a href="<?php echo e(url('fees-group')); ?>" class="primary-btn small fix-gr-bg">
                    <span class="ti-plus pr-2"></span>
                    <?php echo app('translator')->get('Ajouter'); ?>
                </a>
            </div>
        </div>
        <?php endif; ?>
        <?php endif; ?>
        <div class="row">
          

            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-title">
                            <h3 class="mb-30">
                                <?php if(isset($fees_group)): ?>
                                    <?php echo app('translator')->get('Modifier'); ?>
                                <?php else: ?>
                                    <?php echo app('translator')->get('Ajouter une'); ?>
                                <?php endif; ?>
                                <?php echo app('translator')->get('Catégories de frais'); ?>
                            </h3>
                        </div>
                        <?php if(isset($fees_group)): ?>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'fees_group_update',
                        'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <?php else: ?>
                          <?php if(in_array(124, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ): ?>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'fees_group_store',
                        'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <?php endif; ?>
                        <?php endif; ?>
                        <div class="white-box">
                            <div class="add-visitor">
                                <div class="row  mt-25">
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
                                        <div class="input-effect">
                                            <input class="primary-input form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"
                                                type="text" name="name" autocomplete="off" value="<?php echo e(isset($fees_group)? $fees_group->name: old('name')); ?>">
                                            <input type="hidden" name="id" value="<?php echo e(isset($fees_group)? $fees_group->id: ''); ?>">
                                            <label><?php echo app('translator')->get('Nom_categorie'); ?> <span>*</span></label>
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
                                            <textarea class="primary-input form-control" cols="0" rows="4"
                                                name="description"><?php echo e(isset($fees_group)? $fees_group->description: old('description')); ?></textarea>
                                                <label><?php echo app('translator')->get('description'); ?></label>
                                            <span class="focus-border textarea"></span>
                                        </div>
                                    </div>
                                </div>
                                  <?php 
                                  $tooltip = "";
                                  if(in_array(124, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ){
                                        $tooltip = "";
                                    }else{
                                        $tooltip = "You have no permission to add";
                                    }
                                ?>
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                        <button class="primary-btn fix-gr-bg" data-toggle="tooltip" title="<?php echo e($tooltip); ?>">
                                            <span class="ti-check"></span>
                                            <?php if(isset($fees_group)): ?>
                                                <?php echo app('translator')->get('Mise à jour'); ?>
                                            <?php else: ?>
                                                <?php echo app('translator')->get('Enregistrer'); ?>
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

           
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-4 no-gutters">
                        <div class="main-title">
                            <h3 class="mb-0"> <?php echo app('translator')->get('Liste de categorie de frais'); ?></h3>
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
                                    <td colspan="2">
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
                                    <th> <?php echo app('translator')->get('nom_catégories'); ?></th>
                                    <th> <?php echo app('translator')->get('Description'); ?></th>
                                    <th> <?php echo app('translator')->get('action'); ?></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $fees_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fees_group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(@$fees_group->name); ?></td>
                                    <td><?php echo e(@$fees_group->description); ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                <?php echo app('translator')->get('selectionnez'); ?>
                                            </button>
                                         
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <?php if(in_array(125, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ): ?>

                                                <a class="dropdown-item" href="<?php echo e(route('fees_group_edit', [$fees_group->id])); ?>"> <?php echo app('translator')->get('modifier'); ?></a>
                                                <?php endif; ?>
                                                <?php if(in_array(126, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ): ?>
                                                <a class="dropdown-item deleteFeesGroupModal" data-toggle="modal" data-target="#deleteFeesGroupModal"
                                                    href="#" data-id="<?php echo e($fees_group->id); ?>"><?php echo app('translator')->get('Supprimer'); ?></a>
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

<div class="modal fade admin-query" id="deleteFeesGroupModal" >
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> <?php echo app('translator')->get('Supprimer une Catégories de frais'); ?></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="text-center">
                    <h4> <?php echo app('translator')->get('este-vous sur de vouloir supprimer'); ?></h4>
                </div>

                <div class="mt-40 d-flex justify-content-between">
                    <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('Annuler'); ?></button>
                     <?php echo e(Form::open(['route' => 'fees_group_delete', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                     <input type="hidden" name="id" id="fees_group_id">
                    <button class="primary-btn fix-gr-bg" type="submit"> <?php echo app('translator')->get('Supprimer'); ?></button>
                     <?php echo e(Form::close()); ?>

                </div>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\InfixEdu_v5\resources\views/backEnd/feesCollection/fees_group.blade.php ENDPATH**/ ?>