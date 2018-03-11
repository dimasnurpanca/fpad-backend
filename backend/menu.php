<ul class="nav" id="side-menu">
                        <li>
                            <a href="index.php" <?php if($menubar=='dashboard'){ ?>class="active"<?php } ?>><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="story.php" <?php if($menubar=='story'){ ?>class="active"<?php } ?>><i class="fa fa-book fa-fw"></i> List Story</a>
                        </li>
                        <li>
                            <a href="kategori.php" <?php if($menubar=='kategori'){ ?>class="active"<?php } ?>><i class="fa fa-plus-square fa-fw"></i> Kategori</a>
                        </li>
                        <li>
                            <a href="users.php" <?php if($menubar=='users'){ ?>class="active"<?php } ?>><i class="fa fa-user fa-fw"></i> Users</a>
                        </li>
						            <li>
                            <a href="setting.php" <?php if($menubar=='setting'){ ?>class="active"<?php } ?>><i class="fa fa-cog fa-fw"></i> Setting</a>
                        </li>
                    </ul>
