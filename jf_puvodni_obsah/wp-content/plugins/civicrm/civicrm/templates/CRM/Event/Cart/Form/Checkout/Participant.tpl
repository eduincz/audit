  {assign var=event_id value=$participant->event_id}
  {assign var=participant_id value=$participant->id}
  <fieldset class="participant" id="event_{$event_id}_participant_{$participant_id}">
    <legend>
      {assign var=name value="event[`$event_id`][participant][`$participant_id`][number]"}
      {$custom.$name}
    </legend>
	<div class="clearfix">
          {assign var=pre value="event[`$event_id`][participant][`$participant_id`][customPre]"}
          {include file="CRM/UF/Form/Block.tpl" fields=$custom.$pre form=$form.field.$participant_id}

	  <div class="participant-info crm-section form-item">
	    <div class="label">
              {$form.event.$event_id.participant.$participant_id.email.label}
	    </div>
	    <div class="edit-value content">
              {$form.event.$event_id.participant.$participant_id.email.html}
	    </div>
	  </div>

	  <div class="participant-info crm-section form-item">
	    <div class="label">
              {$form.event.$event_id.participant.$participant_id.first_name.label}
	    </div>
	    <div class="edit-value content">
              {$form.event.$event_id.participant.$participant_id.first_name.html}
	    </div>
	  </div>

	  <div class="participant-info crm-section form-item">
	    <div class="label">
              {$form.event.$event_id.participant.$participant_id.last_name.label}
	    </div>
	    <div class="edit-value content">
              {$form.event.$event_id.participant.$participant_id.last_name.html}
	    </div>
	  </div>

          {assign var=post value="event[`$event_id`][participant][`$participant_id`][customPost]"}
          {include file="CRM/UF/Form/Block.tpl" fields=$custom.$post form=$form.field.$participant_id}
	</div>
    <!--if $form_participant->participant_index > 0-->
    <a class="link-delete" href="#" onclick="delete_participant({$event_id}, {$participant_id}); return false;">Delete {$form->name}</a>
  </fieldset>
