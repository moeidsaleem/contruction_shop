<div class="page-content clients">
    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title">
        <?php echo "Client"; ?>
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <?php echo $this->Html->link(__('Home'), ['controller' => 'Home', 'action' => 'index'],['escape' => false]); ?>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#"><?php echo "Client"; ?></a>
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
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <?php echo $this->Html->link(__('Add New <i class="fa fa-plus"></i>'), ['action' => 'add'],['escape' => false, 'class' => 'btn green']); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="btn-group pull-right">
                                    <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="">Export</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-hover" id="table_slides">
                        <thead>
                        <tr>
                                                            <th><?php echo $this->Paginator->sort('id') ?></th>
                                                            <th><?php echo $this->Paginator->sort('code') ?></th>
                                                            <th><?php echo $this->Paginator->sort('name') ?></th>
                                                            <th><?php echo $this->Paginator->sort('phone') ?></th>
                                                            <th><?php echo $this->Paginator->sort('address') ?></th>
                                                            <th><?php echo $this->Paginator->sort('debt_amount') ?></th>
                                                            <th><?php echo $this->Paginator->sort('debt_due') ?></th>
                                                        <th class="actions" style="width:70px"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($clients as $client): ?>
                        <tr>
                                                                    <td><?php echo $this->Number->format($client->id) ?></td>
                                                                            <td><?php echo h($client->code) ?></td>
                                                                            <td><?php echo h($client->name) ?></td>
                                                                            <td><?php echo $this->Number->format($client->phone) ?></td>
                                                                            <td><?php echo h($client->address) ?></td>
                                                                            <td><?php echo $this->Number->format($client->debt_amount) ?></td>
                                                                            <td><?php echo h($client->debt_due) ?></td>
                                                                <td class="actions">
                                <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), ['action' => 'view', $client->id],['escape' => false]) ?>
                                <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), ['action' => 'edit', $client->id],['escape' => false]) ?>
                                <?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-trash"></span>'), ['action' => 'delete', $client->id], ['escape' => false,'confirm_delete' => true]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    </div>
                    <p>
                        <small><?= $this->Paginator->counter() ?></small>
                    </p>

                    <?php
                    $params = $this->Paginator->params();
                    if($params['pageCount'] > 1):
                        ?>
                        <ul class="pagination pagination-sm">
                            <?php
                            echo $this->Paginator->prev(__('Previous'));
                            echo $this->Paginator->numbers();
                            echo $this->Paginator->next(__('Next'));
                            ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
    <!-- END PAGE CONTENT-->
</div>
