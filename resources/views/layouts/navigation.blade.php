<style>
    :root {
        --bg: #4da528;
        --bg-darker: #3a7d1f;
        --text: #ffffff;
        --card: #8d6e63;
        --primary: #ffd800;
        --accent: #ff5722;
        --border-wood: #5d4037;
    }

    nav {
        background: var(--card);
        border-bottom: 6px solid var(--border-wood);
        box-shadow: 0 6px 15px rgba(0,0,0,0.3);
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000;
        transition: transform 0.3s ease;
    }

    nav.navbar-hide {
        transform: translateY(-100%);
    }

    body {
        padding-top: 60px;
    }

    .navbar-container {
        max-width: 1200px;
        margin: auto;
        padding: 12px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .navbar-logo {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .navbar-logo a {
        text-decoration: none;
        color: var(--primary);
        font-family: 'Luckiest Guy', cursive;
        font-size: 1.5rem;
        font-weight: bold;
        transition: 0.3s;
    }

    .navbar-logo a:hover {
        transform: scale(1.05);
    }

    .navbar-menu {
        display: flex;
        gap: 30px;
        align-items: center;
    }

    .navbar-menu a {
        color: var(--text);
        text-decoration: none;
        font-weight: bold;
        transition: 0.3s;
        font-size: 1rem;
        position: relative;
    }

    .navbar-menu a:hover {
        color: var(--primary);
        transform: translateY(-2px);
    }

    .navbar-menu a::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 0;
        height: 2px;
        background: var(--primary);
        transition: 0.3s;
    }

    .navbar-menu a:hover::after {
        width: 100%;
    }

    .btn-dashboard {
        color: #000 !important;
        background: var(--primary);
        padding: 10px 20px;
        border-radius: 5px;
        transition: 0.3s;
        display: inline-block;
    }

    .btn-dashboard:hover {
        background: #ffed4e;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    }

    .btn-dashboard::after {
        display: none;
    }

    .btn-login {
        color: #000 !important;
        background: var(--primary);
        padding: 10px 20px;
        border-radius: 5px;
        transition: 0.3s;
        display: inline-block;
    }

    .btn-login:hover {
        background: #ffed4e;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    }

    .btn-login::after {
        display: none;
    }

    .btn-register {
        color: white !important;
        background: var(--accent);
        padding: 10px 20px;
        border-radius: 5px;
        transition: 0.3s;
        display: inline-block;
    }

    .btn-register:hover {
        background: #ff7043;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    }

    .btn-register::after {
        display: none;
    }

    .btn-logout {
        background: #e53935;
        color: white !important;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
        transition: 0.3s;
        font-size: 1rem;
        border: 3px solid #b71c1c;
        font-family: 'Montserrat', sans-serif;
    }

    .btn-logout:hover {
        background: #ff5252;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    }

    .logout-form {
        display: inline;
    }

    /* Hamburger Menu - Hidden on Desktop */
    .hamburger {
        display: none;
        flex-direction: column;
        cursor: pointer;
        gap: 5px;
        background: none;
        border: none;
        padding: 0;
    }

    .hamburger span {
        width: 25px;
        height: 3px;
        background: var(--primary);
        border-radius: 2px;
        transition: 0.3s;
    }

    /* Mobile Responsive */
    @media (max-width: 768px) {
        body {
            padding-top: 55px;
        }

        nav {
            height: 55px;
        }

        .navbar-container {
            padding: 10px 15px;
            height: 55px;
        }

        .navbar-logo a {
            font-size: 1.3rem;
        }

        .navbar-menu {
            display: none;
        }

        .navbar-menu.active {
            display: flex;
            flex-direction: column;
            gap: 15px;
            position: fixed;
            top: 55px;
            left: 0;
            right: 0;
            background: var(--card);
            padding: 15px 20px;
            border-bottom: 4px solid var(--border-wood);
            box-shadow: 0 6px 15px rgba(0,0,0,0.3);
            z-index: 999;
            width: 100%;
            max-height: calc(100vh - 55px);
            overflow-y: auto;
        }

        .navbar-menu a {
            font-size: 0.95rem;
        }

        .hamburger {
            display: flex;
        }
    }

    @media (max-width: 480px) {
        body {
            padding-top: 50px;
        }

        nav {
            height: 50px;
        }

        .navbar-container {
            padding: 8px 10px;
            height: 50px;
        }

        .navbar-logo a {
            font-size: 1.1rem;
        }

        .navbar-menu.active {
            top: 50px;
            padding: 10px 15px;
        }

        .navbar-menu a {
            font-size: 0.9rem;
        }

        .btn-dashboard,
        .btn-login,
        .btn-register,
        .btn-logout {
            padding: 8px 16px;
            font-size: 0.9rem;
        }
    }
</style>

<nav>
    <div class="navbar-container">
        <!-- Logo -->
        <div class="navbar-logo">
            <a href="{{ url('/') }}">🎮 RASYA</a>
        </div>

        <!-- Hamburger Menu Button -->
        <button class="hamburger" id="hamburger" onclick="toggleMenu()">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <!-- Menu -->
        <div class="navbar-menu" id="navbarMenu">
            <a href="{{ url('/') }}">Portfolio</a>
            <a href="{{ route('project') }}">Project</a>
            
            @auth
                <a href="{{ route('dashboard') }}" class="btn-dashboard">📊 Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" class="logout-form">
                    @csrf
                    <button type="submit" class="btn-logout">🚪 Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn-login">🔐 Login</a>
                <a href="{{ route('register') }}" class="btn-register">✏️ Register</a>
            @endauth
        </div>
    </div>
</nav>

<script>
    function toggleMenu() {
        const menu = document.getElementById('navbarMenu');
        const hamburger = document.getElementById('hamburger');
        menu.classList.toggle('active');
        
        // Animate hamburger
        const spans = hamburger.querySelectorAll('span');
        if (menu.classList.contains('active')) {
            spans[0].style.transform = 'rotate(45deg) translate(10px, 10px)';
            spans[1].style.opacity = '0';
            spans[2].style.transform = 'rotate(-45deg) translate(8px, -8px)';
        } else {
            spans[0].style.transform = 'none';
            spans[1].style.opacity = '1';
            spans[2].style.transform = 'none';
        }
    }

    // Close menu when clicking on a link
    document.querySelectorAll('.navbar-menu a').forEach(link => {
        link.addEventListener('click', function() {
            document.getElementById('navbarMenu').classList.remove('active');
            const hamburger = document.getElementById('hamburger');
            const spans = hamburger.querySelectorAll('span');
            spans[0].style.transform = 'none';
            spans[1].style.opacity = '1';
            spans[2].style.transform = 'none';
        });
    });

    // Close menu when clicking logout button
    document.querySelector('.logout-form')?.addEventListener('submit', function() {
        document.getElementById('navbarMenu').classList.remove('active');
    });

    // Hide navbar on scroll down, show on scroll up
    let lastScrollTop = 0;
    const navbar = document.querySelector('nav');

    window.addEventListener('scroll', function() {
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        if (scrollTop > lastScrollTop) {
            // Scrolling DOWN
            navbar.classList.add('navbar-hide');
        } else {
            // Scrolling UP
            navbar.classList.remove('navbar-hide');
        }
        lastScrollTop = scrollTop <= 0 ? 0 : scrollTop; // For Mobile or negative scrolling
    });
</script>
