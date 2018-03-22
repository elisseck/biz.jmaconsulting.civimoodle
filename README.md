# biz.jmaconsulting.civimoodle

## Summary
<<<<<<< HEAD
This extension integrates CiviCRM and the Moodle online learning system.
    Users register and pay for courses in CiviCRM, and the registrations are pushed to Moodle.
    Information related to the completion of Moodle units is pulled back to CiviCRM.

## Installation
Git clone or Download and extract this repository into your CiviCRM extensions directory. Navigate to Administer>System Settings>Extensions. If you don't see the extension, click 'Refresh'. Then click 'Install'.

=======
This extension integrates CiviCRM and the Moodle online learning system. 
    Users register and pay for courses in CiviCRM, and the registrations are pushed to Moodle. 
    Information related to the completion of Moodle units is pulled back to CiviCRM.

>>>>>>> c419722... Update README.md
## Use
To connect a CiviCRM Event to a Moodle Course, go to Events>Manage Events>*Your Event*>Info and Settings tab. At the bottom you'll see a list of available courses to associate with that event.

When a user registers for the event, the expected behavior is that user will either a) be found in Moodle and enrolled in the associated course(s), or b) not be found and a new user will be created. The default username is the participants email address (they can change this later if desired) and a welcome email will be sent to that address (from Moodle) so they can manage their new Moodle account.

When a participant is updated to a 'negative' status e.g. cancelled or no-show, the Moodle user will have their enrollment suspended. When a participant is updated to a 'positive' status, the Moodle user will have their enrollment activated.

<<<<<<< HEAD
## Configuration (CiviCRM)
Moodle Web-access Token and Moodle Domain are set in the CiviCRM Moodle Integration page (/civicrm/moodle/setting?reset=1). This page can be found in the CiviCRM menu Administer -> System Settings -> CiviCRM Moodle Integration

## Configuration (Moodle)
To get the Web-access Token noted above, you'll need to set up a Web Service in Moodle following https://docs.moodle.org/20/en/Using_web_services
Under 'Enabling Protocols', you'll need to use REST.
Under 'Creating a Service', it is recommended to check off 'authorised users only', create a single user (either an admin user, or assign appropriate permissions for web services plus the functions below) just for your CiviCRM web service, and then authorize that user.
Under 'Adding functions to the service', your service will need the following functions:
  - core_course_get_courses
  - core_user_create_users
  - core_user_get_users
  - core_user_update_users
  - enrol_manual_enrol_users

=======
## Configuration
Moodle Web-access Token and Moodle Domain are set in the CiviCRM Moodle Integration page (/civicrm/moodle/setting?reset=1). This page can be found in the CiviCRM menu Administer -> System Settings -> CiviCRM Moodle Integration

>>>>>>> c419722... Update README.md
## Known Limitations
*Caution* If a participant is simply deleted, we currently don't handle this case. The logical operation is to un-enroll the Moodle User entirely, but in Moodle this has rather severe consequences in terms of data deletion for un-enrollment so this should be discussed further and decide how exactly to handle it.

*Caution* Users previously enrolled in a Moodle course will not be retro-actively added to the Civi Event. This is a one-way sync from CiviCRM to Moodle only.

*Caution* Moodle will not send automatic emails to existing Moodle users, but Civi Event automated reminders can be configured with tokens to provide this functionality.
<<<<<<< HEAD
=======

>>>>>>> c419722... Update README.md
