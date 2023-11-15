<?php
function alert($msg)
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
function location($loc)
{
    echo "<script>window.location.href='$loc'</script>";
}
function historyBack()
{
    echo "<script>window.history.back();</script>";
}
