@extends('layouts.master')
@section('title', 'Issued Products to Projects')

@section('page')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Issued Products to Projects</h4>
            <a href="{{ route('stock.issue.create') }}" class="btn btn-primary">New Issue</a>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Project</th>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Unit</th>
                            <th>Warehouse</th>
                            <th>Date</th>
                            <th>Remark</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($issues as $issue)
                        <tr>
                            <td>{{ $issue->project->name ?? 'N/A' }}</td>
                            <td>{{ $issue->product->name ?? 'N/A' }}</td>
                            <td>{{ abs($issue->qty) }}</td>
                            <td>{{ $issue->uom->name ?? 'N/A' }}</td>
                            <td>{{ $issue->warehouse->name ?? 'N/A' }}</td>
                            <td>{{ $issue->created_at ? $issue->created_at->format('d M Y') : 'N/A' }}</td>
                            <td>{{ $issue->remark }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">No issued products found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection 