<!-- CRUD WRITE VIEW -->
<h1>New Article</h1>

<?php echo form_open_multipart('articles/write'); ?>

<div class="form-group">	
	<label for="article_name">Article Name</label>
	<!-- echo set_value('article_name'); // this will prepopulate the form -->
	<input type="text" name="article_name" class="form-control form-width" value="<?php echo set_value('article_name'); ?>" />
	<!-- echo form_error('article_name'); - this will write any validation errors -->
	<?php echo form_error('article_name'); ?> 
</div>

<div class="form-group">
	<label for="description">Description</label>
	<!-- echo set_value('description'); // this will prepopulate the form -->
	<textarea name="description" class="form-control form-width textarea-height">	
		<?php echo set_value('description'); ?>
	</textarea>
	<!-- echo form_error('description') - this will write any validation errors -->
	<?php echo form_error('description'); ?>
</div>

<div class="form-group">
	<input type="submit" value="Submit" class="btn btn-primary" />
</div>

</form>

