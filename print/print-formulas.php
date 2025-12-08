<?php

//nitrogen requirements

function nitrogenRequirementHRWS($nitrogen)
{
  if ($nitrogen < 1.7) {
    return 100;
  } elseif ($nitrogen >= 1.7 && $nitrogen <= 3) {
    return 80;
  } else {
    return 60;
  }
}

function nitrogenRequirementHRDS($nitrogen)
{
  if ($nitrogen < 1.7) {
    return 140;
  } elseif ($nitrogen >= 1.7 && $nitrogen <= 3) {
    return 120;
  } else {
    return 100;
  }
}

function nitrogenRequirementIRWS($nitrogen)
{
  if ($nitrogen < 1.7) {
    return 80;
  } elseif ($nitrogen >= 1.7 && $nitrogen <= 3) {
    return 60;
  } else {
    return 40;
  }
}

function nitrogenRequirementIRDS($nitrogen)
{
  if ($nitrogen < 1.7) {
    return 100;
  } elseif ($nitrogen >= 1.7 && $nitrogen <= 3) {
    return 80;
  } else {
    return 60;
  }
}

//phosphorus
function phosphorusRequirementALL($phosphorus)
{
  if ($phosphorus < 7) {
    return 30;
  } elseif ($phosphorus >= 7 && $phosphorus <= 25) {
    return 20;
  } else {
    return 10;
  }
}

//potassium
function potassiumRequirementALL($potassium)
{
  if ($potassium < 118) {
    return 60;
  } elseif ($potassium >= 118 && $potassium <= 200) {
    return 45;
  } else {
    return 30;
  }
}

//organic fertilizer
function organicFertilizerALL($nitrogen)
{
  if ($nitrogen <= 3) {
    return 20;
  } else {
    return 10;
  }
}

//Ammounium Phosphate

function ammoniumPhosphateHRWS($nitrogen, $phosphorus)
{
  $nitr_req = nitrogenRequirementHRWS($nitrogen);
  $phos_req = phosphorusRequirementALL($phosphorus);

  if (($nitr_req == 80 || $nitr_req == 60) && $phos_req == 30) {
    return 3;
  } elseif ($nitr_req == 60 && $phos_req == 20) {
    return 2;
  } else {
    return 0;
  }
}

function ammoniumPhosphateHRDS($nitrogen, $phosphorus)
{
  $nitr_req = nitrogenRequirementHRDS($nitrogen);
  $phos_req = phosphorusRequirementALL($phosphorus);

  if ($nitr_req == 120 && $phos_req == 30) {
    return 3;
  } else {
    return 0;
  }
}

function ammoniumPhosphateIRWS($nitrogen, $phosphorus)
{
  $nitr_req = nitrogenRequirementIRWS($nitrogen);
  $phos_req = phosphorusRequirementALL($phosphorus);

  if (($nitr_req == 80 || $nitr_req == 60 || $nitr_req == 40) && $phos_req == 30) {
    return 3;
  } elseif ($nitr_req == 40 && $phos_req == 20) {
    return 2;
  } elseif ($nitr_req == 60 && $phos_req == 10) {
    return 1;
  } else {
    return 0;
  }
}

function ammoniumPhosphateIRDS($nitrogen, $phosphorus)
{
  $nitr_req = nitrogenRequirementIRDS($nitrogen);
  $phos_req = phosphorusRequirementALL($phosphorus);

  if (($nitr_req == 80 || $nitr_req == 60) && $phos_req == 30) {
    return 3;
  } elseif ($nitr_req == 60 && $phos_req == 20) {
    return 2;
  } else {
    return 0;
  }
}

//Urea (Transplant)
function ureaTransplantHRWS($nitrogen, $phosphorus)
{
  $nitr_req = nitrogenRequirementHRWS($nitrogen);
  $phos_req = phosphorusRequirementALL($phosphorus);

  if ($nitr_req == 100 && $phos_req == 10) {
    return 1;
  } elseif (($nitr_req == 100 && $phos_req == 20) || ($nitr_req < 100 && $phos_req == 10)) {
    return 0.5;
  } elseif ($nitr_req == 80 && $phos_req == 20) {
    return 0.25;
  } else {
    return 0;
  }
}

