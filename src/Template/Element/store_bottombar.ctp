<?php if ($role === 'storeAdmin') : ?>
    <div class="barra">
        <ul>
            <li class="admin-menu">
                <a href="<?= $this->request->base; ?>/admin" target="_blank">VOCÊ ESTÁ LOGADO COMO ADMINISTRADOR | PARA SUPORTE ESPECIALIZADO NÃO HESITE EM ENTRAR EM CONTATO CONOSCO</a>
            </li>
        </ul>
    </div>
<?php endif; ?>