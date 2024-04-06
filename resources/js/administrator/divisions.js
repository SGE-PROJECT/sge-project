document.addEventListener('DOMContentLoaded', () => {
    const tabs = document.querySelectorAll('button[role="tab"]');
    const tabPanels = document.querySelectorAll('[role="tabpanel"]');
    const mobileSelect = document.getElementById('tabs-mobile');

    // Función para cambiar la pestaña activa y el contenido visible.
    function switchTab(activeTab) {
        tabs.forEach(tab => {
            const panel = document.querySelector(tab.dataset.tabsTarget);
            if (tab === activeTab) {
                tab.setAttribute('aria-selected', 'true');
                panel.classList.remove('hidden');
            } else {
                tab.setAttribute('aria-selected', 'false');
                panel.classList.add('hidden');
            }
        });
    }

    // Evento de clic para las pestañas.
    tabs.forEach(tab => {
        tab.addEventListener('click', () => switchTab(tab));
    });

    // Evento de cambio para el selector en dispositivos móviles.
    mobileSelect.addEventListener('change', (e) => {
        const selectedTabText = e.target.value;
        const selectedTab = Array.from(tabs).find(tab => tab.textContent.trim() === selectedTabText);
        switchTab(selectedTab);
    });

    // Mostrar por defecto la pestaña "Ingeniería y Tecnología".
    const defaultTab = document.getElementById('tecno-tab');
    switchTab(defaultTab);
});
