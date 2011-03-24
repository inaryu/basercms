<?php
/* SVN FILE: $Id$ */
/**
 * ブログ最近の投稿
 *
 * TODO 前バージョンとの互換用に残しているので不要になったら削除する
 * 
 * PHP versions 4 and 5
 *
 * BaserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2008 - 2010, Catchup, Inc.
 *								9-5 nagao 3-chome, fukuoka-shi 
 *								fukuoka, Japan 814-0123
 *
 * @copyright		Copyright 2008 - 2010, Catchup, Inc.
 * @link			http://basercms.net BaserCMS Project
 * @package			baser.plugins.blog.views
 * @since			Baser v 0.1.0
 * @version			$Revision$
 * @modifiedby		$LastChangedBy$
 * @lastmodified	$Date$
 * @license			http://basercms.net/license/index.html
 */
if(isset($blogContent)){
	$id = $blogContent['BlogContent']['id'];
}else{
	$id = $blog_content_id;
}
$data = $this->requestAction('/blog/get_recent_entries/'.$id);
$recentEntries = $data['recentEntries'];
$blogContent = $data['blogContent'];
?>

<div class="side-navi blog-recent-entries">
	<h2>最近の投稿</h2>
	<?php if($recentEntries): ?>
	<ul>
		<?php foreach($recentEntries as $recentEntry): ?>
		<li>
			<?php $baser->link($recentEntry['BlogPost']['name'],array('admin'=>false,'plugin'=>'','controller'=>$blogContent['BlogContent']['name'],'action'=>'archives',$recentEntry['BlogPost']['no']),array('prefix'=>true)) ?>
		</li>
		<?php endforeach; ?>
	</ul>
	<?php endif; ?>
</div>