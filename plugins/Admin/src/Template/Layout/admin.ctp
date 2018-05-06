<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8"/>
	<title>Medical Clinic Management</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport"/>
	<meta content="" name="description"/>
	<meta content="" name="author"/>
	<style>
		/* .button{
			background-color: #1CAF9A;
			color:#fff;
			border:none;
			border-radius:4px;
			padding:7px;
			position:fixed;
			bottom: 50px;
			right:30px;

		}
		.button:hover{
			background:#364150;
		} */

		.btnPopup{
			position: fixed;
			bottom:50px;
			left:30px;
		}

		.modal{
			/*position:fixed;*/
			/*z-index:1;*/
			/*left:0;*/
			/*top:0;*/
			/*height:100%;*/
			/*width: 100%;*/
			/*overflow:auto;*/
		}

		.modal-content{
			/* background-color:#f4f4f4;
			/*margin:80%;*/
			padding:20px;
			width:30%;
			box-shadow: 0 5px 8px 0 rgba(0,0,0,0.2), 0 7px 20px 0 rgba(0,0,0,0.17); */
		}
        /*new popup*/
        .modal.fade.in .lab-modal-body {
            bottom: 0;
            opacity: 1;
        }

        .lab-modal-body h1 {
            font-size: 4rem;
        }

        .lab-modal-body p {
            margin: 0 0 1.62rem 0;
            line-height: 1.62;
            font-weight: 300;
            font-size: 1.62rem;
            color: #666;
        }

        .lab-modal-body {
			color: #000;
			font-weight:bolder;
			text-align:center;
            position: relative;
            bottom: -150px;
			margin-top:478px;
			margin-left:14px;
            padding: 40px;
            max-width: 35%;
            height: auto;
            background-color: rgb(248, 250, 247);
            border: 1px solid #BEBEBE;
            opacity: 0;
            -webkit-transition: opacity 0.3s ease-out, bottom 0.3s ease-out;
            -moz-transition: opacity 0.3s ease-out, bottom 0.3s ease-out;
            -o-transition: opacity 0.3s ease-out, bottom 0.3s ease-out;
            transition: opacity 0.3s ease-out, bottom 0.3s ease-out;
        }

        .close {
            margin-top: -20px;
            margin-right: -20px;
            text-shadow: 0 1px 0 #ffffff;
        }

		.close:hover, .close:focus{
			color:#000;
			text-decoration: none;
			cursor: pointer;
		}
	</style>


	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
	<?php
	$controller = $this->request->params['controller'];
	$action = $this->request->params['action'];
	$action = $action == 'edit_password' ? 'login' : $action;
	$css_include = array(
			'/admin/backend/global/plugins/font-awesome/css/font-awesome.min.css',
			'/admin/backend/global/plugins/simple-line-icons/simple-line-icons.min.css',
			'/admin/backend/global/plugins/bootstrap/css/bootstrap.min.css',
			'/admin/backend/global/plugins/uniform/css/uniform.default.css',
			'/admin/backend/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',
			'/admin/backend/pages/css/login.css',
			'/admin/backend/global/plugins/select2/select2.css',
			'/admin/backend/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css',
			'/admin/backend/global/css/components.css',
			'/admin/backend/global/css/plugins.css',
			'/admin/backend/layout/css/layout.css',
			'/admin/backend/layout/css/themes/darkblue.css',
			'/admin/backend/layout/css/custom.css',
			'/admin/css/libs/fancybox/jquery.fancybox.css',
			'/admin/css/libs/jquery.datetimepicker.css',
			'/admin/strength_password/strength',
			'/admin/plugins/select2/css/select2.min.css',
			'/admin/css/custom.css',
	);
	echo $this->Html->css($css_include);
	echo $this->fetch('css');
	//echo $this->fetch('meta');
	$jsVars = array(
			'webroot' => $this->request->webroot,
			'webroot_admin' => $this->request->webroot."admin/",
			'webroot_full' => $webroot_full
	);
	echo $this->Html->scriptBlock('var window_app = ' . json_encode($jsVars) . ';');
	?>


	<link rel="shortcut icon" href="favicon.ico"/>
	<script src="<?php echo $this->request->webroot ?>admin/backend/global/plugins/jquery.min.js"></script>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-header-fixed page-quick-sidebar-over-content <?php echo $action ?>">

<?php
if($controller == 'Users' && $action == 'login'){
	echo $this->fetch('content');
}
else{
	?>
	<?php echo $this->element('header'); ?>
	<!-- BEGIN CONTAINER -->
	<div class="page-container">
		<?php echo $this->element('sidebar'); ?>
		<!-- BEGIN CONTENT -->
		<div class="page-content-wrapper">
			<?php echo $this->fetch('content'); ?>
		</div>
        <button type="button" class="btn btn-danger btn-lg btnPopup" data-toggle="modal" data-target="#lab-slide-bottom-popup"> Notification </button>

        <div class="modal fade" id="lab-slide-bottom-popup" data-keyboard="false" data-backdrop="false">
            <div class="lab-modal-body">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <p>Lorem ipsum</p>
            </div>
            <!-- /.modal-body -->
        </div>

		<!-- END CONTENT -->

	</div>

	<?php
		echo $this->element('logoutCountDown');
	?>
	<!-- END CONTAINER -->
	<?php echo $this->element('footer'); ?>
	<?php
}
?>


<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->

<?php
$script_include = array(
        '/admin/js/jquery-2.1.4.min.js',
        '/admin/js/jquery.validate.min.js',
		'/admin/backend/global/plugins/jquery-migrate.min.js',
		'/admin/backend/global/plugins/jquery-ui/jquery-ui.min.js',
		'/admin/backend/global/plugins/bootstrap/js/bootstrap.min.js',
		'/admin/backend/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
		'/admin/backend/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
		'/admin/backend/global/plugins/jquery.blockui.min.js',
		'/admin/backend/global/plugins/jquery.cokie.min.js',
		'/admin/backend/global/plugins/uniform/jquery.uniform.min.js',
		'/admin/backend/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
		'/admin/backend/global/scripts/metronic.js',
		'/admin/backend/layout/scripts/layout.js',
		'/admin/backend/layout/scripts/demo.js',
		'/admin/backend/global/plugins/select2/select2.min.js',
		'/admin/backend/global/plugins/datatables/media/js/jquery.dataTables.min.js',
		'/admin/backend/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js',
		'/admin/backend/layout/scripts/quick-sidebar.js',
		'/admin/js/libs/jquery.fancybox.js',
		'/admin/js/libs/fancybox.js',
		'/admin/js/libs/jquery.datetimepicker.js',
		'/admin/strength_password/strength.js',
		'/plugins/tinymce/tinymce.min.js',
		'/admin/plugins/select2/js/select2.min.js',
		'/admin/js/tock.min.js',
		'/admin/js/main.js',
		'/admin/js/main/cls.MainProcess.js'
);
echo $this->Html->script($script_include);
echo $this->fetch('script');
?>

<script>
	jQuery(document).ready(function() {
		Metronic.init(); // init metronic core components
		Layout.init(); // init current layout
	});
	var SessionExprieIn = '<?php echo $SessionExprieIn ?>';
</script>
<script>
$(document).on('ready',function(){$('#popupModal').modal('show');});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>