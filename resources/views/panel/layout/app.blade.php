<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List Uygulaması</title>
    <!-- Stil dosyasını (style.css) bağla -->
    <link rel="stylesheet" href="{{ asset('panel/css/style.css') }}">
    <!-- Font Awesome ikonları (silme butonu vb. için) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<!-- ----- Navbar (Üst Menü) ----- -->
<nav class="navbar">
    <div class="navbar-brand">
        <a href="/">TodoProjesi</a>
    </div>
    <ul class="navbar-links">
        <li><a href="#">Ayarlar</a></li>
        <li><a href="#">Profil</a></li>
        <li><a href="#">Çıkış Yap</a></li>
    </ul>
</nav>

<div class="main-container">
    <!-- ----- Sidebar (Yan Menü) ----- -->
    <aside class="sidebar">
        <div class="sidebar-header">
            Menü
        </div>
        <ul class="sidebar-nav">
            <li class="nav-item active">
                <a href="#">
                    <i class="fas fa-tasks"></i>
                    <span>Tüm Görevler</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#">
                    <i class="fas fa-calendar-day"></i>
                    <span>Bugün</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Yaklaşanlar</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#">
                    <i class="fas fa-box-archive"></i>
                    <span>Arşiv</span>
                </a>
            </li>
        </ul>
    </aside>

    <!-- ----- Ana İçerik Alanı ----- -->
    <main class="content-wrapper">
        <div class="todo-container">
            <header class="todo-header">
                <h1><i class="fas fa-tasks"></i> Yapılacaklar Listem</h1>
                <!-- JavaScript ile buraya tarih gelecek -->
                <p id="todo-date"></p>
            </header>

            <!-- Yeni görev ekleme formu -->
            <form id="todo-form" class="todo-form">
                <input type="text" id="todo-input" placeholder="Yeni bir görev ekleyin..." aria-label="Yeni görev" required>
                <button type="submit" aria-label="Görev ekle"><i class="fas fa-plus"></i> Ekle</button>
            </form>

            <!-- Görev listesi (JS ile dolacak) -->
            <ul id="todo-list" class="todo-list">
                <!--
                JavaScript ile dinamik olarak eklenecek örnek görev yapısı:
                <li class="todo-item">
                    <input type="checkbox" aria-label="Görevi tamamla">
                    <span>Örnek görev metni</span>
                    <button class="delete-btn" aria-label="Görevi sil"><i class="fas fa-trash"></i></button>
                </li>
                <li class="todo-item completed">
                    <input type="checkbox" checked aria-label="Görevi tamamla">
                    <span>Tamamlanmış görev</span>
                    <button class="delete-btn" aria-label="Görevi sil"><i class="fas fa-trash"></i></button>
                </li>
                -->
            </ul>
        </div>
    </main>
</div>

<!-- ----- Footer (Alt Bilgi) ----- -->
<footer class="footer">
    <p>&copy; <span id="footer-year">2024</span> Todo List Uygulaması. Tüm hakları saklıdır.</p>
</footer>

<!-- JavaScript dosyasını (script.js) bağla -->
<script src="{{ asset('panel/js/menu.js') }}"></script>
</body>
</html>
