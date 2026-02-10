<?php
// public/register.php
$page_title = 'Register';
include __DIR__ . '/../includes/header.php';

if (is_logged_in()) {
    header('Location: /dashboard.php');
    exit();
}
?>

<div class="auth-page">
    <div class="auth-image-side">
        <div class="auth-image-content">
            <h2>Jiunge na Familia ya Swahili</h2>
            <p>Jisajili leo na uanze kufurahia ladha halisi za nyumbani kiganjani mwako.</p>
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
                <h1>Jisajili Sasa</h1>
                <p style="color: #64748b;">Unda akaunti yako ili kuanza kuagiza</p>
            </div>

            <div id="alert-container"></div>

            <form id="register-form" class="form-creative">
                <div class="form-group">
                    <label for="username">Jina la Mtumiaji</label>
                    <div class="input-creative-wrapper">
                        <i class="fas fa-user"></i>
                        <input type="text" id="username" name="username" class="form-control" required placeholder="Chagua jina la kipekee...">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Barua Pepe</label>
                    <div class="input-creative-wrapper">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="email" name="email" class="form-control" required placeholder="mfano@gmail.com">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Nenosiri</label>
                    <div class="input-creative-wrapper">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" name="password" class="form-control" required placeholder="Unda nenosiri imara...">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-creative">Tengeneza Akaunti</button>
            </form>

            <div class="auth-footer-creative">
                Tayari unayo akaunti? <a href="/login.php">Ingia Hapa</a>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('register-form').addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(e.target);
        const data = Object.fromEntries(formData.entries());

        const response = await apiCall('/api/auth.php?action=register', 'POST', data);

        const alertContainer = document.getElementById('alert-container');
        if (response.success) {
            alertContainer.innerHTML = `<div class="alert alert-success">${response.message} Redirection to login...</div>`;
            setTimeout(() => window.location.href = '/login.php', 2000);
        } else {
            alertContainer.innerHTML = `<div class="alert alert-danger">${response.message}</div>`;
        }
    });
</script>

<?php include __DIR__ . '/../includes/footer.php'; ?>