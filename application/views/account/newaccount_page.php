<br />
<form action="<?php echo base_url('Account/new'); ?>" method="post">
    <h2 style="color: white">Create IGN</h2>
    <hr />
    <?php if ($this->session->flashdata()) { ?>
        <div class="alert alert-warning">
            <?= $this->session->flashdata('msg'); ?>
        </div>
    <?php } ?>
    <div class="form-group">
        <label for="ign" style="color: white">IGN:</label>
        <input type="ign" name="ign" required class="form-control" id="ign">
    </div>  
    <button type="submit" class="btn btn-default">Submit</button>
    <span class="float-right"><a class="btn btn-danger" href="<?=base_url().'login/logout';?>">Logout</a></span>
</form>