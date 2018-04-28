
<div class="page-content">
    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title">View Client</h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <?php echo $this->Html->link(__('Home'), ['controller' => 'Home', 'action' => 'index'],['escape' => false]); ?>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <?php echo $this->Html->link(__('List Clients'), ['action' => 'index'],['escape' => false]) ?>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">View Client</a>
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
                                            <td><?= $this->Number->format($client->id) ?></td>
                                        </tr>
                                                                            <tr>
                                            <th><?= __('Phone') ?></th>
                                            <td><?= $this->Number->format($client->phone) ?></td>
                                        </tr>
                                                                            <tr>
                                            <th><?= __('Debt Amount') ?></th>
                                            <td><?= $this->Number->format($client->debt_amount) ?></td>
                                        </tr>
                                                                                                                                                                                <tr>
                                            <th><?= __('Code') ?></th>
                                            <td><?= h($client->code) ?></td>
                                        </tr>
                                                                                                                                                <tr>
                                            <th><?= __('Name') ?></th>
                                            <td><?= h($client->name) ?></td>
                                        </tr>
                                                                                                                                                <tr>
                                            <th><?= __('Address') ?></th>
                                            <td><?= h($client->address) ?></td>
                                        </tr>
                                                                                                                                                                                <tr>
                                            <th><?= __('Debt Due') ?></th>
                                            <td><?= h($client->debt_due) ?></td>
                                        </tr>
                                                                            <tr>
                                            <th><?= __('Created') ?></th>
                                            <td><?= h($client->created) ?></td>
                                        </tr>
                                                                            <tr>
                                            <th><?= __('Modified') ?></th>
                                            <td><?= h($client->modified) ?></td>
                                        </tr>
                                                                                                                                                                                                                <tr>
                                            <th><?= __('Description') ?></th>
                                            <td><?= $this->Text->autoParagraph(h($client->description)) ?></td>
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