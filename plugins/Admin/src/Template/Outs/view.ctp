
<div class="page-content">
    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title">View Out</h3>
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
                <a href="#">View Out</a>
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
                                            <td><?= $this->Number->format($out->id) ?></td>
                                        </tr>
                                                                            <tr>
                                            <th><?= __('Client Id') ?></th>
                                            <td><?= $this->Number->format($out->client_id) ?></td>
                                        </tr>
                                                                            <tr>
                                            <th><?= __('Total Cost') ?></th>
                                            <td><?= $this->Number->format($out->total_cost) ?></td>
                                        </tr>
                                                                            <tr>
                                            <th><?= __('Paid') ?></th>
                                            <td><?= $this->Number->format($out->paid) ?></td>
                                        </tr>
                                                                            <tr>
                                            <th><?= __('Remained') ?></th>
                                            <td><?= $this->Number->format($out->remained) ?></td>
                                        </tr>
                                                                                                                                                                                                                <tr>
                                            <th><?= __('Created') ?></th>
                                            <td><?= h($out->created) ?></td>
                                        </tr>
                                                                            <tr>
                                            <th><?= __('Modified') ?></th>
                                            <td><?= h($out->modified) ?></td>
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