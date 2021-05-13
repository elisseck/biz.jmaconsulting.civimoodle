<?php

require_once 'CRM/Core/Form.php';

/**
 * Form controller class
 *
 * @see http://wiki.civicrm.org/confluence/display/CRMDOC43/QuickForm+Reference
 */
class CRM_Civimoodle_Form_Sync extends CRM_Core_Form {

  /**
   * Set variables up before form is built.
   */
  public function preProcess() {
    if (!CRM_Core_Permission::check('administer CiviCRM')) {
      CRM_Core_Error::fatal(ts('You do not permission to access this page, please contact your system administrator.'));
    }
  }

  public function buildQuickForm() {
    $this->addEntityRef('event',
      ts('Event to Sync'),
      array(
        'entity' => 'Event',
        'placeholder' => ts('- Select Event -'),
        'select' => array('minimumInputLength' => 0),
      )
    );

    $this->addButtons(array(
      array(
        'type' => 'submit',
        'name' => ts('Submit'),
        'isDefault' => TRUE,
      ),
    ));

    parent::buildQuickForm();
  }

  public function postProcess() {
    $values = $this->exportValues();
    $event = CRM_Utils_Array::value('event', $values);
    $participantContacts = civicrm_api3('Participant', 'get', array(
      'sequential' => 1,
      'return' => array("contact_id"),
      'event_id' => $event,
      'options' => array('limit' => 0),
    ));
    $courseCheck = 0;
    $parCheck = 0;
    $courses = CRM_Civimoodle_Util::getCoursesFromEvent($event);
    if (isset($courses) && count($courses) > 0) {
      $courseCheck = 1;
      foreach ($participantContacts['values'] as $contact) {
        // create/update moodle user based on CiviCRM contact ID information
        $userID = CRM_Civimoodle_Util::createUser($contact['contact_id']);
        // enroll user of given $userID to multiple courses $courses
        if (!empty($userID)) {
          CRM_Civimoodle_Util::enrollUser($courses, $userID);
          $parCheck = $parCheck + 1;
        }
      }
    }
    if ($courseCheck == 0) {
      CRM_Core_Session::setStatus(ts("Selected event has no courses associated with it"), ts('Error'), 'error');
    }
    elseif (Civi::settings()->get('moodle_access_token') == NULL || Civi::settings()->get('moodle_domain') == NULL) {
      CRM_Core_Session::setStatus(ts("Moodle access token or domain not set"), ts('Error'), 'error');
    }
    else {
      CRM_Core_Session::setStatus($parCheck . ts(" participants enrolled. This number may include participants already enrolled"), ts('Success'), 'success');
    }
    CRM_Utils_System::redirect(CRM_Utils_System::url('civicrm', 'reset=1'));
  }

}
