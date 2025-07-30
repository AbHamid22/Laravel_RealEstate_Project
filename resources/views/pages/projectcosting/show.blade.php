
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
@extends('layouts.master')

@section('title','Show ProjectCosting')

@section('style')
<style>
	.detail-label {
		font-weight: 600;
		color: #34495e;
	}

	.detail-value {
		color: #2c3e50;
	}

	.project-card,
	.cost-summary-card {
		max-width: 750px;
		margin: 0 auto 30px;
		border-radius: 10px;
		overflow: hidden;
		box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
	}

	.card.project-card {
		background: linear-gradient(to right, #f8f9fa, #e8f0fe);
		border: 1px solid #dcdcdc;
	}

	.card.cost-summary-card {
		background: linear-gradient(to right, #fff7e6, #fff0cc);
		border: 1px solid #f5d491;
	}

	.card-header {
		border-radius: 10px 10px 0 0;
		padding: 1rem 1.25rem;
	}

	.table th,
	.table td {
		vertical-align: middle;
	}
</style>
@endsection

@section('page')

<a class="btn btn-success mb-3" href="{{ route('projectcostings.index') }}">Manage Project Costings</a>

<!-- Project Details Card -->
<!-- Make sure Bootstrap Icons CSS is loaded in your master layout -->


<div class="card project-card shadow" style="border: none; border-radius: 12px; background: linear-gradient(to right, #f0f8ff, #e0f7fa);">
    <div class="card-header text-white" style="background: linear-gradient(135deg, #007bff, #00c6ff); border-radius: 12px 12px 0 0;">
        <h4 class="mb-0"><i class="bi bi-kanban-fill me-2"></i> Project Costing Details (#{{ $projectcosting->id }})</h4>
    </div>
    <div class="card-body p-4">
        @php
            $info = [
                ['label' => 'Project', 'value' => $projectcosting->project->name ?? 'N/A', 'icon' => 'bi-building'],
                ['label' => 'Module', 'value' => $projectcosting->module->name ?? 'N/A', 'icon' => 'bi-puzzle-fill'],
                ['label' => 'Days', 'value' => $projectcosting->days, 'icon' => 'bi-calendar-day'],
                ['label' => 'Status', 'value' => $projectcosting->status, 'icon' => 'bi-info-circle-fill'],
                ['label' => 'Remarks', 'value' => $projectcosting->remarks ?: 'N/A', 'icon' => 'bi-chat-left-text-fill'],
                ['label' => 'Created By', 'value' => $projectcosting->created_by, 'icon' => 'bi-person-check-fill'],
                ['label' => 'Updated By', 'value' => $projectcosting->updated_by ?: 'N/A', 'icon' => 'bi-person-fill-gear'],
                ['label' => 'Created At', 'value' => $projectcosting->created_at->format('d M Y, h:i A'), 'icon' => 'bi-clock-fill'],
                ['label' => 'Updated At', 'value' => $projectcosting->updated_at ? $projectcosting->updated_at->format('d M Y, h:i A') : 'N/A', 'icon' => 'bi-clock-history'],
            ];
        @endphp

        @foreach($info as $item)
        <div class="row mb-3 align-items-center">
            <div class="col-5 fw-semibold text-primary d-flex align-items-center">
                <i class="bi {{ $item['icon'] }} me-2 fs-5"></i> {{ $item['label'] }}:
            </div>
            <div class="col-7 text-dark fs-6">{{ $item['value'] }}</div>
        </div>
        @endforeach
    </div>
</div>


<!-- Cost Summary Card -->
@php
$budget = $projectcosting->budget;
$actual = $projectcosting->actual_cost;
$difference = $budget - $actual;
@endphp

<div class="card cost-summary-card">
	<div class="card-header text-white" style="background: linear-gradient(135deg, #f6b93b, #feca57);">
		<h5 class="mb-0">Cost Summary</h5>
	</div>
	<div class="card-body p-3">
		<table class="table table-bordered mb-0">
			<tbody>
				<tr>
					<th class="bg-light">Budget</th>
					<td class="text-end">TK {{ number_format($budget, 2) }}</td>
				</tr>
				<tr>
					<th class="bg-light">Actual Cost</th>
					<td class="text-end">TK {{ number_format($actual, 2) }}</td>
				</tr>
				<tr>
					<th class="bg-light">Difference</th>
					<td class="text-end text-{{ $difference < 0 ? 'danger' : 'success' }}">
						TK {{ number_format($difference, 2) }}
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

@endsection

@section('script')
<!-- Optional JS -->
@endsection