<?php if (null != validation_errors() || null != $this->session->flashdata('error') || null != $this->session->flashdata('success')) { ?>
    <div class="alert alert-<?= null == $this->session->flashdata('success') ? 'warning' : 'success' ?>">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <?= validation_errors() ?>
        <?= $this->session->flashdata('error') ?>
        <?= $this->session->flashdata('success') ?>
    </div>
<?php }
?>