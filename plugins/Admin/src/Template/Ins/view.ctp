
<div class="page-content">
    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title">View In</h3>
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
                <a href="#">View In</a>
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
                                            <td><?= $this->Number->format($in->id) ?></td>
                                        </tr>
                                                                            <tr>
                                            <th><?= __('Product Id') ?></th>
                                            <td><?= $this->Number->format($in->product_id) ?></td>
                                        </tr>
                                                                            <tr>
                                            <th><?= __('Supplier Id') ?></th>
                                            <td><?= $this->Number->format($in->supplier_id) ?></td>
                                        </tr>
                                                                            <tr>
                                            <th><?= __('Amount') ?></th>
                                            <td><?= $this->Number->format($in->amount) ?></td>
                                        </tr>
                                                                            <tr>
                                            <th><?= __('Cost Per Unit') ?></th>
                                            <td><?= $this->Number->format($in->cost_per_unit) ?></td>
                                        </tr>
                                                                            <tr>
                                            <th><?= __('Total Cost') ?></th>
                                            <td><?= $this->Number->format($in->total_cost) ?></td>
                                        </tr>
                                                                                                                                                                                                                <tr>
                                            <th><?= __('Created') ?></th>
                                            <td><?= h($in->created) ?></td>
                                        </tr>
                                                                            <tr>
                                            <th><?= __('Modified') ?></th>
                                            <td><?= h($in->modified) ?></td>
                                        </tr>
                                                                                                                                                                                                                <tr>
                                            <th><?= __('Description') ?></th>
                                            <td><?= $this->Text->autoParagraph(h($in->description)) ?></td>
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