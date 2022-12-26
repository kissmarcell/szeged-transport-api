<?php
require "libs/simple_html_dom.php";
class Event{
    public string $id;
    public string $line;
    // TODO: késés int string helyett
    public string $delay;
    public string $time;
    public string $direction;
    public int $lowfloor;

    public function __construct(string $id, string $line, string $delay, string $time, string $direction, int $lowfloor)
    {
        $this->id = $id;
        $this->line = $line;
        $this->delay = $delay;
        $this->time = $time;
        $this->direction = $direction;
        $this->lowfloor = $lowfloor;
    }

    public static function getSchedule($id, $arriving, $date, $time): array
    {
        $parameters = http_build_query(array(
            "Target" => $id,
            "IsArrival" => $arriving,
            "StopPointSearchDate" => $date."T".$time.".000Z"
        ));
        $context = stream_context_create(
            array("http"=>array(
                'method'  => 'POST',
                'header'  => 'Content-Type: application/x-www-form-urlencoded\n',
                'content' => $parameters
            ))
        );
        $html = file_get_html("http://xmap.szkt.hu/Intercity/LineIndex", false, $context);
        $table = $html->find("table[id=stationLines]", 0);
        $schedule = array();
        foreach ($table->find("tr") as $row){
            // TODO: késés parsolása
            $schedule[]= new Event(
                str_replace(["GetTransDetail('", "')"],"", $row->onclick),
                $row->children[1]->plaintext,
                $row->children[2]->plaintext,
                $row->children[0]->plaintext,
                $row->children[3]->plaintext,
                str_contains($row->class, "low") ? 1 : 0
            );
        }
        return array_slice($schedule, 1);
    }
}