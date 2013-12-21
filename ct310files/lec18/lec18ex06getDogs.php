<?php

   $dogs = array();
   $dogs[0] = array('Name' => 'Snoopy',  'Creator' => 'Schultz', 'Person' => 'Charles Schultz');
   $dogs[1] = array('Name' => 'Gromit',  'Creator' => 'Parks',   'Person' => 'Wallace');
   
   echo json_encode($dogs);
   
   ?>
