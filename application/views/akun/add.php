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
                    Form Tambah
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">

                    <form action="<?php echo base_url('akun/add') ?>" method="POST">
                        <div class="form-group">
                            <label>Nama</label>
                            <input class="form-control" type="text" name="txtnama">
                        </div>

                        <div class="form-group">
                            <label>Role</label>
                            <select class="form-control" name="txtrole">
                                <option selected disabled value="">Role</option>
                                <option value="admin">Admin</option>
                                <option value="author">Author</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" type="text" name="txtusername">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" type="password" name="txtpassword">
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