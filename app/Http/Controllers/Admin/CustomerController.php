<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display the customer list.
     * Path: resources/views/admin/customers.blade.php
     */
    public function index()
    {
        // 1. Get customers and count enquiries based on the 'email' relationship
        $customers = User::withCount('enquiries')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        // 2. Calculate Dashboard Stats
        $totalCustomers = User::count();
        
        // Active = Users whose email exists in the enquiries table
        $activeCustomers = User::has('enquiries')->count();
        
        // Non-Active = Total minus Active
        $nonActiveCustomers = $totalCustomers - $activeCustomers;

        // Using 'admin.customers' because your file is admin/customers.blade.php
        return view('admin.customers', compact(
            'customers', 
            'totalCustomers', 
            'activeCustomers', 
            'nonActiveCustomers'
        ));
    }

    /**
     * Display specific customer details.
     */
   public function show(User $user)
{
    // We load the enquiries that match the user's email address
    $user->load(['enquiries' => function($query) {
        $query->latest();
    }]);

    return view('admin.customer_details', compact('user'));
}

    /**
     * Delete a customer.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.customers.index')
            ->with('success', 'Customer record removed successfully.');
    }
}