function ureaTransplantHRDS($nitrogen, $phosphorus)
{
  $nitr_req = nitrogenRequirementHRDS($nitrogen);
  $phos_req = phosphorusRequirementALL($phosphorus);

  if ($nitr_req == 140 && $phos_req == 10) {
    return 1.5;
  } elseif (($nitr_req == 140 && $phos_req == 20) || ($nitr_req < 140 && $phos_req == 10)) {
    return 1;
  } elseif ($nitr_req == 120 && $phos_req == 20) {
    return 0.75;
  } elseif (($nitr_req >= 120 && $phos_req == 30) || ($nitr_req == 100 && $phos_req == 20)) {
    return 0.5;
  } else {
    return 0;
  }
}

function ureaTransplantIRWS($nitrogen, $phosphorus)
{
  $nitr_req = nitrogenRequirementIRWS($nitrogen);
  $phos_req = phosphorusRequirementALL($phosphorus);

  if ($nitr_req >= 60 && $phos_req == 10) {
    return 0.5;
  } elseif ($nitr_req == 80 && $phos_req == 20) {
    return 0.25;
  } else {
    return 0;
  }
}

function ureaTransplantIRDS($nitrogen, $phosphorus)
{
  $nitr_req = nitrogenRequirementHRWS($nitrogen);
  $phos_req = phosphorusRequirementALL($phosphorus);

  if ($nitr_req == 100 && $phos_req == 10) {
    return 1;
  } elseif (($nitr_req == 100 && $phos_req == 20) || ($nitr_req < 100 && $phos_req == 10)) {
    return 0.5;
  } elseif ($nitr_req == 80 && $phos_req == 20) {
    return 0.25;
  } else {
    return 0;
  }
}

//Complete
function completeHRWS($nitrogen, $phosphorus, $potassium)
{
  $nitr_req = nitrogenRequirementHRWS($nitrogen);
  $phos_req = phosphorusRequirementALL($phosphorus);
  $pota_req = potassiumRequirementALL($potassium);

  if ($phos_req == 30) {
    if ($nitr_req == 100) {
      return 4.25;
    }
  } elseif ($phos_req == 20) {
    if ($nitr_req >= 80) {
      return 3;
    } elseif ($nitr_req == 60 && $pota_req == 60) {
      return 3;
    }
  } elseif ($phos_req == 10) {
    return 1.5;
  } else {
    return 0;
  }
}

function completeHRDS($nitrogen, $phosphorus)
{
  $nitr_req = nitrogenRequirementHRDS($nitrogen);
  $phos_req = phosphorusRequirementALL($phosphorus);

  if ($phos_req == 30) {
    if ($nitr_req != 120) {
      return 4.25;
    }
  } elseif ($phos_req == 20) {
    return 3;
  } elseif ($phos_req == 10) {
    return 1.5;
  } else {
    return 0;
  }
}

function completeIRWS($nitrogen, $phosphorus, $potassium)
{
  $nitr_req = nitrogenRequirementHRWS($nitrogen);
  $phos_req = phosphorusRequirementALL($phosphorus);
  $pota_req = potassiumRequirementALL($potassium);

  if ($nitr_req == 80 && $phos_req == 30) {
    if ($pota_req == 30) {
      return 4.25;
    } elseif ($pota_req == 45) {
      return 3;
    }
  } elseif ($phos_req == 20 && $pota_req == 60) {
    if ($nitr_req >= 60) {
      return 3;
    }
  } elseif ($nitr_req == 40 && $phos_req == 10) {
    if ($pota_req == 60) {
      return 1.75;
    } elseif ($pota_req == 45) {
      return 1.5;
    }
  } elseif ($nitr_req >= 40 && $phos_req == 10) {
    return 1.5;
  } else {
    return 0;
  }
}

