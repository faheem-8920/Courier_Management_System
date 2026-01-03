@extends('admin.masterlayout')
@section('content')

<style>
    /* Modern Dashboard Theme */
    :root {
        --primary-red: #dc2626;
        --secondary-red: #ef4444;
        --light-red: #fee2e2;
        --dark-red: #991b1b;
        --white: #ffffff;
        --light-gray: #f8fafc;
        --dark-gray: #1f2937;
        --medium-gray: #6b7280;
        --gradient-red: linear-gradient(135deg, #dc2626, #ef4444);
    }

    /* Animations */
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    @keyframes wave {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes slideInLeft {
        from { transform: translateX(-30px); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }

    @keyframes slideInRight {
        from { transform: translateX(30px); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }

    @keyframes pulse {
        0%, 100% { box-shadow: 0 0 0 0 rgba(220, 38, 38, 0.4); }
        50% { box-shadow: 0 0 0 10px rgba(220, 38, 38, 0); }
    }

    @keyframes shimmer {
        0% { background-position: -1000px 0; }
        100% { background-position: 1000px 0; }
    }

    /* Main Container */
    .dashboard-container {
        animation: fadeIn 0.8s ease-out;
        min-height: 100vh;
        background: linear-gradient(135deg, #fef2f2 0%, #f8fafc 100%);
        padding: 20px;
        position: relative;
        overflow-x: hidden;
    }

    .dashboard-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-red);
        animation: wave 3s infinite linear;
    }

    /* Header */
    .dashboard-header {
        margin-bottom: 30px;
        padding: 20px;
        background: var(--white);
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(220, 38, 38, 0.1);
        animation: slideInLeft 0.8s ease-out;
        position: relative;
        overflow: hidden;
    }

    .dashboard-header::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
        transform: translateX(-100%);
    }

    .dashboard-header:hover::after {
        animation: wave 2s infinite;
    }

    .dashboard-title {
        color: var(--dark-red);
        font-weight: 800;
        font-size: 2.5rem;
        position: relative;
        display: inline-block;
        background: var(--gradient-red);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: float 4s ease-in-out infinite;
    }

    .dashboard-title i {
        animation: float 3s ease-in-out infinite;
        animation-delay: 0.5s;
    }

    

    /* Stats Grid */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 25px;
        margin-bottom: 40px;
    }

    .stat-card {
        background: var(--white);
        border-radius: 20px;
        padding: 25px;
        box-shadow: 0 10px 30px rgba(220, 38, 38, 0.08);
        border: 2px solid transparent;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);
        position: relative;
        overflow: hidden;
        cursor: pointer;
        animation: fadeIn 0.6s ease-out backwards;
        animation-delay: calc(var(--card-index) * 0.1s);
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: var(--gradient-red);
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: 1;
    }

    .stat-card:hover::before {
        opacity: 0.05;
    }

    .stat-card:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: 0 20px 40px rgba(220, 38, 38, 0.2);
        border-color: var(--primary-red);
    }

    .stat-card:active {
        transform: translateY(-5px) scale(1.01);
    }

    .stat-card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        position: relative;
        z-index: 2;
    }

    .stat-icon-wrapper {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, var(--light-red), #fed7d7);
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        color: var(--primary-red);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .stat-icon-wrapper::after {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, transparent, rgba(255,255,255,0.3), transparent);
        transform: rotate(45deg);
        transition: transform 0.6s ease;
    }

    .stat-card:hover .stat-icon-wrapper {
        transform: rotate(15deg) scale(1.1);
        background: linear-gradient(135deg, #fed7d7, #fecaca);
    }

    .stat-card:hover .stat-icon-wrapper::after {
        transform: rotate(45deg) translateX(100%);
    }

    .stat-indicator {
        display: flex;
        align-items: center;
        gap: 5px;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }

    .indicator-up {
        background: rgba(16, 185, 129, 0.1);
        color: #10b981;
    }

    .indicator-down {
        background: rgba(220, 38, 38, 0.1);
        color: var(--primary-red);
    }

    .stat-content {
        position: relative;
        z-index: 2;
    }

    .stat-title {
        font-size: 14px;
        font-weight: 600;
        color: var(--medium-gray);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .stat-value {
        font-size: 36px;
        font-weight: 800;
        color: var(--dark-gray);
        line-height: 1.2;
        margin-bottom: 10px;
        background: var(--gradient-red);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        text-shadow: 0 2px 10px rgba(220, 38, 38, 0.1);
    }

    .stat-progress {
        height: 6px;
        background: var(--light-red);
        border-radius: 3px;
        overflow: hidden;
        margin-top: 15px;
    }

    .progress-bar {
        height: 100%;
        background: var(--gradient-red);
        border-radius: 3px;
        width: var(--progress, 0%);
        transition: width 1s ease-in-out;
    }

    /* Data Tables Section */
    .data-section {
        animation: fadeIn 1s ease-out;
    }

    .section-card {
        background: var(--white);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(220, 38, 38, 0.1);
        margin-bottom: 30px;
        transition: transform 0.3s ease;
    }

    .section-card:hover {
        transform: translateY(-5px);
    }

    .section-header {
        background: linear-gradient(135deg, var(--primary-red), var(--dark-red));
        padding: 20px 25px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: relative;
        overflow: hidden;
    }

    .section-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
        transform: translateX(-100%);
    }

    .section-header:hover::before {
        animation: wave 1.5s ease-in-out;
    }

    .section-title {
        color: var(--white);
        font-weight: 700;
        font-size: 1.3rem;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .table-tools {
        display: flex;
        gap: 15px;
        align-items: center;
    }

    .search-box {
        position: relative;
    }

    .search-input {
        padding: 10px 15px 10px 40px;
        border: 2px solid rgba(255,255,255,0.2);
        border-radius: 50px;
        background: rgba(255,255,255,0.1);
        color: var(--white);
        font-size: 14px;
        transition: all 0.3s ease;
        width: 250px;
    }

    .search-input:focus {
        outline: none;
        border-color: var(--white);
        background: rgba(255,255,255,0.15);
        width: 300px;
    }

    .search-input::placeholder {
        color: rgba(255,255,255,0.7);
    }

    .search-icon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: rgba(255,255,255,0.7);
    }

    /* Enhanced Table */
    .data-table-wrapper {
        padding: 25px;
        position: relative;
    }

    .data-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
    }

    .data-table thead tr {
        background: var(--light-gray);
    }

    .data-table th {
        padding: 18px 20px;
        color: var(--dark-red);
        font-weight: 600;
        text-align: left;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border-bottom: 3px solid var(--light-red);
        position: sticky;
        top: 0;
        background: var(--light-gray);
        z-index: 10;
    }

    .data-table tbody tr {
        transition: all 0.3s ease;
        position: relative;
    }

    .data-table tbody tr::after {
        content: '';
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        height: 1px;
        background: linear-gradient(90deg, transparent, var(--light-red), transparent);
    }

    .data-table tbody tr:hover {
        background: #fff5f5;
        transform: scale(1.005);
        box-shadow: 0 5px 15px rgba(220, 38, 38, 0.1);
    }

    .data-table tbody tr:hover::after {
        opacity: 0;
    }

    .data-table td {
        padding: 16px 20px;
        color: var(--dark-gray);
        font-weight: 500;
        border: none;
        position: relative;
    }

    .data-table td::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 4px;
        background: var(--gradient-red);
        transform: scaleY(0);
        transition: transform 0.3s ease;
    }

    .data-table tr:hover td::before {
        transform: scaleY(1);
    }

    /* Pagination */
    .pagination-wrapper {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 25px;
        border-top: 2px solid var(--light-red);
        background: var(--light-gray);
    }

    .pagination-info {
        color: var(--medium-gray);
        font-size: 14px;
        font-weight: 500;
    }

    .pagination {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .page-link {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border: 2px solid var(--light-red);
        border-radius: 10px;
        color: var(--dark-gray);
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .page-link:hover {
        background: var(--light-red);
        transform: translateY(-2px);
        border-color: var(--primary-red);
    }

    .page-link.active {
        background: var(--gradient-red);
        color: var(--white);
        border-color: var(--primary-red);
        box-shadow: 0 5px 15px rgba(220, 38, 38, 0.2);
    }

    .page-link.disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    .page-link.disabled:hover {
        transform: none;
        background: transparent;
    }

    /* Quick Actions */
    .quick-actions {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-top: 30px;
    }

    .action-card {
        background: var(--white);
        border-radius: 15px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 5px 20px rgba(220, 38, 38, 0.08);
        cursor: pointer;
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }

    .action-card:hover {
        transform: translateY(-5px);
        border-color: var(--primary-red);
        box-shadow: 0 10px 30px rgba(220, 38, 38, 0.15);
    }

    .action-icon {
        width: 50px;
        height: 50px;
        background: var(--gradient-red);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px;
        color: var(--white);
        font-size: 20px;
        transition: all 0.3s ease;
    }

    .action-card:hover .action-icon {
        transform: rotate(15deg) scale(1.1);
    }

    .action-text {
        color: var(--dark-red);
        font-weight: 600;
        font-size: 14px;
    }

    /* Loading States */
    .loading-shimmer {
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 1000px 100%;
        animation: shimmer 2s infinite linear;
        border-radius: 8px;
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
        .stats-grid {
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        }
    }

    @media (max-width: 992px) {
        .dashboard-title {
            font-size: 2rem;
        }
        
        .filter-grid {
            grid-template-columns: 1fr;
        }
        
        .section-header {
            flex-direction: column;
            gap: 15px;
            align-items: flex-start;
        }
        
        .table-tools {
            width: 100%;
            justify-content: space-between;
        }
        
        .search-input {
            width: 200px;
        }
        
        .search-input:focus {
            width: 250px;
        }
    }

    @media (max-width: 768px) {
        .dashboard-container {
            padding: 15px;
        }
        
        .stats-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }
        
        .stat-card {
            padding: 20px;
        }
        
        .stat-value {
            font-size: 28px;
        }
        
        .data-table-wrapper {
            overflow-x: auto;
        }
        
        .data-table {
            min-width: 600px;
        }
        
        .pagination-wrapper {
            flex-direction: column;
            gap: 15px;
        }
    }

    @media (max-width: 576px) {
        .dashboard-title {
            font-size: 1.5rem;
        }
        
        .stat-icon-wrapper {
            width: 50px;
            height: 50px;
            font-size: 20px;
        }
        
        .filter-group {
            justify-content: center;
        }
        
        .search-input {
            width: 100%;
        }
        
        .page-link {
            width: 35px;
            height: 35px;
            font-size: 14px;
        }
    }

    /* Print Styles */
    @media print {
        .period-filter,
        .advanced-filter,
        .section-header,
        .pagination-wrapper,
        .quick-actions {
            display: none;
        }
        
        .stat-card {
            break-inside: avoid;
            box-shadow: none;
            border: 1px solid #ddd;
        }
        
        .data-table {
            border: 1px solid #ddd;
        }
    }
</style>



<script src="https://cdnjs.cloudflare.com/ajax/libs/countup.js/2.0.7/countUp.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize CountUp for stats
        const statValues = document.querySelectorAll('.stat-value');
        statValues.forEach(stat => {
            const value = parseInt(stat.textContent.replace(/,/g, ''));
            const countUp = new countUp.CountUp(stat, value, {
                duration: 2.5,
                separator: ',',
                easingFn: (t, b, c, d) => {
                    return c * ((t = t / d - 1) * t * t + 1) + b;
                }
            });
            countUp.start();
        });

        // Advanced Filter Toggle
        const filterToggle = document.querySelector('.filter-toggle');
        const advancedFilter = document.querySelector('.advanced-filter');
        
        filterToggle.addEventListener('click', function() {
            this.classList.toggle('active');
            advancedFilter.classList.toggle('expanded');
        });

        // Time Period Filter
        const filterBtns = document.querySelectorAll('.filter-btn');
        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                filterBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                
                // Simulate loading
                const cards = document.querySelectorAll('.stat-card');
                cards.forEach(card => {
                    card.classList.add('loading-shimmer');
                    setTimeout(() => {
                        card.classList.remove('loading-shimmer');
                    }, 800);
                });
            });
        });

        // Table Search Filter
        const searchInputs = document.querySelectorAll('.search-input');
        searchInputs.forEach(input => {
            input.addEventListener('input', function() {
                const tableId = this.getAttribute('data-table');
                const table = document.getElementById(tableId);
                const searchTerm = this.value.toLowerCase();
                const rows = table.querySelectorAll('tbody tr');
                
                rows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    row.style.display = text.includes(searchTerm) ? '' : 'none';
                });
            });
        });

        // Pagination
        function setupPagination(tableId, itemsPerPage = 10) {
            const table = document.getElementById(tableId);
            const rows = table.querySelectorAll('tbody tr');
            const pagination = document.querySelector(`[data-pagination="${tableId}"]`);
            const pageInfo = pagination.querySelector('.pagination-info');
            const totalPages = Math.ceil(rows.length / itemsPerPage);
            let currentPage = 1;
            
            function showPage(page) {
                rows.forEach((row, index) => {
                    const start = (page - 1) * itemsPerPage;
                    const end = start + itemsPerPage;
                    row.style.display = (index >= start && index < end) ? '' : 'none';
                });
                
                pageInfo.textContent = `Showing ${Math.min(rows.length, start + 1)}-${Math.min(rows.length, end)} of ${rows.length}`;
                
                // Update pagination buttons
                const pageLinks = pagination.querySelectorAll('.page-link');
                pageLinks.forEach(link => {
                    link.classList.remove('active');
                    if(parseInt(link.textContent) === page) {
                        link.classList.add('active');
                    }
                });
            }
            
            // Generate pagination buttons
            const pageNumbers = pagination.querySelector('.page-numbers');
            pageNumbers.innerHTML = '';
            
            for(let i = 1; i <= totalPages; i++) {
                if(i <= 5 || i === totalPages || Math.abs(i - currentPage) <= 2) {
                    const pageLink = document.createElement('span');
                    pageLink.className = `page-link ${i === 1 ? 'active' : ''}`;
                    pageLink.textContent = i;
                    pageLink.addEventListener('click', () => {
                        currentPage = i;
                        showPage(i);
                    });
                    pageNumbers.appendChild(pageLink);
                    
                    if(i === 5 && totalPages > 6) {
                        const ellipsis = document.createElement('span');
                        ellipsis.className = 'page-link disabled';
                        ellipsis.textContent = '...';
                        pageNumbers.appendChild(ellipsis);
                        i = totalPages - 1;
                    }
                }
            }
            
            // Previous/Next buttons
            const prevBtn = pagination.querySelector('.prev-page');
            const nextBtn = pagination.querySelector('.next-page');
            
            prevBtn.addEventListener('click', () => {
                if(currentPage > 1) {
                    currentPage--;
                    showPage(currentPage);
                }
            });
            
            nextBtn.addEventListener('click', () => {
                if(currentPage < totalPages) {
                    currentPage++;
                    showPage(currentPage);
                }
            });
            
            showPage(1);
        }
        
        // Initialize pagination for each table
        setupPagination('shipmentsTable');
        setupPagination('ridersTable');
        setupPagination('usersTable');
        setupPagination('topPerformersTable');

        // Card Click Effects
        const statCards = document.querySelectorAll('.stat-card');
        statCards.forEach(card => {
            card.addEventListener('click', function() {
                this.style.animation = 'pulse 0.6s ease';
                setTimeout(() => {
                    this.style.animation = '';
                }, 600);
            });
        });

        // Real-time Data Updates Simulation
        function simulateRealTimeUpdates() {
            setInterval(() => {
                const randomCard = statCards[Math.floor(Math.random() * statCards.length)];
                const valueElement = randomCard.querySelector('.stat-value');
                const currentValue = parseInt(valueElement.textContent.replace(/,/g, ''));
                const newValue = currentValue + Math.floor(Math.random() * 10);
                
                // Animate value change
                valueElement.style.transform = 'scale(1.1)';
                setTimeout(() => {
                    valueElement.style.transform = 'scale(1)';
                }, 300);
            }, 10000); // Update every 10 seconds
        }
        
        simulateRealTimeUpdates();

        // Export Functionality
        document.querySelectorAll('.export-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const tableId = this.getAttribute('data-export');
                const table = document.getElementById(tableId);
                
                // Simple CSV export
                let csv = [];
                const rows = table.querySelectorAll('tr');
                
                rows.forEach(row => {
                    const rowData = [];
                    const cols = row.querySelectorAll('th, td');
                    
                    cols.forEach(col => {
                        rowData.push(col.textContent.trim());
                    });
                    
                    csv.push(rowData.join(','));
                });
                
                const csvContent = csv.join('\n');
                const blob = new Blob([csvContent], { type: 'text/csv' });
                const url = window.URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                a.download = `${tableId}_export.csv`;
                a.click();
            });
        });

        // Smooth Scrolling for Table Navigation
        document.querySelectorAll('[data-scroll-to]').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('data-scroll-to');
                const target = document.getElementById(targetId);
                
                if(target) {
                    window.scrollTo({
                        top: target.offsetTop - 100,
                        behavior: 'smooth'
                    });
                }
            });
        });
    });
