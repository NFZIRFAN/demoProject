<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\ReorderHistory;
use Illuminate\Http\Request;


class ReorderHistoryController extends Controller
{
   

public function index(Request $request)
{
    $query = ReorderHistory::query();

    // SORTING LOGIC
    if ($request->filled('sort')) {

        [$type, $value] = array_pad(explode(':', $request->sort), 2, null);

        // Category filter
        if ($type === 'category' && $value) {
            $query->where('category', $value);
        }

        // Date sorting
        if ($request->sort === 'dateDesc') {
            $query->orderBy('reorder_date', 'desc');
        }

        if ($request->sort === 'dateAsc') {
            $query->orderBy('reorder_date', 'asc');
        }
    } else {
        // Default order
        $query->orderBy('reorder_date', 'desc');
    }

    // PAGINATION (10 per page)
    $histories = $query->paginate(10)->withQueryString();

    // CHART DATA (unchanged, full dataset)
    $allHistories = ReorderHistory::orderBy('reorder_date')->get();

    $dates = $allHistories->pluck('reorder_date')
        ->map(fn ($d) => \Carbon\Carbon::parse($d)->format('d M'))
        ->unique()
        ->values()
        ->toArray();

    $chartData = [];
    $grouped = $allHistories->groupBy('product_name');

    foreach ($grouped as $product => $items) {
        $data = [];

        foreach ($dates as $date) {
            $found = $items->first(
                fn ($i) => \Carbon\Carbon::parse($i->reorder_date)->format('d M') === $date
            );
            $data[] = $found ? $found->reorder_quantity : 0;
        }

        $chartData[] = [
            'label' => $product,
            'data' => $data,
        ];
    }

    return view('admin.reorderHistory', compact('histories', 'dates', 'chartData'));
}


    // DELETE history
 public function destroy($id)
{
    ReorderHistory::findOrFail($id)->delete();

    return redirect('/admin/reorder-history')
        ->with('success', 'Reorder history deleted successfully.');
}



}

