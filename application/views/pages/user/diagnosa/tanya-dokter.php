<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2><?= $title; ?></h2>
            <ol>
                <li><a href="<?= base_url('User/Home'); ?>">Home</a></li>
                <li>Riwayat</li>
                <li><?= $title; ?></li>
            </ol>
        </div>

    </div>
</section>
<!-- End Breadcrumbs -->

<!-- ======= Portfolio Details Section ======= -->
<section id="portfolio-details" class="portfolio-details">
    <div class="container">
        <br><br><br>
        <div class="section-title" data-aos="fade-up">
            <h2><?= $h2; ?></h2>
        </div>

        <div class="col-xl-6 col-lg-6" style="height: 500px">
            <div class="card h-100 shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h3 class="box-title" id="ReciverName_txt"><?= $chatTitle; ?></h3>

                    <div class="box-tools pull-right">
                        <span data-toggle="tooltip" title="Clear Chat" class="ClearChat"><i class="fa fa-comments"></i></span>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body direct-chat direct-chat-primary">
                    <!-- DIRECT CHAT -->
                    <div class="box box-warning direct-chat direct-chat-primary">
                        <!-- <div class="box-header with-border">

						</div> -->
                        <!-- /.box-header -->
                        <div class="box-body">
                            <!-- Conversations are loaded here -->
                            <div class="direct-chat-messages" id="content">
                                <!-- /.direct-chat-msg -->

                                <div id="dumppy"></div>

                            </div>
                            <!--/.direct-chat-messages-->

                        </div>
                        <!-- /.box-body -->

                    </div>
                    <!--/.direct-chat -->
                </div>
                <div class="card-footer">
                    <!--<form action="#" method="post">-->
                    <div class="input-group">
                        <?php
                        $obj = &get_instance();
                        $obj->load->model('UserModel');
                        $profile_url = $obj->UserModel->PictureUrl();
                        $user = $obj->UserModel->GetUserData();
                        ?>

                        <input type="hidden" id="Sender_Name" value="<?= $user['name']; ?>">
                        <!-- <input type="hidden" id="Sender_ProfilePic" value="<?= $profile_url; ?>"> -->

                        <input type="hidden" id="ReciverId_txt">
                        <input type="text" name="message" placeholder="Type Message ..." class="form-control message">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-success btn-flat btnSend" id="nav_down">Send</button>
                            <!-- <div class="fileDiv btn btn-info btn-flat"> <i class="fa fa-upload"></i>
								<input type="file" name="file" class="upload_attachmentfile" /></div> -->
                        </span>
                    </div>
                    <!--</form>-->
                </div>
                <!-- /.box-footer-->

            </div>
        </div>


        <div class="mb-4">
            <h6>&nbsp</h6>
        </div>



        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-6" id="chatSection">
            <div class="card shadow mb-4 h-100">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h3 class="box-title"><?= $strTitle; ?></h3>

                    <div class="box-tools pull-right">
                        <span class="label label-danger"><?= count($vendorslist); ?> <?= $strsubTitle; ?></span>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <!-- USERS LIST -->
                    <div class="box box-danger">
                        <div class="box-header with-border">

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <ul class="users-list clearfix">

                                <?php if (!empty($vendorslist)) {
                                    foreach ($vendorslist as $v) :
                                        ?>
                                        <li class="selectVendor" id="<?= $v['id']; ?>" title="<?= $v['name']; ?>">
                                            <img src="<?= $v['picture_url']; ?>" alt="<?= $v['name']; ?>" title="<?= $v['name']; ?>" width="100">
                                            <a class="users-list-name" href="#"><?= $v['name']; ?></a>
                                            <!--<span class="users-list-date">Yesterday</span>-->
                                        </li>
                                    <?php endforeach; ?>

                                <?php } else { ?>
                                    <li>
                                        <a class="users-list-name" href="#">No Vendor's Find...</a>
                                    </li>
                                <?php } ?>


                            </ul>
                            <!-- /.users-list -->
                        </div>
                        <!-- /.box-body -->
                        <!-- <div class="box-footer text-center">
				 <a href="javascript:void(0)" class="uppercase">View All Users</a>
			   </div>-->
                        <!-- /.box-footer -->
                    </div>
                    <!--/.box -->
                </div>
            </div>
        </div>
        <!-- </div> -->



        

    </div>
</section><!-- End Features Section -->