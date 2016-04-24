<?php
	foreach ($notes as $note) 
	{  ?>
		<div class="col-md-3 note_column">
			<div class="note_box">
				<h3><?= $note['title'] ?></h3>
				<form action="/Notes/destroy" method="post" class="delete">
					<input type="hidden" name="id" value="<?= $note['id'] ?>">
					<button type="submit" class="btn btn-danger btn-xs">Remove</button>
				</form>
				<form action="/Notes/update" method="post" class='update'>
					<input type="hidden" name="id" value="<?= $note['id'] ?>">
					<div class="description" name="content"><?= $note['content'] ?></div>
				</form>
			</div>
		</div>
<?php
	}  ?>