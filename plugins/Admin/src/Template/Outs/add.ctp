<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $out
 */
?>
<div class="page-content outs">
    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title">
        <?php echo __('Add Out')  ?>
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <?php echo $this->Html->link(__('Home'), ['controller' => 'Home', 'action' => 'index'],['escape' => false]); ?>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <?php echo $this->Html->link(__('List Outs'), ['action' => 'index'],['escape' => false]) ?>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#"><?= __('Add Out') ?></a>
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

                    <?php echo  $this->Form->create($out, ['class' => 'form-horizontal']); ?>
                    <div class="form-body">
                                                                    <div class="form-group">
                                                <?php echo $this->Form->label('client_id', mb_convert_case('client_id', MB_CASE_TITLE, "UTF-8"), ['for' => 'client_id', 'class' => 'col-md-3 control-label']); ?>
                                                <div class="col-md-9">
                                                    <?php echo $this->Form->select('client_id',$clients_list,['class'=>'form-control','placeholder' => 'Client Id', 'label' => false]); ?>
                                                </div>
                                            </div>
                                                                                    <div class="form-group">
                                                <?php echo $this->Form->label('total_cost', mb_convert_case('total_cost', MB_CASE_TITLE, "UTF-8"), ['for' => 'total_cost', 'class' => 'col-md-3 control-label']); ?>
                                                <div class="col-md-9">
                                                    <?php echo $this->Form->input('total_cost',['class'=>'form-control','placeholder' => 'Total Cost', 'label' => false]); ?>
                                                </div>
                                            </div>
                                                                                    <div class="form-group">
                                                <?php echo $this->Form->label('paid', mb_convert_case('paid', MB_CASE_TITLE, "UTF-8"), ['for' => 'paid', 'class' => 'col-md-3 control-label']); ?>
                                                <div class="col-md-9">
                                                    <?php echo $this->Form->input('paid',['class'=>'form-control','placeholder' => 'Paid', 'label' => false]); ?>
                                                </div>
                                            </div>
                                                                                    <div class="form-group">
                                                <?php echo $this->Form->label('remained', mb_convert_case('remained', MB_CASE_TITLE, "UTF-8"), ['for' => 'remained', 'class' => 'col-md-3 control-label']); ?>
                                                <div class="col-md-9">
                                                    <?php echo $this->Form->input('remained',['class'=>'form-control','placeholder' => 'Remained', 'label' => false]); ?>
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
