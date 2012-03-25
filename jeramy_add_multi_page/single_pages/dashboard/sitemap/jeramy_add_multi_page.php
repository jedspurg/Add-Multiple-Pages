<<<<<<< HEAD
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
	print $ih->submit(t('Add'), 'sitemap-add-multi-page');
	?>
		<div class="ccm-spacer">&nbsp;</div>
	</div>
</form>

</div>
=======
<?php    defined('C5_EXECUTE') or die(_("Access Denied."));?>
<?php 
	$h = Loader::helper('concrete/interface');
	$pageSelector = Loader::helper('form/page_selector');
	Loader::model("collection_types");
?>

<?php echo Loader::helper('concrete/dashboard')->getDashboardPaneHeaderWrapper(t('Add Multiple Pages'), false, 'span10 offset3', false);?>

    <form method="post" id="sitemap-add-multi-page" action="<?php   echo $this->url('/dashboard/sitemap/jeramy_add_multi_page', 'save_pages')?>"class="form-stacked">
    
<div class="ccm-pane-body">

<div class="clearfix">
	<?php echo $form->label('parent-page', t('Select the Parent Page'))?>
  <span class="help-block"><?php echo t('Pages will be added as children of this page')?></span> 
 		<div class="input">     
        <?php   print $pageSelector->selectPage('parent-page','ccm_selectSitemapNode');   ?> 
     </div>
 </div>           
 
 <div class="clearfix">
 	<?php echo $form->label('ctID', t('Page Type'))?>          
   <div class="input">     
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
      </div>
    </div>
      <div class="clearfix"> 
			 <?php echo $form->label('pagesToAdd', t('Enter page names separated by carriage return (Enter)'))?>    
        <div class="input"> 
            <?php    echo $form->textarea('pagesToAdd', $pagesToAdd, array('style' => 'width: 98%; height: 250px'))?>
        </div>
       </div>
       <div class="clearfix"> 
			 <?php echo $form->label('description', t('Description'))?> 
       <span class="help-block"><?php echo t('Will be added to all pages above')?></span>         
				<div class="input">
						<?php    echo $form->textarea('description', $description, array('style' => 'width: 98%; height: 100px'))?>
            </div>
        </div>
        <div class="clearfix"> 
			 	<?php echo $form->label('header_extra_content', t('Header Extra Content'))?>
        <span class="help-block"><?php echo t('Will be added to all pages above')?></span>       
          <div class="input">
              <?php    echo $form->textarea('header_extra_content', $header_extra_content, array('style' => 'width: 98%; height: 100px'))?>
          </div>
        </div>
        <div class="clearfix"> 
        <?php echo $form->label('metaDescription', t('Meta Description'))?>       
				<span class="help-block"><?php echo t('Will be added to all pages above')?></span>       
          <div class="input">
              <?php    echo $form->textarea('metaDescription', $metaDescription, array('style' => 'width: 98%; height: 100px'))?>
          </div>
        </div>
        <div class="clearfix">
        <?php echo $form->label('metaKeywords', t('Meta Keywords'))?>        
				<span class="help-block"><?php echo t('Will be added to all pages above')?></span>       
          <div class="input">
          	<?php    echo $form->textarea('metaKeywords', $metaKeywords, array('style' => 'width: 98%; height: 100px'))?>
          </div>
        </div> 
        
        <div class="clearfix">
          <label></label>
          <div class="input">
          <ul class="inputs-list">
          <li>
          <label>
          <input type="checkbox" name="exclude_nav" value="1" <?php  if ($exclude_nav) echo 'checked '; ?>/>
          <span><?php    echo t('Exclude pages from navigation')?></span>
          </label>
          </li>
          <li>
          <label>
          <input type="checkbox" name="exclude_page_list" value="1" <?php  if ($exclude_page_list) echo 'checked '; ?>/>
          <span><?php    echo t('Exclude pages from page list')?></span>
          </label>
          </li>
          <li>
          <label>
          <input type="checkbox" name="exclude_search_index" value="1" <?php  if ($exclude_search_index) echo 'checked '; ?>/>
          <span><?php    echo t('Exclude pages from search index')?></span>
          </label>
          </li>
          <li>
          <label>
          <input type="checkbox" name="exclude_sitemapxml" value="1" <?php  if ($exclude_sitemapxml) echo 'checked '; ?>/>
          <span><?php    echo t('Exclude pages from sitemap.xml')?></span>
          </label>
          </li>
          </ul>
          </div>
			</div>      
	
</div>

<div class="ccm-pane-footer">
<?php  
print $h->submit(t('Save'), 'sitemap-add-multi-page', 'right', 'primary');
print $h->button(t('Cancel'), $this->url('/dashboard/sitemap/jeramy_add_multi_page/'), 'left');
?>
</div>


</form>

<?php echo Loader::helper('concrete/dashboard')->getDashboardPaneFooterWrapper(false);?>
>>>>>>> 5.5 ready, version 2.0