function completeIRDS($nitrogen, $phosphorus, $potassium)
{
  $nitr_req = nitrogenRequirementIRDS($nitrogen);
  $phos_req = phosphorusRequirementALL($phosphorus);
  $pota_req = potassiumRequirementALL($potassium);

  if ($phos_req == 30) {
    if ($nitr_req == 100) {
      return 4.25;
    }
  } elseif ($phos_req == 20) {
    if ($nitr_req >= 80) {
      return 3;
    } elseif ($nitr_req == 60 && $pota_req == 60) {
      return 3;
    }
  } elseif ($phos_req == 10) {
    return 1.5;
  } else {
    return 0;
  }
}

//Muriate of Potash (Transplant)
function muriateOfPotashTransplantHRWS($nitrogen, $phosphorus, $potassium)
{
  $nitr_req = nitrogenRequirementHRWS($nitrogen);
  $phos_req = phosphorusRequirementALL($phosphorus);
  $pota_req = potassiumRequirementALL($potassium);

  if ($nitr_req == 100 && $phos_req == 30 && $pota_req <= 45) {
    return 0.5;
  } elseif ((($nitr_req == 100) && (($phos_req == 20 && $pota_req == 45) ||
      ($phos_req == 10 && $pota_req <= 45))) ||
    (($nitr_req == 80) && ($pota_req == 30) && ($phos_req <= 20))
  ) {
    return 0.75;
  } elseif (($nitr_req == 100) && ($phos_req == 30) && ($pota_req == 60)) {
    return 1;
  } elseif (($pota_req == 60) && ($phos_req == 30) && ($nitr_req <= 80)) {
    return 2;
  } elseif (($nitr_req == 60) && ($phos_req == 20) && ($pota_req == 45)) {
    return 1.5;
  } elseif (($phos_req == 10) && ($nitr_req == 60 && $pota_req == 45 || $pota_req == 60 && $nitr_req >= 80)) {
    return 1.75;
  } else {
    return 1.25;
  }
}

function muriateOfPotashTransplantHRDS($nitrogen, $phosphorus, $potassium)
{
  $nitr_req = nitrogenRequirementHRDS($nitrogen);
  $phos_req = phosphorusRequirementALL($phosphorus);
  $pota_req = potassiumRequirementALL($potassium);

  if (($nitr_req == 140) && ($phos_req == 30) && ($pota_req <= 45)) {
    return 0.5;
  } elseif (($pota_req == 45) && ($phos_req == 20) && ($nitr_req <= 120) || ($pota_req == 30) && ($phos_req == 10) && ($nitr_req >= 120)
  ) {
    return 0.75;
  } elseif (($pota_req == 60) && ($phos_req == 30) && ($nitr_req >= 100) && ($nitr_req != 120)) {
    return 1;
  } elseif (($nitr_req == 120) && ($phos_req == 30) && ($pota_req == 60)) {
    return 2;
  } elseif (($phos_req == 10) && ($pota_req == 60) && ($nitr_req >= 100)) {
    return 1.75;
  } else {
    return 1.25;
  }
}

function muriateOfPotashTransplantIRWS($nitrogen, $phosphorus, $potassium)
{
  $nitr_req = nitrogenRequirementIRWS($nitrogen);
  $phos_req = phosphorusRequirementALL($phosphorus);
  $pota_req = potassiumRequirementALL($potassium);

  if (($nitr_req == 80) && ($phos_req == 30) && ($pota_req == 30)) {
    return 0;
  } elseif (($nitr_req == 80) && ($phos_req == 30) && ($pota_req == 45)) {
    return 0.5;
  } elseif (($nitr_req == 80) && ($phos_req == 10) && ($pota_req == 30)) {
    return 0.75;
  } elseif (($nitr_req == 60) && ($phos_req == 10) && ($pota_req <= 45)) {
    return 1;
  } elseif (($pota_req == 45) && ($phos_req <= 20) && ($nitr_req <= 60)) {
    return 1.5;
  } elseif (($pota_req == 60) && ($phos_req == 10) && ($nitr_req >= 60)) {
    return 1.75;
  } elseif (($pota_req == 60) && ($phos_req == 30 || ($phos_req == 20 && $nitr_req != 60))) {
    return 2;
  } else {
    return 1.25;
  }
}

