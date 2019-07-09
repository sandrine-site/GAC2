<?php


return [
  "driver" => "smtp",
  "host" => "smtp.mailtrap.io",
  "port" => 2525,
  "from" => array(
      "address" => "from@example.com",
      "name" => "Example"
  ),
  "username" => "7e8f81ef05c224",
  "password" => "f30836257b9753",
  "sendmail" => "/usr/sbin/sendmail -bs"
];
