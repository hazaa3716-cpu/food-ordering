<?php
// public/login.php
$page_title = 'Login - Boilerplate';
include __DIR__ . '/../includes/header.php';

if (is_logged_in()) {
    header('Location: /dashboard.php');
    exit();
}
?>

<div class="auth-page">
    <div class="auth-image-side">
        <div class="auth-image-content">
            <h2>Ladha Halisi ya Swahili</h2>
            <p>Karibu tena kwenye mfumo wako wa agizo la vyakula. Furahia ladha za asili popote ulipo.</p>
        </div>
    </div>
    <div class="auth-form-side">
        <div class="auth-card-creative">
            <div class="auth-header-creative">
                <svg width="60" height="60" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M35 20V45M35 45C35 50 38 53 43 53V80M27 20V43C27 48 30 51 35 51M43 20V43C43 48 40 51 35 51" stroke="var(--primary)" stroke-width="5" stroke-linecap="round"/>
                    <path d="M65 20C65 20 65 50 65 55C65 60 62 63 57 63V80M57 63C62 63 65 60 65 55" stroke="var(--secondary)" stroke-width="5" stroke-linecap="round"/>
                    <path d="M65 20V55C65 65 57 65 57 65V20H65Z" fill="var(--secondary)" opacity="0.2"/>
                </svg>
                <h1>Karibu Tena</h1>
                <p style="color: #64748b;">Ingia ili kuendelea na agizo lako</p>
            </div>

            <div id="alert-container"></div>

            <form id="login-form" class="form-creative">
                <div class="form-group">
                    <label for="login">Jina la Mtumiaji au Barua Pepe</label>
                    <div class="input-creative-wrapper">
                        <i class="fas fa-user-circle"></i>
                        <input type="text" id="login" name="login" class="form-control" required placeholder="Ingiza hapa...">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Nenosiri</label>
                    <div class="input-creative-wrapper">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" name="password" class="form-control" required placeholder="Ingiza nenosiri...">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-creative">Ingia Sasa</button>
            </form>

            <div class="auth-footer-creative">
                Huna akaunti? <a href="/register.php">Jisajili Hapa</a>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('login-form').addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(e.target);
        const data = Object.fromEntries(formData.entries());

        const response = await apiCall('/api/auth.php?action=login', 'POST', data);

        const alertContainer = document.getElementById('alert-container');
        if (response.success) {
            alertContainer.innerHTML = `<div class="alert alert-success">${response.message}</div>`;
            setTimeout(() => window.location.href = response.redirect, 1000);
        } else {
            alertContainer.innerHTML = `<div class="alert alert-danger">${response.message}</div>`;
        }
    });
</script>

<?php include __DIR__ . '/../includes/footer.php'; ?>