<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Post</h1>
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

                    <form action="<?php echo base_url('post/add') ?>" method="POST">
                        <div class="form-group">
                            <label>Title</label>
                            <input class="form-control" type="text" name="txttitle">
                        </div>

                        <div class="form-group">
                            <label>Content</label>
                            <textarea class="form-control" rows="3" name="txtcontent"></textarea>
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