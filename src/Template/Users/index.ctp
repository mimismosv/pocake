<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h3><?= __('Users') ?></h3>
        </div>
        <div class="table-responsive">
            <table class='table table-striped table-hover'>
                <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('first_name', ['Nombre']) ?></th>
                    <th><?= $this->Paginator->sort('last_name', ['Apellido']) ?></th>
                    <th><?= $this->Paginator->sort('email', ['Correo Electronico']) ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $this->Number->format($user->id) ?></td>
                        <td><?= h($user->first_name) ?></td>
                        <td><?= h($user->last_name) ?></td>
                        <td><?= h($user->email) ?></td>
                        <td>
                            <?= $this->Html->link(__('Ver'), ['action' => 'view', $user->id], ['class' => 'btn-sm btn-info']) ?>
                            <?= $this->Html->link(__('Editar'), ['action' => 'edit', $user->id], ['class' => 'btn-sm btn-primary']) ?>
                            <?= $this->Form->postLink(__('Borrar'), 
                                        ['action' => 'delete', $user->id], 
                                        ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 
                                        'class' => 'btn-sm btn-danger']) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
            </ul>
            <p><?= $this->Paginator->counter() ?></p>
        </div>
    </div>
</div>
