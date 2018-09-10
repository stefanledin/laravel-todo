importScripts('https://storage.googleapis.com/workbox-cdn/releases/3.4.1/workbox-sw.js');

if (workbox) {

    /**
     * Spara CSS och JS-filer i cachen
     */
    workbox.routing.registerRoute(
        /\.(?:js|css)$/,
        workbox.strategies.staleWhileRevalidate({
            cacheName: 'laravel-todo',
        }),
    );

    /**
     * Background sync
     */
    const bgSyncPlugin = new workbox.backgroundSync.Plugin('laravelTodoQueue', {
        maxRetentionTime: 24 * 60
    });
    workbox.routing.registerRoute(
        /\/todos/,
        workbox.strategies.networkOnly({
            plugins: [bgSyncPlugin]
        }),
        'POST'
    )
    const queue = new workbox.backgroundSync.Queue('laravelTodoQueue');

    self.addEventListener('fetch', (event) => {
        // Clone the request to ensure it's save to read when
        // adding to the Queue.
        const promiseChain = fetch(event.request.clone())
            .catch((err) => {
                return queue.addRequest(event.request);
            });

        event.waitUntil(promiseChain);
    });
} 