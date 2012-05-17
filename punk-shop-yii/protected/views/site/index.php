<?php $this->pageTitle=Yii::app()->name; ?>

<div id="categories">
	<ul>
	<?php foreach(Categories::getIdsWithTitles() as $category) { ?>
            <li>
                <a href="index.php?category_id=<?php echo $category['id']; ?>"><?php echo $category['title']; ?></a>
            </li>            
        <?php } ?>
	</ul>
</div>

<div id="result">	

    <?php $this->widget('zii.widgets.CListView', array(
            'dataProvider'=> $dataProvider,
            'itemView'=>'../goods/_view',
    )); ?>
	
</div>
<script>

	aa= document.getElementsByTagName('a');
	for(i=0;i<aa.length;i++){
		aa[i].href=aa[i].href.replace('index.php?r=site/view&id','index.php?r=goods/view&id');
	}
</script>
