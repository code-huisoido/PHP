<?php
function enclosePerson($name) {
    return function ($doCommand) use ($name) {
        return sprintf("%s,%s\n", $name, $doCommand);
    };
}

$hui = enclosePerson("hui");
echo $hui("come here with me, we are going to play basketball.");