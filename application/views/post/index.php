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
            <?php echo $this->session->flashdata('msg'); ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="<?php echo base_url('post/add') ?>" class="btn btn-primary">Tambah</a>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Date</th>
                                    <?php if($this->session->userdata('role') == 'admin'): ?>
                                    <th>Username</th>
                                    <th>Aksi</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($get_data as $row) :
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row->title; ?></td>
                                        <td><?php echo $row->content; ?></td>
                                        <td><?php echo $row->date; ?></td>
                                        <?php if($this->session->userdata('role') == 'admin'): ?>
                                        <td><?php echo $row->username; ?></td>
                                        <td>
                                            
                                            <a href="<?php echo base_url('post/edit/'. $row->idpost) ?>" class="btn btn-info">Edit</a>
                                            <a onclick="return confirm('Yakin ingin dihapus?')" href="<?php echo base_url('post/delete/'. $row->idpost) ?>" class="btn btn-danger">Delete</a>
                                        </td>
                                        <?php endif; ?>
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