
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('lang.about'); ?>  <?php echo app('translator')->get('lang.system'); ?> </h1>
                <div class="bc-pages">
                    <a href="<?php echo e(url('dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('lang.system_settings'); ?></a>
                    <a href="#"><?php echo app('translator')->get('lang.about'); ?>  <?php echo app('translator')->get('lang.system'); ?> </a>
                </div>
            </div>
        </div>
    </section>   

    <section class="admin-visitor-area up_admin_visitor empty_table_tab">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12">
                            <div class="white-box">
                                <h1><?php echo app('translator')->get('lang.about'); ?>  <?php echo app('translator')->get('lang.system'); ?> </h1>
                                <div class="add-visitor">
                                    <table style="width:100%; box-shadow: none;" class="display school-table school-table-style">
                                        <?php 
                                            @$data = DB::table('sm_general_settings')->first();
                                        ?>
                                        <tr>
                                            <td>Software Version</td>
                                            <td><?php echo e(@$data->software_version); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Check update</td>
                                            <td><a href="https://codecanyon.net/user/codethemes/portfolio" target="_blank"> <i class="ti-new-window"> </i> Update </a> </td>
                                        </tr> 
                                        <tr>
                                            <td> PHP Version</td>
                                            <td><?php echo e(phpversion()); ?></td>
                                        </tr>
                                        <tr>
                                            <td> Curl enable</td>
                                            <td><?php
                                            if  (in_array  ('curl', get_loaded_extensions())) {
                                                echo 'enable';
                                            }
                                            else {
                                                echo 'disable';
                                            }
                                            ?></td>
                                        </tr>
                           
                                        
                                        <tr>
                                            <td> Purchase code</td>
                                            <td><?php echo e(__('Verified')); ?></td>
                                        </tr>
                           

                                        <tr>
                                            <td> Install Domain</td>
                                            <td><?php echo e(@$data->system_domain); ?></td>
                                        </tr>

                                        <tr>
                                            <td> System Activated Date</td>
                                            <td><?php echo e(@$data->system_activated_date); ?></td>
                                        </tr>

                                    </table>
                                </div>
                            </div>

                </div>
            </div>
        </div>
    </section>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script language="JavaScript">

        $('#selectAll').click(function () {
            $('input:checkbox').prop('checked', this.checked);

        });


    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\InfixEdu_v5\resources\views/backEnd/systemSettings/aboutSystem.blade.php ENDPATH**/ ?>