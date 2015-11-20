<noscript>
    <style>
        .wrapper {
        display: none;
        background-color: #FFFFFF;
        }
        html,body{
        background-color: #FFFFFF;
        }
    </style>
</noscript>
<!-- Logo -->
<a href="/" class="logo">
    <span><b>管理者</b></span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <!-- 案１ -->
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="hidden-xs"><?php echo $user_info['full_name']; ?></span>
                </a>
                <ul class="dropdown-menu">
                    <li class="user-header">
                        <p>
                            <?php echo $user_info['user_number']; ?> - <?php echo $user_info['full_name']; ?>
                        </p>
                        <p>
                            <?php echo $user_info['email']; ?>
                        </p>
                    </li>
                    <li class="user-footer">
                        <div class="pull-left">
                            <a href="" class="btn btn-default btn-flat">プロフィール</a>
                        </div>
                        <div class="pull-right">
                            <a href="/auth/logout" class="btn btn-default btn-flat">ログアウト</a>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
