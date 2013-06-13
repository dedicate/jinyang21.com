<?php $jobCollection = $db->jobs; ?>

<div class='stage'>
	<div class='frame-content'>
		<div class='title'>
			JOIN US
		</div>
		
		<div class='content join-us '>
			<div class='job-list'><ul>
			<?php
				$cursor = $jobCollection->find();
				foreach ($cursor as $doc) {
			?>
				<li class='item'>
					<div class='job-title'><?php echo $doc['title']?></div>
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
				</li>
			<?php
				}
			?>
			</ul></div>
		</div>
	</div>
</div>

<script>
$(".job-list").mCustomScrollbar();
</script>