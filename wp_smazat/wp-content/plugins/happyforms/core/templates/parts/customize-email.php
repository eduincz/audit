<script type="text/template" id="customize-happyforms-email-template">
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

	<?php do_action( 'happyforms_part_customize_email_before_options' ); ?>

	<p>
		<label>
			<input type="checkbox" class="checkbox" value="1" <% if ( instance.required ) { %>checked="checked"<% } %> data-bind="required" /> <?php _e( 'This is required', 'happyforms' ); ?>
		</label>
	</p>

	<?php do_action( 'happyforms_part_customize_email_after_options' ); ?>

	<div class="happyforms-part-advanced-settings-wrap">
		<?php do_action( 'happyforms_part_customize_email_before_advanced_options' ); ?>

		<p style="display: <%= ( instance.suffix.length ) ? 'none' : 'block' %>">
			<label>
				<input type="checkbox" class="checkbox" value="1" <% if ( instance.autocomplete_domains ) { %>checked="checked"<% } %> data-bind="autocomplete_domains" /> <?php _e( 'Suggest common email domains', 'happyforms' ); ?>
			</label>
		</p>
		<p>
			<label>
				<input type="checkbox" class="checkbox confirmation-checkbox" value="1" <% if ( instance.confirmation_field ) { %>checked="checked"<% } %> data-bind="confirmation_field" /> <?php _e( 'Require confirmation', 'happyforms' ); ?>
			</label>
		</p>
		<div class="happyforms-nested-settings" data-trigger="confirmation_field" style="display: <%= (instance.confirmation_field == 1) ? 'block' : 'none' %>">
			<p>
				<label for="<%= instance.id %>_confirmation_field_label"><?php _e( '\'Confirmation\' label', 'happyforms' ); ?></label>
				<input type="text" id="<%= instance.id %>_confirmation_field_label" class="widefat title" value="<%= instance.confirmation_field_label %>" data-bind="confirmation_field_label" />
			</p>
			<p>
				<label for="<%= instance.id %>_confirmation_field_placeholder"><?php _e( '\'Confirmation\' placeholder', 'happyforms' ); ?></label>
				<input type="text" id="<%= instance.id %>_confirmation_field_placeholder" class="widefat title" value="<%= instance.confirmation_field_placeholder %>" data-bind="confirmation_field_placeholder" />
			</p>
		</div>

		<p>
			<label for="<%= instance.id %>_suffix"><?php _e( 'Suffix', 'happyforms' ); ?></label>
			<input type="text" id="<%= instance.id %>_suffix" class="widefat title" value="<%= instance.suffix %>" data-bind="suffix" maxlength="50" />
		</p>

		<?php happyforms_customize_part_width_control(); ?>

		<?php do_action( 'happyforms_part_customize_email_after_advanced_options' ); ?>

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
