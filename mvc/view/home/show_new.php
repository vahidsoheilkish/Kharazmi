<? if(!empty($a_new)) : ?>
	<div style="text-align:center;">
		<div class="panel-heading" style="padding:10px 0px 12px; direction: rtl; width: 100%;font-family: sans_bold;font-size: 15px; background-color:#333871 !important;">
			<div style="font-family:sans_bold; font-size:15px;"><?=$a_new[0]['new_title']?></div>
		</div>
	</div>
	<div id="contain" style="background-color:#ffffff !important;">
		<div class="post" style="margin-top: -5px;min-height: 500px;">
			<img src="sss.jpg" class="post-image" />
			<div class="post-text">
				<?php
					echo html_entity_decode($a_new[0]['new_body']);			
				?>
			</div>
			<div style="clear:both;"></div>
		</div>
	</div>
<? endif ?>
