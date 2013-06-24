<?php 
$m = new MongoClient('mongodb://craftgavin:whothirstformagic?@localhost');
$db = $m->jy;
$jobCollection = $db->jobs;
?>

<div class='stage'>
	<div class='frame-content'>
		<div class='title'>
			JOIN US
			<div class='info'>
				<div class='info-text email'>
					<br />
					请将简历发送至<br />
					人事行政部<br />
					<a href="mailto:shelly.sun@jinyang21.com">shelly.sun@jinyang21.com</a>
				</div>
			</div>
		</div>
		
		<div class='content join-us '>
			<div class='job-list m-scroller'><ul class='accordion'>
			<?php
				$cursor = $jobCollection->find();
				foreach ($cursor as $doc) {
			?>
				<li class='item'>
					<div class='job-title'><?php echo $doc['title']?></div>
					<div>
						<dt>岗位职责</dt>
						<dd>
							<ol>
							<?php foreach($doc['resp'] as $r) { ?>
							<li class='line'><?php echo $r?></li>
							<?php } ?>
							</ol>
						</dd>
						<?php if(isset($doc['requirement'])) {?>
						<dt>任职要求</dt>
						<dd>
							<ol>
							<?php foreach($doc['resp'] as $r) { ?>
							<li class='line'><?php echo $r?></li>
							<?php } ?>
							</ol>
						</dd>
						<?php }?>
					</div>
				</li>
			<?php
				}
			?>
			</ul></div>
		</div>
	</div>
</div>

<script type='text/javascript'>
$(document).ready(function() {
	//
	$( ".accordion" ).accordion();
	$(".m-scroller").mCustomScrollbar();
});
</script>