<?php

namespace App\Listeners;

use App\Events\ProyectSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class OptimizaProeycto  implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ProyectSaved $event): void
    {


            //Cada modificacion que se realize se tiene que reinicial el worker
            //php artisan queue:work

        $manager = new ImageManager(new Driver());

        // read image from file system
        $image = $manager->read(Storage::get($event->proyecto->image));

        // resize image proportionally to 300px width
        $image->scale(width: 300);

        Storage::put($event->proyecto->image, contents: $image->encode());
    }
}