</script>



<div class="dashboard-container">
    <!-- Dashboard Header -->
    <div class="dashboard-header">
        <h1 class="dashboard-title">
            <i class="fas fa-tachometer-alt"></i> Courier Management Dashboard
        </h1>
        <p class="text-muted mt-2">Real-time analytics and performance insights</p>
    </div>

    

    <!-- Advanced Filter Panel -->
    

    <!-- Main Stats Grid -->
    <div class="stats-grid">
        @php
            $stats = [
                ['icon' => 'fa-shipping-fast', 'title' => 'Total Shipments', 'value' => $totalShipments, 'trend' => '+12%', 'progress' => 75],
                ['icon' => 'fa-users', 'title' => 'Total Users', 'value' => $totalUsers, 'trend' => '+8%', 'progress' => 60],
                ['icon' => 'fa-motorcycle', 'title' => 'Total Riders', 'value' => $totalRiders, 'trend' => '+15%', 'progress' => 85],
                ['icon' => 'fa-times-circle', 'title' => 'Pending/Cancelled', 'value' => $totalCancelled, 'trend' => '-5%', 'progress' => 25],
                ['icon' => 'fa-check-circle', 'title' => 'Total Delivered', 'value' => $totalDelivered, 'trend' => '+18%', 'progress' => 90],
                ['icon' => 'fa-road', 'title' => 'In Transit', 'value' => $totalInTransit, 'trend' => '+3%', 'progress' => 40],
                ['icon' => 'fa-bolt', 'title' => 'Express Deliveries', 'value' => $expressDeliveries, 'trend' => '+25%', 'progress' => 65],
                ['icon' => 'fa-clock', 'title' => 'Overnight Deliveries', 'value' => $overnightDeliveries, 'trend' => '+10%', 'progress' => 55],
            ];
        @endphp

        @foreach($stats as $index => $stat)
            <div class="stat-card" style="--card-index: {{ $index + 1 }};">
                <div class="stat-card-header">
                    <div class="stat-icon-wrapper">
                        <i class="fas {{ $stat['icon'] }}"></i>
                    </div>
                    <div class="stat-indicator {{ strpos($stat['trend'], '+') !== false ? 'indicator-up' : 'indicator-down' }}">
                        <i class="fas {{ strpos($stat['trend'], '+') !== false ? 'fa-arrow-up' : 'fa-arrow-down' }}"></i>
                        {{ $stat['trend'] }}
                    </div>
                </div>
                <div class="stat-content">
                    <div class="stat-title">{{ $stat['title'] }}</div>
                    <div class="stat-value count-up">{{ $stat['value'] }}</div>
                    <div class="stat-progress">
                        <div class="progress-bar" style="--progress: {{ $stat['progress'] }}%"></div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Shipments Per Day Table -->
    <div class="data-section" id="shipmentsTableSection">
        <div class="section-card">
            <div class="section-header">
                <h3 class="section-title">
                    <i class="fas fa-calendar-day"></i> Daily Shipment Analytics
                </h3>
                <div class="table-tools">
                    <div class="search-box">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" class="search-input" placeholder="Search shipments..." data-table="shipmentsTable">
                    </div>
                    <a href="/exporttoexcel2"><button class="btn btn-light export-btn" data-export="shipmentsTable">
                        <i class="fas fa-download"></i> Export
                    </button></a>
                </div>
            </div>
            <div class="data-table-wrapper">
                <table class="data-table" id="shipmentsTable">
                    <thead>
                        <tr>
                            <th><i class="far fa-calendar"></i> Date</th>
                            <th><i class="fas fa-boxes"></i> Total Shipments</th>
                            <th><i class="fas fa-percentage"></i> Daily Growth</th>
                            <th><i class="fas fa-chart-line"></i> Trend</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($shipmentsPerDay as $index => $day)
                            @php
                                $prev = $index > 0 ? $shipmentsPerDay[$index - 1]->total : 0;
                                $growth = $prev > 0 ? (($day->total - $prev) / $prev * 100) : 0;
                                $trendIcon = $growth >= 0 ? 'fa-arrow-up text-success' : 'fa-arrow-down text-danger';
                            @endphp
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($day->date)->format('M d, Y') }}</td>
                                <td><span class="badge bg-danger rounded-pill px-3">{{ $day->total }}</span></td>
                                <td>
                                    <span class="fw-bold {{ $growth >= 0 ? 'text-success' : 'text-danger' }}">
                                        {{ number_format($growth, 1) }}%
                                    </span>
                                </td>
                                <td>
                                    <i class="fas {{ $trendIcon }}"></i>
                                    @if(abs($growth) > 10)
                                        <span class="badge {{ $growth > 0 ? 'bg-success' : 'bg-danger' }} ms-2">
                                            {{ $growth > 0 ? 'High' : 'Low' }}
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination-wrapper" data-pagination="shipmentsTable">
                <div class="pagination-info">Showing 1-10 of {{ count($shipmentsPerDay) }}</div>
                <div class="pagination">
                    <span class="page-link prev-page"><i class="fas fa-chevron-left"></i></span>
                    <div class="page-numbers"></div>
                    <span class="page-link next-page"><i class="fas fa-chevron-right"></i></span>
                </div>
            </div>
        </div>
    </div>

    <!-- Performance Tables in Grid -->
    <div class="row">
        <div class="col-lg-6">
            <div class="data-section" id="ridersTableSection">
                <div class="section-card">
                    <div class="section-header">
                        <h3 class="section-title">
                            <i class="fas fa-user-tie"></i> Rider Performance
                        </h3>
                       
                    </div>
                    <div class="data-table-wrapper">
                        <table class="data-table" id="ridersTable">
                            <thead>
                                <tr>
                                    <th><i class="fas fa-motorcycle"></i> Rider Name</th>
                                    <th><i class="fas fa-box-open"></i> Shipments</th>
                                    <th><i class="fas fa-star"></i> Rating</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($shipmentsPerRider as $rider)
                                    @php
                                        $rating = min(5, max(1, rand(3,5)));
                                    @endphp
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm bg-light-red rounded-circle d-flex align-items-center justify-content-center me-2">
                                                    <i class="fas fa-user text-danger"></i>
                                                </div>
                                                {{ $rider->rider?->Fullname ?? 'N/A' }}
                                            </div>
                                        </td>
                                        <td><span class="badge bg-gradient-red rounded-pill px-3">{{ $rider->total }}</span></td>
                                        <td>
                                            <div class="star-rating">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <i class="fas fa-star {{ $i <= $rating ? 'text-warning' : 'text-muted' }}"></i>
                                                @endfor
                                                <small class="ms-2">{{ $rating }}/5</small>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination-wrapper" data-pagination="ridersTable">
                        <div class="pagination-info">Showing 1-10 of {{ count($shipmentsPerRider) }}</div>
                        <div class="pagination">
                            <span class="page-link prev-page"><i class="fas fa-chevron-left"></i></span>
                            <div class="page-numbers"></div>
                            <span class="page-link next-page"><i class="fas fa-chevron-right"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="data-section" id="usersTableSection">
                <div class="section-card">
                    <div class="section-header">
                        <h3 class="section-title">
                            <i class="fas fa-users"></i> User Activity
                        </h3>
                        
                    </div>
                    <div class="data-table-wrapper">
                        <table class="data-table" id="usersTable">
                            <thead>
                                <tr>
                                    <th><i class="fas fa-user"></i> User Name</th>
                                    <th><i class="fas fa-box"></i> Shipments</th>
                                    <th><i class="fas fa-clock"></i> Last Activity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($topUsers as $user)
                                    @php
                                        $daysAgo = rand(1, 30);
                                        $lastActive = now()->subDays($daysAgo)->format('M d');
                                    @endphp
                                    <tr>
                                        <td>{{ $user->user?->name ?? 'N/A' }}</td>
                                        <td><span class="badge bg-success rounded-pill px-3">{{ $user->total }}</span></td>
                                        <td>
                                            <small class="text-muted">
                                                <i class="far fa-clock me-1"></i>{{ $lastActive }}
                                            </small>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination-wrapper" data-pagination="usersTable">
                        <div class="pagination-info">Showing 1-10 of {{ count($topUsers) }}</div>
                        <div class="pagination">
                            <span class="page-link prev-page"><i class="fas fa-chevron-left"></i></span>
                            <div class="page-numbers"></div>
                            <span class="page-link next-page"><i class="fas fa-chevron-right"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Top Performers Table -->
    <div class="data-section" id="topPerformersTableSection">
        <div class="section-card">
            <div class="section-header">
                <h3 class="section-title">
                    <i class="fas fa-trophy"></i> Top Performers
                </h3>
                <div class="table-tools">
                    <div class="search-box">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" class="search-input" placeholder="Search performers..." data-table="topPerformersTable">
                    </div>
                   <a href="/exporttoexcel2"> <button class="btn btn-light export-btn" data-export="shipmentsTable">
                        <i class="fas fa-download"></i> Export
                    </button></a>
                    
                </div>
            </div>
            <div class="data-table-wrapper">
                <table class="data-table" id="topPerformersTable">
                    <thead>
                        <tr>
                            <th><i class="fas fa-ranking-star"></i> Rank</th>
                            <th><i class="fas fa-user-tag"></i> Category</th>
                            <th><i class="fas fa-user"></i> Name</th>
                            <th><i class="fas fa-chart-line"></i> Performance</th>
                            <th><i class="fas fa-award"></i> Achievement</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($topRiders as $index => $rider)
                            <tr>
                                <td>
                                    <span class="badge {{ $index < 3 ? 'bg-warning' : 'bg-secondary' }} rounded-circle p-2">
                                        #{{ $index + 1 }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-warning">
                                        <i class="fas fa-motorcycle"></i> Top Rider
                                    </span>
                                </td>
                                <td>{{ $rider->rider?->Fullname ?? 'N/A' }}</td>
                                <td>{{ $rider->total_delivered }} delivered</td>
                                <td>
                                    @if($index === 0)
                                        <span class="badge bg-gold">Gold</span>
                                    @elseif($index === 1)
                                        <span class="badge bg-silver">Silver</span>
                                    @elseif($index === 2)
                                        <span class="badge bg-bronze">Bronze</span>
                                    @else
                                        <span class="badge bg-light">Participant</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination-wrapper" data-pagination="topPerformersTable">
                <div class="pagination-info">Showing 1-10 of {{ count($topRiders) }}</div>
                <div class="pagination">
                    <span class="page-link prev-page"><i class="fas fa-chevron-left"></i></span>
                    <div class="page-numbers"></div>
                    <span class="page-link next-page"><i class="fas fa-chevron-right"></i></span>
                </div>
            </div>
        </div>
    </div>

    
    </div>
</div>

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- Bootstrap JS for dropdowns -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection