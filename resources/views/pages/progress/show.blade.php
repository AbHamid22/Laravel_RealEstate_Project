@extends('layouts.master')
@section('title','Show Progress')

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    .progress-details-card {
        max-width: 1200px;
        margin: auto;
        margin-top: 2rem;
    }

    .table th {
        width: 250px;
    }

    .progress-bar {
        font-size: 1.2rem;
        font-weight: bold;
    }

    .chart-container {
        position: relative;
        height: 300px;
        margin: 20px 0;
    }

    .metric-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 20px;
        padding: 25px;
        margin-bottom: 20px;
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .metric-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: left 0.5s;
    }

    .metric-card:hover::before {
        left: 100%;
    }

    .metric-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 12px 35px rgba(102, 126, 234, 0.4);
    }

    .metric-card.success {
        background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        box-shadow: 0 8px 25px rgba(17, 153, 142, 0.3);
    }

    .metric-card.success:hover {
        box-shadow: 0 12px 35px rgba(17, 153, 142, 0.4);
    }

    .metric-card.warning {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        box-shadow: 0 8px 25px rgba(240, 147, 251, 0.3);
    }

    .metric-card.warning:hover {
        box-shadow: 0 12px 35px rgba(240, 147, 251, 0.4);
    }

    .metric-card.info {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        box-shadow: 0 8px 25px rgba(79, 172, 254, 0.3);
    }

    .metric-card.info:hover {
        box-shadow: 0 12px 35px rgba(79, 172, 254, 0.4);
    }

    .timeline {
        position: relative;
        padding: 20px 0;
    }

    .timeline-item {
        position: relative;
        padding-left: 30px;
        margin-bottom: 20px;
        border-left: 3px solid #667eea;
    }

    .timeline-item::before {
        content: '';
        position: absolute;
        left: -8px;
        top: 0;
        width: 13px;
        height: 13px;
        border-radius: 50%;
        background: #667eea;
        border: 3px solid white;
        box-shadow: 0 0 0 3px #667eea;
    }

    .timeline-item.completed::before {
        background: #28a745;
        border-color: #28a745;
        box-shadow: 0 0 0 3px #28a745;
    }

    .timeline-item.pending::before {
        background: #ffc107;
        border-color: #ffc107;
        box-shadow: 0 0 0 3px #ffc107;
    }

    .progress-ring {
        transform: rotate(-90deg);
    }

    .progress-ring-circle {
        transition: stroke-dasharray 0.35s;
        transform-origin: 50% 50%;
    }

    .status-badge {
        padding: 8px 16px;
        border-radius: 20px;
        font-weight: bold;
        text-transform: uppercase;
        font-size: 0.8rem;
        letter-spacing: 0.5px;
    }

    .status-completed {
        background: linear-gradient(135deg, #28a745, #20c997);
        color: white;
    }

    .status-pending {
        background: linear-gradient(135deg, #ffc107, #fd7e14);
        color: white;
    }

    .status-delayed {
        background: linear-gradient(135deg, #dc3545, #e83e8c);
        color: white;
    }

    .chart-card {
        background: white;
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        border: none;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .chart-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }

    .chart-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #667eea, #764ba2);
    }

    .chart-card.success::before {
        background: linear-gradient(90deg, #11998e, #38ef7d);
    }

    .chart-card.warning::before {
        background: linear-gradient(90deg, #f093fb, #f5576c);
    }

    .chart-card.info::before {
        background: linear-gradient(90deg, #4facfe, #00f2fe);
    }

    .chart-title {
        font-size: 1.2rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 15px;
        text-align: center;
        position: relative;
        padding-bottom: 10px;
    }

    .chart-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 50px;
        height: 3px;
        background: linear-gradient(90deg, #667eea, #764ba2);
        border-radius: 2px;
    }

    .chart-title.success::after {
        background: linear-gradient(90deg, #11998e, #38ef7d);
    }

    .chart-title.warning::after {
        background: linear-gradient(90deg, #f093fb, #f5576c);
    }

    .chart-title.info::after {
        background: linear-gradient(90deg, #4facfe, #00f2fe);
    }

    .progress-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 20px;
        padding: 30px;
        margin-bottom: 20px;
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        position: relative;
        overflow: hidden;
    }

    .progress-card::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
        animation: shimmer 3s infinite;
    }

    @keyframes shimmer {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .details-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        margin-bottom: 20px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        border-left: 5px solid #667eea;
        transition: all 0.3s ease;
    }

    .details-card:hover {
        transform: translateX(5px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.15);
    }

    .timeline-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        margin-bottom: 20px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        border-left: 5px solid #ffc107;
        transition: all 0.3s ease;
    }

    .timeline-card:hover {
        transform: translateX(5px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.15);
    }

    .container {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        min-height: 100vh;
        padding: 30px 0;
    }

    .main-header {
        background: white;
        border-radius: 20px;
        padding: 25px;
        margin-bottom: 30px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        border-left: 5px solid #667eea;
    }

    .chart-container {
        background: rgba(255,255,255,0.9);
        border-radius: 15px;
        padding: 20px;
        margin: 15px 0;
        box-shadow: inset 0 2px 10px rgba(0,0,0,0.05);
    }
</style>
@endsection

@section('page')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">
            <i class="fas fa-chart-line text-primary me-2"></i>Progress Analytics
        </h1>
        <a class='btn btn-success' href="{{ route('progresses.index') }}">
            <i class="fas fa-arrow-left"></i> Back to Progress List
        </a>
    </div>

 
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="metric-card">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="mb-0">{{ $progress->percent }}%</h3>
                        <small>Completion Rate</small>
                    </div>
                    <i class="fas fa-percentage fa-2x opacity-75"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="metric-card success">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="mb-0">{{ $progress->status->name ?? 'N/A' }}</h3>
                        <small>Current Status</small>
                    </div>
                    <i class="fas fa-flag fa-2x opacity-75"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="metric-card warning">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="mb-0">{{ $progress->expected_completion_date ? \Carbon\Carbon::parse($progress->expected_completion_date)->diffForHumans() : 'N/A' }}</h3>
                        <small>Expected Completion</small>
                    </div>
                    <i class="fas fa-calendar fa-2x opacity-75"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="metric-card info">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="mb-0">{{ $progress->updated_at ? $progress->updated_at->diffForHumans() : 'N/A' }}</h3>
                        <small>Last Updated</small>
                    </div>
                    <i class="fas fa-clock fa-2x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Progress Charts -->
        <div class="col-lg-8">
            <div class="chart-card">
                <h5 class="chart-title">
                    <i class="fas fa-chart-pie me-2 text-primary"></i>Progress Overview
                </h5>
                <div class="chart-container">
                    <canvas id="progressChart"></canvas>
                </div>
            </div>

            <div class="chart-card">
                <h5 class="chart-title">
                    <i class="fas fa-chart-line me-2 text-success"></i>Progress Timeline
                </h5>
                <div class="chart-container">
                    <canvas id="timelineChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Details and Timeline -->
        <div class="col-lg-4">
            <div class="chart-card">
                <h5 class="chart-title">
                    <i class="fas fa-info-circle me-2 text-info"></i>Project Details
                </h5>
                <div class="mb-3">
                    <strong>Module:</strong> {{ $progress->module->name ?? 'N/A' }}
                </div>
                <div class="mb-3">
                    <strong>Project:</strong> {{ $progress->project->name ?? $progress->project_id }}
                </div>
                <div class="mb-3">
                    <strong>Status:</strong> 
                    <span class="status-badge status-{{ strtolower($progress->status->name ?? 'pending') }}">
                        {{ $progress->status->name ?? 'N/A' }}
                    </span>
                </div>
                <div class="mb-3">
                    <strong>Updated By:</strong> {{ $progress->updated_by }}
                </div>
                <div class="mb-3">
                    <strong>Review:</strong> {{ $progress->review }}
                </div>
                <div class="mb-3">
                    <strong>Remarks:</strong> {{ $progress->remarks }}
                </div>
            </div>

            <div class="chart-card">
                <h5 class="chart-title">
                    <i class="fas fa-history me-2 text-warning"></i>Project Timeline
                </h5>
                <div class="timeline">
                    <div class="timeline-item completed">
                        <strong>Project Started</strong>
                        <br>
                        <small class="text-muted">{{ $progress->created_at ? $progress->created_at->format('M d, Y') : 'N/A' }}</small>
                    </div>
                    <div class="timeline-item {{ $progress->percent >= 50 ? 'completed' : 'pending' }}">
                        <strong>50% Milestone</strong>
                        <br>
                        <small class="text-muted">{{ $progress->percent >= 50 ? 'Completed' : 'Pending' }}</small>
                    </div>
                    <div class="timeline-item {{ $progress->percent >= 75 ? 'completed' : 'pending' }}">
                        <strong>75% Milestone</strong>
                        <br>
                        <small class="text-muted">{{ $progress->percent >= 75 ? 'Completed' : 'Pending' }}</small>
                    </div>
                    <div class="timeline-item {{ $progress->percent == 100 ? 'completed' : 'pending' }}">
                        <strong>Project Completion</strong>
                        <br>
                        <small class="text-muted">{{ $progress->percent == 100 ? 'Completed' : 'Expected: ' . $progress->expected_completion_date }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Progress Bar -->
    <div class="chart-card mt-4">
        <h5 class="chart-title">
            <i class="fas fa-tasks me-2 text-primary"></i>Current Progress
        </h5>
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="progress" style="height: 40px; border-radius: 20px;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" 
                         role="progressbar"
                         style="width: {{ $progress->percent }}%; border-radius: 20px;" 
                         aria-valuenow="{{ $progress->percent }}" 
                         aria-valuemin="0"
                         aria-valuemax="100">
                        <strong>{{ $progress->percent }}% Complete</strong>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="d-flex justify-content-center">
                    <svg class="progress-ring" width="120" height="120">
                        <circle class="progress-ring-circle-bg" stroke="#e9ecef" stroke-width="8" fill="transparent" r="52" cx="60" cy="60"/>
                        <circle class="progress-ring-circle" stroke="#28a745" stroke-width="8" fill="transparent" r="52" cx="60" cy="60" 
                                stroke-dasharray="{{ 2 * 3.14159 * 52 }}" 
                                stroke-dashoffset="{{ 2 * 3.14159 * 52 * (1 - $progress->percent / 100) }}"/>
                    </svg>
                    <div class="position-absolute d-flex align-items-center justify-content-center" style="width: 120px; height: 120px;">
                        <div class="text-center">
                            <h4 class="mb-0">{{ $progress->percent }}%</h4>
                            <small class="text-muted">Complete</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Progress Chart
const progressCtx = document.getElementById('progressChart').getContext('2d');
const progressChart = new Chart(progressCtx, {
    type: 'doughnut',
    data: {
        labels: ['Completed', 'Remaining'],
        datasets: [{
            data: [{{ $progress->percent }}, {{ 100 - $progress->percent }}],
            backgroundColor: [
                '#28a745',
                '#e9ecef'
            ],
            borderWidth: 0,
            cutout: '70%'
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'bottom',
                labels: {
                    padding: 20,
                    usePointStyle: true
                }
            }
        }
    }
});

// Timeline Chart
const timelineCtx = document.getElementById('timelineChart').getContext('2d');
const timelineChart = new Chart(timelineCtx, {
    type: 'line',
    data: {
        labels: ['Start', '25%', '50%', '75%', '100%'],
        datasets: [{
            label: 'Progress',
            data: [0, 25, 50, 75, 100],
            borderColor: '#667eea',
            backgroundColor: 'rgba(102, 126, 234, 0.1)',
            borderWidth: 3,
            fill: true,
            tension: 0.4
        }, {
            label: 'Current Progress',
            data: [0, {{ $progress->percent >= 25 ? 25 : $progress->percent }}, {{ $progress->percent >= 50 ? 50 : $progress->percent }}, {{ $progress->percent >= 75 ? 75 : $progress->percent }}, {{ $progress->percent }}],
            borderColor: '#28a745',
            backgroundColor: 'rgba(40, 167, 69, 0.1)',
            borderWidth: 3,
            fill: false,
            tension: 0.4
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'top'
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                max: 100,
                ticks: {
                    callback: function(value) {
                        return value + '%';
                    }
                }
            }
        }
    }
});

// Animate progress ring
document.addEventListener('DOMContentLoaded', function() {
    const circle = document.querySelector('.progress-ring-circle');
    const radius = circle.r.baseVal.value;
    const circumference = radius * 2 * Math.PI;
    
    circle.style.strokeDasharray = `${circumference} ${circumference}`;
    circle.style.strokeDashoffset = circumference;
    
    function setProgress(percent) {
        const offset = circumference - (percent / 100 * circumference);
        circle.style.strokeDashoffset = offset;
    }
    
    setProgress({{ $progress->percent }});
});
</script>
@endsection
