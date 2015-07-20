		<?php foreach($notes as $note) { ?>
		<div id='note'>
			<h3><?= $note['title']?></h3>
			<form action='/notes/delete' method='post' class='delete_form'>
				<input type='hidden' name='id' value='<?= $note["id"]?>'>
				<input type='submit' id='delete' value='delete'>
			</form>
			<form action='/notes/update' method='post' class='update_form'>
				<input type='hidden' name='id' value='<?= $note["id"]?>'>
				<?php if($note['description']==NULL) { ?>
				<textarea placeholder = 'Enter description here...' name='description'></textarea>
				<?php } else { ?>
				<textarea name='description'><?= $note['description']?></textarea>
				<?php } ?>
			</form>
		</div>
		<?php } ?>