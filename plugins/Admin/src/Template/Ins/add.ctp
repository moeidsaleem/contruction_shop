<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $in
 */
?>
<div class="page-content ins">
    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title">
        <?php echo __('Add In')  ?>
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <?php echo $this->Html->link(__('Home'), ['controller' => 'Home', 'action' => 'index'],['escape' => false]); ?>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <?php echo $this->Html->link(__('List Ins'), ['action' => 'index'],['escape' => false]) ?>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#"><?= __('Add In') ?></a>
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

                    <?php echo  $this->Form->create($in, ['class' => 'form-horizontal','id'=>'add_ins']); ?>
                    <div class="form-body">
                                                                    <div class="form-group">
                                                <?php echo $this->Form->label('product_id', mb_convert_case('product_id', MB_CASE_TITLE, "UTF-8"), ['for' => 'product_id', 'class' => 'col-md-3 control-label']); ?>
                                                <div class="col-md-9">
                                                    <?php echo $this->Form->select('product_id',$products,['class'=>'form-control','placeholder' => 'Product Id', 'label' => false]); ?>
                                                </div>
                                            </div>
                                                                                    <div class="form-group">
                                                <?php echo $this->Form->label('supplier_id', mb_convert_case('supplier_id', MB_CASE_TITLE, "UTF-8"), ['for' => 'supplier_id', 'class' => 'col-md-3 control-label']); ?>
                                                <div class="col-md-9">
                                                    <?php echo $this->Form->select('supplier_id',$suppliers,['class'=>'form-control','placeholder' => 'Supplier Id', 'label' => false]); ?>
                                                </div>
                                            </div>
                                                                                    <div class="form-group">
                                                <?php echo $this->Form->label('amount', mb_convert_case('amount', MB_CASE_TITLE, "UTF-8"), ['for' => 'amount', 'class' => 'col-md-3 control-label']); ?>
                                                <div class="col-md-9">
                                                    <?php echo $this->Form->input('amount',['class'=>'form-control','placeholder' => 'Amount', 'label' => false]); ?>
                                                </div>
                                            </div>
                                                                                    <div class="form-group">
                                                <?php echo $this->Form->label('cost_per_unit', mb_convert_case('cost_per_unit', MB_CASE_TITLE, "UTF-8"), ['for' => 'cost_per_unit', 'class' => 'col-md-3 control-label']); ?>
                                                <div class="col-md-9">
                                                    <?php echo $this->Form->input('cost_per_unit',['class'=>'form-control','placeholder' => 'Cost Per Unit', 'label' => false]); ?>
                                                </div>
                                            </div>
                                                                                    <div class="form-group">
                                                <?php echo $this->Form->label('total_cost', mb_convert_case('total_cost', MB_CASE_TITLE, "UTF-8"), ['for' => 'total_cost', 'class' => 'col-md-3 control-label']); ?>
                                                <div class="col-md-9">
                                                    <?php echo $this->Form->input('total_cost',['class'=>'form-control','placeholder' => 'Total Cost', 'label' => false]); ?>
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
