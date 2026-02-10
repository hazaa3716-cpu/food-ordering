<?php
// public/dashboard.php
$page_title = 'Dashboard';
include __DIR__ . '/../includes/header.php';
require_login();

// Fetch some stats
$stats = [
    'users' => $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn(),
    'items' => $pdo->query("SELECT COUNT(*) FROM sample_items")->fetchColumn(),
    'logs' => $pdo->query("SELECT COUNT(*) FROM activity_logs")->fetchColumn(),
];

// Fetch recent activity
$recent_activities = $pdo->query("SELECT al.*, u.username FROM activity_logs al LEFT JOIN users u ON al.user_id = u.id ORDER BY timestamp DESC LIMIT 5")->fetchAll();
?>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-info">
            <h3>Total Users</h3>
            <div class="stat-value">
                <?php echo $stats['users']; ?>
            </div>
        </div>
        <div class="stat-icon bg-primary-light">
            <i class="fas fa-users"></i>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-info">
            <h3>Sample Items</h3>
            <div class="stat-value">
                <?php echo $stats['items']; ?>
            </div>
        </div>
        <div class="stat-icon bg-success-light">
            <i class="fas fa-box"></i>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-info">
            <h3>Activity Logs</h3>
            <div class="stat-value">
                <?php echo $stats['logs']; ?>
            </div>
        </div>
        <div class="stat-icon bg-warning-light">
            <i class="fas fa-history"></i>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3>Recent Activity</h3>
        <a href="#" class="btn btn-secondary btn-sm">View All</a>
    </div>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>User</th>
                    <th>Action</th>
                    <th>Details</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($recent_activities as $activity): ?>
                    <tr>
                        <td><strong>
                                <?php echo $activity['username'] ?? 'System'; ?>
                            </strong></td>
                        <td>
                            <?php echo $activity['action']; ?>
                        </td>
                        <td>
                            <?php echo $activity['details'] ?? '-'; ?>
                        </td>
                        <td>
                            <?php echo date('M d, H:i', strtotime($activity['timestamp'])); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php if (empty($recent_activities)): ?>
                    <tr>
                        <td colspan="4" style="text-align: center;">No activity found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>