function muriateOfPotashTransplantIRDS($nitrogen, $phosphorus, $potassium)
{
  $nitr_req = nitrogenRequirementIRDS($nitrogen);
  $phos_req = phosphorusRequirementALL($phosphorus);
  $pota_req = potassiumRequirementALL($potassium);

  if ($nitr_req == 100 && $phos_req == 30 && $pota_req <= 45) {
    return 0.5;
  } elseif ((($nitr_req == 100) && (($phos_req == 20 && $pota_req == 45) ||
      ($phos_req == 10 && $pota_req <= 45))) ||
    (($nitr_req == 80) && ($pota_req == 30) && ($phos_req <= 20))
  ) {
    return 0.75;
  } elseif (($nitr_req == 100) && ($phos_req == 30) && ($pota_req == 60)) {
    return 1;
  } elseif (($pota_req == 60) && ($phos_req == 30) && ($nitr_req <= 80)) {
    return 2;
  } elseif (($nitr_req == 60) && ($phos_req == 20) && ($pota_req == 45)) {
    return 1.5;
  } elseif (($phos_req == 10) && ($nitr_req == 60 && $pota_req == 45 || $pota_req == 60 && $nitr_req >= 80)) {
    return 1.75;
  } else {
    return 1.25;
  }
}

//Ammonium Sulphate after transplant

function ammoniumPhosphateAfterTransplantHRWS($nitrogen, $phosphorus, $potassium)
{
  $nitr_req = nitrogenRequirementHRWS($nitrogen);
  $phos_req = phosphorusRequirementALL($phosphorus);
  $pota_req = potassiumRequirementALL($potassium);

  if (($nitr_req == 140) && ($phos_req == 30) && ($pota_req == 30)) {
    return 0.5;
  } elseif ((($nitr_req == 100 && $phos_req == 20) ||
      ($nitr_req == 120 && ($phos_req == 10 || $phos_req == 20))) && ($pota_req == 45) ||
    ($phos_req == 10 && $pota_req == 30 && $nitr_req >= 120)
  ) {
    return 0.75;
  } elseif (($phos_req == 30) && (($nitr_req == 100 && $pota_req == 60) || ($nitr_req == 140 && $pota_req >= 45))) {
    return 1;
  } elseif (($nitr_req == 120) && ($phos_req == 30) && ($pota_req == 60)) {
    return 2;
  } elseif (($phos_req == 10) && ($pota_req == 60) && ($nitr_req >= 100)) {
    return 1.75;
  } else {
    return 1.25;
  }
}

function ammoniumPhosphateAfterTransplantHRDS($nitrogen, $phosphorus, $potassium)
{
  $nitr_req = nitrogenRequirementHRDS($nitrogen);
  $phos_req = phosphorusRequirementALL($phosphorus);
  $pota_req = potassiumRequirementALL($potassium);

  if (($nitr_req == 100) && (($phos_req == 20 && $pota_req == 45) || ($phos_req == 30 && $pota_req == 60)) ||
    ($nitr_req == 120) && (($phos_req == 10 && $pota_req >= 45) || ($phos_req == 20 && $pota_req == 60))
  ) {
    return 1.25;
  } else {
    return 1;
  }
}

function ammoniumPhosphateAfterTransplantIRWS($nitrogen, $phosphorus, $potassium)
{
  $nitr_req = nitrogenRequirementIRWS($nitrogen);

  if ($nitr_req == 80) {
    return 0.75;
  } else {
    return 0.5;
  }
}

