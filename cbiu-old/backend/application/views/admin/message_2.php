

 <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                       Successfully Inserted
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="panel-body">
					<a target="_blank" href="<?php echo base_url(); ?>admin/invoice/<?php echo $id; ?>">
                    Your Invoice No : <?php echo $id; ?>
					<a/>
					<br/>
					<a target="_blank" href="<?php echo base_url(); ?>admin/chalan/<?php echo $id; ?>">
                    Chalan : <?php echo $id; ?>
					<a/>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
        </section>
    </section>
    <!--main content end-->