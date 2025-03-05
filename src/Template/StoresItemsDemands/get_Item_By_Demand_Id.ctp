<div class="card">
    <div class="card-body">
        <table id="general" class="table table-borderless font-table">
            <thead>
                <tr>
                    <th><?= __("Código") ?></th>
                    <th><?= __("Pedido") ?></th>
                    <th><?= __("Produto Físico") ?></th>
                    <th><?= __("Produto Digital") ?></th>
                    <th><?= __("Quantidade") ?></th>
                    <th><?= __("Criado Em") ?></th>
                    <th><?= __("Última Modificação") ?></th>
                </tr>
            </thead>
            <tbody style="font-weight: bold">
                <?php foreach ($storesItemsDemands as $storesItemsDemand) : ?>
                    <tr>
                        <td><?= $this->Number->format($storesItemsDemand->id) ?></td>
                        <td><?= $storesItemsDemand->has('stores_demand') ? $this->Html->link($storesItemsDemand->stores_demand->id, ['controller' => 'StoresDemands', 'action' => 'view', $storesItemsDemand->stores_demand->id]) : '' ?></td>
                        <td><?= $storesItemsDemand->has('stores_product') ? $this->Html->link($storesItemsDemand->stores_product->product, ['controller' => 'StoresProducts', 'action' => 'view', $storesItemsDemand->stores_product->id]) : '' ?></td>
                        <td><?= $storesItemsDemand->has('stores_course') ? $this->Html->link($storesItemsDemand->stores_course->course, ['controller' => 'StoresCourses', 'action' => 'view', $storesItemsDemand->stores_course->id]) : '' ?></td>
                        <td><?= h($storesItemsDemand->quantity) ?></td>
                        <td><?= h($storesItemsDemand->created) ?></td>
                        <td><?= h($storesItemsDemand->modified) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th><?= __("Código") ?></th>
                    <th><?= __("Pedido") ?></th>
                    <th><?= __("Produto Físico") ?></th>
                    <th><?= __("Produto Digital") ?></th>
                    <th><?= __("Quantidade") ?></th>
                    <th><?= __("Criado Em") ?></th>
                    <th><?= __("Última Modificação") ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>