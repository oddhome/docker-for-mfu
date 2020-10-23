<?php
if (isset($_ENV["MESSAGE"]))
{
    echo $_ENV["MESSAGE"];
}
else
{
    echo "Hello World";
}

?>