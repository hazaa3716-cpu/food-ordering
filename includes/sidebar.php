<?php
// includes/sidebar.php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<aside class="sidebar">
    <div class="sidebar-header">
        <img src="/assets/images/CBE_Logo2.png" alt="Logo" style="width: 30px; height: auto; border-radius: 4px;">
        <span style="font-size: 0.85rem;"><?php echo strtoupper(get_setting('system_name', 'CBE SYSTEM')); ?></span>
    </div>
    <nav class="sidebar-nav">
        <ul>
            <li class="<?php echo $current_page == 'dashboard.php' ? 'active' : ''; ?>">
                <a href="/dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            </li>
            <li class="<?php echo $current_page == 'index.php' ? 'active' : ''; ?>">
                <a href="/index.php"><i class="fas fa-external-link-alt"></i> View Website</a>
            </li>

            <li class="nav-label">Modules</li>
            <li class="<?php echo strpos($_SERVER['PHP_SELF'], 'modules/sample_items') !== false ? 'active' : ''; ?>">
                <a href="/modules/sample_items/list.php"><i class="fas fa-list"></i> Sample Items</a>
            </li>

            <li class="nav-label">Account</li>
            <li class="<?php echo $current_page == 'profile.php' ? 'active' : ''; ?>">
                <a href="/profile.php"><i class="fas fa-user-circle"></i> My Profile</a>
            </li>

            <?php if (has_role('admin')): ?>
                <li class="nav-label">Administration</li>
                <li class="<?php echo strpos($_SERVER['PHP_SELF'], 'modules/users') !== false ? 'active' : ''; ?>">
                    <a href="/modules/users/list.php"><i class="fas fa-users"></i> User Management</a>
                </li>
                <li class="<?php echo $current_page == 'settings.php' ? 'active' : ''; ?>">
                    <a href="/settings.php"><i class="fas fa-cog"></i> System Settings</a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</aside>