        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.2.0
            </div>
            <strong>Copyright &copy; 2015 narumi.</strong> All rights reserved.
        </footer>

        <!-- jQuery UI 1.11.4 -->
        <?php echo Asset::js('jquery-ui.min.js'); ?>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script type="text/javascript">
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.2 JS -->
        <?php echo Asset::js('bootstrap.min.js'); ?>
        <!-- Sparkline -->
        <?php echo Asset::js('jquery.sparkline.min.js'); ?>
        <!-- jvectormap -->
        <?php echo Asset::js('jquery-jvectormap-1.2.2.min.js'); ?>
        <?php echo Asset::js('jquery-jvectormap-world-mill-en.js'); ?>
        <!-- jQuery Knob Chart -->
        <?php echo Asset::js('jquery.knob.js'); ?>
        <!-- daterangepicker -->
        <?php echo Asset::js('moment.min.js'); ?>
        <?php echo Asset::js('daterangepicker.js'); ?>
        <!-- datepicker -->
        <?php echo Asset::js('bootstrap-datepicker.js'); ?>
        <!-- Bootstrap WYSIHTML5 -->
        <?php echo Asset::js('bootstrap3-wysihtml5.all.min.js'); ?>
        <!-- Slimscroll -->
        <?php echo Asset::js('jquery.slimscroll.min.js'); ?>
        <!-- FastClick -->
        <?php echo Asset::js('fastclick.min.js'); ?>
        <!-- AdminLTE App -->
        <?php echo Asset::js('app.min.js'); ?>
    </body>
</html>
