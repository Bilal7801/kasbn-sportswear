<?php

// app/Providers/AppServiceProvider.php

use App\Models\Enquiry;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot(): void
    {
        // Share new enquiries count with all admin views
        View::composer('admin.*', function ($view) {
            $view->with('newInquiriesCount', Enquiry::where('status', 'new')->count());
        });
    }
}