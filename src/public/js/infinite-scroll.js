// Ejecutar inmediatamente sin esperar DOMContentLoaded
(function() {
    console.log(' infinite-scroll.js ejecutándose');

    function initInfiniteScroll(containerSelector, bodySelector, route) {
        console.log(' initInfiniteScroll llamado para', containerSelector);

        let page = 1;
        let loading = false;

        const container = document.querySelector(containerSelector);
        const tbody = document.querySelector(bodySelector);

        if (!container || !tbody) {
            console.warn(' Elementos no listos, reintentando en 500ms');
            setTimeout(() => initInfiniteScroll(containerSelector, bodySelector, route), 500);
            return;
        }

        console.log(' Elementos encontrados');

        const loadingEl = document.getElementById('loading');
        let lastPage = Number(tbody.dataset.lastPage || 1);

        const loadMoreData = (nextPage) => {
            loading = true;
            if (loadingEl) loadingEl.style.display = 'block';

            fetch(route + '?page=' + nextPage, {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(res => res.json())
            .then(data => {
                if (data.html && data.html.trim().length > 0) {
                    tbody.insertAdjacentHTML('beforeend', data.html);
                    lastPage = Number(data.last_page || lastPage);
                    tbody.dataset.lastPage = lastPage;
                    page = nextPage;
                }
            })
            .finally(() => {
                loading = false;
                if (loadingEl) loadingEl.style.display = 'none';
            });
        };

        container.addEventListener('scroll', function() {
            if (loading) return;
            if (container.scrollTop + container.clientHeight >= container.scrollHeight - 50) {
                if (page < lastPage) {
                    loadMoreData(page + 1);
                }
            }
        });

        console.log('Scroll listener añadido para', containerSelector);
    }

    // Inicializar todas las tablas inmediatamente
    const tables = [
        { container: '#table-sesion', body: '#sesion-body', route: '/sesion/cargar' },
        { container: '#table-plan', body: '#plan-body', route: '/plan/cargar' },
        { container: '#table-bloque', body: '#bloque-body', route: '/bloque/cargar' },
        { container: '#table-sesion-bloque', body: '#sesion-bloque-body', route: '/sesionBloque/cargar' }
    ];

    tables.forEach(tbl => {
        initInfiniteScroll(tbl.container, tbl.body, tbl.route);
    });
})();