<!--  Crud DETAIL view -->

<h1><?php echo $heading; ?></h1>

<?php if(($results)) : ?>
	<?php foreach($results as $row) : ?>
		<div class="well">
			<h4><?php echo $row->article_name ?></h4>
			<p><?php echo $this->typography->nl2br_except_pre($row->description); ?></p>
			
			<?php if ($this->ion_auth->logged_in()) : ?>
			<?php
				$logged_user_id = $this->ion_auth->user()->row()->id ;
				$logged_username = $this->ion_auth->user()->row()->username ;
			?>
				<?php if ($logged_user_id == $row->author_id) : ?>
					<!-- Edit/Delete btns -->
					<a href="<?php echo base_url() ."articles/edit/" . $row->id; ?>" class="btn btn-primary btn-sm"> <i class="material-icons">edit</i>Edit</a> 
					<a href="<?php echo base_url() ."articles/delete/" . $row->id; ?>" class="btn btn-danger btn-sm"> <i class="material-icons">delete</i>Delete</a>
				<?php endif; ?>
			<?php endif; ?>
			<p>User ID: <?php echo $row->author_id; ?></p>

		</div>
	<?php endforeach; ?>
<?php else: ?>
	<p>No results</p>
<?php endif; ?>

<!-- 
<?php if(($moreresults)) : ?>
	<?php foreach($results as $rows) : ?>
		<div class="what">
			<p<?php echo $rows->username; ?>></p>
		</div>
	<?php endforeach; ?>
<?php else: ?>
	<p>No results</p>
<?php endif; ?> -->