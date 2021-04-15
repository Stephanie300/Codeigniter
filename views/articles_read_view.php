<!--  Crud view -->
<div class="p-3 mb-4 bg-info text-white">
	<h1><?php echo $heading; ?></h1>
</div>

<?php if(($results)) : ?>
	<?php foreach($results as $row) : ?>
		<div class="mb-4 p-3 bg-light border border-dark rounded">
			<h4><?php echo $row->article_name ?></h4>
			<p><?php echo word_limiter($row->description, 50, "..."); ?></p>
			<a class="btn btn-primary" href="<?php echo base_url(); ?>Articles/detail/<?php echo $row->id; ?>">Read more</a>
		</div>
	<?php endforeach; ?>
<?php endif; ?>