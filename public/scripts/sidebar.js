const sidebarToggle = document.querySelector('.sidebar-toggle')
const sidebarOverlay = document.getElementById('overlay')
const sidebar = document.querySelector('.sidebar');
const mainContent = document.getElementById('main');
const groups = document.querySelectorAll('.group');
const texts = document.querySelectorAll('.nav-text');
const image = document.getElementById('imagen');
const ut = document.getElementById('ut');
var cont = true;

function closeSidebar() {
    sidebarOverlay.classList.add('hidden');
    sidebar.classList.add('sidebar-contracted');
    sidebar.classList.remove('sidebar-expanded');
    setTimeout(function () {
        mainContent.classList.remove('main-content-expanded');
        mainContent.classList.add('main-content-contracted');
        if (sidebar.classList.contains('sidebar-contracted')) {
            groups.forEach(group => {
                group.classList.remove('selected');
                let submenu = group.querySelector('.submenu');
                let submenu2 = group.querySelector('.ri-arrow-right-s-line');
                if (submenu) {
                    submenu2.classList.add('hidden');
                    submenu.classList.add('hidden');
                }
            });
        }
        image.classList.add('hidden');
        ut.classList.remove('hidden');
    }, 100);

}

function openSidebar() {
    sidebar.classList.add('sidebar-expanded');
    sidebar.classList.remove('sidebar-contracted');
    mainContent.classList.add('main-content-expanded');
    mainContent.classList.remove('main-content-contracted');
    sidebarOverlay.classList.remove('hidden');
    image.classList.remove('hidden');
    ut.classList.add('hidden');

}

function toggleSidebar() {
    if (sidebar.classList.contains('sidebar-expanded')) {
        closeSidebar();
    } else {
        openSidebar();
    }
}

sidebarToggle.addEventListener('click', function () {
    toggleSidebar();
});

sidebarOverlay.addEventListener('click', function (e) {
    e.preventDefault();
    closeSidebar();
});

function handleResize() {
    if (window.innerWidth >= 768) {
        openSidebar();
    } else {
        closeSidebar();
    }
}

if (window.innerWidth <= 767) {
    window.addEventListener('resize', handleResize);
}

handleResize();

function saveSidebarState() {
    localStorage.setItem('sidebarState', sidebar.classList.contains('sidebar-expanded'));
}

function restoreSidebarState() {
    const isExpanded = localStorage.getItem('sidebarState') === 'true';
    if (isExpanded) {
        openSidebar();
    } else {
        closeSidebar();
    }
}

restoreSidebarState();

document.querySelectorAll('.sidebar-dropdown-toggle').forEach(function (item) {
    item.addEventListener('click', function (e) {
        e.preventDefault();
        const parent = item.closest('.group');
        if (sidebar.classList.contains('sidebar-expanded')) {
            parent.classList.toggle('selected');
        } else {
            parent.classList.remove('selected');
        }

    });
});

sidebarToggle.addEventListener('click', function () {
    if (sidebar.classList.contains('sidebar-expanded')) {
        document.querySelectorAll('.group').forEach(function (group) {
            group.classList.add('disable-hover');
        });
    } else {
        document.querySelectorAll('.group.disable-hover').forEach(function (group) {
            group.classList.remove('disable-hover');
        });
    }
});

const popperInstance = {}
document.querySelectorAll('.dropdown').forEach(function (item, index) {
    const popperId = 'popper-' + index
    const toggle = item.querySelector('.dropdown-toggle')
    const menu = item.querySelector('.dropdown-menu')
    menu.dataset.popperId = popperId
    popperInstance[popperId] = Popper.createPopper(toggle, menu, {
        modifiers: [
            {
                name: 'offset',
                options: {
                    offset: [0, 8],
                },
            },
            {
                name: 'preventOverflow',
                options: {
                    padding: 24,
                },
            },
        ],
        placement: 'bottom-end'
    });
});

document.addEventListener('click', function (e) {
    const toggle = e.target.closest('.dropdown-toggle')
    const menu = e.target.closest('.dropdown-menu')
    if (toggle) {
        const menuEl = toggle.closest('.dropdown').querySelector('.dropdown-menu')
        const popperId = menuEl.dataset.popperId
        if (menuEl.classList.contains('hidden')) {
            hideDropdown()
            menuEl.classList.remove('hidden')
            showPopper(popperId)
        } else {
            menuEl.classList.add('hidden')
            hidePopper(popperId)
        }
    } else if (!menu) {
        hideDropdown()
    }
})

function hideDropdown() {
    document.querySelectorAll('.dropdown-menu').forEach(function (item) {
        item.classList.add('hidden')
    })
}

function showPopper(popperId) {
    popperInstance[popperId].setOptions(function (options) {
        return {
            ...options,
            modifiers: [
                ...options.modifiers,
                { name: 'eventListeners', enabled: true },
            ],
        }
    });
    popperInstance[popperId].update();
}
function hidePopper(popperId) {
    popperInstance[popperId].setOptions(function (options) {
        return {
            ...options,
            modifiers: [
                ...options.modifiers,
                { name: 'eventListeners', enabled: false },
            ],
        }
    });
}

document.querySelectorAll('[data-tab]').forEach(function (item) {
    item.addEventListener('click', function (e) {
        e.preventDefault()
        const tab = item.dataset.tab
        const page = item.dataset.tabPage
        const target = document.querySelector('[data-tab-for="' + tab + '"][data-page="' + page + '"]')
        document.querySelectorAll('[data-tab="' + tab + '"]').forEach(function (i) {
            i.classList.remove('active')
        })
        document.querySelectorAll('[data-tab-for="' + tab + '"]').forEach(function (i) {
            i.classList.add('hidden')
        })
        item.classList.add('active')
        target.classList.remove('hidden')
    })
})

new Chart(document.getElementById('order-chart'), {
    type: 'line',
    data: {
        labels: generateNDays(7),
        datasets: [
            {
                label: 'Active',
                data: generateRandomData(7),
                borderWidth: 1,
                fill: true,
                pointBackgroundColor: 'rgb(59, 130, 246)',
                borderColor: 'rgb(59, 130, 246)',
                backgroundColor: 'rgb(59 130 246 / .05)',
                tension: .2
            },
            {
                label: 'Completed',
                data: generateRandomData(7),
                borderWidth: 1,
                fill: true,
                pointBackgroundColor: 'rgb(16, 185, 129)',
                borderColor: 'rgb(16, 185, 129)',
                backgroundColor: 'rgb(16 185 129 / .05)',
                tension: .2
            },
            {
                label: 'Canceled',
                data: generateRandomData(7),
                borderWidth: 1,
                fill: true,
                pointBackgroundColor: 'rgb(244, 63, 94)',
                borderColor: 'rgb(244, 63, 94)',
                backgroundColor: 'rgb(244 63 94 / .05)',
                tension: .2
            },
        ]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

function generateNDays(n) {
    const data = []
    for (let i = 0; i < n; i++) {
        const date = new Date()
        date.setDate(date.getDate() - i)
        data.push(date.toLocaleString('en-US', {
            month: 'short',
            day: 'numeric'
        }))
    }
    return data
}

function generateRandomData(n) {
    const data = []
    for (let i = 0; i < n; i++) {
        data.push(Math.round(Math.random() * 10))
    }
    return data
}

const fullscreenButton = document.getElementById('fullscreen-button');
fullscreenButton.addEventListener('click', toggleFullscreen);
function toggleFullscreen() {
    if (document.fullscreenElement) {
        document.exitFullscreen();
    } else {
        document.documentElement.requestFullscreen();
    }
}