function ammoniumPhosphateAfterTransplantIRDS($nitrogen, $phosphorus, $potassium)
{
  $nitr_req = nitrogenRequirementIRDS($nitrogen);
  $phos_req = phosphorusRequirementALL($phosphorus);
  $pota_req = potassiumRequirementALL($potassium);

  if (($nitr_req == 140) && ($phos_req == 30) && ($pota_req == 30)) {
    return 0.5;
  } elseif ((($nitr_req == 100 && $phos_req == 20) ||
      ($nitr_req == 120 && ($phos_req == 10 || $phos_req == 20))) && ($pota_req == 45) ||
    ($phos_req == 10 && $pota_req == 30 && $nitr_req >= 120)
  ) {
    return 0.75;
  } elseif (($phos_req == 30) && (($nitr_req == 100 && $pota_req == 60) || ($nitr_req == 140 && $pota_req >= 45))) {
    return 1;
  } elseif (($nitr_req == 120) && ($phos_req == 30) && ($pota_req == 60)) {
    return 2;
  } elseif (($phos_req == 10) && ($pota_req == 60) && ($nitr_req >= 100)) {
    return 1.75;
  } else {
    return 1.25;
  }
}

// Urea 20-25 days after transplanting

function ureaTransplant2025HRWS($nitrogen, $phosphorus, $potassium)
{
  $nitr_req = nitrogenRequirementHRWS($nitrogen);
  $phos_req = phosphorusRequirementALL($phosphorus);
  $pota_req = potassiumRequirementALL($potassium);

  if (($phos_req == 30 && $pota_req == 60) ||
    ($nitr_req == 80 && ($phos_req == 10 && $pota_req == 30 || $phos_req == 20 && $pota_req == 60)) ||
    ($nitr_req == 100 && ($phos_req == 20 && $pota_req == 60 || $pota_req == 45))
  ) {
    return 1.75;
  } elseif ((($nitr_req == 60) && ($phos_req == 20)) ||
    (($nitr_req == 80) && ($phos_req == 10)) ||
    (($nitr_req == 80) && ($phos_req == 20 && $pota_req == 45)) ||
    (($nitr_req == 100) && ($phos_req == 30 && $pota_req == 45))
  ) {
    return 1;
  } else {
    return 1.5;
  }
}

function ureaTransplant2025HRDS($nitrogen, $phosphorus, $potassium)
{
  $nitr_req = nitrogenRequirementHRDS($nitrogen);
  $phos_req = phosphorusRequirementALL($phosphorus);
  $pota_req = potassiumRequirementALL($potassium);

  if (($phos_req == 30 && $pota_req == 60 && $nitr_req >= 80) ||
    ($nitr_req == 80 && $phos_req == 20 && $pota_req >= 45) ||
    ($nitr_req == 100 && $pota_req == 45 && $phos_req == 10) ||
    ($nitr_req == 100 && $phos_req == 20 && $pota_req == 60)
  ) {
    return 1;
  } elseif ((($nitr_req == 60) && ($phos_req == 20)) ||
    (($nitr_req == 80) && ($phos_req == 10)) ||
    (($nitr_req == 80) && ($phos_req == 20 && $pota_req == 45)) ||
    (($nitr_req == 100) && ($phos_req == 30 && $pota_req == 45))
  ) {
    return 0.5;
  } else {
    return 0.75;
  }
}

function ureaTransplant2025IRWS($nitrogen)
{
  $nitr_req = nitrogenRequirementIRWS($nitrogen);

  if ($nitr_req == 40) {
    return 0.75;
  } elseif ($nitr_req == 60) {
    return 1;
  } elseif ($nitr_req >= 80) {
    return 1.5;
  } else {
    return 0;
  }
}

