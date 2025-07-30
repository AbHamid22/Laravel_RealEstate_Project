@extends('layouts.master')
@section('title', 'Create Project Costing')

@section('style')
<style>
    .card {
        max-width: 600px;
        margin: 30px auto;
    }
</style>
@endsection

@section('page')
<div class="card shadow-sm">
    <div class="card-header">
        <h4>Create New Project Costing</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('projectcostings.store') }}" method="POST" id="projectCostingForm">
            @csrf

            <div class="mb-3">
                <label for="project_id" class="form-label">Project</label>
                <select name="project_id" id="project_id" class="form-select" required>
                    <option value="">Select Project</option>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="module_id" class="form-label">Module</label>
                <select name="module_id" id="module_id" class="form-select" required>
                    <option value="">Select Module</option>
                    @foreach($modules as $module)
                        <option value="{{ $module->id }}">{{ $module->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="budget" class="form-label">Budget (in BDT)</label>
                <input type="number" step="0.01" min="0" name="budget" id="budget" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="actual_cost" class="form-label">Actual Cost (in BDT)</label>
                <input type="number" step="0.01" min="0" name="actual_cost" id="actual_cost" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="days" class="form-label">Days</label>
                <input type="number" min="0" name="days" id="days" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-select" required>
                    <option value="Pending">Pending</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="remarks" class="form-label">Remarks</label>
                <textarea name="remarks" id="remarks" class="form-control" rows="3"></textarea>
            </div>

            <!-- Calculated cost display -->
            <div class="mb-3">
                <label class="form-label">Total Cost</label>
                <input type="text" id="total_cost" class="form-control" readonly>
            </div>

            <button type="submit" class="btn btn-primary">Save Project Costing</button>
        </form>
    </div>
</div>
@endsection

@section('script')
<script>
    const budgetInput = document.getElementById('budget');
    const actualCostInput = document.getElementById('actual_cost');
    const totalCostInput = document.getElementById('total_cost');

    function calculateTotalCost() {
        const budget = parseFloat(budgetInput.value) || 0;
        const actualCost = parseFloat(actualCostInput.value) || 0;

        // Example calculation: sum of budget + actual cost
        const total = budget + actualCost;

        totalCostInput.value = total.toFixed(2);
    }

    budgetInput.addEventListener('input', calculateTotalCost);
    actualCostInput.addEventListener('input', calculateTotalCost);

    // Initialize on page load
    calculateTotalCost();
</script>
@endsection
