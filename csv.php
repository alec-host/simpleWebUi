<html>
	<head>	
		<!--script src = "js/dropzone.js"></script-->
		<title></title>
		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,500,600,700|Open+Sans" rel="stylesheet">

		<!-- Libraries/Plugins -->
		<link id="bootstrap-css" href="css/bootstrap.min.css" rel="stylesheet">
		<link id="dropzone-css" href="css/dropzone.css" rel="stylesheet">

		<!-- Icons Library -->
		<link id="font-awesome-css" href="css/font-awesome.min.css" rel="stylesheet">

		<!-- Main CSS -->
		<link id="mechanize-css" href="style.css" rel="stylesheet">
	</head>
	<body>
	<!-- Wrapper -->
	<div class="wrapper">

		<section class="container-fluid inner-page">

			<div class="row">

				<div class="col-xl-6 offset-xl-3 col-lg-6 offset-lg-3 col-md-12 full-dark-bg">

					<!-- Files section -->
					<h4 class="section-sub-title"><span>Upload</span> a CSV File</h4>

					<form action="file_upload.php" class="dropzone files-container">
						<div class="fallback">
							<input name="file" type="file" multiple />
						</div>
					</form>

					<!-- Notes -->
					<span>CSV.</span>
					<span>Maximum file size is 25MB.</span>

					<!-- Uploaded files section -->
					<h4 class="section-sub-title"><span>Uploaded</span> Files (<span class="uploaded-files-count">0</span>)</h4>
					<span class="no-files-uploaded">No files uploaded.</span>

					<!-- Preview collection of uploaded documents -->
					<div class="preview-container dz-preview uploaded-files">
						<div id="previews">
							<div id="onyx-dropzone-template">
								<div class="onyx-dropzone-info">
									<div class="thumb-container">
										<img data-dz-thumbnail />
									</div>
									<div class="details">
										<div>
											<span data-dz-name></span> <span data-dz-size></span>
										</div>
										<div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
										<div class="dz-error-message"><span data-dz-errormessage></span></div>
										<div class="actions">
											<a href="#!" data-dz-remove><i class="fa fa-times"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Warnings -->
					<div id="warnings">
						<span>Warnings will go here!</span>
					</div>

				</div>
			</div><!-- /End row -->

		</section>
	</div>
	<!-- JQuery -->
	<script src="js/jquery-1.10.2.min.js"></script>

	<!-- Dropzone JS -->
	<script src="js/dropzone.js"></script>

	<!-- Main JS file -->
	<script src="js/scripts.js"></script>
	</body>
</html>