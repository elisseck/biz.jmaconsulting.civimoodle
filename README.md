# biz.jmaconsulting.civimoodle

This extension integrates CiviCRM and the Moodle online learning system. 
    Users register and pay for courses in CiviCRM, and the registrations are pushed to Moodle. 
    Information related to the completion of Moodle units is pulled back to CiviCRM.

To connect a CiviCRM Event to a Moodle Course, go to Events>Manage Events>*Your Event*>Info and Settings tab. At the bottom you'll see a list of available courses to associate with that event.

When a user registers for the event, the expected behavior is that user will either a) be found in Moodle and enrolled in the associated course(s), or b) not be found and a new user will be created. The default username is the participants email address (they can change this later if desired) and a welcome email will be sent to that address (from Moodle) so they can manage their new Moodle account.

When a participant is updated to a 'negative' status e.g. cancelled or no-show, the Moodle user will have their enrollment suspended. When a participant is updated to a 'positive' status, the Moodle user will have their enrollment activated.

*Caution* If a participant is simply deleted, we currently don't handle this case. The logical operation is to un-enroll the Moodle User entirely, but in Moodle this has rather severe consequences in terms of data deletion for un-enrollment so this should be discussed further and decide how exactly to handle it.

*Caution* Users previously enrolled in a Moodle course will not be retro-actively added to the Civi Event. This is a one-way sync from CiviCRM to Moodle only.

