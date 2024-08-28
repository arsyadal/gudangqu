@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="display-4">Inventory Management System</h1>
            <p class="lead">Manage your inventory efficiently with our comprehensive dashboard.</p>
        </div>
    </div>

    <!-- Inventory Summary Section -->
    <div class="row mt-5">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Total Items</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalItems }}</h5>
                    <p class="card-text">Total number of items in the inventory.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalCategories }}</h5>
                    <p class="card-text">Different categories available.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">Suppliers</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalSuppliers }}</h5>
                    <p class="card-text">Number of active suppliers.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Section -->
    <div class="row mt-5">
        <div class="col-md-12">
            <h2>Statistics</h2>
            <!-- Chart.js example chart -->
            <canvas id="inventoryChart" width="400" height="200"></canvas>
        </div>
    </div>

    <!-- Quick Links Section -->
    <div class="row mt-5">
        <div class="col-md-12">
            <h2>Quick Links</h2>
            <a href="{{ route('items.index') }}" class="btn btn-primary mr-2">Manage Items</a>
            <a href="{{ route('categories.index') }}" class="btn btn-success mr-2">Manage Categories</a>
            <a href="{{ route('suppliers.index') }}" class="btn btn-danger mr-2">Manage Suppliers</a>
            <a href="{{ route('stock_reports.index') }}" class="btn btn-info">View Stock Reports</a>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Include Chart.js or any other chart library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('inventoryChart').getContext('2d');
    var inventoryChart = new Chart(ctx, {
        type: 'bar', // or 'line', 'pie', etc.
        data: {
            labels: ['Item A', 'Item B', 'Item C'], // Example labels
            datasets: [{
                label: 'Stock Level',
                data: [12, 19, 3], // Example data
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
