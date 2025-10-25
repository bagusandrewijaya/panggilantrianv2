<div class="top-header">
   <style>
.top-header {
    display: flex;
    justify-content: flex-end; /* Semua isi ke kanan */
    align-items: center;
    padding: 10px 20px;
    background-color: #f8f9fa;
    border-bottom: 1px solid #ddd;
}

.user-info {
    display: flex;
    align-items: center;
    gap: 20px; /* Jarak antar elemen */
}

/* Switch Container */
.switch-container {
    display: flex;
    align-items: center;
    gap: 8px;
}

/* Gaya dasar switch */
.switch {
    position: relative;
    display: inline-block;
    width: 50px;
    height: 26px;
}

.switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

/* Slider background */
.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    transition: .4s;
    border-radius: 26px;
}

/* Lingkaran dalam switch */
.slider:before {
    position: absolute;
    content: "";
    height: 20px;
    width: 20px;
    left: 3px;
    bottom: 3px;
    background-color: white;
    transition: .4s;
    border-radius: 50%;
}

/* Saat ON */
.switch input:checked + .slider {
    background-color: #4caf50;
}

/* Saat ON - posisi lingkaran pindah */
.switch input:checked + .slider:before {
    transform: translateX(24px);
}

/* Teks ON/OFF */
#statusText {
    font-weight: 600;
    color: #333;
}

/* Avatar */
.user-avatar img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
}

.logout-btn:hover {
    background-color: #f0f0f0;
}
</style>


    <div class="user-info">
        <!-- Switch ON/OFF di samping kanan -->
        <div class="switch-container">
            <label class="switch">
                <input type="checkbox" id="toggleStatus" >
                <span class="slider"></span>
            </label>
          
        </div>

        <!-- Detail user -->
        <div class="user-details">
            <p id="greeting">Selamat Pagi</p>
           
        </div>

        <!-- Avatar jadi tombol dropdown -->
        <div class="user-avatar" id="avatarDropdown" style="cursor: pointer; position: relative;">
    <img src="https://cdn.pixabay.com/photo/2018/04/18/18/56/user-3331256_1280.png" alt="User Avatar" 
         style="width: 45px; height: 45px; border-radius: 50%; object-fit: cover;">

    <div id="dropdownMenu" style="display: none; position: absolute; top: 50px; right: 0; background: white; border: 1px solid #ddd; border-radius: 5px; padding: 5px 0; width: 120px; z-index: 100;">
        <button wire:click="logout()" class="logout-btn" style="background: none; border: none; width: 100%; text-align: left; padding: 8px 12px; cursor: pointer;">
            <i class="bi bi-box-arrow-right"></i> Log Out
        </button>
    </div>
</div>

    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    // Update greeting based on time
    function updateGreeting() {
        const now = new Date();
        const hour = now.getHours();
        let greeting = "Selamat Malam";

        if (hour >= 5 && hour < 11) greeting = "Selamat Pagi";
        else if (hour >= 11 && hour < 15) greeting = "Selamat Siang";
        else if (hour >= 15 && hour < 18) greeting = "Selamat Sore";

        const greetingElement = document.getElementById("greeting");
        if (greetingElement) {
            greetingElement.innerText = greeting;
        }
    }
    updateGreeting();

    // Dropdown profil
    const avatarDropdown = document.getElementById("avatarDropdown");
    const dropdownMenu = document.getElementById("dropdownMenu");

    if (avatarDropdown && dropdownMenu) {
        avatarDropdown.addEventListener("click", (e) => {
            e.stopPropagation(); // Prevent click from bubbling up
            dropdownMenu.style.display = dropdownMenu.style.display === "block" ? "none" : "block";
        });

        // Close dropdown when clicking outside
        document.addEventListener("click", (e) => {
            if (avatarDropdown && dropdownMenu && !avatarDropdown.contains(e.target)) {
                dropdownMenu.style.display = "none";
            }
        });
    }
});

// Handle Livewire updates
document.addEventListener('livewire:navigated', () => {
    const statusText = document.getElementById("statusText");
    const toggle = document.getElementById("toggleStatus");
    if (toggle && statusText) {
        statusText.innerText = toggle.checked ? "ON" : "OFF";
    }
});
</script>
@endpush