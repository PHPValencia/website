<?php

require __DIR__ . '/vendor/autoload.php';

use MeetupImporter\Importer;

$environmentLoader = new \josegonzalez\Dotenv\Loader(__DIR__.'/.env');
$environmentVars = $environmentLoader->parse()->toArray();

$importer = new Importer($environmentVars['API_KEY'], $environmentVars['MEETUP_GROUP_IDENTIFIER']);
$events = $importer->getEvents();

foreach ($events as $event) {

    $content = sprintf('---
title: "%s"
when: "%s"
address: "%s"
meetup: "%s"
section: content
---

%s
', $event->name, $event->timestamp, $event->venue, $event->url, $event->description);

    file_put_contents('source/_events/' . $event->timestamp . '.md', $content);
}