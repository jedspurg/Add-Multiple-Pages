<?php    defined('C5_EXECUTE') or die(_("Access Denied."));?>
<?php   
	$pageSelector = Loader::helper('form/page_selector');
	Loader::model("collection_types");
?>
<div style="width:500px">
	<h1><span><?php    echo t('Add Multiple Pages')?></span></h1>
    <form method="post" id="sitemap-add-multi-page" action="<?php   echo $this->url('/dashboard/sitemap/jeramy_add_multi_page', 'save_pages')?>">
	<div class="ccm-dashboard-inner">
			<h3><?php    echo t('Select the Parent Page')?></h3>
            <?php   print $pageSelector->selectPage('parent-page','ccm_selectSitemapNode');   ?> 
            <br/>
             <h3><?php   echo t('Page Type')?></h3>
	  <?php   
			$ctArray = CollectionType::getList();
	
			if (is_array($ctArray)) { ?>
	  		<select name="ctID" id="selectCTID">
			<?php    foreach ($ctArray as $ct) { ?>
				<option <?php  if ($ctID == $ct->getCollectionTypeID()) echo 'selected '  ?>value="<?php   echo $ct->getCollectionTypeID()?>" >
						<?php   echo $ct->getCollectionTypeName()?>
				</option>
			<?php    } ?>
	  		</select>
	  		<?php    } ?>
            <br/><br/>
                <h3><?php    echo t('Enter page names separated by carriage return (Enter)')?></h3>
                <div><?php    echo $form->textarea('pagesToAdd', $pagesToAdd, array('style' => 'width: 98%; height: 250px'))?></div>
                <br/>
                <h3><?php    echo t('Description (will be added to all pages above)')?></h3>
                <div><?php    echo $form->textarea('description', $description, array('style' => 'width: 98%; height: 100px'))?></div>
                 <br/>
                <h3><?php    echo t('Header Extra Content (will be added to all pages above)')?></h3>
                <div><?php    echo $form->textarea('header_extra_content', $header_extra_content, array('style' => 'width: 98%; height: 100px'))?></div>
                <br/>
                <h3><?php    echo t('Meta Description (will be added to all pages above)')?></h3>
                <div><?php    echo $form->textarea('metaDescription', $metaDescription, array('style' => 'width: 98%; height: 100px'))?></div>
                <br/>
                <h3><?php    echo t('Meta Keywords (will be added to all pages above)')?></h3>
                <div><?php    echo $form->textarea('metaKeywords', $metaKeywords, array('style' => 'width: 98%; height: 100px'))?></div>
                <br/>
                <h3><?php    echo t('Exclude pages from navigation? ')?><input type="checkbox" name="exclude_nav" value="1" <?php  if ($exclude_nav) echo 'checked '; ?>/></h3>
				<br/>
                <h3><?php    echo t('Exclude pages from page list? ')?><input type="checkbox" name="exclude_page_list" value="1" <?php  if ($exclude_page_list) echo 'checked '; ?>/></h3>
				<br/>
				<h3><?php    echo t('Exclude pages from search index? ')?><input type="checkbox" name="exclude_search_index" value="1" <?php  if ($exclude_search_index) echo 'checked '; ?>/></h3>
				<br/>
                <h3><?php    echo t('Exclude pages from sitemap.xml? ')?><input type="checkbox" name="exclude_sitemapxml" value="1" <?php  if ($exclude_sitemapxml) echo 'checked '; ?>/></h3>
				<br/>
			<div class="ccm-spacer">&nbsp;</div>
            
    <?php    
	$ih = Loader::helper('concrete/interface');
	print $ih->button(t('Cancel'), $this->url('/dashboard/sitemap/jeramy_add_multi_page/'), 'left');
	print $ih->submit('Add', 'sitemap-add-multi-page');
	?>
		<div class="ccm-spacer">&nbsp;</div>
	</div>
</form>

</div>
