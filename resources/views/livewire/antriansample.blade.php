<div>
    <!-- Komponen Livewire Audio -->
    <livewire:initaudio>

    <!-- Kontainer Antrian -->
    <div class="queue-container">
        <div class="queue-header">
            <span><i class="fas fa-user-clock me-2"></i> ANTRIAN SAAT INI</span>
            <div class="sound-waves">
                <div class="sound-wave"></div>
                <div class="sound-wave"></div>
                <div class="sound-wave"></div>
                <div class="sound-wave"></div>
            </div>
        </div>

        <div class="queue-body">
            <div class="queue-now">
                <div class="queue-number-label">NOMOR ANTRIAN</div>
                <h2 class="queue-number" id="noantrol">-</h2>
            </div>
        </div>
    </div>

    <!-- Input dan Tombol Manual -->
    <div class="manual-input mt-3">
        <label for="manualQueue">Masukkan Antrian (contoh: A001 di Konter 1)</label>
        <input type="text" id="manualQueue" class="form-control" placeholder="Contoh: A001 di Konter 1">
        <button class="btn btn-primary mt-2" onclick="panggilAntrianManual()">Panggil Antrian</button>
    </div>
@push('scripts')


    <!-- Script Tambahan -->
  <script type="text/javascript" src="myOnLibs.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script>
        // Inisialisasi EasySpeech
        EasySpeech.init({ maxTimeout: 5000, interval: 250 })
            .then(() => console.log('EasySpeech siap'))
            .catch(e => console.error('Gagal inisialisasi EasySpeech', e));

        // Fungsi untuk memanggil antrian manual
        async function panggilAntrianManual() {
            const input = document.getElementById('manualQueue').value.trim();

            if (!input) {
                alert('Silakan masukkan nomor antrian');
                return;
            }

            // Tampilkan nomor di UI
            document.getElementById('noantrol').textContent = input.toUpperCase();

            // Panggil suara
            await EasySpeech.speak({
                text: input,
                voice: window.speechSynthesis.getVoices().find(voice => voice.lang === 'id-ID'),
                pitch: 1,
                rate: 0.9,
                volume: 1,
                boundary: e => console.debug('boundary reached')
            });
        }
    </script>
</div>
@endpush
