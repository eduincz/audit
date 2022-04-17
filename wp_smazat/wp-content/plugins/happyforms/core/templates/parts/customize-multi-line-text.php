<script type="text/template" id="customize-happyforms-multi-line-text-template">
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

	<?php do_action( 'happyforms_part_customize_multi_line_text_before_options' ); ?>

	<p>
		<label>
			<input type="checkbox" class="checkbox" value="1" <% if ( instance.required ) { %>checked="checked"<% } %> data-bind="required" /> <?php _e( 'This is required', 'happyforms' ); ?>
		</label>
	</p>

	<?php do_action( 'happyforms_part_customize_multi_line_text_after_options' ); ?>

	<div class="happyforms-part-advanced-settings-wrap">
		<?php do_action( 'happyforms_part_customize_multi_line_text_before_advanced_options' ); ?>

		<p>
			<label>
				<input type="checkbox" class="checkbox" value="1" <% if ( instance.limit_input ) { %>checked="checked"<% } %> data-bind="limit_input" /> <?php _e( 'Limit words/characters', 'happyforms' ); ?>
			</label>
		</p>

		<div class="happyforms-nested-settings character-limit-settings" <% if ( ! instance.limit_input ) { %>style="display: none;"<% } %>>
			<p>
				<label for="<%= instance.id %>_character_limit"><?php _e( 'Limit', 'happyforms' ); ?></label>
				<input type="number" id="<%= instance.id %>_character_limit" class="widefat title" step="1" min="1" value="<%= instance.character_limit %>" data-bind="character_limit" />
			</p>
			<p>
				<label for="<%= instance.id %>_character_limit_mode"><?php _e( 'Count', 'happyforms' ); ?></label>
				<select id="<%= instance.id %>_character_limit_mode" data-bind="character_limit_mode">
					<option value="word_max"<%= (instance.character_limit_mode == 'word_max') ? ' selected' : '' %>><?php _e( 'Max words', 'happyforms' ); ?></option>
					<option value="word_min"<%= (instance.character_limit_mode == 'word_min') ? ' selected' : '' %>><?php _e( 'Min words', 'happyforms' ); ?></option>
					<option value="character_max"<%= (instance.character_limit_mode == 'character_max') ? ' selected' : '' %>><?php _e( 'Max characters', 'happyforms' ); ?></option>
					<option value="character_min"<%= (instance.character_limit_mode == 'character_min') ? ' selected' : '' %>><?php _e( 'Min characters', 'happyforms' ); ?></option>
				</select>
			</p>
			<p class="character-limit__characters-label" style="display: <%= ( 'character_min' === instance.character_limit_mode || 'character_max' === instance.character_limit_mode ) ? 'block' : 'none' %>">
				<label for="<%= instance.id %>_characters_label"><?php _e( '\'Characters\' label', 'happyforms' ); ?></label>
				<input type="text" id="<%= instance.id %>_characters_label" class="widefat title" value="<%= instance.characters_label %>" data-bind="characters_label" />
			</p>
			<p class="character-limit__words-label" style="display: <%= ( 'word_max' === instance.character_limit_mode || 'word_min' === instance.character_limit_mode ) ? 'block' : 'none' %>">
				<label for="<%= instance.id %>_words_label"><?php _e( '\'Words\' label', 'happyforms' ); ?></label>
				<input type="text" id="<%= instance.id %>_words_label" class="widefat title" value="<%= instance.words_label %>" data-bind="words_label" />
			</p>
		</div>

		<p>
			<label for="<%= instance.id %>_rows"><?php _e( 'Rows', 'happyforms' ); ?></label>
			<input type="number" id="<%= instance.id %>_rows" min="5" max="20" class="widefat title" value="<%= instance.rows %>" data-bind="rows" />
		</p>

		<?php happyforms_customize_part_width_control(); ?>

		<?php do_action( 'happyforms_part_customize_multi_line_text_after_advanced_options' ); ?>

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
