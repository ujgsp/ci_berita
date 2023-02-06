<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Akun</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">


            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger">
                    <strong>Error!</strong>
                    <?php echo validation_errors(); ?>
                </div>
            <?php endif; ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Form Edit
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">

                    <form action="<?php echo base_url('akun/proses_edit/' . $this->uri->segment(3)) ?>" method="POST">
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" type="text" name="txtnama" value="<?php echo $get_data_by_username->name; ?>">
                        </div>

                        <div class="form-group">
                            <label>Role</label>
                            <select class="form-control" name="txtrole">
                                <option selected disabled value="">Role</option>
                                <option value="admin" <?php echo ($get_data_by_username->role == 'admin')  ? 'selected' : '' ?> >Admin</option>
                                <option value="author" <?php echo ($get_data_by_username->role == 'author')  ? 'selected' : '' ?>>Author</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" disabled type="text" name="txtusername" value="<?php echo $get_data_by_username->username; ?>">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" type="password" name="txtpassword" placeholder="Isi hanya jika ingin merubahnya">
                        </div>

                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>

</div>