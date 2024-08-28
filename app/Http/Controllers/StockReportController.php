<?php

namespace App\Http\Controllers;

use App\Models\StockReport;
use App\Models\Item;
use Illuminate\Http\Request;

class StockReportController extends Controller
{
    // Display a listing of the stock reports
    public function index()
    {
        $reports = StockReport::with('item')->get();
        return view('stock_reports.index', compact('reports'));
    }

    // Show the form for creating a new stock report
    public function create()
    {
        $items = Item::all();
        return view('stock_reports.create', compact('items'));
    }

    // Store a newly created stock report in storage
    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_id' => 'required|exists:items,id',
            'report_date' => 'required|date',
            'stock_level' => 'required|integer|min:0',
        ]);

        StockReport::create($validated);
        return redirect()->route('stock_reports.index')->with('success', 'Stock report created successfully');
    }

    // Display the specified stock report
    public function show($id)
    {
        $report = StockReport::with('item')->findOrFail($id);
        return view('stock_reports.show', compact('report'));
    }

    // Show the form for editing the specified stock report
    public function edit($id)
    {
        $report = StockReport::findOrFail($id);
        $items = Item::all();
        return view('stock_reports.edit', compact('report', 'items'));
    }

    // Update the specified stock report in storage
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'item_id' => 'required|exists:items,id',
            'report_date' => 'required|date',
            'stock_level' => 'required|integer|min:0',
        ]);

        $report = StockReport::findOrFail($id);
        $report->update($validated);
        return redirect()->route('stock_reports.index')->with('success', 'Stock report updated successfully');
    }

    // Remove the specified stock report from storage
    public function destroy($id)
    {
        $report = StockReport::findOrFail($id);
        $report->delete();
        return redirect()->route('stock_reports.index')->with('success', 'Stock report deleted successfully');
    }
}
