
<div class="page-content">
    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title">View Product</h3>
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
                <a href="#">View Product</a>
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
                <div class="portlet-body">
                    <div id="table_slides_wrapper" class="dataTables_wrapper no-footer">
                        <div class="table-scrollable">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                                                                                            <tr>
                                            <th><?= __('Id') ?></th>
                                            <td><?= $this->Number->format($product->id) ?></td>
                                        </tr>
                                                                            <tr>
                                            <th><?= __('Type Id') ?></th>
                                            <td><?= $this->Number->format($product->type_id) ?></td>
                                        </tr>
                                                                            <tr>
                                            <th><?= __('Supplier Id') ?></th>
                                            <td><?= $this->Number->format($product->supplier_id) ?></td>
                                        </tr>
                                                                            <tr>
                                            <th><?= __('Amount') ?></th>
                                            <td><?= $this->Number->format($product->amount) ?></td>
                                        </tr>
                                                                                                                                                                                <tr>
                                            <th><?= __('Code') ?></th>
                                            <td><?= h($product->code) ?></td>
                                        </tr>
                                                                                                                                                <tr>
                                            <th><?= __('Name') ?></th>
                                            <td><?= h($product->name) ?></td>
                                        </tr>
                                                                                                                                                <tr>
                                            <th><?= __('Price') ?></th>
                                            <td><?= h($product->price) ?></td>
                                        </tr>
                                                                                                                                                <tr>
                                            <th><?= __('Brand') ?></th>
                                            <td><?= h($product->brand) ?></td>
                                        </tr>
                                                                                                                                                <tr>
                                            <th><?= __('Unit') ?></th>
                                            <td><?= h($product->unit) ?></td>
                                        </tr>
                                                                                                                                                                                <tr>
                                            <th><?= __('Created') ?></th>
                                            <td><?= h($product->created) ?></td>
                                        </tr>
                                                                            <tr>
                                            <th><?= __('Modified') ?></th>
                                            <td><?= h($product->modified) ?></td>
                                        </tr>
                                                                                                                                                                                                                <tr>
                                            <th><?= __('Description') ?></th>
                                            <td><?= $this->Text->autoParagraph(h($product->description)) ?></td>
                                        </tr>
                                                                                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
    <!-- END PAGE CONTENT-->
</div>