<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('olx:price-track')->everyFiveMinutes();
