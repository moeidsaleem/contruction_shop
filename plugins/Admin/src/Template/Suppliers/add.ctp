<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $supplier
 */
?>
<div class="page-content suppliers">
    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title">
        <?php echo __('Add Supplier')  ?>
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <?php echo $this->Html->link(__('Home'), ['controller' => 'Home', 'action' => 'index'],['escape' => false]); ?>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <?php echo $this->Html->link(__('List Suppliers'), ['action' => 'index'],['escape' => false]) ?>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#"><?= __('Add Supplier') ?></a>
            </li>
        </ul>
    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <?php echo $this->Flash->render(); ?>
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box grey-cascade">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-globe"></i><?php echo __('Managed Table') ?>
                    </div>
                </div>
                <div class="portlet-body form">

                    <?php echo  $this->Form->create($supplier, ['class' => 'form-horizontal','id'=>'add_supplier']); ?>
                    <div class="form-body">
                                                                    <div class="form-group">
                                                <?php echo $this->Form->label('name', mb_convert_case('name', MB_CASE_TITLE, "UTF-8"), ['for' => 'name', 'class' => 'col-md-3 control-label']); ?>
                                                <div class="col-md-9">
                                                    <?php echo $this->Form->input('name',['class'=>'form-control','placeholder' => 'Name', 'label' => false]); ?>
                                                </div>
                                            </div>
                                                                                    <div class="form-group">
                                                <?php echo $this->Form->label('address', mb_convert_case('address', MB_CASE_TITLE, "UTF-8"), ['for' => 'address', 'class' => 'col-md-3 control-label']); ?>
                                                <div class="col-md-9">
                                                    <?php echo $this->Form->input('address',['class'=>'form-control','placeholder' => 'Address', 'label' => false]); ?>
                                                </div>
                                            </div>
                                                                                    <div class="form-group">
                                                <?php echo $this->Form->label('phone', mb_convert_case('phone', MB_CASE_TITLE, "UTF-8"), ['for' => 'phone', 'class' => 'col-md-3 control-label']); ?>
                                                <div class="col-md-9">
                                                    <?php echo $this->Form->input('phone',['class'=>'form-control','placeholder' => 'Phone', 'label' => false, 'id'=>'phoneSupplier_id']); ?>
                                                </div>
                                            </div>
                                                                                    <div class="form-group">
                                                <?php echo $this->Form->label('description', mb_convert_case('description', MB_CASE_TITLE, "UTF-8"), ['for' => 'description', 'class' => 'col-md-3 control-label']); ?>
                                                <div class="col-md-9">
                                                    <?php echo $this->Form->input('description',['class'=>'form-control','placeholder' => 'Description', 'label' => false]); ?>
                                                </div>
                                            </div>
                                                            </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <?php echo $this->Form->button(__('Submit'), ['class' => 'btn green']) ?>
                                <?php echo $this->Html->link(__('Cancel'), ['action' => 'index'],['escape' => false, 'class' => 'btn default']) ?>
                            </div>
                        </div>
                    </div>
                    <?php echo $this->Form->end() ?>

                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
    <!-- END PAGE CONTENT-->
</div>