function ureaTransplant2025IRDS($nitrogen, $phosphorus, $potassium)
{
  $nitr_req = nitrogenRequirementIRDS($nitrogen);
  $phos_req = phosphorusRequirementALL($phosphorus);
  $pota_req = potassiumRequirementALL($potassium);

  if (($phos_req == 30 && $pota_req == 60) ||
    ($nitr_req == 80 && ($phos_req == 10 && $pota_req == 30 || $phos_req == 20 && $pota_req == 60)) ||
    ($nitr_req == 100 && ($phos_req == 20 && $pota_req == 60 || $pota_req == 45))
  ) {
    return 1.75;
  } elseif ((($nitr_req == 60) && ($phos_req == 20)) ||
    (($nitr_req == 80) && ($phos_req == 10)) ||
    (($nitr_req == 80) && ($phos_req == 20 && $pota_req == 45)) ||
    (($nitr_req == 100) && ($phos_req == 30 && $pota_req == 45))
  ) {
    return 1;
  } else {
    return 1.5;
  }
}

// Urea 35-45 days after transplanting

function ureaTransplant3545HRWS($nitrogen, $phosphorus, $potassium)
{
  $nitr_req = nitrogenRequirementHRWS($nitrogen);
  $phos_req = phosphorusRequirementALL($phosphorus);
  $pota_req = potassiumRequirementALL($potassium);

  if (($pota_req == 30 && ($nitr_req == 80 || $phos_req == 20)) ||
    ($pota_req == 60 && $nitr_req >= 80 && $phos_req >= 20) ||
    ($nitr_req == 100 && ($phos_req == 10 && $pota_req == 45))
  ) {
    return 1;
  } elseif ((($nitr_req == 60 || $nitr_req == 80) && ($phos_req == 20 && $pota_req >= 45)) ||
    ($nitr_req == 80 && $phos_req == 10 && $pota_req >= 45) ||
    ($nitr_req == 100 && $phos_req == 30 && $pota_req == 45)
  ) {
    return 0.5;
  } else {
    return 0.75;
  }
}

function ureaTransplant3545HRDS($nitrogen, $phosphorus, $potassium)
{
  $nitr_req = nitrogenRequirementHRDS($nitrogen);
  $phos_req = phosphorusRequirementALL($phosphorus);
  $pota_req = potassiumRequirementALL($potassium);

  if (($nitr_req == 100) && (($phos_req == 20 && $pota_req == 45) || ($phos_req == 30 && $pota_req == 60)) ||
    ($nitr_req == 120) && (($phos_req == 10 && $pota_req == 30) || ($phos_req == 20 && $pota_req == 60)) ||
    ($nitr_req == 140 && $phos_req == 20 && $pota_req == 60)
  ) {
    return 1.25;
  } else {
    return 1;
  }
}

function ureaTransplant3545IRWS($nitrogen)
{
  $nitr_req = nitrogenRequirementIRWS($nitrogen);

  if ($nitr_req == 40) {
    return 0.25;
  } elseif ($nitr_req == 60) {
    return 0.5;
  } elseif ($nitr_req >= 80) {
    return 0.75;
  } else {
    return 0;
  }
}

function ureaTransplant3545IRDS($nitrogen, $phosphorus, $potassium)
{
  $nitr_req = nitrogenRequirementIRDS($nitrogen);
  $phos_req = phosphorusRequirementALL($phosphorus);
  $pota_req = potassiumRequirementALL($potassium);

  if (($pota_req == 30 && ($nitr_req == 80 || $phos_req == 20)) ||
    ($pota_req == 60 && $nitr_req >= 80 && $phos_req >= 20) ||
    ($nitr_req == 100 && ($phos_req == 10 && $pota_req == 45))
  ) {
    return 1;
  } elseif ((($nitr_req == 60 || $nitr_req == 80) && ($phos_req == 20 && $pota_req >= 45)) ||
    ($nitr_req == 80 && $phos_req == 10 && $pota_req >= 45) ||
    ($nitr_req == 100 && $phos_req == 30 && $pota_req == 45)
  ) {
    return 0.5;
  } else {
    return 0.75;
  }
}


//Muriate of Potash (Panicle Initiation)

function muriateOfPotashPanicleALL()
{
  return 1;
}

//Compost fungus activator

function compostFungusActivatorALL()
{
  return 20;
}
