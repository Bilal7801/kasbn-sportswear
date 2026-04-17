<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquiry;

class EnquiryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name'             => 'required|string|max:255',
            'email'            => 'required|email|max:255',
            'phone'            => 'nullable|string|max:20',
            'country'          => 'required|string|max:10',
            'enquiry_type'     => 'required|string',
            'product_category' => 'nullable|string|max:255',
            'quantity'         => 'nullable|integer|min:1',
            'message'          => 'required|string',
        ]);

        $ip       = $request->ip();
        $geoData  = $this->getGeoData($ip);

        Enquiry::create([
            'name'             => $request->name,
            'email'            => $request->email,
            'phone'            => $request->phone,
            'country'          => $this->getCountryName($request->country),  // Full name from form
            'country_code'     => $request->country,                         // Code from form (US, GB...)
            'city'             => $geoData['city'],                          // Auto from IP-API
            'enquiry_type'     => $request->enquiry_type,
            'product_category' => $request->product_category,
            'quantity'         => $request->quantity,
            'message'          => $request->message,
            'ip_address'       => $ip,
            'device'           => $this->getDeviceType($request),
            'browser'          => $request->header('User-Agent'),
            'status'           => 'new',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Your enquiry has been submitted successfully! We will contact you soon.',
        ]);
    }

    // -------------------------------------------------------
    // Get City & Region from IP using ip-api.com (Free)
    // -------------------------------------------------------
    private function getGeoData(string $ip): array
    {
        // Localhost — skip API call
        if ($ip === '127.0.0.1' || $ip === '::1') {
            return [
                'city'   => 'Localhost',
                'region' => 'Localhost',
            ];
        }

        try {
            $url      = "http://ip-api.com/json/{$ip}?fields=status,city,regionName";
            $response = @file_get_contents($url);

            if ($response === false) {
                throw new \Exception('API call failed');
            }

            $geo = json_decode($response);

            if ($geo && $geo->status === 'success') {
                return [
                    'city'   => $geo->city       ?? 'Unknown',
                    'region' => $geo->regionName ?? 'Unknown',
                ];
            }

            return [
                'city'   => 'Unknown',
                'region' => 'Unknown',
            ];

        } catch (\Exception $e) {
            return [
                'city'   => 'Unknown',
                'region' => 'Unknown',
            ];
        }
    }

    // -------------------------------------------------------
    // Get full country name from country code
    // -------------------------------------------------------
    private function getCountryName(string $code): string
    {
        $countries = [
            'US' => 'United States',
            'GB' => 'United Kingdom',
            'DE' => 'Germany',
            'FR' => 'France',
            'AU' => 'Australia',
            'CA' => 'Canada',
            'AE' => 'UAE',
            'SA' => 'Saudi Arabia',
            'NL' => 'Netherlands',
            'ES' => 'Spain',
            'IT' => 'Italy',
            'TR' => 'Turkey',
            'CN' => 'China',
            'JP' => 'Japan',
            'ZA' => 'South Africa',
            'BR' => 'Brazil',
            'NG' => 'Nigeria',
            'KE' => 'Kenya',
            'EG' => 'Egypt',
            'PL' => 'Poland',
            'SE' => 'Sweden',
            'NO' => 'Norway',
            'DK' => 'Denmark',
            'MX' => 'Mexico',
            'AR' => 'Argentina',
            'SG' => 'Singapore',
            'MY' => 'Malaysia',
            'NZ' => 'New Zealand',
            'OT' => 'Other',
        ];

        return $countries[$code] ?? 'Unknown';
    }

    // -------------------------------------------------------
    // Detect device type from user agent
    // -------------------------------------------------------
    private function getDeviceType(Request $request): string
    {
        $agent = strtolower($request->header('User-Agent'));

        if (preg_match('/mobile|iphone|android|blackberry|opera mini|windows phone/', $agent)) {
            return 'Mobile';
        }

        if (preg_match('/tablet|ipad|nexus 7|nexus 10|xoom|sch-i800/', $agent)) {
            return 'Tablet';
        }

        return 'Desktop';
    }
}