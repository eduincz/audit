<script type="text/template" id="customize-happyforms-single-line-text-template">
	<?php include( happyforms_get_core_folder() . '/templates/customize-form-part-header.php' ); ?>
	<p>
		<label for="<%= instance.id %>_title"><?php _e( 'Label', 'happyforms' ); ?></label>
		<input type="text" id="<%= instance.id %>_title" class="widefat title" value="<%= instance.label %>" data-bind="label" />
	</p>
	<p class="happyforms-placeholder-option" style="display: <%= ( 'as_placeholder' !== instance.label_placement ) ? 'block' : 'none' %>">
		<label for="<%= instance.id %>_placeholder"><?php _e( 'Placeholder', 'happyforms' ); ?></label>
		<input type="text" id="<%= instance.id %>_placeholder" class="widefat title" value="<%= instance.placeholder %>" data-bind="placeholder" />
	</p>
	<p>
		<label for="<%= instance.id %>_description"><?php _e( 'Description', 'happyforms' ); ?></label>
		<textarea id="<%= instance.id %>_description" data-bind="description"><%= instance.description %></textarea>
	</p>

	<?php do_action( 'happyforms_part_customize_single_line_text_before_options' ); ?>

	<p>
		<label>
			<input type="checkbox" class="checkbox" value="1" <% if ( instance.required ) { %>checked="checked"<% } %> data-bind="required" /> <?php _e( 'This is required', 'happyforms' ); ?>
		</label>
	</p>

	<?php do_action( 'happyforms_part_customize_single_line_text_after_options' ); ?>

	<div class="happyforms-part-advanced-settings-wrap">
		<?php do_action( 'happyforms_part_customize_single_line_text_before_advanced_options' ); ?>

		<p>
			<label for="<%= instance.id %>_prefix"><?php _e( 'Prefix', 'happyforms' ); ?></label>
			<input type="text" id="<%= instance.id %>_prefix" class="widefat title" value="<%= instance.prefix %>" data-bind="prefix" maxlength="50" />
		</p>

		<p>
			<label for="<%= instance.id %>_suffix"><?php _e( 'Suffix', 'happyforms' ); ?></label>
			<input type="text" id="<%= instance.id %>_suffix" class="widefat title" value="<%= instance.suffix %>" data-bind="suffix" maxlength="50" />
		</p>

		<?php happyforms_customize_part_width_control(); ?>

		<?php do_action( 'happyforms_part_customize_single_line_text_after_advanced_options' ); ?>

		<p>
			<label for="<%= instance.id %>_css_class"><?php _e( 'CSS classes', 'happyforms' ); ?></label>
			<input type="text" id="<%= instance.id %>_css_class" class="widefat title" value="<%= instance.css_class %>" data-bind="css_class" />
		</p>
	</div>

	<div class="happyforms-part-logic-wrap">
		<div class="happyforms-logic-view">
			<?php happyforms_customize_part_logic(); ?>
		</div>
	</div>

	<?php happyforms_customize_part_footer(); ?>
</script>
