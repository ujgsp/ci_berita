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
            <?php echo $this->session->flashdata('msg'); ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="<?php echo base_url('akun/add') ?>" class="btn btn-primary">Tambah</a>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($get_data as $row) :
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row->name; ?></td>
                                        <td><?php echo $row->username; ?></td>
                                        <td><?php echo $row->role; ?></td>
                                        <td>
                                            
                                            <a href="<?php echo base_url('akun/edit/'. $row->username) ?>" class="btn btn-info">Edit</a>
                                            <a onclick="return confirm('Yakin ingin dihapus?')" href="<?php echo base_url('akun/delete/'. $row->username) ?>" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>

</div>