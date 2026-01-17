self.addEventListener('install', e => {
  e.waitUntil(
    caches.open('crematorio-v1').then(cache =>
      cache.addAll([
        '/frontend/index.html'
      ])
    )
  );
});