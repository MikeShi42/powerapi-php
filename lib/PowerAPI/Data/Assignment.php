<?php

namespace PowerAPI\Data;

/** Class used to hold assignment details.
 * @property array $category name of the assignment's category
 * @property array $description assignment's description
 * @property string $name assignment's name
 * @property string $score assignment's score as defined by the teacher
 * @property string $pointspossible assignment's total possible score as defined by the teacher
 * @property array $percent assignment's score out of 100
*/
class Assignment extends BaseObject
{
    /**
     * Parses the assignment details and populates the internal details store
     * @param array $details the details to be stored
     * @return void
     */
    public function __construct($details)
    {
        //var_dump($details);
        $this->details['date'] = \DateTime::createFromFormat("Y-m-d*H:i:s.uT", $details['assignment']->dueDate);
        //$this->details['realDate'] = $details['assignment']->dueDate;
        $this->details['category'] = $details['category']->name;
        $this->details['description'] = $details['assignment']->description;
        $this->details['name'] = $details['assignment']->name;
        if ($details['score'] !== null) {
            $this->details['percent'] = $details['score']->percent;
            $this->details['score'] = $details['score']->score;
        } else {
            $this->details['percent'] = null;
            $this->details['score'] = null;
        }
        if($details['assignment']->pointspossible !== null){
            $this->details['pointspossible'] = $details['assignment']->pointspossible;
        } else {
            $this->details['pointspossible'] = null;
        }
    }
}
