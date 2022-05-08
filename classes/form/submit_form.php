<?php

namespace block_vmchecker\form;

use moodleform;

defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir . '/formslib.php');

class submit_form extends moodleform {

    public function definition() {
        $mform = $this->_form;

        // NOTE: Using a custom id for each form element because after a submit all forms are filled in
        //      with the submited form data
        $gitlab_access_token_id = 'gitlab_access_token' . $this->_customdata['assignid'];
        $mform->addElement('text', $gitlab_access_token_id, 'Access token');
        $mform->setType($gitlab_access_token_id, PARAM_RAW);

        $gitlab_project_id = 'gitlab_project_id' . $this->_customdata['assignid'];
        $mform->addElement('text', $gitlab_project_id, 'Project ID');
        $mform->setType($gitlab_project_id, PARAM_INT);

        $mform->addElement('hidden', 'assignid', $this->_customdata['assignid']);
        $mform->setType('assignid', PARAM_RAW);

        $this->add_action_buttons(false, 'Submit');
    }

    function validation($data, $files) {
        return array();
    }
}
