  <div class="crm-section">
    <div class="label">{$form.event.label}</div>
    <div class="content">{$form.event.html}</div>
    <p class="description">{ts}Event to sync CiviCRM Participants with Moodle Course. Moodle Course must already be selected in Event settings. Clicking submit will begin the sync and it may take awhile for the page to load, depending on the number of participants{/ts}</p>
    <div class="clear"></div>
  </div>

{* FOOTER *}
<div class="crm-submit-buttons">
{include file="CRM/common/formButtons.tpl" location="bottom"}
</div>
