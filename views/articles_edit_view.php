<!--  EDIT VIEW -->
<!-- This has been copied from crud_write_view -->
<?php
if($results){
	foreach($results as $row){
		$article_name = $row->article_name;
		$description = $row->description;
		$id = $row->id;
	 	//echo $animal_name; //just to test
	}
}
?>
<h1>Edit Article</h1>
<!-- Remember that if you want to use a variable in a text string it HAS to be in double qoutes -->
<?php echo form_open_multipart("articles/edit/$id"); ?>

<div class="form-group">	
	<label for="article_name">Article Name</label>
	<!-- echo set_value('article_name'); // this will prepopulate the form -->
	<input type="text" name="article_name" class="form-control form-width" value="<?php echo set_value('article_name', $article_name); ?>" />
	<!-- echo form_error('article_name'); - this will write any validation errors -->
	<?php echo form_error('article_name'); ?> 
</div>

<div class="form-group">
	<label for="description">Description</label>
	<!-- echo set_value('description'); // this will prepopulate the form -->
	<textarea name="description" class="form-control form-width textarea-height">	
		<?php echo set_value('description', $description); ?>
	</textarea>
	<!-- echo form_error('description') - this will write any validation errors -->
	<?php echo form_error('description'); ?>
</div>

<div class="form-group">
	<input type="submit" value="Submit" class="btn btn-primary" />
</div>

</form>

