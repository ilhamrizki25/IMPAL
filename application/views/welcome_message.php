<br />
<div class="row">
    <h2>Welcome <?php echo $_SESSION['Email']?>, You are successfully logged in. </h2>
    <div class="col-sm-4">
        <a class="btn btn-danger" href="<?=base_url().'login/logout';?>">Logout</a>
    </div>
</div>