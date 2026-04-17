<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function index(Request $request)
    {
        $query = Enquiry::query();

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name',    'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('product_category', 'like', "%{$search}%");
            });
        }

        // Filter by status
        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        // Filter by enquiry type
        if ($request->filled('enquiry_type') && $request->enquiry_type !== 'all') {
            $query->where('enquiry_type', $request->enquiry_type);
        }

        // Sort
        $sort = $request->get('sort', 'newest');
        match ($sort) {
            'oldest' => $query->oldest(),
            'name'   => $query->orderBy('name', 'asc'),
            default  => $query->latest(),
        };

        // Stats
        $totalEnquiries  = Enquiry::count();
        $pendingCount    = Enquiry::where('status', 'new')->count();
        $resolvedToday   = Enquiry::where('status', 'resolved')
                                  ->whereDate('updated_at', today())
                                  ->count();

        // Paginate
        $enquiries = $query->paginate(10)->withQueryString();

        return view('admin.enquires.index', compact(
            'enquiries',
            'totalEnquiries',
            'pendingCount',
            'resolvedToday'
        ));
    }

    public function destroy($id)
    {
        Enquiry::findOrFail($id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Enquiry deleted successfully.',
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:new,reviewing,replied,negotiating,resolved,closed',
        ]);

        $enquiry = Enquiry::findOrFail($id);
        $enquiry->update(['status' => $request->status]);

        return response()->json([
            'success' => true,
            'message' => 'Status updated successfully.',
        ]);
    }
}