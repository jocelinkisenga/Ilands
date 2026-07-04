import './bootstrap';

// import Alpine from 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();

    // Vérifie la préférence enregistrée ou celle du système
    if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }


// Initialize components on DOM ready
document.addEventListener('DOMContentLoaded', () => {
    // Map imports
    if (document.querySelector('#mapOne')) {
        import('./components/map').then(module => module.initMap());
    }

    // Chart imports
    if (document.querySelector('#chartOne')) {
        import('./components/chart/chart-1').then(module => module.initChartOne());
    }
    if (document.querySelector('#chartTwo')) {
        import('./components/chart/chart-2').then(module => module.initChartTwo());
    }
    if (document.querySelector('#chartThree')) {
        import('./components/chart/chart-3').then(module => module.initChartThree());
    }
    if (document.querySelector('#chartSix')) {
        import('./components/chart/chart-6').then(module => module.initChartSix());
    }
    if (document.querySelector('#chartEight')) {
        import('./components/chart/chart-8').then(module => module.initChartEight());
    }
    if (document.querySelector('#chartThirteen')) {
        import('./components/chart/chart-13').then(module => module.initChartThirteen());
    }

    // Calendar init
    if (document.querySelector('#calendar')) {
        import('./components/calendar-init').then(module => module.calendarInit());
    }
});

//service worker
if ('serviceWorker' in navigator) {
  window.addEventListener('load', () => {
    navigator.serviceWorker.register('/service-worker.js');
  });
}

let deferredPrompt;

// 1. Capture l'événement d'installation
window.addEventListener('beforeinstallprompt', (e) => {
  e.preventDefault(); // empêche popup automatique
  deferredPrompt = e;

  // optionnel: afficher ton bouton "Installer"
  document.getElementById('installBtn')?.classList.remove('hidden');
});

// 2. Clic sur bouton installation
const installBtn = document.getElementById('installBtn');

installBtn?.addEventListener('click', async () => {
  if (!deferredPrompt) return;

  deferredPrompt.prompt(); // ouvre popup installation

  const { outcome } = await deferredPrompt.userChoice;

  console.log('User choice:', outcome);

  deferredPrompt = null;
  installBtn.style.display = 'none';
});