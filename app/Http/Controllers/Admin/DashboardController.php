<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Enquiry;
use App\Models\Product;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Inquiry Statistics (Time-based)
        $totalInquiriesToday = Enquiry::whereDate('created_at', Carbon::today())->count();
        $totalInquiriesWeek = Enquiry::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $totalInquiriesMonth = Enquiry::whereMonth('created_at', Carbon::now()->month)->count();
        
        // Status counts (matching your EnquiryController updateStatus logic)
        $newInquiriesCount = Enquiry::where('status', 'new')->count();
        $pendingInquiries  = Enquiry::whereIn('status', ['new', 'reviewing'])->count();
        $repliedInquiries  = Enquiry::where('status', 'replied')->count();
        $closedInquiries   = Enquiry::whereIn('status', ['resolved', 'closed'])->count();

        // 2. User & Product Totals
        $totalCustomers = User::count();
        $totalProducts  = Product::count();

        // 3. Chart Data: Inquiries Per Day (Last 7 Days)
        $days = collect(range(6, 0))->map(function($i) {
            return Carbon::now()->subDays($i)->format('D');
        });

        $inquiryCounts = collect(range(6, 0))->map(function($i) {
            return Enquiry::whereDate('created_at', Carbon::now()->subDays($i))->count();
        });

        // 4. Chart Data: Product-wise Inquiry Count
        // Links your Enquiries to Categories based on the 'product_category' string column
        $productStats = Enquiry::select('product_category', DB::raw('count(*) as total'))
            ->groupBy('product_category')
            ->orderByDesc('total')
            ->take(6)
            ->get();

        // 5. Chart Data: Top Countries
        $topCountries = Enquiry::select('country', DB::raw('count(*) as count'))
            ->whereNotNull('country')
            ->groupBy('country')
            ->orderByDesc('count')
            ->take(4)
            ->get()
            ->map(function($item) {
                return ['name' => $item->country, 'count' => $item->count];
            });

        // 6. Recent Activity
        $recentActivity = Enquiry::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalInquiriesToday', 'totalInquiriesWeek', 'totalInquiriesMonth',
            'newInquiriesCount', 'totalCustomers', 'totalProducts',
            'pendingInquiries', 'repliedInquiries', 'closedInquiries',
            'days', 'inquiryCounts', 'productStats', 'topCountries', 'recentActivity'
        ));
    }
}