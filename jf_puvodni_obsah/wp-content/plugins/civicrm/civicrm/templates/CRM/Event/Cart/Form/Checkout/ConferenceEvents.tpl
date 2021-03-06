{include file="CRM/common/TrackingFields.tpl"}

{capture assign='reqMark'}<span class="marker"  title="{ts}This field is required.{/ts}">*</span>{/capture}

<h3>Choose Events For {$mer_participant->first_name} {$mer_participant->last_name} ({$mer_participant->email})</h3>

{foreach from=$slot_fields key=slot_name item=field_name}
  <fieldset>
    <legend>
      {$slot_name}
    </legend>
    <div class="slot_options">
      <ul class="indented">
        {$form.$field_name.html}
        <span class="crm-clear-link">(<a href="#" title="unselect" onclick="unselectRadio('{$field_name}', '{$form.formName}'); return false;">{ts}clear{/ts}</a>)</span>
      </ul>
    </div>
  </fieldset>
{/foreach}    

<script type="text/javascript">
var session_options = {$session_options};
{literal}
for (var radio_id in session_options)
{
  var info = session_options[radio_id];
  var label_sel = "label[for=" + radio_id + "]";
  cj("#"+radio_id +","+ label_sel).wrapAll("<li>");
  if (info.session_full) {
    cj("#"+radio_id).attr('disabled', 'disabled');
    cj("#"+radio_id).after('<span class="error">Session is Full: </span>');
  }
  var more = cj('<a href="#">more info</a>').click(function(event) {
    event.preventDefault();
    var nfo = cj(this).data("session_info");//F-!
    cj("<div style='font-size: 90%;'>" + nfo.session_description + "</div>").dialog({
      title: nfo.session_title,
      resizable: false,
      draggable: false,
      width: 600,
      modal: true
    });
  });
  more.data("session_info", info);
  cj(label_sel).append(" ", more);
}
{/literal}
</script>

<div id="crm-submit-buttons" class="crm-submit-buttons">
  {include file="CRM/common/formButtons.tpl" location="bottom"}
</div>

{include file="CRM/Event/Cart/Form/viewCartLink.tpl"}
