                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user fa-2x"></i>
                        </a>

                        <div class="user-menu dropdown-menu">
							
                            <h5 class="nav-link"><i class="fa fa-user"></i>  <?=$this->session->userdata('user_name')?></h5>
							
                            <a class="nav-link" href="<?=base_url('index.php/admin_control');?>"><i class="fa fa-cogs"></i> My Profile</a>

                            <a class="nav-link" href="<?=base_url('index.php/login_control/logout'); ?>"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>

                    <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                            EN
                        </a>
                        <div class="dropdown-menu" aria-labelledby="language">
                            <div class="dropdown-item">
                                soon
                            </div>
                        </div>
                    </div>

                </div>
