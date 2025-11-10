document.addEventListener("DOMContentLoaded", () => {
    // Gerekli DOM elemanlarını seç
    const todoForm = document.getElementById("todo-form");
    const todoInput = document.getElementById("todo-input");
    const todoList = document.getElementById("todo-list");
    const todoDateEl = document.getElementById("todo-date");
    const footerYearEl = document.getElementById("footer-year");

    // ----- Tarih Gösterimi (Header) -----
    if (todoDateEl) {
        const options = {
            weekday: "long",
            year: "numeric",
            month: "long",
            day: "numeric",
        };
        const today = new Date();
        todoDateEl.textContent = today.toLocaleDateString("tr-TR", options);
    }

    // ----- Yıl Gösterimi (Footer) -----
    if (footerYearEl) {
        footerYearEl.textContent = new Date().getFullYear();
    }

    // ----- Görev Ekleme (Form gönderildiğinde) -----
    if (todoForm) {
        todoForm.addEventListener("submit", (e) => {
            // Formun varsayılan gönderme işlemini engelle
            e.preventDefault();

            // Input'tan görev metnini al (ve başındaki/sonundaki boşlukları temizle)
            const taskText = todoInput.value.trim();

            // Eğer görev metni boş değilse...
            if (taskText !== "") {
                // Yeni görevi listeye ekle (fonksiyonu çağır)
                addTask(taskText);
                // Input'u temizle
                todoInput.value = "";
                // Input'a tekrar odaklan (kullanıcı deneyimi için)
                todoInput.focus();
            }
        });
    }

    // ----- Görevleri Silme ve Tamamlama (Event Delegation) -----
    // Tüm tıklamaları ana liste (ul) üzerinden dinle
    if (todoList) {
        todoList.addEventListener("click", (e) => {

            // 1. Silme İşlemi
            // Tıklanan eleman veya onun üst elementi 'delete-btn' sınıfına sahip mi?
            const deleteButton = e.target.closest(".delete-btn");
            if (deleteButton) {
                // Görevin bulunduğu 'li' elemanını (parentElement) bul
                const todoItem = deleteButton.parentElement;
                // 'li' elemanını listeden kaldır
                todoItem.remove();
            }

            // 2. Tamamlama İşlemi
            // Tıklanan eleman bir checkbox mı?
            if (e.target.type === "checkbox") {
                // Görevin bulunduğu 'li' elemanını bul
                const todoItem = e.target.parentElement;
                // 'completed' (CSS sınıfı) sınıfını ekle veya kaldır
                todoItem.classList.toggle("completed");
            }
        });
    }

    /**
     * DOM'a (HTML'e) yeni bir görev öğesi ekleyen fonksiyon
     * @param {string} text - Eklenecek görevin metni
     */
    function addTask(text) {
        // Yeni bir 'li' (liste öğesi) oluştur
        const li = document.createElement("li");
        li.className = "todo-item"; // CSS sınıfını ata

        // Checkbox (tamamlandı kutusu) oluştur
        const checkbox = document.createElement("input");
        checkbox.type = "checkbox";
        checkbox.setAttribute("aria-label", "Görevi tamamla");

        // Görev metni için 'span' oluştur
        const span = document.createElement("span");
        span.textContent = text;

        // Silme butonu oluştur
        const deleteBtn = document.createElement("button");
        deleteBtn.className = "delete-btn";
        deleteBtn.setAttribute("aria-label", "Görevi sil");
        deleteBtn.innerHTML = '<i class="fas fa-trash"></i>'; // Font Awesome ikonu

        // Oluşturulan elemanları 'li' içine ekle
        li.appendChild(checkbox);
        li.appendChild(span);
        li.appendChild(deleteBtn);

        // Hazırlanan 'li' öğesini görev listesine ('ul') ekle
        todoList.appendChild(li);
    }
});
