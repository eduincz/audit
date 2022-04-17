<script type="text/template" id="customize-happyforms-checkbox-template">
	<?php include( happyforms_get_core_folder() . '/templates/customize-form-part-header.php' ); ?>
	<p class="label-field-group">
		<label for="<%= instance.id %>_title"><?php _e( 'Label', 'happyforms' ); ?></label>
		<div class="label-group">
			<input type="text" id="<%= instance.id %>_title" class="widefat title" value="<%= instance.label %>" data-bind="label" />
			<div class="happyforms-buttongroup">
				<label for="<%= instance.id %>-label_placement-show">
					<input type="radio" id="<%= instance.id %>-label_placement-show" value="show" name="<%= instance.id %>-label_placement" data-bind="label_placement" <%= ( instance.label_placement == 'show' ) ? 'checked' : '' %> />
					<span><?php _e( 'Show', 'happyforms' ); ?></span>
				</label>
				<label for="<%= instance.id %>-label_placement-hidden">
					<input type="radio" id="<%= instance.id %>-label_placement-hidden" value="hidden" name="<%= instance.id %>-label_placement" data-bind="label_placement" <%= ( instance.label_placement == 'hidden' ) ? 'checked' : '' %> />
					<span><?php _e( 'Hide', 'happyforms' ); ?></span>
				</label>
 			</div>
		</div>
	</p>
	<p>
		<label for="<%= instance.id %>_description"><?php _e( 'Hint', 'happyforms' ); ?></label>
		<textarea id="<%= instance.id %>_description" data-bind="description"><%= instance.description %></textarea>
	</p>

	<?php do_action( 'happyforms_part_customize_checkbox_before_options' ); ?>

	<div class="options">
		<ul class="option-list"></ul>
		<h3><?php _e( 'Choices', 'happyforms' ); ?></h3>
		<p class="no-options description"><?php _e( 'No choices added yet.', 'happyforms' ); ?></p>
	</div>
	<div class="options-import">
		<h3><?php _e( 'Choices', 'happyforms' ); ?></h3>
		<textarea class="option-import-area" cols="30" rows="10" placeholder="<?php _e( 'Type or paste your choices here, adding each on a new line.' ); ?>"></textarea>
	</div>
	<p class="links mode-manual">
		<a href="#" class="button add-option"><?php _e( 'Add choice', 'happyforms' ); ?></a>
		<span class="centered">
			<a href="#" class="import-options"><?php _e( 'Or, bulk add choices', 'happyforms' ); ?></a>
		</span>
	</p>
	<p class="links mode-import">
		<a href="#" class="button import-option"><?php _e( 'Add choices', 'happyforms' ); ?></a>
		<span class="centered">
			<a href="#" class="add-options"><?php _e( 'Cancel', 'happyforms' ); ?></a>
		</span>
	</p>
	<p>
		<label>
			<input type="checkbox" class="checkbox" value="1" <% if ( instance.required ) { %>checked="checked"<% } %> data-bind="required" /> <?php _e( 'Require an answer', 'happyforms' ); ?>
		</label>
	</p>

	<?php do_action( 'happyforms_part_customize_checkbox_after_options' ); ?>

	<?php do_action( 'happyforms_part_customize_checkbox_before_advanced_options' ); ?>

	<% if ( instance.other_option ) { %>
		<p>
			<label>
				<input type="checkbox" class="checkbox" value="1" data-bind="other_option" checked /> <?php _e( 'Add \'other\' choice', 'happyforms' ); ?>
			</label>
		</p>
		<div class="happyforms-nested-settings" data-trigger="other_option" style="display: <%= ( instance.other_option ) ? 'block' : 'none' %>">
			<p>
				<label for="<%= instance.id %>_other_option_label"><?php _e( '\'Other\' label', 'happyforms' ); ?></label>
				<input type="text" id="<%= instance.id %>_other_option_label" maxlength="30" class="widefat title" value="<%= instance.other_option_label %>" data-bind="other_option_label" />
			</p>
			<p>
				<label for="<%= instance.id %>_other_option_placeholder"><?php _e( '\'Other\' placeholder', 'happyforms' ); ?></label>
				<input type="text" id="<%= instance.id %>_other_option_placeholder" maxlength="50" class="widefat title" value="<%= instance.other_option_placeholder %>" data-bind="other_option_placeholder" />
			</p>
		</div>
	<% } %>
	<p>
		<label>
			<input type="checkbox" class="checkbox" value="1" <% if ( instance.shuffle_options ) { %>checked="checked"<% } %> data-bind="shuffle_options" /> <?php _e( 'Shuffle order of choices', 'happyforms' ); ?>
		</label>
	</p>
	<p>
		<label>
			<input type="checkbox" class="checkbox" value="1" <% if ( instance.limit_choices ) { %>checked="checked"<% } %> data-bind="limit_choices" /> <?php _e( 'Limit choices', 'happyforms' ); ?>
		</label>
	</p>
	<div class="happyforms-nested-settings" data-trigger="limit_choices" style="display: <%= ( instance.limit_choices ) ? 'block' : 'none' %>">
		<p>
			<label for="<%= instance.id %>_limit_choices_min"><?php _e( 'Min choices', 'happyforms' ); ?></label>
			<input type="number" id="<%= instance.id %>_limit_choices_min" class="widefat title happyforms-checkbox-limit-min" min="1" value="<%= instance.limit_choices_min %>" data-trigger="limit_choices_min" data-bind="limit_choices_min" />
		</p>
		<p>
			<label for="<%= instance.id %>_limit_choices_max"><?php _e( 'Max choices', 'happyforms' ); ?></label>
			<input type="number" id="<%= instance.id %>_limit_choices_max" class="widefat title happyforms-checkbox-limit-max" min="1" value="<%= instance.limit_choices_max %>" data-trigger="limit_choices_max" data-bind="limit_choices_max" />
		</p>
	</div>
	<p>
		<label for="<%= instance.id %>_display_type"><?php _e( 'Align choices', 'happyforms' ); ?></label>
		<span class="happyforms-buttongroup">
			<label for="<%= instance.id %>-display_type-vertical">
				<input type="radio" id="<%= instance.id %>-display_type-vertical" value="block" name="<%= instance.id %>-display_type" data-bind="display_type" <%= ( instance.display_type == 'block' ) ? 'checked' : '' %> />
				<span><?php _e( 'Vertically', 'happyforms' ); ?></span>
			</label>
			<label for="<%= instance.id %>-display_type-horizontal">
				<input type="radio" id="<%= instance.id %>-display_type-horizontal" value="inline" name="<%= instance.id %>-display_type" data-bind="display_type" <%= ( instance.display_type == 'inline' ) ? 'checked' : '' %> />
				<span><?php _e( 'Horizontally', 'happyforms' ); ?></span>
			</label>
		</span>
	</p>

	<?php happyforms_customize_part_width_control(); ?>

	<?php do_action( 'happyforms_part_customize_checkbox_after_advanced_options' ); ?>

	<p>
		<label for="<%= instance.id %>_css_class"><?php _e( 'Additional CSS class(es)', 'happyforms' ); ?></label>
		<input type="text" id="<%= instance.id %>_css_class" class="widefat title" value="<%= instance.css_class %>" data-bind="css_class" />
	</p>

	<div class="happyforms-part-logic-wrap">
		<div class="happyforms-logic-view">
			<?php happyforms_customize_part_logic(); ?>
		</div>
	</div>

	<?php happyforms_customize_part_footer(); ?>
