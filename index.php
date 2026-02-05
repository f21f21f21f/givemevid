<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Downloader - Download TikTok, Instagram, YouTube Videos</title>
    <meta name="description" content="Free video downloader for TikTok, Instagram, YouTube, Pinterest, RedNote, and Kuaishou. Download videos, stories, photos, and MP3 without watermark.">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-color: #ff0050;
            --secondary-color: #00d4ff;
            --dark-bg: #1a1a2e;
            --card-bg: #16213e;
            --text-light: #ffffff;
            --text-gray: #a0a0a0;
            --success: #00ff88;
            --gradient: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--dark-bg);
            color: var(--text-light);
            line-height: 1.6;
        }

        /* Header */
        header {
            background: var(--card-bg);
            padding: 1rem 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.3);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        nav {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 2rem;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            list-style: none;
        }

        .nav-links a {
            color: var(--text-light);
            text-decoration: none;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: var(--primary-color);
        }

        .lang-selector {
            padding: 0.5rem 1rem;
            background: var(--dark-bg);
            border: 1px solid var(--primary-color);
            border-radius: 5px;
            color: var(--text-light);
            cursor: pointer;
        }

        /* Hero Section */
        .hero {
            text-align: center;
            padding: 4rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero p {
            font-size: 1.2rem;
            color: var(--text-gray);
            margin-bottom: 2rem;
        }

        /* Platform Tabs */
        .platform-tabs {
            display: flex;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
            margin: 2rem 0;
            padding: 0 2rem;
        }

        .tab-btn {
            padding: 1rem 2rem;
            background: var(--card-bg);
            border: 2px solid transparent;
            border-radius: 10px;
            color: var(--text-light);
            cursor: pointer;
            transition: all 0.3s;
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .tab-btn:hover {
            border-color: var(--primary-color);
            transform: translateY(-2px);
        }

        .tab-btn.active {
            background: var(--gradient);
            border-color: var(--primary-color);
        }

        /* Main Content */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .content-section {
            display: none;
        }

        .content-section.active {
            display: block;
        }

        /* Download Card */
        .download-card {
            background: var(--card-bg);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.3);
            margin-bottom: 2rem;
        }

        .download-card h2 {
            margin-bottom: 1.5rem;
            color: var(--primary-color);
        }

        .input-group {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .input-group input {
            flex: 1;
            padding: 1rem;
            background: var(--dark-bg);
            border: 2px solid var(--card-bg);
            border-radius: 10px;
            color: var(--text-light);
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        .input-group input:focus {
            outline: none;
            border-color: var(--primary-color);
        }

        .download-btn {
            padding: 1rem 2rem;
            background: var(--gradient);
            border: none;
            border-radius: 10px;
            color: var(--text-light);
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .download-btn:hover {
            transform: scale(1.05);
        }

        .download-btn:active {
            transform: scale(0.95);
        }

        /* Feature Buttons */
        .feature-buttons {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .feature-btn {
            padding: 1rem;
            background: var(--dark-bg);
            border: 2px solid var(--card-bg);
            border-radius: 10px;
            color: var(--text-light);
            cursor: pointer;
            transition: all 0.3s;
            text-align: center;
        }

        .feature-btn:hover {
            border-color: var(--secondary-color);
            background: var(--card-bg);
        }

        .feature-btn.active {
            border-color: var(--success);
            background: var(--card-bg);
        }

        /* Results */
        .results {
            margin-top: 2rem;
            display: none;
        }

        .results.show {
            display: block;
        }

        .result-item {
            background: var(--dark-bg);
            padding: 1.5rem;
            border-radius: 10px;
            margin-bottom: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .result-info {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .result-thumbnail {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 8px;
        }

        .result-download-btn {
            padding: 0.75rem 1.5rem;
            background: var(--success);
            border: none;
            border-radius: 8px;
            color: var(--dark-bg);
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .result-download-btn:hover {
            transform: scale(1.05);
        }

        /* Features Section */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin: 3rem 0;
        }

        .feature-card {
            background: var(--card-bg);
            padding: 2rem;
            border-radius: 15px;
            text-align: center;
            transition: transform 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        .feature-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .feature-card h3 {
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        /* Tutorial Section */
        .tutorial {
            background: var(--card-bg);
            padding: 3rem 2rem;
            border-radius: 15px;
            margin: 3rem 0;
        }

        .tutorial h2 {
            text-align: center;
            margin-bottom: 2rem;
            font-size: 2rem;
        }

        .tutorial-steps {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .step {
            text-align: center;
        }

        .step-number {
            width: 50px;
            height: 50px;
            background: var(--gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: bold;
            margin: 0 auto 1rem;
        }

        /* FAQ Section */
        .faq {
            margin: 3rem 0;
        }

        .faq h2 {
            text-align: center;
            margin-bottom: 2rem;
            font-size: 2rem;
        }

        .faq-item {
            background: var(--card-bg);
            padding: 1.5rem;
            border-radius: 10px;
            margin-bottom: 1rem;
            cursor: pointer;
            transition: all 0.3s;
        }

        .faq-item:hover {
            background: var(--dark-bg);
        }

        .faq-question {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: bold;
            color: var(--primary-color);
        }

        .faq-answer {
            margin-top: 1rem;
            color: var(--text-gray);
            display: none;
        }

        .faq-item.active .faq-answer {
            display: block;
        }

        /* Footer */
        footer {
            background: var(--card-bg);
            padding: 3rem 2rem;
            margin-top: 4rem;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .footer-section h3 {
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links a {
            color: var(--text-gray);
            text-decoration: none;
            display: block;
            margin-bottom: 0.5rem;
            transition: color 0.3s;
        }

        .footer-links a:hover {
            color: var(--text-light);
        }

        .footer-bottom {
            text-align: center;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid var(--dark-bg);
            color: var(--text-gray);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2rem;
            }

            .platform-tabs {
                gap: 0.5rem;
            }

            .tab-btn {
                padding: 0.75rem 1rem;
                font-size: 0.9rem;
            }

            .nav-links {
                display: none;
            }

            .result-item {
                flex-direction: column;
                text-align: center;
            }

            .result-info {
                flex-direction: column;
            }
        }

        /* Loading Spinner */
        .loading {
            display: none;
            text-align: center;
            margin: 2rem 0;
        }

        .loading.show {
            display: block;
        }

        .spinner {
            border: 4px solid var(--card-bg);
            border-top: 4px solid var(--primary-color);
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
            margin: 0 auto;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <nav>
            <div class="logo">🎬 VideoDownloader</div>
            <ul class="nav-links">
                <li><a href="#home">Home</a></li>
                <li><a href="#tutorial">Tutorial</a></li>
                <li><a href="#faq">FAQ</a></li>
                <li><a href="#privacy">Privacy</a></li>
            </ul>
            <select class="lang-selector" id="langSelector">
                <option value="en">English</option>
                <option value="es">Español</option>
                <option value="fr">Français</option>
                <option value="de">Deutsch</option>
                <option value="pt">Português</option>
                <option value="ru">Русский</option>
                <option value="ar">العربية</option>
                <option value="zh">中文</option>
                <option value="ja">日本語</option>
                <option value="ko">한국어</option>
                <option value="vi">Tiếng Việt</option>
                <option value="th">ไทย</option>
                <option value="id">Bahasa Indonesia</option>
                <option value="tr">Türkçe</option>
                <option value="pl">Polski</option>
                <option value="uk">Українська</option>
            </select>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <h1>Free Video Downloader</h1>
        <p>Download videos, stories, photos, and MP3 from TikTok, Instagram, YouTube, Pinterest, RedNote, and Kuaishou - No watermark!</p>
    </section>

    <!-- Platform Tabs -->
    <div class="platform-tabs">
        <button class="tab-btn active" data-platform="tiktok">
            📱 TikTok
        </button>
        <button class="tab-btn" data-platform="instagram">
            📷 Instagram
        </button>
        <button class="tab-btn" data-platform="youtube">
            ▶️ YouTube
        </button>
        <button class="tab-btn" data-platform="pinterest">
            📌 Pinterest
        </button>
        <button class="tab-btn" data-platform="rednote">
            📕 RedNote
        </button>
        <button class="tab-btn" data-platform="kuaishou">
            ⚡ Kuaishou
        </button>
    </div>

    <!-- Main Content -->
    <div class="container">
        <!-- TikTok Section -->
        <div class="content-section active" id="tiktok">
            <div class="download-card">
                <h2>Download TikTok Videos</h2>
                <div class="input-group">
                    <input type="text" id="tiktokUrl" placeholder="Paste TikTok video URL here...">
                    <button class="download-btn" onclick="downloadContent('tiktok')">Download</button>
                </div>
                
                <div class="feature-buttons">
                    <button class="feature-btn active" data-type="video">🎥 Video (No Watermark)</button>
                    <button class="feature-btn" data-type="audio">🎵 MP3 Audio</button>
                    <button class="feature-btn" data-type="slideshow">📸 Slideshow</button>
                    <button class="feature-btn" data-type="cover">🖼️ Cover Image</button>
                </div>

                <div class="loading" id="tiktokLoading">
                    <div class="spinner"></div>
                    <p>Processing your request...</p>
                </div>

                <div class="results" id="tiktokResults">
                    <!-- Results will be displayed here -->
                </div>
            </div>
        </div>

        <!-- Instagram Section -->
        <div class="content-section" id="instagram">
            <div class="download-card">
                <h2>Download Instagram Content</h2>
                <div class="input-group">
                    <input type="text" id="instagramUrl" placeholder="Paste Instagram video, photo, or story URL...">
                    <button class="download-btn" onclick="downloadContent('instagram')">Download</button>
                </div>
                
                <div class="feature-buttons">
                    <button class="feature-btn active" data-type="video">🎥 Video</button>
                    <button class="feature-btn" data-type="photo">📷 Photo</button>
                    <button class="feature-btn" data-type="story">📖 Story</button>
                    <button class="feature-btn" data-type="reels">🎬 Reels</button>
                    <button class="feature-btn" data-type="audio">🎵 Audio</button>
                </div>

                <div class="loading" id="instagramLoading">
                    <div class="spinner"></div>
                    <p>Processing your request...</p>
                </div>

                <div class="results" id="instagramResults">
                    <!-- Results will be displayed here -->
                </div>
            </div>
        </div>

        <!-- YouTube Section -->
        <div class="content-section" id="youtube">
            <div class="download-card">
                <h2>Download YouTube Videos</h2>
                <div class="input-group">
                    <input type="text" id="youtubeUrl" placeholder="Paste YouTube video URL...">
                    <button class="download-btn" onclick="downloadContent('youtube')">Download</button>
                </div>
                
                <div class="feature-buttons">
                    <button class="feature-btn active" data-type="video-hd">🎥 Video HD (1080p)</button>
                    <button class="feature-btn" data-type="video-4k">📹 Video 4K</button>
                    <button class="feature-btn" data-type="audio">🎵 MP3 Audio</button>
                    <button class="feature-btn" data-type="thumbnail">🖼️ Thumbnail</button>
                </div>

                <div class="loading" id="youtubeLoading">
                    <div class="spinner"></div>
                    <p>Processing your request...</p>
                </div>

                <div class="results" id="youtubeResults">
                    <!-- Results will be displayed here -->
                </div>
            </div>
        </div>

        <!-- Pinterest Section -->
        <div class="content-section" id="pinterest">
            <div class="download-card">
                <h2>Download Pinterest Content</h2>
                <div class="input-group">
                    <input type="text" id="pinterestUrl" placeholder="Paste Pinterest video or image URL...">
                    <button class="download-btn" onclick="downloadContent('pinterest')">Download</button>
                </div>
                
                <div class="feature-buttons">
                    <button class="feature-btn active" data-type="video">🎥 Video</button>
                    <button class="feature-btn" data-type="image">🖼️ Image</button>
                    <button class="feature-btn" data-type="gif">🎞️ GIF</button>
                </div>

                <div class="loading" id="pinterestLoading">
                    <div class="spinner"></div>
                    <p>Processing your request...</p>
                </div>

                <div class="results" id="pinterestResults">
                    <!-- Results will be displayed here -->
                </div>
            </div>
        </div>

        <!-- RedNote Section -->
        <div class="content-section" id="rednote">
            <div class="download-card">
                <h2>Download RedNote (Xiaohongshu) Videos</h2>
                <div class="input-group">
                    <input type="text" id="rednoteUrl" placeholder="Paste RedNote video URL...">
                    <button class="download-btn" onclick="downloadContent('rednote')">Download</button>
                </div>
                
                <div class="feature-buttons">
                    <button class="feature-btn active" data-type="video">🎥 Video</button>
                    <button class="feature-btn" data-type="photo">📷 Photo</button>
                    <button class="feature-btn" data-type="slideshow">📸 Slideshow</button>
                </div>

                <div class="loading" id="rednoteLoading">
                    <div class="spinner"></div>
                    <p>Processing your request...</p>
                </div>

                <div class="results" id="rednoteResults">
                    <!-- Results will be displayed here -->
                </div>
            </div>
        </div>

        <!-- Kuaishou Section -->
        <div class="content-section" id="kuaishou">
            <div class="download-card">
                <h2>Download Kuaishou Videos</h2>
                <div class="input-group">
                    <input type="text" id="kuaishouUrl" placeholder="Paste Kuaishou video URL...">
                    <button class="download-btn" onclick="downloadContent('kuaishou')">Download</button>
                </div>
                
                <div class="feature-buttons">
                    <button class="feature-btn active" data-type="video">🎥 Video (No Watermark)</button>
                    <button class="feature-btn" data-type="audio">🎵 Audio MP3</button>
                    <button class="feature-btn" data-type="cover">🖼️ Cover</button>
                </div>

                <div class="loading" id="kuaishouLoading">
                    <div class="spinner"></div>
                    <p>Processing your request...</p>
                </div>

                <div class="results" id="kuaishouResults">
                    <!-- Results will be displayed here -->
                </div>
            </div>
        </div>

        <!-- Features -->
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">🚀</div>
                <h3>Fast & Free</h3>
                <p>Download videos at high speed completely free. No registration required!</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">💧</div>
                <h3>No Watermark</h3>
                <p>Remove watermarks from TikTok, Instagram, and other platforms automatically.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">📱</div>
                <h3>All Devices</h3>
                <p>Works on mobile, tablet, and desktop. Compatible with all browsers.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🎵</div>
                <h3>MP3 Conversion</h3>
                <p>Extract audio from videos and download as high-quality MP3 files.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🔒</div>
                <h3>Private & Secure</h3>
                <p>We don't store your data. All processing happens securely.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🌍</div>
                <h3>Multi-Language</h3>
                <p>Available in 16+ languages for users worldwide.</p>
            </div>
        </div>

        <!-- Tutorial -->
        <div class="tutorial" id="tutorial">
            <h2>How to Download Videos</h2>
            <div class="tutorial-steps">
                <div class="step">
                    <div class="step-number">1</div>
                    <h3>Copy Link</h3>
                    <p>Find the video you want to download and copy its URL from the address bar or share button.</p>
                </div>
                <div class="step">
                    <div class="step-number">2</div>
                    <h3>Paste URL</h3>
                    <p>Paste the copied URL into the input field above and click the Download button.</p>
                </div>
                <div class="step">
                    <div class="step-number">3</div>
                    <h3>Choose Format</h3>
                    <p>Select your preferred format (video, audio, photo) and quality.</p>
                </div>
                <div class="step">
                    <div class="step-number">4</div>
                    <h3>Download</h3>
                    <p>Click the download button and save the file to your device. Done!</p>
                </div>
            </div>
        </div>

        <!-- FAQ -->
        <div class="faq" id="faq">
            <h2>Frequently Asked Questions</h2>
            <div class="faq-item">
                <div class="faq-question">
                    Is this service free?
                    <span>▼</span>
                </div>
                <div class="faq-answer">
                    Yes! Our video downloader is 100% free. You can download unlimited videos without any payment or subscription.
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question">
                    Do I need to register?
                    <span>▼</span>
                </div>
                <div class="faq-answer">
                    No registration required! Simply paste the URL and download. We value your privacy.
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question">
                    Can I download videos without watermark?
                    <span>▼</span>
                </div>
                <div class="faq-answer">
                    Yes! Our downloader removes watermarks from TikTok, Instagram, and other platforms automatically.
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question">
                    What video quality can I download?
                    <span>▼</span>
                </div>
                <div class="faq-answer">
                    You can download videos in their original quality, including HD (1080p) and 4K where available.
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question">
                    Is it legal to download videos?
                    <span>▼</span>
                </div>
                <div class="faq-answer">
                    Our service is for personal use only. Please respect copyright laws and only download content you have permission to use.
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question">
                    Does it work on mobile devices?
                    <span>▼</span>
                </div>
                <div class="faq-answer">
                    Yes! Our downloader is fully responsive and works perfectly on smartphones, tablets, and computers.
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>Video Downloader</h3>
                <p>The best free online video downloader for TikTok, Instagram, YouTube, and more. Download videos, photos, and audio in high quality.</p>
            </div>
            <div class="footer-section">
                <h3>Platforms</h3>
                <ul class="footer-links">
                    <li><a href="#tiktok">TikTok Downloader</a></li>
                    <li><a href="#instagram">Instagram Downloader</a></li>
                    <li><a href="#youtube">YouTube Downloader</a></li>
                    <li><a href="#pinterest">Pinterest Downloader</a></li>
                    <li><a href="#rednote">RedNote Downloader</a></li>
                    <li><a href="#kuaishou">Kuaishou Downloader</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Legal</h3>
                <ul class="footer-links">
                    <li><a href="#privacy">Privacy Policy</a></li>
                    <li><a href="#terms">Terms of Service</a></li>
                    <li><a href="#dmca">DMCA</a></li>
                    <li><a href="#contact">Contact Us</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Support</h3>
                <ul class="footer-links">
                    <li>
<?php
// Frontend only. Backend будет подключён позже.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    ...
    <style>
        /* весь CSS */
    </style>
</head>

<body>

    <!-- ВЕСЬ HTML САЙТА -->
    <!-- header -->
    <!-- hero -->
    <!-- platform-tabs -->
    <!-- container -->
    <!-- footer -->

    <!-- ⬇️ ВОТ ЗДЕСЬ ВСТАВЛЯЕМ СКРИПТ -->
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // --- переключение платформ ---
        const tabButtons = document.querySelectorAll('.tab-btn');
        const sections = document.querySelectorAll('.content-section');

        tabButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                tabButtons.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                const platform = btn.getAttribute('data-platform');

                sections.forEach(section => {
                    section.classList.remove('active');
                });

                const activeSection = document.getElementById(platform);
                if (activeSection) {
                    activeSection.classList.add('active');
                }
            });
        });

        // --- переключение feature-кнопок ---
        const featureGroups = document.querySelectorAll('.feature-buttons');
        featureGroups.forEach(group => {
            const buttons = group.querySelectorAll('.feature-btn');
            buttons.forEach(btn => {
                btn.addEventListener('click', () => {
                    buttons.forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');
                });
            });
        });
    });
    </script>
<script>
function downloadContent(platform) {
    const urlInput = document.getElementById(platform + 'Url');
    const url = urlInput.value.trim();

    if (!url) {
        alert('Вставь ссылку');
        return;
    }

    const loading = document.getElementById(platform + 'Loading');
    const results = document.getElementById(platform + 'Results');

    loading.classList.add('show');
    results.classList.remove('show');
    results.innerHTML = '';

    fetch('/api.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            platform: platform,
            url: url
        })
    })
    .then(r => r.json())
    .then(data => {
        loading.classList.remove('show');
        results.classList.add('show');

        results.innerHTML = `
            <div class="result-item">
                <div>${data.message}</div>
            </div>
        `;
    })
    .catch(err => {
        loading.classList.remove('show');
        alert('Ошибка запроса');
        console.error(err);
    });
}
</script>

</body>
</html>
