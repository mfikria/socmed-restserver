<!DOCTYPE html>
<html>

<?php
// Include head section
require $GLOBAL['dir'].'views/_head.php';
?>

<body>
	<div class="wrapper">

		<?php
		// Include header section
		require $GLOBAL['dir'].'views/_nav.php';
		?>

		<?php
		// Include header section
		require $GLOBAL['dir'].'views/_header.php';
		?>

		<section>
			<div class="container">
				<?php
				// Include aside section
				require $GLOBAL['dir'].'views/_aside.php';

				// Include content section
				require $GLOBAL['dir'].'views/_content.php';
				?>

			</div>
		</section>
		<?php
		// Include footer section
		require $GLOBAL['dir'].'views/_footer.php';
		?>
	</div>
	<?php
		// Include tail section
	require $GLOBAL['dir'].'views/_tail.php';
	?>
</body>
</html>