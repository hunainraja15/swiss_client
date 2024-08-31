<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\File;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
            $currentYear = now()->year; // Get the current year

            // Retrieve files created in the current year
            $files = File::whereYear('created_at', $currentYear)->get();

            // Initialize the total size variable
            $totalSizeInBytes = 0;

            foreach ($files as $file) {
                // Add the current file size to the total size
                $totalSizeInBytes += $file->size;
            }

            // Convert total size to megabytes
            $megabytes = $totalSizeInBytes / (1024 * 1024);

            // Check if megabytes is greater than 1000
            if ($megabytes > 1000) {
                // Convert megabytes to gigabytes
                $gigabytes = $megabytes / 1024;
                $remainingSizeFormatted = number_format($gigabytes, 2) . " GB";
            } else {
                $remainingSizeFormatted = number_format($megabytes, 2) . " MB";
            }

        // Process files for monthly count
        $months = $this->getMonthsOfYear($currentYear);
        $fileCounts = $months->mapWithKeys(function ($month) {
            return [$month->format('F Y') => 0];
        })->toArray();

        foreach ($files as $file) {
            $month = $file->created_at->format('F Y'); // Format as 'Month Year'
            if (isset($fileCounts[$month])) {
                $fileCounts[$month]++;
            }
        }

        // Prepare data for the chart
        $chartData = [
            'labels' => array_keys($fileCounts),
            'data' => array_values($fileCounts),
        ];

        $users = User::where('role', 'user')->get();
        $clients = User::where('role', 'client')->get();
$user = Auth::user()->status_update;
       // Assuming $user contains the 'status_update' date
$statusUpdateDate = Carbon::parse($user);

// Get the current date
$now = Carbon::now();

// Check if the status update date is more than one month ago
$isMoreThanOneMonthAgo = $statusUpdateDate->isBefore($now->subMonth());


        $data = [
            'remainingSize' => $remainingSizeFormatted,
            'users' => $users,
            'clients' => $clients,
            'useTotalStorage' => $users->count() * 100, // Ensure this is calculated correctly
            'chartData' => $chartData,
            'subscription' => $isMoreThanOneMonthAgo,
        ];

        return view('home', $data);
    }

    /**
     * Get all months of a given year.
     *
     * @param int $year
     * @return \Illuminate\Support\Collection
     */
    private function getMonthsOfYear($year)
    {
        $months = collect();
        
        for ($i = 1; $i <= 12; $i++) {
            $months->push(Carbon::create($year, $i, 1)->startOfMonth());
        }

        return $months;
    }

    /**
     * Show the report dashboard with files within a date range.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function report_dashboard(Request $request)
    {
        // Step 1: Extract and check date range
        $dateRange = $request->input('daterange');
        if (empty($dateRange)) {
            return response()->json(['error' => 'Date range is missing.'], 400);
        }

        // Step 2: Split the date range
        $dates = explode('-', $dateRange);
        if (count($dates) != 2) {
            return response()->json(['error' => 'Invalid date range format.'], 400);
        }

        // Step 3: Parse and validate dates
        try {
            $startDate = Carbon::parse(trim($dates[0]));
            $endDate = Carbon::parse(trim($dates[1]))->endOfDay();
            dd($startDate);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Invalid date format.'], 400);
        }

        // Step 4: Apply date filter and query
        $files = File::whereBetween('created_at', [$startDate, $endDate])->get();

        // If no files are found, return an empty array
        if ($files->isEmpty()) {
            return response()->json(['message' => 'No files found for the given date range.'], 200);
        }

        // Step 5: Calculate the total file size
        $totalSizeInBytes = $files->sum('size');
        $megabytes = $totalSizeInBytes / (1024 * 1024);

        if ($megabytes > 1000) {
            $gigabytes = $megabytes / 1024;
            $remainingSizeFormatted = number_format($gigabytes, 2) . " GB";
        } else {
            $remainingSizeFormatted = number_format($megabytes, 2) . " MB";
        }

        // Step 6: Process files for monthly count
        $months = $this->getMonthsOfYear($startDate->year);
        $fileCounts = $months->mapWithKeys(function ($month) {
            return [$month->format('F Y') => 0];
        })->toArray();

        foreach ($files as $file) {
            $month = $file->created_at->format('F Y');
            if (isset($fileCounts[$month])) {
                $fileCounts[$month]++;
            }
        }

        // Prepare data for the chart
        $chartData = [
            'labels' => array_keys($fileCounts),
            'data' => array_values($fileCounts),
        ];

        // Step 7: Return JSON response
        return response()->json([
            'remainingSize' => $remainingSizeFormatted,
            'files' => $files,
            'chartData' => $chartData,
        ], 200);
    }
}
