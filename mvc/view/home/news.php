<div style="text-align:center;">
	<div class="panel-heading" style="padding:10px 0px 12px; direction: rtl; width: 100%;font-family: sans_bold;font-size: 15px;">
		لیست آخرین اخبار
	</div>
</div>
<?
	if(!empty($news)) {
		foreach($news as $new) : ?>
			<div id="contain">
				<div class="header_news2"><?=$new['new_title']?></div>
				<div class="post">
					<img src="sss.jpg" class="post-image" />
					<div class="post-text">
						<?php
							if(strlen($new['new_body']) > 300) {
								echo mb_substr(html_entity_decode($new['new_body']), 0, 300).' ...';
							}
							else {
								echo html_entity_decode($new['new_body']);
							}
						?>
						<a href="<?=baseUri()?>/home/show_new/<?=$new['new_id']?>">(ادامه مطلب)</a>
					</div>
					<div style="clear:both;"></div>
				</div>
			</div>
		<?php
		endforeach; 
	}
?>
<div style="margin:20px; padding:20px;text-align: center;direction: rtl;">
	<?=pagination(baseUri().'/home/news', 3  , 'active' , '' , $pageIndex , $pageCount) ?>
</div>