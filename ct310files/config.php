<?php
/*
*  This page REQUIRES modification when customizing the course template.
*
*  Almost all the vital information is stored in one instance of an object
*  defined below.  The best way to customize a site is change the defaults
*  as appropriate in the object class definition.
*
*  This page also setups session variables, in general this aspect of the file
*  does not require customization.
*
*  Ross Beveridge                                       July 30, 2012
*  
*  Update for CT 310 January 22, 2013
*/

class course_vitals {
   public $designation             = 'CT 310';  /* Probably something like CS 410 */
   public $title                   = 'CT 310 Web Development'; /* Perhaps CS 410 Introduction to Computer Graphics */
   public $term                    = 'Spring 2013';
   public $course_mail             = 'ross@cs.colostate.edu'; /* Perhaps cs410@cs.colostate.edu */
   public $RamCT_link              = 'https://ramct.colostate.edu';
   public $instructor_name         = 'Ross Beveridge';
   public $instructor_home         = 'http://www.cs.colostate.edu/~ross';
   public $instructor_mail         = 'ross@cs.colostate.edu';
   public $instructor_office       = '348 CS Building';
   public $instructor_hours        = '10-11 Mon, 2-3 Wed';
   public $gta_name                = 'Avinash Pallapu';  /* Empty string will drop all listing of GTA info */
   public $gta_home                = 'http://www.cs.colostate.edu/~pallapua';
   public $gta_mail                = 'pallapua@CS.ColoState.EDU';
   public $gta_office              = '245 CS Building Desk 5';
   public $gta_hours               = '8-9 Mon, 9-11 Tue, 11-12 Wed';
   public $lecture_time            = '9:00-9:50';
   public $lecture_days            = 'MWF';
   public $lecture_place           = 'CSB Room 130';
   public $recit1_time             = '3:00-3:50';
   public $recit1_days             = 'Mon';
   public $recit1_place            = 'CSB Room 225';   
   public $recit2_time             = '12:00-12:50';
   public $recit2_days             = 'Fri';
   public $recit2_place            = 'CSB Room 225';
   /* The following variables are used to create the inital progress spreadsheet.
    * They capture, in order, the file used to store the spread sheet, the first sunday
   * of the term, the number of weeks in the term (includes breaks), whether it is
   * a MWF or TTH schedule and whether to include an entry for the final exam.
   * Don't forget to set the first sunday in the constructor, it cannot be specified
   * as a default like the other values.
   */
   public $progress_file = 'progress_spreadsheet.txt';
   public $first_sunday  = '';       /* Set this in the constructor a few lines below! */
   public $n_weeks       = 16;       /* Typically 16 because of either Thanksgiving or Spring break */
   public $days_MWF      = TRUE;     /* If false, then assume a Tuesday Thursday schedule */
   public $final_exam    = '';       /* An extra entry is added if a date is provided. */
    
   function __construct() {
      // $this->first_sunday = new DateTime('2012-08-19', new DateTimeZone('America/Denver'));
      $this->first_sunday = new DateTime('2013-01-20', new DateTimeZone('America/Denver'));
   }
}
 
class course_internals {
   public $logo_image      = 'ct310logo08.png';       /* Assumed to be in res_images folder */
   public $https_server    = 'www.cs.colostate.edu'; /* Force HTTPS login on this sever */
   public $pass_salt       = 'ct310';                /* Used to salt passwords */
   public $session_name    = 'CT310Spring2013';        /* Do change this to avoid matching other courses */
}

/* Becuase this file is ALWAYS included in pages the two objects below act as globals */

$vitals    = new course_vitals();
$internals = new course_internals();
?>
