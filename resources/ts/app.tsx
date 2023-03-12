import React from 'react';
import { createRoot } from 'react-dom/client';
import { createInertiaApp } from '@inertiajs/inertia-react';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';

createInertiaApp({
    title: (title) => title,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.tsx`,
            import.meta.glob('./Pages/**/*.tsx')
        ),
    setup({ el, App, props }) {
        const {
            initialPage,
            initialComponent,
            resolveComponent,
            titleCallback,
            onHeadUpdate
        } = props;
        const root = createRoot(el);
        return root.render(
            <App
                initialPage={initialPage}
                initialComponent={initialComponent}
                resolveComponent={resolveComponent}
                titleCallback={titleCallback}
                onHeadUpdate={onHeadUpdate}
            />
        );
    }
});
