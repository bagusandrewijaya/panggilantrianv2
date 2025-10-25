
<div>
        <style>
        .queue-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin: 20px auto;
            max-width: 600px;
        }

        .queue-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }

        .queue-header span {
            font-size: 1.1rem;
            font-weight: 600;
        }

        .sound-waves {
            display: flex;
            gap: 4px;
            align-items: flex-end;
            height: 30px;
        }

        .sound-wave {
            width: 4px;
            background: white;
            border-radius: 2px;
            animation: wave 1s ease-in-out infinite;
        }

        .sound-wave:nth-child(1) { animation-delay: 0s; height: 10px; }
        .sound-wave:nth-child(2) { animation-delay: 0.2s; height: 15px; }
        .sound-wave:nth-child(3) { animation-delay: 0.4s; height: 20px; }
        .sound-wave:nth-child(4) { animation-delay: 0.6s; height: 15px; }

        @keyframes wave {
            0%, 100% { height: 10px; }
            50% { height: 25px; }
        }

        .queue-body {
            padding: 50px 30px;
            text-align: center;
        }

        .queue-number-label {
            font-size: 0.9rem;
            color: #6c757d;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .queue-number {
            font-size: 4rem;
            font-weight: 700;
            color: #667eea;
            margin: 0;
        }

        .manual-input {
            max-width: 600px;
            margin: 0 auto;
            padding: 0 15px;
        }
    </style>
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
    </div>

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
</body>
</html>