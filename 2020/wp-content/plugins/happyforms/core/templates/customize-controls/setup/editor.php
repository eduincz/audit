<div class="customize-control" id="customize-control-<?php echo $control['field']; ?>">
	<label for="<?php echo $control['field']; ?>" class="customize-control-title"><?php echo $control['label']; ?></label>
	<div data-pointer-target>
		<textarea name="" class="wp-editor-area" id="<?php echo $control['field']; ?>" cols="34" rows="3" data-attribute="<?php echo $control['field']; ?>"><%= <?php echo $control['field']; ?> %></textarea>
	</div>
</div>
