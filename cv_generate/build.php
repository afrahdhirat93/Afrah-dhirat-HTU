<?php
// Perform template downloading
if (isset($_POST['templateName']) && isset($_POST['task']))
{
	if ('download' == $_POST['task'])
	{
		error_reporting(0);

		$templatePath = __DIR__ . '/templates/' . $_POST['templateName'] . '.html';

		// Include the main TCPDF library (search for installation path).
		require_once(__DIR__ . '/library/tcpdf/tcpdf.php');

		// create new PDF document
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Nicola Asuni');
		$pdf->SetTitle('TCPDF Example 021');
		$pdf->SetSubject('TCPDF Tutorial');
		$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

		// add a page
		$pdf->AddPage();

		// output the HTML content
		$html = replaceTemplate(readTemplate($templatePath));
		$pdf->writeHTML($html, true, 0, true, 0);

		// reset pointer to the last page
		$pdf->lastPage();

		//Close and output PDF document
		ob_end_clean();
		$pdf->Output($_POST['templateName'] . '.pdf', 'D');

		die;
	}
}
?>
<html>
	<head>
		<title>Download Resume</title>
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="media/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="media/css/bootstrap-theme.min.css">

		<!-- Latest compiled and minified JavaScript -->
		<script src="media/js/bootstrap.min.js"></script>
		<script type="text/javascript">
		jQuery(document).ready(function($) {
			$('.modal').on('show.bs.modal', function () {
					console.log($(this));
			       $(this).find('.modal-body').css({
			              width:'auto', //probably not needed
			              height:'auto', //probably not needed
			              'max-height':'100%'
			       });
			});
		});
		</script>
		<style type="text/css">
		.modal-dialog{
			width: auto;
		}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<h1>Available Templates</h1>
				<!-- Templates -->
				<ul class="nav nav-pills">
				<?php
					$templates = collectTemplates();
				?>
				<?php for ($i = 0, $n = count($templates); $i < $n; $i++) : ?>
					<li>
						<button type="button" class="btn" data-toggle="modal" data-target="#<?php echo $templates[$i]['name'] . $i; ?>">
						  <?php echo $templates[$i]['name']; ?>
						</button>
					</li>
				<?php endfor; ?>
				</ul>
			</div>

			<!-- Modal -->
			<?php for ($i = 0, $n = count($templates); $i < $n; $i++) : ?>
				<?php $template = $templates[$i]; ?>
				<div class="modal fade"
					id="<?php echo $template['name'] . $i; ?>"
					tabindex="-1"
					role="dialog"
					aria-labelledby="<?php echo $template['name'] . $i; ?>Label"
					aria-hidden="true"
				>
				  <div class="modal-dialog">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="<?php echo $template['name'] . $i; ?>Label"><?php echo $template['name']; ?></h4>
					  </div>
					  <div class="modal-body">
						<?php echo replaceTemplate(readTemplate($template['path'])); ?>
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
						<form action="" method="post" name="downloadTemplate" id="downloadTemplate">
							<button type="button" class="btn btn-primary" onclick="this.form.submit();">Download Resume</button>
							<input type="hidden" name="templateName" value="<?php echo $template['name']; ?>" />
							<input type="hidden" name="task" value="download" />
						</form>
					  </div>
					</div>
				  </div>
				</div>
			<?php endfor; ?>
		</div>
	</body>
</html>

<?php

function collectTemplates()
{
	$templateDir = __DIR__ . '/templates';
	$templates   = array();

	if ($handle = opendir($templateDir))
	{
		$i = 0;

		while (false !== ($entry = readdir($handle)))
		{
			if ($entry != '.' && $entry != '..')
			{
				preg_match("/.*.html/", $entry, $template);

				if (count($template))
				{
					$templates[$i]['path'] = __DIR__ . '/templates/' . $entry;
					$templates[$i]['name'] = str_replace('.html', '', $entry);

					$i++;
				}
			}
		}

		closedir($handle);
	}

	return $templates;
}

function readTemplate($file)
{
	$handle   = fopen($file, "r");
	$content  = fread($handle, filesize($file));
	fclose($handle);

	return $content;
}

function replaceTemplate($content)
{
	$content = str_replace('{full_name}', $_POST['full_name'], $content);
	$content = str_replace('{lname}', $_POST['lname'], $content);
	$content = str_replace('{phonenumber}', $_POST['phonenumber'], $content);
	$content = str_replace('{email}', $_POST['email'], $content);
	$content = str_replace('{floatingTextarea}', $_POST['floatingTextarea'], $content);
	$content = str_replace('{feild}', $_POST['feild'], $content);
	$content = str_replace('{experience2}', $_POST['experience2'], $content);
	$content = str_replace('{experience3}', $_POST['experience3'], $content);
	$content = str_replace('{experience4}', $_POST['experience4'], $content);
	$content = str_replace('{uni_name}', $_POST['uni_name'], $content);
	$content = str_replace('{experience}', $_POST['experience'], $content);


	
	return $content;
}