</script>
<script type="text/template" id="customize-happyforms-checkbox-item-template">
	<li data-option-id="<%= id %>">
		<div class="happyforms-part-item-body">
			<div class="happyforms-part-item-handle"></div>
			<label>
				<?php _e( 'Label', 'happyforms' ); ?>:
				<input type="text" class="widefat" name="label" value="<%= label %>">
			</label>
			<div class="happyforms-part-item-advanced">
				<label>
					<?php _e( 'Hint', 'happyforms' ); ?>:
					<textarea name="description" data-option-attribute="description"><%= description %></textarea>
				</label><br>
				<label>
					<input type="checkbox" name="is_default" value="1" <% if (is_default == 1) { %> checked="checked"<% } %>> <?php _e( 'Make this choice default', 'happyforms' ); ?>
				</label><br>
				<label>
					<input type="checkbox" name="limit_submissions" value="1" class="default-option-switch"<% if ( typeof limit_submissions !== 'undefined' && limit_submissions == 1) { %> checked="checked"<% } %>> <?php _e( 'Limit how many times this choice can be submitted', 'happyforms' ); ?>
				</label>
				<div class="happyforms-nested-settings happyforms-part-item-limit-submission-settings" <% if ( typeof limit_submissions === 'undefined' || limit_submissions != 1 ) { %>style="display: none;"<% } %>>
					<label>
						<?php _e( 'Max submissions', 'happyforms' ); ?>:
						<input type="number" class="widefat" name="limit_submissions_amount" min="1" value="<%= typeof limit_submissions_amount !== 'undefined' ? limit_submissions_amount : '1' %>">
					</label>
					<label>
						<input type="checkbox" name="show_submissions_amount" class="" <% if ( typeof show_submissions_amount !== 'undefined' && show_submissions_amount == 1) { %> checked="checked"<% } %>> <?php _e( 'Show respondents how many remain', 'happyforms' ); ?>
					</label><br>
				</div>
			</div>
			<div class="option-actions">
				<a href="#" class="delete-option"><?php _e( 'Delete', 'happyforms' ); ?></a> |
				<a href="#" class="advanced-option"><?php _e( 'More', 'happyforms' ); ?></a>
			</div>
		</div>
	</li>
</script>
