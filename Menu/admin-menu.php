 <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <!--<li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </li>-->
                    <li>
                        <a href="index.php?module=Home&view=Dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
			<?php
				$sql = "select * from user_menu where user_role = ".$session->userlevel." order by `order`;";
				$ex  = mysql_query($sql);
				while($rs = mysql_fetch_assoc($ex)){
					?>
				<li>
					<a href="index.php?module=<?php echo $rs['module']; ?>&view=<?php echo $rs['view'] ?>" title="<?php echo $rs['name']?>">
						<?php echo $rs['name'] ?>
					</a>
				</li>
					<?php
				}

			?>
                </ul>
                <!-- /#side-menu -->
            </div>
            <!-- /.sidebar-collapse -->
        </nav>
        <!-- /.navbar-static-side -->
