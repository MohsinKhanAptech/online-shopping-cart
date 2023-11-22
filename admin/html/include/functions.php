<?php
function alert($msg)
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
function location($loc)
{
    echo "<script>window.location.href='$loc'</script>";
}
function historyGo($pg = -1)
{
    echo "<script>window.history.go($pg);</script>";
}
