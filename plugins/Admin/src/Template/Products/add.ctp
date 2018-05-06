<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $product
 */
?>
<div class="page-content products">
    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title">
        <?php echo __('Add Product')  ?>
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <?php echo $this->Html->link(__('Home'), ['controller' => 'Home', 'action' => 'index'],['escape' => false]); ?>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <?php echo $this->Html->link(__('List Products'), ['action' => 'index'],['escape' => false]) ?>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#"><?= __('Add Product') ?></a>
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

                    <?php echo  $this->Form->create($product, ['class' => 'form-horizontal','id'=>'add_product']); ?>
                    <div class="form-body">
                        <div class="form-group">
                            <?php echo $this->Form->label('code', mb_convert_case('code', MB_CASE_TITLE, "UTF-8"), ['for' => 'code', 'class' => 'col-md-3 control-label']); ?>
                            <div class="col-md-9">
                                <?php echo $this->Form->input('code',['class'=>'form-control','placeholder' => 'Code', 'label' => false]); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->label('name', mb_convert_case('name', MB_CASE_TITLE, "UTF-8"), ['for' => 'name', 'class' => 'col-md-3 control-label']); ?>
                            <div class="col-md-9">
                                <?php echo $this->Form->input('name',['class'=>'form-control','placeholder' => 'Name', 'label' => false]); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->label('type_id', mb_convert_case('type_id', MB_CASE_TITLE, "UTF-8"), ['for' => 'type_id', 'class' => 'col-md-3 control-label']); ?>
                            <div class="col-md-9">
                                <?php echo $this->Form->select('type_id',$product_types,['class'=>'form-control','placeholder' => 'Type Id', 'label' => false]); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->label('supplier_id', mb_convert_case('supplier_id', MB_CASE_TITLE, "UTF-8"), ['for' => 'supplier_id', 'class' => 'col-md-3 control-label']); ?>
                            <div class="col-md-9">
                                <?php echo $this->Form->select('supplier_id',$suppliers,['class'=>'form-control','placeholder' => 'Supplier Id', 'label' => false]); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->label('price', mb_convert_case('price', MB_CASE_TITLE, "UTF-8"), ['for' => 'price', 'class' => 'col-md-3 control-label']); ?>
                            <div class="col-md-9">
                                <?php echo $this->Form->input('price',['class'=>'form-control','placeholder' => 'Price', 'label' => false, 'id'=>'priceProduct_id']); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->label('brand', mb_convert_case('brand', MB_CASE_TITLE, "UTF-8"), ['for' => 'brand', 'class' => 'col-md-3 control-label']); ?>
                            <div class="col-md-9">
                                <?php echo $this->Form->input('brand',['class'=>'form-control','placeholder' => 'Brand', 'label' => false]); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->label('amount', mb_convert_case('amount', MB_CASE_TITLE, "UTF-8"), ['for' => 'amount', 'class' => 'col-md-3 control-label']); ?>
                            <div class="col-md-9">
                                <?php echo $this->Form->input('amount',['class'=>'form-control','placeholder' => 'Amount', 'label' => false]); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->label('unit', mb_convert_case('unit', MB_CASE_TITLE, "UTF-8"), ['for' => 'unit', 'class' => 'col-md-3 control-label']); ?>
                            <div class="col-md-9">
                                <?php echo $this->Form->input('unit',['class'=>'form-control','placeholder' => 'Unit', 'label' => false]); ?>
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

