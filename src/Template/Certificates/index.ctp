<div class="card">
    <div class="card-body">
        <?php echo $this->element('table'); ?>
        <thead>
            <tr>
                <th>Código</th>
                <th>Curso</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($certificates as $certificate) : ?>
                <tr>
                    <td><?= $this->Number->format($certificate->id) ?></td>
                    <td>
                        <?= $certificate->has('stores_course') ? $certificate->stores_course->course : '' ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Código</th>
                <th>Curso</th>
            </tr>
        </tfoot>
        </table>
    </div>
</div>