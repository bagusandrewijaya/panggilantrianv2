<div hidden class="call-container">
    <!-- AI Assistant Header -->
    <div  class="ai-header text-center pb-3 py-4">
        <div class="avatar">
            <i class="fas fa-robot"></i>
        </div>
        <h2 class="text-white mb-1">EasySpeech AI</h2>
        <div class="text-white mb-2">Voice Assistant</div>

        <div class="badge bg-light text-dark call-status init-status-header">
            <div class="spinner-border spinner-border-sm init-status-loader" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <span class="init-status-text">Connecting...</span>
        </div>
    </div>

    <div class="container py-4">
        <!-- Message Input -->
        <div class="mb-3">
            <textarea id="text-input" class="form-control message-area" disabled placeholder="Enter text for the AI to speak..."></textarea>
        </div>

        <!-- Call Controls -->
        <div class="call-buttons">
            <div class="call-btn mute" id="settings-btn" data-bs-toggle="collapse" data-bs-target="#settingsPanel">
                <i class="fas fa-sliders-h"></i>
            </div>
            <div class="call-btn speak" onclick="sendRequest()">
                <i class="fas fa-play"></i>
            </div>
            <div class="call-btn end-call">
                <i class="fas fa-phone-slash"></i>
            </div>
        </div>

        <!-- Hidden Settings Panel -->
        <div class="collapse" id="settingsPanel">
            <div class="control-panel">
                <h5 class="mb-3"><i class="fas fa-cog me-2"></i>Voice Settings</h5>

                <div class="mb-3">
                    <label for="lang-select" class="form-label">Language</label>
                    <select id="lang-select" class="form-select disabled" disabled>
                        <option>(Select language)</option>
                        <option value="all">All languages</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="voice-select" class="form-label">Voice</label>
                    <select id="voice-select" class="form-select disabled" disabled>
                        <option>(Select voice)</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="volume-input" class="form-label">Volume <span class="float-end volume-value">1</span></label>
                    <input type="range" class="form-range" min="0" max="1" step="0.1" id="volume-input" value="1" disabled>
                </div>

                <div class="mb-3">
                    <label for="rate-input" class="form-label">Speed <span class="float-end rate-value">1</span></label>
                    <input type="range" class="form-range" min="1" max="20" step="1" id="rate-input" value="10" disabled>
                </div>

                <div class="mb-3">
                    <label for="pitch-input" class="form-label">Pitch <span class="float-end pitch-value">1</span></label>
                    <input type="range" class="form-range" min="0" max="2" step="0.1" id="pitch-input" value="1" disabled>
                </div>
            </div>
        </div>

        <!-- Status and Debug Info (Collapsible) -->
        <div class="accordion mt-4" id="debugAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                        System Status
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#debugAccordion">
                    <div class="accordion-body">
                        <div class="mb-3">
                            <span class="fw-bold">Detected features using <code>EasySpeech.detect()</code></span>
                            <pre class="bg-light p-3 mt-2"><code class="code features"></code></pre>
                        </div>
                        <div class="init-status-body">
                            <span class="fw-bold">Init result from <code>EasySpeech.init()</code></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                        Debug Log
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#debugAccordion">
                    <div class="accordion-body log-body"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Original buttons hidden but accessible for original functionality -->
    <div class="hidden-controls">
        <button class="btn btn-primary speak-btn">Speak now</button>
    </div>


</div>
