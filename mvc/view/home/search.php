<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div style="text-align: center; width:50%;margin: auto;background-color: #a932ff; padding: 0px; color:#fff;height: auto; border-radius: 10px 10px 0px 0px;padding: 5px 3px 5px 3px;color: #313131;box-shadow: 2px 1px 5px #999;"><span style="text-align:center; color:#ffffff; font-family:sans_bold; font-size:20px;">نتیجه جستجو</span></div>
    <?php if(!empty($search)) { ?>
        <? foreach($search as $s){ ?>
            <div id="contain" style="background-color: rgba(170,226,201,0.62) !important;">
                <div class="header_news2" style="background-color: rgba(255,193,7,0.85) !important; color:#000000;"><?=$s['new_title']?></div>
                <div class="post">
					<?php if(file_exists(baseUri().'/uploads/news/'.$s['new_id'].'.jpg')) : ?>
						<img src="<?=baseUri()?>/uploads/news/<?=$s['new_id']?>.jpg" class="post-image" />
					<?php else : ?>
						<img src="<?=baseUri()?>/uploads/news/no_img.jpg" class="post-image" />
					<?php endif; ?>
                    <div class="post-text">
						<?php
							$strip_body = strip_tags(html_entity_decode($s['new_body']));
							if(strlen($strip_body) > 300) {
								echo mb_substr($strip_body, 0, 300).' ...';
							}
							else {
								echo $strip_body;
							}
						?>
                        <a href="<?=baseUri()?>/home/show_new/<?=$s['new_id']?>">(ادامه مطلب)</a>
                    </div>
                    <div style="clear:both;"></div>
                </div>
            </div>
        <? } ?>
    <?php }else{  ?>
        <div style="width:100%; text-align: center; margin:3px 0px 0px 0px; background-color: tomato; padding:10px; color:#f7f7f7; border-radius:10px;"> <h2>موردی یافت نشد</h2> </div>
    <? } ?>
</div>