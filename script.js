document.addEventListener('DOMContentLoaded', function () {
    const audioPlayer = new Audio();
    let isLooping = false;

    // Elements
    const playPauseBtn = document.getElementById('play-pause-btn');
    const prevBtn = document.getElementById('prev-btn');
    const nextBtn = document.getElementById('next-btn');
    const loopBtn = document.getElementById('loop-btn');
    const progressBar = document.getElementById('progress-bar');
    const volumeSlider = document.getElementById('volume-slider');
    const currentTimeElem = document.getElementById('current-time');
    const durationElem = document.getElementById('duration');
    const songCover = document.getElementById('song-cover');
    const songTitle = document.getElementById('song-title');

    // Play/Pause Button
    playPauseBtn.addEventListener('click', () => {
        if (audioPlayer.paused) {
            audioPlayer.play();
            playPauseBtn.src = "images/pausebtn.png"; // Change to your pause icon
        } else {
            audioPlayer.pause();
            playPauseBtn.src = "images/playbtn.png"; // Change to your play icon
        }
    });

    // Update Time and Progress Bar
    audioPlayer.addEventListener('timeupdate', () => {
        const progress = (audioPlayer.currentTime / audioPlayer.duration) * 100;
        progressBar.value = progress;
        currentTimeElem.textContent = formatTime(audioPlayer.currentTime);
        durationElem.textContent = formatTime(audioPlayer.duration);
    });

    // Progress Bar Seek
    progressBar.addEventListener('input', () => {
        const newTime = (progressBar.value / 100) * audioPlayer.duration;
        audioPlayer.currentTime = newTime;
    });

    // Volume Slider
    volumeSlider.addEventListener('input', () => {
        audioPlayer.volume = volumeSlider.value;
    });

    // Loop Button
    loopBtn.addEventListener('click', () => {
        isLooping = !isLooping;
        audioPlayer.loop = isLooping;
        loopBtn.classList.toggle('active', isLooping);
    });

    // Load and Play a Selected Track
    function loadTrack(file, title, cover) {
        audioPlayer.src = file;
        songCover.src = cover;
        songTitle.textContent = title;
        
        audioPlayer.addEventListener('canplaythrough', () => {
            audioPlayer.play();
            playPauseBtn.src = "images/pausebtn.png"; // Change to your pause icon
        });
        
        audioPlayer.load();
    }
    
   // Attach event listeners to each song item
const songItems = document.querySelectorAll('.music-item');
songItems.forEach(item => {
    const playButton = item.querySelector('.play-song-btn');
    playButton.addEventListener('click', function() {
        const file = item.getAttribute('data-file');
        const title = item.getAttribute('data-title');
        const cover = item.getAttribute('data-cover');
        loadTrack(file, title, cover);
    });
});


    // Format Time in mm:ss
    function formatTime(seconds) {
        const mins = Math.floor(seconds / 60);
        const secs = Math.floor(seconds % 60).toString().padStart(2, '0');
        return `${mins}:${secs}`;
    }
});

document.addEventListener('DOMContentLoaded', function () {
    const darkModeButton = document.getElementById('dark-mode-button');
    const toggleText = darkModeButton.querySelector('.toggle-text');

    // Check for saved user preference
    const darkModePreference = localStorage.getItem('dark-mode') === 'true';
    if (darkModePreference) {
        enableDarkMode();
    }

    darkModeButton.addEventListener('click', function () {
        if (document.body.classList.contains('dark-mode')) {
            disableDarkMode();
        } else {
            enableDarkMode();
        }
    });

    function enableDarkMode() {
        document.body.classList.add('dark-mode');
        document.querySelector('.main-header').classList.add('dark-mode');
        document.querySelector('.music-player').classList.add('dark-mode');
        document.querySelectorAll('.music-item').forEach(item => {
            item.classList.add('dark-mode');
        });
        toggleText.textContent = 'Dark Mode';
        localStorage.setItem('dark-mode', 'true');
    }

    function disableDarkMode() {
        document.body.classList.remove('dark-mode');
        document.querySelector('.main-header').classList.remove('dark-mode');
        document.querySelector('.music-player').classList.remove('dark-mode');
        document.querySelectorAll('.music-item').forEach(item => {
            item.classList.remove('dark-mode');
        });
        toggleText.textContent = 'Light Mode';
        localStorage.setItem('dark-mode', 'false');
    }
});

// JavaScript to handle mobile navigation toggle
document.querySelector('.nav-toggle').addEventListener('click', function() {
    const nav = document.querySelector('header nav');
    nav.classList.toggle('nav-active');
});
