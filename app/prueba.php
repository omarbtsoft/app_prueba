<?php

  function VerificarRuta($nombreRuta) : string  {

    return request()->routeIs($nombreRuta)? "active":"";
  }
?>
