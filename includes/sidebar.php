<?php
// includes/sidebar.php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<aside class="sidebar">
    <div class="sidebar-header">
        <svg width="30" height="30" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-right: 8px;">
            <path d="M35 20V45M35 45C35 50 38 53 43 53V80M27 20V43C27 48 30 51 35 51M43 20V43C43 48 40 51 35 51" stroke="var(--primary)" stroke-width="8" stroke-linecap="round"/>
            <path d="M65 20C65 20 65 50 65 55C65 60 62 63 57 63V80" stroke="var(--secondary)" stroke-width="8" stroke-linecap="round"/>
        </svg>
        <span style="font-size: 0.85rem; font-weight: 700;"><?php echo strtoupper(get_setting('system_name', 'SWAHILI FOOD')); ?></span>
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
            <?php
endif; ?>
        </ul>
    </nav>
</aside>